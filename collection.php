<?php require_once 'header.php'; ?>
<script type="text/javascript">
			$(document).ready(function(){
				//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
				//Vertical Sliding
				$('.boxgrid.slidedown').hover(function(){
					$(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
				}, function() {
					$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
	});
		</script>

		<div id="collection">
					<img src="images/collections_header.jpg" alt=" Sweet Gwendoline Clothing Collection" />
					<br />
							<div id="product_container">
										<div class="product"><a href="waspwaist.php">
												<img src="images/wasp-waist-karen.jpg" style="width:177px;" /></a>
														<p class="details">Wasp Waist<br />$28.00<br /></p>
							</div>

							<div class="product">
										<a href="butterfly-heels.php"><img src="images/butterfly-in-heels-karen.jpg" style="width:177px;" /></a>
											<p class="details">Butterfly in Heels<br />$33.00</p>
							</div>

							<div class="product"><a href="about-this-tank.php">
											<img src="images/about-these-corsets-tank.jpg" style="width:177px;" /></a>
											<p class="details">About These Corsets<br />$40.00<br /></p>
							</div>
								
							<div class="product-last"><a href="star-bizarre.php">
												<img src="images/star-bizarre-margie.jpg" style="width:177px;" /></a>
												<p class="details">Star Bizarre<br />$28.00<br /></p>
							</div>
								
							<div class="product"><a href="crawl.php">
												<img src="images/crawl-margie.jpg" style="width:177px;" /></a>
												<p class="details">Crawl<br />$28.00<br /></p>
							</div>
								
							<div class="product"><a href="pretty-polly.php">
													<img src="images/pretty-polly-karen.jpg" alt="Pretty Polly" style="width:177px;" /></a>
													<p class="details">Pretty Polly<br />$28.00<br /></p>
							</div>
								
							<div class="product"><a href="tamed.php">
											<img src="images/tamed-karen.jpg" style="width:177px;" /></a>
											<p class="details">Tamed<br />$33.00<br /></p>
							</div>
								
							<div class="product-last"><a href="plead.php">
											<img src="images/plead-karen.jpg" style="width:177px;" /></a>
											<p class="details">Plead<br />$28.00<br /></p>
								
							</div>
								
							<div class="product"><a href="mistress.php">
											<img src="images/mistress-karen.jpg" style="width:177px;" /></a>
											<p class="details">Mistress<br />$33.00<br /></p>
							</div>

								
							<div class="product"><a href="corset-boy.php">
											<img src="images/corset-boy-beater.jpg" style="width:177px;" /></a>
											<p class="details">Corseted Boy Beater<br />$48.00<br /></p>
							</div>

							<div class="product"><a href="mesh-lace.php">
											<img src="images/mesh-lace-boy-beater.jpg" style="width:177px;" /></a>
											<p class="details">Plead Mesh & Lace Boy Beater<br />$48.00<br /></p>
							</div>
								
							<div class="product-last"><a href="wench-boy.php">
											<img src="images/wench-boy-karen.jpg" style="width:177px;" /></a>
											<p class="details">Wench Boy Beater<br />$48.00<br /></p>
							</div>

							<div class="product"><a href="teacup.php">
												<img src="images/teacup.jpg" alt="Sweet Gwendoline Tea Cup" style="width:177px;" /></a>
												<p class="details">Tied Up for Tea<br />$20.00<br /></p>
						
							</div>
							<div style="clear:both"><br /></div>
<?php require_once 'footer.php' ?>

