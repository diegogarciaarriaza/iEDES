<?php $view->extend('::base.html.php');?>

<!-- Banners -->
<div class="container navbar-fixed-top banner-rojo">
    <button onclick="cerrarBannerRojo()">Aceptar</button>
    <p>Error</p>
</div> 

<div class="container espacio_superior">
	<div class="row">
		<div class="col-xs-6">
			<div class="cycle-slideshow img-responsive imagen_derecha top_imagen_30"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="#tarjeta_50_euros"><img class="img img-responsive" src="/img/regalos/tarjeta-plata.png" alt="Tarjeta plata de 50 euros de iEDES Solenergy"></a>
            </div>
		</div>
		<div class="col-xs-6">
			<div class="cycle-slideshow img-responsive imagen_izquierda top_imagen_30"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="#tarjeta_200_euros"><img class="img img-responsive" src="/img/regalos/tarjeta-oro.png" alt="Tarjeta oro de 200 euros de iEDES Solenergy"></a>
            </div>
		</div>
	</div>
</div>

<a name="tarjeta_50_euros"></a>
<div class="container premios">
	<div class="row">
		<div class="col-xs-12">
			<h1> Recomienda iEDES y </h1>
		</div>
		<div class="col-xs-12">
			<h1>gana <span class="negrota">50 euros de regalo</h1>
		</div>
	</div>
</div>

<div class="container premios">
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<img src="/img/regalos/circulo1.png" class="regalo_circulo" alt="">
			<h4>Danos los datos de tus amigos, familiares o conocidos</h4>
		</div>
		<div class="col-xs-12 col-sm-4">
			<img src="/img/regalos/circulo2.png" class="regalo_circulo" alt="">
			<h4>Ellos contratan su Equipo Solar con nosotros</h4>
		</div>
		<div class="col-xs-12 col-sm-4">
			<img src="/img/regalos/circulo3.png" class="regalo_circulo" alt="">
			<h4>Tú recibes tu regalo de 50€</h4>
		</div>
	</div>
</div>

<div class="container premios espacio_inferior">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<h2><span class="negrota">¿Quieres conseguir estos 50€?</span></h2>
			<h3>Rellena nuestro formulario de recomendación o llama directamente al <span class="negrota">900 800 052</span>.</h3>
			<div class="separador-gris-chico"></div>
			<h3><span class="negrota">Benefíciate</span> por ser cliente de iEDES</h3>
			<h4>Por cada recomendación a amigos, familiares o conocidos.</h4>
			<div class="cycle-slideshow"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img id="eurosRegalo50" src="/img/regalos/50euros.png" alt="tarjeta promocion 50€ por recomendar a un amigo de iEDES">

            </div>	
			<h2>Tarjeta Regalo 50€ de El Corte Inglés.<br />Para que compres lo que quieras.</h2>
		</div>
		<div class="col-xs-12 col-sm-6">
			<form id="formularioRecomendaciones" 
	          action="<?php echo $view['router']->generate("index");?>"
	          method="POST"
	          onSubmit="return validarDatosRecomendacion()">                

				<h4 class="negrota">Introduce tu nombre de cliente iEDES</h4>
	            <input type="text" name="recomendacionDNI" id="recomendacionDNI" placeholder="DNI de cliente iEDES" required> 
	            <input type="email" name="recomendacionEmail" id="recomendacionEmail" placeholder="Email de cliente iEDES" required>
	            <input type="text" name="recomendacionNombreComercial" id="recomendacionNombreComercial" placeholder="Nombre del comercial iEDES" >
	            <h4 class="negrota">Intruduce los datos de tu recomendado</h4>
	            <input type="text" name="recomendacionNombre" id="recomendacionNombre" placeholder="Nombre del recomendado" required> 
	            <input type="text" name="recomendacionApellidos" id="recomendacionApellidos" placeholder="Apellidos del recomendado" required>
	            <input type="text" name="recomendacionTelefono" id="recomendacionTelefono" placeholder="Teléfono del recomendado" required>

	            <button type="submit" class="exit btn-redondeado" name="formularioRecomendacion">Recomendar</button>
                    <div class="baseslegales">
                        <h6>Pulsando el botón recomendar ACEPTAS que los datos facilitados son ciertos, que disponemos de consentimiento para el uso de los mismos, y aceptas las condiciones de la presente promoción.</h6>
                    </div>
                </form>
	    </div>
	</div>
