
<?php $message = '<h1>Confirm Delete</h1> Are you sure you want to delete? <a href="'.site_url($cancelDelete).'" class="btn pull-right" >Cancel</a><a href="'.site_url($confirmDelete.'/'.$id).'" class="btn btn-danger pull-right" >Confirm</a>'; ?>
<?php $this->bootstrap->alert($message, 'alert-error'); ?>