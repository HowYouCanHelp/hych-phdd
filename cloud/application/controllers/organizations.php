<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organizations extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Fetch and display records
	 * @return void
	 */
	 /*
	public function index() {
		$list = $this->db->get('organizations');
		$this->load->view('organizations/list', array('list' => $list));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('organizations');
		$this->load->view('organizations/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('organizations', 'organizations/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'organizations', 'organizations/add', $options);
	}

	public function delete($id) {
	}
*/

}