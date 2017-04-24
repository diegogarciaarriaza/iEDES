<?php $view->extend('::resources.html.php'); ?>

<body>
    <!--inicio codigo de cookies -->
    <div class="container-fluid cookiesSms" id="cookiesId">
        Esta web utiliza cookies, puedes ver nuestra <a href="#" data-toggle="modal" data-target="#modalCookies">la política de cookies aquí.</a> 
        Si continuas navegando estás aceptándola
        <button onclick="controlcookies()">Aceptar</button>
    </div>
    <!-- Fin del código de cookies -->

    <!-- Inicio menu superior -->
    <div class="container">
        <div class="row ">
            <!-- Visible para lg y md -->
            <div class="col-xs-12 menu_superior">
                <nav>
                    <ul>
                        <li class="borde_derecho"><a href="http://www.iedes.com">IEDES</a></li>
                        <li class="borde_derecho"><a href="<?php echo $view['router']->generate("intranet"); ?>">INTRANET</a></li>
                        <li class="nav_oscuro"><a href="<?php echo $view['router']->generate("logout"); ?>">SALIR</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- fin menu superior -->

<!-- inicio fila logos -->
    <div class="container">
        <div class="row fila_logos">  

            <!-- Config para lg, md y sm -->   
            <div class="col-xs-12">
                <a href="http://www.iedes.com">   
                    <img id="logo_iedes" src="/img/logo.png" alt="IEDES" title="IEDES">
                    <!--<img id="logo_elgigante" src="/img/logoGiganteEnergia.png" alt="IEDES" title="IEDES">-->
                </a>
            </div>
        </div>
    </div>
    <!-- fin fila logos -->

    <!-- ///// Comienzo del content ///// -->
    <section id="seccionPrincipal">
        <?php
        $request = $this->container->get('request');
        $routeName = $request->get('_route');
        $view['router']->generate("intranet");
        $view['slots']->output('_content')
        ?>
    </section>
    <!-- ///// Fin del header ///// -->


    <!-- Codigo para inhabilitar boton derecho -->
    <script type="text/javascript">
        document.oncontextmenu = function() {
            //return false;
        }
    </script>

</body>

