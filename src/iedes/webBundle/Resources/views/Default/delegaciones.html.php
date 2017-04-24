<?php $view->extend('::base.html.php');?>

<div class="container delegaciones espacio_inferior espacio_superior">
    <div class="row">
        <div class="col-xs-12">
            <?php if(isset($sede) && $sede) {
                    //pasamos la sede como un array de una sede (para aprovechar la vista mapa.html.php
                    //por lo que necesitamos coger únicamente el primer elemento del array ?>
            <h1 class="h_1">DELEGACIÓN IEDES EN <?php echo strtoupper($sede[0]->getNombre()) ?></h1>
                <h1 class="centrado"></h1>
            <?php } else { ?>
                <h1 class="h_1">DELEGACIONES IEDES</h1>
            <?php } ?>
            <h2 class="centrado">Ponte en contacto con nosotros<br/>y te asesoraremos sobre tus necesidades energéticas<br/> con un estudio personalizado.</h2>
        </div>
    </div>
</div>
<div class="container container_map">
    <div class="row">
        <div class="col-xs-12">
            <?php if(isset($mapa) && $mapa){
                echo $mapa->getContent();
            }else echo 'No se pudo cargar el mapa';
            ?>
        </div>
    </div>
</div>
<div class="container delegaciones espacio_superior">
    <div class="row">
        <div class="col-xs-12">
            <h1 class="centrado">Tenemos <?php echo count($sedes) ?> delegaciones en España</h1>
            <h2 class="centrado">Localiza tu delegación de iEDES más cercana</h2>
        </div>
    </div>
</div>
<div class="container delegaciones espacio_inferior sedes" >
        <!-- Vista 2 columnas -->
        <?php if(isset($sedes) && $sedes){ 
            $max = count($sedes);
            for ($i=0; $i<count($sedes); $i++){
                $s = $sedes[$i]; ?>
                <div class="row">
                    <div class="col-sm-6 hidden-xs sinpadding">
                        <div class="row">
                            <div class="col-sm-4 sinpadding">
                                <?php if($s->getSedeFisica() === 1){ ?>
                                    <img class="borde" src="/img/delegaciones/<?php echo $s->getNombreBasico() ?>.png" alt="delegación iEDES Solenergy">
                                <?php } else {?>
                                    <img src="/img/delegaciones/logoSede.png" alt="delegación iEDES Solenergy">
                                <?php } ?>
                            </div>
                            <div class="col-sm-8">
                                <h1><a href="<?php echo $view['router']->generate("delegacionesX", array('delegacion' => $s->getNombreBasico()));?>"><?php echo $s->getNombre()?></a></h1>
                                <?php if($s->getSedeFisica() === 1){ ?>
                                    <h2> <?php echo $s->getDireccion()->getRoute() ?></h2>
                                    <h2> <?php echo $s->getDireccion()->getPostalCode() . ', ' . 
                                            $s->getDireccion()->getLocality() . ', ' . $s->getDireccion()->getAdminarea2() ?></h2> 
                                <?php } else { ?>
                                    <h2> <?php echo $s->getDireccion()->getPostalCode() . ', ' . 
                                            $s->getDireccion()->getLocality()?></h2> 
                                <?php } ?>
                                <h2> <a href="tel:<?php echo $s->getTelefono()?>"><?php echo $s->getTelefono()?></a> - <a href='mailto:<?php echo $s->getEmail() ?>'> <?php echo $s->getEmail() ?> </a> </h2>
                            </div>
                        </div>
                    </div>

                    <?php if($i < $max-1) {
                    $s = $sedes[++$i]; ?>
                        <div class="col-sm-6 hidden-xs sinpadding">
                            <div class="row">
                                <div class="col-sm-4 sinpadding">
                                <?php if($s->getSedeFisica() === 1){ ?>
                                    <img class="borde" src="/img/delegaciones/<?php echo $s->getNombreBasico() ?>.png" alt="">
                                <?php } else {?>
                                    <img src="/img/delegaciones/logoSede.png" alt="">
                                <?php } ?>
                            </div>
                                <div class="col-sm-8">
                                    <h1><a href="<?php echo $view['router']->generate("delegacionesX", array('delegacion' => $s->getNombreBasico()));?>"><?php echo $s->getNombre()?></a></h1>
                                    <?php if($s->getSedeFisica() === 1){ ?>
                                        <h2> <?php echo $s->getDireccion()->getRoute() ?></h2>
                                        <h2> <?php echo $s->getDireccion()->getPostalCode() . ', ' . 
                                                $s->getDireccion()->getLocality() . ', ' . $s->getDireccion()->getAdminarea2() ?></h2> 
                                    <?php } else { ?>
                                        <h2> <?php echo $s->getDireccion()->getPostalCode() . ', ' . 
                                                $s->getDireccion()->getLocality() ?></h2> 
                                    <?php } ?>
                                    <h2> <a href="tel:<?php echo $s->getTelefono()?>"><?php echo $s->getTelefono()?></a> - <a href='mailto:<?php echo $s->getEmail() ?>'> <?php echo $s->getEmail() ?> </a> </h2>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>

            <?php } ?>
        <?php } ?>

        <div class="col-xs-12 visible-xs">        
            <?php if(isset($sedes) && $sedes){ 
                for ($i=0; $i<count($sedes); $i++){
                    $s = $sedes[$i];?>
                        <h1><a href="<?php echo $view['router']->generate("delegacionesX", array('delegacion' => $s->getNombre()));?>"><?php echo $s->getNombre()?></a></h1>               
                        <?php if($s->getSedeFisica() === 1){ ?>
                            <h2> <?php echo $s->getDireccion()->getRoute() ?></h2>
                            <h2> <?php echo $s->getDireccion()->getPostalCode() . ', ' . 
                                        $s->getDireccion()->getLocality() . ', ' . $s->getDireccion()->getAdminarea2() ?></h2> 
                        <?php } else { ?>
                            <h2> <?php echo $s->getDireccion()->getPostalCode() . ', ' . 
                                        $s->getDireccion()->getLocality()?></h2> 
                        <?php } ?>
                        <h2> <a href="tel:<?php echo $s->getTelefono()?>"><?php echo $s->getTelefono()?></a> - <a href='mailto:<?php echo $s->getEmail() ?>'> <?php echo $s->getEmail() ?> </a> </h2>
                <?php }
            } ?>
        </div>

    </div>
</div>
