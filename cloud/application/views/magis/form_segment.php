<div class="container">
	<div class="row">
		<?php if(isset($side) && $side != '') : ?>
			<?php $this->load->view($side, (isset($side_data)?$side_data:null)); ?>
		<div class="<?php echo isset($span_class)?$span_class:'span8'; ?>" >
		<?php else : ?>
		<div class="<?php echo isset($span_class)?$span_class:'col-md-8 col-md-offset-2'; ?>" >
		<?php endif; ?>
			<legend><?php echo $form_title; ?></legend>
			<div class="form-group">
				<?php if(isset($declare_form)) : ?>
					<?php if(isset($multipart_form)) : ?>
						<?php echo form_open_multipart($form_action); ?>
					<?php else : ?>
						<form action="<?php echo site_url($form_action); ?>" method="post" >
					<?php endif; ?>
				<?php endif; ?>
					<?php if(isset($inputs)) {
						$this->bootstrap->array_to_form($inputs, isset($options)?$options:null);
					} elseif(isset($form_table)) {
						if(isset($options) && isset($values)) { 
							$options['values'] = $values; 
						}
						echo $this->bootstrap->table_to_form($form_table, isset($options)?$options:null);
					} 
					
					if(isset($additional_form)) { 
						echo $additional_form; 
					} ?>
				<?php if(isset($declare_form)) : ?>
					<center>
						<input type="submit" value="<?php echo isset($submit_text)?$submit_text:'Save'; ?>" class="btn btn-primary btn-lg" />
						<a href="<?php echo site_url($cancel_button); ?>" class="btn">Cancel</a>
					</center>
				</form>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>