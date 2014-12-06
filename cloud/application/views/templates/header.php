<!DOCTYPE html>
<?php //initialize variables
$css = isset($css) && is_array($css) ? $css : array();
$js = isset($js) && is_array($js) ? $js : array();
$otherHead = isset($otherHead) ? $otherHead : '';
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>LifeLine - View your different Life Lines</title>
		<meta property="fb:admins" content="722379423"/>
		<meta property="og:title" content="LifeLine - View your different Life Lines"/>
		<meta property="og:image" content="<?php echo base_url('public_html/images/lllogo.JPG'); ?>"/>
		<meta property="og:description" content="All data from across the internet about #MarioPH. News from Pag-asa, floods statuses by MMDA, evacuation areas, calls for rescue, donation drop-offs and calls for volunteers."/>


		<?php echo link_tag('public_html/bootstrap3-flat/css/bootstrap.min.css'); ?>
		<?php /* //echo link_tag('public_html/css/global.css'); ?>
		<?php //echo link_tag('public_html/css/style.css'); ?>
		<?php echo link_tag('public_html/css/fonts/css/font-awesome.css'); ?>
		
		<?php echo link_tag('http://fonts.googleapis.com/css?family=Montserrat:400,700'); ?>
		<?php echo link_tag('http://fonts.googleapis.com/css?family=Kaushan+Script'); ?>
		<?php echo link_tag('http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic'); ?>
		<?php echo link_tag('http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700'); */ ?>
		
		<script type="text/javascript" src="<?php echo base_url('public_html/js/jquery.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('public_html/js/bootstrap.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('public_html/js/magis_helpers.js'); ?>" ></script>
		
		<!-- for lifeline -->
		<script type="text/javascript" src="<?php echo base_url('public_html/js/classie.js'); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('public_html/js/cbpAnimatedHeader.js'); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'); ?>" ></script>
		
		<script type="text/javascript" src="<?php echo base_url('public_html/js/jqBootstrapValidation.js'); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('public_html/js/contact_me.js'); ?>" ></script>
		
		<script type="text/javascript" src="<?php echo base_url('public_html/js/agency.js'); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('public_html/js/toucheffects.js'); ?>" ></script>
		
		<script type="text/javascript" src="<?php echo base_url('public_html/js/jquery-1.11.0.js'); ?>" ></script>
		
		<script type="text/javascript" src="<?php echo base_url('public_html/js/modernizr.custom.js'); ?>" ></script>
	
		
		<?php foreach($js as $a) { echo("\n  " . '<script src="' . base_url('public_html/js/' . $a) . '.js">' . '</script>'); } ?>
		
		<?php echo isset($otherHead) ? $otherHead : ''; ?>
		
		<?php /* jquery-ui */ ?>
		<?php if(isset($jquery_ui)) : ?>
			<?php echo link_tag('public_html/css/smoothness/jquery-ui.css'); ?>
			<script type="text/javascript" src="<?php echo base_url('public_html/js/jquery-ui.min.js'); ?>" ></script>
		<?php endif; ?>
		
		<?php if(isset($slide)) : ?>
			<script type="text/javascript" src="<?php echo base_url('public_html/jquery-slide/jquery-ui-slide.min.js'); ?>"></script>
		<?php endif; ?>
		
		<?php if(isset($scrollto)) : ?>
			<script type="text/javascript" src="<?php echo base_url('public_html/js/scrollto.js'); ?>" ></script>
		<?php endif; ?>
		
		
		<?php /* datepicker */ ?>
		<?php if(isset($datepicker)) : ?>
			<script>
				$(document).ready(function() {
					$('.datepicker').datepicker();
					$('.datepicker').datepicker("option", "dateFormat", "yy-mm-dd");
				});
			</script>
		<?php endif; ?>
		
		<?php /* wysihtml5 */ ?>
		<?php if(isset($wysihtml5)) : ?>
			<?php echo link_tag('public_html/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>
			<script type="text/javascript" src="<?php echo base_url('public_html/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>" ></script>
			<script>
				$(document).ready(function() {
					$(".wysihtml5").wysihtml5();
				});
			</script>
		<?php endif; ?>
		
		<?php /* google maps API */ ?>
		<?php if(isset($googlemap)) : ?>
			<?php echo $googlemap['js']; ?>
		<?php endif; ?>
		
		<?php /* AmCharts */ ?>
		<?php if(isset($amcharts)) : ?>
			<script src="<?php echo base_url('public_html/amcharts/amcharts.js'); ?>"></script>
			<script src="<?php echo base_url('public_html/amcharts/serial.js'); ?>"></script>
			<?php echo $amcharts['js']; /* amcharts library already exports necessary scripts here. */ ?>
		<?php endif; ?>
		
		<?php if(isset($custom_header)) : ?>
			<?php echo $custom_header; ?>
		<?php endif; ?>
		
		<?php if(isset($sortable)) : ?>
			<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
			<style>
				.sortable li {
					list-style-type:none;
				}
			</style>
			<script>
				$(document).ready(function() {
					$(".sortable").sortable();
				})
			</script>
		<?php endif; ?>
		
		<?php if(isset($chosen)) : ?>
			<?php echo link_tag('public_html/js/chosen/chosen.min.css'); ?>
			<script src="<?php echo base_url('public_html/js/chosen/chosen.jquery.min.js'); ?>"></script>
			<style>
			.chosen-container-multi .chosen-choices li.search-field input[type=text] { height:auto; }
			.chosen-container-multi .chosen-choices { border-radius:4px; }
			.chosen-container .chosen-single { height:30px; }
			.chosen-container { margin-bottom:5px; }
			</style>
			<script>
				$(document).ready(function() {
					$(".chosen").chosen();
				})
			</script>
		<?php endif; ?>
		
		<?php if(isset($nivo_slider)) : ?>
			<link rel="stylesheet" href="<?php echo base_url('public_html/nivo-slider3.2'); ?>/themes/default/default.css" type="text/css" media="screen" />
			<link rel="stylesheet" href="<?php echo base_url('public_html/nivo-slider3.2'); ?>/nivo-slider.css" type="text/css" media="screen" />
			<script type="text/javascript" src="<?php echo base_url('public_html/nivo-slider3.2'); ?>/jquery.nivo.slider.js"></script>
			<script>
				$(document).ready(function() {
					$('.nivo-slider').nivoSlider();
				});
			</script>
		<?php endif; ?>
			
		  <style id="holderjs-style" type="text/css"></style>
		  
			<script type="text/javascript">var switchTo5x=true;</script>
			<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
			<script type="text/javascript">stLight.options({publisher: "b7defd07-e3cf-4148-92d0-be9d68df9b6c", doNotHash: true, doNotCopy: false, hashAddressBar: false});</script>
			<style>
				.stBubble_count {
					height:40px !important;
				}
				
				.stButton div span.stMainServices {
					height:22px;
				}
				
				.emphasissocial {
					float: left;
					padding:5px;
					margin-right:10px;
					
					-moz-border-radius: 4px;
					-webkit-border-radius: 4px;
					-khtml-border-radius: 4px;
					border-radius: 4px;
				}
				
				#esfb {
					 background-color: white; 
				}

				#est {
					 background-color: #057092;/* green; */
				}

				#esst {
					 background-color: #FFCC00; /* orange; */
					width:98px;
				}
			</style>
	</head>
	<body>
		<?php if(isset($fb_comments)) : ?>
			<script>
			  window.fbAsyncInit = function() {
				FB.init({
				  appId      : '388308194654157',
				  xfbml      : true,
				  version    : 'v2.1'
				});
			  };

			  (function(d, s, id){
				 var js, fjs = d.getElementsByTagName(s)[0];
				 if (d.getElementById(id)) {return;}
				 js = d.createElement(s); js.id = id;
				 js.src = "//connect.facebook.net/en_US/sdk.js";
				 fjs.parentNode.insertBefore(js, fjs);
			   }(document, 'script', 'facebook-jssdk'));
			</script>
		<?php endif; ?>
		<!-- NAVBAR
================================================== -->
  
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Lifeline</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#aboutLL">About LifeLine</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#lifelines">Samples</a>
                    </li>
                   <li>
                        <a class="page-scroll" href="#line">LINE</a>
                    </li>
                    <!--<li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
