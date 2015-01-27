<?php
	foreach ($promotion->result_array() as $promotion) {
		$pro_id = $promotion[field('pro_id')];
		$title = $promotion[field('pro_title')];
		$image = $promotion[field('pro_image')];
		$description = $promotion[field('pro_description')];
		$email_show = $promotion[field('pro_author_email_show')];
		$preview = $promotion[field('pro_preview')];
		$approve = $promotion[field('pro_approve')];
	}
?>
<form class="form-horizontal formValidate" role="form" action="<?php echo BASE_URL;?>ohadmin/promotion/update" method="POST">
	<input type="hidden" value="<?php echo $pro_id; ?>" name="pro_id"/>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Title *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="pro_title" placeholder="" value="<?php echo $title; ?>" name="pro_title">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_image" class="col-md-2 control-label">Image</label>
		<div class="col-md-8">
			<input type="text" class="form-control" id="pro_image" value="<?php echo $image; ?>" name="pro_image">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_description" class="col-md-2 control-label">Description</label>
		<div class="col-md-8">
			<textarea class="summernote form-control" id="rte-content" name="pro_description"><?php echo $description; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="pro_preview" class="col-md-2 control-label">Preview</label>
		<div class="col-md-1">
			<input type="input" class="form-control" id="pro_preview" placeholder="" value="<?php echo $preview; ?>" name="pro_preview">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_author_email_show" class="col-md-2 control-label">Show Email</label>
		<div class="col-md-1">
			<select name="pro_author_email_show" class="form-control">
				<option value="1"  <?php if($email_show ==1){echo 'selected';}?>>
					Yes
				</option>
				<option value="0" <?php if($email_show ==0){echo 'selected';}?>>
					No
				</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="pro_approve" class="col-md-2 control-label">Approve</label>
		<div class="col-md-1">
			<select name="pro_approve" class="form-control">
				<option value="1"  <?php if($approve ==1){echo 'selected';}?>>
					Yes
				</option>
				<option value="0" <?php if($approve ==0){echo 'selected';}?>>
					No
				</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-2 col-md-offset-2">
			<input type="submit" name="btn_submit" class="btn btn-primary" value="Update"/>
			<a href="<?php echo BASE_URL;?>ohadmin/promotion/promotion" class="btn btn-danger">Cancel</a>
		</div>
	</div>
</form>

<div class="text-center"><img src="<?php echo PROMOTION_IMAGE.$image; ?>" class="img-responsive"/></div>