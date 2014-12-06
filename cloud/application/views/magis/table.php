<?php 
if(!isset($module)) {
	$module = 'table';
}
if(!isset($home)) {
	$home = $module;
}
?>

<?php echo link_tag('public_html/css/datatables.css'); ?>
<?php //echo link_tag('public_html/css/smoothness.css'); ?>
<script type="text/javascript" language="javascript" src="<?php echo base_url('public_html/js/datatables.js'); ?>"></script>
<div class="container">
	<div class="row">
		<br/>
		<?php if(isset($side) && $side != '') : ?>
			<?php $this->load->view($side, (isset($side_data)?$side_data:null)); ?>
			<div class="<?php echo isset($table_class)?$table_class:'span8'; ?>" >
		<?php else : ?>
			<div class="<?php echo isset($table_class)?$table_class:'span10 offset1'; ?>" >
		<?php endif; ?>
			<div class="page-header">
				<p class="pull-right" style="top:10px; position:relative;">
				<?php if(isset($add_button)) : ?>
					<a class="btn btn-primary" href="<?php echo site_url($home.'/add'); ?>">Add <?php echo $human_module; ?></a>
				<?php endif; ?>
				<?php if(isset($header_buttons)) : ?>
				<?php foreach($header_buttons as $button) : ?>
					<a class="btn pull-right <?php echo isset($button['class'])?$button['class']:''; ?>" <?php echo isset($button['attr'])?$button['attr']:''; ?> href="<?php echo site_url($button['link']); ?>"><?php echo $button['label']; ?></a>
				<?php endforeach; endif; ?>
				</p>
				<h3><?php echo $table_title; ?> <small><?php echo isset($table_title_small)?$table_title_small:'Click a row to view'; ?></small></h3>
			</div>

			<?php 
				if(isset($message) && $message != '') {
					$this->load->helper('inflector');
					if($message == 'added' || $message == 'edited' || $message == 'deleted') { 
						echo $this->bootstrap->alert('<b>Successful:</b> You have successfully '.$message.' a '.singular($human_module), 'alert-success'); 
					}
					else {
						echo $this->bootstrap->alert($message, isset($messageClass)?$messageClass:'alert-danger'); 
					}
				}
			?>
			<div class="row-fluid">

			</div>
			<div class="row-fluid">
				<div class="<?php echo isset($table_container_class)?$table_container_class:''; ?>">
					<?php $this->load->view('magis/table_segment'); ?>
				</div>
			</div>
		</div>
	</div>
</div>