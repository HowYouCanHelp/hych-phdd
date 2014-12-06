<?php $this->load->view('navi/header'); ?>
<div class="wrap">
		<div class="banner">
			
		</div>
		<div class=" text-center">
			<h3>Log-in</h3>
			<div class="row">	
				<div class="col-xs-12 col-md-4 col-md-offset-4"> 
					<form action="<?php echo site_url('home/login'); ?>" method="post">
						<div class="log">
							<div class="form-group">
								<input type="text" name="users[username]" class="form-control" placeholder="Username">
							  </div>
							<div class="form-group">
								<input type="password" name="users[password]" class="form-control" placeholder="Password">
							  </div>
							  <input type="submit" class="btn btn-inverse btn-embossed" value="Log-in" >
						</div>
					</form>
				 </div>
			</div>
		</div>
		
	</div>
	</body>

</html>