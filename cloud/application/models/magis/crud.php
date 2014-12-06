<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * main public functions:
 * add($table, $view, $options);
 * edit($id, $table, $view, $options);
 */

class Crud extends CI_Model {
	
	function __construct() {
        // Call the Model constructor
        parent::__construct();
		$this->load->helpers('magis');
    }
	
	/* 
	 * $view = name of view files
	 * $model = MY_model to be imported
	 * $table = DB table name. can be an ordered array of tables (data will be inserted in order)
	 * $data = initial data array to be passed to the view file
	 * $privilege = what privileges are required for this page? can either be a string or an array or privileges, false or '' for no privilege required, and true if log-in is required
	 * $foreign_keys = 2d array describing foreign-key dependencies. prototype:$foreign_keys[tablename][fkname] = 'referenced table', first dimension: table name containing foreign key, second dimension: foreign key, value: table whose id is referenced
	 * $redirect = if set, window will be redirected after successful add. else, go back to view file with '/added' appended
	 * $custom_add = boolean, whether to call a method 'add' of the given model. (used for custom addition procedures).
	 * $custom_validation_rules = boolean, whether to call a method 'validation_rules' of the given model instead of the default validate process
	 * $additional_fields = additional fields with values to be added to the row to be inserted. structure: $additional_fields['table']['field'] = 'value' OR $additional_fields['field'] = 'value' for single table;
	 * $hash = fields to be hashed (structure: $hash['table'] = array('fields') OR for single tables: $hash = array('fields');
	 * $success_view = view to be shown ONLY if insert is a success
	 * $table_alias = aliases for tables to be inserted multiple times but with different dependencies. structure: $table_alias['alias'] = 'realname';
	 * $table_alias = aliases for tables to be inserted multiple times but with different dependencies. structure: $table_alias['alias'] = 'realname';
	 * $primary_key = fieldname of primary key
	 * $return_insert_id = if there is only one table set in $table, setting this to true will return the last inserted id.
						*if there is more than one table set in $table, set the table with which you want to return the last inserted id (only one)
						*note: redirect will not function anymore when return_insert_id is set
	 */
	public function add($table, $view, $options = array()) {
		//initialize options
		$data = isset_default($options, 'data', null);
		$model = isset_default($options, 'model', null);
		$privilege = isset_default($options, 'privilege', null);
		$redirect = isset_default($options, 'redirect', null);
		$foreign_keys = isset_default($options, 'foreign_keys', null);
		$custom_add = isset_default($options, 'custom_add', null);
		$custom_validation_rules = isset_default($options, 'custom_validation_rules', null);
		$additional_fields = isset_default($options, 'additional_fields', null);
		$hash = isset_default($options, 'hash', null);
		$table_alias = isset_default($options, 'table_alias', null);
		$success_view = isset_default($options, 'success_view', null);
		$upload = isset_default($options, 'upload', null);
		$upload_table = isset_default($options, 'upload_table', null); //in case there is more than one table in this function
		$upload_config = isset_default($options, 'upload_config', array());
		$upload_error_view = isset_default($options, 'upload_error_view', null);
		$after_add = isset_default($options, 'after_add', null);
		$created_info = isset_default($options, 'created_info', null);
		$return_insert_id = isset_default($options, 'return_insert_id', FALSE);
		
		//try to load the model
		if($model != '' && !isset($this->$model)) { $this->load->model($model); }
		
		//validate the privilege required (check first if this project is using the auth library
		if(isset($this->auth)) { $this->auth->validate($privilege); }
		
		//check if form_validation library is loaded already. if not, load
		if(!isset($this->form_validation)) { $this->load->library('form_validation'); }
		
		//initialize the validation rules
		if($custom_validation_rules == 'model') { $this->$model->validation_rules(); }
		else if($custom_validation_rules == 'db') { $this->validation_rules($table); }
		else { $this->load->view($view, $data, true); }
		
		//check captcha
		$captcha_passed = true;
		if(isset($_POST['recaptcha_response_field'])) {
			$this->recaptcha->recaptcha_check_answer();
			$captcha_passed = $this->recaptcha->getIsValid();
		}
		
		if($this->form_validation->run() == FALSE || !$captcha_passed) { //test the input
			$this->load->view($view, $data); //nothing posted yet or input invalid; show input form again
		} else { //valid form data
			
			//created_info
			if($created_info != null) {
				$this->created_info($additional_fields, $table, $created_info);
			}
			
			//upload, if any
			if($upload != null && sizeof($_FILES) > 0 && strlen($_FILES[$upload]['name']) > 0) {
				$upload_data = $this->do_upload($upload, $upload_config);
				if(isset($upload_data['error'])) {
					$this->form_validation->set_errors(array($upload => $upload_data['error']));
					$this->load->view($view, $data);
					return;
				}
				if($upload_table != null) {
					$additional_fields[$upload_table][$upload] = $upload_data['file_name'];
				} else {
					$additional_fields[$upload] = $upload_data['file_name'];
				}
			}
			
			//check if model has own add procedure
			if($custom_add) { 
				$this->$model->add(); 
			}
			//check if single table involved
			else if(!is_array($table)) {
				$input = $this->input->post($table);
				$first_key = null;
				if(is_array($input)) {
					$first_key = reset($input);
				}
				if(is_array($first_key)) {
					$this->insert($table, $input, array(), array(), $additional_fields, array(), $hash);
					} else {
					if(is_array($additional_fields) && sizeof($additional_fields) > 0) {
						if(is_array($input)) {
							$input = array_merge($input, $additional_fields);
						} else {
							$input = $additional_fields;
						}
					}
					$input = $this->hash($input, $hash);
					$this->db->insert($table, $input);
					if($return_insert_id) {
						return $this->db->insert_id();
					}
				}
				
			} else { //array of tables given. check foreign_keys
			
				$ids = null;
				//check if foreign_keys isset
				if(is_array($foreign_keys) && sizeof($foreign_keys) > 0) {
					$ids = array();
					//create an associative array 'ids' with tablename => last entered id (initial value 0)
					foreach($foreign_keys as $referrer) {
						foreach($referrer as $referenced) {
							$ids[$referenced] = 0;
						}
					}
				}
				
				$last_insert_id = null;
				//now insert the tables in order
				foreach($table as $curr) {
					//get data from user
					$input = $this->input->post($curr);
					//insert data
					$this->insert($curr, $input, $foreign_keys, $ids, $additional_fields, $table_alias, $hash);
					//check if table's id is referenced in another table, so save the last entered id
					if(isset($ids[$curr])) {
						$ids[$curr] = $this->db->insert_id();
					}
					if($return_insert_id == $curr) {
						$last_insert_id = $this->db->insert_id();
					}
					//clear $input for the next iteration
					unset($input);
				}
				
				if($model != null && isset($this->$model) && $after_add != null) {
					$this->$model->$after_add();
				}
				
				if($return_insert_id != false) {
					return $last_insert_id;
				}
			}
			
			//redirect
			if($redirect != false) { redirect($redirect); }
			else if($success_view != '')  { $this->load->view($success_view, $data); }
			else { redirect($this->uri->uri_string().'/added'); }
		}
	}
	
