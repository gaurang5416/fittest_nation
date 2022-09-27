<!-- Are ready section start -->
<div class="ready-section default-padding bg-primary-sec mt-3 wow fadeInUp">
	<div class="container">
		<div class="ready-content px-2 text-center">
			<h1 class="mb-3">ARE YOU READY FOR CHANGES?</h1>
			<a href="#" class="btn btn-primary">
				Check our memberships?
			</a>
		</div>

	</div>
</div>
<!-- Are ready section end -->

<!-- Popular Exercises section start -->
<div class="popular-exercise-section default-padding">
	<div class="container">
		<div class="row mb-5 wow fadeInDown">
			<div class="col-12">
				<div class="section-title">
					<h2>Classes</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php if (count($classes) > 0) { ?>
				<?php foreach ($classes as $var) { ?>
					<div class="col-sm-6 col-md-4 wow fadeInUp">
						<a href=" <?php echo base_url(); ?>classes">
							<div class="exercise-card">
								<div class="exe-card-img">
									<img src="<?php echo base_url(); ?>admin/upload/<?= json_decode($var->image)[0] ?>"
										 onerror="this.src='<?php echo base_url(); ?>admin/img/not_found.png';"
										 alt="img" class="img-fluid">
<!--									<span class="timespan"> 58:24 </span>-->
								</div>
								<div class="exe-footer">
									<h1><?= $var->class_name ?></h1>
<!--									<p class="text-sec"> 250 est calories </p>-->
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="pagination-div mt-4">


					<nav aria-label="Page navigation">
						<ul class="pagination justify-content-md-end justify-content-center">

							<?php if (isset($links)) { ?>
								<?php echo $links ?>
							<?php } ?>

							<!--<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>-->
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Popular Exercises section End -->

<!-- Talk to Us start -->
<div class="talktous-section default-padding wow fadeInUp">
	<div class="container">
		<div class="talktous-div bg-sec text-center py-5">
			<h1 class="mb-3">Talk To us Now</h1>
			<a href="#" class="btn btn-primary">
				<img src="assets/img/whatsapp.svg" width="30"> <?=$office_number ?>
			</a>
		</div>
	</div>
</div>
<!-- Talk to Us End -->
