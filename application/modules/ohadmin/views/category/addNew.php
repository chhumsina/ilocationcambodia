
<form class="form-horizontal formValidator" role="form" action="<?php echo BASE_URL;?>ohadmin/category/create" method="POST">
    <div class="form-group">
        <label for="cat_name" class="col-md-2 control-label">Name *</label>
        <div class="col-md-8">
            <input type="input" class="form-control required" id="cat_name" placeholder="" value="" name="cat_name">
        </div>
    </div>

    <div class="form-group">
        <label for="pro_approve" class="col-md-2 control-label">Approve</label>
        <div class="col-md-2">
			<select name="approve" class="form-control">
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
			<a href="<?php echo BASE_URL;?>ohadmin/category" class="btn btn-default">Back</a>
        </div>
    </div>
</form>