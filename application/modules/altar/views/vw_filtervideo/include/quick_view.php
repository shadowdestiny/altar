<div class="single-product shop-quick-view-ajax clearfix">

    <div class="ajax-modal-title">
        <h2><?= $title; ?></h2>
    </div>

    <div class="product modal-padding clearfix">

        <div class="col_half  modalresponsivopad nobottommargin">
            <div class="product-image">
                <div class="fslider" data-pagi="false">
                    <div class="flexslider">
                        <div class="video-responsive">
                            <?= $vimeoPreview_id; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col_half nobottommargin col_last product-desc ">
            <div class="product-price">
                <del><span class="signopesos">$</span><?= $price; ?></del>
                <ins><span class="signopesos">$</span><?= $offerPrice; ?></ins>
            </div>


            <div class="clear"></div>
            <div class="line"></div>

            <!-- Product Single - Quantity & Cart Button
            ============================================= -->
            <div class="cart nobottommargin clearfix">
                <a class="add-to-cart button nomargin addElementShoppingCart changeCursorHand"
                   video-id="<?= $video_id; ?>"
                   video-value="<?= $price_money; ?>"
                   video-title="<?= $title; ?>"
                   video-preview="<?= URL_IMAGES; ?>videos/thumbs/<?= $image_thumb; ?>"
                   video-url="<?= ROOT_URL; ?>altar/Ctr_product?videoId=<?= $video_id; ?>"

                >
                    <?= $this->lang->line('quick_view_shop_car'); ?></a>
            </div><!-- Product Single - Quantity & Cart Button End -->

            <div class="clear"></div>
            <div class="line"></div>
            <p><?= $intro; ?></p>

            <div class="panel panel-default product-meta nobottommargin">
                <div class="panel-body">
                    <span itemprop="productID" class="sku_wrapper">SKU: <span class="sku"><?= $sku; ?></span></span>
                    <span class="posted_in"><?= $this->lang->line('quick_view_category') ?>:<?= $category ?></span>
                    <span class="posted_in">Autor: <?= $autor; ?> </span>

                </div>
            </div>
        </div>

    </div>

</div>