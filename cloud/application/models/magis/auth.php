<?php
class Auth extends CI_Model {
	
	/*
	 * login forms must have the following name-value pairs: username, password
	 */
	function login($options = array()) {
		$redirect = isset_default($options, 'redirect', '');
		$view = isset_default($options, 'view', 'login');
		$view_data = isset_default($options, 'view_data', array());
		
		$store_privileges = isset_default($options, 'store_privileges', true);
		$roles_table = isset_default($options, 'roles_table', 'user_roles');
		$privileges_table = isset_default($options, 'privileges_table', 'user_privileges');
		$roles_privileges_table = isset_default($options, 'roles_privileges_table', 'roles_privileges');
		$user_roles_table = isset_default($options, 'user_roles_table', 'users_user_roles');
		
		$users_table = isset_default($options, 'users_table', 'users');
		$username_column = isset_default($options, 'username_column', 'email');
		$password_column = isset_default($options, 'password_column', 'password');
		
		//initialize form validation rules
		$this->form_validation->set_rules($users_table.'['.$username_column.']', 'Log-in Email', 'required');
		$this->form_validation->set_rules($users_table.'['.$password_column.']', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			//no data submitted or invalid submit. just show the log-in form
			$this->load->view($view, $view_data);
		} else {
			$login = $this->input->post($users_table);
			//valid data submitted, now check if correct username and pword
			$account = $this->validate_account($login);
			if($account->num_rows() > 0) {
				//valid user. get info
				$user = $account->row_array();
				
				//store user info in session
				foreach($user as $key => $value) {
					$this->session->set_userdata($key, $value);
				}
				
				if($store_privileges) {
					//retrieve roles, then retrieve user privileges
					$user_id = $user['id'];
					$privileges = $this->db->query("SELECT DISTINCT uri
													FROM $privileges_table, $roles_privileges_table
													WHERE $privileges_table.id=$roles_privileges_table.privilege_fk
														AND role_fk 
															IN (SELECT user_role_fk
																FROM $user_roles_table
																WHERE user_fk=$user_id)")
											->result_array();
					$privileges_json = array();
					foreach($privileges as $p) {
						$privileges_json[] = $p['uri'];
					}
					$this->session->set_userdata('privileges', $privileges_json);
				}
				
				//now redirect to success page
				redirect($redirect);
			} else {
				//show error
				$view_data['validation_errors'] = "Invalid username/password.";
				$this->load->view($view, $view_data);
			}
		}
	}
	
	public function signup() {
		$this->load->model('Magis/crud');
		
		if($message == 'added') { $options['data']['message'] = 'You have successfully signed up! Wait for Admin\'s approval before you can use your account :)'; }
		
		$view = 'users/signup';
		$table = array('users', 'user_groups');
		$options['foreign_keys']['user_groups']['user_id'] = 'users';
		$options['foreign_keys']['user_groups']['assigned_by'] = 'users';
		$options['redirect'] = 'home';
		
		$this->crud->add($view, $table, $options);
	}
	
	/*
	 * default logout procedure
	 */
	public function logout($redirect = '') {
		$this->session->sess_destroy();
		redirect($redirect);
	}
	
	public function has_privileges($partial_privilege_uri) {
		if(TEST_MODE === TRUE) {
			return true;
		}
		$privileges = $this->session->userdata('privileges');
		if(is_array($privileges) && sizeof($privileges) > 0) {
			foreach($privileges as $p) {
				if(strpos($p, $partial_privilege_uri) !== FALSE) {
					return true;
				}
			}
		}
		return false;
	}
	
	public function check_privilege($privilege_uri = '') {
		if(TEST_MODE === TRUE) {
			return true;
		}
		if(strlen($privilege_uri) == 0) {
			$privilege_uri = uri_string();
		}
		$privileges = $this->session->userdata('privileges');
		if(is_array($privileges) && sizeof($privileges) > 0) {
			foreach($privileges as $p) {
				if(strpos($privilege_uri, $p) !== FALSE) {
					return true;
				}
			}
		}
		return false;
	}
	
	public function enforce_privilege($privilege_uri = '', $redirect = 'home/logout') {
		if(TEST_MODE === TRUE) {
			return true;
		}
		if(strlen($privilege_uri) == 0) {
			$privilege_uri = uri_string();
		}
		$privileges = $this->session->userdata('privileges');
		if(is_array($privileges) && sizeof($privileges) > 0) {
			foreach($privileges as $p) {
				if(strpos($privilege_uri, $p) !== FALSE) {
					return true;
				}
			}
		}
		redirect($redirect);
	}
	
	public function in_array($array_key, $value) {
		$array = $this->session->userdata($array_key);
		return is_array($array) 
				&& sizeof($array)
				&& in_array($value, $array);
	}
	
	public function enforce_login() {
		if(!$this->auth->is_logged_in()) {
			redirect('home/login');
		}
	}
	
	/*
	public function has_privilege($privilege = '') {
		if(is_array($privilege) && sizeof($privilege) > 0) {
			$privileges = $this->session->userdata('privileges');
			foreach($privilege as $p) {
				if(isset($privileges[$p])) {
					return true;
				}
			}
			return false;
		}
		if (strlen($privilege) > 0) {
			$privileges = $this->session->userdata('privileges');
			return isset($privileges[$privilege]);
		}
	}
	
	public function validate_privilege($privilege = '', $redirect = 'home/login') {
		$this->validate_session();
		if($this->has_privilege($privilege) == false) {
			redirect($redirect);
		}
	}
	*/
	
	/*
	 * generic log-in/log-out displayed depending on whether a user is logged in
	 */
	function log_link() {
		$user_role = $this->session->userdata("user_role");
		if(!isset($user_role) || $user_role == '') {
			echo '<a href="'.redirect('welcome/login').'" >Log-in</a>';
		} else {
			echo '<a href="'.redirect('welcome/logout').'" >Log-out</a>';
		}
	}
	
	/*
	 * get a user attribute. e.g. $this->auth->userInfo('user_role');
	 * returns false if user attribute is not set or if user is not logged in.
	 */
	function user_info($attr) {
		$info = $this->session->userdata($attr);
		if(strlen($info) > 0) {
			return $info;
		} else {
			return false;
		}
	}
	
	/*
	 * checks if username and password combination exists in DB
	 * returns query result object
	 */
	function validate_account($login) {
		$login['password'] = do_hash($login['password'], 'md5');
		$query = $this->db->where($login)
						->get('users');
		return $query;
    }
	
	/*
	 * validates if a user is logged in; if not, redirect to log-in
	 * $checkAttr - the attribute used to check whether user is logged in. e.g. role_name
	 * $redirect - where to redirect if user is not logged in
	 * returns the value of the $checkAttr
	 */
	function validate_session($redirect = 'home/login') {
		//if user is not logged in, destroy session and redirect
		if(!$this->is_logged_in()) {
			$this->session->sess_destroy();
			redirect($redirect);
		}
	}
	
	/*
	 * validate is a switch between different types of validate methods
	 */
	public function validate($mode = '') {
		if($mode == '' || $mode == false) {
			//do nothing
		} else if($mode === true) {
			$this->validate_session();
		} else {
			$this->validate_privilege($mode);
		}
	}
	
	public function is_logged_in() {
		return $this->session->userdata('id') != '';
	}
	
	public function user_attr($attr) {
		return $this->session->userdata($attr);
	}
}
?>