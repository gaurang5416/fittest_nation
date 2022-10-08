
<?php if(validation_errors() != false){ ?>
	<div class='alert alert-danger'><?= validation_errors(); ?></div>
<?php }?>

<?php echo form_open('register_submit'); ?>

<div class="checkout-section bg-primary-sec default-padding">
    <div class="container">
        <div class="form-div">
            <div class="form-head d-flex mb-3">
                <div>
                    <h1 class="mb-2">Register</h1>
                </div>
            </div>
            <div class="myform-div mb-5 border-bottom-0">
                <div class="form-body">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>First Name</label>
								<input type="text" class="form-control" placeholder="Enter First Name"
									   value="<?= set_value('first_name');?>" required
									   name="first_name" id="firstname">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Last Name</label>
								<input type="text" class="form-control" placeholder="Enter Last Name"
									   value="<?= set_value('last_name');?>" required
									   name="last_name" id="lastname">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Mobile No.</label>
								<input type="text" class="form-control" placeholder="Enter Mobile No."
									   value="<?= set_value('mobile');?>" required
									   name="mobile"  id="mobileno">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="Enter Email"
									   value="<?= set_value('email');?>" required
									   name="email" id="email">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" placeholder="Enter Password"
									   name="password" id="password" required>
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" class="form-control" placeholder="Enter Confirm Password"
									   name="confirm_password" id="confirmpassword" required>
							</div>
						</div>
						<div class="col-md-12">
							<div class="process-btn-div mt-4">
								<button type="submit" class="btn btn-primary w-100">Register</button>
							</div>
						</div>
						<div class="col-12 col-sm-12 text-center mt-3">
							<a href="<?php echo base_url(); ?>login">Already have an account?</a>
						</div>
					</div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php echo form_close() ?>
