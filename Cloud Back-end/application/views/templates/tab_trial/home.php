
	
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
		<div class="page-header hidden-xs">
		  <h1><?php echo $title; ?></h1>
		</div>
		
		<!--Navi-->
		<div class="row rowmargin hidden-xs">
			<?php foreach($nav as $n) : ?>
				<a href="<?php echo $n['link']; ?>" class="tab-toggle" data-toggle="tab">
					<div class="col-xs-12 col-sm-4 col-md-3">
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
		<div class="row visible-xs">
			<div class="logmsg">
				<div class="text-center"><h4><?php echo $title; ?></h4></div>
				<div class="list-group text-left">
					<?php foreach($nav as $n) : ?>
						 <a href="<?php echo $n['link']; ?>" class="list-group-item">
							<img src="<?php echo $n['image']; ?>" class="navi-img"> <?php echo $n['title']; ?>
						  </a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>