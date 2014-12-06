<?php
/**
 * A base model for use with Magis' base controller.
 * Extend this model with the name of the controller and a "_model" suffix.
 *
 * @link http://github.com/jamierumbelow/codeigniter-base-model
 * @copyright Copyright (c) 2012, Jamie Rumbelow <http://jamierumbelow.net>
 */

class MY_Model extends CI_Model {
	
	/* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */
	protected $_cont_name;
	protected $_table;
	protected $_db;
	protected $_exclude_fields = array('deleted', 'password', 'approved_by', 'approved_on', 'created_by', 'created_on', 'updated_by', 'updated_on', 'registration_questions');
	protected $_primary_key = 'id';
	protected $_module_home;
	protected $_children_model_name = null;
	
	protected $_human_plural;
	protected $_human_singular;
	
	//set this only if the table name of the children are not simply _children_model_name minus the suffix '_model'
	protected $_children_table = null; //default: for 'privileges_model' the children table is 'privileges'
	
	//set this if the table name for the associative table is something other than the singular of _table added to _children_assoc_table separated by a suffix
	protected $_children_assoc_table = null;  //default: for tables 'roles' and 'privileges', the associative table is 'role_privileges'
	
	//set this if the column name to assign the parent's ID is different than the table name of the parent
	protected $_children_assoc_column = null; //default: for table 'roles', the role's id will be added to role_privileges.roles)
	
	//set this if the column name to assign the parent's ID is different than the table name of the child
	protected $_children_assoc_child_column = null; //default: for table 'privileges', the privileges's id will be added to role_privileges.privileges
	
	protected $_delete_human_identifier = 'name';
	
	
	/* --------------------------------------------------------------
     * CONSTRUCT
     * ------------------------------------------------------------ */
	
	public function __construct() {
        parent::__construct();
		$this->_set_name();
		$this->_set_database();
    }
	
	protected function _set_name() {
		$this->load->helper('inflector');
		$this->_cont_name = preg_replace('/(_m|_model)?$/', '', strtolower(get_class($this)));
		if($this->_table == null) {
			$this->_table = $this->_cont_name;
		}
		if($this->_module_home == null) {
			$this->_module_home = $this->_cont_name;
		}
		if($this->_human_singular == null) {
			$this->_human_singular = singular(humanize($this->_cont_name));
		}
		if($this->_human_plural == null) {
			$this->_human_plural = plural($this->_human_singular);
		}
		if($this->_children_model_name != null) {
			$this->load->helpers('inflector');
			$model = $this->_children_model_name;
			if($this->_children_table == null) {
				if (($last_slash = strrpos($model, '/')) !== FALSE) {
					$path = substr($model, 0, $last_slash + 1);
					$model = substr($model, $last_slash + 1);
				}
				$this->_children_table = preg_replace('/(_m|_model)?$/', '', strtolower($model));
			}
			if($this->_children_assoc_table == null) {
				$this->_children_assoc_table = singular($this->_table).'_'.$this->_children_table;
			}
			if($this->_children_assoc_column == null) {
				$this->_children_assoc_column = singular($this->_table);
			}
			if($this->_children_assoc_child_column == null) {
				$this->_children_assoc_child_column = singular($this->_children_table);
			}
		}
    }

    private function _set_database() {
        if (!$this->_db) {
            $this->load->database();
        }
        else {
            $this->db = $this->load->database($this->_db, TRUE);
        }
    }

    /* --------------------------------------------------------------
     * BASIC INFO
     * ------------------------------------------------------------ */
	public function table() {
		return $this->_table;
	}
	
	/* --------------------------------------------------------------
     * UI HELPERS
     * ------------------------------------------------------------ */
	
	public function get_dropdown($name, $where = null, $value = null, $text = null, $title = null) {
		if($where != null) {
			$this->db->where($where);
		}
		if($value == null) {
			$value = $this->dropdown_value();
		}
		if($text == null) {
			$text = $this->dropdown_text();
		}
		if($title == null) {
			$title = $this->dropdown_title();
		}
		$result = $this->db->select($value.','.$text.','.$title)
							->get($this->_table)
							->result_array();
		$html = '<select name="'.$name.'" class="form-control">';
		foreach($result as $r) {
			$html .= '<option value="'.$r[$value].'" class="hasTooltipBody" data-toggle="tooltip"
					title="'.$r[$title].'" data-placement="right">'
					.$r[$text].'</option>';
		}
		$html .= '</select>';
		return $html;
	}
	
	public function dropdown_value() {
		return $this->_primary_key;
	}
	
	public function dropdown_text() {
		return 'name';
	}
	
	public function dropdown_title() {
		return 'description';
	}
	
	
	
	/* --------------------------------------------------------------
     * VARIABLES FOR MANAGE
     * ------------------------------------------------------------ */
	
