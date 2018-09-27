
  <!-- Footer
          ============================================= -->
  <footer id="footer" class="dark">
    <div class="container"> 
      
      <!-- Footer Widgets
                  ============================================= -->
      <div class="footer-widgets-wrap clearfix">
        
        <div class="col-md-12 col-sm-12 col-xs-12 center">
          <div class="widget clearfix">
            <h4>Síguenos</h4>
            <div class="row">
             
             <div class="redes">
                 
              <div class="col-md-2 clearfix bottommargin-sm"> <a href="#" class="social-icon si-light nobottommargin rightmargin-sm"><i class="icon-facebook"></i> <i class="icon-facebook"></i> </a> </div>
              <div class="col-md-2 clearfix bottommargin-sm"> <a href="#" class="social-icon si-light nobottommargin  rightmargin-sm"><i class="icon-twitter"></i> <i class="icon-twitter"></i> </a> </div>
              <div class="col-md-2 clearfix bottommargin-sm"> <a href="#" class="social-icon si-light nobottommargin  rightmargin-sm"><i class="icon-instagram"></i> <i class="icon-instagram"></i> </a> </div>
              </div>
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