	/* 
	 * $id = id of the record to be edited
	 * $view = name of view files
	 * $table = (NOTE: table's PK should be named 'id' or the first name-value pair in the form.) table/s to be imported. can be an ordered array of tables (data will be inserted in order)
	 * $model = MY_model to be imported. optional, but required if either custom_edit or custom_validation_rules is true.
	 * $data = initial data array to be passed to the view file
	 * $session = what type of user validation would you like? '' for none, 'admin' for validateAdmin, 'session' for validateSession
	 * $redirect = if set, window will be redirected after successful add. else, go back to view file with '/added' appended
	 * $foreign_keys = (NOTE: this functionality is pending... algorithm is still being worked out) 2d array describing foreign-key dependencies. first dimension: table name containing foreign key, second dimension: foreign key, value: table whose id is referenced
	 * $custom_data = boolean, whether to call a method 'data' of the given model. (used for custom data population procedures).
	 * $custom_edit = boolean, whether to call a method 'edit' of the given model. (used for custom edit procedures).
	 * $custom_validation_rules = boolean, whether to call a method 'validation_rules' of the given model instead of the default validate process
	 * $primary_key = fieldname of primary key
	 * $updated_info = TRUE (add created_info for all tables in $tables) or array of tables with updated_info
	 * $delete_insert = array of tables where you'll have to delete first then insert, with the ff. foreign keys
	 */
	public function edit($id, $table, $view, $options = array()) {
		//initialize options
		$data = isset_default($options, 'data', null);
		$session = isset_default($options, 'session', '');
		$model = isset_default($options, 'model', '');
		$redirect = isset_default($options, 'redirect', false);
		$foreign_keys = isset_default($options, 'foreign_keys', null);
		$custom_data = isset_default($options, 'custom_data', null);
		$custom_edit = isset_default($options, 'custom_edit', null);
		$custom_validation_rules = isset_default($options, 'custom_validation_rules', null);
		$primary_key = isset_default($options, 'primary_key', null);
		$upload = isset_default($options, 'upload', null);
		$upload_table = isset_default($options, 'upload_table', null);
		$upload_config = isset_default($options, 'upload_config', array());
		$upload_error_view = isset_default($options, 'upload_error_view', null);
		$additional_fields = isset_default($options, 'additional_fields', null);
		$hash = isset_default($options, 'hash', null);
		$delete_insert = isset_default($options, 'delete_insert', null);
		$updated_info = isset_default($options, 'updated_info', null);
		
		//try to load the model
		if($model != '' && !isset($this->$model)) { $this->load->model($model); }
		
		//validate the session (check first if this project is using the auth library
		if(isset($this->auth)) { $this->auth->validate($session); }
		
		//checks if form_validation is loaded
		if(!isset($this->form_validation)) { $this->load->library('form_validation'); }
		
		//initialize the validation rules
		if($custom_validation_rules == 'model') { $this->$model->validation_rules(); }
		else if($custom_validation_rules == 'db') { $this->validation_rules($table); }
		else { $this->load->view($view, $data, true); }
		
		//check captcha
		$captcha_passed = true;
		if(isset($_POST['recaptcha_response_field'])) {
			$this->recaptcha->recaptcha_check_answer();
			$captcha_passed = $this->recaptcha->getIsValid();
		}
		
		//test the input
		if($this->form_validation->run() == FALSE || !$captcha_passed) {
			if(!isset($data['values'])) {
				$data = $this->get_data($id, $table, $model, $custom_data, $data);
			}
			if($delete_insert != null && is_array($delete_insert) && sizeof($delete_insert) > 0) {
				foreach($delete_insert as $curr => $di) {
					foreach($di as $fk => $value) {
						$this->db->where($fk, $value);
					}
					$data['values'][$curr] = $this->db->get($curr)
											->result_array();
				}
			}
			$this->load->view($view, $data);
		}
		else {
			//updated_info
			if($updated_info != null) {
				$this->updated_info($additional_fields, $table, $updated_info);
			}
			//upload, if any
			if($upload != null && sizeof($_FILES) > 0 && strlen($_FILES[$upload]['name']) > 0) {
				$upload_data = $this->do_upload($upload, $upload_config);
				if(isset($upload_data['error'])) {
					$this->form_validation->set_errors(array($upload => $upload_data['error']));
					$this->load->view($view, $data);
					return;
				}
				if($upload_table != null) {
					$additional_fields[$upload_table][$upload] = $upload_data['file_name'];
				} else {
					$additional_fields[$upload] = $upload_data['file_name'];
				}
			}
			//check if model's custom edit procedure is preferred
			if($custom_edit) { $this->$model->edit($id); }
			//check if single table given, do standard update for that table
			else if(!is_array($table)) { 
				$this->update($id, $table, $model, $primary_key, $additional_fields, $hash);
			}
			//array of tables given, loop through array then update. //NOTE: this is not tested and unreliable
			else { 
				if($delete_insert != null && is_array($delete_insert) && sizeof($delete_insert) > 0) {
					foreach($delete_insert as $curr => $di) {
						$insert = $this->input->post($curr);
						//delete old dependent values
						foreach($di as $fk => $value) {
							$this->db->where($fk, $value);
						}
						$this->db->delete($curr);
						//insert new dependent values
						if($insert) {
							$fks = array();
							foreach($di as $fk => $value) {
								$fks[$fk] = $value;
							}
							$first_key = reset($insert);
							$n = sizeof($first_key);
							for($i = 0; $i < $n; ++$i) {
								$row = array();
								foreach($insert as $field => $value) {
									$row[$field] = $insert[$field][$i];
								}
								$row = array_merge($row, $fks);
								$this->db->insert($curr, $row);
							}
						}
					}
				}
				$curr = reset($table);
				$this->update($id, $curr, $model, $primary_key, isset_default($additional_fields, $curr, array()), isset_default($hash, $curr, null)); 
			}
			//redirect
			if($redirect != false) { redirect($redirect); }
			else { redirect($this->uri->uri_string().'/edited'); }
		}
	}
	
