<main id="contact-us-page">

    <section class="page-info set-bg" data-image-src="<?=IMG?>page-info-bg-1.jpg">
        <div class="section-header">
            <h1 class="text-white">Contact us</h1>
            <span>~ More than you know ~</span>
        </div>
    </section>

    <section class="contact-us section-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content">
                        <h3>Our office</h3>
                        <?=$page['detail']?>
                        <div class="contact-us-row row">
                            <div class="col-md-12">
                                <div class="contact-us-col">
                                    <br>
                                    <h5>Contact Detail</h5>
                                    <div class="body">
                                        <div class="address">
                                            <span>Address: <?=$setting['address']?></span>
                                        </div>
                                        <div class="contact-info">
                                            <a href="mailto:<?=$setting['email']?>">Email: <?=$setting['email']?></a>
                                            <a href="tel:<?=$setting['phone']?>">Phone: <?=$setting['phone']?></a>
                                        </div>
                                    </div>
                                </div>
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
                </div>
                <div class="col-md-6">
                    <div class="contact-us-form">
                        <form id="contact-form">
                            <div class="form-holder">
                                <input type="text" class="form-control" placeholder="Full Name" name="name"
                                    required>
                            </div>
                            <div class="form-holder">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone">
                            </div>
                            <div class="form-holder">
                                <textarea class="form-control" placeholder="Leave Message" name="msg"
                                    required></textarea>
                            </div>
                            <button class="au-btn round has-bg medium au-btn--hover">Send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <iframe src="<?=$setting['google_map']?>" style="border:0;height: 300px;width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</main>