<?php if ($deal_products): ?>
	<section class="deals-section">
		<div class="container">
			<h2>hot pocket deals</h2>
			<div class="deal-columns">

				<?php foreach ($deal_products as $key => $q): ?>
					<div class="column">
						<div class="column-holder">
							<div class="img-holder">
								<a href="<?=BASEURL.'product/'.$q['slug'].'/'?>"><img src="<?=UPLOADS.$q['image']?>" alt="<?=$q['title']?>"></a>
							</div>
							<div class="txt-holder">
								<h3><?=$q['title']?></h3>
								<p><?=$q['detail']?></p>
							</div>
							<div class="bottom-holder">
								<a href="<?=BASEURL.'product/'.$q['slug'].'/'?>" class="price">PKR<?=number_format($q['price'])?></a>
								<a href="<?=BASEURL.'product/'.$q['slug'].'/'?>" class="cart"><img src="<?=IMG?>img3.png" alt="image"></a>
							</div>
						</div>
					</div><!-- /column -->
				<?php endforeach ?>

			</div><!-- /deal-columns -->
		</div><!-- /container -->
	</section><!-- /deals-section -->
<?php endif ?>

<?php if ($products): ?>
	<section class="pizza-section">
		<div class="container">
			<h2>hot pocket pizzas</h2>
			<div class="pizza-columns">
				<?php foreach ($products as $key => $q): ?>
					<div class="column">
						<div class="column-holder">
							<a href="<?=BASEURL.'product/'.$q['slug'].'/'?>"><img src="<?=UPLOADS.$q['image']?>" alt="<?=$q['title']?>"></a>
							<h3><?=$q['title']?></h3>
							<p><?=$q['detail']?></p>
							<div class="select-holder">
								<?php if ($q['small'] > 0 || $q['medium'] > 0 || $q['large'] > 0 || $q['family'] > 0): ?>
									<label>Select size &amp; type</label>
									<select name="size-home">
										<?php if ($q['small'] > 0): ?>
											<option data-price="<?=$q['small']?>" value="small" selected="selected">Small - <?=$q['small']?></option>
										<?php else: ?>
											<option data-price="">Select Size</option>
										<?php endif ?>
										<?php if ($q['medium'] > 0): ?>
											<option data-price="<?=$q['medium']?>" value="medium">Medium - <?=$q['medium']?></option>
										<?php endif ?>
										<?php if ($q['large'] > 0): ?>
											<option data-price="<?=$q['large']?>" value="large">Large - <?=$q['large']?></option>
										<?php endif ?>
										<?php if ($q['family'] > 0): ?>
											<option data-price="<?=$q['family']?>" value="family">Family - <?=$q['family']?></option>
										<?php endif ?>
									</select>
								<?php endif ?>
							</div><!-- /select-holder -->
							<a href="<?=BASEURL.'product/'.$q['slug'].'/'?>" class="price-holder">
								<span class="left">PKR <span class="home-page-price"><?=number_format($q['price'])?></span></span>
								<span class="right">Add <img src="<?=IMG?>img3.png" alt="image"></span>
							</a>
						</div>
					</div><!-- /column -->
				<?php endforeach ?>

			</div><!-- /pizza-columns -->
		</div><!-- /container -->
	</section><!-- /pizza-section -->
<?php endif ?>


<?php if (strlen($page['detail']) > 4): ?>
	<section class="deals-section full-width-text">
		<div class="container">
			<?=$page['detail']?>
		</div><!-- /container -->
	</section><!-- /deals-section -->
<?php endif ?>