<!DOCTYPE html>
<html dir="ltr" lang="es-Es">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="Abcdigital"/>

    <!-- Stylesheets
          ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Palanquin|Palanquin+Dark" rel="stylesheet">
    <link rel="shortcut icon" href="<?= URL_TEMPLATEFRONTNEW; ?>img/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/style.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/swiper.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/dark.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/font-icons.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/magnific-popup.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/calendar.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEFRONTNEW; ?>css/responsive.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Document Title
          ============================================= -->
    <title><?= SITE_NAME; ?></title>
</head>

<body class="stretched">

<!-- Document Wrapper
      ============================================= -->
<div id="wrapper" class="clearfix">


    <!-- Header
            ============================================= -->
    <header id="header" class="dark">
        <div id="header-wrap">
            <div class="container clearfix">

                <!-- Logo
                              ============================================= -->
                <div id="logo"><a href="<?= ROOT_URL; ?>" class="standard-logo"
                                  data-dark-logo="<?= URL_TEMPLATEFRONTNEW; ?>images/logo-web.png"><img
                                src="<?= URL_TEMPLATEFRONTNEW; ?>images/logo-web.png" alt="Canvas Logo"></a> <a
                            href="index.php" class="retina-logo"
                            data-dark-logo="<?= URL_TEMPLATEFRONTNEW; ?>images/logo-web@x2.png"><img
                                src="<?= URL_TEMPLATEFRONTNEW; ?>images/logo-web@x2.png" alt="CreativeAltar"></a></div>
                <!-- #logo end -->

                <!-- Primary Navigation
                              ============================================= -->


            </div>
        </div>
    </header>
    <!-- #header end -->

    <!-- *************************************************************** -->

    <section id="content" class="seccionapara">
        <div class="container">

            <h1 class=" center textocentral">¡PRONTO ESTAREMOS LISTOS!</h1>
            <div class="col-md-6 center">
                <form id="form_preregister" name="register-form" class="nobottommargin"
                      onsubmit=" return savePre_register();">

                    <div class="clear"></div>


                    <div class="col_full">
                        <input type="text" name="firstName" id="firstName" class="form-control center"
                               placeholder="Nombre(s)" required="" autofocus="">
                    </div>
                    <div class="col_full">
                        <input type="text" name="lastName" id="lastName" class="form-control center"
                              placeholder="Apellidos" required="" autofocus="">
                    </div>
                    <div class="col_full">
                        <input type="email" name="email" id="email" class="form-control center" placeholder="Correo"
                               required="">
                    </div>
                    <div class="col_full" style="color: white;">
                        <input type="checkbox" class="checkbox_noti" id="contributor" name="contributor" value="1">&nbsp;&nbsp;Deseas
                        contribuir tus videos?
                    </div>
                    <div id="hidenBox" style="display: none;">
                        <div class="col_full">
                            <select class="form-control center" id="con_country" name="con_country">
                                <?= $contrys; ?>
                            </select>
                        </div>
                        <div class="col_full">
                            <input type="text" name="con_question1" id="con_question1" class="form-control center"
                                   placeholder="¿Tienes videos ya hechos o piensas crear nuevos? " autofocus="">
                        </div>
                        <div class="col_full">
                            <textarea rows="2" class="form-control center" placeholder="Links o ejemplos a tu trabajo"
                                      name="con_question2" id="con_question2" autofocus=""></textarea>
                        </div>
                        <div class="col_full">
                            <input type="text" name="con_question3" id="con_question3" class="form-control center"
                                   placeholder="¿Puedes crear contenido en ambos español e ingles?" autofocus="">
                        </div>
                        <div class="col_full">
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-sm-offset-2 col-md-offset-2 centrado-porcentual">
                        <?= $widget; ?>
                        <?= $script; ?>
                    </div>
                    <div class="clear"></div>
                    <div style="color: white;">
                        <input type="checkbox" class="checkbox_noti" id="notified" name="notified" checked="">&nbsp;&nbsp;Recibir
                        Notificaciones
                    </div>
                    <input type="hidden" name="checkbox" id="check_notificaciones" value="true">
                    <div class="col_full nobottommargin">
                        <button class="button button-3d button-gray nomargin" id="register-form-submit"
                                name="register-form-submit" value="register">SUSCRIBIRME
                        </button>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <video class="col_full videocentrtal"
                       src="http://altarcreativo.com/application/modules/altar/views/include/newTemplate2/videos/changetheworld.mp4"
                       controls="" autoplay=""></video>
            </div>


        </div>
    </section>


    <!-- *************************************************************** -->


    <!-- Footer
            ============================================= -->
    <footer id="footer" class="dark">
        <div class="container">

            <!-- Footer Widgets
                        ============================================= -->
            <div class="footer-widgets-wrap clearfix">

                <div class="col-md-12 col-sm-12 col-xs-12 center">
                    <div class="widget clearfix">
                        <h4>Síguenos</h4>
                        <div class="row">

                            <div class="redes">

                                <div class="col-md-2 clearfix bottommargin-sm"><a href="#"
                                                                                  class="social-icon si-light nobottommargin rightmargin-sm"><i
                                                class="icon-facebook"></i> <i class="icon-facebook"></i> </a></div>
                                <div class="col-md-2 clearfix bottommargin-sm"><a href="#"
                                                                                  class="social-icon si-light nobottommargin  rightmargin-sm"><i
                                                class="icon-twitter"></i> <i class="icon-twitter"></i> </a></div>
                                <div class="col-md-2 clearfix bottommargin-sm"><a href="#"
                                                                                  class="social-icon si-light nobottommargin  rightmargin-sm"><i
                                                class="icon-instagram"></i> <i class="icon-instagram"></i> </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .footer-widgets-wrap end -->

        </div>

        <!-- Copyrights
                  ============================================= -->
        <div id="copyrights">
            <div class="container clearfix">
                <div class="col_full center footer_creativealtar light"> &copy; 2017 Creative Altar. Todos los derechos
                    Reservados | Realizado por ABC <a href="https://abcdigital.mx/" target="_blank"> Digital Diseño
                        Web</a> y <a href="https://abcdigital.mx/" target="_blank"> Agencia de Redes Sociales</a><br>
                </div>
            </div>
        </div>
        <!-- #copyrights end -->

    </footer>
    <!-- #footer end -->

</div>
<!-- #wrapper end -->

<!-- Go To Top
      ============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
      ============================================= -->
<script type="text/javascript" src="<?= URL_TEMPLATEFRONTNEW; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?= URL_TEMPLATEFRONTNEW; ?>js/plugins.js"></script>

<!-- Footer Scripts
      ============================================= -->
<script type="text/javascript" src="<?= URL_TEMPLATEFRONTNEW; ?>js/functions.js"></script>
<script type="text/javascript" src="<?= VIEW_FRONT; ?>include/js/configuration.js"></script>
<script type="text/javascript" src="<?= VIEW_FRONT; ?>include/js/script_registro.js"></script>
<script type="text/javascript">

    jQuery(window).load(function () {

        var $container = $('#demo-gallery');
        $('#portfolio-filter a').click(function () {
            $('#portfolio-filter li').removeClass('activeFilter');
            $(this).parent('li').addClass('activeFilter');
            var selector = $(this).attr('data-filter');
            $container.isotope({filter: selector});
            return false;
        });

    });

    setTimeout(function () {
        window.location.href = '<?= ROOT_URL; ?>';

    }, 10000);



</script>
</body>
</html>