<!DOCTYPE html>
<html lang="en">
<head><title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="description" content="Yajman">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png" type="image/x-icon">
	<!-- Bootstrap Css -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">    <!-- Fontawesome Css -->
	<link href="<?php echo base_url(); ?>assets/css/fontawesome.css" rel="stylesheet">    <!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css">    <!-- Animate Css -->
	<link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/baguetteBox.min.css">    <!--Custom Css-->
	<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main-content">    <!-- Header start -->
	<header class="main-header wow fadeInDown">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">
				<a class="navbar-brand" href="<?php echo base_url(); ?>">
					<?php $gym_logo = $this->Setting_Model->get_setting_by_key('gym_logo'); ?>
					<img src="<?php echo base_url(); ?>admin/upload/<?= $gym_logo ?>"
						 onerror="this.src='<?php echo base_url(); ?>assets/img/logo.png';"
						 alt="img" class="img-fluid">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
						aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation"><i
						class="fas fa-bars"></i></button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
					<div class="menumaindiv">
						<ul class="navbar-nav navbar-nav-scroll">
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>classes">CLasses</a>
							</li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>membership">Membership</a>
							</li>
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>personal_trainer">Personal
									Trainer</a></li>
							<?php if ($this->session->userdata('login')) { ?>
								<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>my_account">My account</a></li>
								<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>logout">Logout</a></li>
							<?php } else { ?>
								<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>login">Login</a></li>
								<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>register">Register</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>    <!-- Header end -->

	<?php if ($this->session->flashdata('login_failed')) { ?>
		<div class='flash_error alert alert-danger'><?= $this->session->flashdata('login_failed') ?> </div>
		<?php unset($_SESSION['login_failed']); ?>
	<?php } ?>

	<?php if ($this->session->flashdata('user_registered')) { ?>
		<div class='flash_error alert alert-success'><?= $this->session->flashdata('user_registered') ?> </div>
		<?php unset($_SESSION['user_registered']); ?>
	<?php } ?>

	<?php if ($this->session->flashdata('user_logged_in')) { ?>
		<div class='flash_error alert alert-success'><?= $this->session->flashdata('user_logged_in') ?> </div>
		<?php unset($_SESSION['user_logged_in']); ?>
	<?php } ?>

	<?php if ($this->session->flashdata('save_membership')) { ?>
		<div class='flash_error alert alert-success'><?= $this->session->flashdata('save_membership') ?> </div>
		<?php unset($_SESSION['save_membership']); ?>
	<?php } ?>

	<?php if ($this->session->flashdata('already_buy_membership')) { ?>
		<div class='flash_error alert alert-warning'><?= $this->session->flashdata('already_buy_membership') ?> </div>
		<?php unset($_SESSION['already_buy_membership']); ?>
	<?php } ?>

	<?php if ($this->session->flashdata('profile_updated')) { ?>
		<div class='flash_error alert alert-success'><?= $this->session->flashdata('profile_updated') ?> </div>
		<?php unset($_SESSION['profile_updated']); ?>
	<?php } ?>
