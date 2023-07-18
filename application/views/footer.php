<footer>

		<div class="ft-top">
			<div class="container">
				<div class="ft-top-wrapper">
					<div class="ft-logo">
						<a href="index-2.html">
							<img src="<?=IMG?>logo.png" alt>
						</a>
					</div>
					<div class="row justify-content-between justify-content-xl-start">
						<div class="col-md-3  ft-col">
							<h6>About Us</h6>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusan-tium doloremque
								laudantium, totam rem aperiam,</p>
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
	<script src="<?=JS?>main.min.js"></script>
</body>

<!-- Mirrored from freebw.com/templates/royate/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Jul 2023 11:59:28 GMT -->

</html>