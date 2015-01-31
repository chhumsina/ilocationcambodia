<?php
	foreach ($companies->result_array() as $company) {
		$com_id = $company[field('com_id')];
		$image = $company[field('com_logo')];
		$com_name = $company[field('com_name')];
		$user_name = $company[field('use_name')];
		$email = $company[field('email')];
		$phone_1 = $company[field('phone_1')];
		$phone_2 = $company[field('phone_2')];
		$description = $company[field('description')];
		$approve = $company[field('approve')];
	}
?>
<form enctype="multipart/form-data" class="form-horizontal formValidator companyForm" role="form" action="<?php echo BASE_URL;?>member/company/update" method="POST">
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
		<div class="col-md-6">
			<!-- image-preview-filename input [CUT FROM HERE]-->
			<div class="input-group image-preview">
				<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
						<span class="glyphicon glyphicon-remove"></span> Clear
					</button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
						<span class="glyphicon glyphicon-folder-open"></span>
						<span class="image-preview-input-title">Browse</span>
						<input type="file" accept="image/png, image/jpeg, image/gif" name="com_logo"/> <!-- rename it -->
						<input type="hidden" value="<?php echo $image;?>" name="com_logo"/>
					</div>
                </span>
			</div><!-- /input-group image-preview [TO HERE]-->
		</div>
	</div>
	<div class="form-group">
		<label for="com_name" class="col-md-2 control-label">Company logo</label>
		<div class="col-md-6">
			<input type="input" class="form-control required" id="com_name" placeholder="" value="<?php echo $com_name; ?>" name="com_name">
		</div>
	</div>
	<div class="form-group">
		<label for="user_name" class="col-md-2 control-label">User name *</label>
		<div class="col-md-6">
			<input type="input" class="form-control required" readonly id="user_name" placeholder="" value="<?php echo $user_name; ?>" name="user_name">
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-2 control-label">E-mail *</label>
		<div class="col-md-6">
			<input type="input" class="form-control required" id="email" placeholder="" value="<?php echo $email; ?>" name="email">
		</div>
	</div>
	<div class="form-group">
		<label for="phone1" class="col-md-2 control-label">Phone 1</label>
		<div class="col-md-6">
			<input type="input" class="form-control" id="phone1" placeholder="" value="<?php echo $phone_1; ?>" name="phone_1">
		</div>
	</div>
	<div class="form-group">
		<label for="phone2" class="col-md-2 control-label">Phone 2</label>
		<div class="col-md-6">
			<input type="input" class="form-control" id="phone2" placeholder="" value="<?php echo $phone_2; ?>" name="phone_2">
		</div>
	</div>
	<div class="form-group">
		<label for="description" class="col-md-2 control-label">Description</label>
		<div class="col-md-6">
			<textarea cols="79" rows="1" name="description"><?php echo $description;?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="approve" class="col-md-2 control-label">Publish</label>
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
			<a href="<?php echo BASE_URL;?>member/company" class="btn btn-danger">Cancel</a>
		</div>
	</div>
</form>