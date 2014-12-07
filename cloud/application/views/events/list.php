<?php $this->load->view('templates/header'); ?>
<style>
	body {
		background-color:white;
	}
	
	.join {
		background-color:#E74C3C;
		color:white;
	}
	
	.donate {
		color:white;
	}
	
	.feed-container a.feed-link {
		color: #333;
	}
</style>
<div class="container" style="margin-top:60px;">
	<div class="feed-container col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
		<?php foreach($items as $i) : ?>
			<a class="feed-link" href="<?php echo site_url('events/view/'.$i['event_id']); ?>">
				<?php $this->load->view('rest/feed_item', $i); ?>
			</a>
		<?php endforeach; ?>
	</div>
</div>
<?php $this->load->view('templates/footer'); ?>