<?php
	foreach ($branches->result_array() as $branch) {
		$bra_id = $branch[field('branch_id')];
		$title = $branch[field('title')];
		$longitude = $branch[field('longitude')];
		$latitude = $branch[field('latitude')];
		$email = $branch[field('email')];
		$website = $branch[field('website')];
		$phone_1 = $branch[field('phone_1')];
		$phone_2 = $branch[field('phone_2')];
		$address = $branch[field('address')];
		$description = $branch[field('description')];
		$approve = $branch[field('approve')];
	}
?>


<form class="form-horizontal formValidator" role="form" action="<?php echo BASE_URL;?>member/branch/update" method="POST">
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Title *</label>
		<div class="col-md-8">
			<input type="hidden" class="form-control" placeholder="" value="<?php echo $this->session->userdata('comId');?>" name="com_id">
			<input type="hidden" class="form-control" placeholder="" value="<?php echo $bra_id;?>" name="bra_id">
			<input type="input" class="form-control required" id="bra_title" placeholder="" value="<?php echo $title;?>" name="bra_title">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Email *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="bra_email" placeholder="" value="<?php echo $email;?>" name="bra_email">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Website</label>
		<div class="col-md-8">
			<input type="input" class="form-control" id="bra_website" placeholder="" value="<?php echo $website; ?>" name="bra_website">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Phone 1 *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="bra_phone_1" placeholder="" value="<?php echo $phone_1; ?>" name="bra_phone_1">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Phone 2</label>
		<div class="col-md-8">
			<input type="input" class="form-control" id="bra_phone_2" placeholder="" value="<?php echo  $phone_2; ?>" name="bra_phone_2">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_description" class="col-md-2 control-label">Address *</label>
		<div class="col-md-8">
			<textarea class="form-control required" id="bra_address" name="bra_address"><?php echo $address;?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="pro_description" class="col-md-2 control-label">Description</label>
		<div class="col-md-8">
			<textarea class="form-control" id="" name="bra_description"><?php echo $description;?></textarea>
		</div>
	</div>
	<div class="form-group gllpLatlonPicker">
		<div class="row map-form">
			<label for="pro_title" class="col-md-2 control-label">Search</label>
			<div class="col-md-6">
				<input type="text" value="phnom penh, cambodia" class="gllpSearchField form-control">
			</div>
			<div class="col-md-2">
				<input type="button" class="gllpSearchButton form-control btn btn-primary" value="search">
			</div>
		</div>
		<br/>
		<div class="row map-form">
			<label for="pro_title" class="col-md-2 control-label">Map </label>
			<div class="col-md-8">
				<div class="gllpMap">Google Maps</div>
			</div>
		</div>
		<br/>
		<input type="hidden" class="gllpLatitude form-control map-input" value="<?php echo $latitude;?>" name="bra_latitude"/>  <input type="hidden" class="gllpLongitude form-control map-input" name="bra_longitude" value="<?php echo $longitude;?>"/>
		<div class="form-group">
			<label for="pro_approve" class="col-md-2 control-label">Approve</label>
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
				<a href="<?php echo BASE_URL;?>member/branch" class="btn btn-default">Back</a>
			</div>
		</div>
</form>