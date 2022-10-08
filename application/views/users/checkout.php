<?php if (validation_errors() != false) { ?>
	<div class='alert alert-danger'><?= validation_errors(); ?></div>
<?php } ?>
<?php if (!$this->session->userdata('login')) { ?>
	<div class="already-account-div mt-4" xmlns="http://www.w3.org/1999/html">
		<p>
			Already have an account?
			<a href="<?php echo base_url(); ?>login">
				Log in
			</a>
		</p>
	</div>
<?php } ?>

<div class="checkout-section bg-primary-sec default-padding">
	<div class="container">
		<div class="form-div">
			<div class="form-head mb-5">
				<h1 class="mb-2">Checkout</h1>
				<p>Our friendly team would love to hear from you.</p>
			</div>
			<div class="form-body">
				<?php echo form_open('checkout_submit'); ?>
				<div class="row">
					<?php if (!$this->session->userdata('login')) { ?>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>First name</label>
								<input type="text" class="form-control" placeholder="First Name"
									   name="first_name" id="firstname">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Last name</label>
								<input type="text" class="form-control" placeholder="Last Name"
									   name="last_name" id="lastname">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="you@company.com"
									   name="email" id="email">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Phone number</label>
								<input type="text" class="form-control" placeholder="+965 123456789"
									   name="mobile" id="phonenumber">
							</div>
						</div>
					<?php } ?>
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>Joining date</label>
							<div class="icon-form-group">
								<input type="date" class="form-control" name="joining_date" placeholder="date"
									   id="joining_date" required>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>Need Personal Trainer?</label>
							<div class="custom-check trainer-check">
								<input type="checkbox" name="personal_trainer">
								<label>100 K.D /month</label>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12">
						<div class="form-group">
							<label>Payment Methord</label>
							<div class="pm-flex d-flex">
								<div class="custom-col">
									<div class="custom-check paycheck">
										<input type="radio" name="payment_method" value="Cash" checked>
										<label>Cash</label>
									</div>
								</div>
								<div class="custom-col">
									<div class="custom-check paycheck">
										<input type="radio" name="payment_method" value="K-NET">
										<label>K-NET</label>
									</div>
								</div>
								<div class="custom-col">
									<div class="custom-check paycheck">
										<input type="radio" name="payment_method" value="Card">
										<label>Visa/Credit Card</label>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-12">
						<div class="form-check customcheck">
							<input class="form-check-input" type="checkbox" value="" id="afreetermscheck" required>
							<label class="form-check-label" for="afreetermscheck">
								You agree to our Terms and conditions and privacy policy.
							</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="process-btn-div mt-4">
							<button type="submit" class="btn btn-primary w-100">Proceed to Pay</button>
						</div>
					</div>
				</div>
				<?php echo form_close() ?>
			</div>

		</div>
	</div>
</div>
