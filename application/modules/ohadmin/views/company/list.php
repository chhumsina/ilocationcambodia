<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="<?php echo BASE_URL;?>ohadmin/company/addNew" title="create branch"><button type="button" class="btn btn-primary btn-sm">Create</button></a>
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Logo</th>
						<th>User name</th>
						<th>Email</th>
						<th>Category</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$tr = 0;
					foreach ($companies->result_array() as $company) {
						$tr = $tr + 1;
						echo "<tr class='clickableRow' href='".BASE_URL."ohadmin/company/edit/".$company['com_id']."'>";
						echo "<td>".$tr."</td>";
						echo "<td>".$company['com_name']."</td>";
						echo "<td>".$company['com_logo']."</td>";
						echo "<td>".$company['use_name']."</td>";
						echo "<td>".$company['email']."</td>";
						echo "<td>".$company['cat_name']."</td>";
						echo "<td>";
						if($company[field('approve')] == 1) {
							echo "<a class='' href='".BASE_URL."ohadmin/company/approve/".$company['com_id']."'><span class='btn btn-success btn-sm glyphicon glyphicon-ok'></span></a> ";
						}else {
							echo "<a class='' href='".BASE_URL."ohadmin/company/pending/".$company['com_id']."'><span class='btn btn-warning btn-sm glyphicon glyphicon-exclamation-sign'></span></a> ";
						}
						echo "<a class='confirm-delete' href='".BASE_URL."ohadmin/company/delete/".$company['com_id']."'><span class='btn btn-danger btn-sm glyphicon glyphicon-trash'></span></a></td>";
						echo "</tr></a>";
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.col-lg-12 -->