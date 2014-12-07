<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Rest extends REST_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('rest_model');
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST");
	}
	
	public function test_get() {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST");
		$this->response(array('message' => 'hello world!'));
	}
	
	public function get_headers_get() {
		header("Access-Control-Allow-Origin: *");
	}
	
	public function login_post() {
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Methods: GET, POST");
		
		$fb_id = $this->post('fb_id');
		$first_name = $this->post('first_name');
		$last_name = $this->post('last_name');
		$email = $this->post('email');
		$profile_pic = $this->post('profile_pic');
		
		$user = $this->db->where('fb_id', $fb_id)
						->get('users', 1)
						->row();
		$user_fk = -1;
		if(isset($user->id)) {
			$user_fk = $user->id;
			
		} else {
			$row = array('fb_id' => $fb_id,
						'profile_pic' => $profile_pic,
						'email' => $email,
						'first_name' => $first_name,
						'last_name' => $last_name);
			$this->db->insert('users', $row);
			$user_fk = $this->db->insert_id();
		}
		
		if($user_fk > 0) {
			$this->db->insert('user_logins', array('user_fk' => $user_fk));
		}
		
		$response = array('user_fk' => $user_fk);
		$this->response($response, 200);
	}
	
	public function register_post() {
		$event_fk = $this->post('event_fk');
		$user_fk = $this->post('user_fk');
		$fb_id = $this->post('fb_id');
		$user = $this->rest_model->verify_id_combo($user_fk, $fb_id);
		if(isset($user->id)) {
			$response = array('status' => 'success');
			$event = $this->rest_model->verify_event_fk($event_fk);
			if(isset($event->id)) {
				$response = array('registration_code' => hash('crc32b', $event_fk.$user_fk.$fb_id));
			} else {
				$response = array('status' => 'illegal event');
			}
		} else {
			$response = array('status' => 'illegal login');
		}
		$this->response($response, 200);
	}
	
	public function share_post() {
		$event_fk = $this->post('event_fk');
		$user_fk = $this->post('user_fk');
		$fb_id = $this->post('fb_id');
		$user = $this->rest_model->verify_id_combo($user_fk, $fb_id);
		if(isset($user->id)) {
			//record the share
			$event = $this->rest_model->verify_event_fk($event_fk);
			if(isset($event->id)) {
				$karma_change = $event->share_incentive;
				$new_karma = $karma_change + $user->karma;
				$response = array('karma_change' => $karma_change,
									'new_karma' => $new_karma);
				$this->rest_model->update_karma($user_fk, $karma);
			} else {
				$response = array('status' => 'illegal event');
			}
		} else {
			$response = array('status' => 'illegal login');
		}
		$this->response($response, 200);
	}
	
	public function maps_post() {
		$coordinates = $this->post('coordinates');
		$degrees = explode(',', $coordinates);
		$longhitude = $degrees[0];
		$latitude = $degrees[1];
		$events = $this->rest_model->search_markers($longhitude, $latitude);
		$organizations = $this->rest_model->nearby_organizations($longhitude, $latitude);
		
		$response = array('events' => $markers,
						'organizations' => $organizations);
		$this->response($response, 200);
	}
	
	public function feed_get() {
		$fb_id = $this->post('fb_id');
		$user_fk = $this->post('user_fk');
		$last_id = $this->post('last_id');
		$user = $this->rest_model->verify_id_combo($user_fk, $fb_id);
		
		if(strlen($last_id) > 0) {
			$this->db->where('id <', $last_id);
		}
		
		//if(isset($user->id)) {
			$items = $this->db->select('events.id AS event_id, organizations.id AS organization_id, organizations.name AS organization_name,
									organizations.photo_uri AS organization_logo, events.photo_uri AS event_photo, events.name AS event_name,
									event_types.name AS event_type,
									CONCAT(IF(event_types.name="Volunteer Station", "Join", ""),IF(event_types.name="Fund Raising", "Donate", ""),
									IF(event_types.name="Donation Drop-off", "Pledge", "")) AS action_button, events.description AS description,
									datetime_start, datetime_end, events.venue, share_incentive, join_incentive', false)
							->from(array('events', 'organizations', 'event_types'))
							->where('events.organization_fk=organizations.id', null, false)
							->where('events.event_type_fk=event_types.id', null, false)
							->order_by('events.updated_on', 'desc')
							->limit(10)
							->get()
							->result_array();
			foreach($items as $i) {
				$this->load->view('rest/feed_item', $i);
			}
			//$response = array('items' => $items);
		//} else {
			//$response = array('status' => 'illegal login');
		//}
		//$this->response($response, 200);
	}
	
	public function profile_post($fb_id, $user_fk) {
		$fb_id = $this->post('fb_id');
		$user_fk = $this->post('user_fk');
		$user = $this->rest_model->verify_id_combo($user_fk, $fb_id);
		if(isset($user->id)) {
			$recent_activity = $this->db->where('user_fk', $user_fk)
										->order_by('updated_on', 'desc')
										->get('user_activities', 10)
										->result_array();
			$response = $user;
			$response['recent_activity'] = $recent_activity;
			$this->response($response, 200);
		} else {
			$response = array('status' => 'illegal login');
		}
		$this->response($response, 200);
	}
	
	public function join_post() {
		$event_fk = $this->post('event_fk');
		$fb_id = $this->post('fb_id');
		$user_fk = $this->post('user_fk');
		//$user = $this->rest_model->verify_id_combo($user_fk, $fb_id);
		$user = $this->db->where('id', $user_fk)->get('users', 1)->row();
		//if(isset($user->id)) {
			$event = $this->rest_model->verify_event_fk($event_fk);
			if(isset($event->id)) {
				$karma_change = -1 * $amount;
				$new_karma =  $user->karma + $amount;
				$response = array('karma_change' => $karma_change,
								'new_karma' => $new_karma);
				$this->rest_model->update_karma($user_fk, $karma);
			} else {
				$response = array('status' => 'illegal event');
			}
		/* } else {
			$response = array('status' => 'illegal login');
		} */
		$this->response($response, 200);
	}
	
	public function donate_post() {
		$event_fk = $this->post('event_fk');
		$amount = $this->post('amount');
		$fb_id = $this->post('fb_id');
		$user_fk = $this->post('user_fk');
		$user = $this->rest_model->verify_id_combo($user_fk, $fb_id);
		if(isset($user->id)) {
			$event = $this->rest_model->verify_event_fk($event_fk);
			if(isset($event->id)) {
				$karma_change = -1 * $amount;
				$new_karma =  $user->karma - $amount;
				$response = array('karma_change' => $karma_change,
								'new_karma' => $new_karma);
				$this->rest_model->update_karma($user_fk, $karma);
			} else {
				$response = array('status' => 'illegal event');
			}
		} else {
			$response = array('status' => 'illegal login');
		}
		$this->response($response, 200);
	}
	
	public function report_post() {
		$fb_id = $this->post('fb_id');
		$user_fk = $this->post('user_fk');
		$event_type = urldecode($this->post('event_type_fk'));
		$event_type_fk = $this->rest_model->get_event_type_id($event_type);
		$coordinates = $this->post('coordinates');
		$degrees = explode(',', $coordinates);
		$longhitude = $degrees[0];
		$latitude = $degrees[1];
		$title = $this->post('title');
		$description = $this->post('description');
		/* $datetime_start = $this->get('datetime_start');
		$datetime_end = $this->get('datetime_end'); */
		$venue = $this->post('venue');
		$user = $this->rest_model->verify_id_combo($user_fk, $fb_id);
		//if(isset($user->id)) {
			//add validation later
			$this->db->insert('events', array('longhitude' => $longhitude,
												'latitude' => $latitude,
												'name' => $title,
												'description' => $description,
												/* 'datetime_start' => $datetime_start,
												'datetime_end' => $datetime_end, */
												'event_type_fk' => $event_type_fk,
												'venue' => $venue));
			$karma_change = 1;
			$new_karma =  $user->karma + 1;
			$this->rest_model->update_karma($user_fk, $new_karma);
			$response = array('karma_change' => $karma_change,
							'new_karma' => $new_karma);
			$this->response($response, 200);
		//} else {
			//$response = array('status' => 'illegal login');
		//}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */