<table id="tablelist" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Code</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($pages->result_array() as $page) {
           echo '<tr>';
           echo '<td>'.$page['pag_name'].'</td>';
           echo '<td>'.$page['pag_email'].'</td>';
           echo '<td>'.$page['pag_code'].'</td>';
           echo '<td align="center">';
            if($page['pag_status'] == 1) {
                echo '<a href="'.BASE_URL.'ohadmin/pending/'.$page['pag_id'].'"><span class="btn btn-success">+</span></span></a> <a href="'.BASE_URL.'ohadmin/delete/'.$page['pag_id'].'" class="confirm-delete"><span class="btn btn-danger">x</span></a>';
            }else {
                echo '<a href="'.BASE_URL.'ohadmin/approve/'.$page['pag_id'].'"><span class="btn btn-warning">-</span></a> <a href="'.BASE_URL.'ohadmin/delete/'.$page['pag_id'].'" class="confirm-delete"><span class="btn btn-danger">x</span></a>';
            }
            echo'</td>';
           echo '</tr>';
        }
        ?>
    </tbody>
</table>