	public function do_upload($upload_field, $new_config = array()) {
		$config['upload_path'] = UPLOAD_PATH;
		$config['allowed_types']  = 'gif|jpg|png|bmp';
		$config['encrypt_name']  = true;
		$config['overwrite']  = false;
		$config = array_merge($config, $new_config);
		
		$this->load->library('upload', $config);	
		
		if($this->upload->do_upload($upload_field)) {
				return $this->upload->data();
		} else {
			return array('error' => $this->upload->display_errors());
		}
	}
	
	public function view($id, $table, $view, $options = array()) {
		//initialize options
		$data = isset($options['data'])?$options['data']:null;
		$session = isset($options['session'])?$options['session']:'';
		$model = isset($options['model'])?$options['model']:'';
		$custom_data = isset($options['custom_data'])?$options['custom_data']:false;
		
		//try to load the model
		if($model != '' && !isset($this->$model)) { $this->load->model($model); }
		
		//validate the session
		$this->auth->validate($session);
		
		//GET THE DATA
		$data = $this->get_data($id, $table, $model, $custom_data, $data);
		
		//THEN SHOW
		//nothing posted yet or input invalid; show input form again with data
		$this->load->view($view, $data);
	}
	
	//single table search. unfortunately, no joins unless w/ custom query
	public function search($table, $options = array()) {
		
		$this->load->helper('magis');
		//set defaults
		$search_form = isset_default($options, 'search_form', 'magis/form');
		$results_page = isset_default($options, 'results_page', 'magis/table_page');
		$DB = isset_default($options, 'DB', $this->db);
		$_options = array('form_view_data', 'results_view_data', 'results_fields', 'validation_rules', 'query', 'results_hide_id');
		foreach($_options as $_option) {
			$$_option = isset_default($options, $_option, null);
		}
		
		if($results_fields == null) {
			$results_fields = isset_default($options, 'results_fields', $this->_list_fields($table));
			$pk = $results_fields[0];
			unset($results_fields[0]);
			$results_fields[] = $pk;
		}
		
		//form_validation rules
		if($validation_rules == null) {
			$this->load->view($search_form, $form_view_data, true);
		} else {
			$this->form_validation->set_rules($validation_rules);
		}
		
		if($this->form_validation->run() == FALSE) {
			$this->load->view($search_form, $form_view_data);
		} else {
			//search DB
			$terms = $this->input->post($table);
			if($query != null) {
				$table = $DB->query($query)->result_array();
			} else {
				$table = $DB->select($results_fields)
							->like($terms)
							->get($table)
							->result_array();
				
			}
			$results_view_data['table'] = $table;
			$this->load->view($results_page, $results_view_data);
		}
	}
	
