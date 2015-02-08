		<section id="menu" class="row map_content">


			<!-- Begin Listing: 609 W GRAVERS LN-->
			<div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="margin-left: -15px; margin-right: -44px;">
				<div class="media">
					<a class="pull-left" href="#" target="_parent">
						<img style="height: 165px;"  alt="<?php echo $image;?>" src="<?php echo IMAGE_PATH.$image;?>" title="<?php echo $image;?>"></a>

					<div class="clearfix visible-sm"></div>

					<div class="media-body fnt-smaller">
						<a href="#" target="_parent"></a>

						<h4 class="media-heading">
							<a href="#" target="_parent"><?php echo str_replace('_',' ',ucwords($name));?></a></h4>


						<ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
							<li>24 Branches</li>
						</ul>

						<p class="hidden-xs"><?php echo $description;?></p>
						<p>E-mail: <?php echo $email;?></p>
						<p>Phone 1: <?php echo $phone_1;?></p>
						<?php if($phone_2) {
							echo "<p>Phone 2: ".$phone_2."</p>";
						}
						?>
					</div>
				</div>
			</div><!-- End Listing-->
			</div>

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
						echo "icon:'".IMAGE_PATH.'thumb_'.$company['com_logo']."'";
						echo "},";
					}
				echo ']';
				?>
		</script>
