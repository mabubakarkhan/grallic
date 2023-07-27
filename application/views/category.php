<main>

        <section class="page-info set-bg" data-image-src="<?=IMG.'page-info-bg-5.jpg'?>">
            <div class="section-header">
                <h1 class="text-white"><?=$cat_['title']?></h1>
                <?php if (!(empty($cat_['tag_line']))): ?>
                    <span>~ <?=$cat_['tag_line']?> ~</span>
                <?php endif ?>
            </div>
        </section>

        <section class="section-primary pt-150 pb-113 shop-list">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row products">
                            <?php foreach ($products as $key => $product): ?>
                                <div class="col-md-6 menu-holder">
                                    <!-- <a href="<?=BASEURL.'product/'.$product['slug']?>" class="menu-thumb">
                                        <img src="<?=UPLOADS.$product['image']?>" alt="<?=$product['title']?>">
                                    </a> -->
                                    <div class="menu-item">
                                        <h5 class="bold-color">
                                            <!-- <a href="<?=BASEURL.'product/'.$product['slug']?>"><?=$product['title']?></a> -->
                                            <?=$product['title']?>
                                            <span class="dots"></span>
                                            <span class="price">
                                                <span><?=CURRENCY?></span>
                                                <?=$product['price']?>
                                            </span>
                                        </h5>
                                        <ul>
                                            <li>
                                                <?=$product['recipe']?>
                                            </li>
                                            <!-- <?php if ($product['small'] > 0): ?>
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
                                            <?php endif ?> -->
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </main>