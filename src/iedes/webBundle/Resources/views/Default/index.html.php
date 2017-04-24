<?php $view->extend('::base.html.php');?>

<!-- Banners -->
<div class="container navbar-fixed-top banner-rojo">
    <button onclick="cerrarBannerRojo()">Aceptar</button>
    <p>Error</p>
</div> 
   
<!-- Inicio ventana modal teléfono enviado -->
<div class="modal fade modalNuevo" id="modalLellamamosNuevo" tabindex="-1" role="dialog" aria-labelledby="modalLellamamosLabel" aria-hidden="true" 
         data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="row contenedor_modales">
                    
                    <div class="hidden-xs col-sm-5 sinpadding">
                        <img class="telefono" src="/img/telefono.png" alt="teléfono iEDES Solenergy" title="teléfono iEDES Solenergy">
                        <h4>Nos pondremos en contacto contigo en el menor tiempo posible.</h4>
                    </div>

                    <div class="col-xs-12 col-sm-7 sinpadding">
                        <h3 class="rojo">Tu solicitud ha sido procesada, en breve nos pondremos en contacto contigo.</h3>
                        <img class="reloj" src="/img/reloj.jpg" alt="reloj" title="reloj">
                        <h4>Horario de atención al cliente</h4>
                        <h4>De 9.00 h a 19.00 h</h4>
                        <h3><a href="tel:+900800052">900 800 052</a></h3>
                        <p>Gracias por confiar en</p>
                        <img class="logo_lellamamosXS" src="/img/logo.png" alt="logo iEDES Solenergy" title="logo iEDES Solenergy">
                    </div>

                    <div class="col-xs-12 sinpadding">
                        <button type="button" class="send btn-redondeado" data-dismiss="modal">Aceptar</button>                  
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- Fin ventana modal teléfono enviado-->

<!-- inicio de formularios modales de los iconos de pié de página -->

<div class="modal fade modalNuevo" id="modalPromotor" tabindex="-1" role="dialog" aria-labelledby="modalPromotorLabel" aria-hidden="true" 
     data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-center">
        <div class="container modal-content">

            <div class="row contenedor_modales">  
                <div class="hidden-xs col-sm-5 sinpadding">
                    <img class="telefono" src="/img/iconos-pie/icon1pie.png" alt="teléfono iEDES Solenergy" title="teléfono iEDES Solenergy">
                    <h4>Si eres constructor o promotor, no dudes en rellenar nuestro formulario y en breve nos pondremos en contacto contigo.</h4>
                    <img class="reloj" src="/img/reloj.jpg" alt="reloj" title="reloj">
                    <h4>Horario de atención al cliente</h4>
                    <h4>De 9.00 h a 19.00 h</h4>
                    <h3><a href="tel:+900800052">900 800 052</a></h3>
                    <p>Gracias por confiar en</p>
                    <img class="logo_lellamamosXS" src="/img/logo.png" alt="logo iEDES Solenergy" title="logo iEDES Solenergy">
                </div>

                <div class="col-xs-12 col-sm-7 sinpadding">
                    <h3>Formulario para promotores y constructores</h3>
                    <h4 class="visible-xs">Si eres constructor o promotor, no dudes en rellenar nuestro formulario y en breve nos pondremos en contacto contigo.</h4>
                    <form id="formularioPromotor" 
                      action="<?php echo $view['router']->generate("index");?>"
                      method="POST"
                      onSubmit="return validarDatosPromotor()">                

                        <input type="text" name="promotorNombre" id="promotorNombre" placeholder="Nombre" required> 
                        <input type="text" name="promotorApellidos" id="promotorApellidos" placeholder="Apellidos" required>
                        <input type="text" name="promotorPoblacion" id="promotorautocomplete" placeholder="Población" required>
                        <input type="text" name="promotorTelefono" id="promotorTelefono" placeholder="Teléfono" required>
                        <input type="email" name="promotorEmail" id="promotorEmail" placeholder="Email" required>
                        <textarea name="promotorComentarios" id="promotorComentarios" placeholder="Comentarios" rows=3></textarea>
                        
                        <!--campos ocultos-->
                        <input name="promotorroute" id="promotorroute" hidden />
                        <input name="promotorstreet_number" id="promotorstreet_number" hidden />
                        <input name="promotorpostal_code" id="promotorpostal_code" hidden />
                        <input name="promotorlocality" id="promotorlocality" hidden />
                        <input name="promotoradministrative_area_level_3" id="promotoradministrative_area_level_3" hidden />
                        <input name="promotoradministrative_area_level_2" id="promotoradministrative_area_level_2" hidden />
                        <input name="promotoradministrative_area_level_1" id="promotoradministrative_area_level_1" hidden />
                        <input name="promotorcountry" id="promotorcountry" hidden />  

                        <button type="submit" class="send btn-redondeado" name="formularioPromotores">Enviar</button>
                        <button type="button" class="exit btn-redondeado" data-dismiss="modal">Salir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modalNuevo" id="modalNegocio" tabindex="-1" role="dialog" aria-labelledby="modalNegocioLabel" aria-hidden="true" 
     data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-center">
        <div class="container modal-content">

            <div class="row contenedor_modales">  
                <div class="hidden-xs col-sm-5 sinpadding">
                    <img class="telefono" src="/img/iconos-pie/icon1pie.png" alt="teléfono iEDES Solenergy" title="teléfono iEDES Solenergy">
                    <h4>Si tienes un negocio, no dudes en rellenar nuestro formulario y en breve nos pondremos en contacto contigo</h4>
                    <img class="reloj" src="/img/reloj.jpg" alt="reloj" title="reloj">
                    <h4>Horario de atención al cliente</h4>
                    <h4>De 9.00 h a 19.00 h</h4>
                    <h3><a href="tel:+900800052">900 800 052</a></h3>
                    <p>Gracias por confiar en</p>
                    <img class="logo_lellamamosXS" src="/img/logo.png" alt="logo iEDES Solenergy" title="logo iEDES Solenergy">
                </div>

                <div class="col-xs-12 col-sm-7 sinpadding">
                    <h3>Formulario para gente de negocios</h3>
                    <h4 class="visible-xs">Si tienes un negocio, no dudes en rellenar nuestro formulario y en breve nos pondremos en contacto contigo.</h4>
                    <form id="formularioNegocio" 
                      action="<?php echo $view['router']->generate("index");?>"
                      method="POST"
                      onSubmit="return validarDatosNegocio()">                

                        <input type="text" name="negocioNombre" id="negocioNombre" placeholder="Nombre" required> 
                        <input type="text" name="negocioApellidos" id="negocioApellidos" placeholder="Apellidos" required>
                        <input type="text" name="negocioPoblacion" id="negocioautocomplete" placeholder="Población" required>
                        <input type="text" name="negocioTelefono" id="negocioTelefono" placeholder="Teléfono" required>
                        <input type="email" name="negocioEmail" id="negocioEmail" placeholder="Email" required>
                        <textarea name="negocioComentarios" id="negocioComentarios" placeholder="Comentarios" rows=3></textarea>
                        
                        <!--campos ocultos-->
                        <input name="negocioroute" id="negocioroute" hidden />
                        <input name="negociostreet_number" id="negociostreet_number" hidden />
                        <input name="negociopostal_code" id="negociopostal_code" hidden />
                        <input name="negociolocality" id="negociolocality" hidden />
                        <input name="negocioadministrative_area_level_3" id="negocioadministrative_area_level_3" hidden />
                        <input name="negocioadministrative_area_level_2" id="negocioadministrative_area_level_2" hidden />
                        <input name="negocioadministrative_area_level_1" id="negocioadministrative_area_level_1" hidden />
                        <input name="negociocountry" id="negociocountry" hidden />  

                        <button type="submit" class="send btn-redondeado" name="formularioNegocios">Enviar</button>
                        <button type="button" class="exit btn-redondeado" data-dismiss="modal">Salir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalNuevo" id="modalRenovaciones" tabindex="-1" role="dialog" aria-labelledby="modalRenovacionesLabel" aria-hidden="true" 
     data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-center">
        <div class="container modal-content">

            <div class="row contenedor_modales">  
                <div class="hidden-xs col-sm-5 sinpadding">
                    <img class="telefono" src="/img/iconos-pie/icon1pie.png" alt="teléfono iEDES Solenergy" title="teléfono iEDES Solenergy">
                    <h4>Completa el formulario y recibirás un email con el descuento que podemos ofrecerte por acogerte al plan renove.</h4>
                    <img class="reloj" src="/img/reloj.jpg" alt="reloj" title="reloj">
                    <h4>Horario de atención al cliente</h4>
                    <h4>De 9.00 h a 19.00 h</h4>
                    <h3><a href="tel:+900800052">900 800 052</a></h3>
                    <p>Gracias por confiar en</p>
                    <img class="logo_lellamamosXS" src="/img/logo.png" alt="logo iEDES Solenergy" title="logo iEDES Solenergy">
                </div>

                <div class="col-xs-12 col-sm-7 sinpadding">
                    <h3>Oferta de renovación</h3>
                    <h4 class="visible-xs">Completa el formulario y recibirás un email con el descuento que podemos ofrecerte por acogerte al plan renove.</h4>
                    <form id="formularioRenovacion" 
                      action="<?php echo $view['router']->generate("index");?>"
                      method="POST"
                      onSubmit="return validarDatosRenovacion()">                

                        <input type="text" name="renovacionNombre" id="renovacionNombre" placeholder="Nombre" required> 
                        <input type="text" name="renovacionApellidos" id="renovacionApellidos" placeholder="Apellidos" required>
                        <input type="text" name="renovacionPoblacion" id="renovacionautocomplete" placeholder="Población" required>
                        <input type="text" name="renovacionTelefono" id="renovacionTelefono" placeholder="Teléfono" required>
                        <input type="email" name="renovacionEmail" id="renovacionEmail" placeholder="Email" required>
                        <input type="number" name="renovacionAnio" id="renovacionAnio" placeholder="Año instalación">
                        <textarea name="renovacionEquipo" id="renovacionEquipo" placeholder="Equipo antiguo" rows=2></textarea>

                        <!--campos ocultos-->
                        <input name="renovacionroute" id="renovacionroute" hidden />
                        <input name="renovacionstreet_number" id="renovacionstreet_number" hidden />
                        <input name="renovacionpostal_code" id="renovacionpostal_code" hidden />
                        <input name="renovacionlocality" id="renovacionlocality" hidden />
                        <input name="renovacionadministrative_area_level_3" id="renovacionadministrative_area_level_3" hidden />
                        <input name="renovacionadministrative_area_level_2" id="renovacionadministrative_area_level_2" hidden />
                        <input name="renovacionadministrative_area_level_1" id="renovacionadministrative_area_level_1" hidden />
                        <input name="renovacioncountry" id="renovacioncountry" hidden />  
                        
                        <button type="submit" class="send btn-redondeado" name="formularioRenovaciones">Enviar</button>
                        <button type="button" class="exit btn-redondeado" data-dismiss="modal">Salir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modalNuevo" id="modalTrabaja" tabindex="-1" role="dialog" aria-labelledby="modalTrabajaLabel" aria-hidden="true" 
     data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-center">
        <div class="container modal-content">

            <div class="row contenedor_modales">  
                <div class="hidden-xs col-sm-5 sinpadding">
                    <img class="telefono" src="/img/iconos-pie/icon1pie.png" alt="teléfono iEDES Solenergy" title="teléfono iEDES Solenergy">
                    <h4>Si deseas trabajar con nosotros, no dudes en rellenar nuestro formulario para dejar tus datos.</h4>
                    <img class="reloj" src="/img/reloj.jpg" alt="reloj" title="reloj">
                    <h4>Horario de atención al cliente</h4>
                    <h4>De 9.00 h a 19.00 h</h4>
                    <h3><a href="tel:+900800052">900 800 052</a></h3>
                    <p>Gracias por confiar en</p>
                    <img class="logo_lellamamosXS" src="/img/logo.png" alt="logo iEDES Solenergy" title="logo iEDES Solenergy">
                </div>

                <div class="col-xs-12 col-sm-7 sinpadding">
                    <h3>Formulario trabaja con nosotros</h3>
                    <h4 class="visible-xs">Si deseas trabajar con nosotros, no dudes en rellenar nuestro formulario para dejar tus datos.</h4>
                    <form id="formularioTrabajar" 
                      action="<?php echo $view['router']->generate("index");?>"
                      method="POST"
                      enctype="multipart/form-data"
                      onSubmit="return validarDatosTrabaja()">                

                        <input type="text" name="trabajaNombre" id="trabajaNombre" placeholder="Nombre" > 
                        <input type="text" name="trabajaApellidos" id="trabajaApellidos" placeholder="Apellidos" >
                        <input type="text" name="trabajaPoblacion" id="trabajaautocomplete" placeholder="Población" >
                        <input type="text" name="trabajaTelefono" id="trabajaTelefono" placeholder="Teléfono" >
                        <input type="email" name="trabajaEmail" id="trabajaEmail" placeholder="Email" >
                        <div class="uploadfile">
                            <input type="file" name="trabajaCV" id="trabajaCV"  class="filestyle" data-buttonBefore="true" data-buttonText="C.V." data-size="md" data-iconName="glyphicon glyphicon-paperclip">
                        </div>
                        <textarea name="trabajaComentarios" id="trabajaComentarios" placeholder="Carta de presentación" rows=5></textarea>
                        
                        <!--campos ocultos-->
                        <input name="trabajaroute" id="trabajaroute" hidden />
                        <input name="trabajastreet_number" id="trabajastreet_number" hidden />
                        <input name="trabajapostal_code" id="trabajapostal_code" hidden />
                        <input name="trabajalocality" id="trabajalocality" hidden  />
                        <input name="trabajaadministrative_area_level_3" id="trabajaadministrative_area_level_3" hidden />
                        <input name="trabajaadministrative_area_level_2" id="trabajaadministrative_area_level_2" hidden />
                        <input name="trabajaadministrative_area_level_1" id="trabajaadministrative_area_level_1" hidden />
                        <input name="trabajacountry" id="trabajacountry" hidden />  
                    
                        <button type="submit" class="send btn-redondeado" name="formularioTrabaja">Enviar</button>
                        <button type="button" class="exit btn-redondeado" data-dismiss="modal">Salir</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- fin de formularios modales de los iconos de pié de página -->

