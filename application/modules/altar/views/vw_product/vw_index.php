<!-- Page Title
============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1><?= $title ?></h1>

    </div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class=" nobottommargin clearfix">

                <div class="single-product">

                    <div class="product">

                        <div class="col_half">

                            <!-- Product Single - Gallery
                            ============================================= -->
                            <div class="product-image">
                                <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                    <div class="flexslider">
                                        <?/*= $previewVideo */?>
                                        <img src="<?= URL_TEMPLATEALTAR ?>/img/productos/demo1.jpg" style="width:100%;">
                                        <br>
                                        <table class="footer-video">
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <img src="<?= URL_TEMPLATEALTAR ?>/img/productos/fav.jpg" style="width: 15px" >
                                                            </td>
                                                            <td>
                                                                Favorito
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <img src="<?= URL_TEMPLATEALTAR ?>/img/productos/dow.jpg" style="width: 15px">
                                                            </td>
                                                            <td>
                                                                Descargar previsualizacion
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <div>
                                            <div class="block-section">
                                                Arquitectura
                                            </div>
                                            <div class="block-section">
                                                Iglesia
                                            </div>
                                            <div class="block-section">
                                                Altar
                                            </div>
                                            <div class="block-section">
                                                Amarillo
                                            </div>
                                            <div class="block-section">
                                                Pasaje
                                            </div>
                                            <div class="block-section">
                                                Arquitectura
                                            </div>
                                            <div class="block-section">
                                                Arquitectura
                                            </div>
                                            <div class="block-section">
                                                Arquitectura
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Product Single - Gallery End -->

                        </div>

                        <div class="col_half col_last product-desc">


                            <div class="product-price">
                                <?= $price ?>
                            </div>

                            <div class="clear"></div>
                            <div class="line"></div>

                            <?= $buttonfavorite ?>

                            <div class="cart nobottommargin clearfix">
                                <a class="add-to-cart button nomargin addElementShoppingCart changeCursorHand"
                                   video-id="<?= $video_id; ?>"
                                   video-value="<?= $price_money; ?>"
                                   video-title="<?= $title; ?>"
                                   video-preview="<?= URL_IMAGES; ?>videos/thumbs/<?= $image_thumb; ?>"
                                   video-url="<?= ROOT_URL; ?>altar/Ctr_product/view/<?= $video_id; ?>"

                                >
                                    <i class='icon-cart'></i>
                                    <?= $this->lang->line('quick_view_shop_car'); ?></a>
                            </div><!-- Product Single - Quantity & Cart Button End -->

                            <div class="clear"></div>
                            <div class="line"></div>

                            <!-- Product Single - Short Description
                            ============================================= -->
                            <p><?= $this->lang->line('product_format_video'); ?>:</p>
                            <ul class="iconlist">
                                <li><i class="icon-caret-right"></i> <?= $format ?></li>
                            </ul><!-- Product Single - Short Description End -->

                            <!-- Product Single - Meta
                            ============================================= -->
                            <div class="panel panel-default product-meta">
                                <div class="panel-body">
                                    <span class="posted_in"><?= $this->lang->line('product_category'); ?>
                                        : <?= $category ?></span>
                                    <span class="tagged_as"><?= $this->lang->line('product_views'); ?>
                                        : <?= $views ?></span>
                                    <span class="tagged_as">Autor : <?= $autor; ?></span>
                                </div>
                            </div><!-- Product Single - Meta End -->

                            <div class="clear"></div>
                            <div class="line"></div>

                            <?= $download_button; ?>
                            <!-- Product Single - Quantity & Cart Button End -->

                            <div class="clear"></div>
                            <div class="line"></div>

                            <!-- Product Single - Share
                            ============================================= lm compartir -->
                            <div class="si-share noborder clearfix altar-icon">
                                <!--<span><?/*= $this->lang->line('product_share'); */?>:</span>-->
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
                            </div><!-- Product Single - Share End -->

                        </div>

                        <!--Col video-->

                        <?php

                        /*
                        <div class="col_full nobottommargin">

                            <div class="tabs clearfix nobottommargin" id="tab-1">

                                <ul class="tab-nav clearfix">
                                    <li>
                                        <a href="#tabs-1">
                                            <i class="icon-star3"></i>
                                            <span class="hidden-xs">
                                                <?= $this->lang->line('product_video_autor'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabs-2">
                                            <i class="icon-align-justify2"></i>
                                            <span class="hidden-xs">
                                                <?= $this->lang->line('product_video_description'); ?>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tabs-3">
                                            <i class="icon-star3"></i>
                                            <span class="hidden-xs">
                                                <?= $this->lang->line('product_video_comments'); ?>
                                                (<?= $count_commentary; ?>)
                                            </span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix" id="tabs-1">
                                        <div id="oc-product" class="owl-carousel product-carousel carousel-widget"
                                             data-margin="30"
                                             data-pagi="false" data-autoplay="5000" data-items-xxs="1" data-items-sm="2"
                                             data-items-lg="4">

                                            <?= $autor_video; ?>

                                        </div>
                                    </div>

                                    <div class="tab-content clearfix" id="tabs-2">
                                        <?= $description ?>
                                    </div>

                                    <div class="tab-content clearfix" id="tabs-3">

                                        <div id="reviews" class="clearfix">

                                            <ol class="commentlist clearfix">

                                                <?= $comments; ?>

                                            </ol>

                                            <!-- Modal Reviews
                                            ============================================= -->
                                            <?php if ($this->session->userdata('user_id')): ?>
                                                <a href="#" data-toggle="modal" data-target="#reviewFormModal"
                                                   class="button button-3d nomargin fright"><?= $this->lang->line('product_video_modal_comments_button'); ?></a>

                                            <?php else: ?>

                                                <button onclick="return DialogError_Session();"
                                                        class="button button-3d nomargin fright"><?= $this->lang->line('product_video_modal_comments_button'); ?></button>

                                            <?php endif; ?>

                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>
                */
                        ?>

                    </div>

                </div>



                <div class="clear"></div>
                <div class="line"></div>

               <!-- <div class="col_full nobottommargin">

                    <h4><?/*= $this->lang->line('product_video_relatios'); */?></h4>

                    <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30"
                         data-pagi="false" data-autoplay="5000" data-items-xxs="1" data-items-sm="2" data-items-lg="4">

                        <?/*= $recommendations */?>

                    </div>

                </div>-->

            </div>


        </div>

    </div>

