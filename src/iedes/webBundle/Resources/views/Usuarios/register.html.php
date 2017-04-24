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
                    <li><a href="<?php echo $view['router']->generate("usuarios_menu"); ?>">Usuarios</a></li>
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
                <h3>Registro</h3>
                <div class="formulario">    
                    <form action="<?php echo $view['router']->generate('registrar_usuario') ?>" 
                          method="post" 
                          onSubmit="return validarRegistro()"
                          enctype="multipart/form-data">
                        <ul>
                            <!-- <li><input type="text" name="foto" placeholder="Foto"></li> -->
                            <li><input type="text" name="nombre" placeholder="nombre" required></li>
                            <li><input type="text" name="apellido1" placeholder="apellido1" required></li>  
                            <li><input type="text" name="apellido2" placeholder="apellido2"></li> 
                            <li><input type="text" id="telefono1" name="telefono1" placeholder="telefono1" required></li>
                            <li><input type="text" id="telefono2" name="telefono2" placeholder="telefono2"></li>
                            <li><input type="email" name="email" placeholder="Email" required></li>
                            <li>
                                <select class="form-control" id="delegacion" name="delegacion">
                                    <option value="def">- Delegación- </option>
                                    <?php foreach($delegaciones as $d) { ?>
                                        <option value="<?php echo $d->getId(); ?>"><?php echo $d->getNombre(); ?></option>
                                    <?php } ?>
                                </select>
                            </li>
                            <li>
                                <select class="form-control" id="rol" name="rol">  
                                    <option value="def">- Rol- </option>
                                    <?php if (isset($rol) && $rol){ 
                                        if($rol === 20 || $rol === 50 || $rol === 100){ ?>
                                            <option value="32">Captador</option>
                                            <option value="2">Comercial</option>
                                        <?php } ?>
                                        <?php if($rol === 50 || $rol === 100) { ?>
                                            <option value="1">Oficina</option>
                                            <option value="10">Recepción</option>
                                            <option value="20">Jefe de equipo</option>
                                            <option value="21">Coordinador de Telemarketing</option>
                                            <option value="33">Postventa</option>
                                            <option value="31">Telemarketing</option>
                                            <option value="30">Rescate</option>
                                        <?php } ?>
                                        <?php if (isset($rol) && $rol && $rol === 100) { ?>
                                            <option value="50">Controller</option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </li>
                            <li><button name="formRegistro" value="Login" class="exit btn-redondeado" type="submit">Registrar</button></li>
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

        if((!parseInt($("#telefono1").val(), 10) || 0) || $("#telefono1").val().length != 9) {
            mensaje = mensaje + "<p>Introduce un teléfono1 válido</p>";
            valido = false;
        }
        if($("#telefono2").val() !== '' && ((!parseInt($("#telefono2").val(), 10) || 0) || $("#telefono2").val().length != 9)) {
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
        if(!valido)
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
