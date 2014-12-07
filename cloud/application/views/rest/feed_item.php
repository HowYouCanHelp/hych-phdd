<div class="feed">	
	<div class="row">
		<div class="col-xs-3 feed-in-left">
			<div class="profile-pic">
				<img class="img-responsive picture" src="<?php echo base_url(UPLOAD_PATH.'/'.$organization_logo); ?>">
			</div>
		</div>
		<div class="col-xs-9 feed-in-right">
			<div class="org-name">
				<h5><?php echo $organization_name; ?></h5>
			</div>
			<div class="post-desc">
				<p><?php echo $description; ?></p>
			</div>
			<!--
			<div class="post-date row">
				<div class="col-xs-3">
					<p>Date:</p>
				</div>
				<div class="col-xs-9">
					<p>Wednesday, November 21, 2014</p>
				</div>
			</div>
			<div class="post-time row">
				<div class="col-xs-3">
					<p>Time:</p>
				</div>
				<div class="col-xs-9">
					<p>3:00pm - 5:00pm</p>
				</div>
			</div>
			<div class="post-place row">
				<div class="col-xs-3">
					<p>Place:</p>
				</div>
				<div class="col-xs-9">
					<p><?php echo $venue; ?></p>
				</div>
			</div>-->
			<?php if(strlen($event_photo) > 0) : ?>
			<div class="post-pic">
				<img class="img-responsive picture" src="<?php echo base_url(UPLOAD_PATH.'/'.$event_photo); ?>">
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="buttons row">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="col-xs-6">
				<?php $join_url = '';
				if($action_button == 'Join' || $action_button == 'Pledge') {
					$action_url = site_url('rest/join');
					$action_type = 'join';
				} else if($action_button == 'Donate') {
					$action_url = site_url('rest/donate');
					$action_type = 'donate';
				} else {
					$action_type = '';
				} ?>
				<style>
					.donate {
						background-color:#309131;
					}
				</style>
				<?php if(strlen($action_type) > 0) : ?>
					<button id="" class="pull-right <?php echo $action_type; ?> btn" data-action_type="<?php echo $action_type; ?>" data-karma_incentive="<?php echo $join_incentive; ?>" data-id="<?php echo $event_id; ?>" data-url="<?php echo $action_url; ?>">
						<?php echo $action_button; ?> 
						<?php if($action_type == 'join') : ?>
							<span class="label label-danger"><?php echo strlen($join_incentive) > 0 ? $join_incentive : 100; ?></span> 
						<?php endif; ?>
					</button>
				<?php endif; ?>
			</div>
			<div class="col-xs-6 share" data-karma_incentive="<?php echo $share_incentive; ?>" data-url="<?php echo site_url('events/view/'.$event_id); ?>">
				Share <img class="" src="imgs/share.png"> <span class="label label-info"><?php echo $join_incentive; ?></span>
			</div>
		</div>
	</div>
</div>
