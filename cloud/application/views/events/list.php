<?php $this->load->view('templates/header'); ?>
<div class="container" style="margin-top:60px;">
	<div class="col-md-8 col-sm-10 col-md-offset-2 col-sm-offset-1">
		<?php foreach($items as $i) : ?>
			<?php $this->load->view('rest/feed_items', $i); ?>
		<?php endforeach; ?>
	</div>
</div>
<?php $this->load->view('templates/footer'); ?>