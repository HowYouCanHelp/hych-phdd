<?php $this->load->view('templates/header', array('nivo_slider' => true,
												'chosen' => true,
												'fb_comments' => true,
												'wysihtml5' => true)); ?>

												
												
												
<div id="collaborate" data-toggle="modal" data-target="#LetsCollaborate">
Let's Collaborate!
</div>

<?php 
$collaborate_html =<<<EOT
<p>If you have a similar site, blog, or collection of data, or have an idea that might help those affected by #MarioPH, 
please do not hesitate to contact us to discuss how we can collaborate.</p>
<p>It can be simple sharing of data, to us helping program your idea that could help re-build lives, to you embedding #HowYouCanHelp in your web sites.</p>
<p>For programmers, we'll give you links to an API where you can get all our data and do your awesome stuff with it (our only request is that you use it to save lives!).</p>
<p>We are also very interested in collaborating with other web site projects.</p>
EOT;
?>

<?php echo $this->bootstrap->modal('LetsCollaborate', 
								$collaborate_html.$this->bootstrap->table_to_form('messages', 
																array('declare_form' => false, 
																	'wysihtml5' => array('message'),
																	'required' => array('email'),
																	'exclude' => array('created_on', 'created_by', 'updated_on', 'updated_by'))),
											array('title' => "Let's Collaborate!",
												'form_action' => site_url('messages/add'),
												'submit_button' => 'Submit',
												'cancel_button' => 'Cancel')); ?>
												
<style>
#collaborate {
	-ms-transform: rotate(90deg); /* IE 9 */
    -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
    transform: rotate(90deg);
	left:-45px; 
	position:fixed; 
	top:40%; 
	background-color:black; 
	color:white; 
	border:1px solid white;
	padding:10px;
	cursor:pointer;
}

#FloodedAreas .modal-dialog {
	width:90% !important;
}

#RescueNeeded .modal-dialog {
	width:90% !important;
}

#EvacuationAreas .modal-dialog {
	width:90% !important;
}
</style>												
<script>
	function filterMarkers(jThis, category) {
		console.log(markers_map);
		var show = jThis.checked;
		for (var i=0; i < markers_map.length; i++) {
			if (markers_map[i].category.toUpperCase().indexOf(category.toUpperCase()) !== -1) {
				markers_map[i].setVisible(show);
			}
		}
	}
