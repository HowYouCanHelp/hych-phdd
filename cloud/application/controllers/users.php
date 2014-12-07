<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/* 
	public function index() {
		$list = $this->db->get('users');
		$this->load->view('users/list', array('list' => $list));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('users');
		$this->load->view('users/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('users', 'users/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'users', 'users/add', $options);
	}

	public function delete($id) {
	} */


}