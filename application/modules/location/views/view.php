<section id="category">
	<div class="container">
		<div class="box first">
			<div class="row">
				<div class="col-md-12">
					<h1>Category</h1>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, dummy text of the printing and typesetting industry</p>
					<?php
					foreach ($categories->result_array() as $category) {
						echo '<a class="badge" href="'.BASE_URL.'category/'.strtolower($category['cat_name']).'" title="'.$category['cat_name'].'">'.$category['cat_name'].'</a> ';
					}
					?>
				</div><!--/.col-md-12-->
			</div><!--/.row-->
		</div><!--/.box-->
	</div><!--/.container-->
</section><!--/#services-->

<section id="company">
	<div class="container">
		<div class="box first">
		<div class="container container-pad" id="property-listings">

		<div class="row">
			<div class="col-md-12">
				<h1>Company</h1>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry, dummy text of the printing and typesetting industry</p>
			</div>
			<br/>
		</div>

		<div class="row">
		<div class="col-sm-6">
			<?php
			$row = 0;
			$collectContent= null;
			foreach ($companies->result_array() as $company) {
				 $row++;
				if($row%2 == 1) {
			?>
				<!-- Begin Listing: 609 W GRAVERS LN-->

				<div class="clickableRow brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" <?php echo 'href="'.BASE_URL.'company/'.strtolower($company['com_name']).'" title="'.$company['com_name'].'"';?>>
					<div class="media">
						<a class="pull-left" href="" target="_parent">
							<img  alt="<?php echo $company['com_logo'];?>" src="<?php echo IMAGE_PATH.$company['com_logo'];?>" title="<?php echo $company['com_logo'];?>"></a>

						<div class="clearfix visible-sm"></div>

						<div class="media-body fnt-smaller">
							<a href="#" target="_parent"></a>

							<h4 class="media-heading">
								<a href="#" target="_parent"><?php echo str_replace("_"," ",$company['com_name']);?></a></h4>


							<ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
								<li>43 Branches</li>
							</ul>

							<p class="hidden-xs"><?php echo $company['description'];?></p><span class="fnt-smaller fnt-lighter fnt-arial">dummy text of the printing and typesetting industry,</span>
						</div>
					</div>
				</div><!-- End Listing-->
			<?php
				}else {
					$collectContent = '<div href="'.BASE_URL.'company/'.strtolower($company['com_name']).'" title="'.$company['com_name'].'" class="clickableRow brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
					<div class="media">
						<a class="pull-left" href="" target="_parent">
							<img title="'. $company["com_logo"].'" alt="'. $company["com_logo"].'" class="img-responsive" src="'. IMAGE_PATH.$company["com_logo"].'"></a>

						<div class="clearfix visible-sm"></div>

						<div class="media-body fnt-smaller">

							<h4 class="media-heading">
								<a href="#" target="_parent">'.str_replace("_"," ",$company['com_name']).'</a></h4>


							<ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
								<li>43 Branches</li>
							</ul>

							<p class="hidden-xs">'. $company["description"].'</p><span class="fnt-smaller fnt-lighter fnt-arial">dummy text of the printing and typesetting industry,</span>
						</div>
					</div>
				</div>'.$collectContent;
				}

			}
			?>

		</div>

		<div class="col-sm-6">
			<?php echo $collectContent;?>
		</div><!-- End Col -->
		</div><!-- End row -->
		</div><!-- End container -->
		</div><!--/.box-->
	</div><!--/.container-->
</section><!--/#services-->

<section id="contact">
	<div class="container">
		<div class="box last">
			<div class="row">
				<div class="col-sm-6">
					<h1>Contact Form</h1>
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
					<div class="status alert alert-success" style="display: none"></div>
					<form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php" role="form">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" required="required" placeholder="Name">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<input type="text" class="form-control" required="required" placeholder="Email address">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-danger btn-lg">Send Message</button>
								</div>
							</div>
						</div>
					</form>
				</div><!--/.col-sm-6-->
				<div class="col-sm-6">
					<h1>Our Address</h1>
					<div class="row">
						<div class="col-md-6">
							<address>
								<strong>Twitter, Inc.</strong><br>
								795 Folsom Ave, Suite 600<br>
								San Francisco, CA 94107<br>
								<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>
						</div>
						<div class="col-md-6">
							<address>
								<strong>Twitter, Inc.</strong><br>
								795 Folsom Ave, Suite 600<br>
								San Francisco, CA 94107<br>
								<abbr title="Phone">P:</abbr> (123) 456-7890
							</address>
						</div>
					</div>
					<h1>Connect with us</h1>
					<div class="row">
						<div class="col-md-6">
							<ul class="social">
								<li><a href="#"><i class="icon-facebook icon-social"></i> Facebook</a></li>
								<li><a href="#"><i class="icon-google-plus icon-social"></i> Google Plus</a></li>
								<li><a href="#"><i class="icon-pinterest icon-social"></i> Pinterest</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="social">
								<li><a href="#"><i class="icon-linkedin icon-social"></i> Linkedin</a></li>
								<li><a href="#"><i class="icon-twitter icon-social"></i> Twitter</a></li>
								<li><a href="#"><i class="icon-youtube icon-social"></i> Youtube</a></li>
							</ul>
						</div>
					</div>
				</div><!--/.col-sm-6-->
			</div><!--/.row-->
		</div><!--/.box-->
	</div><!--/.container-->
</section><!--/#contact-->