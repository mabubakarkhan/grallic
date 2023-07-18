<section class="pizza-section">
	<div class="container">
		<h2><?=$cat_['title']?></h2>
		<div class="pizza-columns deal-column">
			<?php if ($products): ?>
				<?php foreach ($products as $key => $q): ?>
					<div class="column">
						<div class="column-holder">
							<a href="<?=BASEURL.'product/'.$q['slug']?>"><img src="<?=UPLOADS.$q['image']?>" alt="<?=$q['title']?>"></a>
							<h3><?=$q['title']?></h3>
							<p><?=$q['detail']?></p>
							<div class="select-holder">
								<a href="<?=BASEURL.'product/'.$q['slug']?>" class="price-holder">
									<span class="left">PKR <?=number_format($q['price'])?></span>
									<span class="right">Add <img src="<?=IMG?>img3.png" alt="image"></span>
								</a>
							</div>
						</div>
					</div><!-- /column -->
				<?php endforeach ?>
			<?php endif ?>
		</div><!-- /pizza-columns -->
		<div class="deals-section full-width-text"><?=$cat_['detail']?></div>
	</div><!-- /container -->
</section><!-- /pizza-section -->