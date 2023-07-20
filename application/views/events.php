<main>
    <section class="page-info set-bg" data-image-src="<?=IMG?>page-info-bg-4.jpg">
        <div class="section-header">
            <h1 class="text-white">Events</h1>
            <span>~ The things you want to find ~</span>
        </div>
    </section>
   <section class="section-primary event pb-120">
			<div class="container">
				<div class="section-header">
					<h2>Upcoming events</h2>
					<span>~ Come and wait with us ~</span>
				</div>
				<div class="row">
					<?php foreach ($events as $key => $event): ?>
						<div class="col-md-6">
							<div class="event-col set-bg" data-image-src="<?=IMG?>event-bg-1.jpg">
								<div class="interior">
									<div class="event-date">
										<div class="inner">
											<span class="date"><?=date('d',strtotime($event['updated_at']))?></span>
											<span class="month"><?=date('M',strtotime($event['updated_at']))?></span>
										</div>
									</div>
									<h6>
										<a href="#"><?=$event['title']?></a>
									</h6>
									<div class="event-meta">
										<div class="event-time">
											<span class="lnr lnr-clock"></span>
											<?=$event['time_at']?>
										</div>
										<div class="event-address">
											<span class="lnr lnr-map-marker"></span>
											<?=$event['location']?>
										</div>
									</div>
									<p><?=$event['detail']?></p>
									<!-- <a href="#" class="au-btn__readmore color-36">Read more</a> -->
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>
</main>