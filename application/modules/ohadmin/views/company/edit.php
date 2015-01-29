<?php
	foreach ($companies->result_array() as $company) {
		$com_id = $company[field('com_id')];
		$com_name = $company[field('com_name')];
		$user_name = $company[field('use_name')];
		$password = $company[field('re_password')];
		$approve = $company[field('approve')];
	}
?>

<form class="form-horizontal formValidator" role="form" action="<?php echo BASE_URL;?>ohadmin/company/update" method="POST">
	<div class="form-group">
		<input type="hidden" value="<?php echo $com_id; ?>" name="com_id"/>
		<label for="cat_name" class="col-md-2 control-label">Category *</label>
		<div class="col-md-3">
			<select name="cat_name" class="form-control">
				<?php
				foreach ($categories->result_array() as $category) {
					echo '<option value="'.$category['cat_id'].'">'.$category['cat_name'].'</option>';
				}
				?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="com_name" class="col-md-2 control-label">Company name *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="com_name" placeholder="" value="<?php echo $com_name; ?>" name="com_name">
		</div>
	</div>
	<div class="form-group">
		<label for="user_name" class="col-md-2 control-label">User name *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="user_name" placeholder="" value="<?php echo $user_name; ?>" name="user_name">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-md-2 control-label">Password *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="password" placeholder="" value="<?php echo $password; ?>" name="password">
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
			<a href="<?php echo BASE_URL;?>ohadmin/company" class="btn btn-danger">Cancel</a>
		</div>
	</div>
</form>