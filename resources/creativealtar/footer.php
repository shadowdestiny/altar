
  <!-- Footer
          ============================================= -->
  <footer id="footer" class="dark">
    <div class="container"> 
      
      <!-- Footer Widgets
                  ============================================= -->
      <div class="footer-widgets-wrap clearfix">
        <div class="col_full">
          <div class="col-md-4 col-sm-4 col-xs-12 fleft">
            <div class="widget widget_links clearfix">
              <h4 class="jello">Información</h4>
              <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="acercadenosotros.php">Acerca de nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="ayuda.php">Ayuda</a></li>
                <li><a href="mapadesitio.php">Mapa de sitio</a></li>
                <li><a href="avisodeprivacidad.php">Aviso de privacidad</a></li>
                <li><a href="terminosycondiciones.php">Términos y condiciones</a></li>
              </ul>
            </div><br>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12 fleft">
            <div class="widget widget_links clearfix">
              <h4 class="jello">Categorías</h4>
              <ul>
                <li><a href="categoria.php">Mini Movies</a></li>
                <li><a href="categoria.php">Worship Tracks</a></li>
                <li><a href="categoria.php">Countdowns</a></li>
                <li><a href="categoria.php">Motion Backgrounds</a></li>
                <li><a href="categoria.php">Still Backgrounds</a></li>
                <li><a href="categoria.php">Small Groups</a></li>
                <li><a href="categoria.php">Church Software</a></li>
                <li><a href="categoria.php">Seasonal</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 col_last center">
          <div class="widget clearfix">
            <h4>Síguenos</h4>
            <div class="row">
             
             <div class="redes">
                 
              <div class="col-md-2 clearfix bottommargin-sm"> <a href="#" class="social-icon si-light nobottommargin rightmargin-sm"><i class="icon-facebook"></i> <i class="icon-facebook"></i> </a> </div>
              <div class="col-md-2 clearfix bottommargin-sm"> <a href="#" class="social-icon si-light nobottommargin  rightmargin-sm"><i class="icon-twitter"></i> <i class="icon-twitter"></i> </a> </div>
              <div class="col-md-2 clearfix bottommargin-sm"> <a href="#" class="social-icon si-light nobottommargin  rightmargin-sm"><i class="icon-instagram"></i> <i class="icon-instagram"></i> </a> </div>
              </div>
              <div><a href="#"><img src="img/paypal.png" width="250"></a></div>
            </div>
          </div>
        </div>
      </div>
      <!-- .footer-widgets-wrap end --> 
      
    </div>
    
    <!-- Copyrights
              ============================================= -->
    <div id="copyrights">
      <div class="container clearfix">
        <div class="col_full center footer_creativealtar light"> &copy; 2017 Creative Altar. Todos los derechos Reservados |  Realizado por ABC <a href="https://abcdigital.mx/" target="_blank"> Digital Diseño Web</a> y <a href="https://abcdigital.mx/" target="_blank"> Agencia de Redes Sociales</a><br>
      </div>
      </div>
    </div>
    <!-- #copyrights end --> 
    
  </footer>
  <!-- #footer end --> 
  
</div>
<!-- #wrapper end --> 

<!-- Go To Top
      ============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
      ============================================= --> 
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="js/plugins.js"></script> 

<!-- Footer Scripts
      ============================================= --> 
<script type="text/javascript" src="js/functions.js"></script> 
<script type="text/javascript">
  
          jQuery(window).load(function(){
  
              var $container = $('#demo-gallery');
              $('#portfolio-filter a').click(function(){
                  $('#portfolio-filter li').removeClass('activeFilter');
                  $(this).parent('li').addClass('activeFilter');
                  var selector = $(this).attr('data-filter');
                  $container.isotope({ filter: selector });
                  return false;
              });
  
          });
  
  
      </script>
</body>
</html>