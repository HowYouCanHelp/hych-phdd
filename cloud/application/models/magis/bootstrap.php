<?php
class Bootstrap extends CI_Model {
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->helpers('magis');
    }
	
	public function set_rule($name, $label, $rules) {
		$rule_set = $this->form_validation->rule_set($name);
		
		if( !$rule_set ) {
			$this->form_validation->set_rules($name, $label, $rules);
		}
		
		return $rule_set;
	}
	
	public function set_values($rule_set, $name, $column, $values) {
		$val = '';
		if(isset($values[$column])) 
		{ 
			$val = $values[$column];
		}
		else if( $rule_set )
		{
			$val = set_value($name); 
		}
		return $val;
	}
	
	public function show_error($rule_set, $name) {
		if($rule_set) {
			$error = form_error($name);
			if($error != '') {
				return $this->alert($error);
			}
		}
		return '';
	}
	
	public function recaptcha() {
		//load recaptcha library
		$this->load->library('recaptcha'); 
		//add recaptcha
		$html = '<center>';
		if(isset($_POST['recaptcha_response_field'])) {
			if(!$this->recaptcha->getIsValid()) {
				$html .= $this->alert('Captcha Invalid');
			}
		}
		$html .= $this->recaptcha->recaptcha_get_html().'</center>';
		
		return $html;
	}
	
	public function modal($id, $body, $options = array()) {
		$title = isset_default($options, 'title', null);
		$submit_button = isset_default($options, 'submit_button', null);
		$ok_button = isset_default($options, 'ok_button', null);
		$cancel_button = isset_default($options, 'cancel_button', null);
		$form_action = isset_default($options, 'form_action', null);
		$modal_modifier_class = isset_default($options, 'modal_modifier_class', '');
		
		$modal_footer = '';
		if(strlen($submit_button) > 0 || strlen($ok_button) > 0 || strlen($cancel_button) > 0) {
			$submit_html = (strlen($submit_button) > 0) ? '<input type="submit" class="btn btn-primary" value="'.$submit_button.'" />' : '';
			$ok_html = (sizeof($ok_button) > 0) ? anchor($ok_button['link'], $ok_button['text'], isset_default($ok_button, 'attr', '')) : '';
			$cancel_html = (strlen($cancel_button) > 0) ? '<button type="button" class="btn btn-default" data-dismiss="modal">'.$cancel_button.'</button>' : '';
			
			$modal_footer=<<<EOT
<div class="modal-footer">
	$submit_html
	$ok_html
	$cancel_html
</div>
EOT;
		}
		
		$modal_header = '';
		if(strlen($title) > 0) {
			$modal_header=<<<EOT
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">$title</h4>
</div>
EOT;
		}
		
		$html=<<<EOT
<div class="modal fade" id="$id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog $modal_modifier_class">
	<form class="modal-content" action="$form_action" method="post">
	  $modal_header
	  <div class="modal-body">
		$body
	  </div>
	  $modal_footer
	</form>
  </div>
</div>
EOT;
		return $html;
	}
	
	public function location($label, $table, $column, $map, $options = array()) {
		$html = '<center>Drag the marker to the location</center>';
		$html .= $map['html'];
		$html .= '<center>Drag the marker to the location or enter the coordinates below.</center>';
		$html .= '<br/>';
		$html .= $this->textfield_horizontal($label, $table, $column, $options);
		return $html;
	}
	
	public function textfield_vertical($label, $table, $column, $options = array()) {
		$rules = isset_default($options, 'rules', (TEXTFIELD_REQUIRED_DEFAULT ? 'required|trim|max_length[255]' : 'trim|max_length[255]'));
		$values = isset_default($options, 'values', null);
		$input_class = isset_default($options, 'input_class', '');
		$type = isset_default($options, 'type', 'text');
		$attr = isset_default($options, 'attr', '');
		$show_label = isset_default($options, 'show_label', true);
		
		$name = ($table != '')?$table.'['.$column.']':$column;
		$rule_set = $this->set_rule($name, $label, $rules);
		$val = $this->set_values($rule_set, $name, $column, $values);
		$attr = $this->_set_rule_attr($type, $attr, $rules);
		
		if($type == 'datetime-local') {
			$val = date(DATETIME_LOCAL_FORMAT, strtotime($val));
		}
		if($type == 'date') {
			$val = date(HTML_DATE_FORMAT, strtotime($val));
		}
		$html = '<div class="form-group">';
		if($show_label) {
			$html .= '<label>'.$label.'</label>';
		}
		$html .= '<input type="'.$type.'" name="'.$table.'['.$column.']" placeholder="'.$label.'" value="'.$val.'" class="form-control '.$input_class.'">'
				.'</div>'
				.$this->show_error($rule_set, $name);
		
		return $html;
	}
	
	public function textfield_horizontal($label, $table, $column, $options = array()) {
		$rules = isset_default($options, 'rules', (TEXTFIELD_REQUIRED_DEFAULT ? 'required|trim|max_length[255]' : 'trim|max_length[255]'));
		$values = isset_default($options, 'values', null);
		$input_class = isset_default($options, 'input_class', '');
		$label_class = isset_default($options, 'label_class', 'col-md-3 control-label text-right');
		$input_container_class = isset_default($options, 'input_container_class', 'col-md-9');
		$type = isset_default($options, 'type', 'text');
		$attr = isset_default($options, 'attr', '');
		
		if($type != 'file') {
			$name = ($table != '' || $table != null)?$table.'['.$column.']':$column;
			$rule_set = $this->set_rule($name, $label, $rules);
		} else {
			$name = $column;
			$rule_set = true;
		}
		$val = $this->set_values($rule_set, $name, $column, $values);
		$attr = $this->_set_rule_attr($type, $attr, $rules);
		
		if($type == 'datetime-local') {
			$val = date(DATETIME_LOCAL_FORMAT, strtotime($val));
		}
		if($type == 'date') {
			$val = date(HTML_DATE_FORMAT, strtotime($val));
		}
		$html='<div class="form-group">'
			.'<label class="'.$label_class.'" for="'.$column.'">'.$label.'</label>'
			.'<div class="'.$input_container_class.'" style="margin-bottom:5px;">'
			.'<input type="'.$type.'" class="form-control '.$input_class.'" placeholder="'.$label.'" name="'.$name.'" value="'.$val.'" id="'.$column.'" '.$attr.' />'
			.$this->show_error($rule_set, $name)
			.'</div></div>';
			
		
		return $html;
	}
	
	public function textfield_with_label($label, $table, $column, $options = array()) {
		$rules = isset_default($options, 'rules', (TEXTFIELD_REQUIRED_DEFAULT ? 'required|trim|max_length[255]' : 'trim|max_length[255]'));
		$values = isset_default($options, 'values', null);
		$input_class = isset_default($options, 'input_class', '');
		$type = isset_default($options, 'type', 'text');
		$attr = isset_default($options, 'attr', '');
		
		$name = ($table != '' || $table != null)?$table.'['.$column.']':$column;
		$rule_set = $this->set_rule($name, $label, $rules);
		$val = $this->set_values($rule_set, $name, $column, $values);
		$attr = $this->_set_rule_attr($type, $attr, $rules);
		
		if($type == 'datetime-local') {
			$val = date(DATETIME_LOCAL_FORMAT, strtotime($val));
		}
		if($type == 'date') {
			$val = date(HTML_DATE_FORMAT, strtotime($val));
		}
		
		$html='<div class="input-group" style="margin-top:5px;">
				  <span class="input-group-addon">'.$label.'</span>
				  <input type="'.$type.'" name="'.$name.'" class="form-control" value="'.$val.'" placeholder="'.$label.'" '.$attr.'>
				</div>'
			.$this->show_error($rule_set, $name);
		
		return $html;
	}
	
	public function textfield_inline($label, $table, $column, $options = array())
	{
		$rules = isset_default($options, 'rules', (TEXTFIELD_REQUIRED_DEFAULT ? 'required|trim|max_length[255]' : 'trim|max_length[255]'));
		$values = isset_default($options, 'values', null);
		$input_class = isset_default($options, 'input_class', 'form-control');
		$type = isset_default($options, 'type', 'text');
		$attr = isset_default($options, 'attr', '');
		
		$name = ($table != '')?$table.'['.$column.']':$column;
		$rule_set = $this->set_rule($name, $label, $rules);
		$val = $this->set_values($rule_set, $name, $column, $values);
		$attr = $this->_set_rule_attr($type, $attr, $rules);
		
		if($type == 'datetime-local') {
			$val = date(DATETIME_LOCAL_FORMAT, strtotime($val));
		}
		if($type == 'date') {
			$val = date(HTML_DATE_FORMAT, strtotime($val));
		}
		
		$html = "<input type='$type' class='$input_class' placeholder='$label' name='$name' value='$val' id='$column' $attr />"
				.$this->show_error($rule_set, $name);
		
		return $html;
	}
	
	public function textarea_inline($label, $table, $column, $options = array())
	{
		$rules = isset_default($options, 'rules', 'trim|max_length[255]');
		$values = isset_default($options, 'values', null);
		$input_class = isset_default($options, 'input_class', '');
		$style = isset_default($options, 'style', '');
		$attr = isset_default($options, 'attr', '');
		
		$name = ($table != '')?$table.'['.$column.']':$column;
		$rule_set = $this->set_rule($name, $label, $rules);
		$val = $this->set_values($rule_set, $name, $column, $values);
		$attr = $this->_set_rule_attr($type, $attr, $rules);
		
		return "<textarea class='form-control $input_class' style='$style' placeholder='$label' name='$name' id='$column' $attr >$val</textarea>";
	}
	
	public function textarea_horizontal($label, $table, $column, $options = array())
	{
		$rules = isset_default($options, 'rules', 'trim|max_length[255]');
		$values = isset_default($options, 'values', null);
		$input_class = isset_default($options, 'input_class', '');
		$label_class = isset_default($options, 'label_class', 'col-md-3 control-label text-right');
		$input_container_class = isset_default($options, 'input_container_class', 'col-md-9');
		$attr = isset_default($options, 'attr', '');
		
		$name = ($table != '')?$table.'['.$column.']':$column;
		$rule_set = $this->set_rule($name, $label, $rules);
		$val = $this->set_values($rule_set, $name, $column, $values);
		$attr = $this->_set_rule_attr($type, $attr, $rules);
		
		$html = '<div class="form-group">'
				.'<label class="'.$label_class.'" for="'.$column.'">'.$label.'</label>'
				.'<div class="'.$input_container_class.'" style="margin-bottom:5px;">'
				."<textarea class='form-control $input_class' $attr placeholder='$label' name='".$table.'['.$column."]' id='$column' >$val</textarea>"
				.'</div></div>';
		return $html;
	}
	
	public function wysihtml5($label, $table, $column, $options = array())
	{
		$container = isset_default($options, 'container', '');
		$height = isset_default($options, 'height', 300);
		//$width = isset_default($options, 'width', 480);
		$values = isset_default($options, 'values', null);
		
		$name = ($table != '')?$table.'['.$column.']':$column;
		$val = $this->set_values(true, $name, $column, $values);
		
		$html = '<legend>'.$label.'</legend>'
			.'<div class="'.$container.'" style="margin-bottom:5px;">'
			.'<textarea class="form-control wysihtml5" id="'.$column.'" style="height:'.$height.'px; " name="'.$table.'['.$column.']" id="'.$column.'" >'.$val.'</textarea>'
			.'</div>';
		return $html;
	}
	
	public function option($label, $name, $options = array())
	{
		$container = isset_default($options, 'container', '');
		$type = isset_default($options, 'type', 'checkbox');
		$class = isset_default($options, 'class', '');
		$selected = isset_default($options, 'selected', '');
		$attr = isset_default($options, 'attr', '');
		
		$checked = '';
		if($selected != '')
		{
			$checked = 'checked';
		}
		else
		{
			if($type == 'checkbox' )
			{
				$checked = set_checkbox($name, $values);
			}
			else if($type == 'radio')
			{
				$checked = set_radio($name, $values);
			}
		}
		
		$form_error = form_error($name);
		if($form_error != false) {
			$form_error = $this->alert($error);
		}
		
		$html = "<label class='$type $class' $attr >"
				."<input class='form-control' type='$type' name='$name' id='$name' value='$values' $checked > $label"
				.'</label>'
				.$form_error;
		
		return $html;
	}
	
	public function alert($message, $contextual_class = 'alert-danger')
	{
		$html=<<<EOT
<br/>
<br/>
<br/>
<div class="col-md-12">
	<div class="alert $contextual_class">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  $message
	</div>
</div>
EOT;
		return $html;
	}
	
	public function list_option($name, $table, $class, $selected = '', $type = 'checkbox', $valuesfield = 'id', $namefield = 'name', $additionalWhere = null)
	{
		//pending: have option for adding where clause
		$result = $this->db->query("SELECT $valuesfield, $namefield FROM $table");
		foreach($result->result() as $option)
		{
			$checked = '';
			if($option->$valuesfield == $selected || (is_array($selected) && in_array($option->$valuesfield, $selected)))
			{
				$checked = 'checked';
			}
			
			$this->option($option->$namefield, $name, $option->$valuesfield, $type, $class);
		}
	}
	
	
	public function search($action, $name, $class='', $placeholder = 'Keyword Search')
	{
		?>
		<form class="form-search" action="<?php echo site_url($action); ?>" method="post">
			<div class="input-append">
				<input class="<?php echo $class; ?> search-query" type="text" placeholder="<?php echo $placeholder; ?>" name="<?php echo $name; ?>"/>
				<input type="submit" class="btn" values="Search" />
			</div>
		</form>
		<?php
	}
	
	public function dropdown_template($label, $dropdown) {
		$html = '<div class="control-group">';
		$html .= '<label class="control-label">'.$label.'</label>';
		$html .= '<div class="controls">';
		$html .= $dropdown;
		$html .= '</div></div>';
		return $html;
	}
	
	public function dropdown_horizontal($label, $table, $column, $list_table, $options = array())
	{
		$options['list_id'] = isset_default($options, 'list_id', 'id');
		$options['list_name'] = isset_default($options, 'list_name', 'name');
		$options['custom_query'] = isset_default($options, 'custom_query', '');
		$options['multiple'] = isset_default($options, 'multiple', false);
		$options['values'] = isset_default($options, 'values', null);
		$options['selected'] = isset_default($options, 'selected', null);
		$input_class = isset_default($options, 'input_class', '');
		$label_class = isset_default($options, 'label_class', 'col-md-3 control-label text-right');
		$input_container_class = isset_default($options, 'input_container_class', 'col-md-9');
		$attr = isset_default($options, 'attr', '');
		
		if(strlen($input_class) > 0) {
			$options['class'] = $input_class;
		}
		if(strlen($attr) > 0) {
			$options['attr'] = $attr;
		}
		if(strlen($table) > 0) {
			$options['table'] = $table;
		}
		if(strlen($column) > 0) {
			$options['column'] = $column;
		}
		
		$html='<div class="form-group">'
			.'<label class="'.$label_class.'" for="'.$column.'">'.$label.'</label>'
			.'<div class="'.$input_container_class.'" style="margin-bottom:5px;">'
			.$this->dropdown($label, $table, $column, $list_table, $options)
			.'</div></div>';
		return $html;
	}
	
	public function dropdown($label, $table, $column, $list_table, $options = array())
	{
		$list_id = isset_default($options, 'list_id', 'id');
		$list_name = isset_default($options, 'list_name', 'name');
		$list_where = isset_default($options, 'list_where', null);
		$custom_query = isset_default($options, 'custom_query', '');
		$items = isset_default($options, 'items', null);
		$class = isset_default($options, 'class', 'chosen');
		$attr = isset_default($options, 'attr', '');
		$selected = isset_default($options, 'selected', 0);
		$values = isset_default($options, 'values', null);
		$blank_placeholder = isset_default($options, 'blank_placeholder', false);
		$placeholder = isset_default($options, 'placeholder', null);
		$multiple = isset_default($options, 'multiple', false);
		$name = ($table != null) ? $table.'['.$column.']' : $column;
		$multiple_attr = '';
		if($multiple) {
			$name .= '[]';
			$multiple_attr = 'multiple="multiple"';
		}
		
		//single value
		if( isset($values[$column]) ) {
			$selected = $values[$column];
		} else {
			$selected = '';
		}
		
		//check if this is a DB result_array, then get the values only
		if(isset($values[$table]) && is_array($values[$table]) && is_array(reset($values[$table]))) {
			foreach($values[$table] as $row) {
				$selected[] = $row[$column];
			}
		}
		$n = sizeof($selected);
		
		//render the html
		$html = '<select title="'.$label.'" name="'.$name.'" class="form-control '.$class.'" id="'.$table.'-'.$column.'" '.$attr.' '.$multiple_attr.' >';
		
		if(strlen($placeholder) > 0) {
			$placeholder_selected = '';
			if(!is_array($selected) && $selected == '') {
				$placeholder_selected = 'selected';
			}
			$html .= '<option style="color:#B9B9B9" value="" '.$placeholder_selected.'>'.$placeholder.'</option>';
		}
		
		if($blank_placeholder) {
			$html .= '<option style="display:none;"></option>';
		}
		
		//get from the DB
		if(strlen($custom_query) > 0) {
			$query = $this->db->query($custom_query);
		} else if(is_array($items) && sizeof($items) > 0) {
			//do nothing?
			foreach($items as $key => $label) {
				//determine whether to put the 'selected' attribute
				$selected_attr = '';
				if(is_array($selected) && in_array($key, $selected)) {
					$selected_attr = 'selected';
				} else if( !is_array($selected) && strlen($selected) > 0 && $selected == $key ) {
					$selected_attr =  'selected';
				}
				
				$html .= '<option value="'.$key.'" '.$selected_attr.'>'.$label.'</option>';
			}
		} else {
			if($list_where != null) {
				if(is_array($list_where)) {
					$this->db->where($list_where);
				} else if(strlen($list_where) > 0) {
					$this->db->where($list_where, null, false);
				}
			}
			$query = $this->db->select(array($list_id, $list_name))
							->get($list_table);
		}
		
		if(isset($query)) {
			//loop through each row and render each option
			foreach($query->result_array() as $item) {
				//determine whether to put the 'selected' attribute
				$selected_attr = '';
				if(is_array($selected) && in_array($item[$list_id], $selected)) {
					$selected_attr = 'selected';
				} else if( $selected == $item[$list_id] ) {
					$selected_attr =  'selected';
				}
				
				//render the html
				$html .= '<option value="'.$item[$list_id].'" '.$selected_attr.'>'.$item[$list_name].'</option>';
			}
		}
		$html .= '</select>';
		
		return $html;
	}
	
	public function dateDropdown($class='', $future = false, $month = null, $day = null, $year = null)
	{
		echo $this->monthDropdown('month', ($month == null)?date('m'):$month, 'class="'.$class.'"');
		echo $this->dayDropdown('day', ($day == null)?date('j'):$day, 'class="'.$class.'"');
		echo $this->yearDropdown('year', ($year == null)?date('Y'):$year,$future, 'class="'.$class.'"');
		echo $this->validDay();
	}
	
	 public function yearDropdown($name='',$values='',$future = false, $class='')
    {
		if($future == false)
		{
			$years=date('Y')-120;
			while ( $years <= date('Y')){
				$year[$years]=$years;$years++;
			}
		}
		else
		{
			$years=date('Y')+120;
			while ( $years >= date('Y')){
				$year[$years]=$years;$years--;
			}
		}
        return form_dropdown($name, $year, $values, 'form-control '.$class);
    }
    
    public function monthDropdown($name='',$values='', $class='')
    {
        $month=array(
            '01'=>'January',
            '02'=>'February',
            '03'=>'March',
            '04'=>'April',
            '05'=>'May',
            '06'=>'June',
            '07'=>'July',
            '08'=>'August',
            '09'=>'September',
            '10'=>'October',
            '11'=>'November',
            '12'=>'December');
        return form_dropdown($name, $month, $values, 'form-control '.$class);
    }
	
	public function dayDropdown($name='',$values='', $class='')
    {
        $days='1';
        while ( $days <= '31'){
            $day[$days]=$days;++$days;
        }
        return form_dropdown($name, $day, $values, 'form-control '.$class);
    }
	
	public function validDay()
	{
		//magis_helpers.js MUST be loaded
		echo '<script>initUdd();</script>';
	}
	
	public function getMonthMax($month) {
		$max = array(
			'01'=>'31',
            '02'=>'29',
            '03'=>'31',
            '04'=>'30',
            '05'=>'31',
            '06'=>'30',
            '07'=>'31',
            '08'=>'31',
            '09'=>'30',
            '10'=>'31',
            '11'=>'30',
            '12'=>'31'
		);
	}
	
	//give array of arrays with the following keys: 'label' (optional), 'type', 'table', 'column', 'rules' (optional)
	public function array_to_form($inputs, $values = null) {
		$this->load->helper('inflector');
		foreach($inputs as $input) {
			//make sure label is human-readable first
			if(!isset($input['label'])) {
				$input['label'] = humanize($input['column'], 'ucwords');
			}
			//now
			if(isset($input['type']) && $input['type'] == 'textarea') {
				$this->textarea($input['label'], $input['table'], $input['column'], isset($input['rules'])?$input['rules']:'trim|max_length[255]', $values, isset($input['inputClass'])?$input['inputClass']:'');
			} else {
				$this->textfield_horizontal($input['label'], $input['table'], $input['column'],  isset($input['rules'])?$input['rules']:'trim|max_length[255]', $values, isset($input['inputClass'])?$input['inputClass']:'', isset($input['type'])?$input['type']:'text',  isset($input['attr'])?$input['attr']:'');
			}
		}
	}
	
	//give a table name and this function automatically prints a form
	public function table_to_form($table, $options = array()) {
		//check if helpers is loaded, else load
		$this->load->helpers('magis');
		$this->load->helpers('inflector');
		
		//initialize options or set to null
		$_options = array('values', 'required', 'textarea', 'class', 'DB', 'extra_rules', 'exclude', 'attr', 'wysihtml5', 'dropdown_options', 'dates', 'location', 'maps', 'fk', 'recaptcha');
		foreach($_options as $_o) {
			$$_o = isset_default($options, $_o, null);
		}
		
		//check if DB is given, else set to default DB
		if(!isset($DB)) {
			$DB = $this->db;
		}
		
		$rules = $this->rule_strings($table, $required, $extra_rules, $DB); //get rules
		
		$html = '';
		foreach($DB->list_fields($table) as $field) {
			if($field == 'id' || (isset($exclude) && in_array($field, $exclude))) { //check if in exclude_list
				continue;
			}
			$class = is_array($class)?$class[$field]:$class;
			if(isset($textarea) && in_array($field, $textarea)) {	
				$html .= $this->textarea_horizontal(humanize($field), $table, $field, array('rules' => $rules[$field], 
																							'values' => $values, 
																							'class' => $class));
			} else if( isset($wysihtml5) && in_array($field, $wysihtml5)) {
				$html .= $this->wysihtml5(humanize($field), $table, $field, array('values' => $values, 
																		'class' => $class));
			} else if( isset($location) && in_array($field, $location)) {
				$html .= $this->location(humanize($field), $table, $field, $maps[$field], array('values' => $values,
																								'class' => $class));
			} else if((isset($fk) && in_array($field, $fk)) || strpos($field, '_fk') !== FALSE ) {
				$lookup_table = str_replace('_fk', '', $field);
				$html .= $this->dropdown_horizontal(humanize($lookup_table), $table, $field, plural($lookup_table), array('values' => $values));
			} else {
				$type = 'text';
				if($field == 'password') {
					$type = 'password';
				} else if(strpos($field, '_path') !== FALSE || strpos($field, '_uri') !== FALSE ) {
					$type = 'file';
				} else if(strpos($field, 'date') !== FALSE || strpos($field, '_on') !== FALSE) {
					$type = 'date';
				} else if(strpos($field, 'datetime') !== FALSE || strpos($field, '_on') !== FALSE ) {
					$type = 'datetime-local';
				} 
				$html .= $this->textfield_horizontal(humanize($field), $table, $field, array('rules' => $rules[$field],
																							'values' => $values,
																							'class' => $class,
																							'type' => $type,
																							'attr' => isset($attr[$field])?$attr[$field]:''));
			}
			$class = '';
		}
		
		if(isset($recaptcha) && $recaptcha) {
			$html .= $this->recaptcha();
		}
		return $html;
	}
    
	//$extra_rules prototype: $extra_rules['fieldname'] = 'rule_name';
	public function rule_strings($table, $required = null, $extra_rules = null, $DB = false, $fields = null) {
		if(!$DB) {
			$DB = $this->db;
		} 
		if(!isset($fields)) {
			$fields = $DB->field_data($table);
		}
		$field_rules = array();
		foreach($fields as $field) {
			$rules = array();
			$rules[] = 'trim';
			//check if required
			if(is_array($required) && in_array($field->name, $required)) {
				$rules[] = 'required';
			}
			if($field->name == 'email') {
				$rules[] = 'valid_email';
			}
			//check for extra rules
			if(isset($extra_rules[$field->name])) {
				$rules[] = $extra_rules[$field->name];
			}
			//check for numeric rules
			if($field->type == 'int') { 
				$rules[] = 'callback_is_int';
			} else if($field->type == 'double') {
				$rules[] = 'is_numeric';
			}
			//set max length
			if($field->max_length != '' && $field->max_length != null) {
				$rules[] = 'max_length['.$field->max_length.']';
			}
			//get rule string
			$rules = implode('|', $rules);
			//store rule string to field name
			$field_rules[$field->name] = $rules;
			unset($rules);
		}
		return $field_rules;
	}
	
	public function _set_rule_attr(&$type, $attr, $rules) {
		if(strpos($rules, 'required') !== false) {
			$attr .= ' required ';
		}
		$max_length_pos = strpos($rules, 'max_length[') + 11;
		if($max_length_pos !== false) {
			$length_digits = strpos(substr($rules, $max_length_pos),']');
			$max_length = substr($rules, $max_length_pos, $length_digits);
			$attr .= ' maxlength="'.$max_length.'" ';
		}
		if(strpos($rules, 'valid_email') !== false) {
			$type = 'email';
		}
		return $attr;
	}
}
?>
