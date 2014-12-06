<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity_actions extends MY_Controller 
{
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$list = $this->db->get('activity_actions');
		$this->load->view('activity_actions/list', array('list' => $list));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('activity_actions');
		$this->load->view('activity_actions/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('activity_actions', 'activity_actions/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'activity_actions', 'activity_actions/add', $options);
	}

	public function delete($id) {
	}


}