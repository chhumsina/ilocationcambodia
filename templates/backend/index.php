<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $action;?> - Member</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- lat lon picker google map -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_TEMPLATE; ?>latlonPicker/css/jquery-gmaps-latlon-picker.css"/>

	<!-- MetisMenu CSS -->
	<link href="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

	<!-- DataTables CSS -->
	<link href="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

	<!-- DataTables Responsive CSS -->
	<link href="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo ASSETS_TEMPLATE; ?>sb-admin/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="<?php echo BASE_URL;?>" target="_blank">ILocationCambodia</a>
</div>
<!-- /.navbar-header -->

<ul class="nav navbar-top-links navbar-right">
	<li><a href="<?php echo BASE_URL;?>member/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
</ul>
<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li class="sidebar-search">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
									<i class="fa fa-search"></i>
								</button>
                            </span>
				</div>
				<!-- /input-group -->
			</li>
			<?php if ($this->session->userdata('ohadmin')) {?>
			<li>
				<a href="<?php echo BASE_URL;?>ohadmin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
			</li>
			<li>
				<a href="<?php echo BASE_URL;?>ohadmin/category"><i class="fa fa-qrcode fa-fw"></i> Category</a>
			</li>
			<li>
				<a href="<?php echo BASE_URL;?>ohadmin/company"><i class="fa fa-credit-card fa-fw"></i> Company</a>
			</li>
			<li>
				<a href="<?php echo BASE_URL;?>ohadmin/branch"><i class="fa fa-map-marker fa-fw"></i> Branch</a>
			</li>
			<li>
				<a href="<?php echo BASE_URL;?>ohadmin/contact"><i class="fa fa-phone fa-fw"></i> Contact</a>
			</li>
			<?php } ?>
			<?php if ($this->session->userdata('useName')) {?>
				<li>
					<a href="<?php echo BASE_URL;?>member/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
				</li>
				<li>
					<a href="<?php echo BASE_URL;?>member/company"><i class="fa fa-credit-card fa-fw"></i> Company</a>
				</li>
				<li>
					<a href="<?php echo BASE_URL;?>member/branch"><i class="fa fa-map-marker fa-fw"></i> Branch</a>
				</li>
				<li>
					<a href="<?php echo BASE_URL;?>member/contact"><i class="fa fa-phone fa-fw"></i> Contact</a>
				</li>
			<?php } ?>
		</ul>
	</div>
	<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>

<div id="page-wrapper">
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"><?php echo $action;?></h1>
		<?php echo $this->session->userdata('ms_succss')?$this->session->userdata('ms_succss'):'';?>
		<?php echo validation_errors();?>
		<?php $this->session->unset_userdata('ms_succss');?>
	</div>
	<!-- /.col-lg-12 -->
</div>

<div class="row">
	<?php empty($page) ? '' : $this->load->view($page); ?>
</div>
<!-- /.row -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/jquery/dist/jquery.min.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- lat lon picker google map -->
<script src="<?php echo ASSETS_TEMPLATE; ?>latlonPicker/js/jquery-gmaps-latlon-picker.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_TEMPLATE; ?>sb-admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo ASSETS_TEMPLATE; ?>sb-admin/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true
		});

		$(".confirm-delete").click(function () {
			if (!confirm("Do you want to delete?")) {
				return false;
			}
		});

		$(".clickableRow").click(function() {
			console.log(window.document.location = $(this).attr("href"));

		});

		$(".alert-success").fadeOut(2000);

		// upload image
		$(document).on('click, mouseleave', '#close-preview, .popover', function(){
			$('.image-preview').popover('hide');
			// Hover befor close the preview
			$('.image-preview').hover(
					function () {
						$('.image-preview').popover('show');
					},
					function () {
						$('.image-preview').popover('hide');
					}
			);
		});

		$(function() {
			// Create the close button
			var closebtn = $('<button/>', {
				type:"button",
				text: 'x',
				id: 'close-preview',
				style: 'font-size: initial;',
			});
			closebtn.attr("class","close pull-right");
			// Set the popover default content
			$('.image-preview').popover({
				trigger:'manual',
				html:true,
				title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
				content: "There's no image",
				placement:'bottom'
			});
			// Clear event
			$('.image-preview-clear').click(function(){
				$('.image-preview').attr("data-content","").popover('hide');
				$('.image-preview-filename').val("");
				$('.image-preview-clear').hide();
				$('.image-preview-input input:file').val("");
				$(".image-preview-input-title").text("Browse");
			});
			// Create the preview image
			$(".image-preview-input input:file").change(function (){
				var img = $('<img/>', {
					id: 'dynamic',
					width:250,
					height:200
				});
				var file = this.files[0];
				var reader = new FileReader();
				// Set preview image into the popover data-content
				reader.onload = function (e) {
					$(".image-preview-input-title").text("Change");
					$(".image-preview-clear").show();
					$(".image-preview-filename").val(file.name);
					img.attr('src', e.target.result);
					$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
				}
				reader.readAsDataURL(file);
			});
		});
	});
</script>

</body>

</html>
