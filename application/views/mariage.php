<main>

    <div class="rev_slider_wrapper">
        <div id="rev_slider_3" class="rev_slider" data-version="5.4.5">
            <ul>
                <?php foreach ($slides as $key => $s): ?>
                    <?php if ($s['type'] != 'mariage'): ?>
                        <?php continue; ?>
                    <?php endif ?>
                    <li data-transition>
                        <img src="<?=UPLOADS.$s['slide']?>" class="rev-slidebg" alt>
                        <div class="tp-caption tp-resizeme caption-pointer"
                            data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:300,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                            data-x="left" data-y="middle" data-fontsize="['25', '25', '25', '30', '50']"
                            data-hoffset="['80','40', '40', '40', '20']" data-lineheight="inherit" data-color="#fff"
                            data-visibility="[&quot;on&quot;, &quot;on&quot;, &quot;on&quot;, &quot;on&quot;, &quot;off&quot;]"
                            data-actions="[{
                                &quot;event&quot;: &quot;click&quot;, 
                                &quot;action&quot;: &quot;jumptoslide&quot;, 
                                &quot;slide&quot;: &quot;previous&quot;, 
                                &quot;delay&quot;: &quot;0&quot;
                            }]">
                            <span class="lnr lnr-arrow-left"></span>
                        </div>
                        <div class="tp-caption tp-resizeme caption-pointer"
                            data-frames="[{&quot;delay&quot;:0,&quot;speed&quot;:300,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;auto:auto;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]"
                            data-x="right" data-y="middle" data-fontsize="['25', '25', '25', '30', '50']"
                            data-hoffset="['80','40', '40', '40', '20']" data-lineheight="inherit" data-color="#fff"
                            data-visibility="[&quot;on&quot;, &quot;on&quot;, &quot;on&quot;, &quot;on&quot;, &quot;off&quot;]"
                            data-actions="[{
                                &quot;event&quot;: &quot;click&quot;, 
                                &quot;action&quot;: &quot;jumptoslide&quot;, 
                                &quot;slide&quot;: &quot;next&quot;, 
                                &quot;delay&quot;: &quot;0&quot;
                            }]">
                            <span class="lnr lnr-arrow-right"></span>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

    <section class="section-primary gallery">
        <div class="container">
            <div class="section-header">
                <h2><?=$page['title']?></h2>
                <span>~ <?=$page['tag_line']?> ~</span>
            </div>

            <div class="row">
                <?php foreach ($gallery as $key => $photo): ?>
                    <?php if ($photo['type'] == 'mariage'): ?>
                        <div class="col-md-3">
                            <a href="<?=UPLOADS.$photo['image']?>" class="image-holder" target="_blank">
                                <div class="gallery-img"><img src="<?=UPLOADS.$photo['image']?>"></div><!-- /gallery-img -->
                                <div class="frame"></div>
                                <div class="inner">
                                    <div class="info">
                                        <h6>Click</h6>
                                        <span>View Full</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div><!-- /row -->

            <div class="row">
                <div class="col-md-12 pl-md-0">
                    <div class="about-us-col">
                        <p><?=$page['detail']?></p>
                    </div>
                </div>
            </div><!-- /row -->

        </div><!-- /container -->
    </section>

    <?php if ($services): ?>
        <section class="about-us">
            <div class="container">
                <?php foreach ($services as $key => $service): ?>
                    <?php if ($service['type'] != 'mariage'): ?>
                        <?php continue; ?>
                    <?php endif ?>
                    <?php if ($key%2==0): ?>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-6 pr-md-0">
                                <div class="image-holder">
                                    <img src="<?=UPLOADS.$service['image']?>" alt="About Us">
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-0">
                                <div class="about-us-col">
                                    <div class="section-header">
                                        <h2><?=$service['title']?></h2>
                                    </div>
                                    <p><?=$service['detail']?></p>
                                </div>
                            </div>
                        </div><!-- /row -->
                    <?php else: ?>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col-md-6 pr-md-0">
                                <div class="about-us-col">
                                    <div class="section-header">
                                        <h2><?=$service['title']?></h2>
                                    </div>
                                    <p><?=$service['detail']?></p>
                                </div>
                            </div>
                            <div class="col-md-6 pl-md-0">
                                <div class="image-holder">
                                    <img src="<?=UPLOADS.$service['image']?>" alt="About Us">
                                </div>
                            </div>
                        </div><!-- /row -->
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </section>
    <?php endif ?>


    <section class="section-primary section-form pb-120">
        <div class="container">
            <div class="section-header">
                <h2>Book a marige event</h2>
                <span>~ Check out our place ~</span>
            </div>
            <form id="reservation-form">
                <input type="hidden" name="type" value="mariage">
                <div class="form-inner">
                    <div class="form-col">
                        <div class="form-holder">
                            <select name="people" class="form-control" required data-language="en">
                                <option value="20 people" selected>20 people</option>
                                <option value="30 people">30 people</option>
                                <option value="40 people">40 people</option>
                                <option value="50 people">50 people</option>
                                <option value="60 people">60 people</option>
                                <option value="70 people">70 people</option>
                                <option value="80 people">80 people</option>
                                <option value="90 people">90 people</option>
                                <option value="100 people">100 people</option>
                                <option value="100 people+">100 people+</option>
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
                    <button class="au-btn round au-btn--hover has-bg" type="submit">Book now</button>
                </div>
            </form>
        </div>
    </section>



</main>