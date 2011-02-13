<?php include 'header.php'; ?>
<div id="productpage_container">	

	<p style="width:270px;margin: 20px 0 0 34px;">TAMED<br /><br />
										The women's slim fit basic rib tank. All the pleasure without the pain. Molds to the body and fits
										like a glove every time.</p><br /><ul>
											<li>100% cotton 2x1 rib</li>
											<li>garment dyed &amp; washed for a super soft hand</li>
										</ul>

										<p style="margin: 5px 0 0 34px;">S, M, L<br />$28.00<br /></p>
			<div style="margin:-27px 0 0 100px;">
						<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="business" value="jj@sweetgwendolineclothing.com">
								<input type="hidden" name="lc" value="US">
								<input type="hidden" name="item_name" value="Tamed">
								<input type="hidden" name="amount" value="33.00">
								<input type="hidden" name="currency_code" value="USD">
								<input type="hidden" name="button_subtype" value="products">
								<input type="hidden" name="no_note" value="0">
								<input type="hidden" name="add" value="1">
								<input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_SM.gif:NonHostedGuest">
									<table>
											<tr><td><input type="hidden" name="on0" value="Size">Size</td></tr><tr><td><select name="os0">
													<option value="Small">Small </option>
													<option value="Medium">Medium </option>
													<option value="Large">Large </option>
													</select> </td></tr>
											<tr><td><input type="hidden" name="on1" value="Colors">Colors</td></tr><tr><td><select name="os1">
													<option value="Cream">Cream </option>
													<option value="Black">Black </option>
													<option value="Chocolate">Chocolate </option>
													</select> </td></tr>
									</table>
							<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_cart_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form>

			</div>
						<p style="margin:55px 0 0 34px;width:100px;">Also Available in Black</p>

			<div style="float:right;">
										<img src="product_images/tamed.png" width="356px" />
			</div>
			<div style="float:right;">
							<img src="product_images/tamed-in-chocolate.png" width="233px" />
			</div>
									
</div>
<?php require_once 'footer.php'; ?>
