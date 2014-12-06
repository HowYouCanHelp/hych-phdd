<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Fetch and display records
	 * @return void
	 */
	/* public function index() {
		$list = $this->db->get('events');
		$this->load->view('events/list', array('list' => $list));
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