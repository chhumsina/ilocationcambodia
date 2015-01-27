<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="<?php echo BASE_URL;?>ohadmin/branch/addNew" title="create branch"><button type="button" class="btn btn-primary btn-sm">Create</button></a>
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
					<tr>
						<th>No.</th>
						<th>Title</th>
						<th>Latitude</th>
						<th>Longitude </th>
						<th>Email</th>
						<th>Website</th>
						<th>Phone 1</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$tr = 0;
					foreach ($branches->result_array() as $branch) {
						$tr = $tr + 1;
						echo "<tr>";
						echo "<td>".$tr."</td>";
						echo "<td>".substr($branch['title'],0,10)."</td>";
						echo "<td>".$branch['latitude']."</td>";
						echo "<td>".$branch['longitude']."</td>";
						echo "<td>".$branch['email']."</td>";
						echo "<td>".$branch['website']."</td>";
						echo "<td>".$branch['phone_1']."</td>";
						echo "<td>".substr($branch['address'],0,10)."</td>";
						echo "<td><span class='btn btn-success btn-sm glyphicon glyphicon-ok'></span> <span class='btn btn-danger btn-sm glyphicon glyphicon-trash'></span></td>";
						echo "</tr>";
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.col-lg-12 -->