<!-- Inicio modal renovación oferta 200 -->

<div class="modal fade modalNuevo" id="modalRenovacionOferta200" tabindex="-1" role="dialog" aria-labelledby="modalRenovacion200Label" aria-hidden="true" 
     data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-center">
        <div class="container modal-content">

            <div class="row contenedor_modales">  
                <div class="col-xs-12 sinpadding">
                    <div class="cycle-slideshow" 
                        data-cycle-center-vert=true
                        data-cycle-center-horz=true
                        >
                        <img class="img-responsive" src="/img/modal200/logo.png" alt="logo iEDES Solenergy" title="logo iEDES Solenergy">
                    </div>
                    <h3>Gracias al éxito de la promoción “Ahorra 200 Euros” la prorrogamos hasta el 31 de Diciembre!</h3>
                    <h2 class="rojo">Benefíciate de 200€ de descuento</h2>
                    <h4>si haces tu presupuesto online e instalas tu equipo solar Doble Plus<br /> antes del 31 de Diciembre</h4>
                </div>

                <div class="hidden-xs col-sm-6 sinpadding top_imagen_10">
                    <div class="cycle-slideshow" 
                        data-cycle-center-vert=true
                        data-cycle-center-horz=true
                        >
                        <img class="img-responsive" src="/img/modal200/monitor.png" alt="formulario de descuento iEDES Solenergy" title="formulario de descuento iEDES Solenergy">
                    </div>    
                </div>
                <div class="col-sm-6">
                    <h6 class="hidden-xs"><strong class="rojo">Ventajas </strong> del Cálculo Online</h6>
                    <div class="hidden-xs ventajas">
                        <span class="glyphicon glyphicon-ok"></span><h5>Rápido y Fácil</h5>
                        <span class="glyphicon glyphicon-ok"></span><h5>Sin compromiso</h5>
                        <span class="glyphicon glyphicon-ok"></span><h5>... y ahora ¡con 200€ de <strong class="rojo">AHORRO!</strong></h5>
                    </div>
                    <h2 class="hidden-xs">¿A qué esperas?</h2>
                    <button type="submit" class="send btn-redondeado" data-dismiss="modal">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fin renovacion oferta 200 -->

