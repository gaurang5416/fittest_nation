<footer class="main-footer wow fadeInUp">
    <div class="container">
        <div class="footer-about">
            <div class="footer-logo mb-3">
				<?php $gym_logo = $this->Setting_Model->get_setting_by_key('gym_logo'); ?>
				<img src="<?php echo base_url(); ?>admin/upload/<?= $gym_logo ?>"
					 onerror="this.src='<?php echo base_url(); ?>assets/img/logo.png';"
					 alt="img">
			</div>
            <p class="footerabouttext"> Design amazing digital experiences that create more happy in the world. </p>
            <ul class="footer-link my-4">
                <li><a href="<?php echo base_url(); ?>classes">Classes</a></li>
                <li><a href="<?php echo base_url(); ?>trainers">Trainers</a></li>
                <li><a href="<?php echo base_url(); ?>membership">Memberships</a></li>
                <li><a href="<?php echo base_url(); ?>login">Login</a></li>
                <li><a href="<?php echo base_url(); ?>privacy_policy">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-6"><p> © 2022 TripleFive. All rights reserved. </p></div>
                <div class="col-md-6">
                    <div class="footer-social">
                        <ul class="social-ul">
                            <li><a href="#"> <i class="fab fa-twitter"></i> </a></li>
                            <li><a href="#"> <i class="fab fa-linkedin"></i> </a></li>
                            <li><a href="#"> <i class="fab fa-facebook"></i> </a></li>
                            <li><a href="#"> <i class="fab fa-instagram"></i> </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer></div></body>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.6.0.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/baguetteBox.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.js"></script>
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script></html>
<script>
	$(".flash_error").fadeIn(1000).fadeOut(10000);
</script>
