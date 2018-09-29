<!-- Footer
        ============================================= -->
<footer id="footer" class="dark">
    <div class="container">

        <!-- Footer Widgets
                    ============================================= -->
        <div class="footer-widgets-wrap clearfix">
            <div class="col_full">
                <div class="col-md-3 col-sm-3">
                    <div class="widget widget_links clearfix">
                        <img src="<?= URL_TEMPLATEALTAR ?>images/logo-web.png" alt="Canvas Logo">
                        <ul class="footer-content">
                            <li>
                                Plataforma digital de contenido audiovisual para cristianos
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget widget_links clearfix">
                        <h4 class="jello footer"><?= $this->lang->line('footer__label_information') ?></h4>
                        <ul class="footer-content">
                            <li><a href="<?= ROOT_URL; ?>altar/creativealtar"><?= $this->lang->line('footer_home') ?></a></li>
                            <li>
                                <a href="<?= ROOT_URL; ?>altar/Ctr_aboutus"><?= $this->lang->line('footer_about') ?></a>
                            </li>
                            <li>
                                <a href="<?= ROOT_URL; ?>altar/Ctr_contact"><?= $this->lang->line('footer_contact') ?></a>
                            </li>
                            <li><a href="<?= ROOT_URL; ?>altar/Ctr_help"><?= $this->lang->line('footer_help') ?></a></li>

                            <li><a href="<?= ROOT_URL; ?>altar/Ctr_sitemap"><?= $this->lang->line('footer_map') ?></a></li>
                            <li>
                                <a href="<?= ROOT_URL; ?>altar/Ctr_privacy"><?= $this->lang->line('footer_pravacy') ?></a>
                            </li>
                            <li>
                                <a href="<?= ROOT_URL; ?>altar/Ctr_termsconditions"><?= $this->lang->line('footer_terms') ?></a>
                            </li>
                        </ul>
                    </div>
                    <br>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget widget_links clearfix">
                        <h4 class="jello footer"><?= $this->lang->line('footer__label_category') ?></h4>
                        <ul class="footer-content">
                            <?= $categoryFooter ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget clearfix" style="text-align: center">
                        <h4 class="jello footer"><?= $this->lang->line('footer__label_follow') ?></h4>
                        <div class="row">

                            <div class="redes">

                                <div class="col-md-3 clearfix bottommargin-sm">
                                    <a href="<?= URL_FACEBOOK; ?>" class="social-icon si-light nobottommargin rightmargin-sm">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                </div>
                                <div class="col-md-3 clearfix bottommargin-sm">
                                    <a href="<?= URL_TWITTER; ?>" class="social-icon si-light nobottommargin  rightmargin-sm">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                </div>
                                <div class="col-md-3 clearfix bottommargin-sm">
                                    <a href="<?= URL_INSTAGRAM; ?>" class="social-icon si-light nobottommargin  rightmargin-sm">
                                        <i class="icon-instagram"></i>
                                        <i class="icon-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 clearfix bottommargin-sm" style="text-align: center">
                                <a href="<?= URL_PAYPAL; ?>"><img src="<?= URL_TEMPLATEALTAR ?>img/paypal.png"></a>
                            </div>
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
            <div class="col_full center footer_creativealtar light"> &copy;
                <?= $this->lang->line('footer__label_finalMessage') ?>
                <br>
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
<script type="text/javascript" src="<?= URL_TEMPLATEALTAR ?>js/jquery.js<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"></script>
<script type="text/javascript" src="<?= URL_TEMPLATEALTAR ?>js/plugins.js<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"></script>

<!-- Footer Scripts
      ============================================= -->
<script type="text/javascript"
        src="<?= URL_TEMPLATEALTAR ?>js/functions.js<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"></script>
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


</script>

<!--Script usado en todas las paginas-->
<script type="text/javascript">
    $Ctr_favorites = '<?= ROOT_URL; ?>altar/Ctr_favorite/';
    $Ctr_purchases = '<?= ROOT_URL; ?>altar/Ctr_purchases/';
    $purchases_error_title = '<?= $this->lang->line('purchases_error_title'); ?>';
    $purchases_error_content = '<?= $this->lang->line('purchases_error_content'); ?>';
    $purchases_error_coupon = '<?= $this->lang->line('purchases_error_coupon'); ?>';
    $API_FACEBOOK_ID = '<?= API_FACEBOOK; ?>';

    <?php
    //inicio de corchetes de arreglo
        $arraySesionPurchase = '[';
//Se asigna a $variablesSession todo lo que se encuentre dentro de la variable de session
        $variablesSession = $this->session->userdata('allElementsPurchaseId');
//Se inicialisa una variable en 0
        $con = 0;
//Se valida que la variable de session contenga datos.
        if($variablesSession != null || $variablesSession != '')
            //Se crear un for para recorrer la informacion del array y su posicion
            foreach ($variablesSession as $key => $value) {
            //a la variable arraySesionPurchase se le van cargando los valores de la variable de session
                $arraySesionPurchase .= $value;
            //Se valida que la variable $variablesSession cuente con informacion
                if((sizeof($variablesSession) - 1) > $con ){
                    //se concatena a la variable de session una coma para ir formando el array
                    $arraySesionPurchase .= ',';
                }
                //Se suma 1 a la variable $con
                $con++;
            }
        //final de corchetes de arreglo RESULTADO=ARRAYSESIONPURCHASE [0,2,3]
        $arraySesionPurchase .= ']';
    ?>
// Variable de javascript = variable de php que contiene el arreglo de la variable de session
    arraySesionPurchase = <?= $arraySesionPurchase ?>;



</script>
<script type="text/javascript" src="<?= URL_TEMPLATEALTAR ?>includes/js/jquery.easy-autocomplete.min.js<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"></script>
<script type="text/javascript" src="<?= URL_TEMPLATEALTAR ?>js/bootstrap-dialog.js<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"></script>
<script type="text/javascript"
        src="<?= URL_TEMPLATEALTAR ?>includes/js/all.js<?= URL_TEMPLATEALTARVERSIONCSSJS ?>"></script>
<script >
    window.___gcfg = {
        lang: 'zh-CN',
        parsetags: 'onload'
    };
</script>
<!--<script src="https://apis.google.com/js/client:platform.js" async defer></script>-->
<!--<script
        type="text/javascript"
        async defer
        src="//assets.pinterest.com/js/pinit.js"
></script>-->