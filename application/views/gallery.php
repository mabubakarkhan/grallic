<main>

        <section class="page-breadcrumb page-breadcrumb-gallery">
            <div class="container">
                <div class="row justify-content-between align-content-center">
                    <div class="col-md-auto">
                        <h3 style="color:#fff;">Gallery</h3>
                    </div>
                    <div class="col-md-auto">
                        <ul class="au-breadcrumb">
                            <li>
                                <a href="<?=BASEURL?>" style="color:#fff;">Home</a>
                            </li>
                            <li>
                                <a href="<?=BASEURL.'gallery'?>" style="color:#fff;">Gallery</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-primary pt-120 pb-120 gallery">
            <div class="container">
                <div class="row">
                    <?php foreach ($gallery as $key => $photo): ?>
                        <?php if ($photo['type'] == 'gallery'): ?>
                            <div class="col-md-3">
                                <a href="<?=UPLOADS.$photo['image']?>" class="image-holder" target="_blank">
                                    <div class="gallery-img"><img src="<?=UPLOADS.$photo['image']?>"></div><!-- /gallery-img -->
                                    <div class="frame"></div>
                                    <div class="inner">
                                        <div class="info">
                                            <h6>Click</h6>
                                            <span>View Full</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div><!-- /row -->
            </div>
        </section>
    </main>