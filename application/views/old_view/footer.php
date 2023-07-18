<footer id="footer">
			<div class="container">
				<div class="footer-columns">
					<div class="column">
						<img src="<?=IMG?>logo.png" alt="Pocket Pizza">
					</div>
					<div class="column center-column">
						<h3>Contact us <img src="<?=IMG?>img17.png" alt="image"></h3>
						<span class="address">Garden Heights, New Garden Town Lahore.</span>
						<div class="footer-holder">
							<span class="num"><img src="<?=IMG?>img18.png" alt="image">Phone Number</span>
							<a href="tel:924235941750">+92 42 3594 1750</a>
						</div>
						<div class="footer-holder">
							<span class="num"><img src="<?=IMG?>img19.png" alt="image">Email</span>
							<a href="mailto:info@hotpocket.com">info@hotpocket.com</a>
						</div>
						<!-- <ul class="social-list">
							<li>
								<a href="#">
									<img src="<?=IMG?>facebook.png" alt="facebook">
								</a>
							</li>
							<li>
								<a href="#">
									<img src="<?=IMG?>twitter.png" alt="twitter">
								</a>
							</li>
							<li>
								<a href="#">
									<img src="<?=IMG?>pintrest.png" alt="pintrest">
								</a>
							</li>
						
							<li>
								<a href="#">
									<img src="<?=IMG?>linkedin.png" alt="linkedin">
								</a>
							</li>
							<li>
								<a href="#">
									<img src="<?=IMG?>gmail.png" alt="gmail">
								</a>
							</li>
						</ul> -->
					</div>
					<div class="column">
						<img src="<?=IMG?>img4.png" alt="image" class="rotate-img"> 
					</div>
				</div>
			</div>
			<div class="bottom-footer">
			<span>Copyright © <?=date('Y')?> <a href="#">thereviews.com</a>. All rights reserved. Design By: <a href="#"> Magic Mayo</a></span>
		</div>
		</footer>
		

	</div><!-- /wrapper -->





	<div id="popup1" class="overlay">
		<div class="overlay-holder">
			<div class="popup">
				<div class="popup-head">
					<span class="left">Your Bucket</span>
					<span class="right">
						<div class="cart-holder">
							<img src="<?=IMG?>img3.png" alt="image">
							<em><span class="cart-count"><?=count($_SESSION['cart'])?></span></em>
						</div>
						<?php if ($_SESSION['total'] > 0): ?>
							PKR <span class="cart-total"><?=$_SESSION['total']?></span>
						<?php else: ?>
							PKR <span class="cart-total">0</span>
						<?php endif ?>
					</span>
				</div>
				<a class="close" href="#">&times;</a>
				<div class="content">

					<?php if (count($_SESSION['cart']) > 0): ?>
						<?php $display = 'display: "none"'; ?>
					<?php endif ?>
					<div class="select-area" style="<?=$display?>">
						<!-- <label>Select Delivery Area</label>
						<select>
							<option>Select City</option>
							<option>Select City</option>
							<option>Select City</option>
						</select>
						<input type="search" placeholder="Search Area"> -->
						<button onclick="location.href = '<?=BASEURL?>checkout';">Next</button>
					</div>
					<div class="list-of-items">
						<?php
						$html = '';
						foreach ($_SESSION['cart'] as $key => $q) {
							$html .= '<div class="deal-box">';
								$html .= '<a href="javascript://" class="close-box delete-cart-item" data-key="'.$key.'">×</a>';
								$html .= '<h3>'.$q['product'].'</h3>';
								if (strlen($q['size']) > 1) {
									$html .= '<p>'.$q['size'].'</p>';
								}
								$html .= '<p>'.$q['detail'].'</p>';
								if (strlen($q['drink']) > 0) {
									$html .= '<span>Slect Drink:  '.$q['drink'].' ('.$q['drink_qty'].')</span>';
								}
								if (strlen($q['addon']) > 0) {
									$html .= '<span>Add Ons:  '.$q['addon'].' ('.$q['addon_qty'].')</span>';
								}
								$html .= '<strong>PKR '.$q['price_total'].'</strong>';
								$html .= '<div class="counter" data-key="'.$key.'">';
									$html .= '<button class="quantity-arrow-minus quantity-arrow-minus-cart"> - </button>';
									$html .= '<input class="quantity-num quantity-num-cart" type="number" value="'.$q['qty'].'" />';
									$html .= '<button class="quantity-arrow-plus quantity-arrow-plus-cart"> + </button>';
								$html .= '</div>';
							$html .= '</div>';
						}
						echo $html;
						?>
						
					</div><!-- /list-of-items -->
					
					<div class="total-box">
						<span>Your Total</span>
						<?php if ($_SESSION['total'] > 0): ?>
							PKR <span class="cart-total"><?=$_SESSION['total']?></span>
						<?php else: ?>
							PKR <span class="cart-total">0</span>
						<?php endif ?>
					</div>
					<span class="delivery-box">Estimated delivery time is 30 minutes</span>
				</div>
			</div>
		</div>
	</div>





