<div class="banner" style="background-color:white;">
	<a href="<?php echo site_url('home/logout'); ?>" class="btn btn-lg btn-info pull-right">
		<span class="glyphicon glyphicon-off"></span> Log-out
	</a>
	<?php if(isset($back)) : ?>
		<a href="<?php echo $back; ?>" class="btn btn-lg btn-info">
			<span class="glyphicon glyphicon-arrow-left"></span> Back
		</a>
	<?php endif; ?>
</div>

<div class="container text-center">
	<div class="page-header">
	  <h1><?php echo $title; ?></h1>
	</div>
	<div class="row">
		<?php if(isset($side)) : ?>
			<?php $this->load->view('navi/side', array('side' => $side,
														'parent' => $parent)); ?>
		<?php endif; ?>
		
		<!--Navi-->
		<div class="col-md-8">
			<?php foreach($nav as $n) : ?>
				<a href="<?php echo $n['link']; ?>" data-transition="slide" >
					<div class="col-xs-12 col-sm-6 col-md-6">
						<div class="thumbnail">
							<div class="caption">
								<img src="<?php echo $n['image']; ?>" class="tile-image">
								<h3><?php echo $n['title']; ?></h3>
							</div>
						</div>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>