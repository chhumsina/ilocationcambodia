<h2>Company</h2>
<?php
	foreach ($companies->result_array() as $company) {
		echo '<a class="badge" href="'.BASE_URL.strtolower($company['company_name']).'" title="'.$company['company_name'].'">'.$company['company_name'].'</a> ';
	}
?>