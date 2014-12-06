<?php 
	$navs = $this->navi_model->navs();
?>

<div class="visible-lg col-lg-3 affix">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="<?php echo site_url('home'); ?>" style="color:#333;"><h5>Matchdrobe Dashboard</h5></a>
		</div>
		<div class="list-group text-left">
			<?php foreach($navs as $n) : ?>
				<?php $active = (current_url() == $n['link'])?'active':''; ?>
				<a class="list-group-item add-tooltip <?php echo $active; ?>" href="<?php echo $n['link']; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $n['description']; ?>">
					<img src="<?php echo $n['image']; ?>" class="navi-img"> <?php echo $n['title']; ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<div class="visible-sm visible-md">
	<ul class="nav nav-tabs nav-justified">
		<?php foreach($navs as $n) : ?>
			<?php $active = (current_url() == $n['link'])?'active':''; ?>
			<li class="add-tooltip <?php echo $active; ?>" data-toggle="tooltip" data-placement="bottom" data-container="body" title="<?php echo $n['description']; ?>"><a href="<?php echo $n['link']; ?>" class="text-left" >
				<img src="<?php echo $n['image']; ?>" class="navi-img"> <span class="visible-md"><?php echo $n['title']; ?></span>
			</a></li>
		<?php endforeach; ?>
	</ul>
</div>
<div class="visible-xs">
	<div class="navi">
		<nav class="navbar navbar-inverse" role="navigation">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
			<button type="button" class="glyphicon glyphicon-align-justify navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="color:#ddd;">
			  <span class="sr-only">Toggle navigation</span>
			</button>
			<a class="navbar-brand" href="#">MatchDrobe Analytics Dashboard</a>
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php foreach($navs as $n) : ?>
					<?php $active = (current_url() == $n['link'])?'class="active"':''; ?>
					<li <?php echo $active; ?>><a href="<?php echo $n['link']; ?>" class="text-left" >
							<img src="<?php echo $n['image']; ?>" class="navi-img"> <?php echo $n['title']; ?>
					</a></li>
			    <?php endforeach; ?>
			</ul>
		  </div><!-- /.navbar-collapse -->
		</nav>
	</div>
</div>
<script>
	$('.add-tooltip').tooltip();
</script>
<div class="col-lg-offset-3">
	<div class="col-md-12 col-lg-11 col-lg-offset-1" style="padding-top:20px;">