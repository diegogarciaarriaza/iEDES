<?php $view->extend('::baseIntranet.html.php'); ?>

<div class="panel-alert alert-warning" style="display:none;">
    <span>&times;</span>
    <p>Mensaje.</p>
</div>

<!-- Inicio menu navegacion -->
    <div class="container">
        <div class="row ">
            <!-- Visible para lg y md -->
            <div class="col-xs-12 menu_superior menu_izquierda">
                <nav>
                    <ul>
                        <li class="borde_derecho"><a href="#">Ir a:</a></li>                       
                        <li class="borde_derecho"><a href="<?php echo $view['router']->generate("intranet"); ?>">Intranet</a></li>
                        <li class="borde_derecho"><a href="<?php echo $view['router']->generate("usuarios_menu"); ?>">Usuarios</a></li>
                        <li><a href="<?php echo $view['router']->generate("listado_usuario"); ?>">Listado</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- fin menu navegacion -->

    
<?php foreach ($superRes as $superDatos) {

    $pagadas = null;
    $datoss = null;
    
    $arrayVisitas = array();
    $instalaciones6 = null;
    $instalaciones13 = null;
    $entradas = null;
    $otras = null;

    $usuariologueado = $superDatos["usuario"];
    $datosUser = $superDatos["datos"];
    
    if (isset($datosUser["pagadas"])) {$pagadas = $datosUser["pagadas"]; }
    if (isset($datosUser["datoss"])) {$datoss = $datosUser["datoss"];} 
    if (isset($datosUser["instalaciones6"])) {
        $instalaciones6 = $datosUser["instalaciones6"];
        $arrayVisitas["Instalaciones"] = $instalaciones6;
    }
    if (isset($datosUser["instalaciones13"])) {
        $instalaciones13 = $datosUser["instalaciones13"]; 
        $arrayVisitas["Ventas de Extras"] = $instalaciones13;
    }
    if (isset($datosUser["entradas"])) {
        $entradas = $datosUser["entradas"]; 
        $arrayVisitas["Entradas en viviendas"] = $entradas;
    }
    if (isset($datosUser["otras"])) {
        $otras = $datosUser["otras"];
        $arrayVisitas["Otras visitas"] = $otras;
    }
    ?>
    
    <div class="container sin-padding">
        
        <div class="separador-gris"></div>
        <div class="separador-gris"></div>
        <div class="separador-gris"></div>
        <h3 class="rojo"><?= $usuariologueado->getNombreCompleto();?></h3>
        
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-xs-12 col-sm-offset-3 col-sm-6 intranet">
                        
                    <?php if($usuariologueado->getRol() == 32 && isset($pagadas)) { ?>
                        <h3>Visitas ya abonadas en meses anteriores</h3>
                        <table class="table table-striped">
                            <tr>
                                <td>ID</td>
                            </tr>
                            <?php foreach($pagadas as $p){ ?>
                                <tr>
                                    <td><?= $p; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <h4 class="rojo">* Las visitas ya pagadas aparecen directamente descontadas en el cuadro resumen inferior</h4>
                    <?php } ?>
                    
                <h3>Cuadro resumen</h3>
                <?php if($usuariologueado->getRol() == 2) {
                    $rp = 0;
                    foreach ($datoss as $d){
                        if($d["numres"] == 6 && $d["creador"] == $usuariologueado->getId()){
                            $rp = $rp+1;
                        }
                    } ?>
                    <table class="table table-striped">
                        <tr>
                            <td>TOTALES</td>
                            <td>RECURSOS PROPIOS</td>
                            <td>OTROS</td>
                        </tr>
                        <tr>
                            <?php if(isset($instalaciones6)) { ?>
                                <td><?= count($instalaciones6) ?></td>
                            <?php } else { ?>
                                <td>0</td>
                            <?php } ?>
                            <td><?= $rp ?></td>
                            <?php if(isset($instalaciones13)) { ?>
                                <td><?= count($instalaciones13) ?></td>
                            <?php } else { ?>
                                <td>0</td>
                            <?php } ?>
                        </tr>
                    </table>
                <?php } else { ?>
                    <table class="table table-striped">
                        <tr>
                            <td>ENTRADAS</td>
                            <td>INSTALACIONES</td>
                        </tr>
                        <tr>
                            <?php if(isset($entradas) && isset($pagadas)) { ?>
                                <td><?= count($entradas) - count($pagadas) ?></td>
                            <?php } else if(isset($entradas)){ ?>
                                <td><?= count($entradas) ?></td>
                            <?php } else { ?>
                                <td>0</td>
                            <?php } ?>
                            <?php if(isset($instalaciones6)) { ?>
                                <td><?= count($instalaciones6) ?></td>
                            <?php } else { ?>
                                <td>0</td>
                            <?php } ?>
                        </tr>
                    </table>
                <?php }
                
                foreach ($arrayVisitas as $tipo => $datos){ ?>
                    <h3><?= $tipo ?></h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td>ID</td>
                                <td>DÍA INSTALACION</td>
                                <td>DÍA CIERRE</td>
                                <td>RESULTADO</td>
                                <td>CANAL</td>
                                <td>EQUIPO</td>
                                <td>EXTRA_1</td>
                                <td>EXTRA_2</td>
                            </tr>
                            <?php foreach ($datos as $r){ ?>
                                <tr>
                                    <?php if($r["id"] == "") { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $r["id"]; ?></td>
                                    <?php } ?>

                                    <?php if($r["diainstalacion"] == "") { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $r["diainstalacion"]; ?></td>
                                    <?php } ?>

                                    <?php if($r["diacierre"] == "") { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $r["diacierre"]; ?></td>
                                    <?php } ?>

                                    <?php if($r["resultado"] == "") { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $r["resultado"]; ?></td>
                                    <?php } ?>

                                    <?php if($r["canal"] == "") { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $r["canal"]; ?></td>
                                    <?php } ?>

                                    <?php if($r["equipo"] == "") { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $r["equipo"]; ?></td>
                                    <?php } ?>

                                    <?php if($r["extra1"] == "") { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $r["extra1"]; ?></td>
                                    <?php } ?>

                                    <?php if($r["extra2"] == "") { ?>
                                        <td>-</td>
                                    <?php } else { ?>
                                        <td><?= $r["extra2"]; ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php } ?>