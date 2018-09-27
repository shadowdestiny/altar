<?php include("includes/header.php"); ?>


		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Carrito</h1>
				
			</div>

		</section><!-- #page-title end -->
		
		<div class="container">
		    <div class="style-msg successmsg">
							<div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Bien Hecho</strong> ¡Agregaste un video a tu carrito!</div>
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         </div>
		</div>
		
		

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="table-responsive bottommargin">

						<table class="table cart">
							<thead>
								<tr>
									<th class="cart-product-remove">&nbsp;</th>
									<th class="cart-product-thumbnail">&nbsp;</th>
									<th class="cart-product-name">Producto</th>
									<th class="cart-product-subtotal">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr class="cart_item">
									<td class="cart-product-remove">
										<a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
									</td>

									<td class="cart-product-thumbnail">
										<a href="producto.php"><img width="64" height="64" src="img/productos/1.jpg" alt="Pink Printed Dress"></a>
									</td>

									<td class="cart-product-name">
										<a href="producto.php">TU PERTENECES AQUÍ</a>
									</td>

									

									

									<td class="cart-product-subtotal">
										<span class="amount"><span class="signopesos">$</span>39.98</span>
									</td>
								</tr>
								<tr class="cart_item">
									<td class="cart-product-remove">
										<a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
									</td>

									<td class="cart-product-thumbnail">
										<a href="producto.php"><img width="64" height="64" src="img/productos/2.jpg" alt="Checked Canvas Shoes"></a>
									</td>

									<td class="cart-product-name">
										<a href="producto.php">TU PERTENECES AQUÍ</a>
									</td>

									
									

									<td class="cart-product-subtotal">
										<span class="amount"><span class="signopesos">$</span>24.99</span>
									</td>
								</tr>
								<tr class="cart_item">
									<td class="cart-product-remove">
										<a href="#" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
									</td>

									<td class="cart-product-thumbnail">
										<a href="producto.php"><img width="64" height="64" src="img/productos/3.jpg" alt="Pink Printed Dress"></a>
									</td>

									<td class="cart-product-name">
										<a href="producto.php">TU PERTENECES AQUÍ</a>
									</td>

						
									

									<td class="cart-product-subtotal">
										<span class="amount"><span class="signopesos">$</span>41.97</span>
									</td>
								</tr>
								<tr class="cart_item">
									<td colspan="6">
										<div class="row clearfix">
										
										<div class="row clearfix">
						<div class="col-md-6 clearfix">
							
						</div>

						<div class="col-md-6 clearfix">
							<div class="table-responsive">
								<h4>Total a pagar</h4>

								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Sub total</strong>
											</td>

											<td class="cart-product-name">
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
						</div>
					</div>
											<div class="col-md-4 col-xs-4 nopadding">
												<div class="col-md-8 col-xs-7 nopadding">
													<input type="text" value="" class="sm-form-control" placeholder="Ingresar código" />
												</div>
												
												<div class="col-md-4 col-xs-5">
													<a href="#" class="button button-3d button-black nomargin">Aplicar cupón</a>
												</div>
											</div>
											<div class="col-md-8 col-xs-7 nopadding">
												<a href="/creativealtar/categoria.php" class="button button-3d nomargin fright">Seguir comprando</a>
												<a href="pagar.php" class="button button-3d notopmargin fright">Pagar</a>
											</div>
										</div>
									</td>
								</tr>
							</tbody>

						</table>

					</div>

					

				</div>

			</div>

		</section><!-- #content end -->

 <?php include("includes/footer.php"); ?>
