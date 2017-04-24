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
                    <?php if($rol === 50 || $rol === 100) { ?>
                        <h3>Asignar Jefe de equipo o Comercial</h3>
                    <?php } else { ?>
                        <h3>Asignar Comercial</h3>
                    <?php } ?>
                    <?php
                    if (isset($visitaspendientes) && $visitaspendientes) {
                        $i = 0;
                        foreach ($visitaspendientes as $v) {
                            $i = $i + 1;
                            ?>

                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="formulario">
                                    <div class="datos-texto">
                                        <ul>
                                            <li><b>ID:</b> <?php echo $v->getId(); ?></li>
                                            <li><b>Nombre:</b> <?php echo $v->getNombreCompleto(); ?></li>
                                            <li><b>Teléfono:</b> 
                                                <a href="tel:<?php echo $v->getTelefono1();?>"><span itemprop="tel"><?php echo $v->getTelefono1();?></span></a>
                                                - 
                                                <a href="tel:<?php echo $v->getTelefono2();?>"><span itemprop="tel"><?php echo $v->getTelefono2();?></span></a>
                                            </li>
                                            <li class="datos-direccion"><b>Dirección:</b> <?php echo $v->getDireccion(); ?></li>
                                            <li><b>Email:</b> <?php echo $v->getEmail(); ?></li>
                                            <li><b>Canal:</b> <?php echo $v->getCanal(); ?></li>
                                            <li><b>Creador:</b> <?php echo $v->getCreador()->getNombreCompleto() . " (" . $v->getCreador()->getDelegacion()->getNombre() . ")"; ?></li>
                                            <?php if($v->getFechaVisita()){ ?>
                                                <li><b>Fecha Visita:</b> <?php echo $v->getFechaVisita()->format('d-m-Y H:i:s'); ?></li>
                                            <?php } else { ?>
                                                <li><b>Fecha visita:</b> No se ha asignado una fecha concreta </li>
                                            <?php } ?>
                                            <li><b>Notas:</b> <?php echo $v->getNotas(); ?></li>
                                        </ul>
                                    </div>
                                    <form action="<?php echo $view['router']->generate('asignar_visita', array('idvisita' => $v->getId())) ?>" 
                                          method="post" 
                                          onSubmit="return validarVisita('comercial<?php echo $v->getId() ?>')"
                                          enctype="multipart/form-data">
                                        <ul>
                                            <li>                                
                                                <select id="comercial<?php echo $v->getId() ?>" class="form-control" name="usuario">
                                                    <?php if($rol === 50 || $rol === 100) { ?>
                                                        <option value="def">- Jefes de equipo - </option>
                                                        <?php foreach($jefes as $j) { ?>
                                                            <option value="<?php echo $j->getId(); ?>"> <?php echo $j->getNombreCompleto(); ?></option>
                                                        <?php } ?>
                                                        <option value="def"></option>
                                                    <?php } ?>
                                                    <option value="def">- Comercial- </option>
                                                    <?php foreach($comerciales as $c) { ?>
                                                        <option value="<?php echo $c['id']; ?>">[ <?php echo $c['asig']; ?> ] <?php echo $c['nombreCompleto']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </li>
                                            <li><button name="formAsignarVisita" class="exit btn-redondeado" type="submit">Asignar Visita</button></li>             
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