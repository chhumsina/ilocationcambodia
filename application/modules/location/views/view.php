					<?php
						foreach ($profiles->result_array() as $profile){
							echo "<a href='".BASE_URL.$profile['pro_name']."'><span class='badge'>".$profile['pro_name']."</span></a> ";
						}
						?>

					<section id="menu" class="row">
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
