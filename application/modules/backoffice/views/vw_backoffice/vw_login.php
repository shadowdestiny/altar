<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= SITE_NAME; ?></title>

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

    <script>
        $ROOT_URL = '<?= ROOT_URL; ?>';
    </script>

</head>
<body class="bg-med">

<div id="login" class="container">
    <div class="row center-panel ">
        <div class="col-sm-6 col-md-4 col-md-offset-4 text-center">
            <div class="col-lg-12 gray-lighter-bg animated fadeInDown panel-body-only custom-check">
                <div class="avatar avatar-md">
                </div>
                <form class="form-signin" onsubmit="return validarUser();">
                    <input type="email" name="email" id="login_username" class="form-control" placeholder="Email"
                           required autofocus>
                    <input type="password" name="password" id="login_password" class="form-control"
                           placeholder="Password" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">
                        <span class="icon-user text-transparent"></span>&nbsp;&nbsp;&nbsp;Sign in
                    </button>
                </form>
                <span class="clearfix"></span>
            </div>
            </span>
            <div id="error_login"></div>
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