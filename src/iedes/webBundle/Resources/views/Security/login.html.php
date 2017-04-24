<?php $view->extend('::baseIntranet.html.php'); ?>

<div class="container sin-padding">

    <div class="panel-alert alert-warning" style="display:none;">
        <span>&times;</span>
        <p></p>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-3 col-sm-6 intranet">
                <h3>Accede</h3>
                <div>    
                    <form action="<?= $view['router']->generate('login_check') ?>" method="post">
                        <ul>
                            <li><input id="username" class="form-control" name="_username" type="text" placeholder="Nick o email" value="<?= isset($last_username) ? $last_username : "" ?>" required></li>
                            <li><input id="password" class="form-control" name="_password" type="password" placeholder="Contraseña" required></li>
                            <li><input type="hidden" name="_target_path" value="intranet" /></li>
                            <li><button name="login" value="Login" class="exit btn-redondeado" type="submit">Entrar</button></li>                               
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($errors) && $errors) {
    $msg = "";
    foreach ($errors as $e) {
        $msg = $msg . $e;
    }
    ?>
    <script>
        $(".panel-alert").removeClass("alert-warning");
        $(".panel-alert").addClass("alert-danger");
        $(".panel-alert p").html('<p><?php echo $msg ?></p>');
        $(".panel-alert").show();
    </script>
<?php }
?>

<script>
    $(document).on("click", ".panel-alert span", function() {
        $(".panel-alert").hide();
    });
</script>

