<?php if(validation_errors() != false){ ?>
	<div class='alert alert-danger'><?= validation_errors(); ?></div>
<?php }?>
<?php echo form_open('login_submit'); ?>

<div class="checkout-section bg-primary-sec default-padding">
	<div class="container">
		<div class="form-div">
			<div class="form-head d-flex mb-3">
				<div>
					<h1 class="mb-2">Login</h1>
				</div>
			</div>
			<div class="myform-div mb-5 border-bottom-0">
				<div class="form-body">
					<div class="row">
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="Enter Email"
									   name="email" id="email">
							</div>
						</div>
						<div class="col-12 col-sm-12">
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" placeholder="Enter Password"
									   name="password" id="password">
							</div>
						</div>
						<div class="col-12 col-sm-12 text-end">
							<div class="row">
								<div class="col-8 text-start">
									<a href="<?php echo base_url(); ?>register">Do not have an account yet?</a>
								</div>
								<div class="col-4">
									<a href="<?php echo base_url(); ?>forgot_password">Forgot Password</a>
								</div>
							</div>

						</div>
						<div class="col-md-12">
							<div class="process-btn-div mt-4">
								<button type="submit" class="btn btn-primary w-100">Login</button>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php echo form_close() ?>
