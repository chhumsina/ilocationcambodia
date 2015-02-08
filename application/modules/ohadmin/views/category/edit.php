<?php
	foreach ($categories->result_array() as $category) {
		$cat_id = $category[field('cat_id')];
		$cat_name = $category[field('cat_name')];
		$approve = $category[field('cat_approve')];
	}
?>
<form class="form-horizontal formValidate" role="form" action="<?php echo BASE_URL;?>ohadmin/category/update" method="POST">
	<input type="hidden" value="<?php echo $cat_id; ?>" name="cat_id"/>
	<div class="form-group">
		<label for="cat_name" class="col-md-2 control-label">Name *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="cat_name" placeholder="" value="<?php echo $cat_name; ?>" name="cat_name">
		</div>
	</div>
	<div class="form-group">
		<label for="approve" class="col-md-2 control-label">Approve</label>
		<div class="col-md-2">
			<select name="approve" class="form-control">
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
			<a href="<?php echo BASE_URL;?>ohadmin/category" class="btn btn-danger">Cancel</a>
		</div>
	</div>
</form>