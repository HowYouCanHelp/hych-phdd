<?php
class User_privileges_model extends MY_Model {
	
	protected $_children_model_name = 'users/user_roles_model';
	protected $_children_assoc_table = 'roles_privileges';
	protected $_children_assoc_column = 'privilege_fk';
	protected $_children_assoc_child_column = 'role_fk';
	protected $_module_home = 'users/user_privileges';
	protected $_human_singular = 'Admin Privilege';
	
	public function before_add() {
		$this->auth->enforce_privilege();
		parent::before_add();
	} 
	
	public function before_edit($id) {
		$this->auth->enforce_privilege();
		parent::before_edit($id);
	}
	
	public function before_delete() {
		$this->auth->enforce_privilege();
		parent::before_delete();
	}
}
?>