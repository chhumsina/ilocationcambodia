<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="<?php echo BASE_URL;?>ohadmin/category/addNew" title="create branch"><button type="button" class="btn btn-primary btn-sm">Create</button></a>
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$tr = 0;
					foreach ($categories->result_array() as $category) {
						$tr = $tr + 1;
						echo "<tr class='clickableRow' href='".BASE_URL."ohadmin/category/edit/".$category['cat_id']."'>";
						echo "<td>".$tr."</td>";
						echo "<td>".$category['cat_name']."</td>";
						echo "<td>";
						if($category[field('cat_approve')] == 0) {
							echo "<a class='' href='".BASE_URL."ohadmin/category/pending/".$category['cat_id']."'><span class='btn btn-warning btn-sm glyphicon glyphicon-exclamation-sign'></span></a> ";
						}else {
							echo "<a class='' href='".BASE_URL."ohadmin/category/approve/".$category['cat_id']."'><span class='btn btn-success btn-sm glyphicon glyphicon-ok'></span></a> ";
						}
						echo "<a class='confirm-delete' href='".BASE_URL."ohadmin/category/delete/".$category['cat_id']."'><span class='btn btn-danger btn-sm glyphicon glyphicon-trash'></span></a></td>";
						echo "</tr></a>";
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- /.col-lg-12 -->