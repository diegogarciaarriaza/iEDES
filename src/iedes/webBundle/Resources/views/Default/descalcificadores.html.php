<?php $view->extend('::base.html.php');?>

<!-- <script src="/js/jquery.ripples.js"></script> -->

<!-- descalcificadores -->
<div class="container espacio">
    <a name="descalcificadores"></a>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('DESCALCIFICADOR IEDES', array(), "agua")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
            <p><?php echo $view['translator']->trans('Los DESCALCIFICADORES son aparatos', array(), "agua")?></p>
            <div class="col-xs-12 visible-xs">
                <div class="cycle-slideshow" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/tratamientos-agua/descalcificador_2.png" alt="sistema descalcificador de iedes solenergy">
                </div>
            </div>
            <ul>
                <li><?php echo $view['translator']->trans('Protegen las tuberías', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Ayudan a eliminar ese', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Cuidan nuestra piel', array(), "agua")?></li> 
                <li><?php echo $view['translator']->trans('Menos problemas de piel', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Limpieza más fácil de baños', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Mayor vida útil de las cañerías', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Mayor paso de agua', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Ahorro en productos de limpieza', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Menor contaminación ambiental', array(), "agua")?></li>
            </ul>
        </div>
        <div class="col-sm-5 col-md-4 col-lg-3 hidden-xs">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/tratamientos-agua/descalcificador_2.png" alt="sistema descalcificador de iedes solenergy">
            </div>
        </div>
    </div>
</div>

<div class="container sinpadding">
    <nav class="navbar-fixed-bottom">
        <div id="aguaBottom" class="container hidden-xs hidden-sm hidden-md hidden-lg">
        </div>
    </nav>
</div>
