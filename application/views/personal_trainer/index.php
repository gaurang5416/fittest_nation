<!-- Are ready section start -->
<div class="ready-section default-padding bg-primary-sec mt-3 wow fadeInUp">
    <div class="container">
        <div class="ready-content px-2 text-center"><h1 class="mb-3">ARE YOU READY FOR CHANGES?</h1>            <a
                    href="#" class="btn btn-primary"> Check our memberships? </a></div>
    </div>
</div><!-- Are ready section end --><!-- Personal Trainer section start -->
<div class="personal-trainer-section default-padding">
    <div class="container">
        <div class="row mb-5 wow fadeInDown">
            <div class="col-12">
                <div class="section-title"><h2>Our Personal Trainers</h2></div>
            </div>
        </div>
        <div class="row">
			<?php if (count($trainers) > 0) { ?>
				<?php foreach ($trainers as $var) { ?>
					<div class="col-sm-6 col-md-4 wow fadeInUp"><a href="#">
							<div class="pt-card">
								<div class="exe-card-img">
									<img src="<?php echo base_url(); ?>admin/upload/<?= json_decode($var['image'])[0] ?>"
										 onerror="this.src='<?php echo base_url(); ?>admin/img/not_found.png';"
										 alt="img" class="img-fluid">
								</div>
								<div class="exe-footer"><h1><?= $var['first_name'] ?> <?= $var['last_name'] ?></h1>
									<?php
									$temp = json_decode($var['s_specialization']);
									$specialization = $this->db->select('*')->from('specialization')->where_in('id', $temp)->get()->result_array();
									$result = '';
									if(count($specialization) > 0) {
										foreach ($specialization as $val) {
											$result .= $val['name'] . ' | ';
										}
									}
									?>
									<p class="text-primary"> <?= rtrim($result, " |") ?> </p>
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			<?php } ?>
        </div>
    </div>
</div><!-- Personal Trainer section End --><!-- Pricing plan section start -->
<!--<div class="pricing-section default-padding">
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
            <div class="col-md-4 col-md-6 col-lg-4 pb-3">
                <div class="pricing-card mb-5 mb-sm-5 mb-md-0 wow fadeInLeft">
                    <div class="pricing-head"><h1 class="mb-3"> 10KD/day </h1>                        <h5> Basic
                            plan </h5>
                        <p> Billed annually. </p></div>
                    <div class="pricing-body">
                        <ul class="pricing-list">
                            <li>Access to all basic features</li>
                            <li>Basic reporting and analytics</li>
                            <li>Up to 10 individual users</li>
                            <li>20GB individual data each user</li>
                            <li>Basic chat and email support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer"><a href="#" class="btn btn-primary w-100"> Get Started </a></div>
                </div>
            </div>
            <div class="col-md-4 col-md-6 col-lg-4">
                <div class="pricing-card mb-4 mb-sm-3 mb-md-0 wow fadeInUp">
                    <div class="populartag wow fadeInRightBig"><img src="assets/img/popular-tag.svg" alt="img"
                                                                    class="img-fluid"></div>
                    <div class="pricing-head"><h1 class="mb-3"> 40KD/day </h1>                        <h5> Business
                            plan </h5>
                        <p> Billed annually. </p></div>
                    <div class="pricing-body">
                        <ul class="pricing-list">
                            <li>200+ integrations</li>
                            <li>Advanced reporting and analytics</li>
                            <li>Up to 20 individual users</li>
                            <li>40GB individual data each user</li>
                            <li>Priority chat and email support</li>
                        </ul>
                    </div>
                    <div class="pricing-footer"><a href="#" class="btn btn-primary w-100"> Get Started </a></div>
                </div>
            </div>
            <div class="col-md-4 col-md-6 col-lg-4">
                <div class="pricing-card mb-4 mb-sm-3 mt-md-4 mt-lg-0 wow fadeInLeft">
                    <div class="pricing-head"><h1 class="mb-3"> 450KD/day </h1>                        <h5> Enterprise
                            plan </h5>
                        <p> Billed annually. </p></div>
                    <div class="pricing-body">
                        <ul class="pricing-list">
                            <li>Advanced custom fields</li>
                            <li>Audit log and data history</li>
                            <li>Unlimited individual users</li>
                            <li>Unlimited individual data</li>
                            <li>Personalised+priotity service</li>
                        </ul>
                    </div>
                    <div class="pricing-footer"><a href="#" class="btn btn-primary w-100"> Get Started </a></div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!-- Pricing plan section end -->

<div class="talktous-section default-padding wow fadeInUp">
    <div class="container">
		<div class="talktous-div bg-sec text-center py-5">
			<h1 class="mb-3">Talk To us Now</h1>
			<a href="#" class="btn btn-primary"><img src="<?= base_url(); ?>assets/img/whatsapp.svg" width="30"> <?=$office_number ?> </a>
		</div>
    </div>
</div><!-- Talk to Us End -->