</div>

<div class="container">
	<div class="row baseslegales">
		<div class="col-xs">
			<h6>Bases Legales Promoción PROGRAMA AMIGOS Tarjeta Regalo 50 euros.<br/><br/>
				1 - Para participar en el Programa Amigos el cliente de iEDES Solenergy debe llamar al teléfono  902 17 15 37, comunicar que llama por el Programa Amigos y facilitar los datos de contacto de su/s amigo/s referenciados, antes de que éstos se hagan clientes de iEDES Solenergy.<br/>
				2 - Programa válido para nuevas contrataciones e instalaciones de equipos solares de iEDES Solenergy. No se considera nueva contratación un traslado o una conexión de un sistema preinstalado.<br/>
				3 - El cliente que referencie a un amigo, familiar o vecino obtendrá una tarjeta regalo del Corte Inglés por valor de 50 euros.<br/>
				4 – La tarjeta regalo El Corte Ingles  podrá solicitarse hasta un año después, desde la fecha de instalación del amigo.<br/>
				5 - Para poder recibir la tarjeta regalo de 50 euros, el equipo solar del cliente que refiere debe estar instalado y contratado y al corriente de los correspondientes pagos.<br/>
				6 - Una vez solicitada y entregada la tarjeta regalo de 50 euros, ésta no se podrá cambiar por otros regalos, promociones o productos.<br/>
				7 - Recuerde que con carácter previo a la facilitación de los datos de sus amigos usted debe obtener su consentimiento para ceder sus datos a iEDES Solenergy de manera que sus amigos conocen y consienten la posibilidad de que iEDES Solenergy les contacte con el fin de ofertarle sus productos y servicios.<br/>
				8- Este programa no es válido para empleados o familiares de empleados de iEDES Solenergy.</br></br>
				De conformidad con la L.O.P.D. 15/1999, le comunicamos que la información facilitada a y iEDES Solenergy como consecuencia del acceso de nuevos clientes a la promoción “Promoción PROGRAMA AMIGOS Tarjeta Regalo 50 euros” forma parte de un fichero del que es Responsable dicha empresa. Asimismo le informamos de que tiene Usted la posibilidad de ejercer los derechos de acceso, rectificación y cancelación dirigiéndose por escrito a iEDES Solenergy, con domicilio en C/ Inventor Pedro Cawley Nº17 - Puerto de Santa María (Cádiz) - 11500, o mediante e-mail en info@iedes.com. Este mensaje, su contenido y cualquier fichero transmitido con él está dirigido únicamente a su destinatario y es confidencial. Por ello, se informa a quien lo reciba por error o tenga conocimiento del mismo sin ser su destinatario, que la información contenida en él es reservada y su uso no autorizado, por lo que en tal caso le rogamos nos lo comunique por la misma vía o por teléfono (902 171 537), así como que se abstenga de reproducir el mensaje mediante cualquier medio o remitirlo o entregarlo a otra persona, procediendo a su borrado de manera inmediata. iEDES Solenergy se reserva las acciones legales que le correspondan contra todo tercero que acceda de forma ilegítima al contenido de cualquier mensaje externo emitido por la misma.</h6>
		</div>
	</div>
</div>

<a name="tarjeta_200_euros"></a>
<div class="container sinpadding">
    <div class="col-xs-12 sinpadding" id="foto_pie">
        <img src="/img/regalos/clienteanio.jpg" alt="">
    </div>
</div>

