<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donations extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Fetch and display records
	 * @return void
	 */
	public function index() {
		$list = $this->db->get('donations');
		$this->load->view('donations/list', array('list' => $list));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('donations');
		$this->load->view('donations/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('donations', 'donations/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'donations', 'donations/add', $options);
	}

	public function delete($id) {
	}


}