<!DOCTYPE html>
<html dir="ltr" lang="es-Es">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109211837-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-109211837-1');
    </script>


    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="<?= SITE_NAME; ?>"/>


    <!--Meta para compartir Facebook-->
    <meta property="fb:app_id" content="<?= API_FACEBOOK; ?>"/>
    <meta property="og:image" content="<?php
    if (isset($social_video_image) && $social_video_image != "") {
        echo $social_video_image;
    } else {
        echo URL_ASSETS . "logos/10.jpg";
    } ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:description" content="<?php
    if (isset($social_video_descript) && $social_video_descript != "") {
        echo $social_video_descript;
    } else {
        echo SOCIAL_DESCRIPT_DEFAULT;
    } ?>"/>
    <meta property="og:url" content="<?php
    if (isset($social_video_current_url) && $social_video_current_url != "") {
        echo $social_video_current_url;
    } else {
        echo ROOT_URL . "altar/creativealtar";
    } ?>"/>
    <meta property="og:site_name" content="<?= SITE_NAME; ?>"/>
    <meta property="og:title" content="<?php
    if (isset($social_video_title) && $social_video_title != "") {
        echo $social_video_title;
    } else {
        echo SOCIAL_TITLE_DEFAULT;
    } ?>"/>

    <!--Meta para compartir  TWEETER datos en ALTAR-->

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="<?= TWITTER_DOMAIN; ?>">
    <meta name="twitter:creator" content="<?= TWITTER_DOMAIN; ?>">
    <meta name="twitter:title" content="<?php
    if (isset($social_video_title) && $social_video_title != "") {
        echo $social_video_title;
    } else {
        echo SOCIAL_TITLE_DEFAULT;
    } ?>">
    <meta name="twitter:description"
          content="<?php
          if (isset($social_video_descript) && $social_video_descript != "") {
              echo $social_video_descript;
          } else {
              echo SOCIAL_DESCRIPT_DEFAULT;
          } ?>">

    <meta name="twitter:image" content="<?php
    if (isset($social_video_image) && $social_video_image != "") {
        echo $social_video_image;
    } else {
        echo URL_ASSETS . "logos/logoaltar.png";
    } ?>">
    <meta name="twitter:domain" content="<?= ROOT_URL; ?>">

    <!-- Stylesheets
          ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Palanquin|Palanquin+Dark" rel="stylesheet">
    <link rel="shortcut icon" href="<?= URL_TEMPLATEALTAR ?>img/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/bootstrap.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>style.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/swiper.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/dark.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/font-icons.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/animate.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/magnific-popup.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/calendar.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet" href="<?= URL_TEMPLATEALTAR ?>css/responsive.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <link rel="stylesheet"
          href="<?= URL_TEMPLATEALTAR ?>includes/js/easy-autocomplete.min.css<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"
          type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>


    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>


    <!-- Document Title
          ============================================= -->
    <title><?= SITE_NAME; ?></title>
</head>

<body class="stretched" id="allBody">

