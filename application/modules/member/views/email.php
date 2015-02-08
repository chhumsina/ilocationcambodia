<?php
foreach ($email_verify->result_array() as $mem) {
	$use_name = $mem[field('use_name')];
	$email = $mem[field('email')];
	$re_password = $mem[field('re_password')];
	$date= $mem[field('create_date')];
}
?>

<div style="box-shadow: 0 1px 10px #CCCCCC;">
	<div style="text-align: center">
		<?php echo '<p><b>Account information</b></p>'; ?>
	</div>
	<div style="background: #FEFEFE; border-bottom: 1px dashed #CCC; border-top: 1px dashed #CCC; padding: 10px;">
		<?php
		echo '<b>Username:</b> '. str_replace("_", " ",$use_name).'<br/>';
		echo '<b>E-mail:</b> '.$email.'<br/>';
		echo '<b>Password:</b> '.$re_password.'<br/>';
		echo '<b>Date created:</b> '.$date.'<br/><br/>';
		//echo '<b>Page :</b>'.BASE_URL.'members/'.$memName.'<br/><br/>';
		?>
	</div>
	<div style="text-align: center">
			<?php echo '<p>Copyright © 2014 <b>'.BASE_URL.'</b>. All Rights Reserved - Version 0.1</p>'; ?>
	</div>

</div>