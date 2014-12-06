<?php
class Users_model extends MY_Model {
	
	protected $_children_model_name = 'users/roles_model';
	protected $_children_assoc_table = 'user_roles';
	protected $_module_home = 'users/users';
	protected $_exclude_fields = array('password', 'encoded_by', 'encoded_on', 'updated_by', 'updated_on');
	
}
?>