<!-- Document Wrapper
      ============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Top Bar
            ============================================= -->

    <div id="top-bar" class="dark" style="display:none">
        <div class="container clearfix">
            <div class="col_half nobottommargin">

                <div id="logo"><a href="<?= ROOT_URL; ?>altar/creativealtar" class="standard-logo"
                                  data-dark-logo="<?= URL_TEMPLATEALTAR ?>images/logo-web.png"><img
                                src="<?= URL_TEMPLATEALTAR ?>images/logo-web.png" alt="Canvas Logo"></a> <a
                            href="<?= ROOT_URL; ?>altar/creativealtar" class="retina-logo"
                            data-dark-logo="<?= URL_TEMPLATEALTAR ?>images/logo-web@x2.png"><img
                                src="<?= URL_TEMPLATEALTAR ?>images/logo-web@x2.png" alt="CreativeAltar"></a></div>

                <!-- Top Links
                              ============================================= -->
                <!--<div class="top-links"><?/*= $this->lang->line('header__label_callus') */?> <a href="tel:12345678">1234
                        5678</a> | <?/*= $this->lang->line('header__label_email') */?> <a
                            href="mailto:info@creativealtar.com">info@creativealtar.com0</a>
                </div>-->
                <!-- .top-links end -->

            </div>

            <?php
            $params = $_SERVER['QUERY_STRING'];
            if (!empty($params)) {
                $current_url = current_url() . '?' . $params;
            } else {
                $current_url = current_url();
            }

            $lang = $this->session->userdata('Setlanguage');
            $color_es = "#FFF";
            $color_en = "#FFF";
            if ($lang == LANG_ES) {
                $color_es = "#FFCE00";
                $color_en = "#FFF";
            } elseif ($lang == LANG_EN) {
                $color_es = "#FFF";
                $color_en = "#FFCE00";
            }

            ?>

            <div class=" col_half fright col_last nobottommargin">
                <a href="<?= ROOT_URL; ?>altar/Ctr_changelanguage?method=<?= $current_url; ?>&lang=<?= LANG_ES ?>"
                   class="registros" style="color: <?= $color_es; ?>">
                    <?= $this->lang->line('header__label_lanEs') ?>
                </a> -
                <a href="<?= ROOT_URL; ?>altar/Ctr_changelanguage?method=<?= $current_url; ?>&lang=<?= LANG_EN ?>"
                        class="registros spaceright" style="color: <?= $color_en; ?>">
                    <?= $this->lang->line('header__label_lanEn') ?>
                </a>

                <?php if ($this->session->userdata('user_id')): ?>

                    <a href="<?= ROOT_URL; ?>altar/Ctr_account/"
                       class="regirtros"><?= $this->session->userdata('nickname'); ?></a> /
                    <a href="<?= ROOT_URL; ?>altar/Ctr_account/closeSession" class="regirtros">Logout</a>

                <?php else: ?>
                    <a href="<?= ROOT_URL; ?>altar/Ctr_account/login"
                       class="regirtros"><?= $this->lang->line('header__label_signin') ?></a> /
                    <a href="<?= ROOT_URL; ?>altar/Ctr_register/"
                       class="registros"><?= $this->lang->line('header__label_register') ?> </a>

                <?php endif; ?>


                <i class="icon-guest" style="    top: 2px; position: relative;"></i>

                <a href="carrito.php" id="carritoresp"><i class="icon-shopping-cart"></i></a>

            </div>

        </div>
    </div>


    <!-- #top-bar end -->

    <!-- Header
            ============================================= -->
    <header id="header" class="dark">
        <div id="header-wrap">
            <div class="container clearfix">
                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                              ============================================= -->
                <div id="logo"><a href="<?= ROOT_URL; ?>altar/creativealtar" class="standard-logo"
                                  data-dark-logo="<?= URL_TEMPLATEALTAR ?>images/logo-web.png"><img
                                src="<?= URL_TEMPLATEALTAR ?>images/logo-web.png" alt="Canvas Logo"></a> <a
                            href="<?= ROOT_URL; ?>altar/creativealtar" class="retina-logo"
                            data-dark-logo="<?= URL_TEMPLATEALTAR ?>images/logo-web@x2.png"><img
                                src="<?= URL_TEMPLATEALTAR ?>images/logo-web@x2.png" alt="CreativeAltar"></a></div>
                <!-- #logo end -->

                <!-- Primary Navigation

                              ============================================= -->
                <div id="top-cart" class="">

                    <a href="#" id="top-cart-trigger">
                        <i class="icon-shopping-cart" style="display: none;"></i>
                        <?php
                        $styleAllElements = "";
                        $countAllElements = 0;
                        if ($this->session->userdata('allNumberElementsPurchase') == null && (int)$this->session->userdata('allNumberElementsPurchase') <= 0) {
                            $styleAllElements = "style='display: none;'";
                        } else {
                            $countAllElements = (int)$this->session->userdata('allNumberElementsPurchase');
                        }
                        ?>
                        <span id='shoeNumberAllElementsAdd' <?= $styleAllElements ?>><?= $countAllElements ?></span>
                    </a>

                    <div class="top-cart-content">
                        <div class="top-cart-title">
                            <h4><?= $this->lang->line('header__sale_title') ?></h4>
                        </div>
                        <div class="top-cart-items" id="allElementAddShoppingCart" style=" max-height: calc(56vh - 23px);
    overflow-x: auto;">
                            <?php
                            $allElements = $this->session->userdata('allElementsPurchase');

                            if ($allElements != null) {

                                foreach ($allElements as $key => $value) {
                                    echo $value;
                                }
                            }
                            ?>
                        </div>
                        <?php
                        $totalPrice = 0;
                        if ($this->session->userdata('allElementsPurchasePrice') != null) {
                            $totalPrice = $this->session->userdata('allElementsPurchasePrice');

                        }
                        ?>
                        <div class="top-cart-action clearfix">
                            <span class="fleft top-checkout-price">
                                <span class="signopesos">$</span>
                                <span class="showTotalPriceAdd">
                                    <?= $totalPrice ?>
                                </span>
                            </span>
                            <a class="button button-3d button-small nomargin fright"
                               href="<?= ROOT_URL; ?>altar/Ctr_purchases"><?= $this->lang->line('header__sale_button') ?></a>
                        </div>
                    </div>
                </div>
                <nav id="primary-menu" class="style-2">
                    <div id="top-search">
                        <a href="#" id="top-search-trigger" >
                            <i class="icon-search3" style="display: none"></i>
                            <i class="icon-line-cross"></i></a>
                        <form action="<?= ROOT_URL; ?>altar/Ctr_filtervideo/view" method="post">
                            <input type="text" id="ajax-post-title-header" name="videoTitle" value=""
                                   class="form-control"
                                   placeholder="<?= $this->lang->line('header__search_input') ?>"/>
                            <input name="videoCategory" value="" type="hidden"/>
                            <input name="typefilter" value="1" type="hidden"/>
                        </form>
                    </div>

                    <ul>

                        <li class="current"><a href="<?= ROOT_URL; ?>altar/Ctr_filtervideo/categories">
                                <div><?= $this->lang->line('header__menu_categories') ?></div>
                            </a>
                            <ul>
                                <?= $categoryHeader ?>
                            </ul>
                        </li>
                        <li>
                            <a href="<?= ROOT_URL; ?>altar/Ctr_contact">
                                <div><?= $this->lang->line('header__menu_contact') ?></div>
                            </a>
                        </li>
                        <li><a href="<?= ROOT_URL; ?>altar/Ctr_blog">
                                <div><?= $this->lang->line('header__menu_blog') ?></div>
                            </a>
                        </li>

                        <li>
                            <?php if ($this->session->userdata('user_id')): ?>

                                <a href="<?= ROOT_URL; ?>altar/Ctr_account/"
                               class="regirtros">
                                    <div class="login-b1">
                                        <?= $this->session->userdata('nickname'); ?>
                                    </div>
                                </a>

                            <?php else: ?>
                                <a href="<?= ROOT_URL; ?>altar/Ctr_account/login"
                               class="regirtros">
                                    <div class="login-b1">
                                        <?= $this->lang->line('header__label_signin') ?>
                                    </div>
                                </a>

                            <?php endif; ?>
                        </li>

                        <li>

                        <?php if ($this->session->userdata('user_id')): ?>

                            <!--<a href="<?/*= ROOT_URL; */?>altar/Ctr_account/"
                               class="regirtros"><?/*= $this->session->userdata('nickname'); */?></a> /-->
                            <a href="<?= ROOT_URL; ?>altar/Ctr_account/closeSession" class="regirtros">Logout</a>

                        <?php else: ?>
                            <!--<a href="<?/*= ROOT_URL; */?>altar/Ctr_account/login"
                               class="regirtros"><?/*= $this->lang->line('header__label_signin') */?></a> /-->
                            <a href="<?= ROOT_URL; ?>altar/Ctr_register/"
                               class="registros"><?= $this->lang->line('header__label_register') ?> </a>

                        <?php endif; ?>

                        </li>
                        <li>
                            <a href="#" id="top-search-trigger-init">
                                <i class="icon-search3"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" id="top-cart-trigger-init">
                                <i class="icon-shopping-cart"></i>
                                <span id="shoeNumberAllElementsAdd" style="display: none;">0</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= ROOT_URL; ?>altar/Ctr_changelanguage?method=<?= $current_url; ?>&lang=<?= LANG_ES ?>"
                               class="registros" style="color: <?= $color_es; ?>">
                                <?= $this->lang->line('header__label_lanEs') ?> ▼
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= ROOT_URL; ?>altar/Ctr_changelanguage?method=<?= $current_url; ?>&lang=<?= LANG_EN ?>"
                                       class="registros spaceright" style="color: <?= $color_en; ?>">
                                        <?= $this->lang->line('header__label_lanEn') ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </header>
    <!-- #header end -->