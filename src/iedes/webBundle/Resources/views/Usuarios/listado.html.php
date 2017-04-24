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
            <div class="col-xs-12 intranet"> 
                    <h3>Listado</h3>
                    <?php
                    if (isset($usuarios) && $usuarios) {
                        $i = 0;
                        foreach ($usuarios as $u) {
                            $i = $i + 1;
                            ?>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="formulario">
                                    <div class="datos-texto">
                                        <ul>
                                            <li><b>ID:</b> <?php echo $u->getId(); ?></li>
                                            <li><b>Nombre:</b> <?php echo $u->getNombreCompleto(); ?></li>
                                            <li><b>Teléfono:</b> 
                                                <a href="tel:<?php echo $u->getTelefono1();?>"><span itemprop="tel"><?php echo $u->getTelefono1();?></span></a>
                                                - 
                                                <a href="tel:<?php echo $u->getTelefono2();?>"><span itemprop="tel"><?php echo $u->getTelefono2();?></span></a>
                                            </li>
                                            <li><b>Email:</b> <?php echo $u->getEmail(); ?></li>
                                            <li><b>Rol:</b> <?php echo $u->getRol(); ?></li>
                                            <?php if($u->getActivo()) { ?>
                                                <li><b>Activo:</b>Activo</li>
                                            <?php } else { ?>
                                                <li><b>Activo:</b>Inactivo</li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <form action="<?php echo $view['router']->generate('editar_usuario', array('idusuario' => $u->getId())) ?>" 
                                          method="post" 
                                          enctype="multipart/form-data">
                                        <ul>                               
                                            <li><button name="formListadoUsuarios" class="exit btn-redondeado" type="submit">Editar</button></li>             
                                        </ul>
                                    </form>
                                    

                                </div>
                            </div>
                            <?php if ($i % 2 == 0) { ?>
                                <div class="clearfix "></div>
                            <?php } ?>
                        <?php }
                    } ?>
            </div>
        </div>
    </div>
    
    <script>
        function validarVisita(id){
            $(".panel-alert").removeClass("alert-danger");
            $(".panel-alert").removeClass("alert-success");
            $(".panel-alert").addClass("alert-warning");
            var mensaje = "";
            if ($('#'+id).val() == 'def') {
                mensaje = mensaje + '<p>Elija un comercial válido</p>';
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

    <script>
        $(document).ready(function() {

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