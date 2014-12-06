<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ci_sessions extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Fetch and display records
	 * @return void
	 */
	public function index() {
		$list = $this->db->get('ci_sessions');
		$this->load->view('ci_sessions/list', array('list' => $list));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('ci_sessions');
		$this->load->view('ci_sessions/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('ci_sessions', 'ci_sessions/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'ci_sessions', 'ci_sessions/add', $options);
	}

	public function delete($id) {
	}


}