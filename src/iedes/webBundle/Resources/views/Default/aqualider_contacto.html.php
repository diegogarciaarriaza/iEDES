<?php $view->extend('::base_aqualider.html.php');?>

<section class="main-section contact" id="contact">
	<h2><?php echo $view['translator']->trans('Contacto', array(), "contacto")?></h2>
        <h6><?php echo $view['translator']->trans('Hable', array(), "contacto")?></h6>
        <div class="row">
        	<div class="col-lg-6 col-sm-7 wow fadeInLeft">
            	<div class="contact-info-box address clearfix">
                	<h3><i class=" icon-map-marker"></i><?php echo $view['translator']->trans('Direccion', array(), "contacto")?></h3>
                	<span><?php echo $view['translator']->trans('Direccion completa', array(), "contacto")?></span>
                </div>
                <div class="contact-info-box phone clearfix">
                	<h3><i class="fa-phone"></i><?php echo $view['translator']->trans('Telefono', array(), "contacto")?></h3>
                	<span>999999999</span>
                </div>
                <div class="contact-info-box email clearfix">
                	<h3><i class="fa-pencil"></i><?php echo $view['translator']->trans('Email', array(), "contacto")?></h3>
                	<span>info@aqualider.es</span>
                </div>
            	<div class="contact-info-box hours clearfix">
                	<h3><i class="fa-clock-o"></i><?php echo $view['translator']->trans('Horario', array(), "contacto")?></h3>
                	<span><strong><?php echo $view['translator']->trans('Lunes - Viernes', array(), "contacto")?></strong> 10am - 7pm<br><strong><?php echo $view['translator']->trans('Sábado - Domingo', array(), "contacto")?></strong> Atención a urgencias.</span>
                </div>
                <ul class="social-link">
                	<li class="twitter"><a href="#"><i class="fa-twitter"></i></a></li>
                    <li class="facebook"><a href="#"><i class="fa-facebook"></i></a></li>
                    <li class="pinterest"><a href="#"><i class="fa-pinterest"></i></a></li>
                    <li class="gplus"><a href="#"><i class="fa-google-plus"></i></a></li>
                    <li class="dribbble"><a href="#"><i class="fa-dribbble"></i></a></li>
                </ul>
            </div>
        	<div class="col-lg-6 col-sm-5 wow fadeInUp delay-05s">
            	<div class="form">
                	
                    <div id="sendmessage"><?php echo $view['translator']->trans('Mensaje enviado', array(), "contacto")?></div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control input-text" id="name" placeholder="<?php echo $view['translator']->trans('Su Nombre', array(), "contacto")?>" data-rule="minlen:4" data-msg="<?php echo $view['translator']->trans('Introduzca al menos 4 caracteres', array(), "contacto")?>" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-text" name="email" id="email" placeholder="<?php echo $view['translator']->trans('Su Email', array(), "contacto")?>" data-rule="email" data-msg="<?php echo $view['translator']->trans('Introduzca un email válido', array(), "contacto")?>" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-text" name="subject" id="subject" placeholder="<?php echo $view['translator']->trans('Asunto', array(), "contacto")?>" data-rule="minlen:4" data-msg="<?php echo $view['translator']->trans('Introduzca al menos 8 caracteres', array(), "contacto")?>" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-text text-area" name="message" rows="5" data-rule="required" data-msg="<?php echo $view['translator']->trans('Por favor escribanos algo', array(), "contacto")?>" placeholder="<?php echo $view['translator']->trans('Mensaje', array(), "contacto")?>"></textarea>
                            <div class="validation"></div>
                        </div>
                        
                        <div class="text-center"><button type="submit" class="input-btn"><?php echo $view['translator']->trans('Enviar Mensaje', array(), "contacto")?></button></div>
                    </form>
                </div>	
            </div>
        </div>
</section>

<section class="business-talking"><!--business-talking-start-->
	<div class="container">
        <p class="client-part-haead wow fadeInDown delay-05">Cádiz, Sevilla, Huelva, Córdoba, Málaga, Granada, Murcia, Girona....</p>
    </div>
</section><!--business-talking-end-->