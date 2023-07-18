<main>

        <section class="page-info set-bg" data-image-src="<?=UPLOADS.$cat_['image']?>">
            <div class="section-header">
                <h1 class="text-white"><?=$cat_['title']?></h1>
                <span>~ Delicious food ~</span>
            </div>
        </section>

        <section class="section-primary pt-150 pb-113 shop-list">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="sorting">
                            <form method="get" class="woocommerce-ordering">
                                <p class="woocommerce-result-count">
                                    Showing <?=count($products)?> results
                                </p>
                                <div class="form-holder">
                                    <select name="orderby" class="orderby form-control">
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                    <span class="lnr lnr-chevron-down"></span>
                                </div>
                            </form>
                        </div>
                        <div class="row products">
                            <?php foreach ($products as $key => $product): ?>
                                <div class="col-md-4 col-lg-3 col-sm-6">
                                    <div class="item">
                                        <div class="thumb">
                                            <a href="<?=BASEURL.'product/'.$product['slug']?>"
                                                class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                <img src="<?=UPLOADS.$product['image']?>" alt="<?=$product['title']?>">
                                            </a>
                                            <a href="#"
                                                class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add
                                                to cart</a>
                                        </div>
                                        <div class="info">
                                            <h5 class="woocommerce-loop-product__title">
                                                <a href="<?=BASEURL.'product/'.$product['slug']?>"><?=$product['title']?></a>
                                            </h5>
                                            <div class="star-rating">
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <i class="zmdi zmdi-star"></i>
                                                <!-- <i class="zmdi zmdi-star-outline"></i> -->
                                            </div>
                                            <span class="price">
                                                <span class="woocommerce-Price-amount amount">
                                                    <span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span><?=$product['price']?>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- /4 -->
                            <?php endforeach ?>                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </main>