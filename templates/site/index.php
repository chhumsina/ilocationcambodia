<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo (empty($title) ? '' : $title . ' - ') . TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- styles -->
		<link rel="stylesheet" href="<?php echo ASSETS_TEMPLATE; ?>css/libs.min.css">
		<link rel="stylesheet" href="<?php echo ASSETS_TEMPLATE; ?>css/app.css">
        <!-- end style -->

    </head>

    <body>

	<?php empty($page) ? '' : $this->load->view($page); ?>

    </body>


	<script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.13"></script>
	<script src="<?php echo ASSETS_TEMPLATE; ?>js/libs.min.js?v=0.1.32"></script>

	<script src="<?php echo ASSETS_TEMPLATE; ?>js/maplace-0.1.3.min.js?v=0.1.32"></script>

	<script>
		var LocsA = [
			{
				lat: 45.9,
				lon: 10.9,
				title: 'Title A1',
				html: '<h3>Content A1</h3>',
				icon: 'http://maps.google.com/mapfiles/markerA.png',
				animation: google.maps.Animation.DROP
			},
			{
				lat: 51.5,
				lon: -1.1,
				title: 'Title C1',
				html: [
					'<h3>Content C1</h3>',
					'<p>Lorem Ipsum..</p>'
				].join(''),
				zoom: 8,
				icon: 'http://maps.google.com/mapfiles/markerC.png'
			}
		];
	</script>

	<script src="<?php echo ASSETS_TEMPLATE; ?>js/app.js?v=0.1.32"></script>

</html>