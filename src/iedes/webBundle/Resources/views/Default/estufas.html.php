<?php $view->extend('::base.html.php');?>

<!-- <script src="/js/jquery.ripples.js"></script> -->

<!-- calderas -->

<div class="container espacio">

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('CALOR Y AHORRO EN TU HOGAR', array(), "clima")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 hidden-xs hidden-sm">
            <div class="cycle-slideshow" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/biomasa/estufa-pellets2.jpg" alt="estufa de pellets de iedes solenergy">
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <h2><?php echo $view['translator']->trans('Estufa de pellets.', array(), "clima")?></h2>
            <p><?php echo $view['translator']->trans('La estufa de PELLETS de iEDES es', array(), "clima")?></p>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow " 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/biomasa/estufa-pellets2.jpg" alt="estufa de pellets de iedes solenergy">
                </div>
            </div>
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('VENTAJAS ECONÓMICAS', array(), "clima")?></div>
            <ul>
                <li><?php echo $view['translator']->trans('El sistema de pellets es considerablemente', array(), "clima")?></li>
                <li><?php echo $view['translator']->trans('Con pellets podrá tener todo el', array(), "clima")?></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="cycle-slideshow margenes_arriba_abajo"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img src="/img/biomasa/pellets.png" alt="pellets de iedes solenergy">
            </div>
        </div>
    </div>
    <div class="row componentes">
        <div class="col-sm-6 hidden-xs">
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('VENTAJAS EN SEGURIDAD', array(), "clima")?></div>
            <ul>
                <li><?php echo $view['translator']->trans('El pellet almacenado no presenta riesgo de explosión', array(), "clima")?></li>
                <li><?php echo $view['translator']->trans('El pellet almacenado no es volátil', array(), "clima")?></li>
                <li><?php echo $view['translator']->trans('El pellet almacenado no produce olores', array(), "clima")?></li>
                <li><?php echo $view['translator']->trans('La combustión de pellets apenas produce humo', array(), "clima")?></li>
            </ul> 
        </div>
        <div class="col-sm-6 hidden-xs">
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('VENTAJAS ECOLÓGICAS', array(), "clima")?></div>
            <ul>
                <li><?php echo $view['translator']->trans('Se trata de una fuente de energía renovable', array(), "clima")?></li>
                <li><?php echo $view['translator']->trans('El uso del pellet, contribuye a reducir', array(), "clima")?></li>
                <li><?php echo $view['translator']->trans('La combustión del pellet es mucho más', array(), "clima")?></li>
                <li><?php echo $view['translator']->trans('Los residuos de podas y limpias del monte', array(), "clima")?></li>
            </ul> 
        </div>       
    </div>    
    <div class="row">
        <div class="col-xs-12">
            <div class="cycle-slideshow "
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img src="/img/biomasa/opciones-estufas-pellets.png" alt="gama de estufas de pellets de iedes solenergy">
            </div>
        </div>
    </div>
</div>