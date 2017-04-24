<?php $view->extend('::baseIntranet.html.php');?>

<!-- <script src="/js/jquery.ripples.js"></script> -->

<div class="panel-alert alert-warning" style="display:none;">
    <span>&times;</span>
    <p>Mensaje.</p>
</div>

<div id="menu-intranet" class="container espacio">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 intranet">
                <h4>Seleccione una opción</h4>
                <ul>                    
                    <li><a href="<?php echo $view['router']->generate("crear_contacto"); ?>"><button class="exit btn-redondeado">Crear contacto</button></a></li>
                    <li><a href="<?php echo $view['router']->generate("listado_contacto"); ?>"><button class="exit btn-redondeado">Listado contactos</button></a></li>           
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
