<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from freebw.com/templates/royate/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 11:59:20 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<title><?=$meta_title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?=FONTS?>linearicons/style.css">

	<link rel="stylesheet" href="<?=FONTS?>material-design-iconic-font/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" href="<?=FONTS?>font-awesome-5/css/fontawesome-all.min.css">

	<link rel="stylesheet" href="<?=VENDOR?>bootstrap/bootstrap.min.css">

	<link rel="stylesheet" href="<?=VENDOR?>owl-carousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=VENDOR?>owl-carousel/css/owl.theme.default.min.css">

	<link rel="stylesheet" href="<?=CSS?>animate.css">

	<link rel="stylesheet" href="<?=VENDOR?>date-picker/datepicker.min.css">

	<link rel="stylesheet" type="text/css" href="<?=VENDOR?>revolution-slider/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?=VENDOR?>revolution-slider/css/navigation.css">
	<link rel="stylesheet" type="text/css" href="<?=VENDOR?>revolution-slider/css/settings.css">

	<link rel="stylesheet" href="<?=VENDOR?>flipster/jquery.flipster.min.css">

	<link rel="stylesheet" href="<?=VENDOR?>hcmobilenav/demo.css">

	<link rel="stylesheet" href="<?=VENDOR?>jquery-timepicker-master/jquery.timepicker.css">

	<link rel="shortcut icon" href="favicon.png">

	<link rel="stylesheet" href="<?=CSS?>style.css" />
	<link rel="stylesheet" href="<?=CSS?>custom.css" />
</head>