<!-- Inicio imagen central -->
<div class="container" id="img_central">
    <div class="row">

        <!-- Inicio carrusel para vistas mayores a XS -->
        <div class="col-xs-12 col-md-8 sinpadding">
            <div id="carousel-indexXS" class="carousel slide sinpadding" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carouse-indexXS" data-slide-to="0" class="active"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="1"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="2"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="3"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="4"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="5"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="6"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="7"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="8"></li>
                    <li data-target="#carouse-indexXS" data-slide-to="9"></li>

                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <a href="<?php echo $view['router']->generate("energia_solar_fotovoltaica");?>">
                            <img src="/img/carrusel/kit-placas.jpg" alt="energia solar fotovoltaica de iEDES Solenergy" title="energia solar fotovoltaica de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">iEDES Solenergy. Abre la puerta al ahorro.</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("energia_solar_termica");?>">
                            <img src="/img/carrusel/es-termica.jpg" alt="energia solar termica de iEDES Solenergy" title="energia solar térmica de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">Descubre lo que la energía solar térmica puede ofrecerte</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("energia_solar_fotovoltaica");?>">
                            <img src="/img/carrusel/trabaja-nosotros2.jpg" alt="trabaja con nosotros, únete al equipo de iEDES Solenergy" title="trabaja con nosotros, únete al equipo de iEDES Solenergy">
                            
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">¿Quieres trabajar con nosotros? Únete al equipo iEDES!</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("aerotermias");?>">
                            <img src="/img/carrusel/port_airsistem.jpg" alt="Sistema airsistem de iEDES Solenergy" title="sistema airsistem de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">iEDES Solenergy. Abre la puerta al ahorro.</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("aerotermias");?>">
                            <img src="/img/carrusel/airsistem.jpg" alt="Sistema airsistem de iEDES Solenergy" title="sistema airsistem de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">iEDES Solenergy. Abre la puerta al ahorro.</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("aerotermias");?>">
                            <img src="/img/carrusel/aerotermias.jpg" alt="Sistema airsistem de iEDES Solenergy" title="sistema airsistem de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">iEDES Solenergy. Abre la puerta al ahorro.</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("aires_acondicionados");?>">
                            <img src="/img/carrusel/aires_acondicionados.jpg" alt="Aires acondicionados de iEDES Solenergy" title="aires acondicionados de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">iEDES Solenergy. Abre la puerta al ahorro.</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("aires_acondicionados");?>">
                            <img src="/img/carrusel/climatizacion.jpg" alt="climatización de iEDES Solenergy" title="climatización de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">iEDES Solenergy. Abre la puerta al ahorro.</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("estufas");?>">
                            <img src="/img/carrusel/estufas.jpg" alt="estufas de pellets de iEDES Solenergy" title="estufas de pellets de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">iEDES Solenergy. Abre la puerta al ahorro.</h1>-->
                            </div>
                        </a>
                    </div>
                    <div class="item">
                        <a href="<?php echo $view['router']->generate("cloradores_salinos");?>">
                            <img src="/img/carrusel/salud_piscinas.jpg" alt="piscinas de iEDES Solenergy" title="salud piscinas de iEDES Solenergy">
                            <div class="carousel-caption">
                                <!--<h1 class="centrado">iEDES Solenergy. Abre la puerta al ahorro.</h1>-->
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-indexXS" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo $view['translator']->trans('Siguiente >', array(), "index")?></span>
                </a>
                <a class="right carousel-control" href="#carousel-indexXS" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only"><?php echo $view['translator']->trans('< Anterior', array(), "index")?></span>
                </a>

            </div>
        </div>

        <!-- Inicio carrusel para XS -->
        
        <!-- Fin carrusel -->

        <!-- Inicio le llamamos -->
        <div class="hidden-xs hidden-sm col-md-4 centrado col_form_lellamamos">
            <h1><?php echo $view['translator']->trans('Calcula online', array(), "index")?></h1>
            <h2><?php echo $view['translator']->trans('el precio de tu placa solar para agua caliente', array(), "index")?></h2>
            <a href="#ancho-calculo-online" class="btn btn-warning btn-redondeado"><?php echo $view['translator']->trans('CALCULAR', array(), "index")?> </a>
            <div class="linea"></div>
            <h4><?php echo $view['translator']->trans('Si lo prefieres te llamamos GRATIS', array(), "index")?></h4>

            <form id="formLellamamos" 
                  action="<?php echo $view['router']->generate("index");?>"
                  method="POST">
                
                <input type='text' name='telefono_lellamamos' id="lellamamos_telefono" placeholder='<?php echo $view['translator']->trans('Teléfono', array(), "index")?>' required>
                <button type="submit" id="lellamamos_submit" name="formularioLellamamos"><?php echo $view['translator']->trans('TE LLAMAMOS', array(), "index")?></button>
                
            </form>

            <h5><?php echo $view['translator']->trans('Presionando el botón aceptas nuestra', array(), "index")?> <br /> <a href="#"><?php echo $view['translator']->trans('política de privacidad', array(), "index")?></a></h5>
            <div class="linea"></div>

            <h1><a href="tel:+900800052">Telf: 900 800 052</a></h1>
        </div>
        <!-- Fin le llamamos -->
    </div>
</div>
<!-- Fin imagen central -->

