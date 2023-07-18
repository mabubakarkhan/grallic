<section class="login-section create">
	<div class="container">
		<form method="post" action="<?=BASEURL.'submit-order'?>">
			<div class="create-account">

				<h3>submit order</h3>
				<div class="account-holder">
					<h4>your information</h4>
					<div class="account-row">
						<input type="text" class="email" name="name" placeholder="Your Full Name" required="required" value="<?=$_COOKIE['name']?>">
						<input type="text" class="email" name="phone" placeholder="Your Mobile" required="required" value="<?=$_COOKIE['phone']?>">
						<input type="text" class="email" name="address" placeholder="Your Address" required="required" value="<?=$_COOKIE['address']?>">
						<input type="email" class="email" name="email" placeholder="Your Email" value="<?=$_COOKIE['email']?>">
						<select name="area" required="required">
							<option value="">Select Area</option>
							<option value="garden twon" <?=($_COOKIE['area'] == 'garden twon') ? 'selected="selected"' : '""'?> >Garden Town</option>
							<option value="faisal twon" <?=($_COOKIE['area'] == 'faisal twon') ? 'selected="selected"' : '""'?>>Faisal Town</option>
							<option value="model twon" <?=($_COOKIE['area'] == 'model twon') ? 'selected="selected"' : '""'?>>Model Town</option>
						</select>
					</div><!-- /account-row -->
				</div><!-- /account-holder -->

				<div class="account-holder">

					<h4>Shopping Baskit</h4><br>
					<a class="cart_2" href="javascript://">Edit Order</a>
					<div class="checkout-table-outer">
						<table class="baskit-table">
							<thead>
								<th>#</th>
								<th>Product</th>
								<th>Qty</th>
								<th>Addon</th>
								<th>Cold Drink</th>
								<th>amount</th>
							</thead>	
							<tbody>
								<?php foreach ($_SESSION['cart'] as $key => $q): ?>
									<tr>
										<td><?=$key+1?></td>
										<td>
											<div class="img-holder">
												<img src="<?=UPLOADS.$q['image']?>" alt="<?=$q['title']?>">
											</div>
											<div class="txt-holder">
												<strong><?=$q['product']?></strong>
												<?php if (strlen($q['size']) > 1): ?>
													<p><?=$q['size']?></p>
												<?php endif ?>
												<p><?=$q['detail']?></p>
											</div>
										</td>
										<td><?=$q['qty']?></td>
										<?php if (strlen($q['addon']) > 1): ?>
											<td><?=$q['addon'].' ('.$q['addon_qty'].')'?></td>
										<?php else: ?>
											<td>---</td>
										<?php endif ?>
										<?php if (strlen($q['drink']) > 1): ?>
											<td><?=$q['drink'].' ('.$q['drink_qty'].')'?></td>
										<?php else: ?>
											<td>---</td>
										<?php endif ?>
										<td>PKR <?=$q['price_total']?></td>
									</tr>
								<?php endforeach ?>
								<tr>
									<td colspan="4" style="border-right: none;"></td>
									<td style="border-left: none;">Delivery Charges</td>
									<td><?=$setting['delivery_charges']?></td>
								</tr>
								<tr>
									<td colspan="4" style="border-right: none;"></td>
									<td style="border-left: none;"><strong>Total</strong></td>
									<td><strong><?=number_format($_SESSION['total']+$setting['delivery_charges'])?></strong></td>
								</tr>
							</tbody>
						</table>
					</div><!-- /checkout-table-outer -->
					<br><br>

				</div><!-- /account-holder -->

				<div class="account-holder">
					<div class="checkbox-row">
						<button type="submit">submit</button>
					</div><!-- /checkbox-row -->
				</div><!-- /account-holder -->

			</div><!-- /create-account -->
		</form>
	</div><!-- /container -->
</section><!-- /login-section -->