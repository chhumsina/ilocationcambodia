<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo (empty($title) ? '' : $title . ' - ') . TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- styles -->
	    <link href="<?php echo ASSETS_TEMPLATE; ?>css/bootstrap.min.css" rel="stylesheet">
	    <link href="<?php echo ASSETS_TEMPLATE; ?>css/font-awesome.min.css" rel="stylesheet">
	    <link href="<?php echo ASSETS_TEMPLATE; ?>css/main.css" rel="stylesheet">

	    <!-- styles -->
        <!-- end style -->
        <!-- JS -->
        <script src="<?php echo ASSETS_TEMPLATE; ?>js/jquery.js"></script>
        <script src="<?php echo ASSETS_TEMPLATE; ?>js/bootstrap.min.js"></script>
        <script src="<?php echo ASSETS_TEMPLATE; ?>js/main.js"></script>
        <!-- end js -->
    </head>
    
<body data-spy="scroll" data-target="#navbar" data-offset="0">
	<section id="home"></section>
    <header id="header" role="banner">
        <div class="container">
			<?php include 'menu.php';?>
			<?php
			if($this->session->flashdata('message')) {
				echo '<p style="box-shadow: 0 2px 5px #888;	margin-top: -20px;	padding: 10px;" class="alert-success">'.$this->session->flashdata('message').'</p>';
			}else if($this->session->flashdata('messageError')){
				echo '<p style="box-shadow: 0 2px 5px #888;	margin-top: -20px;	padding: 10px;" class="alert-danger">'.$this->session->flashdata('messageError').'</p>';
			}
			?>
        </div>
    </header><!--/#header-->

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div id="homemap"  style="position:fixed;overflow:hidden;width:100%;"><div id="gmap_canvas" style="width:100%;"></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(11.54487,104.89217),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(11.54487,104.89217)});infowindow = new google.maps.InfoWindow({content:"<b>ILocationCambodia</b>" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
<br/>
<br/>
<br/>
	<?php empty($page) ? '' : $this->load->view($page); ?>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <img class="pull-right" src="images/shapebootstrap.png" alt="ShapeBootstrap" title="ShapeBootstrap">
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
	<script>
		$(function(){
			var windowH = $(window).height();
			var wrapperH = $('#homemap, #gmap_canvas').height();
			if(windowH > wrapperH) {
				$('#homemap, #gmap_canvas').css({'height':($(window).height())+'px'});
			}
			$(window).resize(function(){
				var windowH = $(window).height();
				var wrapperH = $('#homemap, #gmap_canvas').height();
				var differenceH = windowH - wrapperH;
				var newH = wrapperH + differenceH;
				var truecontentH = $('#truecontent').height();
				if(windowH > truecontentH) {
					newH = newH - 0;
					$('#homemap, #gmap_canvas').css('height', (newH)+'px');
				}
			})
		});

		$(document).ready(function() {

			$(".clickableRow").click(function() {
				console.log(window.document.location = $(this).attr("href"));

			});
		});
	</script>

	<?php include 'login.php';?>

    </body>

</html>