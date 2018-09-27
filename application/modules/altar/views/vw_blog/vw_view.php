<!-- Page Title
        ============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $blog_title; ?></h1>

    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <!-- Post Content
            ============================================= -->
            <div class="postcontent nobottommargin col_last clearfix">

                <div class="single-post nobottommargin">

                    <!-- Single Post
                    ============================================= -->
                    <div class="entry clearfix">


                        <!-- Entry Meta
                        ============================================= -->
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-calendar3"></i> <?= $blog_created; ?></li>
                            <li><a href="#"><i class="icon-user"></i> <?= $blog_user_post; ?></a></li>
                            <li><a href="#"><i class="icon-comments"></i> <?= $blog_views_byid; ?> Vistas</a></li>
                            <li><a href="#"><i class="icon-camera-retro"></i></a></li>
                        </ul><!-- .entry-meta end -->

                        <!-- Entry Image
                        ============================================= -->
                        <div class="entry-image">
                            <a href="#"><img src="<?= $blog_image; ?>" alt="Blog Single"></a>
                        </div><!-- .entry-image end -->

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">

                            <?= $blog_content; ?>
                            <!-- Post Single - Content End -->


                            <div class="clear"></div>

                            <!-- Post Single - Share
                            ============================================= -->
                            <div class="si-share noborder clearfix">
                                <span><?= $this->lang->line('product_share'); ?></span>
                                <div>
                                    <a href="#" class="social-icon si-borderless si-facebook sharedInfoFaceAltar">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="http://www.twitter.com/intent/tweet?url=<?= $social_video_current_url; ?>&text=<?= $social_video_title; ?>"
                                       class="social-icon si-borderless si-twitter"
                                    >
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="https://www.pinterest.com/pin/create/button/?
                                        url=<?= urlencode($social_video_current_url); ?>
                                        &media=<?= urlencode($social_video_image); ?>
                                        &description=<?= urlencode($social_video_descript); ?>" data-pin-custom="true"
                                       class="social-icon si-borderless si-pinterest">
                                        <i class="icon-pinterest"></i>
                                        <i class="icon-pinterest"></i>
                                    </a>

                                    <a href="https://plus.google.com/share?url=<?= $social_video_current_url; ?>"
                                       onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
                                       class="social-icon si-borderless si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-email3" data-toggle="modal"
                                       data-target="#modal_shared_product">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email3"></i>
                                    </a>
                                </div>
                            </div><!-- Post Single - Share End -->

                        </div>
                    </div><!-- .entry end -->


                    <h4><?= $this->lang->line('blog_related'); ?></h4>

                    <div class="related-posts clearfix">

                        <?= $blog_related; ?>

                    </div>


                </div>

            </div><!-- .postcontent end -->

            <!-- Sidebar
            ============================================= -->
            <div class="sidebar nobottommargin clearfix">
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