<div class="container">
	<div class="row">
		<div class="col-xs-7">
			<div class="cycle-slideshow"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <img src="/img/regalos/200euros-facil.png" alt="Promoción 200 EUROS de regalo de iEDES">
            </div>
		</div>
		<div class="col-xs-5">
			<div class="cycle-slideshow img-responsive"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="<?php echo $view['router']->generate("calcula_online");?>"><img class="img img-responsive" src="/img/regalos/btn-regalos-calculo.png" alt="Calculo Online desde Premios y Regalos de iEDES"></a>
            </div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row baseslegales">
		<div class="col-xs">
			<h6>Bases Legales Promoción AHORRA 200 Euros en el precio de tu equipo solar<br /><br />
			La presente promoción “AHORRA 200 Euros en el PRECIO de tu equipo solar” sólo será válida nuevos clientes (cliente beneficiario) que contraten su equipo solar con iEDES Solenergy entre el 1 de Enero de 2016 al 31 de Diciembre de 2016 (ambas fechas inclusive).</h6>
			<h6>Primera. --- OBJETO DE LA PROMOCIÓN, PARTICIPANTES Y DURACIÓN<br />
			Esta promoción queda sujeta al cumplimiento de las presentes bases:<br />
			Solo están sujetas a esta promoción los modelos de equipos solares instalados por iEDES Solenergy, y que entren dentro de éstos: modelos BASIC, ESTANDAR y PREMIUM.<br />
			Los nuevos clientes (cliente beneficiario) que contraten e instalen su equipo solar (modelos antes citado) con iEDES Solenergy, entre el 1 de Enero de 2016 y el 31 de Diciembre de 2016 ambas fechas inclusive), disfrutarán de 200 euros de descuento (impuestos incluidos) sobre el precio de catálogo del equipo solar a instalar en cada caso.<br />
			Los nuevos clientes que hayan contratado su equipo solar con iEDES Solenergy, y que quieran beneficiarse de esta promoción, han tenido que completar íntegramente el CÁLCULO ONLINE (PRESUPUESTO ONLINE) de la web www.iedes.com. Este requisito  es indispensable para poder acogerse a la promoción.<br />
			No estarán promocionadas:<br />
			Otros gastos u otros costes en los que el cliente pudiera incurrir (como traslados por mantenimiento del personal técnico de iEDES Solenergy o recambios de uno o varios de los elementos del equipo instalado en el domicilio correspondiente).</h6>
			<h6>Segunda. --- ÁMBITO DE APLICACIÓN Y MECÁNICA<br />
			La presente promoción que es gratuita y voluntaria, aplica exclusivamente a nuevos clientes a partir del 31 de Diciembre de 2016 que decidan contratar, en las fechas indicadas, alguno de los modelos citados, los cuales disfrutarán de los beneficios ya descritos.<br />
			Sin embargo no podrán participar en la presente promoción ya clientes que tuvieran contratado su equipo con iEDES Solenergy o aquellos clientes que hubieran causado baja en iEDES Solenergy en los 3 meses anteriores al comienzo de la misma.<br />
			Esta oferta no será acumulable, en ningún caso, a otras ofertas o promociones ofrecidas por iEDES Solenergy.<br /><br />
			De conformidad con la L.O.P.D. 15/1999, le comunicamos que la información facilitada a y iEDES Solenergy como consecuencia del acceso de nuevos clientes a la promoción “AHORRA 200 Euros en el PRECIO de tu equipo solar”  forma parte de un fichero del que es Responsable dicha empresa. Asimismo le informamos de que tiene Usted la posibilidad de ejercer los derechos de acceso, rectificación y cancelación dirigiéndose por escrito a iEDES Solenergy, con domicilio en C/ Inventor Pedro Cawley Nº17 - Puerto de Santa María (Cádiz) - 11500, o mediante e-mail en info@iedes.com. Este mensaje, su contenido y cualquier fichero transmitido con él está dirigido únicamente a su destinatario y es confidencial. Por ello, se informa a quien lo reciba por error o tenga conocimiento del mismo sin ser su destinatario, que la información contenida en él es reservada y su uso no autorizado, por lo que en tal caso le rogamos nos lo comunique por la misma vía o por teléfono (902 171 537), así como que se abstenga de reproducir el mensaje mediante cualquier medio o remitirlo o entregarlo a otra persona, procediendo a su borrado de manera inmediata. iEDES Solenergy se reserva las acciones legales que le correspondan contra todo tercero que acceda de forma ilegítima al contenido de cualquier mensaje externo emitido por la misma.</h6>
		</div>
	</div>
</div>

<script>
    function validarDatosRecomendacion(){ 
        if($("#recomendacionDNI").val().length != 9){ 
            $(".banner-rojo p").html('<p>Introduce una dni/cif válido</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        if((!parseInt($("#recomendacionTelefono").val(), 10) || 0) || $("#recomendacionTelefono").val().length != 9){
            $(".banner-rojo p").html('<p>Introduce un teléfono válido</p>'); 
            $(".banner-rojo").show();
            return false;
        }
        return true;
    }
</script>

<!-- Google Code for PREMIOS Y REGALOS Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1001227579;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "onLZCOPevVkQu4q23QM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/1001227579/?label=onLZCOPevVkQu4q23QM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