</section><!-- #content end -->

<section>
    <div class="content-display-video">
        <br>
        <br>
        <div class="subtitle">
            Videos relacionados (340)
        </div>
        <br>
        <div class="content-images">
            <div class="images">
                <div class="section-image">
                    <div class="canvas-image">
                        <img src="<?=URL_IMAGES?>/videos/thumbs/Image-34186_thumb.jpg" alt="">
                        <div>
                            <img src="<?= URL_TEMPLATEALTAR ?>/images/icons/favorite.png">
                        </div>
                    </div>
                    <div class="text-photo">
                        <div class="title-left">
                            Interior de iglesia
                            <br/>
                            $0.00
                        </div>
                        <div class="title-right">
                            Clásico
                        </div>
                    </div>
                </div>
                <div class="section-image">
                    <div class="canvas-image">
                        <img src="<?=URL_IMAGES?>/videos/thumbs/Image-34186_thumb.jpg" alt="">
                        <div>
                            <img src="<?= URL_TEMPLATEALTAR ?>/images/icons/favorite.png">
                        </div>
                    </div>
                    <div class="text-photo">
                        <div class="title-left">
                            Interior de iglesia
                            <br/>
                            $0.00
                        </div>
                        <div class="title-right">
                            Clásico
                        </div>
                    </div>
                </div>
                <div class="section-image">
                    <div class="canvas-image">
                        <img src="<?=URL_IMAGES?>/videos/thumbs/Image-34186_thumb.jpg" alt="">
                        <div>
                            <img src="<?= URL_TEMPLATEALTAR ?>/images/icons/favorite.png">
                        </div>
                    </div>
                    <div class="text-photo">
                        <div class="title-left">
                            Interior de iglesia
                            <br/>
                            $0.00
                        </div>
                        <div class="title-right">
                            Clásico
                        </div>
                    </div>
                </div>
                <div class="section-image">
                    <div class="canvas-image">
                        <img src="<?=URL_IMAGES?>/videos/thumbs/Image-34186_thumb.jpg" alt="">
                        <div>
                            <img src="<?= URL_TEMPLATEALTAR ?>/images/icons/favorite.png">
                        </div>
                    </div>
                    <div class="text-photo">
                        <div class="title-left">
                            Interior de iglesia
                            <br/>
                            $0.00
                        </div>
                        <div class="title-right">
                            Clásico
                        </div>
                    </div>
                </div>
                <div class="section-image">
                    <div class="canvas-image">
                        <img src="<?=URL_IMAGES?>/videos/thumbs/Image-34186_thumb.jpg" alt="">
                        <div>
                            <img src="<?= URL_TEMPLATEALTAR ?>/images/icons/favorite.png">
                        </div>
                    </div>
                    <div class="text-photo">
                        <div class="title-left">
                            Interior de iglesia
                            <br/>
                            $0.00
                        </div>
                        <div class="title-right">
                            Clásico
                        </div>
                    </div>
                </div>
                <div class="section-image">
                    <div class="canvas-image">
                        <img src="<?=URL_IMAGES?>/videos/thumbs/Image-34186_thumb.jpg" alt="">
                        <div>
                            <img src="<?= URL_TEMPLATEALTAR ?>/images/icons/favorite.png">
                        </div>
                    </div>
                    <div class="text-photo">
                        <div class="title-left">
                            Interior de iglesia
                            <br/>
                            $0.00
                        </div>
                        <div class="title-right">
                            Clásico
                        </div>
                    </div>
                </div>
                <div class="section-image">
                    <div class="canvas-image">
                        <img src="<?=URL_IMAGES?>/videos/thumbs/Image-34186_thumb.jpg" alt="">
                        <div>
                            <img src="<?= URL_TEMPLATEALTAR ?>/images/icons/favorite.png">
                        </div>
                    </div>
                    <div class="text-photo">
                        <div class="title-left">
                            Interior de iglesia
                            <br/>
                            $0.00
                        </div>
                        <div class="title-right">
                            Clásico
                        </div>
                    </div>
                </div>
                <div class="section-image">
                    <div class="canvas-image">
                        <img src="<?=URL_IMAGES?>/videos/thumbs/Image-34186_thumb.jpg" alt="">
                        <div>
                            <img src="<?= URL_TEMPLATEALTAR ?>/images/icons/favorite.png">
                        </div>
                    </div>
                    <div class="text-photo">
                        <div class="title-left">
                            Interior de iglesia
                            <br/>
                            $0.00
                        </div>
                        <div class="title-right">
                            Clásico
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div style="text-align: center">
            <button class="format-button">
                <?= $this->lang->line('view_all'); ?></a>
            </button>
        </div>
        <br>
    </div>
</section>

<section>
    <style type="text/css">
        .section-notice{
            background: url('<?= URL_TEMPLATEALTAR ?>img/video-demo/negocios.jpg') no-repeat;
            /*background-attachment: fixed;
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
                <input type="text" class="subscribe-input"/>
                <button class="subscribe-input">Suscribete</button>
            </div>
        </div>
        <div class="opacity"></div>
    </div>
</section>

<div class="loading" style="display: none;"></div>
