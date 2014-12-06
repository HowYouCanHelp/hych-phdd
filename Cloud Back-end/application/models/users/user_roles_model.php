<?php
class User_roles_model extends MY_Model {
	
	protected $_children_model_name = 'users/user_privileges_model';
	protected $_children_assoc_table = 'roles_privileges';
	protected $_children_assoc_column = 'role_fk';
	protected $_children_assoc_child_column = 'privilege_fk';
	protected $_module_home = 'users/user_roles';
	
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