<main>

    <section class="page-breadcrumb">
        <div class="container">
            <div class="row justify-content-between align-content-center">
                <div class="col-md-auto">
                    <h3>Cart</h3>
                </div>
                <div class="col-md-auto">
                    <ul class="au-breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a href="shop-cart.html">Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="section-primary shop-cart pt-120 pb-101">
        <div class="container">
            <div class="woocommerce">
                <form action="#" class="woocommerce-cart-form">
                    <table
                        class="table-cart shop_table shop_table_responsive cart woocommerce-cart-form__contents table"
                        id="shop_table">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($_SESSION['cart'] as $key => $q): ?>
	                            <tr class="woocommerce-cart-form__cart-item cart_item">
	                                <td class="product-remove">
	                                    <a href="javascript://" data-key="<?=$key?>" class="delete-cart-item remove" aria-label="Remove this item">
	                                        <span class="lnr lnr-cross-circle"></span>
	                                    </a>
	                                </td>
	                                <td class="product-thumbnail">
	                                    <a href>
	                                        <img src="<?=UPLOADS.$q['image']?>"
	                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
	                                            alt="<?=$q['product']?>" />
	                                    </a>
	                                </td>
	                                <td class="product-name" data-title="Product">
	                                    <a href="shop-single.html"><?=$q['product']?></a>
	                                </td>
	                                <td class="product-price" data-title="Price">
	                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span><?=$q['price']?></span>
	                                </td>
	                                <td class="product-quantity" data-title="Quantity">
	                                    <span class="woocommerce-Price-amount amount"><strong><?=$q['qty']?></strong></span>
	                                </td>
	                                <td class="product-subtotal" data-title="Total">
	                                    <span class="woocommerce-Price-amount amount"><span
	                                            class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span><?=$q['price_total']?></span>
	                                </td>
	                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td class="product-remove none">&nbsp;</td>
                                <td colspan="3" class="actions">
                                    <!-- <div class="coupon">
                                        <input type="text" name="coupon_code" class="input-text form-control"
                                            id="coupon_code" value placeholder="coupon code" />
                                        <input type="submit" class="button au-btn" name="apply_coupon"
                                            value="Apply" />
                                    </div>
                                    <input type="hidden" id="_wpnonce" name="_wpnonce" value="54045be64c" /> -->
                                </td>
                                <td colspan="2" class="cart-subtotal">
                                    <label>Subtotal:</label>
                                    <span class="woocommerce-Price-amount amount">
                                        <span class="woocommerce-Price-currencySymbol"><?=CURRENCY?></span><span class="cart-total"><?=$_SESSION['total']?></span>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="bottom">
                        <!-- <input type="submit" class="button au-btn update-btn has-bd bd-999 round" name="update_cart" value="Update cart" /> -->
                        <a href="javascript://" class=" au-btn go-shopping round has-bg au-btn--hover">Go
                            shopping</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>