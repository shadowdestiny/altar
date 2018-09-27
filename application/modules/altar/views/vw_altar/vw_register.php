<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Altar</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= URL_TEMPLATEBACK; ?>dist/css/bootstrap.css" rel="stylesheet">

    <!-- Boostrap Theme -->
    <link href="<?= URL_TEMPLATEBACK; ?>css/theme-base.css" rel="stylesheet">
    <link href="<?= URL_TEMPLATEBACK; ?>css/boostrap-overrides.css" rel="stylesheet">
    <link href="<?= URL_TEMPLATEBACK; ?>css/theme.css" rel="stylesheet">

    <!-- Ez mark-->
    <link rel="stylesheet" href="<?= URL_TEMPLATEBACK; ?>assets/css/ezmark.css">

    <!-- Font Awesome-->
    <link href="<?= URL_TEMPLATEBACK; ?>assets/css/font-awesome.css" rel="stylesheet">

    <!-- Animate-->
    <link href="<?= URL_TEMPLATEBACK; ?>assets/css/animate-custom.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="<?= URL_TEMPLATEBACK; ?>assets/js/jquery.js"></script>
    <script src="<?= URL_TEMPLATEBACK; ?>dist/js/bootstrap.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?= URL_TEMPLATEBACK; ?>assets/js/html5shiv.js"></script>
    <script src="<?= URL_TEMPLATEBACK; ?>assets/js/respond.min.js"></script>
    <![endif]-->

    <script src="<?= VIEW_BACK; ?>include/js/configuration.js"></script>

</head>
<body class="bg-med">

<div id="login" class="container">
    <div class="row center-panel ">
        <div class="col-sm-6 col-md-4 col-md-offset-4 text-center">
            <div class="col-lg-12 gray-lighter-bg animated fadeInDown panel-body-only custom-check">
                <div id="loading_form" style="display:    none;
                                            position:   fixed;
                                            z-index:    1000;
                                            top:        0;
                                            left:       0;
                                            height:     100%;
                                            width:      100%;
                                            background: rgba( 255, 255, 255, .8 )
                                                        url('http://i.stack.imgur.com/FhHRx.gif')
                                                        50% 50%
                                                        no-repeat;">
                </div>

                <form class="form-signin" id="form_preregister" onsubmit=" return savePre_register();">
                    <h1 class="text-center">Pre Registro</h1> <br>
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Nombre(s)"
                           required autofocus>
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Apellidos"
                           required autofocus>
                    <input type="email" name="email" id="email" class="form-control"
                           placeholder="Correo" required>

                    <?= $widget; ?>
                    <?= $script; ?>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        <span class="icon-user text-transparent"></span>&nbsp;&nbsp;&nbsp;Registrar
                    </button>
                    <label class="pull-left">
                        <input type="checkbox" class="checkbox_noti" id="notified" name="notified" checked>Recibir
                        Notificaciones
                    </label>

                    <input type="hidden" name="checkbox" id="check_notificaciones" value="true"/>


                    <a href="#" class="pull-right need-help">Need help? </a>
                </form>
                <span class="clearfix"></span>
            </div>
            <div id="message_preregister"></div>
        </div>
    </div>
</div>
<span class="clearfix">

        <!-- Plugins & Custom -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- EzMark -->
        <script src="<?= URL_TEMPLATEBACK; ?>assets/js/jquery.ezmark.js"></script>
        <script type="text/javascript">
			$(function () {
                $('.custom-check input').ezMark()
            });
		</script>

    <!-- Custom -->
		<script src="<?= URL_TEMPLATEBACK; ?>assets/js/script.js"></script>

  </span></body>
</html>