<!-- Banner start -->

<?php if (isset($class_detail) && $class_detail != '') { ?>
	<div class="page-banner pb-5">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-5">
					<?php echo form_open('add_to_cart'); ?>
					<input type="hidden" name="hidden_id" value="<?= $class_detail->id ?>">
					<input type="hidden" name="hidden_name" value="<?= $class_detail->class_name ?>">
					<input type="hidden" name="hidden_price" value="<?= $class_detail->class_fees ?>">
					<input type="hidden" name="hidden_type" value="class">
					<div class="page-banner-content wow fadeInLeftBig">
						<h1><?= $class_detail->class_name ?></h1>
						<h6 class="my-3"> <?= implode(', ', json_decode($class_detail->days)) . ' ' . $class_detail->start_time ?> </h6>
						<p><?= $class_detail->description ?></p>
						<button type="submit" class="btn btn-primary w-100 mt-4">Add to cart</button>
					</div>
					<?php echo form_close() ?>
				</div>
				<?php if ($class_detail->image !== '[]' && $class_detail->image != null) { ?>
					<div class="col-md-7">
						<div class="page-banner-img wow fadeInRightBig mt-5 mt-md-0">
							<div class="page-carousel owl-carousel owl-theme">
								<?php foreach (json_decode($class_detail->image) as $var) { ?>
									<div class="item">
										<div class="pb-img"><img src="<?= base_url(); ?>admin/upload/<?= $var ?>"
																 alt="img" class="img-fluid"></div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<div class="ready-section default-padding bg-primary-sec mt-3 wow fadeInUp">
	<div class="container">
		<div class="ready-content px-2 text-center"><h1 class="mb-3">ARE YOU READY FOR CHANGES?</h1><a href="#"
																									   class="btn btn-primary">
				Check our memberships? </a></div>
	</div>
</div><!-- Are ready section end --><!-- Pricing plan section start -->
<div id="Pricing-Div" class="pricing-section default-padding">
	<div class="container">
		<div class="row mb-5 wow fadeInDown">
			<div class="col-md-12">
				<div class="pricingtitle"><h6 class="text-primary">Pricing</h6>
					<h1> Simple, transparent pricing </h1>
					<p class="text-primary"> We believe Untitled should be accessible to all companies, no matter the
						size. </p></div>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php if (count($membership) > 0) { ?>
				<?php foreach ($membership as $var) { ?>
					<div class="col-md-4 col-md-6 col-lg-4">
						<?php echo form_open('add_to_cart'); ?>
						<div class="pricing-card mb-5 mb-sm-5 mb-md-0 wow fadeInLeft">
							<input type="hidden" name="hidden_id" value="<?= $var['id'] ?>">
							<input type="hidden" name="hidden_name" value="<?= $var['membership_label'] ?>">
							<input type="hidden" name="hidden_price" value="<?= $var['membership_amount'] ?>">
							<input type="hidden" name="hidden_type" value="membership">
							<div class="pricing-head">
								<h1 class="mb-3"> <?= $var['membership_amount'] ?>$/ <?= $var['membership_length'] ?>
									Days </h1>
								<h5> <?= $var['membership_label'] ?> </h5>
								<p> <?= $var['membership_class_limit'] ?> </p>
							</div>
							<div class="pricing-body">
								<ul class="pricing-list">
									<?= $var['membership_description'] ?>
								</ul>
							</div>
							<div class="pricing-footer">
								<button type="submit" class="btn btn-primary w-100">Add to cart</button>
							</div>
						</div>
						<?php echo form_close() ?>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</div><!-- Pricing plan section end --><!-- Popular Exercises section start -->

<!-- Popular Exercises section End --><!-- Talk to Us start -->
<div class="talktous-section default-padding wow fadeInUp">
	<div class="container">
		<div class="talktous-div bg-sec text-center py-5">
			<h1 class="mb-3">Talk To us Now</h1>
			<a href="#" class="btn btn-primary"><img src="<?= base_url(); ?>assets/img/whatsapp.svg"
													 width="30"> <?= $office_number ?> </a>
		</div>
	</div>
</div><!-- Talk to Us End -->

<div class="modal fade" id="myModal" role="dialog" style="color: black">
	<div class="modal-dialog">

		<!-- Modal content-->
		<?php echo form_open('membership_submit'); ?>
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Joining date</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" class="form-control membership_id" name="membership_id">
				<input type="date" class="form-control joining_date" name="joining_date" required>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
				<button type="button" class="btn btn-default" onclick="closeModal()">Close</button>
			</div>
		</div>
		<?php echo form_close() ?>

	</div>
</div>
