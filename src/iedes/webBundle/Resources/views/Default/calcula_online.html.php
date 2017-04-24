<?php $view->extend('::base.html.php');?>

<!-- Banners -->
<div class="container navbar-fixed-top banner-rojo">
    <button onclick="cerrarBannerRojo()">Aceptar</button>
    <p>Error</p>
</div>

<!-- Función de scroll que me va a permitir ajustar el estilo del formulario de calculo de pago -->
<script>
    $(document).ready(function(){

        //si al inicio la pantalla es chica, hay que pasar al modo XS directamente
        if(window.innerWidth >= 768){
            $('#formCalculoPrecio').addClass('formCalculoPrecioLG');
            $('#formCalculoPrecio').removeClass('formCalculoPrecioXS');
        }
        else{ 
            $('#formCalculoPrecio').addClass('formCalculoPrecioXS');
            $('#formCalculoPrecio').removeClass('formCalculoPrecioLG');
        }

        window.addEventListener('resize', function(event){
            if(window.innerWidth >= 768){
                $('#formCalculoPrecio').addClass('formCalculoPrecioLG');
                $('#formCalculoPrecio').removeClass('formCalculoPrecioXS');
            }
            else{ 
                $('#formCalculoPrecio').addClass('formCalculoPrecioXS');
                $('#formCalculoPrecio').removeClass('formCalculoPrecioLG');
            }
        });
    });
</script> 

<!-- Inicio ventana modal aviso al abrir -->
<div class="modal fade" id="modalavisoabrir" tabindex="-1" role="dialog" aria-labelledby="modalavisoabrirLabel" aria-hidden="true" 
    data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-dialog-center">
       <div class="modal-content">

           <div class="col-xs-12 sinpadding">
               <h3><span class="rojo">200€</span> de descuento</h3>
                <h5>Si instalas tu equipo solar Doble Plus antes del <strong class="rojo">31 de Diciembre</strong></h5>
                <h4><strong class="rojo">Ventajas </strong> del Presupuesto Online</h4>
                <div class="ventajasAviso">
                    <p><span class="glyphicon glyphicon-ok"></span>  Rápido y Fácil</p>
                    <p><span class="glyphicon glyphicon-ok"></span>  Sin compromiso</p>
                    <p><span class="glyphicon glyphicon-ok"></span>  ... y ahora con 200€ de <strong class="rojo">AHORRO!</strong></p>
                </div>
           </div>

           <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
       </div>
   </div>
</div>

<script>
    $('#modalavisoabrir').modal('show');
</script>

<!-- Fin ventana modal aviso al abrir-->  

<!-- Inicio ventana modal telefono enviado -->
<div class="modal fade" id="modalLellamamos" tabindex="-1" role="dialog" aria-labelledby="modalLellamamosLabel" aria-hidden="true" 
    data-keyboard="false" data-backdrop="static">
   <div class="modal-dialog modal-dialog-center">
       <div class="modal-content">

           <div class="col-xs-3 hidden-xs sinpadding">
               <img src="/img/lellamamos.png" alt="iEDES Solenergy">
           </div>
           <div class="col-xs-9 hidden-xs">
               <p>Tu solicitud ha sido procesada, en breve nos pondremos en contacto contigo.</p>
               <p>Gracias por confiar en iEDES</p>
           </div>

           <div class="col-xs-12 visible-xs sinpadding">
               <img class="logo_lellamamosXS" src="/img/lellamamos.png" alt="iEDES Solenergy">
               <p>Tu solicitud ha sido procesada, en breve nos pondremos en contacto contigo.</p>
               <p>Gracias por confiar en iEDES</p>
           </div>

           <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
       </div>
   </div>
</div>
<!-- Fin ventana modal telefono enviado-->

