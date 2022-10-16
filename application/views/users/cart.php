<div class="checkout-section bg-primary-sec default-padding">
	<div class="container">
		<div class="form-div">
			<div class="form-head d-flex mb-3">
				<div>
					<h1 class="mb-2">My Cart</h1>
				</div>
			</div>
			<div class="billingme-div">
				<div class="billingme-body">
					<div class="table-responsive">
						<div align="right">
							<a href="remove_cart?action=clear"><b>Clear Cart</b></a>
						</div>
						<table class="table table-bordered text-white">
							<tr>
								<th width="40%">Item Name</th>
								<th width="20%">Price</th>
								<th width="5%">Action</th>
							</tr>
							<?php if (isset($_COOKIE["shopping_cart"])) {
								$total = 0;
								$cookie_data = stripslashes($_COOKIE['shopping_cart']);
								$cart_data = json_decode($cookie_data, true); ?>

								<?php if (count($cart_data) > 0) { ?>
									<?php foreach ($cart_data as $keys => $values) { ?>
										<tr>
											<td><?= $values["item_name"]; ?></td>
											<td><?= $values["item_price"]; ?> <?= $currency ?></td>
											<td>
												<a href="remove_cart?action=delete&id=<?= $values["id_type"]; ?>">
													<span class="text-danger">Remove</span>
												</a>
											</td>
										</tr>
										<?php $total = $total + ($values["item_price"]);
									} ?>
									<tr>
										<td colspan="2" align="right">Total</td>
										<td align="right"><?php echo number_format($total, 2); ?> <?= $currency ?></td>
									</tr>
								<?php } else { ?>
									<tr>
										<td colspan="3" align="center">No Item in Cart</td>
									</tr>
								<?php } ?>
							<?php } else { ?>
								<tr>
									<td colspan="3" align="center">No Item in Cart</td>
								</tr>
							<?php } ?>
						</table>

						<?php if (isset($_COOKIE["shopping_cart"]) && count($cart_data) > 0) { ?>
							<a href="<?php echo base_url(); ?>checkout" class="btn btn-primary w-100">Checkout</a>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
