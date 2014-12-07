<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}
	
	public function view($id) {
		$row = $this->db->select('events.id AS event_id, events.name AS event_name, datetime_start, datetime_end, 
									organizations.id AS organization_id, organizations.name AS organization_name, 
									organizations.photo_uri AS organization_logo, events.photo_uri AS event_photo,
									events.description AS description, venue')
						->from(array('events', 'organizations'))
						->where('events.organization_fk=organizations.id', null, false)
						->where('events.id', $id)
						->get()
						->row_array();
		$row['registered'] = $this->db->select('first_name, last_name')
										->from(array('user_registrations', 'users'))
										->where('event_fk', $id)
										->where('users.id=user_registrations.user_fk', null, false)
										->get()
										->result_array();
		$this->load->view('events/indiv', $row);
	}
	
	public function index() {
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
		$this->load->view('events/list', array('items' => $items));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('events');
		$this->load->view('events/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('events', 'events/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'events', 'events/add', $options);
	}

	public function delete($id) {
	} */


}