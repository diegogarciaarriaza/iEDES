<?php $view->extend('::base_aqualider.html.php');?>

<section class="main-section paddind" id="Portfolio"><!--main-section-start-->
	<div class="container">
    	<h2><?php echo $view['translator']->trans('Productos', array(), "productos")?></h2>
    	<h6><?php echo $view['translator']->trans('Encuentra aquí el producto que necesitas para ahorrar', array(), "productos")?></h6>
      <div class="portfolioFilter">  
        <ul class="Portfolio-nav wow fadeIn delay-02s">
        	<li><a href="#" data-filter="*" class="current" ><?php echo $view['translator']->trans('Todo', array(), "productos")?></a></li>
            <li><a href="#" data-filter=".aerotermia" ><?php echo $view['translator']->trans('Aerotermia', array(), "productos")?></a></li>
            <li><a href="#" data-filter=".osmosis" ><?php echo $view['translator']->trans('Ósmosis', array(), "productos")?></a></li>
            <li><a href="#" data-filter=".descalcificador" ><?php echo $view['translator']->trans('Descalcificador', array(), "productos")?></a></li>
            <li><a href="#" data-filter=".clorador" ><?php echo $view['translator']->trans('Clorador', array(), "productos")?></a></li>
        </ul>
       </div> 
        
	</div>
    <div class="portfolioContainer wow fadeInUp delay-04s">
            	
                <div class="Portfolio-box osmosis">
                	<a href="#"><img src="/aqualider/img/productos/osmosis3gen.png" alt=""></a>	
                	<h3>Osmosis</h3>
                    <p>Tercera Generación</p>
                </div>
                <div class=" Portfolio-box descalcificador">
                	<a href="#"><img src="/aqualider/img/productos/descalcificador_2.png" alt=""></a>	
                	<h3>Descalcificador</h3>
                    <p>De Bajo Consumo</p>
                </div>
                <div class=" Portfolio-box clorador" >
                	<a href="#"><img src="/aqualider/img/productos/clorador.jpg" alt=""></a>	
                	<h3>Clorador Salino</h3>
                    <p>Para todas las piscinas</p>
                </div>
                <div class=" Portfolio-box aerotermia">
                	<a class="view-pdf" href="/aqualider/pdf/fichas_tecnicas/AquaEco6080110.pdf"><img src="/aqualider/img/productos/Mural60_2.png" alt=""></a>	
                	<h3>Aerotermia</h3>
                    <p>Mural 60 litros</p>
                </div>
                <div class=" Portfolio-box aerotermia">
                	<a class="view-pdf" href="/aqualider/pdf/fichas_tecnicas/AquaEco6080110.pdf"><img src="/aqualider/img/productos/Mural80_2.png" alt=""></a>	
                	<h3>Aerotermia</h3>
                    <p>Mural 80 litros</p>
                </div>
                <div class=" Portfolio-box aerotermia">
                	<a class="view-pdf" href="/aqualider/pdf/fichas_tecnicas/AquaEco6080110.pdf"><img src="/aqualider/img/productos/Mural110_2.png" alt=""></a>	
                	<h3>Aerotermia</h3>
                    <p>Mural 110 litros</p>
                </div>
                <div class=" Portfolio-box aerotermia">
                	<a class="view-pdf" href="/aqualider/pdf/fichas_tecnicas/AquaEco160200260.pdf"><img src="/aqualider/img/productos/Suelo160_2.png" alt=""></a>	
                	<h3>Aerotermia</h3>
                    <p>De suelo 160 litros</p>
                </div>
                <div class=" Portfolio-box aerotermia">
                	<a class="view-pdf" href="/aqualider/pdf/fichas_tecnicas/AquaEco160200260.pdf"><img src="/aqualider/img/productos/Suelo200_2.png" alt=""></a>	
                	<h3>Aerotermia</h3>
                    <p>De suelo 200 litros</p>
                </div>
                <div class=" Portfolio-box aerotermia">
                	<a class="view-pdf" href="/aqualider/pdf/fichas_tecnicas/AquaEco160200260.pdf"><img src="/aqualider/img/productos/Suelo260_2.png" alt=""></a>	
                	<h3>Aerotermia</h3>
                    <p>De suelo 260 litros</p>
                </div>
                <div class=" Portfolio-box aerotermia">
                	<a class="view-pdf" href="/aqualider/pdf/fichas_tecnicas/AquaEco500.pdf"><img src="/aqualider/img/productos/Suelo500_2.png" alt=""></a>	
                	<h3>Aerotermia</h3>
                    <p>De suelo 500 litros</p>
                </div>
    </div>
</section><!--main-section-end-->

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
	});
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
			
            filter: selector
         });
         return false;
    });
  
});

</script>

<script>
/*
* This is the plugin
*/
(function(a){a.createModal=function(b){defaults={title:"",message:"Your Message Goes Here!",closeButton:true,scrollable:false};var b=a.extend({},defaults,b);var c=(b.scrollable===true)?'style="max-height: 420px;overflow-y: auto;"':"";html='<div class="modal fade" id="myModal">';html+='<div class="modal-dialog">';html+='<div class="modal-content">';html+='<div class="modal-header">';html+='<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>';if(b.title.length>0){html+='<h4 class="modal-title">'+b.title+"</h4>"}html+="</div>";html+='<div class="modal-body" '+c+">";html+=b.message;html+="</div>";html+='<div class="modal-footer">';if(b.closeButton===true){html+='<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>'}html+="</div>";html+="</div>";html+="</div>";html+="</div>";a("body").prepend(html);a("#myModal").modal().on("hidden.bs.modal",function(){a(this).remove()})}})(jQuery);

/*
* Here is how you use it
*/
$(function(){    
    $('.view-pdf').on('click',function(){
        var pdf_link = $(this).attr('href');
        //var iframe = '<div class="iframe-container"><iframe src="'+pdf_link+'"></iframe></div>'
        //var iframe = '<object data="'+pdf_link+'" type="application/pdf"><embed src="'+pdf_link+'" type="application/pdf" /></object>'        
        var iframe = '<object type="application/pdf" data="'+pdf_link+'" width="100%" height="500">No Support</object>'
        $.createModal({
            title:'Fichas técnicas',
            message: iframe,
            closeButton:true,
            scrollable:false
        });
        return false;        
    });    
})
</script>