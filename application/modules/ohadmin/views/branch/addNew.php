
<form class="form-horizontal formValidator" role="form" action="<?php echo BASE_URL;?>ohadmin/branch/create" method="POST">
	<div class="form-group">
		<label for="bra_company" class="col-md-2 control-label">Company *</label>
		<div class="col-md-3">
			<select name="bra_company" class="form-control">
				<?php
					foreach ($companies->result_array() as $company) {
						echo '<option value="'.$company['com_id'].'">'.$company['company_name'].'</option>';
					}
				?>
			</select>
		</div>
	</div>
    <div class="form-group">
        <label for="pro_title" class="col-md-2 control-label">Title *</label>
        <div class="col-md-8">
            <input type="input" class="form-control required" id="bra_title" placeholder="" value="" name="bra_title">
        </div>
    </div>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Email *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="bra_email" placeholder="" value="" name="bra_email">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Website</label>
		<div class="col-md-8">
			<input type="input" class="form-control" id="bra_website" placeholder="" value="" name="bra_website">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Phone 1 *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="bra_phone_1" placeholder="" value="" name="bra_phone_1">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_title" class="col-md-2 control-label">Phone 2</label>
		<div class="col-md-8">
			<input type="input" class="form-control" id="bra_phone_2" placeholder="" value="" name="bra_phone_2">
		</div>
	</div>
	<div class="form-group">
		<label for="pro_description" class="col-md-2 control-label">Address *</label>
		<div class="col-md-8">
			<textarea class="form-control required" id="bra_address" name="bra_address"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="pro_description" class="col-md-2 control-label">Description</label>
		<div class="col-md-8">
			<textarea class="form-control" id="" name="bra_description"></textarea>
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
		<div class="row map-form" style="display: none;">
			<label for="pro_title" class="col-md-2 control-label">Lat/Lon/Zoom</label>
			<div class="col-md-8">
				<input type="text" class="gllpLatitude form-control map-input" value="0" name="bra_latitude"/> / <input type="text" class="gllpLongitude form-control map-input" name="bra_longitude" value="0"/> / <input type="text" class="gllpZoom form-control map-input" value="15"/> <input type="button" class="gllpUpdateButton btn btn-primary map-input" value="Update">
			</div>
		</div>
	</div>
    <div class="form-group">
        <label for="pro_approve" class="col-md-2 control-label">Approve</label>
        <div class="col-md-2">
			<select name="pro_approve" class="form-control">
				<option value="1">
					Yes
				</option>
				<option value="0">
					No
				</option>
			</select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
            <input type="submit" name="btn_submit" class="btn btn-primary" value="Submit"/>
			<a href="<?php echo BASE_URL;?>ohadmin/branch" class="btn btn-default">Back</a>
        </div>
    </div>
</form>