<!-- Calcula el precio -->
<div class="container espacio_superior">
    <div class="row">
        <div class="col-xs-12">
            <a id="ancho-calculo-online"></a>
            <h1 class="centrado no-margin-inf"><?php echo $view['translator']->trans('Calcula precio', array(), "index")?></h1>
            <h2 class="centrado no-margin-sup"><?php echo $view['translator']->trans('Responde preguntas', array(), "index")?></h2>
        </div>
    </div>
    <div class="row">

        <!-- Inicio promo 150 para sm-->
        <!-- <div class="col-sm-12 hidden-xs hidden-lg hidden-md cont_promo_150SM">
            <div class="promo_150SM">
                <a href="<?php echo $view['router']->generate("premios");?>">
                    <div class="col-xs-offset-1 col-xs-5">
                        <h3 class="rojo no-margin-sup">200€</h3>
                        <h2 class="centrado rojo no-margin-inf">descuento *</h2>
                        <p>Si instalas tu equipo solar modelo Doble Plus antes del <strong class="rojo">31 de Diciembre</strong></p>
                    </div>
                    <div class="col-xs-5">
                        <h4><strong class="rojo">Ventajas </strong> del Cálculo Online</h4>
                        <div class="ventajas">
                            <span class="glyphicon glyphicon-ok"></span><p>Rápido y Fácil</p>
                            <span class="glyphicon glyphicon-ok"></span><p>Sin compromiso</p>
                            <span class="glyphicon glyphicon-ok"></span><p>... y ahora con 200€ de <strong class="rojo">AHORRO!</strong></p>
                        </div>
                        <h6 class="rojo">*Consulta las bases de la promoción.</h6>
                    </div>
                    <div class="col-xs-12">
                        <h1>PRESUPUESTO ONLINE<br/><strong>EMPIEZA AHORA</strong></h1>
                    </div>
                </a>
            </div>
        </div> -->
        <!-- Fin promo 150 para sm-->


        <!-- Inicio calculo precio XS -->
        <!-- La línea inferior la comentamos por si hay que meter otro anuncio a la derecha en un futuro
        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12"> -->
        <div class="col-xs-12"> 
            <form id="formCalculoPrecioEmbedded" class="formCalculoPrecioLG centertable" 
                  action="<?php echo $view['router']->generate("index");?>"
                  method="POST"
                  onSubmit="return validarDatos()">
            
                <fieldset> <!-- 0 -->
                    <h1><?php echo $view['translator']->trans('¿Dónde quieres instalar energía solar térmica para agua caliente?', array(), "index")?></h1>
                    <table class="fsXL1"><tr>
                    <td><input type="radio" name="tipo" id="vivienda" value="vivienda" checked = "checked"> <label for="vivienda"><span></span> <?php echo $view['translator']->trans('Vivienda', array(), "index")?> </label></td>
                    <td><input type="radio" name="tipo" id="negocio"  value="negocio">                      <label for="negocio"><span></span> <?php echo $view['translator']->trans('Negocio', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>


                <fieldset> <!-- 1 -->
                    <h1><?php echo $view['translator']->trans('¿A qué tipo de vivienda va destinada?', array(), "index")?></h1>
                    <table class="fsXL3"><tr>
                    <td><input type="radio" name="vivienda" id="unifamiliar" value="unifamiliar" checked = "checked"> <label for="unifamiliar"><span></span> <?php echo $view['translator']->trans('Unifamiliar', array(), "index")?> </label></td>
                    <td><input type="radio" name="vivienda" id="adosado"     value="adosado">                         <label for="adosado"><span></span> <?php echo $view['translator']->trans('Adosado', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type="radio" name="vivienda" id="pareado"     value="pareado">                         <label for="pareado"><span></span> <?php echo $view['translator']->trans('Pareado', array(), "index")?> </label></td>
                    <td><input type="radio" name="vivienda" id="chalet"      value="chalet">                          <label for="chalet"><span></span> <?php echo $view['translator']->trans('Chalet', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type="radio" name="vivienda" id="casacampo"   value="casacampo">                       <label for="casacampo"><span></span> <?php echo $view['translator']->trans('Casa de campo', array(), "index")?> </label></td>
                    <td><input type="radio" name="vivienda" id="piso"        value="piso">                            <label for="piso"><span></span> <?php echo $view['translator']->trans('Piso', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>

                <fieldset> <!-- 2 -->
                    <h1><?php echo $view['translator']->trans('¿A qué tipo de negocio va destinado?', array(), "index")?></h1>
                    <table class="fsXL5"><tr>
                        <td><input type="radio" name="negocio" id="hotel"           value="hotel" checked = "checked">   <label for="hotel"><span></span> <?php echo $view['translator']->trans('Hotel/Hostal', array(), "index")?> </label></td>
                        <td><input type="radio" name="negocio" id="restaurante"     value="restaurante">                 <label for="restaurante"><span></span> <?php echo $view['translator']->trans('Restaurante', array(), "index")?> </label></td>
                        </tr><tr>
                        <td><input type="radio" name="negocio" id="geriatrico"      value="geriatrico">                  <label for="geriatrico"><span></span> <?php echo $view['translator']->trans('Geriatrico', array(), "index")?> </label></td>
                        <td><iNput type="radio" name="negocio" id="gimnasio"        value="gimnasio">                    <label for="gimnasio"><span></span> <?php echo $view['translator']->trans('Gimnasio', array(), "index")?> </label></td>
                        </tr><tr>
                        <td><input type="radio" name="negocio" id="peluqueria"      value="peluqueria">                  <label for="peluqueria"><span></span> <?php echo $view['translator']->trans('Peluqueria', array(), "index")?> </label></td>
                        <td><input type="radio" name="negocio" id="tintoreria"      value="tintoreria">                  <label for="tintoreria"><span></span> <?php echo $view['translator']->trans('Tintoreria', array(), "index")?></label></td>
                        </tr><tr>
                        <td><input type="radio" name="negocio" id="lavadero"        value="lavadero">                    <label for="lavadero"><span></span> <?php echo $view['translator']->trans('Lavadero coches', array(), "index")?></label></td>
                        <td><input type="radio" name="negocio" id="camping"         value="camping">                     <label for="camping"><span></span> <?php echo $view['translator']->trans('Camping', array(), "index")?></label></td>
                        </tr><tr>
                        <td><input type="radio" name="negocio" id="industrias"      value="industrias">                  <label for="industrias"><span></span> <?php echo $view['translator']->trans('Industria', array(), "index")?></label></td>
                        <td><input type="radio" name="negocio" id="neg_otro"        value="neg_otro">                    <label for="neg_otro"><span></span> <?php echo $view['translator']->trans('Otro negocio', array(), "index")?></label></td>  
                        </tr><tr>
                        <td colspan="2"><input type="radio" name="negocio" id="agrarioganadero" value="agrarioganadero"> <label for="agrarioganadero"><span></span> <?php echo $view['translator']->trans('Sector agrario / ganadero', array(), "index")?></label></td>                 
                    </tr></table>
                    
                </fieldset>

                <fieldset> <!-- 3 -->
                    <h1><?php echo $view['translator']->trans('¿Cuántos miembros tiene su unidad familiar?', array(), "index")?></h1>
                    <table class="fsXL1"><tr>
                    <td><input type='radio' name='miembros' id="masigual4miembros" value='masigual4miembros' checked = "checked"> <label for="masigual4miembros"><span></span> <?php echo $view['translator']->trans('4 ó más', array(), "index")?> </label></td>
                    <td><input type='radio' name='miembros' id="menos4miembros"    value='menos4miembros' >                       <label for="menos4miembros"><span></span> <?php echo $view['translator']->trans('Menos de 4', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>

                <fieldset> <!-- 4 -->
                    <h1><?php echo $view['translator']->trans('Introduce tu código postal', array(), "index")?></h1>
                    <h2><?php echo $view['translator']->trans('Necesitamos al menos tu C.P. para saber a dónde desplazarnos', array(), "index")?></h2>
                    <div class="cuadrodatos">
                        <table><tr>
                            <td></td><td><input type='text' name='datacp' id="datacp"     placeholder='Código Postal' ></td><td></td>
                        </tr></table>
                    </div>
                </fieldset>

                <fieldset> <!-- 5 -->
                    <h1><?php echo $view['translator']->trans('¿Qué sistema de calentamiento de agua tienes actualmente?', array(), "index")?></h1>
                    <table class="fsXL3"><tr>
                    <td><input type='radio' name='calefaccion' id="butano"    value='butano' checked = "checked"> <label for="butano"><span></span> <?php echo $view['translator']->trans('Butano', array(), "index")?> </label></td>
                    <td><input type='radio' name='calefaccion' id="propano"   value='propano' >                   <label for="propano"><span></span> <?php echo $view['translator']->trans('Propano', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='calefaccion' id="gas"       value='gas' >                       <label for="gas"><span></span> <?php echo $view['translator']->trans('Gas Natural', array(), "index")?> </label></td>
                    <td><input type='radio' name='calefaccion' id="electrico" value='electrico' >                 <label for="electrico"><span></span> <?php echo $view['translator']->trans('Termo Eléctrico', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='calefaccion' id="gasoil"    value='gasoil' >                    <label for="gasoil"><span></span> <?php echo $view['translator']->trans('Gasóil', array(), "index")?> </label></td>
                    <td><input type='radio' name='calefaccion' id="placas"    value='placas' >                    <label for="placas"><span></span> <?php echo $view['translator']->trans('Placas Solares', array(), "index")?></label></td>
                    </tr></table>
                </fieldset>

                <!-- Si gas -->
                <fieldset> <!-- 6 -->
                    <h1><?php echo $view['translator']->trans('¿Cuál es tu gasto mensual medio en gas/gasoil?', array(), "index")?></h1>
                    <table class="fsXL1"><tr>
                    <td><input type='radio' name='gas' id="bomb_masigua40" value='bomb_masigua40' checked = "checked">   <label for="bomb_masigua40"><span></span> <?php echo $view['translator']->trans('40€ ó más', array(), "index")?> </label></td>
                    <td><input type='radio' name='gas' id="bomb_menos40"    value='bomb_menos40' >                       <label for="bomb_menos40"><span></span> <?php echo $view['translator']->trans('Menos de 40€', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>

                <!-- Si gas ... tambien gasta electricidad-->
                <fieldset> <!-- 7 -->
                    <h1><?php echo $view['translator']->trans('¿Cuál es tu gasto mensual medio en electricidad?', array(), "index")?></h1>
                    <table class="fsXL1"><tr>
                    <td><input type='radio' name='gas_electrico' id="elec_masigual40" value='elec_masigual40' checked = "checked"> <label for="elec_masigual40"><span></span> <?php echo $view['translator']->trans('40€ ó más', array(), "index")?> </label></td>
                    <td><input type='radio' name='gas_electrico' id="elec_menos40"    value='elec_menos40' >                       <label for="elec_menos40"><span></span> <?php echo $view['translator']->trans('Menos de 40€', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>

                <!-- Si electrico -->
                <fieldset> <!-- 8 -->
                    <h1><?php echo $view['translator']->trans('¿Cuál es tu gasto mensual medio en electricidad?', array(), "index")?></h1>
                    <table class="fsXL1"><tr>
                    <td><input type='radio' name='electrico' id="elec_masigual60" value='butano' checked = "checked"> <label for="elec_masigual60"><span></span> <?php echo $view['translator']->trans('60€ ó más', array(), "index")?> </label>
                    <td><input type='radio' name='electrico' id="elec_menos60"    value='gas' >                       <label for="elec_menos60"><span></span> <?php echo $view['translator']->trans('Menos de 60€', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>

                <!-- Ubicacion del negocio -->
                <fieldset> <!-- 9 -->
                    <h1><?php echo $view['translator']->trans('¿Dónde está ubicado tu negocio?', array(), "index")?></h1>
                    <table class="fsXL4"><tr>
                    <td><input type='radio' name='neg_ubicacion' id="edificio" value='edificio' checked = "checked"> <label for="edificio"><span></span> <?php echo $view['translator']->trans('Edificio Aislado', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_ubicacion' id="nave"     value='nave' >                        <label for="nave"><span></span> <?php echo $view['translator']->trans('Nave Industrial', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_ubicacion' id="local"    value='local'>                        <label for="local"><span></span> <?php echo $view['translator']->trans('Local Comercial (planta baja)', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_ubicacion' id="otra_ub"  value='otra_ub'>                      <label for="otra_ub"><span></span> <?php echo $view['translator']->trans('Otra ubicación', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>

                <fieldset> <!-- 10 -->
                    <h1><?php echo $view['translator']->trans('Introduce tu código postal', array(), "index")?></h1>
                    <h2><?php echo $view['translator']->trans('Necesitamos al menos tu C.P. para saber a dónde desplazarnos', array(), "index")?></h2>
                    <div class="cuadrodatos">
                        <table><tr>
                            <td></td><td><input type='text' name='neg_datacp' id="neg_datacp"     placeholder='Código Postal' ></td><td></td>
                        </tr></table>
                    </div>
                </fieldset>

                <!-- sistema de calefaccion en tu negocio -->
                <fieldset> <!-- 11 -->
                    <h1><?php echo $view['translator']->trans('¿Qué sistema de calentamiento de agua tienes actualmente?', array(), "index")?></h1>
                    <table class="fsXL3"><tr>
                    <td><input type='radio' name='neg_calefaccion' id="neg_butano"    value='neg_butano' checked = "checked"> <label for="neg_butano"><span></span> <?php echo $view['translator']->trans('Butano', array(), "index")?> </label></td>
                    <td><input type='radio' name='neg_calefaccion' id="neg_propano"   value='neg_propano' >                   <label for="neg_propano"><span></span> <?php echo $view['translator']->trans('Propano', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_calefaccion' id="neg_gas"       value='neg_gas' >                       <label for="neg_gas"><span></span> <?php echo $view['translator']->trans('Gas Natural', array(), "index")?> </label></td> 
                    <td><input type='radio' name='neg_calefaccion' id="neg_electrico" value='neg_electrico' >                 <label for="neg_electrico"><span></span> <?php echo $view['translator']->trans('Termo Eléctrico', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_calefaccion' id="neg_gasoil"    value='neg_gasoil' >                    <label for="neg_gasoil"><span></span> <?php echo $view['translator']->trans('Gasóil', array(), "index")?> </label></td>
                    <td><input type='radio' name='neg_calefaccion' id="neg_placas"    value='neg_placas' >                    <label for="neg_placas"><span></span> <?php echo $view['translator']->trans('Placas Solares', array(), "index")?></label></td>
                    </tr></table>
                </fieldset>

                <!-- Si gas en negocio -->
                <fieldset> <!-- 12 -->
                    <h1><?php echo $view['translator']->trans('¿Cuál es tu gasto mensual medio en gas/gasoil?', array(), "index")?></h1>
                    <table  class="fsXL3"><tr>
                    <td><input type='radio' name='neg_gas' id="gas_menosigual300" value='gas_menosigual300' checked = "checked"> <label for="gas_menosigual300"><span></span> <?php echo $view['translator']->trans('300€ ó menos', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_gas' id="gas_entre300y700" value='gas_entre300y700'> <label for="gas_entre300y700"><span></span> <?php echo $view['translator']->trans('Entre 300€ y 700€', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_gas' id="gas_masigual700"    value='gas_masigual700' >                       <label for="gas_masigual700"><span></span> <?php echo $view['translator']->trans('Más de 700€', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>

                <!-- Si electrico -->
                <fieldset> <!-- 13 -->
                    <h1><?php echo $view['translator']->trans('¿Cuál es tu gasto mensual medio en electricidad?', array(), "index")?></h1>
                    <table  class="fsXL3"><tr>
                    <td><input type='radio' name='neg_elect' id="elect_menosigual300" value='elect_menosigual300' checked = "checked"> <label for="elect_menosigual300"><span></span> <?php echo $view['translator']->trans('300€ ó menos', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_elect' id="elect_entre300y700" value='elect_entre300y700'> <label for="elect_entre300y700"><span></span> <?php echo $view['translator']->trans('Entre 300€ y 700€', array(), "index")?> </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_elect' id="elect_masigual700"    value='elect_masigual700' >                       <label for="elect_masigual700"><span></span> <?php echo $view['translator']->trans('Más de 700€', array(), "index")?> </label></td>
                    </tr></table>
                </fieldset>

                <!-- Recogida de últimos datos -->
                <fieldset> <!-- 14 -->
                    <h1>Introduce tu teléfono para acceder al cálculo</h1>
                    <div class="cuadrodatos">
                        <table><tr>
                            <td></td><td><input type='text' name='datatelef' id="datatelef"  placeholder='Teléfono' required></td><td></td>
                        </tr></table>
                    </div>
                    <button type="submit" id="btnResCalculoPrecio" name="formularioCalculo"><?php echo $view['translator']->trans('CALCULAR', array(), "index")?></button>
                </fieldset>

                <!-- Respuestas aleatorias -->
                <fieldset> <!-- N-2 -->
                    <legend><?php echo $view['translator']->trans('Respuesta calculada', array(), "index")?></legend>
                    <h1><?php echo $view['translator']->trans('Nuestras estimaciones energéticas indican que tu familia puede alcanzar un nivel de ahorro', array(), "index")?></h1>
                </fieldset>

                <!-- Configuracion no valida para placas -->
                <fieldset> <!-- N-1 -->
                    <legend><?php echo $view['translator']->trans('Incompatibilidad encontrada', array(), "index")?></legend>
                    <h1><?php echo $view['translator']->trans('Lo sentimos, tu configuración no es compatible con la instalación de placas solares', array(), "index")?></h1>
                </fieldset>

            </form>

        </div> <!-- Fin row calculo precio XS -->

        <!-- Inicio ipromo 150 para lg y md-->
        <!-- <div class="col-lg-2 col-md-3 hidden-sm hidden-xs cont_promo_150">
            <div class="promo_150">
                <a href="<?php echo $view['router']->generate("premios");?>">
                <h1>PRESUPUESTO ONLINE<br/><strong>EMPIEZA AHORA</strong></h1>
                <h3 class="rojo">200€</h3>
                <h2 class="rojo">descuento *</h2>
                <p>Si instalas tu equipo solar modelo Doble Plus antes del <strong class="rojo">31 de Diciembre</strong></p>
                <h4><strong class="rojo">Ventajas </strong> del Cálculo Online</h4>
                <div class="ventajas">
                    <span class="glyphicon glyphicon-ok"></span><p>Rápido y Fácil</p>
                    <span class="glyphicon glyphicon-ok"></span><p>Sin compromiso</p>
                    <span class="glyphicon glyphicon-ok"></span><p>... y ahora con 200€ de <strong class="rojo">AHORRO!</strong></p>
                </div>
                <h6 class="rojo">*Consulta las bases de la promoción.</h6>
                </a>
            </div>
        </div> -->
        <!-- Fin ipromo 150 para lg y md-->
    </div>
    
    <script>
        function validarDatos(){
            if((!parseInt($("#datatelef").val(), 10) || 0) || $("#datatelef").val().length != 9){
                $(".banner-rojo p").html('<p>Introduce un teléfono válido</p>'); 
                $(".banner-rojo").show();
                return false;
            }
            
            //nos aseguramos que cerramos el banner
            $(".banner-rojo").hide();
            return true;
        }
    </script>

    <div class="modal fade modalNuevo" id="modalCalculoPrecioNuevo" tabindex="-1" role="dialog" aria-labelledby="modalCalculoPrecioLabel" aria-hidden="true" 
         data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">
                <div class="row contenedor_modales">
                    
                    <div class="hidden-xs col-sm-5 sinpadding">
                        <img class="telefono" src="/img/telefono.png" alt="teléfono iEDES Solenergy" title="teléfono iEDES Sonelergy">
                        <h4><?php echo $view['translator']->trans('Un técnico se pondrá en contacto contigo en menos de 24 horas para terminar tu presupuesto personalizado', array(), "index")?></h4>
                    </div>

                    <div class="col-xs-12 col-sm-7 sinpadding">
                        <h3 class="rojo"><?php echo $view['translator']->trans('Debido a las características de tu vivienda no ha sido posible calcular automáticamente el precio de tu instalación de placas solares', array(), "index")?></h3>
                        <h3 class="visible-xs rojo"><?php echo $view['translator']->trans('Un técnico se pondrá en contacto contigo en menos de 24 horas para terminar tu presupuesto personalizado', array(), "index")?></h3>
                        <img class="reloj" src="/img/reloj.jpg" alt="reloj" title="reloj">
                        <h4><?php echo $view['translator']->trans('Horario de atención al cliente', array(), "index")?></h4>
                        <h4><?php echo $view['translator']->trans('De 9.00 h a 19.00 h', array(), "index")?></h4>
                        <h3><a href="tel:+900800052">900 800 052</a></h3>
                        <p><?php echo $view['translator']->trans('Gracias por confiar en', array(), "index")?></p>
                        <img class="logo_lellamamosXS" src="/img/logo.png" alt="logo iEDES Solenergy" title="logo iEDES Solenergy">
                    </div>

                    <div class="col-xs-12 sinpadding">
                        <button type="button" class="send btn-redondeado" data-dismiss="modal"><?php echo $view['translator']->trans('Aceptar', array(), "index")?></button>                    
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
<!-- Fin calcula el precio -->

<div class="container">
    <div class="separador-gris"></div>
    
    <div class="row">
        <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
        <div class="videoWrapper">
            <iframe src="https://www.youtube.com/embed/RfbH8HsjyOg?rel=0&autoplay=0;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
        </div>
    </div>
</div>

<!-- FRAGMENTOS DE CADA SECCIÓN -->

<div class="container espacio">
    
    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('ENERGÍA SOLAR TÉRMICA', array(), "index")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-6 top_imagen_10"> 
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                        <img src="/img/foto-vivienda-port.png" alt="disfrute de la energía solar en familia">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('Las energías renovables constituyen uno de los factores más importantes', array(), "index")?></p>
            <p><?php echo $view['translator']->trans('Los sistemas de energía solar térmica mediante circulación forzada de iEDES', array(), "index")?></p>
        </div>
        <div class="col-sm-6 hidden-xs hidden-sm">
            <div class="cycle-slideshow "
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img src="/img/foto-vivienda-port.png" alt="disfrute de la energía solar en familia">
            </div>
        </div>
    </div>
    
    <div class="separador-gris"></div>

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('ENERGÍA SOLAR FOTOVOLTAICA', array(), "index")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-5 hidden-xs">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/energia-solar/vivienda-esquema-fotovoltaico_mitad.png" alt="esquema de placas solares fotovoltaicas de iedes solenergy">
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-7">
            <p><?php echo $view['translator']->trans('El uso de la energía solar para la producción eléctrica ha demostrado', array(), "index")?></p>
            <p><?php echo $view['translator']->trans('Las instalaciones fotovoltaicas de iEDES Solenergy se adaptan', array(), "index")?></p>
            <div class="col-xs-12 visible-xs">
                <div class="cycle-slideshow top_imagen_10" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/energia-solar/vivienda-esquema-fotovoltaico_mitad.png" alt="esquema de placas solares fotovoltaicas de iedes solenergy">
                </div>
            </div>            
        </div>
    </div>
    
    <div class="separador-gris"></div>

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('AEROTERMIAS', array(), "index")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2><?php echo $view['translator']->trans('Evolución natural de las PLACAS SOLARES', array(), "index")?></h2>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow top_imagen_10" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/aerotermia_1.jpg" alt="aerotermia">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('Sistema que permite extraer la energía térmica existente en el aire', array(), "index")?></p>
            <p><?php echo $view['translator']->trans('Presente desde hace mucho tiempo en el mercado en forma de bombas de calor aire-agua', array(), "index")?></p>
            <p><?php echo $view['translator']->trans('Históricamente, se ha optado por la energía solar térmica como energía renovable', array(), "index")?></p>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/aerotermia_1.jpg" alt="aerotermia">
            </div>
        </div>
    </div>
        
    <div class="separador-gris"></div>
        
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('SISTEMA DE ÓSMOSIS', array(), "index")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <p><?php echo $view['translator']->trans('Estos sistemas no solo han mejorado ergonómicamente para facilitar', array(), "index")?></p>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow top_imagen_10" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/tratamientos-agua/osmosis3gen.png" alt="sistema de ósmosis de tercera generación de iedes solenergy">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('El primer filtro de sedimentos lleva un doble mallado aumentando la retención', array(), "index")?></p>
            <p><?php echo $view['translator']->trans('También los filtros de carbón activo que reaccionan con los elementos tóxicos', array(), "index")?></p>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/tratamientos-agua/osmosis3gen.png" alt="sistema de ósmosis de tercera generación de iedes solenergy">
            </div>
        </div>
    </div>
    
    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('DESCALCIFICADOR GENERACIÓN IEDES', array(), "index")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <p><?php echo $view['translator']->trans('Los DESCALCIFICADORES son aparatos que eliminan la cal del agua', array(), "index")?></p>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/tratamientos-agua/descalcificador_2.png" alt="sistema descalcificador de iedes solenergy">
                </div>
            </div>
            <ul>
                <li><?php echo $view['translator']->trans('Protegen las tuberías, sanitarios y electrodomésticos', array(), "index")?></li>
                <li><?php echo $view['translator']->trans('Ayudan a eliminar ese "sarro" ya existente en las tuberías', array(), "index")?></li>
                <li><?php echo $view['translator']->trans('Cuidan nuestra piel ya que el agua no contiene minerales en exceso', array(), "index")?></li> 
                <li><?php echo $view['translator']->trans('Menos problemas de piel (picores, alergias, rojeces, etc.)', array(), "index")?></li>
                <li><?php echo $view['translator']->trans('Limpieza más fácil de baños y electrodomésticos', array(), "index")?></li>
                <li><?php echo $view['translator']->trans('Mayor vida útil de las cañerías y aparatos', array(), "index")?></li>
                <li><?php echo $view['translator']->trans('Mayor paso de agua', array(), "index")?></li>
                <li><?php echo $view['translator']->trans('Ahorro en productos de limpieza (se necesitan menos)', array(), "index")?></li>
                <li><?php echo $view['translator']->trans('Menor contaminación ambiental', array(), "index")?></li>
            </ul>
        </div>
        <div class="col-md-4 hidden-xs hidden-sm">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/tratamientos-agua/descalcificador_2.png" alt="sistema descalcificador de iedes solenergy">
            </div>
        </div>
    </div>
    
    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('CLORADORES SALINOS', array(), "index")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow top_imagen_10" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/cloradorsalino_1.jpg" alt="cilindro y centralita">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('Una de las mayores preocupaciones en la historia de la hmanidad', array(), "index")?></p>        
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/cloradorsalino_1.jpg" alt="cilindro y centralita">
            </div>
        </div>
    </div>

    <div class="separador-gris"></div>

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('ESTUFAS DE PELLETS', array(), "index")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 hidden-xs hidden-sm">
            <div class="cycle-slideshow" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/biomasa/estufa-pellets2.jpg" alt="estufa de pellets de iedes solenergy">
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <p><?php echo $view['translator']->trans('La estufa de PELLETS de iEDES', array(), "index")?></p>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow " 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/biomasa/estufa-pellets2.jpg" alt="estufa de pellets de iedes solenergy">
                </div>
            </div>
            <ul>
                <li><?php echo $view['translator']->trans('El sistema de pellets es considerablemente más económico', array(), "index")?></li>
                <li><?php echo $view['translator']->trans('Con pellets podrá tener todo el día', array(), "index")?></li>
            </ul>
        </div>
    </div>
    
    <div class="separador-gris"></div>
    
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('AIRES ACONDICIONADOS', array(), "index")?></h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <h2><?php echo $view['translator']->trans('Los modelos superinverter, consumen mucha menos energía', array(), "index")?></h2>
                <div class="col-xs-12 visible-xs visible-sm">
                    <div class="cycle-slideshow top_imagen_10" 
                        data-cycle-center-vert=true
                        data-cycle-center-horz=true
                        >
                        <img src="/img/fotos-componentes/aa_superinverter_1.png" alt="cilindro y centralita">
                    </div>
                </div>
            <p><?php echo $view['translator']->trans('El mando a distancia incorpora una sonda de medición', array(), "index")?></p>
            <p><?php echo $view['translator']->trans('La unidad dispone de oscilación automática de los deflectores verticalmente', array(), "index")?></p>
            <p><?php echo $view['translator']->trans('El sistema realiza un chequeo completo para verificar que todo funciona correctamente', array(), "index")?></p>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/aa_superinverter_1.png" alt="cilindro y centralita">
            </div>
        </div>
    </div>
</div>    
    

<!-- Inicio servicios -->
<div class="container">
    
    <div class="row fila_img_servicios">
        <div class="col-xs-12">
            <img src="/img/logoServicios.png" alt="logo servicios de iEdes Solenergy" title="logo servicios de iEdes Solenergy">
        </div>
    </div>

    <div class="row fila_servicios">
        <div class="col-xs-12 col-sm-6">
            <img class="icono_servicio" src="/img/iconos-servicios/ico-asesoramiento.png" alt="asesoramiento iEDES" title="asesoramiento iEDES">
            <div class="bloque_texto">
                <h1><?php echo $view['translator']->trans('ASESORAMIENTO', array(), "index")?></h1>
                <p><?php echo $view['translator']->trans('Asesoramiento técnico gratuito de mano de los mejores profesionales', array(), "index")?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <img class="icono_servicio" src="/img/iconos-servicios/ico-instalacion.png" alt="instalación iEDES" title="instalación iEDES">
            <div class="bloque_texto">
                <h1><?php echo $view['translator']->trans('INSTALACIÓN', array(), "index")?></h1>
                <p><?php echo $view['translator']->trans('Instalamos en el menor tiempo y sin obras', array(), "index")?></p>
            </div>
        </div>
    </div>
    <div class="row fila_servicios">
        <div class="col-xs-12 col-sm-6">
            <img class="icono_servicio" src="/img/iconos-servicios/ico-financiacion.png" alt="financiación iEDES" title="financiación iEDES">
            <div class="bloque_texto">
              <h1><?php echo $view['translator']->trans('FINANCIACIÓN', array(), "index")?></h1>
              <p><?php echo $view['translator']->trans('Buscamos las mejores fórmulas de financiación a tu medida', array(), "index")?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <img class="icono_servicio" src="/img/iconos-servicios/ico-asistencia.png" alt="asistencia iEDES" title="asistencia iEDES">
            <div class="bloque_texto">
                <h1><?php echo $view['translator']->trans('ASISTENCIA', array(), "index")?></h1>
                <p><?php echo $view['translator']->trans('Como cliente de iEDES dispondrás de un servicio técnico de asistencia', array(), "index")?></p>
            </div>
        </div>
    </div>

    <div class="row fila_servicios">
        <div class="col-xs-12 col-sm-6">
            <img class="icono_servicio" src="/img/iconos-servicios/ico-subvencion.png" alt="subvención iEDES" title="subvención iEDES">
            <div class="bloque_texto">
                <h1><?php echo $view['translator']->trans('SUBVENCIÓN', array(), "index")?></h1>
                <p><?php echo $view['translator']->trans('Te tramitamos las subvenciones y posibles', array(), "index")?></p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6">
            <img class="icono_servicio" src="/img/iconos-servicios/ico-fidelidad.png" alt="fidelidad iEDES" title="fidelidad iEDES">
            <div class="bloque_texto">
                <h1><?php echo $view['translator']->trans('FIDELIDAD', array(), "index")?></h1>
                <p><?php echo $view['translator']->trans('Porque queremos la mayor satisfacción de nuestros clientes', array(), "index")?></p>
            </div>
        </div>

    </div>
</div>
<!-- Fin servicios-->

<!-- inicio iconos pie pagina -->
<div class="container espacio">
    <div class="row fila_iconos_pie">
        <div class="col-xs-12 col-sm-6 col-md-3 super_bloque_iconos_pie">
            <div class="bloque_iconos_pie">
                <a href="#" data-toggle="modal" data-target="#modalPromotor"><img class="ico_servicio" src="/img/iconos-pie/icon1pie.png" alt="icono promotor" title="icono promotor"></a>
                <h1><?php echo $view['translator']->trans('¿Eres constructor o promotor?', array(), "index")?></h1>
                <a href="#" data-toggle="modal" data-target="#modalPromotor"><?php echo $view['translator']->trans('Formulario de contacto', array(), "index")?></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 super_bloque_iconos_pie">
            <div class="bloque_iconos_pie">
                <a href="#" data-toggle="modal" data-target="#modalNegocio"><img class="ico_servicio" src="/img/iconos-pie/icon2pie.png" alt="icono negocios" title="icono negocios"></a>
                <h1><?php echo $view['translator']->trans('¿Buscas negocio?', array(), "index")?></h1>
                <a href="#" data-toggle="modal" data-target="#modalNegocio"><?php echo $view['translator']->trans('Formulario de contacto', array(), "index")?></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 super_bloque_iconos_pie">
            <div class="bloque_iconos_pie">
                <a href="<?php echo $view['router']->generate("delegaciones");?>"><img class="ico_servicio" src="/img/iconos-pie/icon3pie.png" alt="icono delegaciones de iEDES en España" title="icono delegaciones de iEDES en España"></a>
                <h1><?php echo $view['translator']->trans('Delegaciones', array(), "index")?></h1>
                <a href="<?php echo $view['router']->generate("delegaciones");?>"><?php echo $view['translator']->trans('Búscanos en tu ciudad', array(), "index")?></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 super_bloque_iconos_pie">
            <div class="bloque_iconos_pie">
                <a href="#" data-toggle="modal" data-target="#modalRenovaciones"><img class="ico_servicio" src="/img/iconos-pie/icon4pie.png" alt="icono renovacion" title="icono renovacion"></a>
                <h1><?php echo $view['translator']->trans('¿Tienes placas solares?', array(), "index")?></h1>
                <a href="#" data-toggle="modal" data-target="#modalRenovaciones"><?php echo $view['translator']->trans('Oferta de renovación', array(), "index")?></a>
            </div>
        </div>
        <div class="clearfix visible-xs-block"></div>
        <div class="col-xs-12 col-sm-6 col-md-3 super_bloque_iconos_pie">
            <div class="bloque_iconos_pie">
                <a href="#anchor-tabla-comparativa"><img class="ico_servicio" src="/img/iconos-pie/icon5pie.png" alt="icono ventajas de ser de iEDES" title="icono ventajas de ser de iEDES"></a>
                <h1><?php echo $view['translator']->trans('Ventajas cliente iEDES', array(), "index")?></h1>
                <a href="#anchor-tabla-comparativa"><?php echo $view['translator']->trans('Características', array(), "index")?></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 super_bloque_iconos_pie">
            <div class="bloque_iconos_pie">
                <a href="#" data-toggle="modal" data-target="#modalTrabaja"><img class="ico_servicio" src="/img/iconos-pie/icon6pie.png" alt="icono trabaja con iEDES" title="icono trabaja con iEDES"></a>
                <h1><?php echo $view['translator']->trans('Trabaja con nosotros', array(), "index")?></h1>
                <a href="#" data-toggle="modal" data-target="#modalTrabaja"><?php echo $view['translator']->trans('Únete al equipo iEDE', array(), "index")?></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 super_bloque_iconos_pie">
            <div class="bloque_iconos_pie">
                <a href="<?php echo $view['router']->generate("premios");?>"><img class="ico_servicio" src="/img/iconos-pie/icon7pie.png" alt="icono consigue regalos con iEDES Solenergy" title="icono consigue regalos con iEDES Solenergy"></a>
                <h1><?php echo $view['translator']->trans('Consigue REGALOS', array(), "index")?></h1>
                <a href="<?php echo $view['router']->generate("premios");?>"><?php echo $view['translator']->trans('¿Cómo conseguirlos?', array(), "index")?></a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 super_bloque_iconos_pie">
            <div class="bloque_iconos_pie">
                <a href="<?php echo $view['router']->generate("grupo_iedes");?>"><img class="ico_servicio" src="/img/iconos-pie/icon8pie.png" alt="icono grupo iedes" title="icono grupo iedes"></a>
                <h1><?php echo $view['translator']->trans('Grupo iEDES', array(), "index")?></h1>
                <a href="<?php echo $view['router']->generate("grupo_iedes");?>"><?php echo $view['translator']->trans('Todo sobre nuestro grupo', array(), "index")?></a>
            </div>
        </div>
    </div>
</div>
<!-- Fin iconos pie pagina -->

<!-- Scripts y funciones -->

<?php //tratamiento previo para formulario calcula online ?>

<!-- Función de scroll que me va a permitir ajustar el estilo del formulario de calculo de pago -->
<script>
    $(document).ready(function(){

        //si al inicio la pantalla es chica, hay que pasar al modo XS directamente
        if(window.innerWidth >= 768){
            $('#formCalculoPrecioEmbedded').addClass('formCalculoPrecioLG');
            $('#formCalculoPrecioEmbedded').removeClass('formCalculoPrecioXS');
        }
        else{ 
            $('#formCalculoPrecioEmbedded').addClass('formCalculoPrecioXS');
            $('#formCalculoPrecioEmbedded').removeClass('formCalculoPrecioLG');
        }

        window.addEventListener('resize', function(event){
            if(window.innerWidth >= 768){
                $('#formCalculoPrecioEmbedded').addClass('formCalculoPrecioLG');
                $('#formCalculoPrecioEmbedded').removeClass('formCalculoPrecioXS');
            }
            else{ 
                $('#formCalculoPrecioEmbedded').addClass('formCalculoPrecioXS');
                $('#formCalculoPrecioEmbedded').removeClass('formCalculoPrecioLG');
            }
        });
    });
</script>   

<script>
    function validarDatosPromotor(){
        if($('#promotorlocality').val() == ''){
            $(".banner-rojo p").html('<p>Introduce una población válida</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        if((!parseInt($("#promotorTelefono").val(), 10) || 0) || $("#promotorTelefono").val().length != 9){
            $(".banner-rojo p").html('<p>Introduce un teléfono válido</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        return true;
    }
</script>

<script>
    function validarDatosNegocio(){
        if($('#negociolocality').val() == ''){
            $(".banner-rojo p").html('<p>Introduce una población válida</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        if((!parseInt($("#negocioTelefono").val(), 10) || 0) || $("#negocioTelefono").val().length != 9){
            $(".banner-rojo p").html('<p>Introduce un teléfono válido</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        return true;
    }
</script>

<script>
    function validarDatosRenovacion(){
        if($('#renovacionlocality').val() == ''){
            $(".banner-rojo p").html('<p>Introduce una población válida</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        if((!parseInt($("#renovacionTelefono").val(), 10) || 0) || $("#renovacionTelefono").val().length != 9){
            $(".banner-rojo p").html('<p>Introduce un teléfono válido</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        return true;
    }
</script>

<script>
    function validarDatosTrabaja(){ 

        if($('#trabajalocality').val() == ''){
            $(".banner-rojo p").html('<p>Introduce una población válida</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        
        if((!parseInt($("#trabajaTelefono").val(), 10) || 0) || $("#trabajaTelefono").val().length != 9){
            $(".banner-rojo p").html('<p>Introduce un teléfono válido</p>'); 
            $(".banner-rojo").show();
            return false;
        }

        if($('#trabajaCV').val() == ''){
            $(".banner-rojo p").html('<p>Introduce un currículo vitae</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        else{    
            var file = document.getElementById("trabajaCV");
            var fsize = file.files[0].size;
            var fname = file.value;
            var fext = fname.split('.')[fname.split('.').length - 1].toLowerCase();
            if(fsize > 1024000 || !(fext === "pdf" || fext === "doc" || fext === "docx"))
            {
                $(".banner-rojo p").html('<p>Solo se aceptan currículos en formato "pdf", "doc" o "docx" y con peso menor a 1MB</p>');
                $(".banner-rojo").show();
                return false;
            }
        }
            
        return true;
    }
</script>

<?php if($errors) { ?>
    <script>
        $(".banner-rojo p").html('<?php echo $errors; ?>'); 
        $(".banner-rojo").show();
    </script>
<?php } ?>    
    
<?php
    if(isset($formularioLellamamosEnviado) && $formularioLellamamosEnviado){ ?>
        <script>
            $('#modalLellamamosNuevo').modal('show');
        </script>
    <?php }
?>
        
<?php
    if(isset($formularioCalculoPrecioEnviado) && $formularioCalculoPrecioEnviado){ ?>
        <script>
            $('#modalCalculoPrecioNuevo').modal('show');
        </script>
    <?php }
?>    

<?php //Carga de la API de google para la obtención de la dirección del usuario?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<?php //API de google. Con un par de modificaciones para el guardado de los datos
       //en campos propios del formulario?>
    <script type="text/javascript">

    function initialize(prefix) { 

        var placeSearch, autocomplete;
        var componentForm = {
            route: 'long_name',
            street_number: 'short_name',
            postal_code: 'short_name',
            locality: 'long_name',
            administrative_area_level_3: 'long_name',
            administrative_area_level_2: 'long_name',
            administrative_area_level_1: 'long_name',
            country: 'long_name'

        };


             
        // Create the autocomplete object, restricting the search
        // to geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
          /** @type {HTMLInputElement} */(document.getElementById(prefix+'autocomplete')),
          { types: ['geocode'] });
        // When the user selects an address from the dropdown,
        // populate the address fields in the form.
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
        fillInAddress(placeSearch, autocomplete, componentForm, prefix);
        });
    }

    // [START region_fillform]
    function fillInAddress(placeSearch, autocomplete, componentForm, prefix) { 
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace(); 
        
      //tenemos que borrar el contenido de los inputs
      document.getElementById(prefix+"route").value = null;
      document.getElementById(prefix+"street_number").value = null;
      document.getElementById(prefix+"postal_code").value = null;
      document.getElementById(prefix+"locality").value = null;
      document.getElementById(prefix+"administrative_area_level_3").value = null;
      document.getElementById(prefix+"administrative_area_level_2").value = null;
      document.getElementById(prefix+"administrative_area_level_1").value = null;
      document.getElementById(prefix+"country").value = null;



      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) { 
        var addressType = place.address_components[i].types[0];                 
        if (componentForm[addressType]) {                                       
          var data = place.address_components[i][componentForm[addressType]];    
          //almacenamos en el input de nuestro formulario, según su tipo
          if(addressType == "route"){ 
              $('#'+prefix+"route").val(data);
          }
          else if(addressType == "street_number"){
              $('#'+prefix+"street_number").val(data);
          }
          else if(addressType == "postal_code"){
              $('#'+prefix+"postalCode").val(data);
          }
          else if(addressType === "locality"){ 
              $('#'+prefix+'locality').val(data);
          }
          else if(addressType == "administrative_area_level_3"){
              $('#'+prefix+"administrative_area_level_3").val(data);
          }
          else if(addressType == "administrative_area_level_2"){
              $('#'+prefix+"administrative_area_level_2").val(data);
          }
          else if(addressType == "administrative_area_level_1"){
              $('#'+prefix+"administrative_area_level_1").val(data);
          }
          else if(addressType == "country"){
              $('#'+prefix+"country").val(data);
          }
        }
      }
    }
    // [END region_fillform]

    // [START region_geolocation]
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var geolocation = new google.maps.LatLng(
              position.coords.latitude, position.coords.longitude);
          autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
              geolocation));
        });
      }
    }
    // [END region_geolocation]

    //script 
    $(document).ready(function () { 
        initialize('renovacion');
        initialize('promotor');
        initialize('negocio');  
        initialize('trabaja');
    });          

    </script>


<script>

    // si variable no existe se crea (al clicar en Aceptar)
    sessionStorage.controlModalInicio = (sessionStorage.controlModalInicio || 0);

    //ventana emergente para promociones
    if(sessionStorage.controlModalInicio == 0){
        //$('#modalRenovacionOferta200').modal('show');
    }

    sessionStorage.controlModalInicio++; // incrementamos cuenta de la cookie
    
</script>

