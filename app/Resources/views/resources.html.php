
<!DOCTYPE html>
<html xml:lang="es" lang="es">   
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport" >
        <meta content="energia solar, energia solar termica, placas solares, placa solar termica, placas solares térmicas, agua caliente sanitaria" name="keywords" >
        <meta name="description" content="La nueva era de la energía solar térmica. Consigue con nostros las mejores placas solares del mercado y obtén agua caliente sanitaria gratis.">
    
        <title>IEDES</title>

        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link rel="stylesheet" type="text/css" href="/css/cookies.css">
        <link rel="stylesheet" type="text/css" href="/css/fullcalendar.css">

        <link rel="shortcut icon" href="favicon.ico"/>
        <link rel="apple-touch-icon" href="apple-touch-icon.png" />

        <script src="/js/jquery-3.1.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/formToWizard.js"></script>
        <script src="/js/jquery.cycle.all.js"></script>
        <script src="/js/jquery.cycle2.js"></script>
        <script src="/js/jquery.cycle2.center.js"></script>
        <script src="/js/bootstrap-filestyle.min.js"></script>
        <script src="/js/errores.js"></script>
        <script src="/js/moment.js"></script>
        <script src="/js/fullcalendar.js"></script>

        <script>
            ancho = window.innerWidth;
            window.addEventListener('resize', function(event){
                ancho = window.innerWidth;
            });
        </script>
        
        

        <!-- Inicio funcion calculo de respuesta automatica -->
        <script>
          function opcCalculoAhorro() {
            var opcCalculo = ["ALTO", "ELEVADO", "MUY ALTO"];
            var rand = Math.floor(Math.random() * (2 - 0 + 1)) + 0;
            document.write(opcCalculo[rand]);
          }
        </script>
        <!-- Fin funcion calculo-->
       

        
        <?php $view['slots']->output('_content') ?>

    </head>
    
</html>