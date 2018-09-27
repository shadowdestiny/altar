<?php include("includes/header.php"); ?>

  
  <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
    <div class="slider-parallax-inner">
      <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">
          <div class="swiper-slide dark">
            <div class="container clearfix">
              <div class="slider-caption slider-caption-center">
                <h2 data-caption-animate="fadeInUp">Historias asombrosas en video </h2>
              </div>
            </div>
            <div class="video-wrap">
              <video poster="images/videos/explore.jpg" preload="auto" loop autoplay muted>
                <source src='images/videos/explore.mp4' type='video/mp4' />
                <source src='images/videos/explore.webm' type='video/webm' />
              </video>
              <div class="video-overlay"></div>
            </div>
          </div>
          <div class="swiper-slide swiper-slide-image dark">
            <div class="container clearfix">
              <div class="slider-caption slider-caption-center">
                <h2 data-caption-animate="fadeInUp">Historias asombrosas en video</h2>
              </div>
            </div>
          </div>
        </div>
        <div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
        <div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
        <div id="slide-number">
          <div id="slide-number-current"></div>
          <span>/</span>
          <div id="slide-number-total"></div>
        </div>
      </div>
    </div>
    <div class="creativealtar">
      <div class="nobottommargin center">
        <h4 class="notopmargin exclusive-content"><span class="light thin">Encuentra contenido exclusivo de</span><strong> CREATIVE</strong>ALTAR</h4>
      </div>
      <div class="contact-widget">
        <div class=""></div>
        <form class="nobottommargin"  action="resultadodebusqueda.php" method="post" >
          <div class="col_one_third">
            <input type="text"  value="" class="sm-form-control" placeholder="Buscar material" />
          </div>
          <div class="col_one_third">
            <select  class="sm-form-control">
              <option value="">- Categoría -</option>
              <option value="Humoristico">Humorístico</option>
              <option value="Inspiracion">Inspiración</option>
              <option value="Invitaciones">Invitaciones</option>
              <option value="Historia de vida">Historia de vida</option>
              <option value="Reflexivo">Reflexivo</option>
              <option value="Intros de sermones">Intros de sermones</option>
              <option value="Español">Español</option>
              <option value="Skits">Skits</option>
              <option value="Intros de culto">Intros de culto</option>
            </select>
          </div>
          <div class="col_one_third col_last">
            <select  class="sm-form-control">
              <option value="">- Productos -</option>
              <option value="Video">Video</option>
              <option value="Audio">Audio</option>
            </select>
          </div>
          <div class="col_full center">
            <button name="submit" type="submit" id="submit-button" value="Submit" class="button button-3d button-black nomargin center" >Realizar búsqueda</button>
          </div>
        </form>
        
        
         </div>
    </div>
  </section>
  
  <!-- Content
          ============================================= -->
  
  <section id="content">
    <div class="content-wrap categories-creativealtar">
      <div class="container bottommargin center">
        <h1>CATEGORÍAS</h1>
        <h5 class="notopmargin light">Disfruta de nuevo contenido, puedes descragarlos y verlos cuando tu quieras</h5>
      </div>
      <div class="container clearfix">
        <div class="masonry-thumbs col-3" data-big="2"> 
        <a href="categoria.php" data-lightbox="gallery-item">
            <div class="categoriahover">sadadasdasdasda</div>
            <img class="image_fade" src="img/gallery_categorias_1.jpg" alt="Gallery Thumb 1">
        </a> 
        <a href="categoria.php" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery_categorias_2.jpg" alt="Gallery Thumb 2"></a> 
        <a href="categoria.php" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery_categorias_3.jpg" alt="Gallery Thumb 3"></a> 
        <a href="categoria.php" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery_categorias_4.jpg" alt="Gallery Thumb 4"></a> 
        <a href="categoria.php" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery_categorias_5.jpg" alt="Gallery Thumb 5"></a> 
        <a href="categoria.php" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery_categorias_6.jpg" alt="Gallery Thumb 6"></a> </div>
      </div>
    </div>
  </section>
  <section id="content">
    <div class="content-wrap parallax" style="background-image: url('img/home-testi-bg-1.jpg');" data-stellar-background-ratio="0.3">
      <div class="topmargin-sm center">
        <h1 class="last-content nobottommargin">CONOCE NUESTRO</h1>
        <h1>ÚLTIMO CONTENIDO</h1>
      </div>
      <div class="container clearfix"> 
        
        <!-- Portfolio Filter
                      ============================================= -->
        <ul id="portfolio-filter" class="portfolio-filter clearfix">
          <li class="activeFilter"><a href="#" data-filter="*">Todos</a></li>
          <li><a href="#" data-filter=".pf-nuevos">Nuevos</a></li>
          <li><a href="#" data-filter=".pf-populares">Populares</a></li>
        </ul>
        <!-- #portfolio-filter end -->
        
        <div class="clear"></div>
        <div id="demo-gallery" class="col-3" data-big="2" data-lightbox="gallery">
          <div class="col-md-3 pf-nuevos"><a href="img/gallery-filter-image-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-1.jpg" alt="Gallery Thumb 1">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3 pf-populares"><a href="img/gallery-filter-image-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-1.jpg" alt="Gallery Thumb 2">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3 pf-nuevos"><a href="img/gallery-filter-image-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-1.jpg" alt="Gallery Thumb 3">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3  pf-populares"><a href="img/gallery-filter-image-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-1.jpg" alt="Gallery Thumb 4">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3  pf-populares"><a href="img/gallery-filter-image-2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-2.jpg" alt="Gallery Thumb 4">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3  pf-populares"><a href="img/gallery-filter-image-2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-2.jpg" alt="Gallery Thumb 4">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3  pf-populares"><a href="img/gallery-filter-image-2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-2.jpg" alt="Gallery Thumb 4">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3  pf-populares"><a href="img/gallery-filter-image-2.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-2.jpg" alt="Gallery Thumb 4">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3 pf-nuevos"><a href="img/gallery-filter-image-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-1.jpg" alt="Gallery Thumb 1">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3 pf-populares"><a href="img/gallery-filter-image-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-1.jpg" alt="Gallery Thumb 2">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3 pf-nuevos"><a href="img/gallery-filter-image-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-1.jpg" alt="Gallery Thumb 3">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
          <div class="col-md-3  pf-populares"><a href="img/gallery-filter-image-1.jpg" data-lightbox="gallery-item"><img class="image_fade" src="img/gallery-filter-image-1.jpg" alt="Gallery Thumb 4">
            <h4 class="center nobottommargin topmargin-sm"><a href="producto.php">STEAMPUNK COUNTDOWN</a></h4>
            <h5 class="center"><a href="categoria.php">Playback Media</a></h5>
            </a></div>
        </div>
      </div>
    </div>
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="heading-block topmargin-sm center">
          <h1>Descarga gratuita <span class="free-download">de la semana</span></h1>
        </div>
        <div class="col_half bottommargin-sm center"> <img src="img/gallery-filter-image-2.jpg" alt="Iphone"> </div>
        <div class="col_half col_last bottommargin-sm col_last">
          <h1 class="nobottommargin topmargin">FAITHFULNESS</h1>
          <h1 class="free-download">HILLSONG WORSHIP</h1>
          <a href="#" class="button button-3d button-rounded button-black noleftmargin notopmargin">DESCARGAR</a> </div>
      </div>
    </div>
    <div class="section parallax dark nobottommargin newsletter" style="background-image: url('img/gallery-masonry-home-2.jpg');" data-stellar-background-ratio="0.1">
      <div class="container clearfix">
        <div class="center">
          <h3>Suscríbete a nuestro newsletter</h3>
          <span>Recibe promociones exclusivas</span>
          <div id="subscriber" class="widget subscribe-widget clearfix col_full center newsletter_creativealtar">
            <form action="#" role="form" class="notopmargin nobottommargin">
              <div class="input-group divcenter">
                <input type="text" class="form-control" placeholder="Correo electrónico" required="">
              </div>
              <div class="widget-subscribe-form-result"></div>
              <a href="#" class="button button-3d button-rounded button-black noleftmargin topmargin-sm">SUSCRIBIRME</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #content end --> 
  <?php include("includes/footer.php"); ?>