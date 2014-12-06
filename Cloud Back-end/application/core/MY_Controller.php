<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * A base controller for use with Magis' base model.
 * Extend this controller to get the standard crud functions
 *
 * @link http://github.com/jamierumbelow/codeigniter-base-model
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */
 
class MY_Controller extends CI_Controller {

	protected $_cont_name;
	protected $_model_path;
	protected $_model;
	
	function __construct(){
		parent::__construct();
		$this->_set_name();
		$this->_load_model();
	}
	
	protected function _set_name() {
		if($this->_cont_name == null) {
			$this->_cont_name = strtolower(get_class($this));
		}
	}
	
	protected function _load_model() {
		if($this->_model_path == null) {
			$this->_model_path = $this->_cont_name.'_model';
		}
		$temp_model_name = $this->_cont_name.'_model';
		$this->load->model($this->_model_path, $temp_model_name);
		$this->_model = $this->$temp_model_name;
	}
	
	public function index($message = null) {
		$this->_model->before_manage();
		$options = $this->_model->manage_view_data();
		if($message != null) { $options['message'] = $message; }
		$this->load->view($this->_model->manage_view(), 
						$options);
	}
	
	public function search() {
		$this->_model->before_search();
		$this->crud->search($this->_model->search_table(),
							$this->_model->search_crud_options());
	}
	
	public function add() {
		$this->_model->before_add();
		$options = array();
		if($this->_model->add_upload() != null) {
			$options['upload'] = $this->_model->add_upload();
			$options['upload_config'] = $this->_model->add_upload_config();
			$options['upload_error_view'] = $this->_model->add_upload_error_view();
		}
		
		$this->crud->add($this->_model->add_table(),
						$this->_model->add_view(),
						$this->_model->add_crud_options($options));
	}
	
	public function edit($id) {
		$this->_model->before_edit($id);
		$this->crud->edit($id,
						$this->_model->edit_table(),
						$this->_model->edit_view(),
						$this->_model->edit_crud_options($id));
	}
	
	public function delete($id) {
		$this->_model->before_delete();
		$this->load->view($this->_model->delete_view(), 
						$this->_model->delete_view_data($id));
	}
	
	public function confirm($id) {
		$this->_model->before_delete();
		$this->_model->confirm_delete($id);
		$this->_model->confirm_redirect();
	}
}

/* End of file service.php */
/* Location: ~/ntsp/application/controllers/service.php */


