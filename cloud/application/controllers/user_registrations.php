<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_registrations extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Fetch and display records
	 * @return void
	 */
	public function index($event_fk) {
		$event = $this->db->select('name, organization_fk')
								->where('id', $event_fk)
								->get('events', 1)
								->row();
		$list = $this->db->select('first_name, last_name, users.id')
						->from(array('user_registrations', 'users'))
						->where('user_registrations.user_fk=users.id', null, false)
						->where('verified !=', '1')
						->where('event_fk', $event_fk)
						->get()
						->result_array();
		$this->load->view('user_registrations/list', array('list' => $list,
															'event_name' => $event->name,
															'event_fk' => $event_fk));
	}
	
	//check join_incentive
	//add join_incentive to user karma
	//subtract org karma
	public function verify($event_fk, $user_fk) {
		
		$event = $this->db->select('organization_fk, join_incentive')
									->from(array('user_registrations', 'events'))
									->where('id', $event_fk)
									->where('user_registrations.event_fk=events.id', null, false)
									->limit(1)
									->get()
									->row();
		$join_incentive = $event->join_incentive;
		$organization_fk = $event->organization_fk;
		$this->db->where('id', $user_fk)
				->set('karma', 'karma + '.$join_incentive, FALSE)
				->update('users');
				
		$this->db->where('id', $organization_fk)
				->set('karma', 'karma - '.$join_incentive, FALSE)
				->update('organizations');
				
		$this->db->where(array('user_fk' => $user_fk, 'event_fk' => $event_fk))
				->update('user_registrations', array('verified' => 1));
		
		redirect('user_registrations/index/'.$event_fk);
	}
	
	/* 

	public function view($id) {
		$row = $this->db->where('id', $id)->get('user_registrations');
		$this->load->view('user_registrations/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('user_registrations', 'user_registrations/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'user_registrations', 'user_registrations/add', $options);
	}

	public function delete($id) {
	}

	*/
}