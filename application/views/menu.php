<main>

    <?php foreach ($cats as $key => $cat): ?>
        <?php if ($cat['deal'] == 'no'): ?>
            <section class="menu-block-bg set-bg" data-image-src="<?=UPLOADS.$cat['image']?>">
                <div class="section-header">
                    <h2 class="text-white"><?=$cat['title']?></h2>
                    <span>~ <?=$cat['tag_line']?> ~</span>
                </div>
            </section>
            <section class="section-primary menu-page pb-120">
                <div class="container">
                    <div class="row">
                        <?php foreach ($products as $key_ => $product): ?>
                            <?php if ($product['category_id'] == $cat['category_id']): ?>
                                <div class="col-md-6 menu-holder">
                                    <!-- <a href="<?=BASEURL.'product/'.$product['slug']?>" class="menu-thumb">
                                        <img src="<?=UPLOADS.$product['image']?>" alt="<?=$product['title']?>">
                                    </a> -->
                                    <div class="menu-item">
                                        <h5 class="bold-color">
                                            <a href="<?=BASEURL.'product/'.$product['slug']?>"><?=$product['title']?></a>
                                            <span class="dots"></span>
                                            <span class="price">
                                                <span><?=CURRENCY?></span>
                                                <?=$product['price']?>
                                            </span>
                                        </h5>
                                        <ul>
                                            <?php if ($product['small'] > 0): ?>
                                                <li><a href="<?=BASEURL.'product/'.$product['slug'].'/small'?>">Small</a></li>
                                            <?php endif ?>
                                            <?php if ($product['medium'] > 0): ?>
                                                <li><a href="<?=BASEURL.'product/'.$product['slug'].'/medium'?>">Medium</a></li>
                                            <?php endif ?>
                                            <?php if ($product['large'] > 0): ?>
                                                <li><a href="<?=BASEURL.'product/'.$product['slug'].'/large'?>">Large</a></li>
                                            <?php endif ?>
                                            <?php if ($product['family'] > 0): ?>
                                                <li><a href="<?=BASEURL.'product/'.$product['slug'].'/family'?>">Family</a></li>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div><!-- /row -->
                </div>
            </section>
        <?php endif ?>
    <?php endforeach ?>

</main>