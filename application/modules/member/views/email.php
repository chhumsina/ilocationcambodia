<?php
foreach ($mem_verify->result_array() as $mem) {
	$memName = $mem[field('mem_name')];
	$memEmail = $mem[field('mem_email')];
	$memImage = $mem[field('mem_image')];
	$memPassword = $mem[field('mem_password')];
	$memPass = $mem[field('mem_pass')];
	$memDate= $mem[field('mem_create_date')];
}
?>

<div style="box-shadow: 0 1px 10px #CCCCCC;">
	<div style="text-align: center">
		<?php echo '<p><b>Account information</b></p>'; ?>
	</div>
	<div style="background: #FEFEFE; border-bottom: 1px dashed #CCC; border-top: 1px dashed #CCC; padding: 10px;">
		<?php
		echo '<b>Name:</b> '. str_replace("_", " ", ucfirst($memName)).'<br/>';
		echo '<b>E-mail:</b> '.$memEmail.'<br/>';
		echo '<b>Password:</b> '.$memPass.'<br/>';
		echo '<b>Date created:</b> '.$memDate.'<br/><br/>';
		echo '<b>Page :</b>'.BASE_URL.'members/'.$memName.'<br/><br/>';
		?>
	</div>
	<div style="text-align: center">
			<?php echo '<p>Copyright © 2014 <b>'.BASE_URL.'</b>. All Rights Reserved - Version 0.1</p>'; ?>
	</div>

</div>