<div class="span2 tabbable tabs-left">
	<legend>Barangays</legend>
	<ul class="span11 nav nav-tabs">
		<?php
			$active = $this->session->userdata('barangay_id');
			if(BARANGAY_ID != 0) {
				$this->db->where('id', BARANGAY_ID);
			}
			$barangays = $this->db->get('barangay');
			foreach($barangays->result() as $brgy) : 
				/* ugly fix */ $brgy_name = ucwords(strtolower($brgy->name));
		?>
		<li <?php if($active == $brgy->id) { $this->session->set_userdata('barangay_name', $brgy_name); echo 'class="active"'; } ?>>
			<a href="<?php echo ($this->uri->segment(1) == 'brrs')?site_url('brrs/manage/structure/'.$brgy->id):site_url('bpms/manage/'.$brgy->id); ?>"><?php echo $brgy_name; ?></a>
		</li>
		<?php endforeach; ?>
	</ul>
</div>