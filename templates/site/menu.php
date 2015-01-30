<div id="navbar" class="navbar navbar-default">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?php echo BASE_URL;?>"></a>
	</div>
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="#home"><i class="icon-home"></i></a></li>
			<li><a href="#category"><i class="icon-qrcode"></i> Category</a></li>
			<li><a href="#company"><i class="icon-credit-card"></i> Company</a></li>
			<li><a href="#contact"><i class="icon-envelope-alt"></i> Contact</a></li>
			<li><?php if ($this->session->userdata('useName')) {
					echo '<a id="dashboard" href="'.BASE_URL.'member"><i class="icon-dashboard"></i> Dashboard</a>';
				}else{
					echo '<a href="#signin" data-toggle="modal" data-target=".bs-modal-sm"><i class="icon-signin"></i> Login</a>';
				}?>
			</li>
		</ul>
	</div>
</div>