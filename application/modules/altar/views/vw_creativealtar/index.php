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


<div class="section-video">
    <img src="<?= URL_TEMPLATEALTAR ?>img/video-demo/banner_video.png">
    <div class="video-opacity"></div>
    <div class="video-controller">
        <div>
            ►
        </div>
    </div>
    <div class="video-text">
        <div>LA IGLESIA ESTÁ CAMBIANDO</div>
    </div>
    <div class="video-search">
        <div class="input-search">
            <div>
                <input type="text" placeholder="<?= $this->lang->line('search_one_video') ?>">
                <button>
                    <a href="javascript:void(0)">
                        <i class="icon-search3"></i>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>

 <style type="text/css">
     .opacity-section{
         background: url('<?= URL_TEMPLATEALTAR ?>img/video-demo/img_concept_normal@2x.jpg') no-repeat;
         /*background-attachment: fixed;*/
         background-position: center center;
         background-size: cover;
     }
 </style>

<div class="opacity-section">
    <div class="opacity">
        <div clas="container">
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-2" style="margin-top: 12px;">
                    <h1 style="font-size:33px;margin-top: -7px;">Un nuevo</h1>
                    <h1 style="margin-top: -38px;">concepto</h1>
                    <div class="vertical-line2"></div>
                </div>
                <div class="col-md-6" style="margin-top: 12px;">
                    <div style="color: black;padding-top: 3px;">
                        Creyendo que cada iglesia merece acceso a contenido profesional que conecte con sus audiencias y glorifique a Dios, decidieron hacer algo al tanto.
                        <br/>
                        <br/>
                        Creative Altar es el mejor lugar en linea para contenido de videos Cristinaos
                    </div>
                </div>
                <div class="col-md-2">

                </div>
            </div>
        </div>

    </div>
</div>

<!--<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
    <div class="slider-parallax-inner">
        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">

                <?/*= $section1; */?>

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
            <?/*= $this->lang->line('title2') */?> :::::::sdfsdf
        </div>
        <div class="contact-widget">
            <div class="contact-form-result"></div>
            <form class="nobottommargin formularioprincipal" id="template-contactform" name="template-contactform"
                  action="<?/*= ROOT_URL; */?>altar/Ctr_filtervideo/view" method="post" enctype="multipart/form-data">
				  <div class="col_one_third">
                    <input type="text" id="ajax-post-title" name="videoTitle" value="" class="sm-form-control"
                           placeholder="<?/*= $this->lang->line('placeholder1') */?>"/>
                </div>
                <div class="col_one_third ">
                    <select id="videoCategory" name="videoCategory" class="sm-form-control">
                        <option value=""><?/*= $this->lang->line('placeholder2') */?></option>
                        <?/*= $categoryFilter; */?>
                    </select>
                </div>
                <input name="typefilter" value="1" type="hidden"/>
                <div class="col_one_third col_last">
                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                            class="button button-3d button-black nomargin center"><?/*= $this->lang->line('button1') */?></button>
                </div>
            </form>
        </div>
    </div>
</section>-->

<!-- Content
        ============================================= -->

<section id="content">
    <?/*= $section2; */?>
</section>

<section id="content2">
    <?= $section3; ?>

    <br />

    <div class="section-content">
        <button class="default-button">Ver más</button>
    </div>

    <br />

    <?= $video_free; ?>

</section>
 <!--Modal -->
 <div>
     <!-- Modal -->
     <div class="modal fade" id="videoinfo" role="dialog">
         <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4><span class="glyphicon glyphicon-lock"></span> El éxito de la vida</h4>
                 </div>
                 <div class="modal-body">

                     <div class='content-wrap'>
                         <div class=''>
                             <div class='row right-section' style=''>
                                 <div class='col-md-7 image-section-download'>
                                     <div class="image-section-download-canvas">
                                         <a href='<?=ROOT_URL  ?>altar/Ctr_filtervideo/quick_view/<?=$params["id"]?>" class='item-quick-view' data-lightbox='ajax'>
                                         <img class='response-image-left' style="margin-left:0 " src='<?=URL_IMAGES  ?>videos/thumbs/<?=$params["image_thumb"]?>' alt='Video Free'>
                                         </a>
                                         <div class='video-component-section'>
                                             <div>
                                                 ►
                                             </div>
                                         </div>
                                         <div class='opacity'>

                                         </div>
                                     </div>
                                 </div>
                                 <div class='col-md-5 right-section modal-section'>
                                     <div>
                                         Caracteristicas
                                     </div>
                                     <br />
                                     <div class="content-modal-section">
                                         <div>
                                             ID de video: <b>1039835</b>
                                         </div>
                                         <div>
                                             Idioma: <b>Español</b>
                                         </div>
                                         <div>
                                             Categoria: <b>Testimonio, proyectos, personales</b>
                                         </div>
                                         <div>
                                             Autor: <b>Español</b>
                                         </div>
                                         <div>
                                             Duracion del Video: <b>4:12 min</b>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>

                 </div>
                 <div class="modal-footer">
                     <button id='modal_button' class='black-button' data-toggle=\"modal\" data-target=\"#videoinfo\">
                         <?=$this->lang->line('video_download')?>
                     </button>
                 </div>
             </div>
         </div>
     </div>
 </div>

<section id="content3">
    <?/*= $section4; */?>
</section>
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
  