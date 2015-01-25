<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			DataTables Advanced Tables
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
						<th>Phone 2</th>
						<th>Address</th>
						<th>Description</th>
					</tr>
					</thead>
					<tbody>
					<?php
						$tr = 0;
						foreach ($branches->result_array() as $branch) {
							$tr = $tr + 1;
							echo "<tr>";
							echo "<td>".$tr."</td>";
							echo "<td>".$branch['title']."</td>";
							echo "<td>".$branch['latitude']."</td>";
							echo "<td>".$branch['longitude']."</td>";
							echo "<td>".$branch['email']."</td>";
							echo "<td>".$branch['website']."</td>";
							echo "<td>".$branch['phone_1']."</td>";
							echo "<td>".$branch['phone_2']."</td>";
							echo "<td>".$branch['address']."</td>";
							echo "<td>".$branch['description']."</td>";
							echo "</tr>";
							$tr++;
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.col-lg-12 -->