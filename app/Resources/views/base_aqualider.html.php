<?php $view->extend('::resources_aqualider.html.php'); ?>
        
<body>
    <div class="modal inferior fade" id="modalCookies" tabindex="-1" role="dialog" aria-labelledby="modalCookiesLabel" aria-hidden="true" 
         data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Política de cookies de iEDES</h3>
                </div>
                <div class="modal-body">
                    
                    <p><?php echo $view['translator']->trans('iEDES Solenergy puede recopilar', array(), "cookies")?></p>
                    <h4><?php echo $view['translator']->trans('¿Qué es una cookie?', array(), "cookies")?></h4>
                    <p><?php echo $view['translator']->trans('Una Cookie es un pequeño archivo que se almacena en el ordenador', array(), "cookies")?></p>
                    <h4><?php echo $view['translator']->trans('¿Qué tipos de cookies utilizamos?', array(), "cookies")?></h4>

                    <p class="underlined"><?php echo $view['translator']->trans('Según la entidad que la gestiona', array(), "cookies")?></p>

                    <p><?php echo $view['translator']->trans('Cookies propias', array(), "cookies")?></p>
                    <p><?php echo $view['translator']->trans('Cookies de terceros', array(), "cookies")?></p>

                    <p class="underlined"><?php echo $view['translator']->trans('Según el plazo de tiempo que permanecen activadas', array(), "cookies")?></p>

                    <p><?php echo $view['translator']->trans('Cookies de sesión', array(), "cookies")?></p>
                    <p><?php echo $view['translator']->trans('Cookies persistentes', array(), "cookies")?></p>

                    <p class="underlined"><?php echo $view['translator']->trans('Según su finalidad', array(), "cookies")?></p>

                    <p><?php echo $view['translator']->trans('Cookies técnicas', array(), "cookies")?></p>
                    <p><?php echo $view['translator']->trans('Cookies de personalización', array(), "cookies")?></p>
                    <p><?php echo $view['translator']->trans('Cookies de análisis', array(), "cookies")?></p>
                    <p><?php echo $view['translator']->trans('Cookies publicitarias', array(), "cookies")?></p>
                    <p><?php echo $view['translator']->trans('Cookies de publicidad comportamental', array(), "cookies")?></p>

                    <h4><?php echo $view['translator']->trans('¿Cómo puede el Usuario configurar o deshabilitar las cookies?', array(), "cookies")?></h4>

                    <p><?php echo $view['translator']->trans('Puedes permitir, bloquear o eliminar las cookies', array(), "cookies")?></p>
                    <p><?php echo $view['translator']->trans('En los siguientes enlaces tienes a tu disposición', array(), "cookies")?></p>
                    <p><strong>Google Chrome: </strong> <a href="http://support.google.com/chrome/answer/95647?hl=es">http://support.google.com/chrome/answer/95647?hl=es</a></p>
                    <p><strong>Mozilla Firefox: </strong> <a href="http://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we">http://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-que-los-sitios-we</a></p>
                    <p><strong>Internet Explorer: </strong> <a href="http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies">http://windows.microsoft.com/es-es/windows-vista/block-or-allow-cookies</a></p>
                    <p><strong>Safari: </strong> <a href="http://support.apple.com/kb/ph5042?viewlocale=es_es">http://support.apple.com/kb/ph5042?viewlocale=es_es</a></p>
                    <p><strong><?php echo $view['translator']->trans('Safari para IOS (iPhone y iPad)', array(), "cookies")?></strong> <a href="http://support.apple.com/kb/ht1677?viewlocale=es_es">http://support.apple.com/kb/ht1677?viewlocale=es_es</a></p>
                    <p><strong><?php echo $view['translator']->trans('Chrome para Android', array(), "cookies")?></strong> <a href="http://support.google.com/chrome/answer/2392971?hl=es">http://support.google.com/chrome/answer/2392971?hl=es</a></p>


                    <h4><?php echo $view['translator']->trans('Consentimiento', array(), "cookies")?></h4>

                    <p><?php echo $view['translator']->trans('Consentimiento', array(), "cookies")?></p>
                    <p><?php echo $view['translator']->trans('Al navegar y continuar en nuestro website', array(), "cookies")?></p>
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $view['translator']->trans('Aceptar', array(), "cookies")?></button>
            </div>
        </div>
    </div>

    <!-- FIN MODAL COOKIES -->


    <!--inicio codigo de cookies -->
    <div class="container-fluid cookiesSms" id="cookiesId">
        Esta web utiliza cookies, puedes ver nuestra <a href="#" data-toggle="modal" data-target="#modalCookies">la política de cookies aquí.</a> 
        Si continuas navegando estás aceptándola
        <button onclick="controlcookies()">Aceptar</button>
    </div>

    <!-- Fin del código de cookies -->

    <nav class="main-nav-outer" id="test"><!--main-nav-start-->
        <div class="container">
        <ul class="main-nav">
            <li><a href="<?php echo $view['router']->generate("nosotros"); ?>"><?php echo $view['translator']->trans('Nosotros', array(), "index")?></a></li>
            <li><a href="<?php echo $view['router']->generate("productos"); ?>"><?php echo $view['translator']->trans('Productos', array(), "index")?></a></li>
            <li><a href="<?php echo $view['router']->generate("faq"); ?>"><?php echo $view['translator']->trans('FAQ', array(), "index")?></a></li>
            <li class="small-logo"><a href="<?php echo $view['router']->generate("index"); ?>" class="img-header"><img src="/assets/img/logo_footer.png" alt=""></a></li>
            <li><a href="<?php echo $view['router']->generate("porque"); ?>"><?php echo $view['translator']->trans('¿Por qué aqualider?', array(), "index")?></a></li>
            <li><a href="<?php echo $view['router']->generate("contacto"); ?>"><?php echo $view['translator']->trans('Contacto', array(), "index")?></a></li>
        </ul>
        <a class="res-nav_click" href="#"><i class="fa-bars"></i></a>
        </div>
    </nav><!--main-nav-end-->
    
    <!-- ///// Comienzo del content ///// -->
    <section id="seccionPrincipal">
        <?php
        $request = $this->container->get('request');
        $routeName = $request->get('_route');
        $view['router']->generate("index");
        $view['slots']->output('_content')
        ?>
    </section>
    <!-- ///// Fin del header ///// -->
    
    <footer class="footer">
        <div class="container">
            <div class="footer-logo"><a href="#"><img src="/assets/img/logo_footer.png" alt=""></a></div>
            <span class="copyright">&copy; Aqualider. <?php echo $view['translator']->trans('Todos los derechos reservados', array(), "index")?></span>
            <div class="credits">
                <a href="mailto:info@aqualider.es?Subject=Consulta%20desde%20web">info@aqualider.es</a> Tlf: <a href="tel:999999999">999999999</a>
            </div>
            <div class="credits">
                <a href="politicadecookies">Política de cookies</a>
            </div>
        </div>
    </footer>
           
    <!-- SCRIPT CONTROL DE LOCALSTORAGE DE COOKIES -->
    <script type="text/javascript">
        function controlcookies() {
            //ocultamos directamente el mensaje de politica de coockies
            cookiesId.style.display = 'none';

            // si variable no existe se crea (al clicar en Aceptar)
            sessionStorage.controlcookie = (sessionStorage.controlcookie || 0);

            if(sessionStorage.controlcookie == 0){
                cookiesId.style.display = 'inline-block'; // Esconde el mensaje de la politica de cookies
            }

            sessionStorage.controlcookie++; // incrementamos cuenta de la cookie
        }
    </script>
    <!-- FIN SCRIPT DE CONTROL DE LOCALSTORAGE DE COOKIES -->
    
    <script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
