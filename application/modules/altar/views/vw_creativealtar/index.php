 <style type="text/css">
 	#slider{
 		height: 650px !important;
 	}
 	.slider-caption.slider-caption-center {
    position: absolute !important;
    top: 40px !important;
}
.easy-autocomplete {
    width: 100% !important;
}
@media(min-width: 320px){

}
@media(min-width: 480px){
#slider {
    height: 572px !important;
}
}
@media(min-width: 640px){

}
@media(min-width: 768px){
.slider-caption h2 {
    font-size: 44px;
}
#slider {
    height: 436px !important;
}
.slider-caption.slider-caption-center {
    margin-top: -170px !important;
}
.slider-caption h2 {
    font-size: 43px;
}
}
@media(min-width: 1024px){
#slider {
    height: 550px !important;
}
}
@media(min-width: 1200px){

.slider-caption h2 {
    font-size: 64px;
}
#slider {
    height: 650px !important;
}
.slider-caption.slider-caption-center {
    margin-top: -220px !important;
}
}

</style>


<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
    <div class="slider-parallax-inner">
        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">

                <?= $section1; ?>

            </div>

            <div id="slide-number">
                <div id="slide-number-current"></div>
                <span>/</span>
                <div id="slide-number-total"></div>
            </div>
        </div>
    </div>

    <div class="creativealtar">
<div class="slider-caption slider-caption-center" style="transform: translateY(0px); opacity: 1; top: 246px;">
                                    <h2 class="respondemesta fadeInUp animated" data-caption-animate="fadeInUp" style="opacity: 1 !important; color: white !important">Historias asombrosas en videos HD1</h2>
                                </div>
        <div class="nobottommargin center">
            <?= $this->lang->line('title2') ?>
        </div>
        <div class="contact-widget">
            <div class="contact-form-result"></div>
            <form class="nobottommargin formularioprincipal" id="template-contactform" name="template-contactform"
                  action="<?= ROOT_URL; ?>altar/Ctr_filtervideo/view" method="post" enctype="multipart/form-data">
				  <div class="col_one_third">
                    <input type="text" id="ajax-post-title" name="videoTitle" value="" class="sm-form-control"
                           placeholder="<?= $this->lang->line('placeholder1') ?>"/>
                </div>
                <div class="col_one_third ">
                    <select id="videoCategory" name="videoCategory" class="sm-form-control">
                        <option value=""><?= $this->lang->line('placeholder2') ?></option>
                        <?= $categoryFilter; ?>
                    </select>
                </div>
                <input name="typefilter" value="1" type="hidden"/>
                <div class="col_one_third col_last">
                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                            class="button button-3d button-black nomargin center"><?= $this->lang->line('button1') ?></button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Content
        ============================================= -->

<section id="content">
    <?= $section2; ?>
</section>

<section id="content">
    <?= $section3; ?>

    <?= $video_free; ?>

</section>

<section id="content">
    <?= $section4; ?>
</section>
  