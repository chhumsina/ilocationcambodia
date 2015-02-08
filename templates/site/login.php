<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<br>
			<div class="bs-example bs-example-tabs">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#login" data-toggle="tab">Log In</a></li>
					<li class=""><a href="#register" data-toggle="tab">Register</a></li>
					<li class=""><a href="#why" data-toggle="tab">Why?</a></li>
				</ul>
			</div>
			<div class="modal-body">
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade in" id="why">
						<p>We need this information so that you can receive access to the site and its content. Rest assured your information will not be sold, traded, or given to anyone.</p>
						<p></p><br> Please contact <a mailto:href="JoeSixPack@Sixpacksrus.com"></a>JoeSixPack@Sixpacksrus.com</a> for any other inquiries.</p>
					</div>
					<div class="tab-pane fade active in" id="login">
						<form class="form-horizontal" method="post" action="<?php echo BASE_URL;?>member/login">
							<fieldset>
								<!-- Sign In Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="user_name">Username:</label>
									<div class="controls">
										<input type="hidden" name="mem_mem" value=""/>
										<input id="user_name" name="user_name" type="text" class="form-control" placeholder="" class="input-medium">
									</div>
								</div>

								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="password">Password:</label>
									<div class="controls">
										<input id="password" name="password" class="form-control" type="password" placeholder="" class="input-medium">
									</div>
								</div>

								<!-- Multiple Checkboxes (inline) -->
								<div class="control-group">
									<label class="control-label" for="rememberme"></label>
									<div class="controls">
										<label class="checkbox inline" for="rememberme-0">
											<input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
											Remember me
										</label>
									</div>
								</div>

								<!-- Button -->
								<div class="control-group">
									<label class="control-label" for="signin"></label>
									<div class="controls">
										<input type="submit" name="btn_submit" class="btn btn-primary" value="Login"/>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane fade" id="register">
						<form class="form-horizontal" method="post" action="<?php echo BASE_URL;?>member/register" id="validateFormRegister">
							<fieldset>
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="com_name">Company name:</label>
									<div class="controls">
										<input id="com_name" name="com_name" class="form-control" type="text" class="input-large">
									</div>
								</div>
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="email">E-mail:</label>
									<div class="controls">
										<input id="email" name="email" class="form-control" type="text" class="input-large">
									</div>
								</div>
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="username">Username:</label>
									<div class="controls">
										<input id="username" value="" name="username" class="form-control" type="text" class="input-large">
									</div>
								</div>

								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="password">Password:</label>
									<div class="controls">
										<input id="password" value="" name="password" class="form-control" type="password"  class="input-large">
										<em>1-8 Characters</em>
									</div>
								</div>

								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="repassword">Re-Enter Password:</label>
									<div class="controls">
										<input id="repassword" class="form-control" name="repassword" type="password" class="input-large">
									</div>
								</div>

								<!-- Button -->
								<div class="control-group">
									<label class="control-label" for="register"></label>
									<div class="controls">
										<input type="submit" name="btn_submit" class="btn btn-primary" value="Register"/>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<center>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</center>
			</div>
		</div>
	</div>
</div>