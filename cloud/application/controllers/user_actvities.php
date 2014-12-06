<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_actvities extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Fetch and display records
	 * @return void
	 */
	public function index() {
		$list = $this->db->get('user_actvities');
		$this->load->view('user_actvities/list', array('list' => $list));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('user_actvities');
		$this->load->view('user_actvities/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('user_actvities', 'user_actvities/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'user_actvities', 'user_actvities/add', $options);
	}

	public function delete($id) {
	}


}