<main>

    <?php foreach ($cats as $key => $cat): ?>
        <?php if ($cat['deal'] == 'no'): ?>
            <section class="menu-block-bg set-bg" data-image-src="<?=UPLOADS.$cat['image']?>">
                <div class="section-header">
                    <h2 class="text-white"><?=$cat['title']?></h2>
                    <span>~ <?=$cat['tag_line']?> ~</span>
                </div>
            </section>
            <section class="section-primary menu-page">
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
                            <?php endif ?>
                        <?php endforeach ?>
                    </div><!-- /row -->
                </div>
            </section>
        <?php endif ?>
    <?php endforeach ?>


    <?php if ($deals): ?>
        <section class="section-primary pb-120">
            <div class="container">
                <div class="section-header">
                    <h2>Family Combos</h2>
                    <span>~ our combos ~</span>
                </div>
                <div class="row">
                    <?php foreach ($deals as $key => $deal): ?>
                        <div class="col-md-4">
                            <div class="deal-box">
                                <div class="head">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6"><span><?=$deal['title']?></span></div>
                                        <div class="col-md-6 col-sm-6" align="right"><span><?=$deal['price']?></span></div>
                                    </div><!-- {row} -->
                                </div>
                                <div class="items">
                                    <ul>
                                        <?php
                                        $items = $this->db->select('title')->select('qty')
                                        ->from('deal_item')
                                        ->where('deal_id',$deal['deal_id'])
                                        ->get();
                                        if ($items->num_rows() > 0) {
                                            foreach ($items->result_array() as $key => $item) {
                                            ?>
                                                <li>
                                                    <?=$item['qty'].' '.$item['title']?>
                                                    <span class="line"></span>
                                                </li>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div><!-- /deal-box -->
                        </div><!-- /4 -->
                    <?php endforeach ?>
                </div><!-- /row -->
            </div>
        </section>
    <?php endif ?>

</main>