<!-- Page Title
        ============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $this->lang->line('blog_title'); ?></h1>

    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix" style="text-align: center">

            <!-- Post Content
            ============================================= -->
            <div id='postList' class="postcontent no-width nobottommargin clearfix">

                <!-- Posts
                ============================================= -->
                <?= $blogs; ?>

                <!-- .pager end -->

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= LM3-->
            <!--<div class="sidebar nobottommargin col_last clearfix">
                <div class="sidebar-widgets-wrap">

                    <div class="widget widget_links clearfix">

                        <h4><?/*= $this->lang->line('blog_category'); */?></h4>
                        <ul>
                            <?/*= $category; */?>

                        </ul>

                    </div>


                    <div class="widget clearfix">

                        <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tabs-1"><?/*= $this->lang->line('blog_populars'); */?></a></li>
                                <li><a href="#tabs-2"><?/*= $this->lang->line('blog_new'); */?></a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-1">
                                    <div id="popular-post-list-sidebar">

                                        <?/*= $blog_views; */?>


                                    </div>
                                </div>
                                <div class="tab-content clearfix" id="tabs-2">
                                    <div id="recent-post-list-sidebar">

                                        <?/*= $blog_recent; */?>

                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>


                </div>

            </div>--><!-- .sidebar end -->

        </div>

    </div>

</section><!-- #content end -->

<!--seccion de noticias-->

<section>
    <style type="text/css">
        .section-notice{
            background: url('<?= URL_TEMPLATEALTAR ?>img/video-demo/negocios.jpg') no-repeat;
            /* background-attachment: fixed;
             background-position: center center;*/
            background-size: cover;
        }
    </style>
    <div class="section-notice">
        <div class="content-section">
            <div class="title-1">
                ¡Recibe noticias acerca de nuestro material!
            </div>
            <div class="title-2">
                Unete a la comunidad de Creative Altar y mantente al tanto de la fecha de lanzamiento
            </div>
            <div class="inputs">
                <input type="text" class="subscribe-input" placeholder="<?=$this->lang->line('write_email')?>"/>
                <button class="subscribe-input">Suscribete</button>
            </div>
        </div>
        <div class="opacity"></div>
    </div>
</section>

<div class="loading" style="display: none;"></div>

