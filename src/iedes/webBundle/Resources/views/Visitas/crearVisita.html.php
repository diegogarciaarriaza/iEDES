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
                <li><a href="<?php echo $view['router']->generate("visitas"); ?>"><button class="send btn-redondeado">Volver</button></a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 intranet">
                <h3>Crear Visita</h3>
                <div class="formulario">                      
                    <form action="<?php echo $view['router']->generate('crear_visita') ?>" 
                          method="post" 
                          oninput="Vmiembros.value='Miembros unidad familiar: ' + parseInt(miembros.value)"
                          onSubmit="return validarVisita()"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <h4>Datos del cliente</h4>
                                <ul>
                                    <li><input type="text"  name="nombre" placeholder="nombre" required></li>
                                    <li><input type="text"  name="apellido1" placeholder="apellido1" required></li>  
                                    <li><input type="text"  name="apellido2" placeholder="apellido2" required></li> 
                                    <li><input type="text"  name="telefono1" id="telefono1" placeholder="telefono1" required></li>
                                    <li><input type="text"  name="telefono2" id="telefono2" placeholder="telefono2"></li>
                                    <li><input type="text"  name="direccion" placeholder="dirección" required></li>                             
                                    <li><input type="text"  id="formcvautocomplete" name="formcvautocomplete" placeholder="ciudad" required></li>                             
                                    <li><input type="email" name="email" placeholder="email"></li>
                                    <li>
                                        <div class="row sinpadding">
                                            <div class="col-xs-6">
                                             <output name="Vmiembros" for="a">Miembros unidad familiar: 4</output>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="range" min=1 max=10 id="miembros" name="miembros" value="4" >
                                            </div>
                                        </div>
                                    </li>
                                    <!--campos ocultos-->
                                    <li>
                                        <input name="formcvroute" id="formcvroute" hidden />
                                        <input name="formcvstreet_number" id="formcvstreet_number" hidden />
                                        <input name="formcvpostal_code" id="formcvpostal_code" hidden />
                                        <input name="formcvlocality" id="formcvlocality" hidden />
                                        <input name="formcvadministrative_area_level_3" id="formcvadministrative_area_level_3" hidden />
                                        <input name="formcvadministrative_area_level_2" id="formcvadministrative_area_level_2" hidden />
                                        <input name="formcvadministrative_area_level_1" id="formcvadministrative_area_level_1" hidden />
                                        <input name="formcvcountry" id="formcvcountry" hidden />  
                                    </li>
                                </ul>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <h4>Datos técnicos</h4>
                                <div class="col-xs-12 col-sm-6">
                                <ul> 
                                    <li><div class="checkbox"><label><input type="checkbox" name="termogas" value="termogas">- Termo de Gas</label></div></li>
                                    <li><div class="checkbox"><label><input type="checkbox" name="termoelec" value="termoelec"> - Termo Eléctrico</label></div></li>
                                </ul>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                <ul>
                                    <li><div class="checkbox"><label><input type="checkbox" name="caldera" value="caldera">- Caldera</label></div></li>
                                    <li><div class="checkbox"><label><input type="checkbox" name="externo" value="externo">- Equipo Externo</label></div></li>                                                          
                                </ul>
                                </div> 
                                
                                <h4>Datos de la visita</h4>
                                <ul>
                                    <li><input type="date" name="fecha"></li>
                                    <li><input type="time" name="hora"></li>                             
                                    <li>
                                        <select id="canal" class="form-control" name="canal" <?php if($rol !== 2 && $rol !== 10 && 
                                                $rol !== 30 && $rol !== 32 && $rol !== 50 && $rol !== 100) { ?> disabled hidden <?php } ?> >
                                            <?php if($rol === 50 || $rol === 100 || $rol === 10) { ?>
                                                <option value="def">- Canal -</option>
                                                <?php foreach($canales as $canal) { ?>
                                                    <option value="<?php echo $canal->getId() ?>"><?php echo $canal->getNombre()?></option>
                                                <?php } ?>
                                            <?php } else if($rol === 30){ ?>
                                                    <option value="def">- Canal -</option>
                                                    <option value="1">Octavilla</option>
                                                    <option value="11">Promo Mastermix</option>
                                                    <option value="16">Rescate</option>
                                                    <option value="7">STAND</option>
                                            <!-- borrar el 32 cuando acabe la promoción -->
                                            <?php } else if($rol === 32){ ?>
                                                    <option value="def">- Canal -</option>
                                                    <option value="4">Captación normal</option>
                                                    <option value="7">STAND</option>
                                            <?php } else if($rol === 2){ ?>
                                                    <option value="def">- Canal -</option>
                                                    <option value="13">Recursos propios</option>
                                                    <option value="11">Promo Mastermix</option>
                                                    <option value="7">STAND</option>
                                            <?php } else { ?>
                                                    <option value="0">- Canal -</option>
                                            <?php } ?>
                                        </select>
                                    </li>   
                                    <li>
                                        <select class="form-control" id="delegacion" name="delegacion" <?php if($rol === 2 || $rol === 32) { ?> disabled hidden <?php } ?> >
                                            <?php if($rol !== 2 && $rol !== 32) { ?> 
                                                <option value="def">- Delegación- </option>
                                                <?php foreach($delegaciones as $d) { ?>
                                                    <option value="<?php echo $d->getId(); ?>"><?php echo $d->getNombre(); ?></option>
                                                <?php } ?>
                                            <?php } else { ?>
                                                    <option value="0">- Delegación- </option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li>                                
                                        <select class="form-control" name="usuario" id="usuario" <?php if($rol < 50) { ?> disabled hidden <?php }?>  >
                                            <option value="def">- Jefes- </option>
                                            <?php foreach($jefes as $c) { ?>
                                                <option value="<?php echo $c->getId(); ?>"><?php echo $c->getNombreCompleto(); ?></option>
                                            <?php } ?>
                                        </select>
                                    </li>                                   
                                </ul>                         
                            </div>                       
                        </div>
                        <ul>
                            <li><textarea rows="2" name="notas" placeholder="Más notas"></textarea>
                            <li><button name="formCrearVisita" value="Login" class="exit btn-redondeado" type="submit">Crear Visita</button></li>
                        </ul>
                    </form>
                </div>
            </div>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 intranet">
                    <h3>Visitas creadas aún sin asignación</h3>
                    <?php
                    if (isset($visitaspendientes) && $visitaspendientes) {
                        foreach ($visitaspendientes as $v) {
                            ?>
                            <div class="col-xs-12 col-sm-12 col-md-6">                    
                                <div class="formulario">
                                    <div class="datos-texto">
                                        <ul>
                                            <li><b>ID:</b> <?php echo $v->getId(); ?></li>
                                            <?php if($v->getCanal() != null) { ?>
                                                <li><b>Creador de la visita:</b> <?php echo $v->getCreador()->getNombreCompleto() . ' (' . $v->getCanal()->getNombre() . ')'; ?></li>
                                            <?php } else { ?>
                                                <li><b>Creador de la visita:</b> <?php echo $v->getCreador()->getNombreCompleto() . ' (No hay canal)'; ?></li>
                                            <?php } ?>
                                            <li><b>Nombre:</b> <?php echo $v->getNombreCompleto(); ?></li>
                                            <li><b>Teléfono:</b> 
                                                <a href="tel:<?php echo $v->getTelefono1();?>"><span itemprop="tel"><?php echo $v->getTelefono1();?></span></a>
                                                - 
                                                <a href="tel:<?php echo $v->getTelefono2();?>"><span itemprop="tel"><?php echo $v->getTelefono2();?></span></a>
                                            </li>
                                            <li class="datos-direccion"><b>Dirección:</b> <?php echo $v->getDireccion(); ?></li>
                                            <li><b>Email:</b> <?php echo $v->getEmail(); ?></li>
                                            <?php if($v->getFechaVisita()){ ?>
                                                <li><b>Fecha Visita:</b> <?php echo $v->getFechaVisita()->format('d-M-Y H:i:s'); ?></li>
                                            <?php } else { ?>
                                                <li><b>Fecha visita:</b> No se ha asignado una fecha concreta </li>
                                            <?php } ?>
                                            <?php if(isset($rol) && ($rol === 50 || $rol === 100)) { ?>
                                                <li><b>Canal:</b> <?php echo $v->getCanal(); ?></li>
                                            <?php } ?>
                                            <li><b>Miembros:</b> <?php echo $v->getMiembros(); ?></li>
                                            <li><b>Datos Técnicos:</b> 
                                                <?php if($v->getTermogas()) echo 'Termo de Gas. ' ?> 
                                                <?php if($v->getCaldera()) echo 'Caldera. ' ?> 
                                                <?php if($v->getEquipoexterno()) echo 'Equipo Externo. ' ?> 
                                                <?php if($v->getTermoelectrico()) echo 'Termo Eléctrico. ' ?> 
                                            </li>
                                            <li><b>Notas:</b> <?php echo $v->getNotas(); ?></li>
                                        </ul>
                                    </div>                                  
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>


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
    function validarVisita() {
        var mensaje = "";
        var valido = true;
        if ($('#formcvlocality').val() == '') {
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
            mensaje = mensaje + "<p>Introduce un canal válido</p>";
            valido = false;
        }
        if ($("#delegacion").val() === "def") {
            mensaje = mensaje + "<p>Introduce una delegación válida</p>";
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
    });
</script>