<body class="preload">

	<div class="images-preloader">
		<div id="preloader" class="rectangle-bounce">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<header>

		<nav class="navbar-desktop">
			<div class="left">
				<a href="<?=BASEURL?>" class="logo">
					<img src="<?=IMG?>logo.png" alt="Royate">
				</a>
			</div>
			<ul>
				<li class="<?=$home_page_nav?>">
					<a href="<?=BASEURL?>">
						Home
					</a>
				</li>
				<li class="<?=$menu_nav?>">
					<a href="<?=BASEURL.'menu'?>">
						Menu
					</a>
				</li>
				<li>
					<a href="<?=UPLOADS.$setting['pdf']?>" target="_balnk">
						Menu PDF
					</a>
				</li>
				<li class="has-children <?=$category_nav?>" style="display: none;">
					<a href="#">
						Shop
					</a>
					<div class="sub-menu">
						<div class="wrapper">
							<ul>
								<?php foreach ($cats as $key => $cat): ?>
									<?php if ($cat['deal'] == 'no'): ?>
										<li class="has-children">
											<a href="<?=BASEURL.'category/'.$cat['slug']?>"><?=$cat['title']?>
												<i class="zmdi zmdi-chevron-right"></i>
											</a>
											<div class="sub-menu">
												<div class="wrapper">
													<ul>
														<?php foreach ($products as $key => $product): ?>
															<?php if ($product['category_id'] == $cat['category_id']): ?>
																<li><a href="<?=BASEURL.'product/'.$product['slug']?>"><?=$product['title']?></a></li>
															<?php endif ?>
														<?php endforeach ?>
													</ul>
												</div>
											</div>
										</li>
									<?php endif ?>
								<?php endforeach ?>
							</ul>
						</div>
					</div>
				</li>
				<li class="<?=$reservation_nav?>">
					<a href="<?=BASEURL.'reservation'?>">
						Reservation
					</a>
				</li>
				<li class="<?=$events_nav?>">
					<a href="<?=BASEURL.'events'?>">
						Events
					</a>
				</li>
				<li class="<?=$mariage_nav?>">
					<a href="<?=BASEURL.'marriage'?>">
						Mariages
					</a>
				</li>
				<li class="<?=$about_us_nav?>">
					<a href="<?=BASEURL.'about-us'?>">
						About Us
					</a>
				</li>
				<li class="<?=$catering_nav?>">
					<a href="<?=BASEURL.'catering'?>">
						Catering
					</a>
				</li>
			</ul>
			
			<div class="action align-items-center">
				<div class="right">
	                <div class="action">
	                    <div class="notify cartSection">
	                        <img src="<?=IMG?>notify.png" alt>
	                        <span class="notify-amount cart-count"><?=count($_SESSION['cart'])?></span>

	                        <div id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
	                            <div class="widget_shopping_cart_content">
	                                <ul class="woocommerce-mini-cart cart_list list-of-items product_list_widget ">
	                                    <?php foreach ($_SESSION['cart'] as $key => $q): ?>
		                                    <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
		                                        <a href="javascript://" data-key="<?=$key?>" class="delete-cart-item remove remove_from_cart_button"
		                                            aria-label="Remove this item">
		                                            <span class="lnr lnr-cross-circle"></span>
		                                        </a>
		                                        <a href="#" class="image-holder">
		                                            <img src="<?=UPLOADS.$q['image']?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?=$q['product']?>">
		                                            <span class="product-name"><?=$q['product']?></span>
		                                        </a>
		                                        <span class="quantity">
		                                            <span class="woocommerce-Price-amount amount">
		                                                <span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span><?=$q['price_total']?>
		                                            </span>
		                                            x<?=$q['qty']?>
		                                        </span>
		                                    </li>
	                                    <?php endforeach ?>
	                                </ul>
	                                <p class="woocommerce-mini-cart__total total">
	                                    <strong>Subtotal:</strong>
	                                    <span class="woocommerce-Price-amount amount">
	                                        <span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span>
	                                        <x class="cart-total"><?=$_SESSION['total']?></x>
	                                    </span>
	                                </p>
	                                <p class="woocommerce-mini-cart__total total">
	                                    <strong>Total:</strong>
	                                    <span class="woocommerce-Price-amount amount color-cdaa7c">
	                                        <span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span>
	                                        <x class="cart-total"><?=$_SESSION['total']?></x>
	                                    </span>
	                                </p>
	                                <p class="woocommerce-mini-cart__buttons buttons">
	                                    <a href="<?=BASEURL.'cart'?>" class="button wc-forward view-cart">View cart</a>
	                                    <a href="#" class="button checkout wc-forward">Checkout</a>
	                                </p>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
				<!-- <a href="<?=BASEURL.'reservation'?>" class="au-btn au-btn--hover has-bd">Booking now</a> -->
				<span class="lnr lnr-menu menu-sidebar-icon"></span>
			</div>
		</nav>

		<nav class="navbar-mobile">
			<div class="container">
				<div class="heading">
					<div class="left">
						<a href="#" class="navbar-mobile__toggler">
							<span></span>
							<span></span>
							<span></span>
						</a>
					</div>
					<a href="index-2.html" class="logo">
						<img src="<?=IMG?>logo.png" alt="Royate">
					</a>
					<div class="right">
						<div class="action">
							<div class="notify">
								<img src="<?=IMG?>notify.png" alt>
								<span class="notify-amount"><?=count($_SESSION['cart'])?></span>

								<div id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
									<div class="widget_shopping_cart_content">
										<ul class="woocommerce-mini-cart cart_list product_list_widget ">

											<?php foreach ($_SESSION['cart'] as $key => $q): ?>
			                                    <li class="woocommerce-mini-cart-item mini_cart_item clearfix">
			                                        <a href="javascript://" data-key="<?=$key?>" class="delete-cart-item remove remove_from_cart_button"
			                                            aria-label="Remove this item">
			                                            <span class="lnr lnr-cross-circle"></span>
			                                        </a>
			                                        <a href="#" class="image-holder">
			                                            <img src="<?=UPLOADS.$q['image']?>" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="<?=$q['product']?>">
			                                            <span class="product-name"><?=$q['product']?></span>
			                                        </a>
			                                        <span class="quantity">
			                                            <span class="woocommerce-Price-amount amount">
			                                                <span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span><?=$q['price_total']?>
			                                            </span>
			                                            x<?=$q['qty']?>
			                                        </span>
			                                    </li>
		                                    <?php endforeach ?>

										</ul>
										<p class="woocommerce-mini-cart__total total">
											<strong>Subtotal:</strong>
											<span class="woocommerce-Price-amount amount">
												<span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span><?=$_SESSION['total']?>
											</span>
										</p>
										<p class="woocommerce-mini-cart__total total">
											<strong>Total:</strong>
											<span class="woocommerce-Price-amount amount color-cdaa7c">
												<span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span><?=$_SESSION['total']?>
											</span>
										</p>
										<p class="woocommerce-mini-cart__buttons buttons">
											<a href="<?=BASEURL.'cart'?>" class="button wc-forward view-cart">View cart</a>
											<a href="#" class="button checkout wc-forward">Checkout</a>
										</p>
									</div>
								</div>
							</div>
							<span class="lnr lnr-magnifier search-icon" data-toggle="modal"
								data-target="#modalSearch"></span>
						</div>
					</div>
				</div>
			</div>
			<nav id="main-nav">
				<ul>
					<li class="<?=$home_page_nav?>">
						<a href="<?=BASEURL?>">
							Home
						</a>
					</li>
					<li class="<?=$menu_nav?>">
						<a href="<?=BASEURL.'menu'?>">
							Menu
						</a>
					</li>
					<li>
						<a href="<?=UPLOADS.$setting['pdf']?>" target="_balnk">
							Menu PDF
						</a>
					</li>
					<li class="<?=$category_nav?>" style="display: none;">
						<a href="#">
							Shop
						</a>
						<ul>
							<?php foreach ($cats as $key => $cat): ?>
								<?php if ($cat['deal'] == 'no'): ?>
									<li>
										<a href="<?=BASEURL.'category/'.$cat['slug']?>"><?=$cat['title']?>
											<i class="zmdi zmdi-chevron-right"></i>
										</a>
										<ul>
											<?php foreach ($products as $key => $product): ?>
												<?php if ($product['category_id'] == $cat['category_id']): ?>
													<li><a href="<?=BASEURL.'product/'.$product['slug']?>"><?=$product['title']?></a></li>
												<?php endif ?>
											<?php endforeach ?>
										</ul>
									</li>
								<?php endif ?>
							<?php endforeach ?>
						</ul>
					</li>
					<li class="<?=$reservation_nav?>">
						<a href="<?=BASEURL.'reservation'?>">
							Reservation
						</a>
					</li>
					<li class="<?=$events_nav?>">
						<a href="<?=BASEURL.'events'?>">
							Events
						</a>
					</li>
					<li class="<?=$mariage_nav?>">
						<a href="<?=BASEURL.'marriage'?>">
							Mariages
						</a>
					</li>
					<li class="<?=$about_us_nav?>">
						<a href="<?=BASEURL.'about-us'?>">
							About Us
						</a>
					</li>
					<li class="<?=$catering_nav?>">
						<a href="<?=BASEURL.'catering'?>">
							Catering
						</a>
					</li>
				</ul>
			</nav>
		</nav>

		<div class="modal-search modal fade" id="modalSearch" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form method="get">
						<input type="text" placeholder="Search">
						<button>
							<span class="lnr lnr-magnifier"></span>
						</button>
					</form>
				</div>
			</div>
			<span class="lnr lnr-cross" data-toggle="modal" data-target="#modalSearch"></span>
		</div>

		<div class="menu-sidebar">
			<div class="close-btn">
				<span class="lnr lnr-cross" id="close-icon"></span>
			</div>
			<a href="index-2.html">
				<img src="<?=IMG?>logo-menu-sidebar.png" alt>
			</a>
			<p class="text"><?=$setting['about']?></p>
			<div class="owl-carousel owl-theme sidebar-custom-images image-slider style-1" id="image-carousel">
				<?php foreach ($home_products as $key => $product): ?>
					<div class="item">
						<a href="<?=BASEURL.'product/'.$product['slug']?>">
							<img src="<?=UPLOADS.$product['image']?>" alt="<?=$product['title']?>">
						</a>
					</div>
				<?php endforeach ?>
			</div>

			<div class="contact-part">
				<div class="contact-line">
					<span class="lnr lnr-home"></span>
					<span><?=$setting['address']?></span>
				</div>
				<div class="contact-line">
					<a href="tel:<?=$setting['phone']?>">
						<span class="lnr lnr-phone-handset"></span>
						<span><?=$setting['phone']?></span>
					</a>
				</div>
				<div class="contact-line">
					<a href="mailto:<?=$setting['email']?>">
						<span class="lnr lnr-envelope"></span>
						<span><span class="__cf_email__"><?=$setting['email']?></span></span>
					</a>
				</div>
			</div>

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
	</header>