<?php $view->extend('::baseIntranet.html.php'); ?>

<!-- <script src="/js/jquery.ripples.js"></script> -->

<div class="panel-alert alert-warning" style="display:none;">
    <span>&times;</span>
    <p>Mensaje.</p>
</div>

<div id="menu-intranet" class="container espacio">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 intranet">
                <h3>Hola <?php echo strtoupper($nicklogeado) . ' [' . $idlogeado . ']' ?>. Bienvenido a la intranet de iEDES</h3>
                <ul>                    
                    <?php if($rol === 20 || $rol === 50 || $rol === 100) { ?>
                        <li><a href="<?php echo $view['router']->generate("usuarios_menu"); ?>"><button class="exit btn-redondeado">Usuarios</button></a></li>
                    <?php } ?>
                    <?php if($rol !== 1) { ?>
                        <li><a href="<?php echo $view['router']->generate("visitas"); ?>"><button class="exit btn-redondeado">Visitas</button></a></li>
                        <li><a href="<?php echo $view['router']->generate("contactos"); ?>"><button class="exit btn-redondeado">Contactos</button></a></li>
                        <li><a href="<?php echo $view['router']->generate("catalogos"); ?>"><button class="exit btn-redondeado">Catálogos</button></a></li>
                    <?php } ?>
                </ul>
                <?php //if(isset($usuarios) && $usuarios) { ?>
                    <!-- <form action="<?php //echo $view['router']->generate('loginas', array('idusuario' => $_POST['loginas'])) ?>" 
                          method="post" 
                          enctype="multipart/form-data">
                        <select class="form-control" id="loginas" name="loginas">
                            <option value="def">- Rol- </option>
                            <?php //foreach($usuarios as $u) { ?>       
                                <option value="<?php //$u->getId()?>"><?php //echo $u->getId() . ' - ' . $u->getNombreCompleto() ?></option>       
                            <?php //} ?>
                        </select>

                        <ul>
                            <li><button value="Loginas" class="exit btn-redondeado" type="submit">Login as</button></li>          
                        </ul>
                    </form>
                <?php //} else { ?>
                    <ul>
                        <li><a href="<?php //echo $view['router']->generate("intranet"); ?>"><button class="exit btn-redondeado">Cargar usuarios</button></a></li>           
                    </ul>
                <?php //} ?>  -->
                
            </div>
        </div>
        
        <!-- SECCION DE CALENDARIO -->    
        <div class="row">
            <div class=" col-xs-12">
                <h1>Calendario de visitas</h1>
                <div id='calendar'></div>
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

<script>
    $(document).ready(function() {
        calendar();
    });
</script>

<script>
    function calendar(){     

        var eventos = new Array();
        var cont = 0;
        <?php 
        if(isset($visitasCalendario)){
            $background = '#1E90FF';
            $color = 'white';
            $comercialactual = null;
            
            foreach($visitasCalendario as $v){
                if($v->getFechaVisita()){
                    $date = $v->getFechaVisita();
                    $y = $date->format('Y');
                    $m = $date->format('m')-1;
                    $d = $date->format('d');
                    $h = $date->format('H');
                    $i = $date->format('i');
                    $url = $v->getId() . ". " . $v->getNombreCompleto();
                    /*$url = str_replace(' ', '_', $url);
                    $url = "../actividad/".$url;*/

                    //si no es jefe de equipo, se va a mirar las visitas por cliente, y si 
                    //tiene o no resultado
                    if($rol != 20){
                        if($v->getResultadoVisitas() != null){

                            switch ($v->getResultadoVisitas()->getId()){
                                case '0': { $background = 'grey'; $color = '#F9F9F9'; break; }
                                case '1': { $background = '#CE8483'; $color = '#F9F9F9'; break; }
                                case '2': { $background = 'purple'; $color = '#F9F9F9'; break; }
                                case '3': { $background = '#F2CBEE'; break; }
                                case '4': { $background = '#f5e79e'; break; }
                                case '5': { $background = '#BFF790'; break; }
                                case '6': { $background = '#6D6'; break; }
                                case '7': { $background = '#08C'; $color = '#F9F9F9'; break; }
                                case '8': { $background = '#83C2EF'; break; }
                                case '9': { $background = 'orange'; break; }
                                case '10': { $background = 'brown'; $color = '#F9F9F9'; break; }           

                                default: $background = 'black'; $color = '#F9F9F9'; break;
                            }
                        } 
                        else{
                            $background = '#1E90FF';
                        }
                    }
                    
                    //si es un jefe de equipo el usuario logueado, se elegirán los colores
                    //por comercial
                    else{
                        if($v->getComercial()->getId() != $comercialactual){
                            $comercialactual = $v->getComercial()->getId();
                            $background = '#' . substr(md5(rand()), 0, 6);
                        }
                    }        
                    
                    ?>
                            
                    var background = '<?php echo $background; ?>';
                    var color = '<?php echo $color; ?>';
                    
                    <?php $titulo = 'title';
                    if($rol == 1 || $rol == 20 || $rol == 50 || $rol == 100){
                        if($v->getComercial()){
                            $titulo = $v->getComercial()->getNombreCorto() . " (" . $v->getDireccion()->getLocality() . ")";
                        }
                        else{
                            $titulo = 'Sin comercial' . " (" . $v->getDireccion()->getLocality() . ")";
                        }
                            
                    } else {
                            $titulo = $v->getNombreClienteCorto() . " (" . $v->getDireccion()->getRoute() . ', ' . $v->getDireccion()->getLocality() . ")";
                    } ?>
                           
                    eventos[cont] = {
                        title: '<?php echo $titulo ?>', 
                        start: new Date(<?=$y?>,<?=$m?>,<?=$d?>,<?=$h?>,<?=$i?>),
                        end: new Date(<?=$y?>,<?=$m?>,<?=$d?>,<?=$h+1?>,<?=$i?>),
                        
                        backgroundColor: background,
                        textColor: color,
                        borderColor: 'white'       
                    };
                    cont++;
        <?php } } } ?>

        $('#calendar').fullCalendar({
            
            editable: false,
            slotEventOverlap: false,
            header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'agendaDay',
            eventSources: [ eventos ],
            
            /*eventMouseover: function(calEvent, jsEvent, view) {

                //alert('Event: ' + calEvent.title);
                
                // change the border color just for fun
                $(this).addClass('bringFrontEventCalendar');

            },
            
            eventMouseout: function(calEvent, jsEvent, view) {
                // change the border color just for fun
                $(this).css('border-color', 'red');

            }*/
            
        });
    }
</script>