	public function manage_view_data($no_filter = true) {
		$data = array('human_module' => $this->_human_singular,
					'table_title' => $this->manage_title(),
					'home' => $this->_module_home,
					'module' => $this->_cont_name,
					'header' => $this->manage_header(),
					'add_button' => true,
					'buttons' => $this->manage_buttons());
		if($no_filter) {
			$data['table'] = $this->manage_table();
		}
		return $data;
	}
	
	public function manage_view() {
		return 'magis/table_page';
	}
	
	public function manage_title() {
		return $this->_human_plural;
	}
	
	public function manage_header() {
		$this->load->helper('inflector');
		$fields = $this->_list_fields(true);
		return array_map('humanize', $fields);
	}
	
	public function manage_table() {
		$fields = $this->_list_fields();
		$n = sizeof($fields);
		$fields[$n] = $fields[0];
		unset($fields[0]);
		return $this->db->select($fields)
						->get($this->_table)
						->result_array();
	}
	
	public function manage_buttons() {
		return array(array('link' => $this->_module_home.'/edit', 'label' => '<i class="glyphicon glyphicon-pencil"></i>', 'class' => 'btn-sm btn-info'),
					array('link' => $this->_module_home.'/delete', 'label' => '<i class="glyphicon glyphicon-remove"></i>', 'class' => 'btn-sm btn-danger'));
	}
	
	public function before_manage() {
	
	}
	
	/* --------------------------------------------------------------
     * VARIABLES FOR ADD
     * ------------------------------------------------------------ */
	
	public function add_crud_options($initial = array()) {
		$options = array('data' => $this->add_view_data(),
						'redirect' => $this->_module_home.'/index/added');
		$options = array_merge($initial, $options);
		if($this->_children_model_name != null) {
			$options['foreign_keys'][$this->_children_assoc_table][$this->_children_assoc_column] = $this->_table;
		}
		return $options;
	}
	
	public function add_view_data() {
		$data = array('form_title' => 'Add '.$this->_human_singular,
					'cancel_button' => $this->_module_home,
					'form_action' => $this->_module_home.'/add',
					'form_table' => $this->_table,
					'options' => array('exclude' => $this->_exclude_fields,
										'textarea' => array('description'),
										'required' => array('name')));
		
		if($this->_children_model_name != null) {
			$this->load->helper('inflector');
			$model = $this->_children_model_name;
			$this->load->model($model, 'child_model');
			$data = array_merge($data, $this->child_model->manage_view_data());
			$data['checkboxes'] = underscore(reset($this->child_model->manage_header()));
			$data['checkbox_table'] = $this->_children_assoc_table;
			unset($data['add_button']);
		}
		return $data;
	}
	
	public function add_upload() {
		return null;
	}
	
	public function add_upload_config() {
		return null;
	}
	
	public function add_upload_error_view() {
		return 'error';
	}
	
	public function add_table() {
		if($this->_children_model_name != null) {
			$assoc = $this->input->post($this->_children_assoc_table);
			if(is_array($assoc) && sizeof($assoc) > 0) {
				return array($this->_table,
							$this->_children_assoc_table);
			}
		}
		return $this->_table;
	}
	
	public function add_view() {
		if(!$this->_children_model_name) {
			return 'magis/form';
		} else {
			return 'magis/form_children';
		}
	}
	
	public function before_add() {
		if($this->_children_model_name != null) {
			$assoc = $this->input->post($this->_children_assoc_table);
			if($assoc != null) {
				$this->load->helper('inflector');
				unset($_POST[$this->_children_assoc_table]);
				$_POST[$this->_children_assoc_table][$this->_children_assoc_child_column] = explode('|', $assoc);
			}
		}
	}
	
	/* --------------------------------------------------------------
     * VARIABLES FOR EDIT
     * ------------------------------------------------------------ */
	
	public function edit_crud_options($id) {
		return array('data' => $this->edit_view_data($id),
					'redirect' => $this->_module_home.'/index/edited');
	}
	
	public function edit_view_data($id) {
		$data = array('form_title' => 'Edit '.$this->_human_singular,
					'cancel_button' => $this->_module_home,
					'form_action' => $this->_module_home.'/edit/'.$id,
					'form_table' => $this->_table,
					'options' => array('exclude' => $this->_exclude_fields,
										'textarea' => array('description'),
										'required' => array('name')));
		if($this->_children_model_name != null) {
			$this->load->helper('inflector');
			$model = $this->_children_model_name;
			$this->load->model($model, 'child_model');
			$data = array_merge($data, $this->child_model->manage_view_data());
			$data['checkboxes'] = underscore(reset($this->child_model->manage_header()));
			$data['checkbox_table'] = $this->_children_assoc_table;
			unset($data['add_button']);
			$child_column = $this->_children_assoc_child_column;
			$children = $this->db->select($child_column)
								->where($this->_children_assoc_column, $id)
								->get($this->_children_assoc_table)->result();
			$assoc = array();
			foreach($children as $c) {
				$assoc[$c->$child_column] = $c->$child_column;
			}
			//get data
			$data['values'] = $this->db->where($this->_primary_key, $id)
										->get($this->_table)
										->row_array();
			$data['values'][$this->_children_assoc_table] = $assoc;
		}
		return $data;
	}
	
