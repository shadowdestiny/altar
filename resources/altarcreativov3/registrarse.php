<?php include("includes/header.php"); ?>


		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Registrarme</h1>
				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					

					<div class="col_two_third nobottommargin">


						<h3>Registrate ahora</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, vel odio non dicta provident sint ex autem mollitia dolorem illum repellat ipsum aliquid illo similique sapiente fugiat minus ratione.</p>

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
								<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Registrarme</button>
							</div>

						</form>

					</div>
					<div class="col_one_third col_last  nobottommargin">

						<div class="well well-lg nobottommargin">
							<form id="login-form" name="login-form" class="nobottommargin" action="micuenta.php" method="post">

								<h3>Si ya tienes cuenta, Ingresa ahora</h3>

								<div class="col_full">
									<label for="login-form-username">Correo:</label>
									<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="login-form-password">Contraseña:</label>
									<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
								</div>

								<div class="col_full nobottommargin">
									<button class="button button-3d nomargin" id="login-form-submit" name="login-form-submit" value="login">Ingresar</button>
									<a href="olvidasteconstrasena.php" class="fright">¿Olvidaste tu contraseña?</a>
								</div>

							</form>
						</div>

					</div>

				</div>

			</div>

		</section><!-- #content end -->

	  <?php include("includes/footer.php"); ?>
