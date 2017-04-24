<?php $view->extend('::base.html.php');?>

<!-- Equipos solar termico para el hogar -->
<div class="container espacio">
    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('Solar térmica', array(), "renovables")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-6 pull-md-6 col-lg-5 hidden-xs">
            <div class="cycle-slideshow " 
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/energia-solar/vivienda-esquema-termico.jpg" alt="esquema de placas solares térmicas de iedes solenergy">
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">
            <p><?php echo $view['translator']->trans('Las energías renovables constituyen', array(), "renovables")?></p>
            <p><?php echo $view['translator']->trans('Los sistemas de energía solar térmica', array(), "renovables")?></p>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7">    
            <div class="textoencuadro back_verde"><?php echo $view['translator']->trans('¿Cómo funciona solar térmico?', array(), "renovables")?></div>
            <div class="col-xs-12 visible-xs">
                <div class="cycle-slideshow top_imagen_10" 
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/energia-solar/vivienda-esquema-termico.jpg" alt="esquema de placas solares térmicas de iedes solenergy">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('Esta instalación solar térmica', array(), "renovables")?></p>
        </div>
        <div class="col-xs-12 col-lg-7">
            <ul>
                <li><?php echo $view['translator']->trans('Circuito primario de captación', array(), "renovables")?></li>
                <li><?php echo $view['translator']->trans('Acumulador (B)', array(), "renovables")?></li>
                <li><?php echo $view['translator']->trans('Circuito de consumo (ACS)', array(), "renovables")?></li>
            </ul>
        </div>
        <div class="col-xs-12">
            <p><?php echo $view['translator']->trans('El agua fría entra', array(), "renovables")?></p>
            <p><?php echo $view['translator']->trans('Los captadores solares', array(), "renovables")?></p>
            <p><a href="<?php echo $view['router']->generate("faq");?>"><?php echo $view['translator']->trans('Para más información', array(), "renovables")?></a> </p>
        </div>
    </div>

    <div class="separador-gris"></div>

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('PLACAS SOLARES', array(), "renovables")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <p><?php echo $view['translator']->trans('El diseño y fabricación robotizada', array(), "renovables")?></p>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow " 
                    data-cycle-fx=fadeout
                    data-cycle-timeout=2000
                    data-cycle-pause-on-hover="true"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img class="img-responsive" src="/img/fotos-componentes/placa-despiece-1.png" alt="detalle de placa solar iedes solenergy">
                    <img class="img-responsive" src="/img/fotos-componentes/placa-despiece-2.png" alt="detalle de placa solar iedes solenergy">
                    <img class="img-responsive" src="/img/fotos-componentes/placa-despiece-3.png" alt="detalle de placa solar iedes solenergy">
                    <img class="img-responsive" src="/img/fotos-componentes/placa-despiece-4.png" alt="detalle de placa solar iedes solenergy">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('Algunas características paneles', array(), "renovables")?></p> 
            <ul>
                <li><?php echo $view['translator']->trans('Más aislamiento térmico', array(), "renovables")?></li>
                <li><?php echo $view['translator']->trans('Más estanqueidad total', array(), "renovables")?></li>
                <li><?php echo $view['translator']->trans('Más tratamiento selectivo de Titanio', array(), "renovables")?></li>
                <li><?php echo $view['translator']->trans('Más superficie de captación', array(), "renovables")?></li>
                <li><?php echo $view['translator']->trans('Más tratamiento anti-reflectante', array(), "renovables")?></li>
                <li><?php echo $view['translator']->trans('Más rendimiento', array(), "renovables")?></li>
                <li><?php echo $view['translator']->trans('Más garantía', array(), "renovables")?></li>
            </ul>
            <p><?php echo $view['translator']->trans('Gracias a estas características', array(), "renovables")?></p>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow top_imagen_90" 
                data-cycle-fx=fadeout
                data-cycle-timeout=2000
                data-cycle-pause-on-hover="true"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img class="img-responsive" src="/img/fotos-componentes/placa-despiece-1.png" alt="detalle de placa solar iedes solenergy">
                <img class="img-responsive" src="/img/fotos-componentes/placa-despiece-2.png" alt="detalle de placa solar iedes solenergy">
                <img class="img-responsive" src="/img/fotos-componentes/placa-despiece-3.png" alt="detalle de placa solar iedes solenergy">
                <img class="img-responsive" src="/img/fotos-componentes/placa-despiece-4.png" alt="detalle de placa solar iedes solenergy">
            </div>
        </div>
    </div>

    <div class="separador-gris"></div>

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('ACUMULADOR', array(), "renovables")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 hidden-xs hidden-sm">
            <div class="cycle-slideshow top_imagen_10" 
                data-cycle-fx=fadeout
                data-cycle-timeout=2000
                data-cycle-pause-on-hover="true"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/deposito-blanco.png" alt="deposito acumulador iedes solenergy">
                <img src="/img/fotos-componentes/deposito-gris.png" alt="deposito acumulador iedes solenergy">
                <img src="/img/fotos-componentes/deposito-abierto.png" alt="deposito acumulador iedes solenergy">
            </div>
        </div>
        
        <div class="col-xs-12 col-md-7">
            <p><?php echo $view['translator']->trans('Nuestros acumuladores poseen', array(), "renovables")?></p>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow " 
                    data-cycle-fx=fadeout
                    data-cycle-timeout=2000
                    data-cycle-pause-on-hover="true"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/deposito-blanco.png" alt="deposito acumulador iedes solenergy">
                    <img src="/img/fotos-componentes/deposito-gris.png" alt="deposito acumulador iedes solenergy">
                    <img src="/img/fotos-componentes/deposito-abierto.png" alt="deposito acumulador iedes solenergy">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('El fuerte aislamiento', array(), "renovables")?></p>
        </div>
    </div>

    <div class="separador-gris"></div>

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('CENTRALITA DE CONTROL', array(), "renovables")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <p><?php echo $view['translator']->trans('Maneja tu equipo solar', array(), "renovables")?></p>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow " 
                    data-cycle-fx=fadeout
                    data-cycle-timeout=2000
                    data-cycle-pause-on-hover="true"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                    <img src="/img/fotos-componentes/centralita-gris.png" alt="centralita iedes solenergy">
                    <img src="/img/fotos-componentes/centralita-azul.png" alt="centralita iedes solenergy">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('La centralita de control', array(), "renovables")?></p>
            <p><?php echo $view['translator']->trans('También dispone de un sistema anti-heladas', array(), "renovables")?></p>
        </div>
        <div class="col-md-6 visible-md visible-lg">
            <div class="cycle-slideshow" 
                data-cycle-fx=fadeout
                data-cycle-timeout=2000
                data-cycle-pause-on-hover="true"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/centralita-gris.png" alt="centralita iedes solenergy">
                <img src="/img/fotos-componentes/centralita-azul.png" alt="centralita iedes solenergy">
            </div>
        </div>
    </div>
    
    <div class="separador-gris"></div>

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('UNA GRAN INSTALACIÓN PARA UN GRAN PRODUCTO', array(), "renovables")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 hidden-xs hidden-sm">
            <div class="cycle-slideshow " 
                data-cycle-fx=fadeout
                data-cycle-timeout=2000
                data-cycle-pause-on-hover="true"
                data-cycle-center-vert=true
                data-cycle-center-horz=true
                >
                <img src="/img/fotos-componentes/estructura.png" alt="estructura de instalación de equipos iEDES">
                <img src="/img/fotos-componentes/aislante.png" alt="Aislante usado por iEDES">
                <img src="/img/fotos-componentes/taco-quimico.png" alt="Taco químico para instalaciones de iEDES">
                <img src="/img/fotos-componentes/tuberia-multicapa.png" alt="Tubería multicapa usada en la instalaciones de iEDES">
            </div>
        </div>
        <div class="col-xs-12 col-md-7">
            <p><?php echo $view['translator']->trans('No todas las empresas instalan igual', array(), "renovables")?></p>
            <p><?php echo $view['translator']->trans('Nuestra instalación está diseñada', array(), "renovables")?> </p>
            <div class="col-xs-12 visible-xs visible-sm">
                <div class="cycle-slideshow " 
                    data-cycle-fx=fadeout
                    data-cycle-timeout=2000
                    data-cycle-pause-on-hover="true"
                    data-cycle-center-vert=true
                    data-cycle-center-horz=true
                    >
                <img src="/img/fotos-componentes/estructura.png" alt="estructura de instalación de equipos iEDES">
                <img src="/img/fotos-componentes/aislante.png" alt="Aislante usado por iEDES">
                <img src="/img/fotos-componentes/taco-quimico.png" alt="Taco químico para instalaciones de iEDES">
                <img src="/img/fotos-componentes/tuberia-multicapa.png" alt="Tubería multicapa usada en la instalaciones de iEDES">
                </div>
            </div>
            <p><?php echo $view['translator']->trans('La conducción de agua se realiza', array(), "renovables")?></p>
            <p><?php echo $view['translator']->trans('Utilizamos siempre materiales', array(), "renovables")?></p>
        </div>
    </div>
    
    <div class="separador-gris"></div>
    
    <div class="row">
        <div class="col-xs-12 tabla">
            <h1 class="centrado"><?php echo $view['translator']->trans('+GARANTÍA   +AHORRO', array(), "renovables")?></h1>
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td id="minwidthtcellchico"><p><?php echo $view['translator']->trans('BÁSICO', array(), "renovables")?></p></td>
                        <td id="minwidthtcellchico"><p><?php echo $view['translator']->trans('ESTÁNDAR', array(), "renovables")?></p></td>
                        <td></td>
                    </tr>
                </thead>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><p><?php echo $view['translator']->trans('Garantía 10', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Garantía 20', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="si"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><p><?php echo $view['translator']->trans('Acumulador Anodizado', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Acumulador antimagnético', array(), "renovables")?></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="si"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Serpentín Extraíble', array(), "renovables")?></p></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="separador-gris"></div>
    
    <div class="row">
        <div class="col-xs-12 tabla">
            <h1 class="centrado"><?php echo $view['translator']->trans('+RENDIMIENTO   +SOSTENIBLE', array(), "renovables")?></h1>
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td id="minwidthtcell"><p><?php echo $view['translator']->trans('OTRAS EMPRESAS', array(), "renovables")?></p></td>
                        <td id="minwidthtcellchico"><img src="/img/logo.png" alt="logo de iEDES Solenergy"></td>
                        <td></td>
                    </tr>
                </thead>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Empresa Acreditada', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('21 años de Experiencia', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('17 Delegaciones', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('270 Empleados', array(), "renovables")?></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Servicio Técnico Postventa', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Gran cantidad de materiales', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Sistemas Forzados', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Serpentín Extraíble', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Más volumen de Acumulación', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Hasta 20 años de Garantía', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><p><?php echo $view['translator']->trans('Producto completamente fabricado Andalucía', array(), "renovables")?></p></td>
                </tr>
            </table>
        </div>
    </div>
    
    <div class="separador-gris"></div>
    
    <div class="row">
        <div class="col-xs-12 tabla">
            <h1 class="centrado"><?php echo $view['translator']->trans('+RENDIMIENTO   +SOSTENIBLE', array(), "renovables")?></h1>
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <td id="minwidthtcell"><p><?php echo $view['translator']->trans('FORZADO', array(), "renovables")?></p></td>
                        <td id="minwidthtcell"><p><?php echo $view['translator']->trans('TERMOSIFÓN', array(), "renovables")?></p></td>
                        <td id="minwidthtcell" class="hidden-xs"><p><?php echo $view['translator']->trans('ESPECIFICACIONES', array(), "renovables")?></p></td>
                        <td id="minwidthtcell"><p><?php echo $view['translator']->trans('OBSERVACIONES', array(), "renovables")?></p></td>
                    </tr>
                </thead>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Calentar Agua', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('Ambos sistemas producen agua', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Calentar agua con poca radiación', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('Los sistemas forzados son capaces de', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Sistema Paro por Alta Temperatura', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('Los sistemas forzados incorporan un', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Acumulación desde 330L a 440L', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('Los termosifones existentes en', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Sistema Acumulador instantáneo Anti-bacterias', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('Evitan la acumulación de', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Panel altamente Selectivo', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('Nuestros paneles están construidos', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Acumulador de perfil bajo sin válvula', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('Las válvulas termosifónicas tienen elevadas', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Garantía de hasta 20 años', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('En los sistemas forzados, al disponer', array(), "renovables")?></p></td>
                </tr>
                <tr>
                    <td><img src="/img/si.png" alt="sí" title="sí"></td>
                    <td><img src="/img/no.png" alt="no" title="no"></td>
                    <td class="hidden-xs"><p><?php echo $view['translator']->trans('Integración arquitectónica', array(), "renovables")?></p></td>
                    <td><p><?php echo $view['translator']->trans('Los sistemas forzados permiten', array(), "renovables")?></p></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row sin-padding">
        <div class="col-xs-12">
            <h1 class="h_1"><?php echo $view['translator']->trans('OTRAS OPCIONES SOLAR', array(), "renovables")?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p><a href="<?php echo $view['router']->generate("energia_solar_fotovoltaica");?>"><?php echo $view['translator']->trans('Si lo que necesitas es energía eléctrica', array(), "renovables")?></a></p>
        </div>
    </div>
</div>
