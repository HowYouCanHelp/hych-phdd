<?php $this->load->view('navi/header'); ?>
<div class="wrap">
	<div class="tab-content">
		<div class="tab-pane active" id="home">
			<?php $home = $nav; ?>
			<?php $this->load->view('navi/home', array('nav' => $home,
														'title' => $title)); ?>
		</div>
		<div class="tab-pane" id="registry">
			<?php
			$title = 'Barangay Registry System';
			$back = site_url('navi');
			$nav = array(array('title' => 'Residents',
							'image' => base_url(SVG_IMG_PATH.'/book.svg'),
							'link' => site_url('navi/registry/resident')),
					array('title' => 'Structures',
							'image' => base_url(SVG_IMG_PATH.'/clocks.svg'),
							'link' => site_url('navi/registry/structure')),
					array('title' => 'Business',
							'image' => base_url(SVG_IMG_PATH.'/clipboard.svg'),
							'link' => site_url('navi/registry/business')),
					array('title' => 'Employees',
							'image' => base_url(SVG_IMG_PATH.'/loop.svg'),
							'link' => site_url('navi/registry/employee')),
					array('title' => 'Pets',
							'image' => base_url(SVG_IMG_PATH.'/mail.svg'),
							'link' => site_url('navi/registry/pet')),
				);
			$side = $home;
			$parent = 'Navigation';
			$this->load->view('navi/with_side_tab', array('nav' => $nav,
													'title' => $title,
													'back' => $back,
													'side' => $side,
													'parent' => $parent)); ?>
		</div>
	</div>
</div>

</body>
</html>