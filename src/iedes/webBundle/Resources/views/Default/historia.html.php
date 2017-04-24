<?php $view->extend('::base.html.php');?>

<div class="container historia texto_grande hidden-xs hidden-sm">
	<div class="row">
            <div class="col-md-offset-6 col-md-6 hidden-xs hidden-sm">
                <div class="cycle-slideshow top_imagen_90" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img class="img-responsive" src="/img/historia/logo-iedes-historia.png" alt="iEdes Solenergy">
                </div>
            </div>
	</div>
	<div class="row">
		<div class="hidden-xs hidden-sm col-md-12 margin_sup">
			<h1 class="negro"><?php echo $view['translator']->trans('FUIMOS', array(), "conocenos")?></h1>
			<h2><?php echo $view['translator']->trans('Pioneros', array(), "conocenos")?></h2>
			<p><?php echo $view['translator']->trans('Los origenes', array(), "conocenos")?></p>
			<p><?php echo $view['translator']->trans('Uno de los primeros', array(), "conocenos")?></p>
			<h1><?php echo $view['translator']->trans('HOY SOMOS', array(), "conocenos")?></h1>
			<h2><?php echo $view['translator']->trans('El Gigante de la Energía Solar', array(), "conocenos")?></h2>
		</div>
	</div>
	<div class="row">
		<div class="hidden-xs hidden-sm col-md-12 col-lg-10 ">
			<p><?php echo $view['translator']->trans('20 delegaciones', array(), "conocenos")?></p>
		</div>
	</div>
	<div class="row">
		<div class="hidden-xs hidden-sm col-md-12">
			<h1 class="blanco"><?php echo $view['translator']->trans('SEREMOS', array(), "conocenos")?></h1>
			<h2 class="blanco"><?php echo $view['translator']->trans('La Referencia en materia de Energía Solar', array(), "conocenos")?></h2>
		</div>
	</div>
	<div class="row">
		<div class="hidden-xs hidden-sm col-md-12 col-lg-10">
			<p class="blanco"><?php echo $view['translator']->trans('Porque aspiramos', array(), "conocenos")?></p>	
		</div>
	</div>
</div>

<div class="container historiaXS texto_grandeXS">
	<div class="row">
		<div class="col-xs-12 visible-xs visible-sm">
                        <h1><?php echo $view['translator']->trans('FUIMOS', array(), "conocenos")?></h1>
			<h2><?php echo $view['translator']->trans('Pioneros', array(), "conocenos")?></h2>
			<p><?php echo $view['translator']->trans('Los origenes', array(), "conocenos")?></p>
			<p><?php echo $view['translator']->trans('Uno de los primeros', array(), "conocenos")?></p>
			<h1><?php echo $view['translator']->trans('HOY SOMOS', array(), "conocenos")?></h1>
			<h2><?php echo $view['translator']->trans('El Gigante de la Energía Solar', array(), "conocenos")?></h2>
			<p><?php echo $view['translator']->trans('20 delegaciones', array(), "conocenos")?></p>
			<h1><?php echo $view['translator']->trans('SEREMOS', array(), "conocenos")?></h1>
			<h2><?php echo $view['translator']->trans('La Referencia en materia de Energía Solar', array(), "conocenos")?></h2>
			<p><?php echo $view['translator']->trans('Porque aspiramos', array(), "conocenos")?></p>	
		</div>
	</div>
</div>
