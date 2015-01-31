		<section id="menu" class="row map_content">
			<h2 class="two columns mobile-one">Menu</h2>
			<div class="four columns menu mobile-two">
				<ul class="tabs-content">
					<li class="active" id="example3Tab">
						<div class="row">
							<div class="four columns">
								<div class="gmap_controls" id="controls"></div>
							</div>
						</div>
						<div class="row">
							<div class="four columns">
								<div class="gmap" id="gmap-4"></div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</section>

		<script language="JavaScript">
			var LocsA = [
				<?php foreach ($companies->result_array() as $company) {
						echo "{";
						echo "title:'".$company['title']."',";
						echo "lat:".$company['latitude'].",";
						echo "lon:".$company['longitude'].",";
						echo "html:'<b>".$company['title']."</b><br/><br/><p>Email: ".$company['email']."</p><p>Website: ".$company['website']."</p><p>Phone 1: ".$company['phone_1']."</p><p>Phone 2: ".$company['phone_2']."</p><p>Address: ".$company['address']."</p><p>Description:  ".$company['description']."</p>',";
						echo "icon:'".IMAGE_PATH.$company['com_logo']."'";
						echo "},";
					}
				echo ']';
				?>
		</script>
