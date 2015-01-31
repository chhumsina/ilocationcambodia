
<form class="form-horizontal formValidator" role="form" action="<?php echo BASE_URL;?>ohadmin/company/create" method="POST">
	<div class="form-group">
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
        <label for="user_name" class="col-md-2 control-label">User name *</label>
        <div class="col-md-8">
            <input type="input" class="form-control required" id="user_name" placeholder="" value="" name="user_name">
        </div>
    </div>
	<div class="form-group">
		<label for="password" class="col-md-2 control-label">Password *</label>
		<div class="col-md-8">
			<input type="password" class="form-control required" id="password" placeholder="" value="" name="password">
		</div>
	</div>
	<div class="form-group">
		<label for="com_name" class="col-md-2 control-label">Company name *</label>
		<div class="col-md-8">
			<input type="input" class="form-control required" id="com_name" placeholder="" value="" name="com_name">
		</div>
	</div>

    <div class="form-group">
        <div class="col-md-2 col-md-offset-2">
            <input type="submit" name="btn_submit" class="btn btn-primary" value="Submit"/>
			<a href="<?php echo BASE_URL;?>ohadmin/company" class="btn btn-default">Back</a>
        </div>
    </div>
</form>