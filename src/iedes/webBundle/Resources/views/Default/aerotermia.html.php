<?php $view->extend('::base.html.php');?>

<!-- Equipos solar termico para el hogar -->
<div class="container espacio">

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('AEROTERMIAS', array(), "renovables")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2><?php echo $view['translator']->trans('Evolución natural de las PLACAS SOLARES', array(), "renovables")?></h2>
                <div class="col-xs-12 visible-xs visible-sm">
                    <div class="cycle-slideshow top_imagen_10" 
                        data-cycle-center-vert=true
                        data-cycle-center-horz=true
                        >
                        <img src="/img/fotos-componentes/aerotermia_1.jpg" alt="aerotermia">
                    </div>
                </div>
            <p><?php echo $view['translator']->trans('Sistema que permite extraer la energía térmica', array(), "renovables")?></p>
            <p><?php echo $view['translator']->trans('Presente desde hace mucho tiempo en el mercado', array(), "renovables")?></p>
            <p><?php echo $view['translator']->trans('Históricamente, se ha optado por la energía', array(), "renovables")?></p>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/aerotermia_1.jpg" alt="aerotermia">
            </div>
        </div>
    </div>

    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('NORMATIVA Y VENTAJAS', array(), "renovables")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-5 hidden-xs hidden-sm">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/aerotermia_normativa.jpg" alt="aerotermia">
            </div>
        </div>

        <div class="col-xs-12 col-md-7">
            <p><?php echo $view['translator']->trans('El CTE especifica', array(), "renovables")?></p>
            <p><?php echo $view['translator']->trans('La principal ventaja, es el ahorro energético', array(), "renovables")?></p>  
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow top_imagen_10" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/aerotermia_normativa.jpg" alt="aerotermia">
                </div>
            </div>
        </div>
    </div>

    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('TRES SENCILLAS PREGUNTAS', array(), "renovables")?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="col-xs-12 visible-xs">
                <div class="cycle-slideshow " 
                    data-cycle-fx=fadeout
                    data-cycle-timeout=1500
                    data-cycle-pause-on-hover="true"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/aerotermia_prefieres_1.jpg" alt="piensa...¿qué prefieres?">
                    <img src="/img/fotos-componentes/aerotermia_prefieres_2.jpg" alt="piensa...¿qué prefieres?">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="textoencuadrogrande back_verde"><?php echo $view['translator']->trans('1. Necesitas agua caliente', array(), "renovables")?></div>
            <div class="textoencuadrogrande back_verde"><?php echo $view['translator']->trans('2. Qué prefieres, seguir pagando bombonas', array(), "renovables")?></div>
            <div class="textoencuadrogrande back_verde"><?php echo $view['translator']->trans('3. Quieres seguir teniendo en casa una energía cara', array(), "renovables")?></div>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow " 
                    data-cycle-fx=fadeout
                    data-cycle-timeout=1500
                    data-cycle-pause-on-hover="true"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/aerotermia_prefieres_1.jpg" alt="piensa...¿qué prefieres?">
                    <img src="/img/fotos-componentes/aerotermia_prefieres_2.jpg" alt="piensa...¿qué prefieres?">
                </div>
        </div>
    </div>
    <div class="textoencuadrogrande back_palevioletred"><?php echo $view['translator']->trans('Te lo instalamos sin obras', array(), "renovables")?></div>

</div>