	/*
	public function delete($id, $table, $view, $options = array()) {
		//initialize options
		$data = isset($options['data'])?$options['data']:null;
		$session = isset($options['session'])?$options['session']:'';
		$model = isset($options['model'])?$options['model']:'';
		$custom_data = isset($options['custom_data'])?$options['custom_data']:false;
		$customTemplate = isset($options['customTemplate'])?$options['customTemplate']:false;
		
		//try to load the model
		if($model != '' && !isset($this->$model)) { $this->load->model($model); }
		
		if(isset($this->auth)) { $this->auth->validate($session); }
		
		if(!isset($this->form_validation)) { $this->load->library('form_validation'); }
		
		//get the data
		$data = $this->get_data($id, $table, $model, $custom_data, $data);
		$this->load->view($view, $data);
	} */
	
	/* supports: 
	 * 1. deleting multiple tables with dependencies
	 * 2. deleting a single table
	 * options:
	 * $foreign_keys = associative array of dependent tables and their FK's. assumes that tables are dependent on main table's PK. structure: $foreign_keys['table'] = 'foreignkey'
	 * $table = table where row with specified id is to be deleted. can be an array of tables.
	 * $session = what type of user validation would you like? '' for none, 'admin' for validateAdmin, 'session' for validateSession
	 * $model = the model to be imported. expect to have a delete function when customDelete is set to true
	 */
	public function delete($table, $id, $redirect, $options = array()) {
		$data = isset_default($options, 'data', null);
		$session = isset_default($options, 'session', null);
		$foreign_keys = isset_default($options, 'foreign_keys', null);
		$primary_key = isset_default($options, 'primary_key', 'id');
		$model = isset_default($options, 'model', null);
		$customDelete = isset_default($options, 'customDelete', null);
		
		//try to load the model
		if($model != '' && !isset($this->$model)) { $this->load->model($model); }
		
		$this->auth->validate($session);
		
		//check if customDelete is set
		if($customDelete) { 
			$this->$model->customDelete($id); 
		}
		//if single table is set, do standard delete function
		else if(!is_array($table)) {
			//check if MY_Model will suffice (i.e. $model given points to $table are the same)
			if($model != '' && $table == $this->$model->table()) { 
				$this->$model->delete($id); 
			}
			//unfortunately no, so do manual delete
			else {
				/* $this->_add_pk_to_where($table, $id); */
				$this->db->where($primary_key, $id)
						->delete($table);
			}
		}
		//array of tables given
		else {
			foreach($table as $curr) {
				if(isset($foreign_keys[$curr])) { $this->db->where($foreign_keys[$curr], $id); }
				else { $this->_add_pk_to_where($curr, $id); }
				$this->db->delete($curr);
			}
		}
		
		redirect($redirect);
	}
	
