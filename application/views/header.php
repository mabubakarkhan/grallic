<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from freebw.com/templates/royate/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 11:59:20 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
	<meta charset="utf-8">
	<title><?=APP_TITLE?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?=FONTS?>linearicons/style.css">

	<link rel="stylesheet" href="<?=FONTS?>material-design-iconic-font/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" href="<?=VENDOR?>bootstrap/bootstrap.min.css">

	<link rel="stylesheet" href="<?=VENDOR?>owl-carousel/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=VENDOR?>owl-carousel/css/owl.theme.default.min.css">

	<link rel="stylesheet" href="<?=CSS?>animate.css">

	<link rel="stylesheet" href="<?=VENDOR?>date-picker/datepicker.min.css">

	<link rel="stylesheet" type="text/css" href="<?=VENDOR?>revolution-slider/css/layers.css">
	<link rel="stylesheet" type="text/css" href="<?=VENDOR?>revolution-slider/css/navigation.css">
	<link rel="stylesheet" type="text/css" href="<?=VENDOR?>revolution-slider/css/settings.css">

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
					<a href="#">
						Home
					</a>
				</li>
				<li class="has-children <?=$category_nav?>">
					<a href="#">
						Menu
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
				<li class="has-children">
					<a href="#">
						Reservation
					</a>
					<div class="sub-menu">
						<div class="wrapper">
							<ul>
								<li>
									<a href="reservation_v1.html">Reservation_v1</a>
								</li>
								<li>
									<a href="reservation_v2.html">Reservation_v2</a>
								</li>
							</ul>
						</div>
					</div>
				</li>
				<li>
					<a href="#">
						Blog
					</a>
				</li>
			</ul>
			<div class="action align-items-center">
				<a href="reservation_v1.html" class="au-btn au-btn--hover has-bd">Booking now</a>
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
								<span class="notify-amount">0</span>

								<div id="woocommerce_widget_cart-2" class="widget woocommerce widget_shopping_cart">
									<div class="widget_shopping_cart_content">
										<ul class="woocommerce-mini-cart cart_list product_list_widget ">
											<li class="woocommerce-mini-cart-item mini_cart_item clearfix">
												<a href="#" class="remove remove_from_cart_button"
													aria-label="Remove this item">
													<span class="lnr lnr-cross-circle"></span>
												</a>
												<a href="#" class="image-holder">
													<img src="<?=IMG?>widget-cart-thumb-1.jpg"
														class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
														alt>
													<span class="product-name">Best Brownies</span>
												</a>
												<span class="quantity">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">$</span>18
													</span>
													x1
												</span>
											</li>
											<li class="woocommerce-mini-cart-item mini_cart_item clearfix">
												<a href="#" class="remove remove_from_cart_button"
													aria-label="Remove this item">
													<span class="lnr lnr-cross-circle"></span>
												</a>
												<a href="#" class="image-holder">
													<img src="<?=IMG?>widget-cart-thumb-2.jpg"
														class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
														alt>
													<span class="product-name">Angela's Awesome</span>
												</a>
												<span class="quantity">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">$</span>28
													</span>
													x3
												</span>
											</li>
										</ul>
										<p class="woocommerce-mini-cart__total total">
											<strong>Subtotal:</strong>
											<span class="woocommerce-Price-amount amount">
												<span class="woocommerce-Price-currencySymbol">$</span>102
											</span>
										</p>
										<p class="woocommerce-mini-cart__total total">
											<strong>Total:</strong>
											<span class="woocommerce-Price-amount amount color-cdaa7c">
												<span class="woocommerce-Price-currencySymbol">$</span>102
											</span>
										</p>
										<p class="woocommerce-mini-cart__buttons buttons">
											<a href="#" class="button wc-forward view-cart">View cart</a>
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
					<li class="current">
						<a href="#" target="_blank">Home</a>
						<ul>
							<li>
								<a href="index-2.html">HomePage_v1</a>
							</li>
							<li>
								<a href="index-3.html">HomePage_v2</a>
							</li>
							<li class="current">
								<a href="index-4.html">HomePage_v3</a>
							</li>
							<li>
								<a href="index-5.html">HomePage_v4</a>
							</li>
							<li>
								<a href="index-6.html">HomePage_v5</a>
							</li>
							<li>
								<a href="index-7.html">HomePage_v6</a>
							</li>
							<li>
								<a href="index-8.html">HomePage_v7</a>
							</li>
							<li>
								<a href="index-9.html">HomePage_v8</a>
							</li>
							<li>
								<a href="index-10.html">HomePage_v9</a>
							</li>
							<li>
								<a href="index-11.html">HomePage_v10</a>
							</li>
							<li>
								<a href="index-12.html">HomePage_v11</a>
							</li>
							<li>
								<a href="index-13.html">HomePage_v12</a>
							</li>
							<li>
								<a href="index-14.html">HomePage_v13</a>
							</li>
							<li>
								<a href="index-15.html">HomePage_v14</a>
							</li>
							<li>
								<a href="index-16.html">HomePage_v15</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">
							Page
						</a>
						<ul>
							<li>
								<a href="about-us.html">About Us</a>
							</li>
							<li>
								<a href="contact-us.html">Contact Us</a>
							</li>
							<li>
								<a href="coming-soon.html">Coming Soon</a>
							</li>
							<li>
								<a href="#">Gallery</a>
								<ul>
									<li>
										<a href="gallery-three-columns.html">Three Colums</a>
									</li>
									<li>
										<a href="gallery-four-columns.html">Four Columns</a>
									</li>
									<li>
										<a href="gallery-three-columns-wide.html">Three Columns Wide</a>
									</li>
									<li>
										<a href="gallery-four-columns-wide.html">Four Colums Wide</a>
									</li>
									<li>
										<a href="masonry-grid.html">Masonry</a>
									</li>
									<li>
										<a href="masonry-wide.html">Masonry Wide</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="project.html">Project</a>
							</li>
							<li>
								<a href="meet-the-chefs.html">Meet The Cheefs</a>
							</li>
							<li>
								<a href="404.html">404</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="menu.html">
							Menu
						</a>
					</li>
					<li>
						<a href="#">
							Reservation
						</a>
						<ul>
							<li>
								<a href="reservation_v1.html">Reservation_v1</a>
							</li>
							<li>
								<a href="reservation_v2.html">Reservation_v2</a>
							</li>
						</ul>
					</li>
					<li class="has-children">
						<a href="#">
							Blog
						</a>
						<ul>
							<li>
								<a href="blog-masonry.html">Blog Masonry</a>
							</li>
							<li>
								<a href="blog-masonry-wide.html">Blog Masonry Wide</a>
							</li>
							<li>
								<a href="blog-standard-right-sidebar.html">Blog Standard Right Sidebar</a>
							</li>
							<li>
								<a href="blog-standard-left-sidebar.html">Blog Standard Left Sidebar</a>
							</li>
							<li>
								<a href="blog-standard-no-sidebar.html">Blog Standard No Sidebar</a>
							</li>
							<li>
								<a href="blog-single.html">Blog Single</a>
							</li>
						</ul>
					</li>
					<li class="has-children">
						<a href="#">
							Shop
						</a>
						<ul>
							<li>
								<a href="shop-list.html">Shop List</a>
							</li>
							<li>
								<a href="shop-three-column.html">Three Columns Grid</a>
							</li>
							<li>
								<a href="shop-three-column-wide.html">Three Columns Wide</a>
							</li>
							<li>
								<a href="shop-four-column.html">Four Colums Grid</a>
							</li>
							<li>
								<a href="shop-four-column-wide.html">Four Colums Wide</a>
							</li>
							<li>
								<a href="shop-cart.html">Shop Cart</a>
							</li>
							<li>
								<a href="shop-single.html">Shop Single</a>
							</li>
							<li>
								<a href="sign-in.html">Sign In</a>
							</li>
							<li>
								<a href="sign-up.html">Sign Up</a>
							</li>
							<li>
								<a href="checkout.html">CheckOut</a>
							</li>
						</ul>
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
			<p class="text">Et harum quidem rerum facilis est et expedita distinctio nam libero.</p>
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
					<a href="tel:+15618003666666">
						<span class="lnr lnr-phone-handset"></span>
						<span><?=$setting['phone']?></span>
					</a>
				</div>
				<div class="contact-line">
					<a href="#">
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