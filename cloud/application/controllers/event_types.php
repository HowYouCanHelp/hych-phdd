<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_types extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Fetch and display records
	 * @return void
	 */
	public function index() {
		$list = $this->db->get('event_types');
		$this->load->view('event_types/list', array('list' => $list));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('event_types');
		$this->load->view('event_types/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('event_types', 'event_types/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'event_types', 'event_types/add', $options);
	}

	public function delete($id) {
	}


}