	/* 
	 * $view = name of view files
	 * $table = DB table name. can be an ordered array of tables (data will be inserted in order)
	 * $headers = array of human-readable headers for the manage table
	 * $columns = array of field_names for the manage table (first should be PK [will be invisible])
	 * $data = initial data array to be passed to the view file
	 * $model = MY_model to be imported
	 * $session = what type of user validation would you like? '' for none, 'admin' for validateAdmin, 'session' for validateSession
	 * $foreign_keys = associative array with foreign key field names as keys and the array('table' => 'referredtotable', 'field' => PKfield) as value
	 * $orderBy = by what field do you want manage rows to be in order when displayed
	 */
	public function manage($view, $table, $headers, $options) {
		//initialize options
		$data = isset($options['data'])?$options['data']:null;
		$model = isset($options['model'])?$options['model']:'';
		$headers = isset($options['headers'])?$options['headers']:'';
		$columns = isset($options['columns'])?$options['columns']:'';
		$session = isset($options['session'])?$options['session']:'';
		$foreign_keys = isset($options['foreign_keys'])?$options['foreign_keys']:'';
		$customManage = isset($options['customManage'])?$options['customManage']:false;
		$orderBy = isset($options['orderBy'])?$options['orderBy']:'';
		
		$data['header'] = $headers;
		$this->auth->validate($session);
		
		//try to load the model
		if($model != '' && !isset($this->$model)) { 
			$this->load->model($model); 
		}
		
		//check if $model's custom manage is preferred
		if($customManage) { 
			$this->$model->manage(); 
		}
		//check if single table is entered, then do standard import
		else if(!is_array($table)) {
			$this->db->select($columns)->from($table);
			if(is_array($foreign_keys) && sizeof($foreign_keys) > 0) {
				foreach($foreign_keys as $fk => $ref) {
					$this->db->from($ref['table'])->where($fk, $ref['field']);
				}
			}
			if($orderBy != '') { $this->db->orderBy($orderBy); }
			$result = $this->db->get();
			$data['table'] = $result->result_array();
		}
		
		$this->load->view($view, $data);
	}
	
