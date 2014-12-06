<?php $this->load->view('templates/header'); ?>
  <div class="span6 offset3 span-fixed-sidebar">
	<?php if(!empty($validation_errors)) {
		$this->bootstrap->alert($validation_errors);
	}
	?>
	<form action="<?php echo site_url('home/login'); ?>" method="post">
	  <fieldset class="form-horizontal" >
		<?php $this->bootstrap->textfield_horizontal('Username', 'users', 'username', 'required|trim|max_length[255]'); ?>
		<?php $this->bootstrap->textfield_horizontal('Password', 'users', 'password', 'required|trim|max_length[255]', null, '', 'password'); ?>
		<div class="span9 offset2">
			<input type="submit" class="btn btn-info btn-block " value="Log-in" >
		</div>
	  </fieldset>
	</form>
  </div>
<?php $this->load->view('templates/footer'); ?>