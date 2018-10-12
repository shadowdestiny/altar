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

        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div id='postList' class="postcontent nobottommargin clearfix">

                <!-- Posts
                ============================================= -->
                <?= $blogs; ?>

                <!-- .pager end -->

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= LM3-->
            <div class="sidebar nobottommargin col_last clearfix">
                <div class="sidebar-widgets-wrap">

                    <div class="widget widget_links clearfix">

                        <h4><?= $this->lang->line('blog_category'); ?></h4>
                        <ul>
                            <?= $category; ?>

                        </ul>

                    </div>


                    <div class="widget clearfix">

                        <div class="tabs nobottommargin clearfix" id="sidebar-tabs">

                            <ul class="tab-nav clearfix">
                                <li><a href="#tabs-1"><?= $this->lang->line('blog_populars'); ?></a></li>
                                <li><a href="#tabs-2"><?= $this->lang->line('blog_new'); ?></a></li>
                            </ul>

                            <div class="tab-container">

                                <div class="tab-content clearfix" id="tabs-1">
                                    <div id="popular-post-list-sidebar">

                                        <?= $blog_views; ?>


                                    </div>
                                </div>
                                <div class="tab-content clearfix" id="tabs-2">
                                    <div id="recent-post-list-sidebar">

                                        <?= $blog_recent; ?>

                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>


                </div>

            </div><!-- .sidebar end -->

        </div>

    </div>

</section><!-- #content end -->

<div class="loading" style="display: none;"></div>

