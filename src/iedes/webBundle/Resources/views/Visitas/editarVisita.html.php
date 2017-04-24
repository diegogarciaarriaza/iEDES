<?php $view->extend('::baseIntranet.html.php'); ?>

<script type="text/javascript" src="/js/autocompleteGoogleApi.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<div class="panel-alert alert-warning" style="display:none;">
    <span>&times;</span>
    <p>Mensaje.</p>
</div>

<div class="container sin-padding">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 intranet">
                <h3>Editar Visita</h3>
                <?php $resultado = "resultado";
                $estado = "estado";
                if($visita->getResultadoVisitas()) {
                    $resultado = "resultado" . $visita->getResultadoVisitas()->getId();
                }
                if($visita->getEstadoContactos()) {
                    $estado = "estado" . $visita->getEstadoContactos()->getId();
                }?>
                <div class="formulario <?php echo $resultado ?> <?php echo $estado ?>">                      
                    <form action="<?php echo $view['router']->generate('editar_visita', array('idvisita' => $visita->getId())) ?>" 
                          method="post" 
                          oninput="Vmiembros.value='Miembros unidad familiar: ' + parseInt(miembros.value), Vinteres.value='Interés: ' + parseInt(interes.value)"
                          onSubmit="return validarVisita()"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <h4>Datos del cliente</h4>
                                <ul>
                                    <li><input type="text"  name="nombre" placeholder="nombre" value="<?php echo $visita->getNombre() ?>" required></li>
                                    <li><input type="text"  name="apellido1" placeholder="apellido1" value="<?php echo $visita->getApellido1() ?>" required></li>  
                                    <li><input type="text"  name="apellido2" placeholder="apellido2" value="<?php echo $visita->getApellido2() ?>" required></li> 
                                    <li><input type="text"  name="telefono1" id="telefono1" placeholder="telefono1" value="<?php echo $visita->getTelefono1() ?>" required></li>
                                    <li><input type="text"  name="telefono2" id="telefono2" value="<?php echo $visita->getTelefono2() ?>" placeholder="telefono2"></li>
                                    <li><input type="text"  name="direccion" placeholder="dirección" value="<?php echo $visita->getDireccion()->getRoute() ?>" required></li>                             
                                    <li><input type="text"  id="formcvautocomplete" name="formcvautocomplete" placeholder="ciudad" value="<?php echo $visita->getDireccion()->getDireccionSinCalle() ?>" required></li>                             
                                    <li><input type="email" name="email" placeholder="email" value="<?php echo $visita->getEmail() ?>" ></li>
                                    <li>
                                        <div class="row sinpadding">
                                            <div class="col-xs-6">
                                             <output name="Vmiembros" for="a">Miembros unidad familiar: <?php echo $visita->getMiembros() ?> </output>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="range" min=1 max=10 id="miembros" name="miembros" value="<?php $visita->getMiembros() ?>"  >
                                            </div>
                                        </div>
                                    </li>
                                    <!--campos ocultos-->
                                    <li>
                                        <input name="formcvroute" id="formcvroute" value="<?php echo $visita->getDireccion()->getRoute(); ?>" hidden />
                                        <input name="formcvstreet_number" id="formcvstreet_number" value="<?php echo $visita->getDireccion()->getStreetNumber(); ?>" hidden />
                                        <input name="formcvpostal_code" id="formcvpostal_code" value="<?php echo $visita->getDireccion()->getPostalCode(); ?>" hidden/>
                                        <input name="formcvlocality" id="formcvlocality" value="<?php echo $visita->getDireccion()->getLocality(); ?>" hidden/>
                                        <input name="formcvadministrative_area_level_3" id="formcvadministrative_area_level_3" value="<?php echo $visita->getDireccion()->getAdminarea3(); ?>" hidden/>
                                        <input name="formcvadministrative_area_level_2" id="formcvadministrative_area_level_2" value="<?php echo $visita->getDireccion()->getAdminarea2(); ?>" hidden/>
                                        <input name="formcvadministrative_area_level_1" id="formcvadministrative_area_level_1" value="<?php echo $visita->getDireccion()->getAdminarea1(); ?>" hidden/>
                                        <input name="formcvcountry" id="formcvcountry" value="<?php echo $visita->getDireccion()->getCountry(); ?>" hidden/>  
                                    </li>
                                </ul>
                            
                                <h4>Datos técnicos</h4>
                                <div class="col-xs-12 col-sm-6 ">
                                    <div class="row sinpadding">
                                        <ul> 
                                            <li><div class="checkbox big"><label><input type="checkbox" name="termogas" value="termogas" <?php if($visita->getTermogas()) { ?> checked <?php } ?>>- Termo de Gas</label></div></li>
                                            <li><div class="checkbox big"><label><input type="checkbox" name="termoelec" value="termoelec" <?php if($visita->getTermoelectrico()) { ?> checked <?php } ?>> - Termo Eléctrico</label></div></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="row sinpadding">
                                        <ul>
                                            <li><div class="checkbox big"><label><input type="checkbox" name="caldera" value="caldera" <?php if($visita->getCaldera()) { ?> checked <?php } ?>>- Caldera</label></div></li>
                                            <li><div class="checkbox big"><label><input type="checkbox" name="externo" value="externo" <?php if($visita->getEquipoexterno()) { ?> checked <?php } ?>>- Equipo Externo</label></div></li>                                                          
                                        </ul>
                                    </div>
                                </div> 
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <h4>Datos de la visita</h4>
                                <div class="col-xs-6 sinpadding">
                                    <ul>
                                        <li><input type="date" name="fecha" <?php if($visita->getFechaVisita()) { ?> value="<?php echo $visita->getFechaVisita()->format('Y-m-d') ?>" <?php } ?> ></li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 sinpadding">
                                    <ul>
                                        <li><input type="time" name="hora" <?php if($visita->getFechaVisita()) { ?> value="<?php echo $visita->getFechaVisita()->format('H:i') ?>" <?php } ?> ></li>
                                    </ul>
                                </div>
                                <ul>
                                    <?php if($rol === 50 || $rol === 100) { ?>
                                        <li>
                                            <select class="form-control" name="creador">
                                                <option value="def">- Creador -</option>
                                                <?php foreach($creadores as $c) { ?>
                                                    <option value="<?php echo $c->getId() ?>" <?php if($c === $visita->getCreador()) { ?> selected <?php } ?> ><?php echo $c->getNombreCompleto()?></option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li>
                                            <select id="canal" class="form-control" name="canal">
                                                <option value="def">- Canal -</option>
                                                <?php foreach($canales as $canal) { ?>
                                                <option value="<?php echo $canal->getId() ?>" <?php if($visita->getCanal() === $canal) { ?> selected <?php } ?> ><?php echo $canal->getNombre()?></option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <select id="canal" class="form-control" name="canal" disabled>
                                                <option value="0">- Canal -</option>
                                            </select>
                                        </li>
                                    <?php } ?>
                                    <li>
                                        <select class="form-control" id="delegacion" name="delegacion">
                                            <option value="def">- Delegación- </option>
                                            <?php foreach($delegaciones as $d) { ?>
                                                <option value="<?php echo $d->getId(); ?>" <?php if($visita->getDelegacion() === $d) { ?> selected <?php } ?> ><?php echo $d->getNombre(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li>                                
                                        <select class="form-control" name="jefes" >
                                            <option value="def">- Jefe de equipo- </option>
                                            <?php foreach($jefes as $j) { ?>
                                                <option value="<?php echo $j->getId(); ?>" <?php if($visita->getJefeequipo() === $j) { ?> selected <?php } ?> ><?php echo $j->getNombreCompleto(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </li> 
                                    <li>                                
                                        <select class="form-control" name="comercial" >
                                            <option value="def">- Comercial- </option>
                                            <?php foreach($jefes as $j) { ?>
                                                <option value="<?php echo $j->getId(); ?>" <?php if($visita->getComercial() === $j) { ?> selected <?php } ?> ><?php echo $j->getNombreCompleto(); ?></option>
                                            <?php } ?>
                                            <?php foreach($comerciales as $c) { ?>
                                                <option value="<?php echo $c->getId(); ?>" <?php if($visita->getComercial() === $c) { ?> selected <?php } ?> ><?php echo $c->getNombreCompleto(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </li> 
                                    <li>  
                                        <select class="form-control" name="visita" >
                                            <option value="def">- Recepción de la visita -</option>
                                            <option value="novisita" <?php if($visita->getVisitantes() === 'novisita') { ?> selected <?php } ?> >Sin visita</option>
                                            <option value="visitasolo" <?php if($visita->getVisitantes() === 'visitasolo') { ?> selected <?php } ?> >Cliente solo</option>
                                            <option value="visitapareja" <?php if($visita->getVisitantes() === 'visitapareja') { ?> selected <?php } ?> >Matrimonio/Pareja</option>
                                        </select>
                                    </li>

                                    <li>
                                        <select id="combo-resultadovisitas" class="form-control" name="resultado" >
                                            <option value="def">- Resultado de la visita -</option>
                                            <?php foreach($resultados as $r) { ?>       
                                                <option value="<?php echo $r->getId(); ?>" <?php if($visita->getResultadoVisitas() === $r) { ?> selected <?php } ?> ><?php echo $r->getNombre() ?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <!-- Si el resultado es 6 o 13, mostramos más opciones -->
                                    <?php //if($visita->getResultadoVisitas() && ($visita->getResultadoVisitas()->getId() == 6 || $visita->getResultadoVisitas()->getId() == 13)) { ?>
                                        <li>
                                            <select id="combo-tipoequipo" class="form-control" name="tipoequipo" >
                                                <option value="def">- Tipo de equipo -</option>
                                                <?php foreach($tiposequipo as $r) { ?>       
                                                    <option value="<?php echo $r->getId(); ?>" <?php if($visita->getTipoEquipo() === $r) { ?> selected <?php } ?> ><?php echo $r->getNombre() ?></option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li><input id="combo-fechainstalacion" type="date" name="fecha_instalacion" <?php if($visita->getFechaInstalacion()) { ?> value="<?php echo $visita->getFechaInstalacion()->format('Y-m-d') ?>" <?php } ?> ></li>
                                        <li>
                                            <select id="combo-productoextra1" class="form-control" name="productoextra1" >
                                                <option value="def">- Producto extra 1 -</option>
                                                <?php foreach($productosextra1 as $r) { ?>       
                                                    <option value="<?php echo $r->getId(); ?>" <?php if($visita->getProductoExtra() === $r) { ?> selected <?php } ?> ><?php echo $r->getNombre() ?></option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li>
                                            <select id="combo-productoextra2" class="form-control" name="productoextra2" >
                                                <option value="def">- Producto extra 2 -</option>
                                                <?php foreach($productosextra2 as $r) { ?>       
                                                    <option value="<?php echo $r->getId(); ?>" <?php if($visita->getProductoExtra2() === $r) { ?> selected <?php } ?> ><?php echo $r->getNombre() ?></option>
                                                <?php } ?>
                                            </select>
                                        </li>
                                    <?php //} ?>
                                    <li>                                
                                        <select class="form-control" name="rescatadores" >
                                            <option value="def">- Recuperador - </option>
                                            <?php foreach($rescatadores as $j) { ?>
                                                <option value="<?php echo $j->getId(); ?>" <?php if($visita->getRescatador() === $j) { ?> selected <?php } ?> ><?php echo $j->getNombreCompleto(); ?></option>
                                            <?php } ?>
                                            <?php foreach($rescatadores as $c) { ?>
                                                <option value="<?php echo $c->getId(); ?>" <?php if($visita->getRescatador() === $c) { ?> selected <?php } ?> ><?php echo $c->getNombreCompleto(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li>
                                        <div class="row sinpadding">
                                        <div class="col-xs-6 col-sm-5">
                                         <output name="Vinteres" for="a">Interés: <?php echo $visita->getInteres() ?></output>
                                        </div>
                                        <div class="col-xs-6 col-sm-7">
                                            <input type="range" min=0 max=5 id="interes" name="interes" value="<?php $visita->getInteres() ?>"  >
                                        </div>
                                        </div>
                                    </li>
                                    <li><textarea name="notas" rows="10" placeholder="Más notas"><?php echo $visita->getNotas() ?></textarea></li>
                                </ul>
                                <div class="col-xs-4 sinpadding">
                                    <ul>
                                        <li><div class="checkbox big"><label><input type="checkbox" name="activo" value="1" <?php if($visita->getActivo()) { ?> checked <?php } ?> >Activo</label></div></li>
                                    </ul>
                                </div>
                                <div class="col-xs-4 sinpadding">
                                    <ul>
                                        <li><div class="checkbox big"><label><input type="checkbox" name="contacto" value="1" <?php if($visita->getContacto()) { ?> checked <?php } ?> >Contacto</label></div></li>
                                    </ul>
                                </div>
                                <div class="col-xs-4 sinpadding">
                                    <ul>
                                        <li><div class="checkbox big"><label><input type="checkbox" name="rescatar" value="1" <?php if($visita->getRescatar()) { ?> checked <?php } ?> >Rescatar</label></div></li>
                                    </ul>
                                </div>                             
                            </div>                       
                        </div>
                        <ul>
                            
                            <li><button name="formEditarVisita" value="Login" class="exit btn-redondeado" type="submit">Editar Visita</button></li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#combo-resultadovisitas").change(function(){
        ocultarCombos("slow");
    });
</script>   

<script>
    function ocultarCombos(vel){
        if($("#combo-resultadovisitas").find('option:selected').val() == "6" ||
           $("#combo-resultadovisitas").find('option:selected').val() == "13") {
            $("#combo-tipoequipo").show(vel, function() {});
            $("#combo-fechainstalacion").show(vel, function() {});
            $("#combo-productoextra1").show(vel, function() {});
            $("#combo-productoextra2").show(vel, function() {});
        }
        else{
            $("#combo-tipoequipo").hide(vel);
            $("#combo-fechainstalacion").hide(vel);
            $("#combo-productoextra1").hide(vel);
            $("#combo-productoextra2").hide(vel);
        }
    }
</script>  

<?php if (isset($ok) && $ok) { ?>
    <script>
        $(".panel-alert").removeClass("alert-warning");
        $(".panel-alert").removeClass("alert-danger");
        $(".panel-alert").addClass("alert-success");
        $(".panel-alert p").html('</p><?php echo $ok ?></p>');
        $(".panel-alert").show();
    </script>
<?php } ?>
    
<?php if (isset($warning) && $warning) { ?>
    <script>
        $(".panel-alert").removeClass("alert-success");
        $(".panel-alert").removeClass("alert-danger");
        $(".panel-alert").addClass("alert-warning");
        $(".panel-alert p").html('</p><?php echo $warning ?></p>');
        $(".panel-alert").show();
    </script>
<?php } ?>

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

        <script>
            function validarVisita() {
                var mensaje = "";
                var valido = true;
                if ($('#formcvlocality').val() === '') {
                    mensaje = mensaje + '<p>Introduce una población válida</p>';
                    valido = false;
                }
                if ((!parseInt($("#telefono1").val(), 10) || 0) || $("#telefono1").val().length != 9) {
                    mensaje = mensaje + "<p>Introduce un teléfono 1 válido</p>";
                    valido = false;
                }
                if ($("#telefono2").val() !== '' && ((!parseInt($("#telefono2").val(), 10) || 0) || $("#telefono2").val().length != 9)) {
                    mensaje = mensaje + "<p>Introduce un teléfono 2 válido</p>";
                    valido = false;
                }
                if ($("#canal").val() === "def") {
                    mensaje = mensaje + "<p>Introduce un canal válido</p></br/>";
                    valido = false;
                }
                if ($("#delegacion").val() === "def") {
                    mensaje = mensaje + "<p>Introduce una delegación válida</p>";
                    valido = false;
                }
                if (!valido)
                {
                    $(".panel-alert p").html(mensaje);
                    //$(".panel-alert").css("width", "270px");
                    $(".panel-alert").show();
                }

                return valido;
            }
        </script>
            

    <?php 
    $msg = "";
    if(isset($cambiodejefe)) { 
        if($cambiodejefe != '') {     
            $msg[] = "<p>Has cambiado el jefe de equipo. Avisar del cambio al <a href=tel:'" . $cambiodejefe . "'>" . $cambiodejefe . "</a></p>";     
        } else { 
            $msg[] = "<p>Has cambiado el jefe de equipo pero el antiguo no tenía número de teléfono asociado.</p>"; 
        }
    }
        
    if(isset($cambiodecomercial)) { 
        if($cambiodecomercial != '') {     
            $msg[] = $msg[] = "<p>Has cambiado el comercial. Avisar del cambio al <a href=tel:'" . $cambiodecomercial . "'>" . $cambiodecomercial . "</a></p>";        
        } else {
            $msg[] = "<p>Has cambiado el comercial pero el antiguo no tenía número de teléfono asociado.</p>"; 
        } 
    } ?>   
        
<?php if($msg != "") { ?>
    <div class="modal fade" id="modalCambioTelefono" tabindex="-1" role="dialog" aria-labelledby="modalCambioTelefonoLabel" aria-hidden="true" 
         data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">

                <div class="col-sm-3 sinpadding">
                    <img src="/img/lellamamos.png" alt="iEDES Solenergy">
                </div>
                <div class="col-sm-9">
                    <?php foreach($msg as $m) {
                        echo $m;
                    } ?>
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>

<!-- Fin calcula el precio -->
    <script>
        $('#modalCambioTelefono').modal('toggle');
    </script>
<?php } ?>
        
<script>
    $(document).on("click", ".panel-alert span", function() {
        $(".panel-alert").hide();
    });
</script>
        
<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
</script>

<script>
    $(document).ready(function() {
        initialize('formcv');
        ocultarCombos("slow");
    });
</script>