</body>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script>
		$(document).ready(function(){
		  $("nav-icon1").click(function(){
		    $("body").toggleClass("open-nav");
		  });
		});
	</script>
	<script>
		$(document).ready(function(){
			$('#nav-icon1').click(function(){
				$("body").toggleClass('open');
			});
			$('.cart_2').click(function (e) {
		         e.preventDefault();
		         $('.overlay').addClass('opened');
		    });
			$('.close').click(function (e) {
		         e.preventDefault();
		         $('.overlay').removeClass('opened');
		    });
		});
	</script>
	<script>
		$('.slider').slick({
	infinite: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	autoplay: true,
	autoplaySpeed: 2000,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
			// settings: "unslick"
		}

	]
});
	</script>
	


	<script>
	$(function(){

		$(document).on('change', 'select[name="size-home"]', function(event) {
			event.preventDefault();
			$price = parseInt($(this).find(':selected').attr('data-price'));
			$size = $(this).val();
			$url = $(this).parent('div').parent('div').children('a').attr('href');
			$url = $url+$size+'/';
			$(this).parent('div').parent('div').children('a').attr('href',$url);
			$(this).parent('div').parent('div').children('a').children('span').children('.home-page-price').text($price);
		});


		$(document).on('click', '.minus-product', function(event) {
			event.preventDefault();
			$number = parseInt($(".quantity-num").val()) - 1;
			if ($number == 0) {
				$number = 1
			}
			$('.addon-checkbox').each(function(index, el) {
				if($(el).prop('checked') == true) {
		      		$qty = $(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.addon-qty').val();
		      		$qty = parseInt($qty) - 1;
		      		$qty = parseInt($qty);
		      		if ($qty == 0) {
		      			$qty = 1;
		      		}
					$(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.addon-qty').val($qty);
					$("input[name='addon_qty']").val($qty);
					$("input[name='addon_price']").val($(el).attr('data-price'));
				}
				else{
					$(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.addon-qty').val($number);
				}
			});
			$('.drink-checkbox').each(function(index, el) {
				if($(el).prop('checked') == true) {
		      		$qty = $(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.drink-qty').val();
		      		$qty = parseInt($qty) - 1;
		      		$qty = parseInt($qty);
		      		if ($qty == 0) {
		      			$qty = 1;
		      		}
					$(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.drink-qty').val($qty);
					$("input[name='drink_qty']").val($qty);
					$("input[name='drink_price']").val($(el).attr('data-price'));
				}
				else{
					$(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.drink-qty').val($number);
				}
			});
			single_price_cal($number);
		});
		$(document).on('click', '.plus-product', function(event) {
			event.preventDefault();
			$number = parseInt($(".quantity-num-product").val()) + 1;
			$('.addon-checkbox').each(function(index, el) {
				if($(el).prop('checked') == true) {
		      		$qty = $(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.addon-qty').val();
		      		$qty = parseInt($qty) + 1;
		      		$qty = parseInt($qty);
					$(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.addon-qty').val($qty);
					$("input[name='addon_qty']").val($qty);
					$("input[name='addon_price']").val($(el).attr('data-price'));
				}
				else{
					$(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.addon-qty').val($number);
				}
			});
			$('.drink-checkbox').each(function(index, el) {
				if($(el).prop('checked') == true) {
		      		$qty = $(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.drink-qty').val();
		      		$qty = parseInt($qty) + 1;
		      		$qty = parseInt($qty);
					$(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.drink-qty').val($qty);
					$("input[name='drink_qty']").val($qty);
					$("input[name='drink_price']").val($(el).attr('data-price'));
				}
				else{
					$(el).parent('div').parent('div').children('.price-holder').children('.counter').children('.drink-qty').val($number);
				}
			});
			single_price_cal($number);
		});

		$(document).on('click', '.addon-minus', function(event) {
			event.preventDefault();
			$qtyInput = $(this).parent('div').children('.addon-qty');
			$number = parseInt($qtyInput.val()) - 1;
			$addOn = $(this).parent('.counter').parent('.price-holder').parent('.addon-box').children('.form-group').children('.addon-checkbox');
			if ($number == 0) {
				$qtyInput.val('1');
				if ($addOn.prop('checked') == true) {
					$("input[name='addon_qty']").val('1');
				}
				single_price_cal(1);
			}
			else{
				$qtyInput.val($number);
				if ($addOn.prop('checked') == true) {
					$("input[name='addon_qty']").val($number);
				}
				$productQTY = parseInt($(".quantity-num-product").val());
				single_price_cal($productQTY);
			}
		});
		$(document).on('click', '.addon-plus', function(event) {
			event.preventDefault();
			$qtyInput = $(this).parent('div').children('.addon-qty');
			$number = parseInt($qtyInput.val()) + 1;
			$qtyInput.val($number);
			$addOn = $(this).parent('.counter').parent('.price-holder').parent('.addon-box').children('.form-group').children('.addon-checkbox');
			if ($addOn.prop('checked') == true) {
				$("input[name='addon_qty']").val($number);
			}
			$productQTY = parseInt($(".quantity-num-product").val());
			single_price_cal($productQTY);

		});

		$(document).on('click', '.addon-checkbox', function(event) {
			if(this.checked) {
				$(".addon-checkbox").prop('checked', false);
	      		$(this).prop('checked', true);
	      		$qty = $(this).parent('div').parent('div').children('.price-holder').children('.counter').children('.addon-qty').val();
				$("input[name='addon_qty']").val($qty);
				$("input[name='addon_price']").val($(this).attr('data-price'));
			}
			else{
				$(".addon-checkbox").prop('checked', false);
				$("input[name='addon_qty']").val('1');
				$("input[name='addon_price']").val('0');
			}
			$productQTY = parseInt($(".quantity-num-product").val());
			single_price_cal($productQTY);
		});

		$(document).on('click', '.drink-minus', function(event) {
			event.preventDefault();
			$qtyInput = $(this).parent('div').children('.drink-qty');
			$number = parseInt($qtyInput.val()) - 1;
			$addOn = $(this).parent('.counter').parent('.price-holder').parent('.drink-box').children('.form-group').children('.drink-checkbox');
			if ($number == 0) {
				$qtyInput.val('1');
				if ($addOn.prop('checked') == true) {
					$("input[name='drink_qty']").val('1');
				}
				single_price_cal(1);
			}
			else{
				$qtyInput.val($number);
				if ($addOn.prop('checked') == true) {
					$("input[name='drink_qty']").val($number);
				}
				$productQTY = parseInt($(".quantity-num-product").val());
				single_price_cal($productQTY);
			}
		});
		$(document).on('click', '.drink-plus', function(event) {
			event.preventDefault();
			$qtyInput = $(this).parent('div').children('.drink-qty');
			$number = parseInt($qtyInput.val()) + 1;
			$qtyInput.val($number);
			$drink = $(this).parent('.counter').parent('.price-holder').parent('.drink-box').children('.form-group').children('.drink-checkbox');
			if ($drink.prop('checked') == true) {
				$("input[name='drink_qty']").val($number);
			}
			$productQTY = parseInt($(".quantity-num-product").val());
			single_price_cal($productQTY);

		});

		$(document).on('click', '.drink-checkbox', function(event) {
			if(this.checked) {
				$(".drink-checkbox").prop('checked', false);
	      		$(this).prop('checked', true);
	      		$qty = $(this).parent('div').parent('div').children('.price-holder').children('.counter').children('.drink-qty').val();
				$("input[name='drink_qty']").val($qty);
				$("input[name='drink_price']").val($(this).attr('data-price'));
			}
			else{
				$(".drink-checkbox").prop('checked', false);
				$("input[name='drink_qty']").val('1');
				$("input[name='drink_price']").val('0');
			}
			$productQTY = parseInt($(".quantity-num-product").val());
			single_price_cal($productQTY);
		});



		$(document).on('change', "select[name='drink'],select[name='addon']", function(event) {
			event.preventDefault();
			$number = parseInt($(".quantity-num-product").val());
			single_price_cal($number);
		});
		$(document).on('change', "select[name='size']", function(event) {
			event.preventDefault();
			$price = parseInt($("select[name='size']").find(':selected').attr('data-price'));
			$("input[name='product-price-single']").val($price);
			$number = parseInt($(".quantity-num-product").val());
			single_price_cal($number);
		});


		$(document).on('submit', '.add-to-cart-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$.post('<?=BASEURL."add-to-cart"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status == true) {
					$("#popup1 .list-of-items").html(resp.html);
					$("#popup1 .cart-count").html(resp.count);
					$("#popup1 .cart-total").html(resp.total);
					$("#popup1 .select-area").show(0);
					$('.overlay').addClass('opened');
				}
				else{
					alert(resp.msg);
				}
			});
		});

		$(document).on('click', '.delete-cart-item', function(event) {
			event.preventDefault();
			$this = $(this);
			$key = $this.attr('data-key');
			$.post('<?=BASEURL."delete-cart-item"?>', {key: $key}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status == true) {
					$("#popup1 .list-of-items").html(resp.html);
					$("#popup1 .cart-count").html(resp.count);
					$("#popup1 .cart-total").html(resp.total);
					//$('.overlay').addClass('opened');
					if (resp.count == '0') {
						$("#popup1 .select-area").hide(0);
						$("table.baskit-table").remove();
					}
					else{
						$("#popup1 .select-area").show(0);
						$("table.baskit-table tbody").html(resp.html2);
					}
				}
				else{
					alert(resp.msg);
				}
			});
		});



		//Plus-Minus in cart section
		$(document).on('click', '.quantity-arrow-minus-cart', function(event) {
			event.preventDefault();
			$this = $(this);
			$number = parseInt($(this).parent('.counter').children(".quantity-num-cart").val()) - 1;
			$key = $(this).parent('.counter').attr('data-key');
			if ($number == 0) {
				$(this).parent('.counter').children(".quantity-num-cart").val(1);
				single_price_cal_2(1,$key);
			}
			else{
				$(this).parent('.counter').children(".quantity-num-cart").val($number);
				single_price_cal_2($number,$key);
			}
		});
		$(document).on('click', '.quantity-arrow-plus-cart', function(event) {
			event.preventDefault();
			$this = $(this);
			$number = parseInt($(this).parent('.counter').children(".quantity-num-cart").val()) + 1;
			$(this).parent('.counter').children(".quantity-num-cart").val($number);
			$key = $(this).parent('.counter').attr('data-key');
			single_price_cal_2($number,$key);
		});



		function single_price_cal(qty) {
			$price = parseInt($("input[name='product-price-single']").val());
			$newPrice = $price * qty;
			$deal = $("input[name='deal']").val();
			if ($deal == 'no') {
				/*$drink = parseInt($("select[name='drink']").find(':selected').attr('data-price'));
				if ($drink > 0) {
					$drink = $drink * qty;
					$newPrice = $newPrice + $drink;
				}*/
				$drink = parseInt($("input[name='drink_price']").val());
				if ($drink > 0) {
					$drinkQty = parseInt($("input[name='drink_qty']").val());
					$drink = $drink * $drinkQty;
					$newPrice = $newPrice + $drink;
				}
			}
			//$addon = parseInt($("select[name='addon']").find(':selected').attr('data-price'));
			$addon = parseInt($("input[name='addon_price']").val());
			if ($addon > 0) {
				$addOnQty = parseInt($("input[name='addon_qty']").val());
				$addon = $addon * $addOnQty;
				$newPrice = $newPrice + $addon;
			}
			$(".product-price").text($newPrice);
			$(".quantity-num-product").val(qty);
			return true;
		}

		function single_price_cal_2(qty,key) {
			$.post('<?=BASEURL."change-cart-value"?>', {qty: qty, key: key}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status == true) {
					$("#popup1 .list-of-items").html(resp.html);
					$("#popup1 .cart-count").html(resp.count);
					$("#popup1 .cart-total").html(resp.total);
					if (resp.count == '0') {
						$("table.baskit-table").remove();
					}
					else{
						$("table.baskit-table tbody").html(resp.html2);
					}
				}
				else{
					alert(resp.msg);
				}
				return true;
			});
		}

		$(document).on('submit', '#contact-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$.post('<?=BASEURL."submit-contact-form"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				alert(resp.msg);
			});
		});

	});//onload
	</script>



</html> 