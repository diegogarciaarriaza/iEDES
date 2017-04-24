<?php $view->extend('::baseIntranet.html.php'); ?>

<script type="text/javascript" src="/js/autocompleteGoogleApi.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

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
                    <li><a href="<?php echo $view['router']->generate("visitas_menu"); ?>">Visitas</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- fin menu navegacion -->

<div class="container sin-padding">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 intranet"> 
                <h3>Listado de Posibles Rescates</h3>

                 <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
                    <div class="formulario">
                        <form action="<?php echo $view['router']->generate('rescatar_visita') ?>" 
                            method="post" 
                            enctype="multipart/form-data">
                            <ul>
                              <li><input type="text"  name="filtro" placeholder="ID, nombre, un apellido, ciudad ó CP" value="<?php if(isset($filtro)) { echo $filtro; } ?>"></li> 
                              <li>
                                 <select class="form-control" name="filtroestado" >
                                     <option value="def">Todos los estados</option>
                                     <option value="100" <?php if(isset($filtro2) && $filtro2 == 100) { ?> selected <?php } ?> >Aún sin estado</option>                                    
                                     <?php foreach($estados as $e) { ?>
                                        <option value="<?php echo $e->getId() ?>" <?php if(isset($filtro2) && $filtro2 === $e->getId()) { ?> selected <?php } ?> ><?php echo $e->getNombre()?></option>
                                     <?php } ?>     
                                 </select>
                              </li> 
                              <li>
                                <select class="form-control" name="filtroresultado" >
                                    <option value="def">Todos los resultados</option>
                                    <option value="100" <?php if(isset($filtro3) && $filtro3 == 100) { ?> selected <?php } ?> >Aún sin resultado</option>
                                    <?php foreach($resultados as $e) { ?>
                                        <option value="<?php echo $e->getId() ?>" <?php if(isset($filtro3) && $filtro3 === $e->getId()) { ?> selected <?php } ?> ><?php echo $e->getNombre()?></option>
                                    <?php } ?>     
                                </select>
                             </li> 
                              <li><button name="formFiltroRescates" class="exit btn-redondeado" type="submit">Filtro</button></li>             
                            </ul>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 intranet">   
                    <?php if (isset($lblres) && $lblres) { ?>
                        <h4><?php echo $lblres ?></h4>
                    <?php } ?>
                    <?php
                    if (isset($visitas) && $visitas) {
                        $i = 0;
                        foreach ($visitas as $v) {
                            $i = $i + 1;
                            ?>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <?php $estado = "estado";
                                if($v->getEstadoContactos()) {
                                    $estado = "estado" . $v->getEstadoContactos()->getId();
                                }
                                $resultado = "resultado";
                                if($v->getResultadoVisitas()) {
                                    $resultado = "resultado" . $v->getResultadoVisitas()->getId();
                                }?>
                                <div class="formulario <?php echo $estado ?> <?php echo $resultado ?>">
                                    <form action="<?php echo $view['router']->generate('rescatar_visita', array('idvisita' => $v->getId())) ?>" 
                                          method="post" 
                                          onSubmit="return validarVisita('canal<?php echo $v->getId() ?>')"
                                          enctype="multipart/form-data">
                                        <div class="datos-texto">
                                            <ul>
                                            <li><b>ID:</b> <?php echo $v->getId(); ?></li>
                                            <?php if($v->getNombre()) { ?>
                                                <li><b>Nombre:</b> <?php echo $v->getNombreCompleto(); ?></li>
                                            <?php } else { ?>
                                                <li><b>Nombre:</b></li>
                                            <?php } ?>
                                            <li><b>Teléfono:</b> 
                                                <a href="tel:<?php echo $v->getTelefono1();?>"><span itemprop="tel"><?php echo $v->getTelefono1();?></span></a>
                                                - 
                                                <a href="tel:<?php echo $v->getTelefono2();?>"><span itemprop="tel"><?php echo $v->getTelefono2();?></span></a>
                                            </li>
                                            
                                            <li class="datos-direccion"><b>Dirección:</b> <?php echo $v->getDireccion(); ?></li>
                                            <li><b>Email:</b> <?php echo $v->getEmail(); ?></li>
                                            <li><b>Miembros:</b> <?php echo $v->getMiembros(); ?></li>
                                            <?php if($v->getFechaCierre()){ ?>
                                                <li><b>Fecha de Cierre:</b> <?php echo $v->getFechaCierre()->format('d-m-Y H:i:s'); ?></li>
                                            <?php } ?>
                                            <?php if($v->getFechaVisita()) { ?>
                                                <li><b>Fecha de último contacto:</b> <?php echo $v->getFechaVisita()->format('d-m-Y H:i:s'); ?></li>
                                            <?php } ?>
                                            <li><b>Datos Técnicos:</b> 
                                                <?php if($v->getTermogas()) echo 'Termo de Gas. ' ?> 
                                                <?php if($v->getCaldera()) echo 'Caldera. ' ?> 
                                                <?php if($v->getEquipoexterno()) echo 'Equipo Externo. ' ?> 
                                                <?php if($v->getTermoelectrico()) echo 'Termo Eléctrico. ' ?> 
                                            </li>
                                            <li><b>Notas:</b> <?php echo $v->getNotas(); ?></li>
                                            <?php if($v->getResultadoVisitas()) { ?>
                                                <li><b>Resultado visita:</b> <?php echo $v->getResultadoVisitas()->getNombre(); ?></li>
                                            <?php } ?>
                                            <?php if($v->getEstadoContactos()) { ?>
                                                <li><b>Estado llamada:</b> <?php echo $v->getEstadoContactos()->getNombre(); ?></li>
                                            <?php } ?>
                                        </ul>
                                        </div>
                                        <div class="col-xs-6 sinpadding">
                                            <ul>
                                                <li><input type="date" name="fecha"></li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 sinpadding">
                                            <ul>
                                                <li><input type="time" name="hora"></li>
                                            </ul>
                                        </div>
                                        <ul>
                                            <li>
                                                <select id="recuperador<?php echo $v->getId() ?>" class="form-control" name="recuperador" <?php if($rol !== 50 && $rol !== 100) { ?> disabled hidden <?php } ?> >
                                                    <option value="def">- Rescatador -</option>
                                                    <?php foreach($rescatadores as $r) { ?>
                                                        <option value="<?php echo $r->getId() ?>" <?php if($r === $v->getRescatador()) { ?> selected <?php } ?> ><?php echo $r->getNombreCompleto()?></option>
                                                    <?php } ?>
                                                </select>
                                            </li>
                                            <li><textarea name="notas" rows="10" placeholder="Más notas"></textarea></li>
                                            
                                            <li><button name="formRecuperarVisita" class="exit btn-redondeado" type="submit">Recuperar Visita</button></li>   
                                            <li>
                                                <select id="estado<?php echo $v->getId() ?>" class="form-control" name="estado" > >
                                                    <option value="def">- Estado Contacto -</option>
                                                    <?php foreach($estados as $e) { ?>
                                                        <option value="<?php echo $e->getId() ?>" <?php if($v->getEstadoContactos() === $e) { ?> selected <?php } ?> ><?php echo $e->getNombre()?></option>
                                                    <?php } ?>     
                                                </select>
                                            </li> 
                                            <li><button name="formActualizarEstado" class="exit btn-redondeado" type="submit">Actualizar estado</button></li>    
                                        </ul>
                                        <!--campos ocultos-->
                                        <ul>
                                            <li>
                                                <input name="filtro" value="<?php if(isset($filtro)) { echo $filtro; } ?>" hidden />
                                                <input name="filtroestado" value="<?php if(isset($filtro2)) { echo $filtro2; } ?>" hidden />
                                                
                                                <input name="formlcroute" id="formlcroute" value="<?php echo $v->getDireccion()->getRoute(); ?>" hidden />
                                                <input name="formlcstreet_number" id="formlcstreet_number" value="<?php echo $v->getDireccion()->getStreetNumber(); ?>" hidden />
                                                <input name="formlcpostal_code" id="formlcpostal_code" value="<?php echo $v->getDireccion()->getPostalCode(); ?>" hidden/>
                                                <input name="formlclocality" id="formlclocality" value="<?php echo $v->getDireccion()->getLocality(); ?>" hidden/>
                                                <input name="formlcadministrative_area_level_3" id="formlcadministrative_area_level_3" value="<?php echo $v->getDireccion()->getAdminarea3(); ?>" hidden/>
                                                <input name="formlcadministrative_area_level_2" id="formlcadministrative_area_level_2" value="<?php echo $v->getDireccion()->getAdminarea2(); ?>" hidden/>
                                                <input name="formlcadministrative_area_level_1" id="formlcadministrative_area_level_1" value="<?php echo $v->getDireccion()->getAdminarea1(); ?>" hidden/>
                                                <input name="formlccountry" id="formlccountry" value="<?php echo $v->getDireccion()->getCountry(); ?>" hidden/>  
                                            </li>
                                        </ul>
                                    </form>
                                    <?php if($rol === 50 || $rol === 100) { ?>
                                        <form action="<?php echo $view['router']->generate('editar_visita', array('idvisita' => $v->getId())) ?>" 
                                              method="post" 
                                              onSubmit="return validarVisita('visita<?php echo $v->getId() ?>')"
                                              enctype="multipart/form-data">
                                            <ul>
                                                <li><button name="formListadoVisita" class="exit btn-redondeado" type="submit">Editar Contacto</button></li>             
                                            </ul>
                                        </form>
                                    <?php } ?>
                                </div>

                            </div>
                          
                            <?php if ($i % 2 == 0) { ?>
                                <div class="clearfix "></div>
                            <?php } ?>
                        <?php }
                    }
                    else if(isset($visitas)){?>
                        <div class="col-xs-12 intranet">
                            <h3>No hay visitas para rescatar</h3>
                        </div>
                    <?php } else {?>
                        <div class="col-xs-12 intranet">
                            <h3>Use algún filtro para mostrar visitas a rescatar</h3>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
    
<script>
    function validarVisita(canal, deleg){    
        var mensaje = "";
        var valido = true;

        if ($('#'+canal).val() === 'def') {
            mensaje = mensaje + "<p>Introduce un canal válido</p>";
            valido = false;
        }

        if (!valido)
        {
            $(".panel-alert p").html(mensaje);
            $(".panel-alert").show();
        }

        return valido;
    }
</script>

 <?php if (isset($errors) && $errors) { 
    $msg = "";
    foreach ($errors as $e) {
        $msg = $msg . '<p>' . $e . '</p>';
    } ?>
    <script>
        $(".panel-alert").removeClass("alert-warning");
        $(".panel-alert").removeClass("alert-success");
        $(".panel-alert").addClass("alert-danger");
        $(".panel-alert p").html("<?php echo $msg ?>");
        $(".panel-alert").show();
    </script>
 <?php } ?>

<?php if (isset($ok) && $ok) { ?>
    <script>
        $(".panel-alert").removeClass("alert-warning");
        $(".panel-alert").removeClass("alert-danger");
        $(".panel-alert").addClass("alert-success");
        $(".panel-alert p").html('</p><?php echo $ok ?></p>');
        $(".panel-alert").show();
    </script>
<?php } ?>

    <script>
        $(document).ready(function() { 
            <?php if (isset($visitas) && $visitas) { 
                    foreach ($visitas as $v) { ?> 
                        initialize("<?php echo $v->getId() ?>formlc");
                    <?php } 
                } ?>

            $(document).on("click", ".panel-alert span", function() {
                $(".panel-alert").hide();
            });

            var altura_col = 0;

            $(".col-visitas").each(function() {
                if ($(this).height() > altura_col)
                {
                    altura_col = $(this).height();
                }
            });

            $(".col-visitas").height(altura_col);
        });
    </script>