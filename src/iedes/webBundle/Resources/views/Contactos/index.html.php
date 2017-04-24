<?php $view->extend('::baseIntranet.html.php'); ?>

<script type="text/javascript" src="/js/autocompleteGoogleApi.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<div class="panel-alert alert-warning" style="display:none;">
    <span>&times;</span>
    <p>Mensaje.</p>
</div>

<div class="container sin-padding">
    <div class="row">
        <div class="col-xs-12 intranet">
            <h3>Opciones</h3>
            <ul>                    
                <li><a href="<?php echo $view['router']->generate("crear_contacto"); ?>"><button class="exit btn-redondeado">Crear contacto</button></a></li>     
                <li><a href="<?php echo $view['router']->generate("intranet"); ?>"><button class="send btn-redondeado">Volver</button></a></li>
            </ul>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 intranet"> 
            <h3>Filtro</h3>
             <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
                <div class="formulario">
                    <form action="<?php echo $view['router']->generate('contactos') ?>" 
                        method="post" 
                        enctype="multipart/form-data">
                        <ul>
                          <li><input type="text"  name="filtro" placeholder="ID, nombre, un apellido, ciudad ó CP" value="<?php if((isset($filtro) && $filtro)) { echo $filtro; } ?>"></li> 
                          <li>
                             <select class="form-control" name="filtroestado" >
                                 <option value="def">Todos los estados</option>
                                 <?php foreach($estados as $e) { ?>
                                    <option value="<?php echo $e->getId() ?>" <?php if(isset($filtro2) && $filtro2 === $e->getId()) { ?> selected <?php } ?> ><?php echo $e->getNombre()?></option>
                                 <?php } ?>     
                             </select>
                          </li> 
                          <li><button name="formFiltroContactos" class="exit btn-redondeado" type="submit">Filtro</button></li>             
                        </ul>
                    </form>
                </div>
             </div>
        </div>
    </div>
    <div class="container-fluid">
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
                                }?>
                                <div class="formulario <?php echo $estado ?>">
                                    <form action="<?php echo $view['router']->generate('contactos', array('idcontacto' => $v->getId())) ?>" 
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
                                                <select id="creador<?php echo $v->getId() ?>" class="form-control" name="creador" <?php if($rol !== 50 && $rol !== 100) { ?> disabled hidden <?php } ?> >
                                                    <option value="def">- Creador -</option>
                                                    <?php foreach($creadores as $c) { ?>
                                                        <option value="<?php echo $c->getId() ?>" <?php if($c === $v->getCreador()) { ?> selected <?php } ?> ><?php echo $c->getNombreCompleto()?></option>
                                                    <?php } ?>
                                                </select>
                                            </li>
                                            <li>
                                                <select id="canal<?php echo $v->getId() ?>" class="form-control" name="canal" <?php if($rol !== 30 && $rol !== 50 && $rol !== 100) { ?> disabled hidden <?php } ?> >
                                                    <?php if($rol === 50 || $rol === 100) { ?>
                                                        <option value="def">- Canal -</option>
                                                        <?php foreach($canales as $canal) { ?>
                                                            <option value="<?php echo $canal->getId() ?>" <?php if($v->getCanal() === $canal) { ?> selected <?php } ?> ><?php echo $canal->getNombre()?></option>
                                                        <?php } ?>
                                                    <?php } else if($rol === 30){ ?>
                                                            <option value="def">- Canal -</option>
                                                            <option value="1" <?php if($v->getCanal() === 1) { ?> selected <?php } ?> >Octavilla</option>
                                                            <option value="11" <?php if($v->getCanal() === 11) { ?> selected <?php } ?> >Promo iPhone</option>
                                                            <option value="16" <?php if($v->getCanal() === 16) { ?> selected <?php } ?> >Rescate</option>
                                                    <?php } else { ?>
                                                            <option value="0">- Canal -</option>
                                                    <?php } ?>
                                                </select>
                                            </li> 
                                            <li><textarea name="notas" rows="10" placeholder="Más notas"></textarea></li>
                                            
                                            <li><button name="formConvertirContacto" class="exit btn-redondeado" type="submit">Convertir en Visita</button></li>   
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
                            <h3>No hay contactos</h3>
                        </div>
                    <?php } else {?>
                        <div class="col-xs-12 intranet">
                            <h3>Use algún filtro para mostrar contactos</h3>
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