	public function edit_table() {
		return $this->_table;
	}
	
	public function edit_view() {
		if(!$this->_children_model_name) {
			return 'magis/form';
		} else {
			return 'magis/form_children';
		}
	}
	
	public function before_edit($id) {
		//perform update of children here.
		if($this->_children_model_name != null) {
			$assoc = $this->input->post($this->_children_assoc_table);
			if($assoc != null) {
				$this->load->helper('inflector');
				//delete old children
				$this->db->where($this->_children_assoc_column, $id)
						->delete($this->_children_assoc_table);
				//insert new children
				$assoc = explode('|', $assoc);
				$n = sizeof($assoc);
				for($i = 0; $i < $n; ++$i) {
					$insert[$this->_children_assoc_child_column] = $assoc[$i];
					$insert[$this->_children_assoc_column] = $id;
					$this->db->insert($this->_children_assoc_table, $insert);
				}
			}
		}
	}
	
	/* --------------------------------------------------------------
     * VARIABLES FOR DELETE
     * ------------------------------------------------------------ */
	
	public function delete_view() {
		return $this->manage_view();
	}
	
	public function delete_view_data($id) {
		$data = $this->manage_view_data();
		$identifier_column = $this->_delete_human_identifier;
		$data['message'] = '<b>Confirm Delete</b>
							<br/>Are you sure you want to delete '.$this->_human_singular.': '.$this->delete_human_identifier($id)->$identifier_column.'? 
							<a class="btn btn-danger" href="'.site_url($this->_module_home.'/confirm/'.$id).'">Confirm</a>
							<a class="btn" href="'.site_url($this->_module_home).'" >Cancel</a>';
		$data['message_class'] = 'alert-danger';
		return $data;
	}
	
	public function delete_human_identifier($id) {
		return $this->db->select($this->_delete_human_identifier)
						->where($this->_primary_key, $id)
						->get($this->_table)
						->row();
	}
	
	public function before_delete() {
	
	}
	
	/* --------------------------------------------------------------
     * VARIABLES FOR CONFIRM
     * ------------------------------------------------------------ */
	
	public function confirm_delete($id) {
		if($this->_children_model_name != null) {
			$this->db->where($this->_children_assoc_column, $id)
					->delete($this->_children_assoc_table);
		}
		$this->db->where('id', $id)
				->delete($this->_table);
	}
	
	public function confirm_redirect() {
		redirect($this->_module_home.'/index/deleted');
	}
	
	public function before_confirm() {
		
	}
	
	/* --------------------------------------------------------------
     * VARIABLES FOR SEARCH
     * ------------------------------------------------------------ */
	
	public function search_crud_options() {
		return array('search_form' => $this->search_form_view(),
					'results_view' => $this->search_form_view(),
					'form_view_data' => $this->search_form_view_data(),
					'results_view_data' => $this->search_results_view_data(),
					'results_fields' => $this->search_results_fields(),
					'DB' => $this->search_DB());
	}
	
	public function search_form_view_data() {
		return $this->add_view_data();
	}
	
	public function search_results_view_data() {
		return $this->manage_view_data(false);
	}
	
	public function search_results_fields() {
		return $this->manage_view_data(false);
	}
	
	public function search_table() {
		return $this->_table;
	}
	
	public function search_form_view() {
		return $this->add_view();
	}
	
	public function search_results_view() {
		return $this->manage_view();
	}
	
	public function search_title() {
		return 'Search Results';
	}
	
	public function search_DB() {
		return $this->db;
	}
	
	public function search_header() {
		$this->load->helper('inflector');
		$fields = $this->search_results_fields();
		//remove 'id' in header, w/c is presumably last element to be compatible with our magis/table
		end($fields);
		unset($fields[key($fields)]);
		return array_map('humanize', $fields);
	}
	
	public function search_buttons() {
		return $this->manage_buttons();
	}
	
	public function before_search() {
	
	}
	
	/* --------------------------------------------------------------
     * HELPER FUNCTIONS
     * ------------------------------------------------------------ */

	public function _list_fields($remove_id = false) {
		$fields = $this->db->list_fields($this->_table);
		if($remove_id) {
			unset($fields[0]);
		}
		if(is_array($this->_exclude_fields)) {
			foreach($this->_exclude_fields as $e) {
				$key = array_search($e, $fields);
				if(($key = array_search($e, $fields)) !== false) {
					unset($fields[$key]);
				}
			}
			return array_values($fields);
		}
		return $fields;
	}
}