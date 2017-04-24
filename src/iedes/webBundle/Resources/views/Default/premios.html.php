<?php $view->extend('::base.html.php');?>

<!-- Banners -->
<div class="container navbar-fixed-top banner-rojo">
    <button onclick="cerrarBannerRojo()">Aceptar</button>
    <p>Error</p>
</div> 

<div class="container premios">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/regalos/3magnificosregalos.jpg" alt="equipo_clorador">
            </div>
        </div>
    </div>
</div>

<a name="tarjeta_50_euros"></a>
<div class="container premios">
	<div class="row">
		<div class="col-xs-12">
                    <h1><?php echo $view['translator']->trans('Recomienda', array(), "premios")?></h1>
		</div>
		<div class="col-xs-12">
			<h1><span class="negrota"><?php echo $view['translator']->trans('magníficos regalos', array(), "premios")?></h1>
		</div>
	</div>
</div>

<div class="container premios">
	<div class="row">
		<div class="col-xs-12 col-sm-4">
			<img src="/img/regalos/circulo1.png" class="regalo_circulo" alt="">
			<h4><?php echo $view['translator']->trans('Danos datos', array(), "premios")?></h4>
		</div>
		<div class="col-xs-12 col-sm-4">
			<img src="/img/regalos/circulo2.png" class="regalo_circulo" alt="">
			<h4><?php echo $view['translator']->trans('Ellos contratan', array(), "premios")?></h4>
		</div>
		<div class="col-xs-12 col-sm-4">
			<img src="/img/regalos/circulo3.png" class="regalo_circulo" alt="">
			<h4><?php echo $view['translator']->trans('Tú recibes', array(), "premios")?></h4>
		</div>
	</div>
</div>

<div class="container premios espacio_inferior">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<h2><span class="negrota"><?php echo $view['translator']->trans('Quieres', array(), "premios")?></span></h2>
			<h3><?php echo $view['translator']->trans('Rellena', array(), "premios")?><span class="negrota"><?php echo " " . $view['translator']->trans('Teléfono', array(), "premios")?></span></h3>
			<div class="separador-gris-chico"></div>
			<h3><span class="negrota"><?php echo $view['translator']->trans('Benefíciate', array(), "premios")?></span> iEDES</h3>
			<h4><?php echo $view['translator']->trans('Por cada recomendación', array(), "premios")?></h4>
			<div class="cycle-slideshow"
                            data-cycle-center-vert=true
                            data-cycle-center-horz=true
                            >
                                <img id="eurosRegalo50" src="/img/regalos/eligeturegalo.jpg" alt="elige tu regalo recomendar a un amigo de iEDES">

                        </div>	
			
		</div>
		<div class="col-xs-12 col-sm-6">
			<form id="formularioRecomendaciones" 
	          action="<?php echo $view['router']->generate("index");?>"
	          method="POST"
	          onSubmit="return validarDatosRecomendacion()">                

				<h4 class="negrota"><?php echo $view['translator']->trans('Introduce tu nombre de cliente de iEDES', array(), "premios")?></h4>
	            <input type="text" name="recomendacionDNI" id="recomendacionDNI" placeholder="<?php echo $view['translator']->trans('DNI de cliente iEDES', array(), "premios")?>" required> 
	            <input type="email" name="recomendacionEmail" id="recomendacionEmail" placeholder="<?php echo $view['translator']->trans('Email de cliente iEDES', array(), "premios")?>" required>
	            <input type="text" name="recomendacionNombreComercial" id="recomendacionNombreComercial" placeholder="<?php echo $view['translator']->trans('Nombre del comercial iEDES', array(), "premios")?>" >
	            <h4 class="negrota"><?php echo $view['translator']->trans('Intruduce los datos de tu recomendado', array(), "premios")?></h4>
	            <input type="text" name="recomendacionNombre" id="recomendacionNombre" placeholder="<?php echo $view['translator']->trans('Nombre del recomendado', array(), "premios")?>" required> 
	            <input type="text" name="recomendacionApellidos" id="recomendacionApellidos" placeholder="<?php echo $view['translator']->trans('Apellidos del recomendado', array(), "premios")?>" required>
	            <input type="text" name="recomendacionTelefono" id="recomendacionTelefono" placeholder="<?php echo $view['translator']->trans('Teléfono del recomendado', array(), "premios")?>" required>

	            <button type="submit" class="exit btn-redondeado" name="formularioRecomendacion"><?php echo $view['translator']->trans('Recomendar', array(), "premios")?></button>
                    <div class="baseslegales">
                        </br><h6><?php echo $view['translator']->trans('Pulsando el botón aceptas', array(), "premios")?></h6>
                    </div>
                </form>
	    </div>
	</div>
</div>

<div class="container">
	<div class="row baseslegales">
		<div class="col-xs">
			<h6><?php echo $view['translator']->trans('Bases Legales Promoción', array(), "premios")?><br/>
				<?php echo $view['translator']->trans('bases1', array(), "premios")?>
				<?php echo $view['translator']->trans('bases2', array(), "premios")?>
				<?php echo $view['translator']->trans('bases3', array(), "premios")?>
				<?php echo $view['translator']->trans('bases4', array(), "premios")?>
				<?php echo $view['translator']->trans('bases5', array(), "premios")?>
				<?php echo $view['translator']->trans('bases6', array(), "premios")?>
                                <?php echo $view['translator']->trans('bases7', array(), "premios")?>
                                <?php echo $view['translator']->trans('bases8', array(), "premios")?><br/>
				<?php echo $view['translator']->trans('de conformidad', array(), "premios")?></h6>
                    </br></br>
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
