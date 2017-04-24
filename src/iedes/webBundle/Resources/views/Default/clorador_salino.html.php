<?php $view->extend('::base.html.php');?>

<!-- Equipos solar termico para el hogar -->
<div class="container espacio">

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('CLORADORES SALINOS', array(), "agua")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2><?php echo $view['translator']->trans('Gracias al avance de la Tecnología', array(), "agua")?></h2>
                <div class="col-xs-12 visible-xs visible-sm">
                    <div class="cycle-slideshow top_imagen_10" 
                        data-cycle-center-vert=true
                        data-cycle-center-horz=true
                        >
                        <img src="/img/fotos-componentes/cloradorsalino_1.jpg" alt="cilindro y centralita">
                    </div>
                </div>
            <p><?php echo $view['translator']->trans('En los últimos años se ha producido un aumento', array(), "agua")?></p>
            <h2><?php echo $view['translator']->trans('Qué es la cloración salina', array(), "agua")?></h2>
            <p><?php echo $view['translator']->trans('Básicamente consiste en la desinfección ', array(), "agua")?></p>
            <p><?php echo $view['translator']->trans('Dicho de un modo sencillo, el clorador salino separa', array(), "agua")?></p>
            <h3>"<?php echo $view['translator']->trans('El cloro genera cada día más enfermedades', array(), "agua")?>"</h3>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/cloradorsalino_1.jpg" alt="cilindro y centralita">
            </div>
        </div>
    </div>

    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('CLORAMINAS', array(), "agua")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-5 hidden-xs hidden-sm">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-fx=fadeout
                data-cycle-timeout=1500
                data-cycle-pause-on-hover="true"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/efectos_salud_0.jpg" alt="efectos cloraminas 0">
                <img src="/img/fotos-componentes/efectos_salud_1.jpg" alt="efectos cloraminas 1">
                <img src="/img/fotos-componentes/efectos_salud_2.jpg" alt="efectos cloraminas 2">
                <img src="/img/fotos-componentes/efectos_salud_3.jpg" alt="efectos cloraminas 3">
                <img src="/img/fotos-componentes/efectos_salud_4.jpg" alt="efectos cloraminas 4">
                <img src="/img/fotos-componentes/efectos_salud_5.jpg" alt="efectos cloraminas 5">
                <img src="/img/fotos-componentes/efectos_salud_6.jpg" alt="efectos cloraminas 6">
            </div>
        </div>

        <div class="col-xs-12 col-md-7">
            <div class="textoencuadrotransparente back_deepskyblue">
                <?php echo $view['translator']->trans('Efectos en la SALUD según la OMS', array(), "agua")?>
            </div>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow " 
                    data-cycle-fx=fadeout
                    data-cycle-timeout=1500
                    data-cycle-pause-on-hover="true"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/efectos_salud_0.jpg" alt="efectos cloraminas 0">
                    <img src="/img/fotos-componentes/efectos_salud_1.jpg" alt="efectos cloraminas 1">
                    <img src="/img/fotos-componentes/efectos_salud_2.jpg" alt="efectos cloraminas 2">
                    <img src="/img/fotos-componentes/efectos_salud_3.jpg" alt="efectos cloraminas 3">
                    <img src="/img/fotos-componentes/efectos_salud_4.jpg" alt="efectos cloraminas 4">
                    <img src="/img/fotos-componentes/efectos_salud_5.jpg" alt="efectos cloraminas 5">
                    <img src="/img/fotos-componentes/efectos_salud_6.jpg" alt="efectos cloraminas 6">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="textoencuadrogrande back_palevioletred">
                <?php echo $view['translator']->trans('Si la concentración de cloro es elevada', array(), "agua")?>
            </div>
            <div class="textoencuadrogrande back_plum">
                <?php echo $view['translator']->trans('Si buceamos en agua clorada', array(), "agua")?>
            </div>
        </div>
    </div>

    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('CÓMO FUNCIONA CLORADOR', array(), "agua")?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="col-xs-12 visible-xs">
                <div class="cycle-slideshow top_imagen_10" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/cloradorsalino_2.jpg" alt="equipo_clorador">
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('Generamos un desinfectante', array(), "agua")?></div>
            <img src="/img/flecha-verde-vertical.png" alt="flecha">
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('A través de la electrólisis', array(), "agua")?></div>
            <img src="/img/flecha-verde-vertical.png" alt="flecha">
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('Automatizamos la piscina', array(), "agua")?></div>
            <img src="/img/flecha-verde-vertical.png" alt="flecha">
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('De forma NATURAL', array(), "agua")?></div>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/cloradorsalino_2.jpg" alt="equipo_clorador">
            </div>
        </div>
    </div>
    
    <div class="separador-gris"></div>
    <div class="textoencuadro back_palevioletred"><?php echo $view['translator']->trans('Sistema portátil', array(), "agua")?></div>

</div>