<!-- Calcula el precio -->
<div class="container espacio_superior espacio_inferior">
    <div class="row">
        <div class="col-xs-12">
            <a name="calculoOnline"></a>
            <h1 class="centrado">Calcula YA el precio de tu instalación</h1>
            <h2 class="centrado">Responde a estas preguntas y obtendrás el precio en menos de 1 minuto</h2>
        </div>
    </div>
    <div class="row">

        <!-- Inicio promo 150 para sm-->
        <div class="col-sm-12 hidden-xs hidden-lg hidden-md cont_promo_150SM">
            <div class="promo_150SM">
                <a href="<?php echo $view['router']->generate("premios");?>">
                    <div class="col-xs-offset-1 col-xs-5">
                        <h3 class="rojo">200€</h3>
                        <h2 class="rojo">descuento*</h2>
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
                        <!-- <img src="/img/flecha_amarilla.png" alt="flecha promocion iEdes Solenergy"> -->        
                        <h1>PRESUPUESTO ONLINE</br><strong>EMPIEZA AHORA</strong></h1>
                    </div>
                </a>
            </div>
        </div>
        <!-- Fin promo 150 para sm-->

        <!-- Inicio calculo precio XS -->
        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12">

            <form id="formCalculoPrecio" class="formCalculoPrecioLG centertable" 
                  action="<?php echo $view['router']->generate("index");?>"
                  method="POST"
                  onSubmit="return validarDatos()">
            
                <fieldset> <!-- 0 -->
                    <h1>¿Dónde quieres instalar energía solar térmica para agua caliente?</h1>
                    <table class="fsXL1"><tr>
                    <td><input type="radio" name="tipo" id="vivienda" value="vivienda" checked = "checked"> <label for="vivienda"><span></span> Vivienda </label></td>
                    <td><input type="radio" name="tipo" id="negocio"  value="negocio">                      <label for="negocio"><span></span> Negocio </label></td>
                    </tr></table>
                </fieldset>


                <fieldset> <!-- 1 -->
                    <h1>¿A qué tipo de vivienda va destinada?</h1>
                    <table class="fsXL3"><tr>
                    <td><input type="radio" name="vivienda" id="unifamiliar" value="unifamiliar" checked = "checked"> <label for="unifamiliar"><span></span> Unifamiliar </label></td>
                    <td><input type="radio" name="vivienda" id="adosado"     value="adosado">                         <label for="adosado"><span></span> Adosado </label></td>
                    </tr><tr>
                    <td><input type="radio" name="vivienda" id="pareado"     value="pareado">                         <label for="pareado"><span></span> Pareado </label></td>
                    <td><input type="radio" name="vivienda" id="chalet"      value="chalet">                          <label for="chalet"><span></span> Chalet </label></td>
                    </tr><tr>
                    <td><input type="radio" name="vivienda" id="casacampo"   value="casacampo">                       <label for="casacampo"><span></span> Casa de campo </label></td>
                    <td><input type="radio" name="vivienda" id="piso"        value="piso">                            <label for="piso"><span></span> Piso </label></td>
                    </tr></table>
                </fieldset>

                <fieldset> <!-- 2 -->
                    <h1>¿A qué tipo de negocio va destinado?</h1>
                    <table class="fsXL5"><tr>
                        <td><input type="radio" name="negocio" id="hotel"           value="hotel" checked = "checked">   <label for="hotel"><span></span> Hotel/Hostal </label></td>
                        <td><input type="radio" name="negocio" id="restaurante"     value="restaurante">                 <label for="restaurante"><span></span> Restaurante </label></td>
                        </tr><tr>
                        <td><input type="radio" name="negocio" id="geriatrico"      value="geriatrico">                  <label for="geriatrico"><span></span> Geriatrico </label></td>
                        <td><iNput type="radio" name="negocio" id="gimnasio"        value="gimnasio">                    <label for="gimnasio"><span></span> Gimnasio </label></td>
                        </tr><tr>
                        <td><input type="radio" name="negocio" id="peluqueria"      value="peluqueria">                  <label for="peluqueria"><span></span> Peluqueria </label></td>
                        <td><input type="radio" name="negocio" id="tintoreria"      value="tintoreria">                  <label for="tintoreria"><span></span> Tintoreria</label></td>
                        </tr><tr>
                        <td><input type="radio" name="negocio" id="lavadero"        value="lavadero">                    <label for="lavadero"><span></span> Lavadero coches</label></td>
                        <td><input type="radio" name="negocio" id="camping"         value="camping">                     <label for="camping"><span></span> Camping</label></td>
                        </tr><tr>
                        <td><input type="radio" name="negocio" id="industrias"      value="industrias">                  <label for="industrias"><span></span> Industria</label></td>
                        <td><input type="radio" name="negocio" id="neg_otro"        value="neg_otro">                    <label for="neg_otro"><span></span> Otro negocio</label></td>  
                        </tr><tr>
                        <td colspan="2"><input type="radio" name="negocio" id="agrarioganadero" value="agrarioganadero"> <label for="agrarioganadero"><span></span> Sector agrario / ganadero</label></td>                 
                    </tr></table>
                    
                </fieldset>

                <fieldset> <!-- 3 -->
                    <h1>¿Cuántos miembros tiene su unidad familiar?</h1>
                    <table class="fsXL1"><tr>
                    <td><input type='radio' name='miembros' id="masigual4miembros" value='masigual4miembros' checked = "checked"> <label for="masigual4miembros"><span></span> 4 ó más </label></td>
                    <td><input type='radio' name='miembros' id="menos4miembros"    value='menos4miembros' >                       <label for="menos4miembros"><span></span> Menos de 4 </label></td>
                    </tr></table>
                </fieldset>

                <fieldset> <!-- 4 -->
                    <h1>Introduce tu código postal</h1>
                    <h2>Necesitamos al menos tu C.P. para saber a dónde desplazarnos</h2>
                    <div class="cuadrodatos">
                        <table><tr>
                            <td></td><td><input type='text' name='datacp' id="datacp"     placeholder='Código Postal' ></td><td></td>
                        </tr></table>
                    </div>
                </fieldset>

                <fieldset> <!-- 5 -->
                    <h1>¿Qué sistema de calentamiento de agua tienes actualmente?</h1>
                    <table class="fsXL3"><tr>
                    <td><input type='radio' name='calefaccion' id="butano"    value='butano' checked = "checked"> <label for="butano"><span></span> Butano </label></td>
                    <td><input type='radio' name='calefaccion' id="propano"   value='propano' >                   <label for="propano"><span></span> Propano </label></td>
                    </tr><tr>
                    <td><input type='radio' name='calefaccion' id="gas"       value='gas' >                       <label for="gas"><span></span> Gas Natural </label></td>
                    <td><input type='radio' name='calefaccion' id="electrico" value='electrico' >                 <label for="electrico"><span></span> Termo Eléctrico </label></td>
                    </tr><tr>
                    <td><input type='radio' name='calefaccion' id="gasoil"    value='gasoil' >                    <label for="gasoil"><span></span> Gasóil </label></td>
                    <td><input type='radio' name='calefaccion' id="placas"    value='placas' >                    <label for="placas"><span></span> Placas Solares</label></td>
                    </tr></table>
                </fieldset>

                <!-- Si gas -->
                <fieldset> <!-- 6 -->
                    <h1>¿Cuál es tu gasto mensual medio en gas/gasoil?</h1>
                    <table class="fsXL1"><tr>
                    <td><input type='radio' name='gas' id="bomb_masigua40" value='bomb_masigua40' checked = "checked">   <label for="bomb_masigua40"><span></span> 40€ ó más </label></td>
                    <td><input type='radio' name='gas' id="bomb_menos40"    value='bomb_menos40' >                       <label for="bomb_menos40"><span></span> Menos de 40€ </label></td>
                    </tr></table>
                </fieldset>

                <!-- Si gas ... tambien gasta electricidad-->
                <fieldset> <!-- 7 -->
                    <h1>¿Cuál es tu gasto mensual medio en electricidad?</h1>
                    <table class="fsXL1"><tr>
                    <td><input type='radio' name='gas_electrico' id="elec_masigual40" value='elec_masigual40' checked = "checked"> <label for="elec_masigual40"><span></span> 40€ ó más </label></td>
                    <td><input type='radio' name='gas_electrico' id="elec_menos40"    value='elec_menos40' >                       <label for="elec_menos40"><span></span> Menos de 40€ </label></td>
                    </tr></table>
                </fieldset>

                <!-- Si electrico -->
                <fieldset> <!-- 8 -->
                    <h1>¿Cuál es tu gasto mensual medio en electricidad?</h1>
                    <table class="fsXL1"><tr>
                    <td><input type='radio' name='electrico' id="elec_masigual60" value='butano' checked = "checked"> <label for="elec_masigual60"><span></span> 60€ ó más </label>
                    <td><input type='radio' name='electrico' id="elec_menos60"    value='gas' >                       <label for="elec_menos60"><span></span> Menos de 60€ </label></td>
                    </tr></table>
                </fieldset>

                <!-- Ubicacion del negocio -->
                <fieldset> <!-- 9 -->
                    <h1>¿Dónde está ubicado tu negocio?</h1>
                    <table class="fsXL4"><tr>
                    <td><input type='radio' name='neg_ubicacion' id="edificio" value='edificio' checked = "checked"> <label for="edificio"><span></span> Edificio Aislado </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_ubicacion' id="nave"     value='nave' >                        <label for="nave"><span></span> Nave Industrial </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_ubicacion' id="local"    value='local'>                        <label for="local"><span></span> Local Comercial (planta baja) </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_ubicacion' id="otra_ub"  value='otra_ub'>                      <label for="otra_ub"><span></span> Otra ubicación </label></td>
                    </tr></table>
                </fieldset>

                <fieldset> <!-- 10 -->
                    <h1>Introduce tu código postal</h1>
                    <h2>Necesitamos al menos tu C.P. para saber a dónde desplazarnos</h2>
                    <div class="cuadrodatos">
                        <table><tr>
                            <td></td><td><input type='text' name='neg_datacp' id="neg_datacp"     placeholder='Código Postal' ></td><td></td>
                        </tr></table>
                    </div>
                </fieldset>

                <!-- sistema de calefaccion en tu negocio -->
                <fieldset> <!-- 11 -->
                    <h1>¿Qué sistema de calentamiento de agua tienes actualmente?</h1>
                    <table class="fsXL3"><tr>
                    <td><input type='radio' name='neg_calefaccion' id="neg_butano"    value='neg_butano' checked = "checked"> <label for="neg_butano"><span></span> Butano </label></td>
                    <td><input type='radio' name='neg_calefaccion' id="neg_propano"   value='neg_propano' >                   <label for="neg_propano"><span></span> Propano </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_calefaccion' id="neg_gas"       value='neg_gas' >                       <label for="neg_gas"><span></span> Gas Natural </label></td> 
                    <td><input type='radio' name='neg_calefaccion' id="neg_electrico" value='neg_electrico' >                 <label for="neg_electrico"><span></span> Termo Eléctrico </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_calefaccion' id="neg_gasoil"    value='neg_gasoil' >                    <label for="neg_gasoil"><span></span> Gasóil </label></td>
                    <td><input type='radio' name='neg_calefaccion' id="neg_placas"    value='neg_placas' >                    <label for="neg_placas"><span></span> Placas Solares</label></td>
                    </tr></table>
                </fieldset>

                <!-- Si gas en negocio -->
                <fieldset> <!-- 12 -->
                    <h1>¿Cuál es tu gasto mensual medio en gas/gasoil?</h1>
                    <table  class="fsXL3"><tr>
                    <td><input type='radio' name='neg_gas' id="gas_menosigual300" value='gas_menosigual300' checked = "checked"> <label for="gas_menosigual300"><span></span> 300€ ó menos </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_gas' id="gas_entre300y700" value='gas_entre300y700'> <label for="gas_entre300y700"><span></span> Entre 300€ y 700€ </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_gas' id="gas_masigual700"    value='gas_masigual700' >                       <label for="gas_masigual700"><span></span> Más o igual a 700€ </label></td>
                    </tr></table>
                </fieldset>

                <!-- Si electrico -->
                <fieldset> <!-- 13 -->
                    <h1>¿Cuál es tu gasto mensual medio en electricidad?</h1>
                    <table  class="fsXL3"><tr>
                    <td><input type='radio' name='neg_elect' id="elect_menosigual300" value='elect_menosigual300' checked = "checked"> <label for="elect_menosigual300"><span></span> 300€ ó menos </label></td>
                    </tr><tr>
                    <td><input type='radio' name='neg_elect' id="elect_entre300y700" value='elect_entre300y700'> <label for="elect_entre300y700"><span></span> Entre 300€ y 700€ </label></td>
                    </tr><tr><td><input type='radio' name='neg_elect' id="elect_masigual700"    value='elect_masigual700' >                       <label for="elect_masigual700"><span></span> Más o igual a 700€ </label></td>
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
                    <button type="submit" id="btnResCalculoPrecio" name="formularioCalculo">CALCULAR</button>
                </fieldset>

                <!-- Respuestas aleatorias -->
                <fieldset> <!-- N-2 -->
                    <legend>Respuesta calculada</legend>
                    <h1>Nuestras estimaciones energéticas indican que tu familia puede alcanzar un nivel de ahorro:</h1>
                </fieldset>

                <!-- Configuracion no valida para placas -->
                <fieldset> <!-- N-1 -->
                    <legend>Incompatibilidad encontrada</legend>
                    <h1>Lo sentimos, tu configuración no es compatible con la instalación de placas solares</h1>
                </fieldset>

            </form>

        </div> <!-- Fin row calculo precio XS -->

        <!-- Inicio ipromo 150 para lg y md-->
        <div class="col-lg-2 col-md-3 hidden-sm hidden-xs cont_promo_150">
            <div class="promo_150">
                <a href="<?php echo $view['router']->generate("premios");?>">
                <!-- <img src="/img/flecha_amarilla.png" alt="flecha promocion iEdes Solenergy"> -->        
                <h1>PRESUPUESTO ONLINE</br><strong>EMPIEZA AHORA</strong></h1>
                <h3 class="rojo">200€</h3>
                <h2 class="rojo">descuento *</h2>
                <p>Si instalas tu equipo solar modelo Doble Plus antes del <strong class="rojo">31 de Diciembre</strong></p>
                <h4><strong class="rojo">Ventajas </strong> del Cálculo Online</h4>
                <div class="ventajas">
                    <span class="glyphicon glyphicon-ok"></span><p>Rápido y Fácil</p>
                    <span class="glyphicon glyphicon-ok"></span><p>Sin compromiso</p>
                    <span class="glyphicon glyphicon-ok"></span><p>... y ahora con 200€ de <strong class="rojo">AHORRO!</strong></p>
                </div>
                <h6 class="rojo">*Consulta las bases de la promocion.</h6>
                </a>
            </div>
        </div>
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

    <div class="modal fade" id="modalCalculoPrecio" tabindex="-1" role="dialog" aria-labelledby="modalCalculoPrecioLabel" aria-hidden="true" 
         data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-center">
            <div class="modal-content">

                <div class="col-sm-3 hidden-xs sinpadding">
                    <img src="/img/lellamamos.png" alt="iEDES Solenergy">
                </div>
                <div class="col-sm-9 hidden-xs">
                    <p>Debido a las características de tu vivienda no ha sido posible calcular automáticamente el precio de tu instalación de placas solares.</p>
                    <p class="rojo">Un técnico se pondrá en contacto contigo en menos de 24 horas para terminar tu presupuesto personalizado. </p>
                    <p>Gracias por confiar en iEDES</p>
                </div>

                <div class="col-xs-12 visible-xs sinpadding">
                    <img class="logo_lellamamosXS" src="/img/lellamamos.png" alt="iEDES Solenergy">
                    <p>Debido a las características de tu vivienda no ha sido posible calcular automáticamente el precio de tu instalación.</p>
                    <p class="rojo">Un técnico te llamará en menos de 24 horas para terminar tu presupuesto personalizado. </p>
                    <p>Gracias por confiar en iEDES</p>
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!-- Fin calcula el precio -->

<?php //tratamiento previo para formulario calcula online ?>

<script>
    function cerrarBannerRojo(){    
        $(".banner-rojo").hide();
    }
</script>

<script> 
    function abrirBannerRojo(){
        $(".banner-rojo").show();
    }
</script>   
        
<?php
    if(isset($formularioCalculoPrecioEnviado) && $formularioCalculoPrecioEnviado){ ?>
        <script>
            $('#modalCalculoPrecio').modal('show');
        </script>
    <?php }
?>    
        
<!-- Google Code for CALCULO ONLINE Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1001227579;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "JtsQCNLcvVkQu4q23QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1001227579/?label=JtsQCNLcvVkQu4q23QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>