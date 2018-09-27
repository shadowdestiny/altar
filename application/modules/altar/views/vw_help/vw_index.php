<!-- Page Title
		============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $this->lang->line('help_title'); ?></h1>
        <span><?= $this->lang->line('help_subtitle'); ?></span>

    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div class="postcontent col_last nobottommargin clearfix">

                <div id="faqs" class="faqs">

                    <?= $info_help; ?>
                </div>

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= -->
            <div class="sidebar nobottommargin clearfix">
                <div class="sidebar-widgets-wrap">


                    <div class="widget clearfix">

                        <h4><?= $this->lang->line('filter_most_sold'); ?></h4>
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

                        <h4><?= $this->lang->line('filter_article_free'); ?></h4>
                        <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30"
                             data-pagi="false" data-items-xxs="1" data-items-xs="1" data-items-sm="1" data-items-lg="1">

                            <?= $freevideo ?>

                        </div>
                    </div>


                </div>
            </div><!-- .sidebar end -->

        </div>

    </div>

</section><!-- #content end -->