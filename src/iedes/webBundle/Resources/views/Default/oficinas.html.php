<?php $view->extend('::base.html.php');?>

<div class="container espacio_inferior">
    <div class="row">
        <h1>DELEGACIONES IEDES</h1>
        <h2>Más de 20 delegaciones repartidas por toda España. <br/>
            Póngase en contacto con nosotros y le asesoraremos sobre sus necesidades energéticas, con un estudio personalizado.</h2>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php if(isset($mapa) && $mapa){
            echo $mapa->getContent();
        }else            echo 'No se pudo cargar el mapa';
        ?>
    </div>
</div>
<div class="container espacio_superior">
    <div class="row">
        <h1>Tenemos 6 sedes en españa</h1>
        <h2>Localiza tu sedes de IEDES más cercana</h2>
    </div>
</div>
<div class="container espacio_inferior sedes" >
    <?php if(isset($sedes) && $sedes){ 
        for ($i=0; $i<count($sedes); $i++){
            $s = $sedes[$i];?>
            <table>
                <tr>
                    <td>
                        <h1><a href="<?php echo $view['router']->generate("oficinaX", array('oficina' => $s->getNombre()));?>"><?php echo $s->getNombre()?></a></h1>               
                        <h2> <?php echo $s->getDireccion()->getRoute() . ', ' . $s->getDireccion()->getPostalCode() . ', ' . 
                                        $s->getDireccion()->getLocality() . ', ' . $s->getDireccion()->getAdminarea2() ?></h2> 
                        <h2> <a href="tel:<?php echo $s->getTelefono()?>"><?php echo $s->getTelefono()?></a> - <a href='mailto:<?php echo $s->getEmail() ?>'> <?php echo $s->getEmail() ?> </a> </h2>
                    </td>
                    <td>
                        <?php $i++;
                        $s = $sedes[$i];?>
                        <h1><a href="<?php echo $view['router']->generate("oficinaX", array('oficina' => $s->getNombre()));?>"><?php echo $s->getNombre()?></a></h1>               
                        <h2> <?php echo $s->getDireccion()->getRoute() . ', ' . $s->getDireccion()->getPostalCode() . ', ' . 
                                        $s->getDireccion()->getLocality() . ', ' . $s->getDireccion()->getAdminarea2() ?></h2> 
                        <h2> <a href="tel:<?php echo $s->getTelefono()?>"><?php echo $s->getTelefono()?></a> - <a href='mailto:<?php echo $s->getEmail() ?>'> <?php echo $s->getEmail() ?> </a> </h2>
                    </td>
                <tr>
            </table>
        <?php }
    } ?>
</div>