	public function created_info(&$additional_fields, $table, $created_info) {
		//set created_info
		$created_by = $this->session->userdata('id');
		$created_on = date(MYSQL_DATETIME_FORMAT);
		if(is_array($created_info)) {
			if(is_array($table)) {
				foreach($created_info as $ci_table) {
					$additional_fields[$ci_table]['created_by'] = $created_by;
					$additional_fields[$ci_table]['created_on'] = $created_on;

				}
			} else {
				$additional_fields['created_by'] = $created_by;
				$additional_fields['created_on'] = $created_on;
			}
		} else if($created_info === TRUE) {
			if(is_array($table)) {
				foreach($table as $curr) {
					$additional_fields[$curr]['created_by'] = $created_by;
					$additional_fields[$curr]['created_on'] = $created_on;
				}
			} else {
				$additional_fields['created_by'] = $created_by;
				$additional_fields['created_on'] = $created_on;
			}
		}
	}
	
	public function updated_info(&$additional_fields, $table, $updated_info) {
		//set updated_info
		$updated_by = $this->session->userdata('id');
		if(is_array($updated_info)) {
			if(is_array($table)) {
				foreach($updated_info as $ci_table) {
					$additional_fields[$ci_table]['updated_by'] = $updated_by;
				}
			} else {
				$additional_fields['updated_by'] = $updated_by;
			}
		} else if($updated_info === TRUE) {
			if(is_array($table)) {
				foreach($table as $curr) {
					$additional_fields[$curr]['updated_by'] = $updated_by;
				}
			} else {
				$additional_fields['updated_by'] = $updated_by;
			}
		}
	}
	
	/*
	 * inserts for two possible scenarios: 
	 * * standard - an associative array with fields (e.g. table[field])
	 * * an associative array of ordered arrays. this means that the table has multiple entries in one form/submission
	 */
	private function insert($table, $input, $foreign_keys = array(), $ids = array(), $additional_fields = array(), $table_alias = array(), $hash = null) {
		
		if($input || isset($additional_fields[$table])) {
			$first_key = false;
			if(is_array($input) && sizeof($input) > 0) {
				$first_key = reset($input);
			}
			
			if(is_array($first_key)) {
				$numRows = sizeof($first_key);
				$keys = array_keys($input);
				for($i = 0; $i < $numRows; ++$i) {
					$row = array();
					foreach($input as $field => $value) {
						$row[$field] = $input[$field][$i];
					}
					
					$row = $this->insert_fk($table, $row, $foreign_keys, $ids, $additional_fields, $hash);
					if(isset($table_alias[$table])) {
						$table = $table_alias[$table];
					}

					$this->db->insert($table, $row);
				}
			}
			//standard mode: associative array with fields
			else {
				$input = $this->insert_fk($table, $input, $foreign_keys, $ids, $additional_fields, $hash);
				if(isset($table_alias[$table])) {
					$table = $table_alias[$table];
				}
				$this->db->insert($table, $input);
			}
		}
	}
	
	/*
	 * does proper update function, depending if $model is for $table, else use standard db->update (finding the PK name)
	 */
	private function update($id, $table, $model = '', $primary_key = '', $additional_fields = null, $hash = null) {
		//get inputs from user and update
		$input = $this->input->post($table);
				
		if($model != '' && $table == $this->$model->table()) { 
			$this->$model->update($id, $input); 
		}
		else {
			//check if table.id exists
			if(isset($input['id'])) { 
				$this->db->where('id', $input['id']); 
			}
			else { //No. Get the PK manually. NOTE: this is very slow! suggest to just have table's PK as id. more convenient with MY_models ;)
				$key = ($primary_key != '')?$primary_key:$this->_get_pk_name($table);
				//$id = $input[$key];
				$this->db->where($key, $id);
			}
			if(isset($additional_fields) && is_array($additional_fields)) {
				$input = array_merge($input, $additional_fields);
			}
			if(isset($hash) && is_array($hash) && sizeof($hash) > 0) {
				$input = $this->hash($input, $hash);
			}
			
			$this->db->update($table, $input);
		}
	}
	
	public function get_attribute($table, $column, $id) {
		$row = $this->db->query('SELECT '.$column.' FROM '.$table.' WHERE id='.$id.' LIMIT 1')->row();
		return isset($row->$column) ? $row->$column : FALSE;
	}
	
