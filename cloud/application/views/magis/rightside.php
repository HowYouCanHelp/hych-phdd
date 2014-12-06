<?php
		$building_fk = ($this->session->userdata('last_building_id') == '')?0:$this->session->userdata('last_building_id');
		$individuals = $this->db->query('SELECT control_no, first_name, middle_name, last_name FROM individual WHERE building_fk='.$building_fk)->result_array();
		$businesses = $this->db->query('SELECT control_no, business_name FROM business WHERE building_fk='.$building_fk)->result_array();
		$pets = $this->db->query('SELECT pet_name, owner_first_name, owner_middle_name, owner_last_name FROM pet WHERE building_fk='.$building_fk)->result_array();
?>

<div class="span3">
	<ul class="nav nav-list">
		<li class="nav-header">Individuals in this Structure</li>
		<?php foreach($individuals as $individual) : ?>
			<li><a href="#"><?php echo $individual['control_no'].' - '.$individual['last_name'].', '.$individual['first_name'].' '.$individual['middle_name']; ?></a></li>
		<?php endforeach; ?>
		<li class="nav-header">Businesses in this Structure</li>
		<?php foreach($businesses as $business) : ?>
			<li><a href="#"><?php echo $business['control_no'].' - '.$business['business_name']; ?></a></li>
		<?php endforeach; ?>
		<li class="nav-header">Pets in this Structure</li>
		<?php foreach($pets as $pet) : ?>
			<li><a href="#"><?php echo $pet['pet_name'].' - '.$pet['owner_last_name'].', '.$pet['owner_first_name'].' '.$pet['owner_middle_name']; ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>