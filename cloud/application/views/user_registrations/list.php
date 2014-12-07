<?php
$data = array('table_title' => $event_name,
				'header' => array('First Name', 'Last Name'),
				'buttons' => array(array('label' => 'Verify',
										'class' => 'btn-success btn-sm',
										'link' => 'user_registrations/verify/'.$event_fk)),
				'table' => $list
			);
$this->load->view('magis/table_page', $data); ?>