<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="<?php echo BASE_URL;?>member/branch/addNew" title="create branch"><button type="button" class="btn btn-primary btn-sm">Create</button></a>
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<?php
				if($branches->num_rows() > 0) {

				?>
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
					<tr>
						<th>No.</th>
						<th>Title</th>
						<th>Email</th>
						<th>Website</th>
						<th>Phone 1</th>
						<th>Address</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$tr = 0;
					foreach ($branches->result_array() as $branch) {
						$tr = $tr + 1;
						echo "<tr class='clickableRow' href='".BASE_URL."member/branch/edit/".$branch['branch_id']."'>";
						echo "<td>".$tr."</td>";
						echo "<td>".substr($branch['title'],0,10)."</td>";
						echo "<td>".$branch['email']."</td>";
						echo "<td>".$branch['website']."</td>";
						echo "<td>".$branch['phone_1']."</td>";
						echo "<td>".substr($branch['address'],0,10)."</td>";
						echo "<td>".substr($branch['description'],0,10)."</td>";
						echo "<td>";
						if($branch[field('bra_approve')] == 0) {
							echo "<a class='' href='".BASE_URL."member/branch/pending/".$branch['branch_id']."'><span class='btn btn-warning btn-sm glyphicon glyphicon-exclamation-sign'></span></a> ";
						}else {
							echo "<a class='' href='".BASE_URL."member/branch/approve/".$branch['branch_id']."'><span class='btn btn-success btn-sm glyphicon glyphicon-ok'></span></a> ";
						}
						echo "<a class='confirm-delete' href='".BASE_URL."member/branch/delete/".$branch['branch_id']."'><span class='btn btn-danger btn-sm glyphicon glyphicon-trash'></span></a></td>";
						echo "</tr></a>";
					}
					?>
					</tbody>
				</table>
				<?php
				}else {
					echo '<p>There is no Branch.</p>';
				}
				?>
			</div>
		</div>
		<!-- /.col-lg-12 -->