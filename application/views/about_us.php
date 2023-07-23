<main>

    <section class="page-info set-bg" data-image-src="<?=IMG?>page-info-bg.jpg">
        <div class="section-header">
            <h1 class="text-white">About us</h1>
            <span>~ Our story ~</span>
        </div>
    </section>

    <section class="about-us">
        <div class="container">
            <div class="about-us-wrapper set-bg" data-image-src="<?=IMG?>about-us-bg.png">
                <img src="<?=IMG?>about-us-1.jpg" alt class="about-us-1">
                <div class="about-us-board">
                    <div class="inner">
                        <div class="heading">
                            <h2>Our Story</h2>
                            <img src="<?=IMG?>border-5.png" alt class="border-place">
                        </div>
                        <div class="body">
                            <p><?=$setting['story']?></p>
                            <div class="end">
                                <img src="<?=IMG?>signature-2.png" alt>
                                <div class="name">
                                    <h6>
                                        <a href="#">Harry Price</a>
                                    </h6>
                                    <span>Restaurant Owners</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="<?=IMG?>about-us-2.jpg" alt class="about-us-2">
            </div>
        </div>
    </section>

    <section class="section-primary our-service pb-120">
        <div class="container">
            <div class="section-header">
                <h2 class="text-white">Our Best Service</h2>
                <span>~ Experiences on food ~</span>
            </div>
            <div class="row">
                <?php foreach ($service_boxs as $key => $sb): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="our-service-col">
                            <h3>- <?=$sb['title']?> -</h3>
                            <img src="<?=UPLOADS.$sb['icon']?>" alt="<?=$sb['title']?>">
                            <p><?=$sb['detail']?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <section class="section-primary about-us pt-150 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-md-0">
                    <div class="image-holder">
                        <img src="<?=UPLOADS.$page['image']?>" alt="About Us">
                    </div>
                </div>
                <div class="col-md-6 pl-md-0">
                    <div class="about-us-col">
                        <div class="section-header">
                            <h2>About us</h2>
                            <span class="fifth-color">~ more about us ~</span>
                        </div>
                        <p><?=$page['detail']?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <div class="container">
        <div class="partner has-bd">
            <div class="row justify-content-between">
                <div class="col-6 col-lg-auto text-center">
                    <a href="#" class="image-holder">
                        <img src="<?=IMG?>partner-2.png" alt class="wow zoomIn" data-wow-delay="0.3s">
                    </a>
                </div>
                <div class="col-6 col-lg-auto text-center">
                    <a href="#" class="image-holder">
                        <img src="<?=IMG?>partner-3.png" alt class="wow zoomIn" data-wow-delay="0.5s">
                    </a>
                </div>
                <div class="col-6 col-lg-auto text-center">
                    <a href="#" class="image-holder">
                        <img src="<?=IMG?>partner-4.png" alt class="wow zoomIn" data-wow-delay="0.7s">
                    </a>
                </div>
                <div class="col-6 col-lg-auto text-center">
                    <a href="#" class="image-holder">
                        <img src="<?=IMG?>partner-5.png" alt class="wow zoomIn" data-wow-delay="0.9s">
                    </a>
                </div>
            </div>
        </div>
    </div> -->
</main>