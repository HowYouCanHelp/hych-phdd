<style>
#table<?php echo isset($module)?$module:''; ?> tbody tr {
	cursor:pointer;
}

#table<?php echo isset($module)?$module:''; ?> thead th small {
	display:none;
}

#table<?php echo isset($module)?$module:''; ?> thead th:hover small {
	display:inline;
	color:#333333;
	text-decoration:none;
}

#table<?php echo isset($module)?$module:''; ?> thead th:hover {
	background-color:#f5f5f5;
}
</style>
<div class="table-responsive">
	<table id="table<?php echo isset($module)?$module:''; ?>" class="table table-bordered table-hover">
		<thead>
			<tr>
			<?php foreach($header as $th) : ?>
				<th title="Click to sort by <?php echo $th; ?>"><small>Sort by </small><?php echo $th; ?></th>
			<?php endforeach; ?>
			<?php //if($user_role == 'admin') : ?>
				<?php if(isset($buttons) && is_array($buttons) && sizeof($buttons) > 0) : ?>
					<th>Options</th>
				<?php elseif(isset($edit_delete)) : ?>
					<th></th>
				<?php endif; ?>
			<?php //endif; ?>
			</tr>
		</thead>
		<?php if(isset($column_filter) && $column_filter) : ?>
		<tfoot>
			<tr>
			<?php foreach($header as $th) : ?>
				<th>Search <?php echo $th; ?></th>
			<?php endforeach; ?>
			<?php //if($user_role == 'admin') : ?>
				<?php if(isset($buttons) && is_array($buttons) && sizeof($buttons) > 0) : ?>
					<th>Options</th>
				<?php elseif(isset($edit_delete)) : ?>
					<th>Edit/Delete</th>
				<?php endif; ?>
			<?php //endif; ?>
			</tr>
		</tfoot>
		<?php endif; ?>
		<tbody>
		<?php if (isset($table) && is_array($table) && sizeof($table) > 0) 
			foreach($table as $row) : ?>
			<?php $class='';
			$style='';
			if(isset($id) && $row['id'] == $id) {
				if(isset($message) && $message == 'edited') {
					$class='success';
					$style='font-weight:bold;';
				}
			} ?>
			<?php if(isset($redirect) && $redirect != '') : ?>
			<tr onclick="window.location='<?php echo site_url($redirect.'/'.$row['id']); ?>'" class="<?php echo $class; ?>" style="<?php echo $style; ?>">
			<?php else : ?>
			<tr class="<?php echo $class; ?>" style="<?php echo $style; ?>">
			<?php endif; ?>
			<?php foreach($row as $col=>$val) : ?>
				<?php if(isset($checkboxes) && $col == $checkboxes) : ?>
					<?php $id = $row['id']; ?>
				<td><label class="checkbox" style="left:5px; position:relative;" >
					<input type="checkbox" class="<?php echo $checkbox_table; ?>" value="<?php echo $id; ?>" <?php echo isset($values[$checkbox_table][$id])?'checked':''; ?> >
					<?php echo $val; ?>
				</label></td>
				<?php elseif(isset($images) && in_array($col, $images)) : ?>
				<td class="text-center"><img src="<?php echo $val; ?>" /></td>
				<?php elseif(isset($badges) && in_array($col, $badges)) : ?>
				<td class="text-center"><span class="badge text-center"><?php echo $val; ?></span></td>
				<?php elseif(isset($dates) && in_array($col, $dates) && $val != '') : ?>
				<td><?php echo date('F m, Y', strtotime($val)); ?></td>
				<?php elseif(isset($datetimes) && in_array($col, $dates) && $val != '') : ?>
				<td><?php echo date('F m, Y h:i:s A', strtotime($val)); ?></td>
				<?php elseif(isset($excerpts) && in_array($col, $excerpts)) : ?>
				<td><?php echo strip_tags(substr($val, 0, 250)); ?></td>
				<?php elseif($col == 'id'): ?>
					<?php if(isset($buttons) && is_array($buttons)) : ?>
					<td><div class="btn-group">
						<?php foreach($buttons as $button) : ?>
							<a class="btn <?php echo isset($button['class'])?$button['class']:''; ?>" href="<?php echo site_url($button['link'].'/'.$val); ?>"><?php echo $button['label']; ?></a>
						<?php endforeach; ?>
					</div></td>
					<?php elseif(isset($edit_delete)) : ?>
					<td><div class="btn-group"><a class="btn btn-xs" title="Edit" href="<?php echo site_url($home.'/edit/'.$val); ?>"><i class="glyphicon glyphicon-pencil"></i></a><a class="btn btn-xs btn-danger" title="Delete" href="<?php echo site_url($home.'/delete/'.$val.'#'.$module); ?>"><i class="glyphicon glyphicon-remove"></i></a></div></td>
					<?php endif; ?>
				<?php else : ?>
				<td><?php echo $val; ?></td>
				<?php endif; ?>
			<?php endforeach; ?>	
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php if(!isset($custom_init) || !$custom_init) : ?>
<script>
oTable = $('#table<?php echo isset($module)?$module:''; ?>').dataTable({
	"sDom" : <?php echo isset($table_sdom) ? '"'.$table_sdom.'"' : '\'T<"clear">lfrtip\''; ?>,
	<?php echo isset($table_display_length) ? '"iDisplayLength": '.$table_display_length.',' : ''; ?>
	<?php if(!isset($no_table_tools)) : ?>
		"oTableTools": {
			"sSwfPath": "<?php echo base_url('public_html/js/tabletools/swf/copy_csv_xls_pdf.swf'); ?>"
		},
	<?php endif; ?>
	"bJQueryUI": true,
	"sPaginationType": "full_numbers"
});
</script>
<?php endif; ?>