</script>
<div class="container">
	<div class="row">
		<div class="page-header" style="margin-top:-10px;">
			<p class="pull-right" style="top:10px; position:relative;">
				<a class="btn btn-info" href="<?php echo site_url('reports/add'); ?>">Contribute Report</a>
			</p>
			<h3>#MarioPH <small style="color:gray; font-size:18px;">Click markers to view details.</small></h3>
		</div>
		<?php 
			if(isset($message) && $message != '') {
				$this->load->helper('inflector');
				if($message == 'added' || $message == 'edited' || $message == 'deleted') { 
					$this->bootstrap->alert('<b>Successful:</b> You have successfully '.$message.' a '.singular($human_module), 'alert-success'); 
				}
				else {
					$this->bootstrap->alert($message, isset($messageClass)?$messageClass:''); 
				}
			}
		?>
		<?php echo $googlemap['html']; ?>
		<div class="row col-md-12">
			<div class="pull-right">
				Filters: 
				<?php foreach($report_types as $rt) : ?>
					<label>
						<input type="checkbox" onclick="filterMarkers(this,'<?php echo $rt['name']; ?>')" checked />
						<?php echo $rt['name']; ?>
					</label>
				<?php endforeach; ?>
			</div>
		</div>
		<?php echo link_tag('public_html/css/datatables.css'); ?>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('public_html/js/datatables.js'); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('public_html/js/tabletools/js/ZeroClipboard.js'); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('public_html/js/tabletools/js/TableTools.js'); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo base_url('public_html/js/jquery.dataTables.columnFilter.js'); ?>"></script>
		<?php echo link_tag('public_html/js/tabletools/css/tabletools.css'); ?>
		
		<legend>Reports <small style="color:gray; font-size:18px;">Click to view data</small></legend>
		<div class="col-md-4">
			<!-- Button trigger modal -->
			<button class="btn btn-lg btn-warning btn-block" data-toggle="modal" data-target="#FloodedAreas">
				View Flooded Areas
			</button>
		</div>
		<?php $flood_table = $this->load->view('magis/table_segment', 
												array('table' => isset($categorized['Flood']) ? $categorized['Flood'] : array(),
													'home' => 'reports',
													'module' => 'flood',
													'header' => $table_headers,
													'edit_delete' => true,
													'no_table_tools' => true,
													'table_sdom' => "<'clear'>frtp",
													'table_display_length' => 5,
													'no_table_tools' => true,
													'column_filter' => false,
													'custom_init' => false),
												true); ?>
		<?php echo $this->bootstrap->modal('FloodedAreas', $flood_table, array('title' => '<a class="btn btn-danger pull-right btn-sm" href="'.site_url('reports/add/1').'">Report Flooded Area</a> #FloodedAreas')); ?>
		<div class="col-md-4">
			<!-- Button trigger modal -->
			<button class="btn btn-lg btn-info btn-block" data-toggle="modal" data-target="#EvacuationAreas">
				Search Evacuation Areas
			</button>
		</div>
		<?php $evacuation_table = $this->load->view('magis/table_segment', 
													array('table' => isset($categorized['Evacuation Areas']) ? $categorized['Evacuation Areas'] : array(),
														'home' => 'reports',
														'module' => 'evac',
														'header' => $table_headers,
														'edit_delete' => true,
														'table_sdom' => "<'clear'>frtp",
														'table_display_length' => 5,
														'no_table_tools' => true,
														'column_filter' => false,
														'custom_init' => false),
													true); ?>
		<?php echo $this->bootstrap->modal('EvacuationAreas', $evacuation_table, array('title' => '<a class="btn btn-success pull-right btn-sm" href="'.site_url('reports/add/1').'">Post Evacuation Area</a> #EvacuationAreas')); ?>
		<div class="col-md-4">
			<!-- Button trigger modal -->
			<button class="btn btn-lg btn-danger btn-block" data-toggle="modal" data-target="#RescueNeeded">
				Calls for Rescue
			</button>
			<br/>
			<br/>
		</div>
		<?php $rescue_table = $this->load->view('magis/table_segment', 
													array('table' => isset($categorized['Rescue Needed']) ? $categorized['Rescue Needed'] : array(),
														'home' => 'reports',
														'module' => 'rescue',
														'header' => $table_headers,
														'edit_delete' => true,
														'table_sdom' => "<'clear'>frtp",
														'table_display_length' => 5,
														'no_table_tools' => true,
														'column_filter' => false,
														'custom_init' => false),
													true); ?>
		<?php echo $this->bootstrap->modal('RescueNeeded', $rescue_table, array('title' => '<a class="btn btn-danger pull-right btn-sm" href="'.site_url('reports/add/3').'">Call for Rescue here.</a> #RescueNeeded')); ?>
		<legend>
			Recovery 
			<small style="color:gray; font-size:14px;">Lists were integrated from all over the internet. <a href="https://docs.google.com/spreadsheets/d/1gWWg4N1rcQgzm5I2IdVLLCevhewRRlFXjb6TduMI33M/edit#gid=0" class="btn btn-primary btn-xs" target="_blank" >Contribute to Rappler's here.</a> Updating their list also updates ours. </small> 
			
			
		</legend>
		
		<div class="col-md-6">
			<legend><small>#DonationDropOffs</small></legend>
			<?php $this->load->view('magis/table_segment', array('table' => isset($categorized['Donation Drop-off']) ? $categorized['Donation Drop-off'] : array(),
																'home' => 'reports',
																'module' => 'donation',
																'header' => $table_headers,
																'edit_delete' => true,
																'table_sdom' => "<'clear'>frtp",
																'table_display_length' => 5,
																'no_table_tools' => true,
																'column_filter' => false,
																'custom_init' => false)); ?>
		</div>
		<script>
		</script>
		<div class="col-md-6 ">
			<legend>
				<small>
					#VolunteersNeeded <a href="<?php echo site_url('reports/add'); ?>" class="btn btn-primary btn-xs" >Add more areas where volunteers are needed here.</a>
				</small>
			</legend>
			<?php $this->load->view('magis/table_segment', array('table' => isset($categorized['Volunteers Needed']) ? $categorized['Volunteers Needed'] : array(),
																'home' => 'reports',
																'module' => 'volunteers',
																'header' => $table_headers,
																'edit_delete' => true,
																'table_sdom' => "<'clear'>frtp",
																'no_table_tools' => true,
																'column_filter' => false,
																'custom_init' => false)); ?>
		</div>
		
		<legend><br/>Ticker: <small style="color:gray; font-size:18px;">#MarioPH , @dost_pagasa , @MMDA</small></legend>
		
		<div class="row">
			<div class="col-md-4 col-sm-6">
				<button class="pull-right btn btn-xs btn-info" data-toggle="modal" data-target="#AddInfoPoster">
					Submit an Information Poster
				</button>
				<div class="slider-wrapper theme-default">
					<div id="slider" class="nivo-slider">
						<?php foreach($information_posters as $ip) : ?>
							<a href="<?php echo $ip['source_link']; ?>"><img src="<?php echo $ip['url_of_photo']; ?>" alt="" title="<?php echo $ip['caption']; ?>" /></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<style>
				.tight {
					padding:2px;
				}
			</style>
			<div class="col-md-3 col-sm-6 tight">
				<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/hashtag/marioph" height=300 data-widget-id="513012812986068992">#MarioPH Tweets</a>
			</div>
			<div class="col-md-5 col-sm-12 tight">
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				<div class="col-md-6 col-sm-6 tight">
					<a class="twitter-timeline" href="https://twitter.com/dost_pagasa" height=300 data-widget-id="369671542524751872">@dost_pagasa</a>
					
				</div>
				<div class="col-md-6 col-sm-6 tight">
					<a class="twitter-timeline" href="https://twitter.com/MMDA" height=300 data-widget-id="369730707687362561">@MMDA</a>
				</div>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-sm-6">
				
				<button class="pull-right btn btn-xs btn-info" data-toggle="modal" data-target="#SubmitPhoto">
					Contribute a Photo about #MarioPH
				</button>
				<div class="slider-wrapper theme-default">
					<div id="slider" class="nivo-slider">
						<?php foreach($photo_submissions as $ps) : ?>
							<a href="<?php echo $ps['source_link']; ?>"><img src="<?php echo $ps['url_of_photo']; ?>" alt="" title="<?php echo $ps['caption']; ?>" /></a>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<legend>Do your "Share" (get it?) Help others find where to donate or volunteer :D</legend>
				<div class="row">
					<div class="col-sm-12 tight">
						<div class="emphasissocial" id="esfb">
							<span class='st_facebook_vcount' displayText='Facebook'></span>
						</div>
						<div class="emphasissocial" id="est">
							<span class='st_twitter_vcount' displayText='Tweet'></span>
						</div>
						<div class="emphasissocial" id="esst">
							<span class='st_sharethis_vcount' displayText='ShareThis'></span>
						</div>
					</div>
					<div class="col-sm-12 tight">
						<div class="fb-like" data-share="true" data-width="450" data-show-faces="true"></div>
					</div>
				</div>
				<div class="row">
					<div id="fbcomments" style="margin-top:20px;">
						<div class="fb-comments" data-href="http://magissolutions.com/howyoucanhelp/" data-num-posts="5" data-width="470" data-colorscheme="light"></div>
					</div>
				</div>
				<div class="row">
					
				</div>
			</div>
		</div>
		<?php echo $this->bootstrap->modal('AddInfoPoster', 
								
								$this->bootstrap->table_to_form('information_posters', 
																			array('declare_form' => false, 
																				'exclude' => array('created_on', 'created_by', 'updated_on', 'updated_by'))),
											array('title' => 'Share an Information Poster',
													'form_action' => site_url('information_posters/add'),
													'submit_button' => 'Submit',
													'cancel_button' => 'Cancel')); ?>
		<?php echo $this->bootstrap->modal('SubmitPhoto', 
											$this->bootstrap->table_to_form('photo_submissions', 
																			array('declare_form' => false, 
																				'exclude' => array('created_on', 'created_by', 'updated_on', 'updated_by'))),
											array('title' => 'Contribute a Photo',
													'form_action' => site_url('photo_submissions/add'),
													'submit_button' => 'Submit',
													'cancel_button' => 'Cancel')); ?>
		<div class="row">
			
		</div>
	</div>
</div>
<br/>
<br/>
<?php $this->load->view('templates/footer'); ?>