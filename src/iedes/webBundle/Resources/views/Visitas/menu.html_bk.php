<?php $view->extend('::baseIntranet.html.php');?>

<!-- <script src="/js/jquery.ripples.js"></script> -->

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
                        <li><a href="<?php echo $view['router']->generate("intranet"); ?>">Intranet</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- fin menu navegacion -->

<div id="menu-intranet" class="container espacio">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 intranet">
                <ul>                    
                    <?php if($rol === 2 || $rol === 10 || $rol === 21 || $rol === 30 || $rol === 31 || $rol === 32 || $rol === 33 || $rol === 50 || $rol === 100) { ?>
                        <li><a href="<?php echo $view['router']->generate("crear_visita"); ?>"><button class="exit btn-redondeado">Crear visita</button></a></li>
                    <?php } ?> 
                    <?php if($rol === 20) { ?>
                        <li><a href="<?php echo $view['router']->generate("asignar_visita"); ?>"><button class="exit btn-redondeado">Asignar comercial</button></a></li>
                    <?php } ?> 
                    <?php if($rol === 50 || $rol === 100) { ?>
                        <li><a href="<?php echo $view['router']->generate("asignar_visita"); ?>"><button class="exit btn-redondeado">Asignar comercial o jefe</button></a></li>
                    <?php } ?> 
                    <?php if($rol === 2 || $rol === 100) { ?>
                        <li><a href="<?php echo $view['router']->generate("finalizar_visita"); ?>"><button class="exit btn-redondeado">Finalizar visita</button></a></li>           
                    <?php } ?>  
                    <?php if($rol === 30 || $rol === 50 || $rol === 100) { ?>
                        <li><a href="<?php echo $view['router']->generate("rescatar_visita"); ?>"><button class="exit btn-redondeado">Rescatar visita</button></a></li>           
                    <?php } ?>  
                    <li><a href="<?php echo $view['router']->generate("estado_visitas"); ?>"><button class="exit btn-redondeado">Estado visitas</button></a></li>
                </ul>
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
    $(document).on("click", ".panel-alert span", function() {
        $(".panel-alert").hide();
    });
</script>
