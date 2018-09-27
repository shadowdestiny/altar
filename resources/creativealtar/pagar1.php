<?php include("includes/header.php"); ?>


		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Pagar</h1>
				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_half">
						<div class="panel panel-default">
							<div class="panel-body">
								¿Soy Cliente? <a href="ingresar.php">Haga clic aquí para ingresar</a>
							</div>
						</div>
					</div>
					

					<div class="row clearfix">
						<div class="col-md-6">
							<h3>Información de compra</h3>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

							<form id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">

								<div class="col_half">
									<label for="billing-form-name">Nombre:</label>
									<input type="text" id="billing-form-name" name="billing-form-name" value="" class="sm-form-control" />
								</div>

								<div class="col_half col_last">
									<label for="billing-form-lname">Apellido:</label>
									<input type="text" id="billing-form-lname" name="billing-form-lname" value="" class="sm-form-control" />
								</div>

								<div class="clear"></div>

								<div class="col_full">
									<label for="billing-form-companyname">Nombre de la compañia:</label>
									<input type="text" id="billing-form-companyname" name="billing-form-companyname" value="" class="sm-form-control" />
								</div>

								<div class="col_full">
									<label for="billing-form-address">Dirección:</label>
									<input type="text" id="billing-form-address" name="billing-form-address" value="" class="sm-form-control" />
								</div>

								<div class="col_full">
									<input type="text" id="billing-form-address2" name="billing-form-adress" value="" class="sm-form-control" />
								</div>

								<div class="col_full">
									<label for="billing-form-city">Ciudad / Estado</label>
									<input type="text" id="billing-form-city" name="billing-form-city" value="" class="sm-form-control" />
								</div>

								<div class="col_half">
									<label for="billing-form-email">Email:</label>
									<input type="email" id="billing-form-email" name="billing-form-email" value="" class="sm-form-control" />
								</div>

								<div class="col_half col_last">
									<label for="billing-form-phone">Teléfono:</label>
									<input type="text" id="billing-form-phone" name="billing-form-phone" value="" class="sm-form-control" />
								</div>

							</form>
						</div>
						
						<div class="col-md-6">
							<div class="table-responsive clearfix">
								<h4>Tus compras</h4>

								<table class="table cart">
									<thead>
										<tr>
											<th class="cart-product-thumbnail">&nbsp;</th>
											<th class="cart-product-name">Producto</th>
											<th class="cart-product-subtotal">Total</th>
										</tr>
									</thead>
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-thumbnail">
												<a href="producto.php"><img width="64" height="64" src="img/productos/3.jpg" alt="Pink Printed Dress"></a>
											</td>

											<td class="cart-product-name">
												<a href="producto.php">YOU BELONG HERE</a>
											</td>

											

											<td class="cart-product-subtotal">
												<span class="amount">$39.98</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-thumbnail">
												<a href="producto.php"><img width="64" height="64" src="img/productos/2.jpg" alt="Checked Canvas Shoes"></a>
											</td>

											<td class="cart-product-name">
												<a href="producto.php">YOU BELONG HERE</a>
											</td>

											

											<td class="cart-product-subtotal">
												<span class="amount">$24.99</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-thumbnail">
												<a href="producto.php"><img width="64" height="64" src="img/productos/1.jpg" alt="Pink Printed Dress"></a>
											</td>

											<td class="cart-product-name">
												<a href="producto.php">YOU BELONG HERE</a>
											</td>


											<td class="cart-product-subtotal">
												<span class="amount">$41.97</span>
											</td>
										</tr>
									</tbody>

								</table>

							</div>
						</div>

						<div class="col-md-6">
							<div class="table-responsive">
								<h4>Total</h4>

								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="notopborder cart-product-name">
												<strong>Sub-total</strong>
											</td>

											<td class="notopborder cart-product-name">
												<span class="amount">$106.94</span>
											</td>
										</tr>
										
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount lead"><strong>$106.94</strong></span>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
							<div class="accordion clearfix">
								<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Transferencia bancaria directa</div>
								<div class="acc_content clearfix">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</div>

								    

								<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Paypal</div>
								<div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>
							</div>
							<a href="gracias.php" class="button button-3d fright">Pagar</a>
						</div>
					</div>
				</div>

			</div>

		</section><!-- #content end -->

		 <?php include("includes/footer.php"); ?>
