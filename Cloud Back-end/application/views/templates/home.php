<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/nav'); ?>
<?php $nav = $this->navi_model->navs(); ?>
<?php foreach($nav as $n) : ?>
	<div class="col-xs-12 col-md-4 col-lg-6 col-sm-6" >
		<div class="panel panel-default" style="min-height:150px;">
			<div class="panel-heading">
				<a href="<?php echo $n['link']; ?>">
					<img src="<?php echo $n['image']; ?>" class="navi-img"> <?php echo $n['title']; ?> 
				</a>
			</div>
			<div class="panel-body">
				<?php echo $n['description']; ?>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<?php $this->load->view('templates/footer'); ?>