<div class="checkout-section bg-primary-sec default-padding">
	<div class="container">
		<div class="form-div">
			<div class="form-head d-flex mb-3">
				<div>
					<h1 class="mb-2">My Account</h1>
					<p>All your details and Settings here</p>
				</div>
				<a href="#" class="myeditbtn">
					<i class="fas fa-edit"></i>
				</a>
			</div>
			<div class="myform-div mb-5">
				<div class="form-body">
					<?php echo form_open('my_account'); ?>
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>First name</label>
								<input type="text" class="form-control" placeholder="First Name" id="firstname" name="first_name" required
									   value="<?= $user_data['first_name'] ?>">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Last name</label>
								<input type="text" class="form-control" placeholder="Last Name" id="lastname" name="last_name" required
									   value="<?= $user_data['last_name'] ?>">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="you@company.com" id="email" name="email" readonly
									   value="<?= $user_data['email'] ?>">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Phone number</label>
								<input type="text" class="form-control" placeholder="+965 123456789" id="phonenumber" name="mobile" required
									   value="<?= $user_data['mobile'] ?>">
							</div>
						</div>
						<div class="col-md-12">
							<div class="process-btn-div mt-4">
								<button type="submit" class="btn btn-primary w-100">Save Details</button>
							</div>
						</div>
					</div>
					<?php echo form_close() ?>
				</div>
			</div>
			<div class="billingme-div">
				<div class="form-head mb-3">
					<h1 class="mb-2">Billings & Memberships</h1>
					<p>Billings and Memberships details here</p>
				</div>
				<div class="billingme-body">
					<?php if (count($membership_history) > 0) { ?>
						<?php foreach ($membership_history as $var) { ?>
							<div class="billing-card">
								<div class="bhead"><h5><?= $var->membership_label?> (Membership)</h5></div>
								<div class="bbody">
									<div class="row">
										<div class="col-5"><p>Booking Date :</p></div>
										<div class="col-7"><p class="text-end"><?= $var->created_date?></p></div>
									</div>
									<div class="row">
										<div class="col-5"><p>Price :</p></div>
										<div class="col-7"><p class="text-end"><?= $var->membership_amount?> <?= $currency ?></p></div>
									</div>
									<div class="row">
										<div class="col-5"><p>Paid By :</p></div>
										<div class="col-7"><p class="text-end"><?= $var->payment_method ? $var->payment_method : '-' ?></p></div>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
					<?php if (count($classes_history) > 0) { ?>
						<?php foreach ($classes_history as $var) { ?>
							<div class="billing-card">
								<div class="bhead"><h5><?= $var->class_name?> (Individual Classes)</h5></div>
								<div class="bbody">
									<div class="row">
										<div class="col-5"><p>Booking Date :</p></div>
										<div class="col-7"><p class="text-end"><?= $var->booking_date?></p></div>
									</div>
									<div class="row">
										<div class="col-5"><p>Price :</p></div>
										<div class="col-7"><p class="text-end"><?= $var->class_fees?> <?= $currency ?></p></div>
									</div>
									<div class="row">
										<div class="col-5"><p>Paid By :</p></div>
										<div class="col-7"><p class="text-end"><?= $var->payment_by ? $var->payment_by : '-'?></p></div>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
