<?php $this->load->view('templates/header'); ?>
<div class="container">
	<div class="row">
		<legend>Close Report</legend>
	</div>
	<div class="row">
		
		<form action="<?php echo current_url(); ?>" method="post">
			<div class="col-md-6 col-md-offset-3">
				<p>Please specify the reason for closing (e.g., no longer flooded, donations no longer accepted, volunteers no longer needed)</p>
				<?php echo $this->bootstrap->textarea_inline('', 'reports', 'delete_reason', array('input_container_class' => 'col-md-6',
																									'rules' => 'required')); ?>
				<input type="hidden" name="reports[deleted]" value="1" />
			</div>
			<?php echo $this->bootstrap->recaptcha(); ?>
			<center>
				<input type="submit" class="btn btn-lg btn-danger" value="Close" />
				<a href="<?php echo site_url('reports'); ?>" class="btn btn-lg">Cancel</a>
			</center>
		</form>
	</div>
</div>
<br/>
<br/>
<?php $this->load->view('templates/footer'); ?>