
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists('validate_int')) {
	//checks if string is a numeric string AND an integer, unlike native is_int that returns false if variable type is string
	function validate_int($string, $required = false, $min_range = 0, $max_range = null) {
		//remove commas bec filter_validate_int returns false
		$string = str_replace(',', '', $string); 
		//if string is empty, string is valid if $required == false
		if($string == '' || $string == null) { 
			return !$required; 
		}
		//finally, validate
		return (filter_var($string, FILTER_VALIDATE_INT, array('min_range' => 0)) != false);
	}
}

if(!function_exists('isset_default')) {
	//if key exists in given array, get the value of the key. else, return default.
	function isset_default($array, $key, $default = null) {
		return isset($array[$key])?$array[$key]:$default;
	}
}

if(!function_exists('fill_defaults')) {
	//adds default values from $defaults in keys not specified in $given
	//for security, removes keys that are not in $default
	function fill_defaults($defaults, $given) {
		foreach($defaults as $key => $default) {
			if(isset($given[$key])) {
				$defaults[$key] = $given[$key];
			}
		}
		return $defaults;
	}
}

if(!function_exists('replace_blank')) {
	//replaces a value with a default value if the value is null or an empty string ('')
	function replace_blank($value, $default) {
		return ($value == null || $value == '')?$default:$value;
	}
}
	
if(!function_exists('try_load')) {
	function try_load($model, $class = 'model') {
		$name = explode('/', $model);
		$name = $name[sizeof($name) - 1];
		if(!isset($this->$name)) { $this->load->$class($model); }
	}
}

if(!function_exists('db_key_value_array')) {	
	function db_key_value_array($table, $key_column = 'id', $value_column = 'name', $where = null, $DB = null) {
		if(!isset($DB)) { $DB = $this->db; }
		if(isset($where)) { $DB->where($where); }
		$result = $DB->select($key_column.','.$value_column)->get($table)->result_array();
		$item = array();
		foreach($result as $row) {
			$item[$row[$key_column]] = $row[$value_column];
		}
		return $item;
	}
}

if(!function_exists('human_date')) {	
	function human_date($date = null, $has_time = false) {
		$format = 'F j, Y'.($has_time?' g:i:s A':'');
		return date($format, strtotime($date));
	}
}

if(!function_exists('sql_date')) {	
	function sql_date($date = null, $has_time = false) {
		return date('Y-n-j H:i:s', strtotime($date));
	}
}
?>