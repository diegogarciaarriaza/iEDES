<?php $view->extend('::base.html.php');?>

<!-- Equipos solar termico para el hogar -->
<div class="container espacio">

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('A/A SUPERINVERTER', array(), "clima")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2><?php echo $view['translator']->trans('Los modelos superinverter, consumen', array(), "clima")?></h2>
                <div class="col-xs-12 visible-xs visible-sm">
                    <div class="cycle-slideshow top_imagen_10" 
                        data-cycle-center-vert=true
                        data-cycle-center-horz=true
                        >
                        <img src="/img/fotos-componentes/aa_superinverter_1.png" alt="cilindro y centralita">
                    </div>
                </div>
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('FUNCIÓN IFEEL', array(), "clima")?></div>
            <p><?php echo $view['translator']->trans('El mando a distancia incorpora', array(), "clima")?></p>
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('FUNCIÓN AUTO-SWING VERTICAL', array(), "clima")?></div>
            <p><?php echo $view['translator']->trans('La unidad dispone de', array(), "clima")?></p>
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('FUNCIÓN AUTO-DIAGNÓSTICO', array(), "clima")?></div>
            <p><?php echo $view['translator']->trans('El sistema realiza un chequeo', array(), "clima")?></p>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/aa_superinverter_1.png" alt="cilindro y centralita">
            </div>
        </div>
    </div>

    <div class="separador-gris"></div>
    <div class="textoencuadro back_palevioletred"><?php echo $view['translator']->trans('Disponible en varios modelos', array(), "clima")?></div>

</div>
