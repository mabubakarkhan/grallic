	<footer>
		<div class="ft-top">
			<div class="container">
				<div class="ft-top-wrapper">
					<div class="ft-logo">
						<a href="<?=BASEURL?>">
							<img src="<?=IMG?>logo.png" width="100">
						</a>
					</div>
					<div class="row justify-content-between justify-content-xl-start">
						<div class="col-md-3  ft-col">
							<h6>About Us</h6>
							<p><?=$setting['about']?></p>
							<p><a href="<?=UPLOADS.$setting['pdf']?>" target="_blank" style="color: #cdaa7c;display: inline-block;padding: 7px 20px;border: 1px solid #cdaa7c;margin-top: 12px;">Download Menu</a></p>
						</div>
						<div class="col-md-5  col-xl-4 offset-xl-1 ft-col">
							<h6>Get news & offers</h6>
							<form method="get">
								<div class="form-inner">
									<input type="text" placeholder="Enter your mail">
									<button>
										<span class="lnr lnr-envelope"></span>
									</button>
								</div>
							</form>
							<div class="social">
								<a href="<?=$setting['twitter_link']?>">
									<i class="zmdi zmdi-twitter"></i>
								</a>
								<a href="<?=$setting['facebook_link']?>">
									<i class="zmdi zmdi-facebook-box"></i>
								</a>
								<a href="<?=$setting['linkedin_link']?>">
									<i class="zmdi zmdi-linkedin"></i>
								</a>
								<a href="<?=$setting['instagram_link']?>">
									<i class="zmdi zmdi-instagram"></i>
								</a>
							</div>
						</div>
						<div class="col-md-3 col-xl-2  ml-xl-auto ft-col">
							<h6>Contact Us</h6>
							<p><?=$setting['address']?></p>
							<p><?=$setting['phone']?></p>
							<p><a href="mailto:<?=$setting['email']?>>" class="__cf_email__"><?=$setting['email']?></a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ft-bot">
			<div class="container">
				&copy; <?=date(Y).' '.APP_TITLE?>.
			</div>
		</div>
	</footer>

	<div class="click-to-top">
		<span class="lnr lnr-arrow-up"></span>
	</div>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<a href="https://api.whatsapp.com/send?phone=<?=$setting['whatsapp']?>" class="whatsapp-float" target="_blank">
		<i class="fa fa-whatsapp whatsapp-my-float"></i>
	</a>


	<script src="<?=JS?>jquery-3.3.1.min.js"></script>

	<script src="<?=VENDOR?>bootstrap/bootstrap.min.js"></script>

	<script src="<?=VENDOR?>revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/jquery.themepunch.tools.min.js"></script>

	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.actions.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.carousel.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.kenburn.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.layeranimation.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.migration.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.navigation.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.parallax.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.slideanims.min.js"></script>
	<script src="<?=VENDOR?>revolution-slider/js/revolution.extension.video.min.js"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEmXgQ65zpsjsEAfNPP9mBAz-5zjnIZBw"></script>
	<script src="<?=JS?>theme-map.js"></script>

	<script src="<?=VENDOR?>owl-carousel/js/owl.carousel.min.js"></script>

	<script src="<?=JS?>sweetalert.min.js"></script>

	<script src="<?=VENDOR?>hcmobilenav/hc-mobile-nav.js"></script>

	<script src="<?=VENDOR?>flipster/jquery.flipster.min.js"></script>

	<script src="<?=VENDOR?>jquery-ui/jquery-ui.min.js"></script>

    <script src="<?=VENDOR?>date-picker/datepicker.js"></script>
    <script src="<?=VENDOR?>date-picker/datepicker.en.js"></script>

    <script src="<?=VENDOR?>jquery-timepicker-master/jquery.timepicker.min.js"></script>
	
	<script src="<?=JS?>main.min.js"></script>


	<script>
	$(function(){
		$(document).on('submit', '#reservation-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$.post('<?=BASEURL."post-reservation"?>', {data: $form.serialize()}, function(resp) {
				resp = $.parseJSON(resp);
				alert(resp.msg);
			});
		});

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
					$(".cartSection .list-of-items").html(resp.html);
					$(".cartSection .cart-count").html(resp.count);
					$(".cartSection .cart-total").html(resp.total);
					$(".cartSection .select-area").show(0);
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
					$(".cartSection .list-of-items").html(resp.html);
					$(".cartSection .cart-count").html(resp.count);
					$(".cart-total").html(resp.total);
					//$('.overlay').addClass('opened');
					$this.parent('td').parent('tr').remove();
					if (resp.count == '0') {
						$(".cartSection .select-area").hide(0);
						$("table.baskit-table").remove();
						$this.parent('li').remove();
						$(".cart-total").html(0);
					}
					else{
						$(".cartSection .select-area").show(0);
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
	})

	</script>

</body>

<!-- Mirrored from freebw.com/templates/royate/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 11:59:28 GMT -->

</html>