<?php include("includes/header.php"); ?>

  
  <section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
    <div class="slider-parallax-inner">
      <div class="swiper-container swiper-parent">
        <div class="swiper-wrapper">
          <div class="swiper-slide dark">
            <div class="container clearfix">
              <div class="slider-caption slider-caption-center">
                <h2 class="respondemesta" data-caption-animate="fadeInUp">Historias asombrosas en video </h2>
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
         
        </div>

        <div id="slide-number">
          <div id="slide-number-current"></div>
          <span>/</span>
          <div id="slide-number-total"></div>
        </div>
      </div>
    </div>
    <div class="creativealtar">
      <div class="nobottommargin center">
        <h4 class="notopmargin exclusive-content"><span class="light thin">Encuentra contenido exclusivo de</span><strong> CREATIVE</strong> ALTAR</h4>
      </div>
      <div class="contact-widget">
        <div class="contact-form-result"></div>
        <form class="nobottommargin formularioprincipal" id="template-contactform" name="template-contactform" action="resultadodebusqyeda.php" method="post" enctype="multipart/form-data">
          <div class="col_one_third">
            <input type="text" id="template-contactform-subject" name="template-contactform-subject" value="" class="sm-form-control" placeholder="Buscar material" />
          </div>
          <div class="col_one_third">
            <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
              <option value="">- Categoría -</option>
              <option value="Humorístico">Humorístico</option>
              <option value="Inspiración">Inspiración</option>
              <option value="Invitaciones">Invitaciones</option>
              <option value="historia de vida">historia de vida</option>
            </select>
          </div>
          <div class="col_one_third col_last">
            <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
              <option value="">- Productores -</option>
              <option value="Aduio">Aduio</option>
              <option value="Video">Video</option>
 
            </select>
          </div>
          <div class="col_full center">
            <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d button-black nomargin center">Realizar búsqueda</button>
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
        <h1>Categorías</h1>
        <h5 class="notopmargin light">--Disfruta del contenido que tenemos para ti</h5>
      </div>
      <div class="container clearfix">
      <div id="portfolio" class="portfolio grid-container portfolio-3 portfolio-masonry clearfix">

						<article class="portfolio-item pf-media pf-icons">
							<div class="portfolio-image">
								<a href="categoria.phpl">
									<img src="img/gallery_categorias_1.jpg" alt="Open Imagination">
								</a>
								<div class="portfolio-overlay">
									<a href="categoria.php" class="right-icon"><i class="icon-line-plus"></i></a>
									<h4>Categoría</h4>
								</div>
							</div>
							
						</article>

						<article class="portfolio-item pf-illustrations">
							<div class="portfolio-image">
								<a href="categoria.phpl">
									<img src="img/gallery_categorias_2.jpg" alt="Locked Steel Gate">
								</a>
								<div class="portfolio-overlay">
									<a href="categoria.php" class="right-icon"><i class="icon-line-plus"></i></a>
									<h4>Categoría</h4>
								</div>
							</div>
							
						</article>

						<article class="portfolio-item pf-graphics pf-uielements">
							<div class="portfolio-image">
								<a href="categoria.phpl">
									<img src="img/gallery_categorias_3.jpg" alt="Mac Sunglasses">
								</a>
								<div class="portfolio-overlay">
									<a href="categoria.php" class="right-icon"><i class="icon-line-plus"></i></a>
									<h4>Categoría</h4>
								</div>
							</div>
							
						</article>

						
						<article class="portfolio-item pf-uielements pf-media">
							<div class="portfolio-image">
								<a href="categoria.phpl">
									<img src="img/gallery_categorias_4.jpg" alt="Console Activity">
								</a>
								<div class="portfolio-overlay">
									<a href="categoria.php" class="right-icon"><i class="icon-line-plus"></i></a>
									<h4>Categoría</h4>
								</div>
							</div>
							
						</article>

						

						<article class="portfolio-item pf-uielements pf-icons">
							<div class="portfolio-image">
								<a href="categoria.phpl">
									<img src="img/gallery_categorias_5.jpg" alt="Backpack Contents">
								</a>
								<div class="portfolio-overlay">
									<a href="categoria.php" class="right-icon"><i class="icon-line-plus"></i></a>
									<h4>Categoría</h4>
								</div>
							</div>
							
						</article>

						<article class="portfolio-item pf-graphics">
							<div class="portfolio-image">
								<a href="categoria.phpl">
									<img src="img/gallery_categorias_6.jpg" alt="Sunset Bulb Glow">
								</a>
								<div class="portfolio-overlay">
									<a href="categoria.php" class="right-icon"><i class="icon-line-plus"></i></a>
									<h4>Categoría</h4>
								</div>
							</div>
							
						</article>

						

					</div><!-- #portfolio end -->
       
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
        <div id="demo-gallery" class="col-3" data-lightbox="gallery">
          <div class="col-md-3 col-sm-6 pf-nuevos">
           <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/1.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"><span class="signopesos">$</span>12.49</div>
									
				    </div>
				</div>
          </div>
          <div class="col-md-3 col-sm-6 pf-populares">
           <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/2.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
          </div>
          <div class="col-md-3 col-sm-6 pf-nuevos">
           <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/3.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
          </div>
          <div class="col-md-3 col-sm-6 pf-populares">
           <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/4.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
          </div>
          <div class="col-md-3 col-sm-6 pf-populares">
            <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/5.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
          </div>
          <div class="col-md-3 col-sm-6 pf-populares">
           <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/6.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
          </div>
          <div class="col-md-3 col-sm-6 pf-populares">
				<div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/7.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
         </div>
          <div class="col-md-3 col-sm-6 pf-populares">
           <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/8.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
           </div>
          <div class="col-md-3 col-sm-6 pf-nuevos">
            <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/9.jpg" alt="Producto"></a>
				       <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
          </div>
          <div class="col-md-3 col-sm-6 pf-populares">
          <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/10.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
           </div>
          <div class="col-md-3 col-sm-6 pf-nuevos">
          <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/11.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
          </div>
          <div class="col-md-3 col-sm-6 pf-populares">
          <div class="product clearfix">
				    <div class="product-image">
				        <a href="producto.php"><img src="img/productos/12.jpg" alt="Producto"></a>
				        <div class="product-overlay">
				            <a href="carrito.php" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Añadir al carrito</span></a>
				            <a href="include/ajax/vistarapida.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span>Vista rápida</span></a>
				        </div>
				    </div>
				    <div class="product-desc center">
				        <div class="product-title"><h3><a href="producto.php">VIDA (PSALM 145)</a></h3></div>
				    <div class="product-price"> <ins><span class="signopesos">$</span>12.49</ins></div>
									
				    </div>
				</div>
            </div>
        </div>
      </div>
    </div>
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="heading-block topmargin-sm center">
          <h1>Descarga gratuita <span class="free-download">de la semana</span></h1>
        </div>
        <div class="col_half bottommargin-sm center"> <img src="img/gallery-filter-image-2.jpg" alt="Iphone"> </div>
        <div class="col_half col_last bottommargin-sm  cnetradoresponsivo col_last">
          <h1 class="nobottommargin topmargin">ESPERANZA</h1>
          <h1 class="free-download">FONDO DEL CORAZÓN</h1>
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
              <div class="input-group divcenter responsivoal100">
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