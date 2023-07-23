<main>
    <section class="page-info set-bg" data-image-src="<?=IMG?>page-info-bg-5.jpg">
        <div class="section-header">
            <h1 class="text-white"><?=$product['title']?></h1>
            <span>~ Delicious food ~</span>
        </div>
    </section>

    <section class="section-primary pt-150 pb-113 shop-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images">
                        <figure class="woocommerce-product-gallery__wrapper">
                            <div class="woocommerce-product-gallery__image">
                                <img id="zoom-image" class="attachment-shop_single size-shop_single wp-post-image" src="<?=UPLOADS.$product['image']?>" data-zoom-image="<?=UPLOADS.$product['image']?>" alt="<?=$product['title']?>" />
                            </div>
                        </figure>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="summary entry-summary">
                        <h3 class="product_title entry-title"><?=$product['title']?></h3>
                        <div class="info">
                            <span class="price">
                                <span class="woocommerce-Price-amount amount"> <span class="woocommerce-Price-currencySymbol">$</span><?=$product['price']?> </span>
                            </span>
                            <span class="star-rating">
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                                <i class="zmdi zmdi-star"></i>
                            </span>
                        </div>
                        <div class="woocommerce-product-details__short-description">
                            <p><?=$product['detail']?></p>
                        </div>
                        <form class="cart" method="post" enctype="multipart/form-data">
                            <div class="quantity">
                                <input type="number" class="input-text qty text" step="1" min="0" name="cart[5934c1ec0cd31e12bd9084d106bc2e32][qty]" value="1" title="Qty" size="4" id="input-quantity" />
                                <div class="icon">
                                    <a href="#" class="number-button plus">+</a>
                                    <a href="#" class="number-button minus">-</a>
                                </div>
                            </div>
                            <button type="submit" name="add-to-cart" value class="single_add_to_cart_button button alt au-btn round has-bg au-btn--hover">Add to cart</button>
                        </form>
                        <div class="product_meta">
                            <span class="sku_wrapper">SKU: <span class="sku">0036982</span></span>
                            <span class="posted_in">Category: <a href="#" rel="tag"><?=$product['Category']?></a></span>
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
                </div> -->
                <div class="col-lg-6">
                    <div class="summary entry-summary">
                        <h3 class="product_title entry-title"><?=$product['title']?></h3>
                        <div class="info">
                            <span class="price">
                                <span class="woocommerce-Price-amount amount"> 
                                    <span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span>
                                    <?=$product['price']?> 
                                </span>
                            </span>
                        </div>
                        <div class="deal-detail">
                            <div class="deal-holder">
                                <form class="add-to-cart-form w-100">
                                    <p><?=$product['detail']?></p>
                                    <input type="hidden" name="deal" value="<?=$product['deal']?>">
                                    <input type="hidden" name="product_id" value="<?=$product['product_id']?>">
                                    <?php if ($product['deal'] == 'yes'): ?>
                                        <?php
                                        if (1==2) {
                                            for ($i=0; $i < $product['deal_piza_count']; $i++) { 
                                            ?>
                                                <select name="deal_product[]" required="required">
                                                    <option value="">Select Product</option>
                                            <?php
                                                foreach ($deal_products as $key => $dela_product) {
                                                ?>
                                                    <option value="<?=$dela_product['title']?>"><?=$dela_product['title']?></option>
                                                <?php
                                                }
                                            ?>
                                                </select>
                                            <?php
                                            }
                                        }
                                        ?>

                                        <?php foreach ($deals as $key => $deal): ?>
                                            <?php for ($i=0; $i < $deal['deal']['count']; $i++) { ?>
                                                <select name="deal_product[]" required="required">
                                                    <option value="">Select <?=$deal['deal']['category']?></option>
                                                    <?php foreach ($deal['deal_products'] as $ddkey => $deal_product): ?>
                                                        <option value="<?=$deal_product['title']?>"><?=$deal_product['title']?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            <?php } ?>
                                        <?php endforeach ?>



                                        <?php
                                        for ($i=0; $i < $product['deal_drink_count']; $i++) { 
                                        ?>
                                            <select name="deal_drink[]" required="required">
                                                <option value="">Select Drink (<?=$product['deal_drink_size']?>)</option>
                                                <option value="pepsi">Pepsi</option>
                                                <option value="coke">Coke</option>
                                                <option value="7up">7up</option>
                                                <option value="sprite">Sprite</option>
                                                <option value="dew">Dew</option>
                                                <option value="fanta">Fanta</option>
                                                <option value="mrinda">Mrinda</option>
                                            </select>
                                        <?php
                                        }
                                        ?>

                                    <?php else: ?>


                                        <div class="price-holder">

                                            <?php if (isset($Size) && $Size != false): ?>
                                                PKR <span class="product-price"><?=$product[$Size]?></span>
                                            <?php else: ?>
                                                PKR <span class="product-price"><?=$product['price']?></span>
                                            <?php endif ?>

                                            <?php if (isset($Size) && $Size != false): ?>
                                                <input type="hidden" name="product-price-single" value="<?=$product[$Size]?>">
                                            <?php else: ?>
                                                <input type="hidden" name="product-price-single" value="<?=$product['price']?>">
                                            <?php endif ?>

                                            <div class="counter">
                                                <a class="quantity-arrow-minus minus-product" href="javascript://"> - </a>
                                                <input class="quantity-num quantity-num-product" name="qty" type="number" value="1" />
                                                <a class="quantity-arrow-plus plus-product" href="javascript://"> + </a>
                                            </div>
                                        </div>
                                        <?php if ($product['small'] > 0 || $product['medium'] > 0 || $product['large'] > 0 || $product['family'] > 0): ?>
                                            <select name="size">
                                                <?php if (isset($Size) && $Size != false): ?>
                                                    <?php if ($product['small'] > 0 && $Size == 'small'): ?>
                                                        <option data-price="<?=$product['small']?>" value="small" selected="selected">Small - <?=$product['small']?></option>
                                                    <?php else: ?>
                                                        <option data-price="<?=$product['small']?>" value="small">Small - <?=$product['small']?></option>
                                                    <?php endif ?>
                                                    <?php if ($product['medium'] > 0 && $Size == 'medium'): ?>
                                                        <option data-price="<?=$product['medium']?>" value="medium" selected="selected">Medium - <?=$product['medium']?></option>
                                                    <?php else: ?>
                                                        <option data-price="<?=$product['medium']?>" value="medium">Medium - <?=$product['medium']?></option>
                                                    <?php endif ?>
                                                    <?php if ($product['large'] > 0 && $Size == 'large'): ?>
                                                        <option data-price="<?=$product['large']?>" value="large" selected="selected">Large - <?=$product['large']?></option>
                                                    <?php else: ?>
                                                        <option data-price="<?=$product['large']?>" value="large">Large - <?=$product['large']?></option>
                                                    <?php endif ?>
                                                    <?php if ($product['family'] > 0 && $Size == 'family'): ?>
                                                        <option data-price="<?=$product['family']?>" value="family" selected="selected">Family - <?=$product['family']?></option>
                                                    <?php else: ?>
                                                        <option data-price="<?=$product['family']?>" value="family">Family - <?=$product['family']?></option>
                                                    <?php endif ?>
                                                <?php else: ?>
                                                    <?php if ($product['small'] > 0): ?>
                                                        <option data-price="<?=$product['small']?>" value="small" selected="selected">Small - <?=$product['small']?></option>
                                                    <?php else: ?>
                                                        <option data-price="">Select Size</option>
                                                    <?php endif ?>
                                                    <?php if ($product['medium'] > 0): ?>
                                                        <option data-price="<?=$product['medium']?>" value="medium">Medium - <?=$product['medium']?></option>
                                                    <?php endif ?>
                                                    <?php if ($product['large'] > 0): ?>
                                                        <option data-price="<?=$product['large']?>" value="large">Large - <?=$product['large']?></option>
                                                    <?php endif ?>
                                                    <?php if ($product['family'] > 0): ?>
                                                        <option data-price="<?=$product['family']?>" value="family">Family - <?=$product['family']?></option>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            </select>
                                        <?php endif ?>


                                        <div class="addons-holder">
                                            <div class="accordion" id="accordionExample">


                                                <?php if ($addons): ?>
                                                    <div class="item">
                                                        <div class="item-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-outline-secondary btn-sm btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Add Ons
                                                                    <i class="fa fa-angle-down"></i>
                                                                </button>
                                                            </h2>
                                                        </div><!-- /item-header -->
                                                         <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="t-p">
                                                                <input type="hidden" name="addon_qty" value="1">
                                                                <input type="hidden" name="addon_price" value="0">
                                                                <?php foreach ($addons as $key => $addon): ?>
                                                                    <div class="addon-box">
                                                                        <div class="form-group">
                                                                            <input type="checkbox" class="addon-checkbox" name="addon[]" id="addon-<?=$addon['addon_id']?>" value="<?=$addon['addon_id']?>" data-price="<?=$addon['price']?>">
                                                                            <label for="addon-<?=$addon['addon_id']?>"><?=$addon['title']?></label>
                                                                        </div>
                                                                        <div class="price-holder">
                                                                            PKR <?=$addon['price']?>
                                                                            <div class="counter">
                                                                                <a href="javascript://" class="quantity-arrow-minus addon-minus"> - </a>
                                                                                <input class="quantity-num addon-qty" type="number" value="1" />
                                                                                <a href="javascript://" class="quantity-arrow-plus addon-plus"> + </a>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /addon-box -->
                                                                <?php endforeach ?>

                                                            </div><!-- /t-p -->
                                                         </div><!-- /collapse -->
                                                    </div><!-- /item -->
                                                <?php endif ?>


                                                <?php if ($drinks): ?>
                                                    <div class="item">
                                                        <div class="item-header" id="headingTwo">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-outline-secondary btn-sm btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                Add Drink 
                                                            <i class="fa fa-angle-down"></i>
                                                            </button>
                                                        </h2>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                            <div class="t-p">
                                                                <input type="hidden" name="drink_qty" value="1">
                                                                <input type="hidden" name="drink_price" value="0">
                                                                <?php foreach ($drinks as $key => $drink): ?>
                                                                    <div class="drink-box">
                                                                        <div class="form-group">
                                                                            <input type="checkbox" class="drink-checkbox" name="drink[]" id="drink-<?=$drink['drink_id']?>" value="<?=$drink['drink_id']?>" data-price="<?=$drink['price']?>">
                                                                            <label for="drink-<?=$drink['drink_id']?>"><?=$drink['title']?></label>
                                                                        </div>
                                                                        <div class="price-holder">
                                                                            PKR <?=$drink['price']?>
                                                                            <div class="counter">
                                                                                <a href="javascript://" class="quantity-arrow-minus drink-minus"> - </a>
                                                                                <input class="quantity-num drink-qty" type="number" value="1" />
                                                                                <a href="javascript://" class="quantity-arrow-plus drink-plus"> + </a>
                                                                            </div>
                                                                        </div>
                                                                    </div><!-- /drink-box -->
                                                                <?php endforeach ?>

                                                            </div><!-- /t-p -->
                                                        </div><!-- /collapse -->
                                                    </div><!-- /item -->
                                                <?php endif ?>


                                            </div><!-- /accordion -->
                                        </div><!-- /addons-holder -->

                                    <?php endif ?>
                                    <button type="submit" class="single_add_to_cart_button button alt au-btn round has-bg au-btn--hover">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="woocommerce-tabs wc-tabs-wrapper">
                <div id="shop-single-tab">
                    <ul class="tabs wc-tabs">
                        <li class="description_tab">
                            <a href="#description">Description</a>
                        </li>
                    </ul>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab" id="description">
                        <?=$product['detail']?>
                    </div>
                </div>
            </div>

            <?php if ($products): ?>
                <div class="related products">
                    <h4>Related products</h4>
                    <div class="row">

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
                </div><!-- /related -->
            <?php endif ?>
        </div>
    </section>
</main>