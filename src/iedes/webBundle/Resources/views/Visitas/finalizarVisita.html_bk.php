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
                
                    <h3>Finalizar Visita</h3>
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
                                            <li><b>Email:</b> <?php echo $v->getEmail(); ?></li>
                                            <li class="datos-direccion"><b> Dirección:</b> <?php echo $v->getDireccion(); ?></li>
                                            <?php if($v->getFechaVisita()){ ?>
                                                <li><b>Fecha Visita:</b> <?php echo $v->getFechaVisita()->format('d-m-y H:i:s'); ?></li>
                                            <?php } ?>    
                                            <li><b>Miembros:</b> <?php echo $v->getMiembros(); ?></li>
                                            <li><b>Datos Técnicos:</b> 
                                                <?php if($v->getTermogas()) echo 'Termo de Gas. ' ?> 
                                                <?php if($v->getCaldera()) echo 'Caldera. ' ?> 
                                                <?php if($v->getEquipoexterno()) echo 'Equipo Externo. ' ?> 
                                                <?php if($v->getTermoelectrico()) echo 'Termo Eléctrico. ' ?> 
                                            </li>
                                            <li><b>Notas:</b> <?php echo $v->getNotas(); ?> </li>
                                            <?php if($v->getCreador()) { ?>
                                                <li>
                                                    <b>Creador de la visita:</b> 
                                                    <?php echo $v->getCreador()->getNombreCompleto() . ' (' . $v->getCanal()->getNombre() . ')'; ?>
                                                </li>
                                            <?php } ?>
                                            <?php if($v->getRescatador()) { ?>
                                                <li>
                                                    <b>Rescatador de la visita:</b> 
                                                    <?php echo $v->getRescatador()->getNombreCompleto(); ?>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <form action="<?php echo $view['router']->generate('finalizar_visita', array('idvisita' => $v->getId())) ?>" 
                                        method="post" 
                                        oninput="Vinteres.value='Interés: ' + parseInt(interes.value)"
                                        onSubmit="return validarVisita('visita<?php echo $v->getId() ?>', 'resultado<?php echo $v->getId() ?>', 'fecha<?php echo $v->getId() ?>', 'hora<?php echo $v->getId() ?>')"
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
                                                        <option value="<?php echo $r->getId() ?>"><?php echo $r->getNombre() ?></option>
                                                    <?php } ?>
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
        function validarVisita(visita, resul, fecha, hora){
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
                $(".panel-alert p").html(mensaje);
                $(".panel-alert").show();
                return false;
            }
            
            return true;
        }
    </script>

<script>
    $(document).ready(function() {
        initialize('formcv');
        
        $(document).on("click", ".panel-alert span", function(){
                    $(".panel-alert").hide(); 
        });
        
        var altura_col = 0;
        
        $(".col-visitas").each(function(){
           if ($(this).height() > altura_col)
           {
               altura_col  = $(this).height();
           }
        });
        
        $(".col-visitas").height(altura_col);
    });
</script>