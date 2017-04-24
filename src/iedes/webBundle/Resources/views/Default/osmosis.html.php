<?php $view->extend('::base.html.php');?>

<!-- <script src="/js/jquery.ripples.js"></script> -->

<!-- osmosis -->
<div class="container espacio">

    <!-- <div class="row">

        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-9">
            <h1>SISTEMA DE ÓSMOSIS 2ª GENERACIÓN iEDES</h1>
            <p>La ÓSMOSIS INVERSA es el mejor sistema para obtener AGUA DE CALIDAD libre de sustancias contaminantes como nitrato, nitrito, cal, metales pesados, cloro, disolventes orgánicos, pesticidas y otros muchos más que pueden ser perjudiciales para nuestra SALUD. Es un método natural que no utiliza productos químicos.  Separa las sustancias tóxicas del agua y la convierte en agua saludable para nuestro organismo mediante una membrana semipermable.</p>
            <div class="col-xs-12 visible-xs">
                <div class="cycle-slideshow"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                        <img src="/img/tratamientos-agua/osmosis2gen.png" alt="sistema de ósmosis de segunda generación de iedes solenergy">
                </div>
            </div>
            <p>La manera más cómoda y natural de beber agua de la más alta calidad. Su FÁCIL INSTALACIÓN permite que se adapte perfectamente a tu cocina, incorporando todos los accesorios necesarios para su utilización e instalación. Obtendrás un agua con la que potenciaremos los SABORES NATURALES de toda la comida, altamente diurética y con el adecuado porcentaje de sales minerales. No cargue con pesadas botellas, invierta en calidad y salud con un sistema con el que obtendrá  además AHORRO y FACILIDAD de USO.</p>
        </div>
        <div class="col-sm-5 col-md-4 col-lg-3 hidden-xs">
            <div class="cycle-slideshow "
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img src="/img/tratamientos-agua/osmosis2gen.png" alt="sistema de ósmosis de segunda generación de iedes solenergy">
            </div>
        </div>
    </div>
    
    <div class="separador-gris"></div> -->
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('SISTEMA DE ÓSMOSIS', array(), "agua")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-8"> 
            <div class="textoencuadrotransparente back_deepskyblue">
                <?php echo $view['translator']->trans('Mediante un proceso de filtración de agua', array(), "agua")?>
            </div>
            <div class="col-xs-12 visible-xs">
                <div class="cycle-slideshow"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                        <img src="/img/tratamientos-agua/osmosis3gen.png" alt="sistema de ósmosis de tercera generación de iedes solenergy">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('Estos sistemas no solo han mejorado', array(), "agua")?></p>
            <p><?php echo $view['translator']->trans('El primer filtro de sedimentos', array(), "agua")?></p>
            <p><?php echo $view['translator']->trans('También los filtros de carbón activo', array(), "agua")?></p>
        </div>
        <div class="col-sm-5 col-md-4 hidden-xs">
            <div class="cycle-slideshow "
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img src="/img/tratamientos-agua/osmosis3gen.png" alt="sistema de ósmosis de tercera generación de iedes solenergy">
            </div>
        </div>
    </div>

    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('CARACTERÍSTICAS TÉCNICAS', array(), "agua")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-5 hidden-xs hidden-sm">
            <div class="cycle-slideshow "
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img src="/img/tratamientos-agua/vaso_agua.jpg" alt="sistema de ósmosis de tercera generación de iedes solenergy">
            </div>
        </div>

        <div class="col-xs-12 col-md-7">
            
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow "
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img src="/img/tratamientos-agua/vaso_agua.jpg" alt="sistema de ósmosis de tercera generación de iedes solenergy">
            </div>
            </div>
            <ul>
                <li><?php echo $view['translator']->trans('Filtro de sedimentos', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Filtro declorador', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Capacidad de membrana', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Posfiltro', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Producción de agua purificada', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Volumen total del depósito', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Volumen utilizable del depósito', array(), "agua")?></li>
            </ul>
            <p><?php echo $view['translator']->trans('Además para equipos con bomba', array(), "agua")?></p>
            <ul>
                <li><?php echo $view['translator']->trans('Alimentación eléctrica', array(), "agua")?></li>
                <li><?php echo $view['translator']->trans('Certificados de seguridad eléctrica', array(), "agua")?></li>
            </ul>
        </div>
    </div>
    
</div>

<div class="container sinpadding">
    <nav class="navbar-fixed-bottom">
        <div id="aguaBottom" class="container hidden-xs hidden-sm hidden-md hidden-lg">
        </div>
    </nav>
</div>
