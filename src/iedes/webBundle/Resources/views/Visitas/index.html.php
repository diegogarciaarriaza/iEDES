<?php $view->extend('::baseIntranet.html.php');?>

<div class="panel-alert alert-warning" style="display:none;">
    <span>&times;</span>
    <p>Mensaje.</p>
</div>

<?php if(isset($idvisita) && $idvisita) { ?>
    <script>window.location="#<?php echo $idvisita?>"</script>
<?php } ?>

<div class="container sin-padding">
    <div class="row">
        <div class="col-xs-12 intranet">
            <h3>Opciones</h3>
            <ul>                    
                <?php if($rol === 2 || $rol === 10 || $rol === 21 || $rol === 30 || $rol === 31 || $rol === 32 || $rol === 33 || $rol === 50 || $rol === 100) { ?>
                    <li><a href="<?php echo $view['router']->generate("crear_visita"); ?>"><button class="exit btn-redondeado">Crear visita</button></a></li>
                <?php } ?> 
                <?php if($rol === 50 || $rol === 100) { ?>
                    <li><a href="#visitas_asignar_jefeequipo"><button class="exit btn-redondeado">Asignar jefe de equipo</button></a></li>
                <?php } ?> 
                <?php if($rol === 20 || $rol === 50 || $rol === 100) { ?>
                    <li><a href="#visitas_asignar_comercial"><button class="exit btn-redondeado">Asignar comercial</button></a></li>
                <?php } ?> 
                <?php if($rol === 2 || $rol === 20 || $rol === 100) { ?>
                    <li><a href="#visitas_para_finalizar"><button class="exit btn-redondeado">Finalizar visita</button></a></li>           
                <?php } ?>  
                <?php if($rol === 2 || $rol === 30 || $rol === 50 || $rol === 100) { ?>
                    <li><a href="#visitas_para_rescatar"><button class="exit btn-redondeado">Rescatar visita</button></a></li>           
                <?php } ?>  
                <li><a href="<?php echo $view['router']->generate("intranet"); ?>"><button class="send btn-redondeado">Volver</button></a></li>
            </ul>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-xs-12 intranet"> 
            <h3>Filtro</h3>
             <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6">
                <div class="formulario">
                    <form action="<?php echo $view['router']->generate('visitas') ?>" 
                        method="post" 
                        enctype="multipart/form-data">
                        <ul>
                          <li><input type="text"  name="filtro" placeholder="ID, nombre, un apellido, ciudad ó CP" value="<?php if(isset($filtro)) { echo $filtro; } ?>"></li> 
                          <li>
                             <select class="form-control" name="filtroestado" >
                                 <option value="def">Todos los estados</option>
                                 <option value="0" <?php if(isset($filtro2) && $filtro2 === '0') { ?> selected <?php } ?> >Sin asignar</option>  
                                 <option value="1" <?php if(isset($filtro2) && $filtro2 === '1') { ?> selected <?php } ?> >En Jefe de Equipo</option>  
                                 <option value="2" <?php if(isset($filtro2) && $filtro2 === '2') { ?> selected <?php } ?> >En Comercial</option>  
                                 <option value="3" <?php if(isset($filtro2) && $filtro2 === '3') { ?> selected <?php } ?> >Finalizadas</option>  
                                 <option value="4" <?php if(isset($filtro2) && $filtro2 === '4') { ?> selected <?php } ?> >En Rescate</option> 
                             </select>
                          </li>
                          <li>
                             <select class="form-control" name="filtroresultado" >
                                 <option value="def">Todos los resultados</option>
                                 <?php foreach($resultados as $e) { ?>
                                    <option value="<?php echo $e->getId() ?>" <?php if(isset($filtro3) && $filtro3 === $e->getId()) { ?> selected <?php } ?> ><?php echo $e->getNombre()?></option>
                                 <?php } ?>     
                             </select>
                          </li> 
                          <div class="col-xs-6 sinpadding">
                                <ul>
                                    Fecha de inicio
                                    <li><input type="date" name="filtrofechaini" <?php if(isset($fechaini)) { ?> 
                                               value="<?php echo $fechaini ?>" <?php } ?> ></li>
                                </ul>
                          </div>
                          <div class="col-xs-6 sinpadding">
                                <ul>
                                    Fecha de fin
                                    <li><input type="date" name="filtrofechafin" <?php if(isset($fechafin)) { ?> 
                                               value="<?php echo $fechafin ?>" <?php } ?>></li>
                                </ul>
                          </div>
                          <li><button name="formFiltroVisitas" class="exit btn-redondeado" type="submit">Filtro</button></li>             
                        </ul>
                    </form>
                </div>
             </div>
        </div>
    </div>
    
    <?php 
    if(isset($visitasSinAsignar)) {$arrayVisitas["Visitas sin asignar"] =       $visitasSinAsignar;}
    if(isset($visitasJefeEquipo)) {$arrayVisitas["Visitas en Jefe de Equipo"] = $visitasJefeEquipo;}
    if(isset($visitasComercial))  {$arrayVisitas["Visitas en Comercial"] =      $visitasComercial;}
    if(isset($visitasFinalizadas)){$arrayVisitas["Visitas Finalizadas"] =       $visitasFinalizadas;}
    if(isset($visitasRescatadas)) {$arrayVisitas["Visitas en Rescate"] =        $visitasRescatadas;}
      
    if(isset($arrayVisitas)){ ?>              
        
      <?php foreach ($arrayVisitas as $titulo => $tipovisita){ ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 intranet"> 
                    <?php if($tipovisita) { ?>
                        <h3><?php echo $titulo; ?></h3>
                        <?php if($titulo === "Visitas sin asignar") { ?>
                            <a name="visitas_asignar_jefeequipo"></a>
                            <h4> <?php echo $lblresSinAsignar ?></h4>
                        <?php } else if($titulo === "Visitas en Jefe de Equipo") { ?>
                            <a name="visitas_asignar_comercial"></a>
                            <h4> <?php echo $lblresJefeEquipo ?></h4>
                        <?php } else if($titulo === "Visitas en Comercial") { ?>
                            <a name="visitas_para_finalizar"></a>
                            <h4> <?php echo $lblresComercial ?></h4>
                        <?php } else if($titulo === "Visitas Finalizadas") { ?>
                            <h4> <?php echo $lblresFinalizadas ?></h4>
                        <?php } else if($titulo === "Visitas en Rescate") { ?>
                            <a name="visitas_para_rescatar"></a>
                            <h4> <?php echo $lblresRescatadas ?></h4>
                        <?php } ?>
                    <?php } ?>
                    <?php 
                    $i = 0;
                    foreach ($tipovisita as $v){
                        $i = $i + 1;
                        ?>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <?php $resultado = "resultado";
                                $estado = "estado";
                                if($v->getResultadoVisitas()) {
                                    $resultado = "resultado" . $v->getResultadoVisitas()->getId();
                                }
                                if($v->getEstadoContactos()) {
                                    $estado = "estado" . $v->getEstadoContactos()->getId();
                                }?>
                            <div class="formulario <?php echo $resultado ?> <?php echo $estado ?>">
                                <div class="datos-texto">
                                    <ul>
                                        <a name="<?php echo $v->getId()?>"></a>
                                        <li><b>ID:</b> <?php echo $v->getId(); ?></li>                                                          
                                        <li><b>Nombre Cliente:</b> <?php echo $v->getNombreCompleto(); ?></li>
                                        <li><b>Teléfono:</b> 
                                            <a href="tel:<?php echo $v->getTelefono1();?>"><span itemprop="tel"><?php echo $v->getTelefono1();?></span></a>
                                            - 
                                            <a href="tel:<?php echo $v->getTelefono2();?>"><span itemprop="tel"><?php echo $v->getTelefono2();?></span></a>
                                        </li>
                                        <li><b>Email:</b> <?php echo $v->getEmail(); ?></li>
                                        <li class="datos-direccion"><b> Dirección:</b> <?php echo $v->getDireccion(); ?></li>
                                        <?php if($v->getFechaVisita()){ ?>
                                            <li><b>Fecha Visita:</b> <?php echo $v->getFechaVisita()->format('d-m-Y H:i:s'); ?></li>
                                        <?php } else { ?>
                                            <li><b>Fecha de Visita:</b> No se ha asignado una fecha concreta </li>
                                        <?php } ?>
                                        <?php if($v->getFechaCierre()){ ?>
                                            <li><b>Fecha de Cierre:</b> <?php echo $v->getFechaCierre()->format('d-m-Y H:i:s'); ?></li>
                                        <?php } ?>
                                        <?php if($v->getFechaRescate()){ ?>
                                            <li><b>Fecha de Rescate:</b> <?php echo $v->getFechaRescate()->format('d-m-Y H:i:s'); ?></li>
                                        <?php } ?>
                                        <?php if($v->getCreador()) { ?>
                                            <li>
                                                <b>Creador de la visita:</b> 
                                                <?php echo $v->getCreador()->getNombreCompleto() . ' (' . $v->getCanal()->getNombre() . ')'; ?>
                                            </li>
                                        <?php } ?>
                                        <?php if($v->getcomercial()) { ?>
                                            <li>
                                                <b>Comercial:</b> 
                                                <?php echo $v->getComercial()->getNombreCompleto() . '. ' ?> <a href="tel:<?php echo $v->getComercial()->getTelefono1();?>"> <?php echo $v->getComercial()->getTelefono1(); ?> </a>
                                            </li>
                                        <?php } ?>
                                        <?php if($v->getRescatador()) { ?>
                                            <li>
                                                <b>Rescatador de la visita:</b> 
                                                <?php echo $v->getRescatador()->getNombreCompleto(); ?>
                                            </li>
                                        <?php } ?>
                                        <?php if($titulo === 'Visitas Finalizadas' or $titulo === 'Visitas en Rescate') { 
                                            if($v->getResultadoVisitas()){ ?>
                                                <li><b>Estado Finalizado:</b> <?php echo $v->getResultadoVisitas()->getNombre(); ?> </li>
                                                <?php if($v->getResultadoVisitas()->getId() == 6 || $v->getResultadoVisitas()->getId() == 13){ ?>
                                                    <?php if($v->getResultadoVisitas()->getId() == 6 && $v->getTipoEquipo()){ ?>
                                                        <li><b>Tipo de Equipo:</b> <?php echo $v->getTipoEquipo()->getNombre(); ?> </li>
                                                    <?php } ?>
                                                    <?php if($v->getProductoExtra()){ ?>
                                                        <li><b>Producto Extra:</b> <?php echo $v->getProductoExtra()->getNombre(); ?> </li>
                                                    <?php } ?>
                                                    <?php if($v->getProductoExtra2()){ ?>
                                                        <li><b>Producto Extra 2:</b> <?php echo $v->getProductoExtra2()->getNombre(); ?> </li>
                                                    <?php } ?>
                                                <?php }
                                                ?>
                                            <?php }
                                            if($v->getEstadoContactos()){ ?>
                                                <li><b>Estado Llamada:</b> <?php echo $v->getEstadoContactos()->getNombre(); ?> </li>
                                            <?php } ?>
                                        <?php } ?>
                                        <li><b>Notas:</b> <?php echo $v->getNotas(); ?> </li>
                                    </ul>
                                </div>
                                <?php if($rol === 50 || $rol === 100) { ?>
                                    <form action="<?php echo $view['router']->generate('editar_visita', array('idvisita' => $v->getId())) ?>" 
                                            method="post" 
                                            onSubmit="return validarVisita('visita<?php echo $v->getId() ?>')"
                                            enctype="multipart/form-data">
                                        <ul>
                                            <li><button name="formListadoVisita" class="exit btn-redondeado" type="submit">Editar Visita</button></li>             
                                        </ul>
                                    </form>
                                <?php } ?>
                                
                                <!-- Si la visita está sin asignar o en jefe de equipo -->
                                <?php if(($titulo === "Visitas sin asignar" || $titulo === "Visitas en Jefe de Equipo") && 
                                         ($rol == 20 || $rol == 50 || $rol == 100)) { ?>
                                    <form action="<?php echo $view['router']->generate('visitas', array('idvisita' => $v->getId())) ?>" 
                                          method="post" 
                                          onSubmit="return validarVisitaSA('comercial<?php echo $v->getId() ?>')"
                                          enctype="multipart/form-data">
                                        <ul>
                                            <li>                                
                                                <select id="comercial<?php echo $v->getId() ?>" class="form-control" name="usuario">
                                                    <?php if($titulo === "Visitas sin asignar") { ?>
                                                        <option value="def">- Jefes de equipo - </option>
                                                        <?php foreach($jefes as $j) { ?>
                                                            <option value="<?php echo $j->getId(); ?>"> <?php echo $j->getNombreCompleto(); ?></option>
                                                        <?php } ?> 
                                                        <option value="def">- Comercial- </option>
                                                        <?php foreach($comerciales as $c) { ?>
                                                            <option value="<?php echo $c['id']; ?>">[ <?php echo $c['asig']; ?> ] <?php echo $c['nombreCompleto']; ?></option>
                                                        <?php } ?>
                                                    <?php } if($titulo === "Visitas en Jefe de Equipo") { ?>
                                                        <option value="def">- Comercial- </option>
                                                        <?php foreach($jefescomocomerciales as $jc) { ?>
                                                            <option value="<?php echo $jc['id']; ?>">[ <?php echo $jc['asig']; ?> ] <?php echo $jc['nombreCompleto']; ?></option>
                                                        <?php } ?>
                                                        <?php foreach($comerciales as $c) { ?>
                                                            <option value="<?php echo $c['id']; ?>">[ <?php echo $c['asig']; ?> ] <?php echo $c['nombreCompleto']; ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </li>
                                            <li><button name="formAsignarVisita" class="exit btn-redondeado" type="submit">Asignar Visita</button></li>             
                                        </ul>
                                    </form>
                                <?php } ?>
                                <!-- Fin de visitas sin asignar o en jefe de equipo -->
                                
                                <!-- Si la visita está en comercial -->
                                <?php if($titulo === "Visitas en Comercial" && ($rol == 2 || ($rol == 20 && $v->getComercial() == $nicklogeado) || $rol == 50 || $rol == 100)) { ?>
                                    <form action="<?php echo $view['router']->generate('visitas', array('idvisita' => $v->getId())) ?>" 
                                        method="post" 
                                        oninput="Vinteres.value='Interés: ' + parseInt(interes.value)"
                                        onSubmit="return validarVisitaFV('visita<?php echo $v->getId() ?>', 'resultado<?php echo $v->getId() ?>', 'fecha<?php echo $v->getId() ?>', 'hora<?php echo $v->getId() ?>')"
                                        enctype="multipart/form-data">
                                        <ul>
                                            <?php if(!$v->getFechaVisita()){ ?>
                                                <li><input type="date" name="fecha" id="fecha<?php echo $v->getId() ?>"></li>
                                                <li><input type="time" name="hora"  id="hora<?php echo $v->getId() ?>"></li>
                                            <?php } ?>  
                                            <li><textarea class="form-control" name="notas" rows="3" placeholder="Más notas"></textarea></li>
                                            <li>  
                                                <select class="form-control" name="visita" id="visita<?php echo $v->getId() ?>">
                                                    <option value="def">- Recepción de la visita -</option>
                                                    <option value="novisita">Sin visita</option>
                                                    <option value="visitasolo">Cliente solo</option>
                                                    <option value="visitapareja">Matrimonio/Pareja</option>
                                                </select>
                                            </li>
                                            
                                            <li>
                                                <select class="form-control" name="resultado" id="resultado<?php echo $v->getId() ?>">
                                                    <option value="def">- Resultado de la visita -</option>
                                                    <?php foreach($resultados as $r) { ?>
                                                        <?php if ($r->getId() == 6) { 
                                                            if($rol === 50 || $rol === 100) { ?>
                                                                <option value="<?php echo $r->getId() ?>"><?php echo $r->getNombre() ?></option>
                                                            <?php }                                                       
                                                            } 
                                                        else { ?>
                                                            <option value="<?php echo $r->getId() ?>"><?php echo $r->getNombre() ?></option>
                                                        <?php } 
                                                    } ?>
                                                </select>
                                            </li>                                          
                                            
                                            <li>
                                                <div class="row sinpadding">
                                                <div class="col-xs-6 col-sm-5">
                                                 <output name="Vinteres" for="a">Interés: 4</output>
                                                </div>
                                                <div class="col-xs-6 col-sm-7">
                                                    <input type="range" min=0 max=5 id="interes" name="interes" value="4" >
                                                </div>
                                                </div>
                                            </li>
                                            
                                            <li><button name="formFinalizarVisita" class="exit btn-redondeado " type="submit">Finalizar Visita</button></li>             
                                        </ul>
                                    </form>
                                <?php } ?>
                                <!-- Fin de visitas en comercial -->
                                
                                <!-- Si la visita está finalizada o en rescate -->
                                <?php if(($titulo === "Visitas Finalizadas" && ($rol == 2 || $rol == 50 || $rol == 100)) ||
                                         ($titulo === "Visitas en Rescate"  && ($rol == 2 || $rol == 30 || $rol == 32 || $rol == 33 || $rol == 50 || $rol == 100))) { ?>
                                    <form action="<?php echo $view['router']->generate('visitas', array('idvisita' => $v->getId())) ?>" 
                                          method="post" 
                                          onSubmit="return validarVisitaR('fecha<?php echo $v->getId() ?>', 'hora<?php echo $v->getId() ?>')"
                                          enctype="multipart/form-data">
   
                                        <div class="col-xs-6 sinpadding">
                                            <ul>
                                                <li><input type="date" name="fecha" id="fecha<?php echo $v->getId() ?>"></li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-6 sinpadding">
                                            <ul>
                                                <li><input type="time" name="hora"  id="hora<?php echo $v->getId() ?>"></li>
                                            </ul>
                                        </div>
                                        <ul>
                                            <li>
                                                <select id="recuperador<?php echo $v->getId() ?>" class="form-control" name="recuperador" <?php if($rol !== 50 && $rol !== 100) { ?> disabled hidden <?php } ?> >
                                                    <option value="def">- Rescatador -</option>
                                                    <?php foreach($rescatadores as $r) { ?>
                                                        <option value="<?php echo $r->getId() ?>"><?php echo $r->getNombreCompleto()?></option>
                                                    <?php } ?>
                                                </select>
                                            </li>
                                            <li>
                                                <select id="comercial<?php echo $v->getId() ?>" class="form-control" name="comercial" <?php if($rol !== 50 && $rol !== 100) { ?> disabled hidden <?php } ?> >
                                                    <option value="def">- Comercial (Nulo para envio al J.E.) -</option>
                                                    <?php foreach($comerciales as $c) { ?>
                                                        <option value="<?php echo $c['id']; ?>">[ <?php echo $c['asig']; ?> ] <?php echo $c['nombreCompleto']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </li>
                                            <li><textarea name="notas" rows="10" placeholder="Más notas"></textarea></li>
                                            
                                            <?php if($titulo === "Visitas Finalizadas") { ?>
                                                <li><button name="formRecuperarVisita" class="exit btn-redondeado" type="submit">Reabrir Visita</button></li>  
                                            <?php } else { ?>
                                                <li><button name="formRecuperarVisita" class="exit btn-redondeado" type="submit">Recuperar Visita</button></li>  
                                            <?php } ?>
                                                
                                        </ul>
                                    </form>
                                    <?php if($titulo === "Visitas en Rescate"  && ($rol == 30 || $rol == 50 || $rol == 100)) { ?>
                                        <form action="<?php echo $view['router']->generate('visitas', array('idvisita' => $v->getId())) ?>" 
                                          method="post" 
                                          enctype="multipart/form-data">
                                            <ul>
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
                                        </form>
                                    <?php } ?>
                                <?php } ?>
                                <!-- Fin de visitas finalizada o en rescate -->
                                
                                
                            </div>
                        </div>

                        <?php if ($i % 2 == 0) { ?>
                            <div class="clearfix "></div>
                        <?php } ?>

                    <?php } ?>
                </div>
            </div>
        </div>
      <?php }
    } ?>
    

</div>
    
<script>
    function validarVisitaSA(id){
        if ($('#'+id).val() == 'def') {
            $(".panel-alert").addClass("alert-warning");
            $(".panel-alert").removeClass("alert-success");
            $(".panel-alert").removeClass("alert-danger");
            var mensaje = '<p>Elija un comercial válido</p>';
            $(".panel-alert p").html(mensaje);
            $(".panel-alert").show();
            return false;
        }
        return true;
    }
</script>

<script>
    function validarVisitaFV(visita, resul, fecha, hora){
        var mensaje = '';
        var valido = true;


        if ($('#'+fecha).val() == '') {
            mensaje = mensaje + '<p>Elija una fecha válida</p>';
            valido = false;
        }

        if ($('#'+hora).val() == '') {
            mensaje = mensaje + '<p>Elija una hora válida</p>';
            valido = false;
        }

        if ($('#'+visita).val() == 'def') {
            mensaje = mensaje + '<p>Elija una recepción de visita válida</p>';
            valido = false;
        }
        if ($('#'+resul).val() == 'def') {
            mensaje = mensaje + '<p>Elija un estado de finalización de visita válido</p>';      
            valido = false;
        }
        if(!valido){
            $(".panel-alert").addClass("alert-warning");
            $(".panel-alert p").html(mensaje);
            $(".panel-alert").show();
            return false;
        }

        return true;
    }
</script>

<script>
    function validarVisitaR(fecha, hora){
        var mensaje = '';
        var valido = true;

        if ($('#'+fecha).val() == '') {
            mensaje = mensaje + '<p>Elija una fecha válida</p>';
            valido = false;
        }

        if ($('#'+hora).val() == '') {
            mensaje = mensaje + '<p>Elija una hora válida</p>';
            valido = false;
        }
        
        if(!valido){
            $(".panel-alert").addClass("alert-warning");
            $(".panel-alert p").html(mensaje);
            $(".panel-alert").show();
            return false;
        }

        return true;
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
    
<?php if (isset($alert) && $alert) { ?>
    <script>
        $(".panel-alert").addClass("alert-warning");
        $(".panel-alert").removeClass("alert-danger");
        $(".panel-alert").removeClass("alert-success");
        $(".panel-alert p").html('</p><?php echo $alert ?></p>');
        $(".panel-alert").show();
    </script>
<?php } ?>

<script>
    $(document).ready(function() {
        $(document).on("click", "span", function() {
            $(".panel-alert").hide();
        });
    });
</script>