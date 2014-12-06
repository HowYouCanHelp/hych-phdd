<label class="control-label">
	<?php echo $label; ?>
</label>
<div class="controls">
	<?php $this->bootstrap->datedropdown('input-small '.$class); ?>
</div>
<input type="hidden" id="<?php echo $class; ?>" name="<?php echo $name; ?>" value="" />
<script>
	//formats the birthdate
	$('.<?php echo $class; ?>').change(function() {
		$('#<?php echo $class; ?>').val(
			$('.<?php echo $class; ?>[name=year]').val() +
			'-' + $('.<?php echo $class; ?>[name=month]').val() + 
			'-' + $('.<?php echo $class; ?>[name=day]').val());
	});
	
	$('.<?php echo $class; ?>[name=year]').change(function() {
		var birthday = new Date($('#<?php echo $class; ?>').val());
	});
</script>