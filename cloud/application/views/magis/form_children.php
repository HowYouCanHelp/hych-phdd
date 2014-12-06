<?php $this->load->view('templates/header'); ?>
<form action="<?php echo site_url($form_action); ?>" method="post">
<?php $this->load->view('magis/form_segment'); ?>
<?php $this->load->view('magis/table'); ?>
<?php $values[$checkbox_table] = isset($values[$checkbox_table])?$values[$checkbox_table]:array(); ?>
<input type="hidden" id="<?php echo $checkbox_table; ?>" name="<?php echo $checkbox_table; ?>" value="<?php echo implode('|', $values[$checkbox_table]); ?>" />
<script>
	$(document).ready(function() {
		/* 
		//not most efficient fix, but performance overhead is not noticeable
		$('table .<?php echo $checkbox_table; ?>').change(function() {
			var value = $(this).val();
			var jChildren = $('#<?php echo $checkbox_table; ?>');
			var childrenString = jChildren.val();
			var vChildren = childrenString.split('|');
			if($(this)[0].checked) {
				if(vChildren == '') {
					jChildren.val(value);
				} else if(vChildren.indexOf(value) == -1) { //not present yet; add
					childrenString += '|' + value;
					jChildren.val(childrenString);
				}
			} else { //un-checked, so remove
				//remove value from rolePrivileges value
				childrenString = childrenString.replace(value, '');
				//clean rolePrivileges from double pipes and pipes in the middle or end, as a result of removal
				childrenString = childrenString.replace('||', '|');
				var n = childrenString.length;
				if(childrenString[0] == '|') { childrenString = childrenString.substr(1); }
				else if(childrenString[n-1] == '|') { childrenString = childrenString.substr(0,n-1); }
				//replace with new rolePrivileges value
				jChildren.val(childrenString);
			}
		}); */
		$("form").submit(function() {
			var jChildren = $('#<?php echo $checkbox_table; ?>');
			var childrenString = '';
			$("input:checked", oTable.fnGetNodes()).each(function(){
                childrenString += $(this).val() + "|";
            });
			var n = childrenString.length;
			if(childrenString[n-1] == '|') { childrenString = childrenString.substr(0,n-1); }
			jChildren.val(childrenString);
		});
	});
	
	
</script>
<div class="row">
	<div class="col-md-offset-4">
		<input type="submit" value="Save" class="btn btn-primary btn-lg" />
		<a href="<?php echo site_url('admin/roles'); ?>" class="btn">Cancel</a>
	</div>
</div>
</form>
<?php $this->load->view('templates/footer'); ?>