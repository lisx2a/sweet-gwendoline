<?php require_once 'header.php'; ?>
<script type="text/javascript">
			$(document).ready(function(){
				$('.view').hide();
				$('.product').mouseover(function(){
					$(this).find('.view').show();
				}).mouseout(function(){
					$(this).find('.view').hide();
				});
	/*	$('.product.captionfull').hover(function(){
				$('.cover', this).stop().animate({top:'130px'}, {queue:false, duration:160});
		}, function() {
				$('.cover', this).stop().animate({top:'230px'}, {queue:false, duration:160});
		});*/
			$('.product-last').mouseover(function(){
				$(this).find('.view').show();
				}).mouseout(function(){
					$(this).find('.view').hide();
				});
	});
		</script>

		<div id="collection">
					<img src="images/collections_header.jpg" alt=" Sweet Gwendoline Clothing Collection" />
					<br />
							<p style="margin-top:10px;margin-left:600px;font-size:.8em">Scroll Down to See More</p>
							<div id="product_container" style="margin-top:5px">
										
							<div class="product"><a href="waspwaist.php">
												<img src="images/wasp-waist-karen.jpg" width="177px" /><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

														<div class="details" ><p>Wasp Waist<br />$28.00<br /></p></div>
							</div>

							<div class="product ">
										<a href="butterfly-heels.php"><img src="images/butterfly-in-heels-karen.jpg" style="width:177px;" /><div class="view" style="position:absolute;margin-top :120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

											<p class="details">Butterfly in Heels<br />$33.00</p>
							</div>

							<div class="product"><a href="about-this-tank.php">
											<img src="images/about-these-corsets-tank.jpg" style="width:177px;" /><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

											<p class="details">About These Corsets<br />$40.00<br /></p>
							</div>
								
							<div class="product-last"><a href="star-bizarre.php">
												<img src="images/star-bizarre-margie.jpg" style="width:177px;" /><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

												<p class="details">Star Bizarre<br />$28.00<br /></p>
							</div>
								
							<div class="product captionfull"><a href="crawl.php">
												<img src="images/crawl-margie.jpg" style="width:177px;" /><div class="view" style="position:absolute;margin-top :120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

												<p class="details">Crawl<br />$28.00<br /></p>
							</div>
								
							<div class="product captionfull"><a href="pretty-polly.php">
													<img src="images/pretty-polly-karen.jpg" alt="Pretty Polly" style="width:177px;" /><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

													<p class="details">Pretty Polly<br />$28.00<br /></p>
							</div>
								
							<div class="product captionfull"><a href="tamed.php">
											<img src="images/tamed-karen.jpg" style="width:177px;" /><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

											<p class="details">Tamed<br />$33.00<br /></p>
							</div>
								
							<div class="product-last"><a href="plead.php">
											<img src="images/plead-karen.jpg" style="width:177px;" /><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

											<p class="details">Plead<br />$28.00<br /></p>
								
							</div>
								
							<div class="product captionfull"><a href="mistress.php">
											<img src="images/mistress-karen.jpg" style="width:177px;" /><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

											<p class="details">Mistress<br />$33.00<br /></p>
							</div>

								
							<div class="product captionfull"><a href="corset-boy.php">
											<img src="images/corset-boy-beater.jpg" style="width:177px;" />
											<div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>

											<p class="details">Corseted Boy Beater<br />$48.00<br /></p>
							</div>

							<div class="product captionfull"><a href="mesh-lace.php">
											<img src="images/mesh-lace-boy-beater.jpg"/>
												<div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>
											<p class="details">Plead Mesh & Lace Boy Beater<br />$48.00<br /></p>
							</div>
								
							<div class="product-last"><a href="wench-boy.php">
											<img src="images/wench-boy-karen.jpg" style="width:177px;" /></a>
											<a href="wench-boy.php"><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>
											<p class="details">Wench Boy Beater<br />$48.00<br /></p>
							</div>

							<div class="product captionfull"><a href="teacup.php">
												<img src="images/teacup.jpg" alt="Sweet Gwendoline Tea Cup" style="width:177px;" /></a>
												<a href="teacup.php"><div class="view" style="position:absolute;margin-top:120px;margin-left:9px;height:25px;width:159px;background:url(images/sg_buttons.png) no-repeat 0 -170px"></div></a>
												<p class="details">Tied Up for Tea<br />$20.00<br /></p>
						
							</div>
							<div style="clear:both"><br /></div>
<?php require_once 'footer.php' ?>

