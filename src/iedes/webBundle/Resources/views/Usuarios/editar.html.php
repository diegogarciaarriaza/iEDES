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

<div class="container sin-padding">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 intranet"> 
                <h3>Editar usuario</h3>
                <div class="formulario">    
                    <form action="<?php echo $view['router']->generate('editar_usuario', array('idusuario' => $usuario->getId())) ?>" 
                          method="post" 
                          onSubmit="return validarRegistro()"
                          enctype="multipart/form-data">
                        <ul>
                            <!-- <li><input type="text" name="foto" placeholder="Foto"></li> -->
                            <li><input type="text" name="nombre" placeholder="nombre" value="<?php echo $usuario->getNombre() ?>" required></li>
                            <li><input type="text" name="apellido1" placeholder="apellido1" value="<?php echo $usuario->getApellido1() ?>" required></li>  
                            <li><input type="text" name="apellido2" placeholder="apellido2" value="<?php echo $usuario->getApellido2() ?>" ></li> 
                            <li><input type="text" id="telefono1" name="telefono1" placeholder="telefono1" value="<?php echo $usuario->getTelefono1() ?>" required></li>
                            <li><input type="text" id="telefono2" name="telefono2" placeholder="telefono2" value="<?php echo $usuario->getTelefono2() ?>" ></li>
                            <li><input type="text" id="password" name="password" placeholder="contraseña"></li>
                            <li><input type="email" name="email" placeholder="Email" value="<?php echo $usuario->getEmail() ?>" ></li>
                            <li>
                                <select class="form-control" id="delegacion" name="delegacion">
                                    <option value="def">- Delegación- </option>
                                    <?php foreach($delegaciones as $d) { ?>
                                        <option value="<?php echo $d->getId(); ?>" <?php if($usuario->getDelegacion() === $d) { ?> selected <?php } ?> ><?php echo $d->getNombre(); ?></option>
                                    <?php } ?>
                                </select>
                            </li>
                            <li>
                                <select class="form-control" id="rol" name="rol">
                                   <option value="def">- Rol- </option>
                                    <?php if (isset($rollogueado) && $rollogueado){ ?> 
                                        <?php if($rollogueado == 20 || $rollogueado == 50 || $rollogueado == 100){ ?>
                                            <option value="32" <?php if($usuario->getRol() == 32) { ?> selected <?php } ?> >Captador</option>
                                            <option value="2" <?php if($usuario->getRol() == '2') { ?> selected <?php } ?> >Comercial</option>
                                        <?php } ?>
                                        <?php if($rollogueado == 50 || $rollogueado == 100){ ?>
                                            <option value="20" <?php if($usuario->getRol() == 20) { ?> selected <?php } ?> >Jefe de equipo</option>
                                            <option value="21" <?php if($usuario->getRol() == 21) { ?> selected <?php } ?> >Coordinador de Telemarketing</option>
                                            <option value="33" <?php if($usuario->getRol() == 33) { ?> selected <?php } ?> >Postventa</option>
                                            <option value="31" <?php if($usuario->getRol() == 31) { ?> selected <?php } ?> >Telemarketing</option>
                                        <?php } ?>
                                        <?php if (isset($rollogueado) && $rollogueado && $rollogueado == 100) { ?>
                                            <option value="50" <?php if($usuario->getRol() == 50) { ?> selected <?php } ?> >Controller</option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </li>
                            <?php if (isset($rollogueado) && $rollogueado){ ?> 
                                <?php if($rollogueado == 50 || $rollogueado == 100){ ?>
                                    <li>
                                        <select class="form-control" id="pasodirecto" name="pasodirecto">
                                            <?php if($rollogueado === 50 || $rollogueado === 100) { ?>
                                                <option value="def">- Paso Directo (Jefes) - </option>
                                                <?php foreach($jefes as $j) { ?>
                                                    <option value="<?php echo $j->getId(); ?> " <?php if($j === $usuario->getPasoDirecto()) { ?> selected <?php } ?> > <?php echo $j->getNombreCompleto(); ?></option>
                                                <?php } ?>
                                                <option value="def"></option>
                                                <option value="def">- Paso Directo (Comerciales) - </option>
                                                <?php foreach($comerciales as $c) { ?>
                                                    <option value="<?php echo $c->getId(); ?>" <?php if($c === $usuario->getPasoDirecto()) { ?> selected <?php } ?> > <?php echo $c->getNombreCompleto(); ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </li>
                                <?php } ?>
                            <?php } ?>
   
                            <li><div class="checkbox big"><label><input type="checkbox" name="activo" value="1" <?php if($usuario->getActivo()) { ?> checked <?php } ?> >Activo</label></div></li>
                            <li><button name="formEdicion" value="Login" class="exit btn-redondeado" type="submit">Guardar Cambios</button></li>
                        </ul>
                    </form>
                </div>
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
    function validarRegistro() {
                var mensaje = "";
                var valido = true;
       
                if ((!parseInt($("#telefono1").val(), 10) || 0) || $("#telefono1").val().length != 9) {
                    mensaje = mensaje + "<p>Introduce un teléfono1 válido</p>";
                    valido = false;
                }
                if ($("#telefono2").val() !== '' && ((!parseInt($("#telefono2").val(), 10) || 0) || $("#telefono2").val().length != 9)) {
                    mensaje = mensaje + "<p>Introduce un teléfono2 válido</p>";
                    valido = false;
                }
                if($("#delegacion").val() === 'def') {
                    mensaje = mensaje + "<p>Introduce una delegación válida</p>";
                    valido = false;
                }
                if($("#rol").val() === 'def') {
                    mensaje = mensaje + "<p>Introduce un rol válido</p>";
                    valido = false;
                }
                if (!valido)
                {
                    $(".panel-alert").removeClass("alert-danger");
                    $(".panel-alert").removeClass("alert-success");
                    $(".panel-alert").addClass("alert-warning");
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