	private function _list_fields($table, $exclude_fields = null, $remove_id = false) {
		$fields = $this->db->list_fields($table);
		if($remove_id) {
			unset($fields[0]);
		}
		if(is_array($exclude_fields)) {
			foreach($exclude_fields as $e) {
				$key = array_search($e, $fields);
				if(($key = array_search($e, $fields)) !== false) {
					unset($fields[$key]);
				}
			}
			return array_values($fields);
		}
		return $fields;
	}
	
	private function _get_pk_name($table) {
		$fields = $this->db->field_data($table);
							
		foreach($fields as $field) {
			if($field->primary_key) {
				return $field->name;
			}
		}
	}
	
	private function _add_pk_to_where($table, $id) {
		//check if 'id' exists as a fieldname in table
		if($this->db->field_exists('id', $table)) { 
			$this->db->where('id', $id); 
		} else { //not 'id', so get the PK name manually :(
			$this->db->where($this->_get_pk_name($table),$id); 
		}
	}
	
	public function get_data($id, $table, $model = '', $custom_data = false, $data = array()) {
		//GET THE DATA
		//check if custom data is preferred
		if($custom_data) { 
			$data[$table] = $this->$model->data($id); 
		}
		//check if single table is entered. do normal procedure
		else { //if(!is_array($table))
			//check if model and table are the same
			if($model != '' && $table == $this->$model->table()) { 
				$data['values'] = $this->$model->get_by($id); 
			} else { //else, just use potentially slower algorithm: find the primary key's name @_@
				$curr = $table;
				if(is_array($table)) {
					$curr = reset($table);
				}
				$this->_add_pk_to_where($curr, $id);
				$result = $this->db->get($curr);
				$data['values'] = $result->row_array();
			}
		}
		
		
		return $data;
	}
	
	public function validation_rules($table) {
		if(is_array($table)) {
			foreach($table as $t) { 
				$this->validation_rules($t); 
			}
		} 
		else {
			$fields = $this->db->field_data($table);

			foreach ($fields as $field) {
				$rule = ($field->max_length != '' && $field->max_length != null)?'max_length['.$field->max_length.']':'';
				if($field->type == 'int') {
					if($rule != '') { 
						$rule .= '|'; 
					}
					$rule .= 'is_int';
				} 
				else if($field->type == 'double') {
					if($rule != '') { 
						$rule .= '|'; 
					}
					$rule .= 'is_numeric';
				}
				$this->form_validation->set_rules($table.'['.$field->name.']', $field->name, $rule);
			}
		}
	}
	
	/*
	 * adds the value of a particular foreign key
	 * $table - name of the table
	 * $input - associative array representing the row
	 * $foreign_keys - 2d array listing foreign keys and their referenced tables
	 * $ids - associative array: key - table name, value - last entered id
	 */
	private function insert_fk($table, $input, $foreign_keys, $ids, $additional_fields, $hash)
	{
		//see if there is any foreign key and add referenced data
		if(isset($foreign_keys[$table])) {
			foreach($foreign_keys[$table] as $foreignkey => $referenced) {
				$input[$foreignkey] = $ids[$referenced];
			}
		}
		
		if(is_array($additional_fields) && sizeof($additional_fields) > 0) {
			$first_key = reset($additional_fields);
			if(is_array($first_key)) { //if this is true, then it's additional_fields[table][column] = value
				if(isset($additional_fields[$table]) && is_array($additional_fields[$table])) {
					$input = array_merge($input, $additional_fields[$table]);
				}
			} else { //else, it's additional_fields[column] = value
				$input = array_merge($input, $additional_fields);
			}
		}
		
		if(isset($hash[$table])) {
			$input = $this->hash($input, $hash[$table]);
		}
		
		return $input;
	}
	
	//hashs a part of an input set (to be inserted or updated into the DB)
	public function hash($input, $hash, $algo = 'md5') {
		if(isset($hash)) {
			if(is_array($hash)) {
				foreach($hash as $e) {	
					$input[$e] = do_hash($input[$e], $algo);
				}
			} else {
				$input[$hash] = do_hash($input[$hash], $algo);
			}
		}
		return $input;
	}
	
	
}
