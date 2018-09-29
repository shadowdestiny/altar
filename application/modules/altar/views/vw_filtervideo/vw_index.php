<!-- Page Title
============================================= -->
<section id="page-title" class="search-in-page">

    <div class="content-flex-nomargin">
        <div class="section-content-flex">
            <div class="result-left">
                <h1><?= $this->lang->line('filter_title') ?></h1>
            </div>
            <div class="input-right">
                <input type="text" style="background: url(<?=URL_TEMPLATEALTAR?>img/productos/lup.jpg) no-repeat scroll 7px 7px;
padding-left:30px;margin-top: 4px" placeholder="<?= $this->lang->line('search_layer') ?>"/>
            </div>
        </div>

    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div class="postcontent nobottommargin col_last" id="postList">

                <?= $videos ?>
                <div class="section-content">
                    <button class="default-button">
                        <?= $this->lang->line('back_home') ?>
                    </button>
                </div>
            </div><!-- .postcontent end -->


            <!-- Sidebar
            ============================================= -->
            <div class="sidebar nobottommargin">
                <div class="sidebar-widgets-wrap">

                    <div class="widget widget_links clearfix">

                        <h4><?= $this->lang->line('title_category') ?></h4>
                        <ul>
                            <?= $category ?>
                        </ul>

                    </div>


                    <div class="widget clearfix">

                        <h4><?= $this->lang->line('filter_most_sold') ?></h4>
                        <div id="post-list-footer">

                            <?= $mostsold ?>

                        </div>

                    </div>


                    <div class="widget clearfix">

                        <div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-items="1"
                             data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false">

                            <?= $publicidad; ?>

                        </div>

                    </div>


                    <div class="widget subscribe-widget clearfix">

                        <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30"
                             data-pagi="false" data-items-xxs="1" data-items-xs="1" data-items-sm="1" data-items-lg="1"
                             style="text-align: center"
                        >

                            <?= $freevideo ?>

                            <h4><?= $this->lang->line('filter_article_free') ?></h4>
                        </div>
                    </div>


                </div>
            </div><!-- .sidebar end -->

        </div>

    </div>

</section><!-- #content end -->


<!--seccion de noticias-->
<style type="text/css">
    .section-notice{
        background: url('<?= URL_TEMPLATEALTAR ?>img/video-demo/negocios.jpg') no-repeat;
        background-attachment: fixed;
        background-position: center center;
        background-size: cover;
    }
</style>
<section>
    <div class="section-notice">
        <div class="content-section">
            <div class="title-1">
                ¡Recibe noticias acerca de nuestro material!
            </div>
            <div class="title-2">
                Unete a la comunidad de Creative Altar y mantente al tanto de la fecha de lanzamiento
            </div>
            <div class="inputs">
                <input type="text" class="subscribe-input"/>
                <button class="subscribe-input">Suscribete</button>
            </div>
        </div>
        <div class="opacity"></div>
    </div>
</section>