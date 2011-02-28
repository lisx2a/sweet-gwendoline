<?php require_once 'header.php'; ?>
<script type="text/javascript">
			$(document).ready(function(){
				$('.view').hide();
				$('.cover.boxcaption').hide();
				$('.product captionfull').mouseover(function(){
					$('.cover').show();
				}).mouseout(function(){
					$('.cover').hide();
				});
	/*	$('.product.captionfull').hover(function(){
				$('.cover', this).stop().animate({top:'130px'}, {queue:false, duration:160});
		}, function() {
				$('.cover', this).stop().animate({top:'230px'}, {queue:false, duration:160});
		});*/
			$('.product-last').mouseover(function(){
				$('.view').show();
				}).mouseout(function(){
					$('.view').hide();
				});
	});
		</script>

		<div id="collection">
					<img src="images/collections_header.jpg" alt=" Sweet Gwendoline Clothing Collection" />
					<br />
							<p style="margin-left:550px">Scroll Down to See More</p>
							<div id="product_container" style="margin-top:5px">
										
							<div class="product captionfull"><a href="waspwaist.php">
												<img src="images/wasp-waist-karen.jpg" width=177px" /></a>
												<div class="cover boxcaption"><p>Take a Peek</p></div>
														<div class="details"><p>Wasp Waist<br />$28.00<br /></p></div>
							</div>

							<div class="product captionfull">
										<a href="butterfly-heels.php"><img src="images/butterfly-in-heels-karen.jpg" style="width:177px;" /></a>
										<div class="cover boxcaption"><p>take a peek</p></div>	
											<p class="details">Butterfly in Heels<br />$33.00</p>
							</div>

							<div class="product captionfull"><a href="about-this-tank.php">
											<img src="images/about-these-corsets-tank.jpg" style="width:177px;" /></a>
												<div class="cover boxcaption"><p>Take a Peek</p></div>
											<p class="details">About These Corsets<br />$40.00<br /></p>
							</div>
								
							<div class="product-last"><a href="star-bizarre.php">
												<img src="images/star-bizarre-margie.jpg" style="width:177px;" /></a>
												<p class="details">Star Bizarre<br />$28.00<br /></p>
							</div>
								
							<div class="product captionfull"><a href="crawl.php">
												<img src="images/crawl-margie.jpg" style="width:177px;" /></a
												<div class="cover boxcaption"><p>Take a Peek</p></div>
												<p class="details">Crawl<br />$28.00<br /></p>
							</div>
								
							<div class="product captionfull"><a href="pretty-polly.php">
													<img src="images/pretty-polly-karen.jpg" alt="Pretty Polly" style="width:177px;" /></a>
												<div class="cover boxcaption"><p>Take a Peek</p></div>
													<p class="details">Pretty Polly<br />$28.00<br /></p>
							</div>
								
							<div class="product captionfull"><a href="tamed.php">
											<img src="images/tamed-karen.jpg" style="width:177px;" /></a>
												<div class="cover boxcaption"><p>Take a Peek</p></div>
											<p class="details">Tamed<br />$33.00<br /></p>
							</div>
								
							<div class="product-last"><a href="plead.php">
											<img src="images/plead-karen.jpg" style="width:177px;" /></a>
											<p class="details">Plead<br />$28.00<br /></p>
								
							</div>
								
							<div class="product captionfull"><a href="mistress.php">
											<img src="images/mistress-karen.jpg" style="width:177px;" /></a>
												<div class="cover boxcaption"><p>Take a Peek</p></div>
											<p class="details">Mistress<br />$33.00<br /></p>
							</div>

								
							<div class="product captionfull"><a href="corset-boy.php">
											<img src="images/corset-boy-beater.jpg" style="width:177px;" /></a>
												<div class="cover boxcaption"><p>Take a Peek</p></div>
											<p class="details">Corseted Boy Beater<br />$48.00<br /></p>
							</div>

							<div class="product captionfull"><a href="mesh-lace.php">
											<img src="images/mesh-lace-boy-beater.jpg" style="width:177px;" /></a>
												<div class="cover boxcaption"><p>Take a Peek</p></div>
											<p class="details">Plead Mesh & Lace Boy Beater<br />$48.00<br /></p>
							</div>
								
							<div class="product-last"><a href="wench-boy.php">
											<img src="images/wench-boy-karen.jpg" style="width:177px;" /></a>
											<div class="view" style="position:absolute;color:blue;margin-top :-120px;">View</div>
											<p class="details">Wench Boy Beater<br />$48.00<br /></p>
							</div>

							<div class="product captionfull"><a href="teacup.php">
												<img src="images/teacup.jpg" alt="Sweet Gwendoline Tea Cup" style="width:177px;" /></a>
												<div class="cover boxcaption"><p>Take a Peek</p></div>
												<p class="details">Tied Up for Tea<br />$20.00<br /></p>
						
							</div>
							<div style="clear:both"><br /></div>
<?php require_once 'footer.php' ?>

