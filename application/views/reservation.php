<main>

        <section class="page-info set-bg" data-image-src="<?=IMG?>page-info-bg-2.jpg">
            <div class="section-header">
                <h1 class="text-white">Reservatoin</h1>
                <span>~ For the best location ~</span>
            </div>
        </section>

        <section class="section-primary section-form pb-120">
            <div class="container">
                <div class="section-header">
                    <h2>Book a table</h2>
                    <span>~ Check out our place ~</span>
                </div>
                <form id="reservation-form">
                    <div class="form-inner">
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