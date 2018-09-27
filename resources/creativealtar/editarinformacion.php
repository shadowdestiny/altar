<?php include("includes/header.php"); ?>


		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Editar información</h1>
				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					

					<div class="col-md-12 nobottommargin">



						<form id="register-form" name="register-form" class="nobottommargin" action="micuenta.php" method="post">

							<div class="col_half">
								<label for="register-form-name">Nombre:</label>
								<input type="text" id="register-form-name" name="register-form-name" value="" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="register-form-email">Email:</label>
								<input type="text" id="register-form-email" name="register-form-email" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="register-form-username">Usuario:</label>
								<input type="text" id="register-form-username" name="register-form-username" value="" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="register-form-phone">Teléfono:</label>
								<input type="text" id="register-form-phone" name="register-form-phone" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_half">
								<label for="register-form-password">Contraseña:</label>
								<input type="password" id="register-form-password" name="register-form-password" value="" class="form-control" />
							</div>

							<div class="col_half col_last">
								<label for="register-form-repassword">Confirmar contraseña</label>
								<input type="password" id="register-form-repassword" name="register-form-repassword" value="" class="form-control" />
							</div>

							<div class="clear"></div>

							<div class="col_full nobottommargin">
								<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Guardar</button>
							</div>

						</form>

					</div>
					

				</div>

			</div>

		</section><!-- #content end -->

	  <?php include("includes/footer.php"); ?>