</script>

  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100
      }
    );
    wow.init();
  </script>


<script type="text/javascript">
	$(window).load(function(){
		
		$('.main-nav li a, .servicelink').bind('click',function(event){
			var $anchor = $(this);
			
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top - 102
			}, 1500,'easeInOutExpo');
			/*
			if you don't want to use the easing effects:
			$('html, body').stop().animate({
				scrollTop: $($anchor.attr('href')).offset().top
			}, 1000);
			*/
			event.preventDefault();
		});
	})
</script>

<script type="text/javascript">

$(window).load(function(){
  
  
  var $container = $('.portfolioContainer'),
      $body = $('body'),
      colW = 375,
      columns = null;

  
  $container.isotope({
    // disable window resizing
    resizable: true,
    masonry: {
      columnWidth: colW
    }
  });
  
  $(window).smartresize(function(){
    // check if columns has changed
    var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
    if ( currentColumns !== columns ) {
      // set new column count
      columns = currentColumns;
      // apply width to container manually, then trigger relayout
      $container.width( columns * colW )
        .isotope('reLayout');
    }
    
  }).smartresize(); // trigger resize to set container width
  $('.portfolioFilter a').click(function(){
        $('.portfolioFilter .current').removeClass('current');
        $(this).addClass('current');
 
        var selector = $(this).attr('data-filter');
        $container.isotope({
			
            filter: selector,
         });
         return false;
    });
  
});

</script>

</body>

