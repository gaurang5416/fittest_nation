
<div class="banner-section bg-black text-white">
	<div class="container">
		<div class="home-carousel owl-carousel owl-theme">
			<?php if (count($banners) > 0) { ?>
				<?php foreach ($banners as $var) { ?>
					<div class="item">
						<div class="banner-main position-relative">
							<?php if ($var['type'] === 'video') { ?>
								<video id="video" controls autoplay>
									<source src="<?php echo base_url(); ?>admin/upload/<?= $var['media'] ?>" type="video/mp4" autoplay>
								</video>
							<?php } else { ?>
								<img src="<?php echo base_url(); ?>admin/upload/<?= $var['media'] ?>" alt="img"
									 class="img-fluid">
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			<?php } else { ?>
				<div class="item">
					<div class="banner-main position-relative">
						<div class="banner-content"><span
									class="new-tag mb-4 wow fadeInDownBig">                    <small>New</small> High Intensity workout to burn calories                </span>
							<h1 class="wow fadeInLeftBig"> Cardio<br>Exercise </h1>
							<p class="wow fadeInLeftBig"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
								do
								eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<div class="banner-btn-div wow fadeInLeftBig"><a
										href="#" class="btn btn-primary mx-1"> Get
									Started </a> <a href="#" class="btn btn-primary"> Preview </a></div>
						</div>
						<div class="banner-right-div wow fadeInRightBig">
							<div class="banner-img"><img src="<?php echo base_url(); ?>assets/img/banner-img.png"
														 alt="img"
														 class="img-fluid"></div>
							<div class="time-card-div">
								<div class="timecard"><h3 class="text-yellow">38:14</h3>
									<p>TIME</p></div>
								<div class="timecard"><h3 class="text-pink">165</h3>
									<p>EST CALORIES</p></div>
							</div>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="banner-main position-relative">
						<div class="banner-content"><span
									class="new-tag mb-4 wow fadeInDownBig">                    <small>New</small> High Intensity workout to burn calories                </span>
							<h1 class="wow fadeInLeftBig"> Cardio<br>Exercise </h1>
							<p class="wow fadeInLeftBig"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
								do
								eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
							<div class="banner-btn-div wow fadeInLeftBig"><a
										href="#" class="btn btn-primary mx-1"> Get
									Started </a> <a href="#" class="btn btn-primary"> Preview </a></div>
						</div>
						<div class="banner-right-div wow fadeInRightBig">
							<div class="banner-img"><img src="assets/img/banner-img.png" alt="img" class="img-fluid">
							</div>
							<div class="time-card-div">
								<div class="timecard"><h3 class="text-yellow">38:14</h3>
									<p>TIME</p></div>
								<div class="timecard"><h3 class="text-pink">165</h3>
									<p>EST CALORIES</p></div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div><!-- Banner end --><!-- Popular Exercises section start -->
<div class="popular-exercise-section default-padding">
	<div class="container">
		<div class="row mb-5 wow fadeInDown">
			<div class="col-7">
				<div class="section-title"><h2>Classes</h2></div>
			</div>
			<div class="col-5 text-end"><a href="<?php echo base_url(); ?>classes"
										   class="see-more-btn text-uppercase">
					See More </a></div>
		</div>
		<div class="row">
			<?php if (count($popular_classes) > 0) { ?>
				<?php foreach ($popular_classes as $var) { ?>
					<div class="col-sm-6 col-md-4 wow fadeInUp">
						<a href="<?php echo base_url(); ?>classes">
							<div class="exercise-card">
								<div class="exe-card-img">
									<img src="<?php echo base_url(); ?>admin/upload/<?= json_decode($var['image'])[0] ?>"
										 onerror="this.src='<?php echo base_url(); ?>admin/img/not_found.png';"
										 alt="img" class="img-fluid">
<!--									<span class="timespan">58:24</span>-->
								</div>
								<div class="exe-footer">
									<h1><?= $var['class_name'] ?></h1>
<!--									<p class="text-sec"> 250 est calories </p>-->
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			<?php } else { ?>
				<div class="col-sm-6 col-md-4 wow fadeInUp"><a href="<?php echo base_url(); ?>classes">
						<div class="exercise-card">
							<div class="exe-card-img"><img src="<?php echo base_url(); ?>assets/img/pe-1.png" alt="img"
														   class="img-fluid"> <span class="timespan">                                    58:24                                </span>
							</div>
							<div class="exe-footer"><h1>Treadmill</h1>
								<p class="text-sec"> 250 est calories </p></div>
						</div>
					</a></div>
				<div class="col-sm-6 col-md-4 wow fadeInUp"><a href="<?php echo base_url(); ?>classes">
						<div class="exercise-card">
							<div class="exe-card-img"><img src="<?php echo base_url(); ?>assets/img/pe-2.png" alt="img"
														   class="img-fluid"> <span class="timespan">                                    58:24                                </span>
							</div>
							<div class="exe-footer"><h1>Stretching</h1>
								<p class="text-sec"> 250 est calories </p></div>
						</div>
					</a></div>
				<div class="col-sm-6 col-md-4 wow fadeInUp"><a href="<?php echo base_url(); ?>classes">
						<div class="exercise-card">
							<div class="exe-card-img"><img src="<?php echo base_url(); ?>assets/img/pe-3.png" alt="img"
														   class="img-fluid"> <span class="timespan">                                    58:24                                </span>
							</div>
							<div class="exe-footer"><h1>Yoga</h1>
								<p class="text-sec"> 250 est calories </p></div>
						</div>
					</a></div>
				<div class="col-sm-6 col-md-4 wow fadeInUp"><a href="<?php echo base_url(); ?>classes">
						<div class="exercise-card">
							<div class="exe-card-img"><img src="<?php echo base_url(); ?>assets/img/pe-4.png" alt="img"
														   class="img-fluid"> <span class="timespan">                                    58:24                                </span>
							</div>
							<div class="exe-footer"><h1>Running</h1>
								<p class="text-sec"> 250 est calories </p></div>
						</div>
					</a></div>
				<div class="col-sm-6 col-md-4 wow fadeInUp"><a href="<?php echo base_url(); ?>classes">
						<div class="exercise-card">
							<div class="exe-card-img"><img src="<?php echo base_url(); ?>assets/img/pe-5.png" alt="img"
														   class="img-fluid"> <span class="timespan">                                    58:24                                </span>
							</div>
							<div class="exe-footer"><h1>Lifting</h1>
								<p class="text-sec"> 250 est calories </p></div>
						</div>
					</a></div>
				<div class="col-sm-6 col-md-4 wow fadeInUp"><a href="<?php echo base_url(); ?>classes">
						<div class="exercise-card">
							<div class="exe-card-img"><img src="<?php echo base_url(); ?>assets/img/pe-6.png" alt="img"
														   class="img-fluid"> <span class="timespan">                                    58:24                                </span>
							</div>
							<div class="exe-footer"><h1>PushUp</h1>
								<p class="text-sec"> 250 est calories </p></div>
						</div>
					</a></div>
			<?php } ?>
		</div>
	</div>
</div><!-- Popular Exercises section End --><!-- Work Out Section start -->
<div class="workout-section">
	<div class="container">
		<div class="workoutdiv wow default-padding">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-5 col-xl-4">
					<div class="work-left-div wow fadeInLeftBig"><h1> Workout<br> Program<br> Made<br> For You </h1>
					</div>
				</div>
				<div class="col-md-6 col-lg-7 col-xl-8">
					<div class="work-right-div wow fadeInRightBig"><p class="text-sec"> Lorem ipsum dolor sit amet,
							consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
							aliqua consectetur adipiscing. </p>
						<div class="workbtndiv"><a href="<?php echo base_url(); ?>personal_trainer"
												   class="btn btn-primary"> Get Started </a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="workoutimg wow fadeInUp"><img src="<?php echo base_url(); ?>assets/img/workprogram-img.png"
												  alt="img" class="img-fluid"></div>
	</div>
</div><!-- Work Out Section end --><!-- About us Section start -->
<div class="aboutus-section default-padding">
	<div class="container">
		<div class="about-div bg-sec">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="about-content wow fadeinleft">
						<?php if ($about_us !== '') { ?>

							<?= $about_us ?>

						<?php } else { ?>

							<h1 class="mb-3">About Us</h1>
							<p class="text-sec mb-4">We believe that the Gym is not only a place
								to train but also where we make new friends,
								meet new people, and gain knowledge
								regarding the concept of fitness.
								Our way of thinking outside the box is what
								differs us and makes us special. Since we
								believe that limiting the human mind builds
								mental as well as physical chains. Therefore,
								creating new ways and being open minded
								to new experiences, being open to change,
								or embracing new ideas is what creates the
								ideal base for a gym. In addition to gathering
								a community for years to come.
								Because together we can achieve more. And
								together we can be more. Since without a
								community there is no "WE".</p>
							<div class="aboutbtndiv"><a href="#" class="btn btn-primary"> Get Started </a>
							</div>

						<?php } ?>

					</div>
				</div>
				<div class="col-md-6">
					<div class="about-img wow fadeInRight"><img src="<?php echo base_url(); ?>assets/img/about-img.png"
																alt="img" class="img-fluid"></div>
				</div>
			</div>
		</div>
	</div>
</div><!-- About us Section end --><!-- Talk to Us start -->
<div class="talktous-section default-padding wow fadeInUp">
	<div class="container">
		<div class="talktous-div bg-sec text-center py-5">
			<h1 class="mb-3">Talk To us Now</h1>
			<a href="#" class="btn btn-primary"><img src="<?= base_url(); ?>assets/img/whatsapp.svg" width="30"> <?=$office_number ?> </a>
		</div>
	</div>
</div><!-- Talk to Us End -->
