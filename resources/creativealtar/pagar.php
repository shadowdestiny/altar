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
							<div class="panel-body colorbtan">
                                ¿Soy Cliente?
                                <b class="change-lorder">  <a href="ingresar.php" style="color:#071c2c;">Haga clic aquí para ingresar</a></b>
							</div>
						</div>
					</div>
<style>	


                </style>
					<div class="row clearfix">
						<div class="col-md-6">
							<h3>Información de compra</h3>

							<p>Descripción detallada de la compra</p>

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
									<label for="billing-form-companyname">Usuario:</label>
									<input type="text" id="billing-form-companyname" name="billing-form-companyname" value="" class="sm-form-control" />
								</div>

								<div class="col_half">
									<label for="billing-form-email">Contraseña:</label>
									<input type="password" id="billing-form-email" name="billing-form-email" value="" class="sm-form-control" />
								</div>

								<div class="col_half col_last">
									<label for="billing-form-phone">Confirmar Contraseña</label>
									<input type="password" id="billing-form-phone" name="billing-form-phone" value="" class="sm-form-control" />

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
												<a href="producto.php">TU PERTENECES AQUÍ</a>
											</td>

											

											<td class="cart-product-subtotal">
												<span class="amount">$39.98 <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a></span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-thumbnail">
												<a href="producto.php"><img width="64" height="64" src="img/productos/2.jpg" alt="Checked Canvas Shoes"></a>
											</td>

											<td class="cart-product-name">
												<a href="producto.php">TU PERTENECES AQUÍ</a>
											</td>

											

											<td class="cart-product-subtotal">
												<span class="amount"><span class="signopesos">$</span>24.99 <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a> </span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-thumbnail">
												<a href="producto.php"><img width="64" height="64" src="img/productos/1.jpg" alt="Pink Printed Dress"></a>
											</td>

											<td class="cart-product-name">
												<a href="producto.php">TU PERTENECES AQUÍ</a>
											</td>


											<td class="cart-product-subtotal">
												<span class="amount"><span class="signopesos">$</span>41.97 <a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a></span>
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
												<span class="amount"><span class="signopesos">$</span>106.94</span>
											</td>
										</tr>
										
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount lead"><strong><span class="signopesos">$</span>106.94</strong></span>
											</td>
										</tr>
									</tbody>
								</table>

							</div>
							<div class="accordion clearfix">
								

								    

								<div class="acctitle"></div>
								<div class="acc_content clearfix">
                                       <img src="img/paypalpago.png" alt="" style="width:50%; float:right;">
                                </div>
							</div>
							<a href="gracias.php" class="button button-3d fright">Pagar</a>
						</div>
					</div>
				</div>

			</div>

		</section><!-- #content end -->

		 <?php include("includes/footer.php"); ?>
