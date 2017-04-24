<link rel="stylesheet" type="text/css" href="/assets/css/estilos_aq.css">
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css">


<header class="container-fluid container-landing">
    <section class="content semitransparente">
        <div class="row">
            <div class="col-xs-offset-3 col-xs-6">
                <img class="img-responsive espacio-imagen" src="/aqualider/img/logo.png" alt="logo Aqualider">
            </div>
        </div>
        <div class="row">
            <div class="h1-landing"><?php echo $view['translator']->trans('Fabricamos un', array(), "landing")?> <strong><?php echo $view['translator']->trans('futuro mejor', array(), "landing")?></strong></div>
            <div class="p-landing sub-title"><strong><?php echo $view['translator']->trans('Navega por nuestra página', array(), "landing")?></strong> <br><?php echo $view['translator']->trans('y consulta nuestros productos', array(), "landing")?></div>
            <a class="button button-big" href="<?php echo $view['router']->generate("productos", array()); ?>"><?php echo $view['translator']->trans('Entrar', array(), "landing")?></a>   
            <p class="botonera">
                <a class="button" href="<?php echo $view['router']->generate("internationalization", array('locale' => "es")); ?>">Español</a>
                <a class="button" href="<?php echo $view['router']->generate("internationalization", array('locale' => "en")); ?>">English</a>
                <!-- <a class="button" href="#">Portuguese</a> -->
            </p>
            <div class="p-landing"><?php echo $view['translator']->trans('Elige tu idioma', array(), "landing")?></div>
        </div>
    <!-- Some content to demonstrate viewport scrolling behavior -->
  </section>
</header>

