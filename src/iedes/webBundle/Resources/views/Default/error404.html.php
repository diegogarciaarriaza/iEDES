<?php $view->extend('::base.html.php');?>

<div class="container error404 espacio ">
	<div class="row">
		<div class="col-xs-12">
			<h1>Ups!, la página que buscas no existe.</h1>
			<h2>Quizás te interese...</h2>
		</div>
	</div>
</div>

<div class="container espacio ">
	<div class="row">
		<div class="col-xs-6 col-sm-4 col-md-2 espacio_inferior">
			<div class="cycle-slideshow img-responsive imagen_centro"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="<?php echo $view['router']->generate("energia_solar_termica");?>"><img class="img img-responsive" src="/img/404/termica.jpg" alt="Energía solar térmica con iEDES Solenergy"></a>
            </div>
        </div>
        <div class="col-xs-6 col-sm-4 col-md-2 espacio_inferior">
			<div class="cycle-slideshow img-responsive imagen_centro"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="<?php echo $view['router']->generate("energia_solar_fotovoltaica");?>"><img class="img img-responsive" src="/img/404/fotovoltaica.jpg" alt="Energía solar fotooltaica con iEDES Solenergy"></a>
            </div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-2 espacio_inferior">
			<div class="cycle-slideshow img-responsive imagen_centro"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="<?php echo $view['router']->generate("osmosis");?>"><img class="img img-responsive" src="/img/404/agua.jpg" alt="Sistemas de ósmosis iEDES Solenergy"></a>
            </div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-2 espacio_inferior">
			<div class="cycle-slideshow img-responsive imagen_centro"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <!-- <a href="<?php echo $view['router']->generate("calderas");?>"><img class="img img-responsive" src="/img/404/biomasa.jpg" alt="Calderas de biomasa iEDES Solenergy"></a> -->
            </div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-2 espacio_inferior">
			<div class="cycle-slideshow img-responsive imagen_centro"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="<?php echo $view['router']->generate("estufas");?>"><img class="img img-responsive" src="/img/404/estufas.jpg" alt="Estufas de pellets de iEDES Solenergy"></a>
            </div>
		</div>
		<div class="col-xs-6 col-sm-4 col-md-2 espacio_inferior">
			<div class="cycle-slideshow img-responsive imagen_centro"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="<?php echo $view['router']->generate("delegaciones");?>"><img class="img img-responsive" src="/img/404/delegaciones.jpg" alt="Delegaciones de iEDES Solenergy"></a>
            </div>
		</div>
	</div>
</div>

<div class="container espacio ">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="cycle-slideshow img-responsive imagen_centro espacio_inferior"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="<?php echo $view['router']->generate("calcula_online");?>"><img class="img img-responsive" src="/img/404/calculo.jpg" alt="Haga ahora nuestro cálculo online y ahorre 200 euros con iEDES Solenergy"></a>
            </div>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div class="cycle-slideshow img-responsive imagen_centro"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                    <a href="<?php echo $view['router']->generate("premios");?>"><img class="img img-responsive" src="/img/404/tarjeta50.jpg" alt="Reciba 50 euros en una tarjeta del corte ingles con iEDES Solenergy"></a>
            </div>
		</div>
	</div>
</div>




