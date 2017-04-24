<?php $view->extend('::base_aqualider.html.php');?>

<section class="main-section team" id="team"><!--main-section team-start-->
	<div class="container">
        <h2><?php echo $view['translator']->trans('Sobre nosotros', array(), "nosotros")?></h2>
        <h6><?php echo $view['translator']->trans('Desarrollamos calidad', array(), "nosotros")?></h6>
        <div class="team-leader-block clearfix">
            <div class="team-leader-box">
                <div class="team-leader wow fadeInDown delay-03s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="/aqualider/img/research.jpg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-03s"><?php echo $view['translator']->trans('22 años', array(), "nosotros")?></h3>
                <span class="wow fadeInDown delay-03s"><?php echo $view['translator']->trans('Prueba de experiencia', array(), "nosotros")?></span>
                <p class="wow fadeInDown delay-03s"><?php echo $view['translator']->trans('Hace dos décadas', array(), "nosotros")?></p>
            </div>
            <div class="team-leader-box">
                <div class="team-leader  wow fadeInDown delay-06s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="/aqualider/img/meeting.jpg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-06s"><?php echo $view['translator']->trans('Innovación', array(), "nosotros")?></h3>
                <span class="wow fadeInDown delay-06s"><?php echo $view['translator']->trans('Siempre emprendedores', array(), "nosotros")?></span>
                <p class="wow fadeInDown delay-06s"><?php echo $view['translator']->trans('En España no existían otras empresas iguales', array(), "nosotros")?></p>
            </div>
            <div class="team-leader-box">
                <div class="team-leader wow fadeInDown delay-09s"> 
                    <div class="team-leader-shadow"><a href="#"></a></div>
                    <img src="/aqualider/img/calidad.jpeg" alt="">
                    <ul>
                        <li><a href="#" class="fa-twitter"></a></li>
                        <li><a href="#" class="fa-facebook"></a></li>
                        <li><a href="#" class="fa-pinterest"></a></li>
                        <li><a href="#" class="fa-google-plus"></a></li>
                    </ul>
                </div>
                <h3 class="wow fadeInDown delay-09s"><?php echo $view['translator']->trans('Calidad', array(), "nosotros")?></h3>
                <span class="wow fadeInDown delay-09s"><?php echo $view['translator']->trans('Siempre calidad', array(), "nosotros")?></span>
                <p class="wow fadeInDown delay-09s"><?php echo $view['translator']->trans('Nuestra premisa', array(), "nosotros")?></p>
            </div>
        </div>
    </div>
</section><!--main-section team-end-->