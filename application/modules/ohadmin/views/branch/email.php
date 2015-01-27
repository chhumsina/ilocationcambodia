<?php
foreach ($promotion_author->result_array() as $promotion) {
	$id = $promotion[field('pro_id')];
	$title = $promotion[field('pro_title')];
	$image = $promotion[field('pro_image')];
	$description = $promotion[field('pro_description')];
	$author_name = $promotion[field('pro_author_name')];
	$author_email = $promotion[field('pro_author_email')];
	$email_show = $promotion[field('pro_author_email_show')];
	$date = $promotion[field('pro_create_date')];
}
?>

<div style="box-shadow: 0 1px 10px #CCCCCC;">
	<div style="background: #fafafa; border: 1px dashed #cccccc; padding: 20px;">
	<?php
		echo '<div style="text-align: center">';
		echo '<h2>'.$title.'</h2>';
		echo '<img src="www.google.com.kh/images/srpr/logo11w.png" alt="'.$title.'" title="'.$title.'" /><br/>';
		echo '</div>';
		echo 'by '.'<b>'.$author_name.'</b> '.'on '.'<b>'.$date.'</b>';
		?>
		<p>* Your article which posted in <b>Howto</b> on <?php echo $date;?> is approved, Please click <?php echo '<a href="'.BASE_URL.'promotion/'.$id.'">here</a>';?> to view your post. </p>
	</div>
	<div style="background: #FEFEFE; border-bottom: 1px dashed #CCC; padding: 10px;">
		<?php
		echo '<p style="font-size: 15px;">'.$description.'</p>';
		?>
	</div>
	<div style="text-align: center">
			<?php echo '<p>Copyright © 2014 <b>'.BASE_URL.'</b>. All Rights Reserved - Version 0.1</p>'; ?>
	</div>

</div>