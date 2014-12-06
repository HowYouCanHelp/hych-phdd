<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//extends the form validation library with an additional method for rule setting
class MY_Form_validation extends CI_Form_Validation {
	
	public function rule_set($field) {
		return isset($this->_field_data[$field]['rules']);
	}
	
	function set_errors($fields) {
	    if (is_array($fields) and count($fields)) {
            foreach($fields as $key => $val) {
				$this->set_rules($key);
				$this->_field_data[$key]['error'] = $val;
				$this->_error_array[$key] = $val;
            }
        }
    }
	
	public function debug_field_data() {
		print_r($this->_field_data);
	}
	
	public function clear_field_data() {
        $this->_field_data = array();
        return $this;
    }
	
}
// END Form Validation Class

/* End of file Form_validation.php */
/* Location: ./system/libraries/Form_validation.php */
