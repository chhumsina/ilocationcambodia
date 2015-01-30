<section id="category">
	<div class="container">
		<div class="box first">
			<div class="row">
				<div class="col-md-12">
					<h2>Category</h2>
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
			<div class="row">
				<div class="col-md-12">
					<h2>Company</h2>
					<?php
					foreach ($companies->result_array() as $company) {
						echo '<a class="badge" href="'.BASE_URL.'company/'.strtolower($company['com_name']).'" title="'.$company['com_name'].'">'.$company['com_name'].'</a> ';
					}
					?>
				</div><!--/.col-md-12-->
			</div><!--/.row-->
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