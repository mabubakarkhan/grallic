<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$meta_title?></title>
	<meta name="keywords" content="<?=$meta_key?>">
	<meta name="description" content="<?=$meta_desc?>">
	<?=$open_graph?>
	<?=$seo_tags['facebook_open_graph_tags']?>
	<?=$seo_tags['twitter_cards_tags']?>
	<link rel="canonical" href="hotpocket.pk" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?=CSS?>bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=CSS?>style.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
	<link href="http://fonts.cdnfonts.com/css/chocolate-cavalcade" rel="stylesheet">
	<meta name="google-site-verification" content="fEC4Oj57SOdQ1pAb8kkoRh1WQJDOtaUOdnz89RK3Qc4" />


	<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "@id": "https://hotpocket.pk/",
        "name": "Hot Pocket",
        "hasMap": "https://www.google.com/maps/place/Garden+Heights/@31.4997971,74.3177628,15z/data=!4m12!1m6!3m5!1s0x0:0x95d3c780d67bb61a!2sGarden+Heights!8m2!3d31.4997971!4d74.3177628!3m4!1s0x39190476ca66dafd:0x95d3c780d67bb61a!8m2!3d31.4997971!4d74.3177628",
        "logo": "https://hotpocket.pk/asset/images/logo.png",
        "telephone": "+92304-1110044",
        "email": "info@hotpocket.com",
        "url": "https://hotpocket.pk/",
        "image": "https://hotpocket.pk/asset/images/logo.png",
        "priceRange": "PKR100 - PKR2500",
        "description": "Buy best and cheap Pizzas, best burgers, best sandwiches in Lahore Online. Call us at: 0304-1110044 and get delivery in 30 minutes.",

        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Garden Heights, Aibak Block, New Garden Town",
            "addressLocality": "Lahore",
            "addressRegion": "Pakistan",
            "postalCode": "54000"
        },

        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "31.4997971",
            "longitude": "74.3177628"
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://hotpocket.pk/search/?keyword={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }

	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q27RMXCW1X"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-Q27RMXCW1X');
	</script>

</head>
<body>

	<div id="wrapper">
		
		<section class="main-banner">
			<div class="container">
				<div class="top-header">
					<div class="logo">
						<a href="<?=BASEURL?>">
							<img src="<?=IMG?>logo.png" alt="hot pocket">
						</a>
					</div>
					<div class="right-panel">
						<div class="tel-box" style="border-right:none;">
							<img src="<?=IMG?>img2.png" alt="image">
							<div class="holder">
								<span><a href="tel:+923455555613"> 0345 5555 613</a></span>
								<span><a href="tel:+923327147122">0332 7147122</a></span>
							</div>
						</div>
						<!-- <div class="login-box">
							<a href="#">Sign in / Register</a>
						</div> -->
						<a class="cart_2" href="javascript://"><img src="<?=IMG?>img3.png" alt="image"></a>
					</div>
				</div>
				<nav id="nav">
					<a class="menu" href="#">
						<div id="nav-icon1">
						  <span></span>
						  <span></span>
						  <span></span>
						</div>
					</a>
					<ul>
						<?php if ($home_page == true) { $activeHome = 'active'; } ?>
						<li><a class="<?=$activeHome?>" href="<?=BASEURL?>">home</a></li>
						<?php foreach ($cats as $key => $cat): ?>
							<?php if ($cat['category_id'] == $cat_['category_id']) { $activeCat = 'active'; } else{ $activeCat = ''; } ?>
							<li><a class="<?=$activeCat?>" href="<?=BASEURL.'category/'.$cat['slug']?>"><?=$cat['title']?></a></li>
						<?php endforeach ?>
						<li><a class="<?=$activeAboutUs?>" href="<?=BASEURL.'about-us'?>">about us</a></li>
						<li><a class="<?=$activeContactUs?>" href="<?=BASEURL.'contact-us'?>">contact us</a></li>
					</ul>
				</nav>
				<?php if ($home_page): ?>
					<?php if ($slider): ?>
						<div class="slide slider">
								<?php foreach ($slider as $key => $slide): ?>
									<div>
										<?php if ($slide['product_id'] > 0): ?>
											<a href="<?=BASEURL.'product/'.$slide['product_slug']?>"><img src="<?=UPLOADS.$slide['img']?>" class="d-block w-100" alt="<?=$slide['product']?>"></a>
										<?php else: ?>
											<a href="<?=$slide['link']?>"><img src="<?=UPLOADS.$slide['img']?>" class="d-block w-100" alt="..."></a>
										<?php endif ?>
									</div>
								<?php endforeach ?>
						</div><!-- /carousel -->
					<?php endif ?>
				<?php endif ?>
			</div>
		</section>