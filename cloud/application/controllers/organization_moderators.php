<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization_moderators extends MY_Controller 
{
	public function __construct() {
		parent::__construct();

	}

	/**
	 * Fetch and display records
	 * @return void
	 */
	public function index() {
		$list = $this->db->get('organization_moderators');
		$this->load->view('organization_moderators/list', array('list' => $list));
	}

	public function view($id) {
		$row = $this->db->where('id', $id)->get('organization_moderators');
		$this->load->view('organization_moderators/indiv', array('list' => $row));
	}

	public function add() {
		$options = array();
		$this->crud->add('organization_moderators', 'organization_moderators/add', $options);
	}

	public function edit($id) {
		$options = array();
		$this->crud->edit($id, 'organization_moderators', 'organization_moderators/add', $options);
	}

	public function delete($id) {
	}


}