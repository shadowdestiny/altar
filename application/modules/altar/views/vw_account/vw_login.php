<!DOCTYPE html>
<html dir="ltr" lang="es-ES">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="Abcdigital"/>

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>style.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/dark.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/font-icons.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/magnific-popup.css" type="text/css"/>

    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/responsive.css" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!--Meta para compartir Facebook-->
    <meta property="og:url" content="<?php
    if (isset($social_video_current_url) && $social_video_current_url != "") {
        echo $social_video_current_url;
    } else {
        echo ROOT_URL . "altar/creativealtar";
    } ?>"/>
    <meta property="og:image" content="<?php
    if (isset($social_video_image) && $social_video_image != "") {
        echo $social_video_image;
    } else {
        echo URL_ASSETS . "logos/10.jpg";
    } ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="<?php
    if (isset($social_video_title) && $social_video_title != "") {
        echo $social_video_title;
    } else {
        echo "Creative Altar";
    } ?>"/>
    <meta property="og:description" content="<?php
    if (isset($social_video_descript) && $social_video_descript != "") {
        echo $social_video_descript;
    } else {
        echo "Creative Altar";
    } ?>"/>


    <!--GOOGLE PLUS-->
    <meta property="og:title" content="<?php
    if (isset($social_video_title) && $social_video_title != "") {
        echo $social_video_title;
    } else {
        echo "Creative Altar";
    } ?>"/>

    <meta property="og:description" content="<?php
    if (isset($social_video_descript) && $social_video_descript != "") {
        echo $social_video_descript;
    } else {
        echo "Creative Altar";
    } ?>"/>
    <meta property="og:image" content="<?php
    if (isset($social_video_image) && $social_video_image != "") {
        echo $social_video_image;
    } else {
        echo URL_ASSETS . "logos/10.jpg";
    } ?>"/>


    <!--Meta para compartir  TWEETER datos en ALTAR-->

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="<?= TWITTER_DOMAIN; ?>">
    <meta name="twitter:title" content="<?php
    if (isset($social_video_title) && $social_video_title != "") {
        echo $social_video_title;
    } else {
        echo "Creative Altar";
    } ?>">
    <meta name="twitter:description"
          content="<?php
          if (isset($social_video_descript) && $social_video_descript != "") {
              echo $social_video_descript;
          } else {
              echo "Creative Altar";
          } ?>">
    <meta name="twitter:creator" content="<?= TWITTER_DOMAIN; ?>">
    <meta name="twitter:image" content="<?php
    if (isset($social_video_image) && $social_video_image != "") {
        echo $social_video_image;
    } else {
        echo URL_ASSETS . "logos/logoaltar.png";
    } ?>">
    <meta name="twitter:domain" content="<?= ROOT_URL; ?>">

    <!-- Document Title
    ============================================= -->
    <title><?= SITE_NAME; ?></title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap nopadding">

            <div class="section nopadding nomargin"
                 style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #071c2c;"></div>

            <div class="section nobg full-screen nopadding nomargin">
                <div class="container vertical-middle divcenter clearfix">

                    <div class="row center">
                        <a href="<?= ROOT_URL; ?>" class="standard-logo"
                           data-dark-logo="<?= URL_TEMPLATEALTAR ?>images/logo-web-.png" style="width: 200px;"><img
                                    src="<?= URL_TEMPLATEALTAR ?>images/logo-web.png" alt="Canvas Logo"></a>
                    </div>

                    <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;background: #071C2C">
                        <div class="panel-body panel-login" style="padding: 23px;">
                            <form id="login-form" name="login-form" class="nobottommargin"
                                  onsubmit="return validateLogin();">
                                <h3><?= $this->lang->line('login_title') ?></h3>

                                <div class="col_full">
                                    <label for="login-form-username"><?= $this->lang->line('login_form_email') ?>
                                        </label>
                                    <input type="text" id="email" name="email" value=""
                                           class="form-control not-dark"/>
                                </div>

                                <div class="col_full">
                                    <label for="login-form-password"><?= $this->lang->line('login_form_pass') ?>
                                        </label>
                                    <input type="password" id="password" name="password" value=""
                                           class="form-control not-dark"/>
                                </div>

                                <div class="col_full nobottommargin">

                                    <a href="<?= ROOT_URL; ?>altar/Ctr_account/recovery"
                                       class="fright"><?= $this->lang->line('login_form_forget') ?></a>
                                </div>

                                <div class="clean"></div>

                                <br>
                                <br>

                                <div class="col_full">
                                    <button class="button button-3d button-black nomargin login-button" id="login-form-submit"
                                            name="login-form-submit"
                                            value="login"><?= $this->lang->line('login_form_button') ?>
                                    </button>
                                </div>
                            </form>

                            <!--<div class="line line-sm"></div>-->


                        </div>
                    </div>


                </div>
            </div>

        </div>

    </section><!-- #content end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="<?= URL_TEMPLATEALTAR ?>js/jquery.js"></script>
<script type="text/javascript" src="<?= URL_TEMPLATEALTAR ?>js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="<?= URL_TEMPLATEALTAR ?>js/functions.js"></script>

</body>
</html>