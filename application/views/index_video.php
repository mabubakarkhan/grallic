<main>

		<div class="rev_slider_wrapper">
			<div id="rev_slider_4" class="rev_slider" data-version="5.4.5">
				<ul>
					<li data-transition>
						<img src="<?=IMG?>slideshow-5.jpg" class="rev-slidebg" alt>
						<div class="tp-caption tp-resizeme caption-1"
							data-frames="[{&quot;delay&quot;:500,&quot;speed&quot;:1000,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:-20px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
							data-x="center" data-y="middle" data-fontsize="['22', '22', '22', '22', '22']"
							data-voffset="['-64','-77', '-72', '-113', '-113']" data-lineheight="inherit"
							data-color="#ccc">
							Because you deserve to enjoy the best
						</div>
						<div class="tp-caption tp-resizeme caption-2"
							data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1000,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:-50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:-20px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
							data-x="center" data-y="middle" data-fontsize="['99', '99', '99', '99', '99']"
							data-voffset="['16','3', '8', '-33', '-33']" data-lineheight="inherit" data-color="#fff">
							nice dinner
						</div>
						<div class="tp-caption tp-resizeme caption-3"
							data-frames="[{&quot;delay&quot;:1500,&quot;speed&quot;:1000,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:20px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
							data-x="center" data-y="middle" data-voffset="['142','129', '134', '93', '93']"
							data-width="['auto']" data-height="['auto']" data-type="image">
							<img src="<?=IMG?>cuisine-1956.png" alt
								data-ww="['320px', '320px', '320px', '320px', '320px']"
								data-hh="['59px', '59px', '59px', '59px', '59px']">
						</div>
						<div class="rs-background-video-layer" data-forcerewind="on" data-volume="mute"
							data-videowidth="100%" data-videoheight="100%" data-ytid="<?=$setting['slider_video_id']?>" data-videoattributes="version=3&enablejsapi=1&html5=1&hd=1&wmode=opaque&showinfo=0&rel=0&
     						origin=http://www.youtube.com/" data-videopreload="auto" data-videorate="1" data-forcecover="1"
							data-videoloop="loopandnoslidestop" data-aspectratio="16:9" data-videostartat="00:04"
							data-videoendat="02:08" data-autoplay="on" data-autoplayonlyfirsttime="true">
						</div>
					</li>
				</ul>
			</div>
		</div>

		<section class="section-primary pt-150 pb-120">
			<div class="container">
				<div class="my-flipster">
					<ul>
						<li class="flipster-item">
							<img src="<?=IMG?>flipster-1.jpg" alt class="flipster__image">
							<div class="content">
								<div class="heading">
									<h3>Our Story</h3>
									<img src="<?=IMG?>border-1.png" alt>
								</div>
								<div class="body">
									<p><?=$setting['story']?></p>
									<div class="end">
										<img src="<?=IMG?>signature-1.png" alt>
										<div class="name">
											<h6>
												<a href="#">Harry Price</a>
											</h6>
											<span>Restaurant Owners</span>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li class="flipster-item">
							<img src="<?=IMG?>flipster-2.jpg" alt class="flipster__image">
							<div class="content">
								<div class="heading mb-34">
									<h3>Opening Time</h3>
								</div>
								<div class="body">
									<div class="time">
										<h4>Monday - Friday</h4>
										<span>7am - 11am (Breakfast)</span>
										<span>11am - 10pm (Lunch/Dinner)</span>
									</div>
									<div class="time">
										<h4>Saturday - Sunday</h4>
										<span>8am - 1pm (Brunch)</span>
										<span>1am - 10pm (Lunch/Dinner)</span>
									</div>
								</div>
							</div>
						</li>
						<li class="flipster-item">
							<img src="<?=IMG?>flipster-3.jpg" alt class="flipster__image">
							<div class="content">
								<div class="heading mb-34">
									<h3>Reservation</h3>
								</div>
								<div class="body">
									<p class="mb-32">Make your <span class="color-cdaa7c">reservation online</span> any
										time, day or night! Royate Restaurant looks forward to serving you the best food
										experience.</p>
									<p>Or you can also call us <span class="semi-bold">+ (156) 1800-366-6666</span> from
										7 a.m until before the closing time 1 hour</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</section>

		<section class="section-primary our-service pb-120">
			<div class="container">
				<div class="section-header">
					<h2 class="text-white">Our Best Service</h2>
					<span>~ Experiences on food ~</span>
				</div>
				<div class="row">
					<?php foreach ($service_boxs as $key => $sb): ?>
						<div class="col-md-6 col-lg-3">
							<div class="our-service-col">
								<h3>- <?=$sb['title']?> -</h3>
								<img src="<?=UPLOADS.$sb['icon']?>" alt="<?=$sb['title']?>">
								<p><?=$sb['detail']?></p>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>

		<section class="section-primary pb-120">
			<div class="container">
				<div class="section-header">
					<h2>Our Food Menu</h2>
					<span>~ See what we offer ~</span>
				</div>
				<div class="our-menu-alternate">

					<?php foreach ($cats as $key => $cat): ?>
						<?php if ($cat['deal'] == 'no'): ?>
							<?php
							if($key%2==0){
								$classStyle = 'style-2';
							}
							else{
								$classStyle = 'style-1';
							}
							?>
							<div class="our-menu-block <?=$classStyle?>">

								<img src="<?=UPLOADS.$cat['image']?>" alt="<?=$cat['title']?>">

								<div class="our-menu-col">
									<div class="heading">
										<h3 class="bold-color"><?=$cat['title']?></h3>
										<span class="icon">
											<img src="<?=UPLOADS.$cat['icon']?>" alt="<?=$cat['title']?>">
										</span>
									</div>
									<div class="body">
										<?php foreach ($products as $key => $product): ?>
											<?php if ($product['category_id'] == $cat['category_id']): ?>
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
											<?php endif ?>
										<?php endforeach ?>
										<a href="<?=BASEURL.'category/'.$cat['slug']?>" class="au-btn__readmore">View more</a>
									</div>
								</div>
							</div><!-- /our-menu-block -->
						<?php endif ?>
					<?php endforeach ?>
					
				</div>
			</div>
		</section>

		<section class="booking">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 px-0">
						<div class="image-holder"></div>
					</div>
					<div class="col-md-6 px-0">
						<div class="booking-content">
							<div class="section-header">
								<h2 class="text-white">Book a table</h2>
								<span>~ Check out our place ~</span>
							</div>
							<form id="reservation-form">
								<div class="form-row fix-lg">
									<div class="form-col">
										<div class="form-holder">
											<select name="people" class="form-control" required data-language="en">
												<option value="1 people" selected>1 people</option>
												<option value="2 people">2 people</option>
												<option value="3 people">3 people</option>
												<option value="4 people">4 people</option>
												<option value="5 people">5 people</option>
												<option value="6 people">6 people</option>
												<option value="7 people">7 people</option>
												<option value="8 people">8 people</option>
												<option value="9 people">9 people</option>
												<option value="10 people">10 people</option>
												<option value="10 people+">10 people+</option>
											</select>
											<span class="lnr lnr-chevron-down"></span>
										</div>
									</div>
									<div class="form-col">
										<div class="form-holder">
											<input type="text" class="form-control datepicker-here" data-language="en"
												data-date-format="dd - mm - yyyy" placeholder="Date" name="date_at" required>
											<span class="lnr lnr-calendar-full big"></span>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="form-col">
										<div class="form-holder">
											<input type="text" class="form-control time-picker" placeholder="Time" name="time_at" required>
											<span class="lnr lnr-clock big"></span>
										</div>
									</div>
									<div class="form-col">
										<div class="form-holder">
											<input type="text" class="form-control" placeholder="Name" name="name" required>
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="form-col">
										<div class="form-holder">
											<input type="text" class="form-control" placeholder="Phone" name="phone" required>
										</div>
									</div>
									<div class="form-col">
										<div class="form-holder">
											<input type="text" class="form-control" placeholder="Email" name="email" required>
										</div>
									</div>
								</div>
								<div class="btn-holder">
									<button class="au-btn has-bg au-btn--hover round" type="submit">Book now</button>
								</div>
							</form>
						</div>
					</div>
				</div>
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
						<?php if ($key == 2): ?>
							<?php break; ?>
						<?php endif ?>
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