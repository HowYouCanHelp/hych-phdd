<?php $this->load->view('templates/header', array('fb_comments' => true)); ?>
<div class="container" style="margin-top:60px;">
	<div class="post row">
		<div class="col-md-8 col-md-offset-2  panel">
			<div class="col-md-2 col-sm-2 post-left">
				<img class="img-responsive post-dp" src="<?php echo base_url('uploads/'.$organization_logo); ?>">
				<div class="datetime">
					<p> Date: November 21,2014</p>
					<p> Time: 10:00am-11:30am</p>
				</div>
				
				<div class="join">
					<button class="btn btn-danger col-md-12">Join!</button>
				</div>
				<div class="share">
					<div class="fb-share-button" data-href="<?php echo current_url(); ?>" data-layout="button_count"></div>
				</div>
			</div>
			
			<div class="col-md-10 col-sm-10 post-right">
				<div class="org-name">
					<h4><?php echo $organization_name; ?></h4>
				</div>
				<hr/>
				<center><h5></h5></center>
				<p><?php echo $description; ?></p>
				
				<?php if(strlen($event_photo) > 0) : ?>
				<div class="post-banner">
					<img src="<?php echo base_url('uploads/'.$event_photo); ?>" class="img-responsive">
				</div>
				<?php endif; ?>
				
				<div class="fb-comments">
					<div class="fb-comments" data-href="<?php echo current_url(); ?>" data-numposts="5" data-colorscheme="light"></div>
				</div>
				
				<?php if(sizeof($registered) > 0) : ?>
				<div class="attendance-list">
					<h5>Going</h5>
					<ul>
						<?php foreach($registered as $r) : ?>
							<li><?php echo $r['first_name'].' '.$r['last_name']; ?> is attending</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			</div>
			
		</div>	
	</div>
</div>
<?php $this->load->view('templates/footer'); ?>