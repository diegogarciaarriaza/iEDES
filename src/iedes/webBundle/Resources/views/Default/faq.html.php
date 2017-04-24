<?php $view->extend('::base.html.php');?>

<div class="container faqs">

    <h2><?php echo $view['translator']->trans('¿Necesitas información extra?', array(), "faq")?></h2>
    </br>
    
    <div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#solartermica" data-toggle="tab"><?php echo $view['translator']->trans('Solar Térmica', array(), "faq")?></a></li>
            <li><a href="#solarfotovoltaica" data-toggle="tab"><?php echo $view['translator']->trans('Solar Fotovoltaica', array(), "faq")?></a></li>
            <li><a href="#cloradorsalino" data-toggle="tab"><?php echo $view['translator']->trans('Cloradores Salinos', array(), "faq")?></a></li>
            <li><a href="#descalcificador" data-toggle="tab"><?php echo $view['translator']->trans('Descalcificadores', array(), "faq")?></a></li>
            <li><a href="#aerotermia" data-toggle="tab"><?php echo $view['translator']->trans('Aerotermias', array(), "faq")?></a></li>
            <li><a href="#osmosis" data-toggle="tab"><?php echo $view['translator']->trans('Ósmosis', array(), "faq")?></a></li>
            <li><a href="#pellets" data-toggle="tab"><?php echo $view['translator']->trans('Estufas de Pellets', array(), "faq")?></a></li>
            <li><a href="#aire" data-toggle="tab"><?php echo $view['translator']->trans('Aire Acondicionado', array(), "faq")?></a></li>
        </ul>
    </div>
    
    <div class="tab-content">
        <div class="tab-pane fade in active" id="solartermica">
            <!-- INICIO TAB DE ENERGIA SOLAR TÉRMICA -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#queesmejor" aria-expanded="false" aria-controls="control_queesmejor">
                    <div class="panel-heading" role="tab" id="heading_queesmejor">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué es mejor, forzado o termosifón?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="queesmejor" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_queesmejor">
                  <div class="panel-body">
                    <div class="col-xs">
                      <div class="col-xs-12">
                        <div class="cycle-slideshow top_imagen_10"
                                  data-cycle-center-vert=true
                                  data-cycle-center-horz=true
                                  >
                                    <img src="/img/forzado-termosifon.png" alt="comparativa forzado vs termosifón de iEDES Solenergy" usemap="#map_clienteanio" />

                              </div>  
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#quees" aria-expanded="false" aria-controls="control_quees">
                    <div class="panel-heading" role="tab" id="heading_quees">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué es la energía solar térmica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="quees" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_quees">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La energía solar térmica consiste', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#porqueinteresa" aria-expanded="false" aria-controls="control_porqueinteresa">
                    <div class="panel-heading" role="tab" id="heading_porqueinteresa">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Por qué me podría interesar instalar?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="porqueinteresa" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_porqueinteresa">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Instalando un sistema de energía solar', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paraquesirve" aria-expanded="false" aria-controls="control_paraquesirve">
                    <div class="panel-heading" role="tab" id="heading_paraquesirve">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Para qué sirve la energía solar térmica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="paraquesirve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_paraquesirve">
                  <div class="panel-body">
                  <p><?php echo $view['translator']->trans('La principal aplicación de la energía solar térmica', array(), "faq")?></p>  
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#inclinados" aria-expanded="false" aria-controls="control_inclinados">
                    <div class="panel-heading" role="tab" id="heading_inclinados">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Se pueden instalar captadores solares sobre tejados inclinados?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="inclinados" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_inclinados">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Sí, la instalación puede hacerse en cualquier tipo de techos', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#componentes" aria-expanded="false" aria-controls="control_componentes">
                    <div class="panel-heading" role="tab" id="heading_componentes">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué equipos se utilizan en una instalación solar térmica para producción de agua caliente sanitaria (ACS)?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="componentes" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_componentes">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Además de los paneles solares', array(), "faq")?></p>
                    <ul>
                      <li><?php echo $view['translator']->trans('Sistema de acumulación', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Sistema de intercambio del calor', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Centralita para la regulación', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Estratificador o equipo de energía', array(), "faq")?></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#aplicaciones" aria-expanded="false" aria-controls="control_aplicaciones">
                    <div class="panel-heading" role="tab" id="heading_aplicaciones">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Existen distintos tipos de captadores solares térmicos?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                  </a>
                <div id="aplicaciones" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_aplicaciones">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Los captadores más usados en aplicaciones domésticas', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#como" aria-expanded="false" aria-controls="control_como">
                    <div class="panel-heading" role="tab" id="heading_como">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cómo funcionan los sistemas solares para producir agua caliente sanitaria (ACS)?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="como" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_como">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Explicado de una forma simple y sencilla', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#tiempo" aria-expanded="false" aria-controls="control_tiempo">
                    <div class="panel-heading" role="tab" id="heading_tiempo">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿En cuánto tiempo calienta el agua?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="tiempo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_tiempo">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Depende de muchos factores, consumo, equipos, etc', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#viabilidadplanos" aria-expanded="false" aria-controls="control_viabilidadplanos">
                    <div class="panel-heading" role="tab" id="heading_viabilidadplanos">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es viable la instalación de captadores solares planos para ACS en cualquier vivienda?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="viabilidadplanos" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_viabilidadplanos">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Necesitamos que los captadores puedan tener una orientación al sur', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#obligatorio" aria-expanded="false" aria-controls="control_obligatorio">
                    <div class="panel-heading" role="tab" id="heading_obligatorio">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Estoy obligado a instalar energía solar en mi domicilio o casa?', array(), "faq")?>
                          </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="obligatorio" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_obligatorio">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Hablar de la energía solar térmica es hablar de una de las tecnologías renovables', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#beneficios" aria-expanded="false" aria-controls="control_beneficios">
                    <div class="panel-heading" role="tab" id="heading_beneficios">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué otros beneficios tiene instalar energía solar térmica para ACS?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="beneficios" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_beneficios">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Además del ahorro de combustible y por lo tanto económico', array(), "faq")?></p>
                    <ul>
                      <li><?php echo $view['translator']->trans('Nos reduce en gran medida las constantes:', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Permite reducir la emisión de gases productores de efecto invernadero', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Reduce las emisiones de contaminantes', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Reduce la dependencia energética', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Genera empleo y contribuye a dinamizar la economía', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Aporta valor añadido a la vivienda', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('El coste diferencial', array(), "faq")?></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#administracion" aria-expanded="false" aria-controls="control_administracion">
                    <div class="panel-heading" role="tab" id="heading_administracion">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Hay que realizar algún trámite administrativo?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="administracion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_administracion">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La potencia térmica en una instalación de sistemas solares prefabricados', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#heladas" aria-expanded="false" aria-controls="control_heladas">
                    <div class="panel-heading" role="tab" id="heading_heladas">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Las heladas pueden dañar mis paneles?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="heladas" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_heladas">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Para evitar daños con las heladas', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#merecelapena" aria-expanded="false" aria-controls="control_merecelapena">
                    <div class="panel-heading" role="tab" id="heading_merecelapena">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Merece la pena la instalación de un equipo térmico en las zonas más al norte?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="merecelapena" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_merecelapena">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Los países más septentrionales', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('Sin embargo, debemos tener en cuenta', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#generaenergia" aria-expanded="false" aria-controls="control_generaenergia">
                    <div class="panel-heading" role="tab" id="heading_generaenergia">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Puedo generar electricidad con mis captadores de energía solar?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="generaenergia" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_generaenergia">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Los captadores de energía solar térmica sólo sirven para calentar el agua', array(), "faq")?></p> 
                    <p><?php echo $view['translator']->trans('Existe la energía solar fotovoltaica', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usanfotovoltaicos" aria-expanded="false" aria-controls="control_usanfotovoltaicos">
                    <div class="panel-heading" role="tab" id="heading_usanfotovoltaicos">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Los equipos de energía solar térmica usan paneles fotovoltaicos?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="usanfotovoltaicos" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_usanfotovoltaicos">
                  <div class="panel-body">
                    <p>No, estos equipos transforman directamente la radiación solar en calor. Los equipos fotovoltaicos transforman la energía solar en energía eléctrica.</p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#quemarenverano" aria-expanded="false" aria-controls="control_quemarenverano">
                    <div class="panel-heading" role="tab" id="heading_quemarenverano">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es cierto que en verano el agua sale tan caliente que puede quemar?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="quemarenverano" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_quemarenverano">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Al disfrutar de más horas de sol', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#necesidadapoyo" aria-expanded="false" aria-controls="control_necesidadapoyo">
                    <div class="panel-heading" role="tab" id="heading_necesidadapoyo">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es necesario contar con un sistema convencional de apoyo?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="necesidadapoyo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_necesidadapoyo">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Si quieres cubrir la demanda de agua caliente sanitaria', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#duracionaguacaliente" aria-expanded="false" aria-controls="control_duracionaguacaliente">
                    <div class="panel-heading" role="tab" id="heading_duracionaguacaliente">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuánto tiempo dura el agua caliente?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="duracionaguacaliente" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_duracionaguacaliente">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La temperatura disminuye 3ºC cada día sin sol', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dianublado" aria-expanded="false" aria-controls="control_dianublado">
                    <div class="panel-heading" role="tab" id="heading_dianublado">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Y si está nublado varios días seguidos?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="dianublado" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_dianublado">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Lo más positivo es que en España de los 365 días', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#lanoche" aria-expanded="false" aria-controls="control_lanoche">
                    <div class="panel-heading" role="tab" id="heading_lanoche">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué ocurre de noche? ¿No tendré agua caliente?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="lanoche" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_lanoche">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('El agua se mantiene caliente gracias a que el depósito está aislado térmicamente', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#cuantoahorro" aria-expanded="false" aria-controls="control_cuantoahorro">
                    <div class="panel-heading" role="tab" id="heading_cuantoahorro">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('Entonces, ¿cuánto dinero puedo ahorrar?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="cuantoahorro" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_cuantoahorro">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Mediante el uso de la energía solar para la obtención de agua caliente', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#sinsubvencion" aria-expanded="false" aria-controls="control_sinsubvencion">
                    <div class="panel-heading" role="tab" id="heading_sinsubvencion">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Compensa instalar un sistema de ACS si no tenemos subvención?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="sinsubvencion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_sinsubvencion">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('En los últimos años los sistemas de ACS se han perfeccionado', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#vidautil" aria-expanded="false" aria-controls="control_vidautil">
                    <div class="panel-heading" role="tab" id="heading_vidautil">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuál es la vida útil de mi equipo solar?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="vidautil" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_vidautil">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La vida útil de un equipo de energía solar térmica', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#recuperarinversion" aria-expanded="false" aria-controls="control_recuperarinversion">
                    <div class="panel-heading" role="tab" id="heading_recuperarinversion">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿En cuánto tiempo podría recuperar la inversión?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="recuperarinversion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_recuperarinversion">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('El tiempo para recuperar la inversión dependerá', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#termicaindustrial" aria-expanded="false" aria-controls="control_termicaindustrial">
                    <div class="panel-heading" role="tab" id="heading_termicaindustrial">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es posible utilizar energía solar térmica en procesos industriales? ¿Por ejemplo?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="termicaindustrial" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_termicaindustrial">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Existen muchos procesos industriales que necesitan calor', array(), "faq")?></p> 
                    <ul>
                      <li><?php echo $view['translator']->trans('Agua de lavado en industria alimenticia y conservera', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Agua de lavado de vehículos', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Lavado de envases', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Agua caliente de limpieza', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Agua caliente para lavanderías', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Apoyo de agua de calderas', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Agua caliente sanitaria (ACS) en hoteles y restaurantes', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Piscinas climatizadas de uso público', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Agua de calefacción en hoteles', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Calentamiento de sustrato de enraizamiento de plantines', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Calefacción de viveros', array(), "faq")?></li>
                      <p><?php echo $view['translator']->trans('Por otro lado, la instalación de captadores solares térmicos', array(), "faq")?></p>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN TAB SOLAR TERMICA -->
        </div>
        <div class="tab-pane fade" id="solarfotovoltaica">
            <!-- INICIO TAB DE ENERGIA SOLAR FOTOVOLTAICA -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#queesf" aria-expanded="false" aria-controls="control_queesf">
                    <div class="panel-heading" role="tab" id="heading_queesf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué es la energía solar fotovoltaica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="queesf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_queesf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La energía solar fotovoltaica es una fuente de energía', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paraquesirvef" aria-expanded="false" aria-controls="control_paraquesirvef">
                    <div class="panel-heading" role="tab" id="heading_paraquesirvef">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Para qué sirve la energía solar fotovoltaica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="paraquesirvef" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_paraquesirvef">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Este tipo de energía se usa para alimentar innumerables aplicaciones', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#comofuncionanf" aria-expanded="false" aria-controls="control_comofuncionanf">
                    <div class="panel-heading" role="tab" id="heading_comofuncionanf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cómo funcionan los sistemas solares para producir electricidad?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="comofuncionanf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_comofuncionanf">
                  <div class="panel-body">
                  <p><?php echo $view['translator']->trans('Los paneles fotovoltaicos generan electricidad a partir de la captación de la radiación solar', array(), "faq")?></p>  
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#combinarf" aria-expanded="false" aria-controls="control_combinarf">
                    <div class="panel-heading" role="tab" id="heading_combinarf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Se pueden combinar diferentes fuentes de energía renovable en una misma instalación?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="combinarf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_combinarf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Sí, es posible. La energía solar fotovoltaica se puede combinar con otros tipos', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#diferenciatiposf" aria-expanded="false" aria-controls="control_diferenciatiposf">
                    <div class="panel-heading" role="tab" id="heading_diferenciatiposf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuál es la diferencia entre una instalación de autoconsumo aislada y conectada?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="diferenciatiposf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_diferenciatiposf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Las instalaciones fotovoltaicas se diferencian en dos tipos', array(), "faq")?></p>
                    <ul>
                      <li><?php echo $view['translator']->trans('Fotovoltaica aislada', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Fotovoltaica de autoconsumo', array(), "faq")?></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#sigousandoelecf" aria-expanded="false" aria-controls="control_sigousandoelecf">
                    <div class="panel-heading" role="tab" id="heading_sigousandoelecf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Sigo utilizando la electricidad de la red?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                  </a>
                <div id="sigousandoelecf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_sigousandoelecf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Únicamente en las instalaciones de autoconsumo', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#cuantoahorrof" aria-expanded="false" aria-controls="control_cuantoahorrof">
                    <div class="panel-heading" role="tab" id="heading_cuantoahorrof">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuánto me ahorro en la factura de la luz?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="cuantoahorrof" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_cuantoahorrof">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Para saber cuánto se puede ahorrar es necesario realizar un estudio', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#seguirpagandof" aria-expanded="false" aria-controls="control_seguirpagandof">
                    <div class="panel-heading" role="tab" id="heading_seguirpagandof">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Tengo que seguir pagando la factura de electricidad?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="seguirpagandof" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_seguirpagandof">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('No, en el caso de instalaciones aisladas', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#utilf" aria-expanded="false" aria-controls="control_utilf">
                    <div class="panel-heading" role="tab" id="heading_utilf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es útil la energía solar fotovoltaica para mi negocio o vivienda?', array(), "faq")?>
                          </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="utilf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_utilf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La energía solar es útil ya que aporta electricidad gratuita', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#cuantocostaraf" aria-expanded="false" aria-controls="control_cuantocostaraf">
                    <div class="panel-heading" role="tab" id="heading_cuantocostaraf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuánto me costará la electricidad una vez tenga realizada la instalación solar?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="cuantocostaraf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_cuantocostaraf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('El coste de nuestro consumo tendrá dos valores', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#porqueinteresaf" aria-expanded="false" aria-controls="control_porqueinteresaf">
                    <div class="panel-heading" role="tab" id="heading_porqueinteresaf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Por qué me podría interesarme instalar un sistema de energía solar fotovoltaica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="porqueinteresaf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_porqueinteresaf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Con la energía solar fotovoltaica ahorra dinero sin perder en comodidad', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#otrosbeneff" aria-expanded="false" aria-controls="control_otrosbeneff">
                    <div class="panel-heading" role="tab" id="heading_otrosbeneff">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué otros beneficios tiene instalar energía solar fotovoltaica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="otrosbeneff" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_otrosbeneff">
                  <div class="panel-body">
                    <ul>
                      <li><?php echo $view['translator']->trans('Es una fuente de energía renovable, sus recursos son ilimitados', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Fuente de energía amigable con el medio ambiente', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Costes de operación muy bajos', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Mantenimiento sencillo y de bajo coste', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Alta vida útil', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Se puede integrar en estructuras constructivas', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Es un sistema de aprovechamiento de energía idóneo', array(), "faq")?></li>
                      <li><?php echo $view['translator']->trans('Los paneles fotovoltaicos son limpios y silenciosos', array(), "faq")?></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#cuantocuestaf" aria-expanded="false" aria-controls="control_cuantocuestaf">
                    <div class="panel-heading" role="tab" id="heading_cuantocuestaf">
                        <h4 class="panel-title">     
                            ¿Cuánto cuesta un sistema de energía solar fotovoltaica iEDES?
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="cuantocuestaf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_cuantocuestaf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Dependerá de las necesidades del cliente', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#tiempoamortf" aria-expanded="false" aria-controls="control_tiempoamortf">
                    <div class="panel-heading" role="tab" id="heading_tiempoamortf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿En cuánto tiempo se amortiza una instalación solar fotovoltaica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="tiempoamortf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_tiempoamortf">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Dependerá de muchos factores', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#financiarf" aria-expanded="false" aria-controls="control_financiarf">
                    <div class="panel-heading" role="tab" id="heading_financiarf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Puedo financiar mi instalación?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="financiarf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_financiarf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Por supuesto, puedes hacerlo con nosotros', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#vidautilf" aria-expanded="false" aria-controls="control_vidautilf">
                    <div class="panel-heading" role="tab" id="heading_vidautilf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuál es la vida útil de la instalación?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="vidautilf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_vidautilf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La vida útil de una instalación fotovoltaica es mayor a 30', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#tipomantenimientof" aria-expanded="false" aria-controls="control_tipomantenimientof">
                    <div class="panel-heading" role="tab" id="heading_tipomantenimientof">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué tipo de mantenimiento tiene la instalación?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="tipomantenimientof" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_tipomantenimientof">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Es recomendable que una vez al año se realicen trabajos de mantenimiento preventivo', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#lanochef" aria-expanded="false" aria-controls="control_lanochef">
                    <div class="panel-heading" role="tab" id="heading_lanochef">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué ocurre por la noche? ¿Tendré electricidad?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="lanochef" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_lanochef">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Sí, en ambos casos. En el caso de instalaciones aisladas', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#nubesolluviaf" aria-expanded="false" aria-controls="control_nubesolluviaf">
                    <div class="panel-heading" role="tab" id="heading_nubesolluviaf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Producen energía los paneles con nubes o lluvia? ¿Y si esta nublado varios días seguidos?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="nubesolluviaf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_nubesolluviaf">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Sí, siempre que haya un mínimo de radiación solar', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Sí esta varios días nublados, nuestras instalaciones de consumo aislado', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#mismaenergiaf" aria-expanded="false" aria-controls="control_mismaenergiaf">
                    <div class="panel-heading" role="tab" id="heading_mismaenergiaf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Tendré la misma energía durante todo el año?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="mismaenergiaf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_mismaenergiaf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Nuestros equipos siempre se diseñan para suministrar la energía necesaria', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#calentaraguaf" aria-expanded="false" aria-controls="control_calentaraguaf">
                    <div class="panel-heading" role="tab" id="heading_calentaraguaf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Se puede calentar agua con los paneles fotovoltaicos?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="calentaraguaf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_calentaraguaf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Sí de forma indirecta, ya que nuestra instalación suministra energía a elementos eléctricos', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#distintospanelesf" aria-expanded="false" aria-controls="control_distintospanelesf">
                    <div class="panel-heading" role="tab" id="heading_distintospanelesf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Existen distintos paneles solares fotovoltaicos?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="distintospanelesf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_distintospanelesf">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Sí, los paneles fotovoltaicos se dividen en', array(), "faq")?></p>
                      <ul>
                          <li><?php echo $view['translator']->trans('Módulo solar amorfo o de capa fina', array(), "faq")?></li>
                          <li><?php echo $view['translator']->trans('Módulo solar policristalino', array(), "faq")?></li>
                          <li><?php echo $view['translator']->trans('Módulo solar monocristalino', array(), "faq")?></li>
                      </ul>
                      <p><?php echo $view['translator']->trans('Nuestras instalaciones están compuestas por paneles solares policristalinos', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#viablef" aria-expanded="false" aria-controls="control_viablef">
                    <div class="panel-heading" role="tab" id="heading_viablef">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es viable la instalación de paneles solares fotovoltaicos en mi vivienda?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="viablef" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_viablef">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Para que sea viable es necesario que la instalación se pueda realizar en las mejores condiciones', array(), "faq")?></p> 
                  </div>
                </div>
              </div>
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#composicionf" aria-expanded="false" aria-controls="control_composicionf">
                    <div class="panel-heading" role="tab" id="heading_composicionf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿De qué está compuesta una instalación solar fotovoltaica?', array(), "faq")?> 
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="composicionf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_composicionf">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Una instalación solar fotovoltaica está compuesta por varios elementos', array(), "faq")?></p>
                      <ul>
                          <li><?php echo $view['translator']->trans('Módulo solar fotovoltaico', array(), "faq")?></li>
                          <li><?php echo $view['translator']->trans('Maximizador de carga', array(), "faq")?></li>
                          <li><?php echo $view['translator']->trans('Baterías estacionarias', array(), "faq")?></li>
                          <li><?php echo $view['translator']->trans('Inversor de corriente', array(), "faq")?></li>
                      </ul>
                      <p><?php echo $view['translator']->trans('Nuestras instalaciones están compuestas por paneles solares policristalinos', array(), "faq")?></p>
                  </div>
                </div>
              </div>
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#suministroamif" aria-expanded="false" aria-controls="control_suministroamif">
                    <div class="panel-heading" role="tab" id="heading_suministroamif">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Puedo dar suministro a toda mi vivienda con la instalación solar fotovoltaica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="suministroamif" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_suministroamif">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Para poder dar un suministro completo y estable es necesario realizar un estudio de los hábitos de consumo', array(), "faq")?></p> 
                  </div>
                </div>
              </div>
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#quienrealizaf" aria-expanded="false" aria-controls="control_quienrealizaf">
                    <div class="panel-heading" role="tab" id="heading_quienrealizaf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Quién debe realizar la instalación de energía solar fotovoltaica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="quienrealizaf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_quienrealizaf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Las instalaciones deberán ser realizadas siempre por un Instalador Autorizado', array(), "faq")?></p> 
                  </div>
                </div>
              </div>    
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#tramitesf" aria-expanded="false" aria-controls="control_tramitesf">
                    <div class="panel-heading" role="tab" id="heading_tramitesf">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Hay que realizar algún trámite administrativo para poner en marcha una instalación de energía solar fotovoltaica?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="tramitesf" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_tramitesf">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('No es necesario para instalaciones aisladas o de autoconsumo sin vertido a red', array(), "faq")?></p> 
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN TAB SOLAR FOTOVOLTAICA -->
        </div>
        <div class="tab-pane fade" id="cloradorsalino">
            <!-- INICIO TAB DE CLORADOR SALINO -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#principiocs" aria-expanded="false" aria-controls="control_principiocs">
                    <div class="panel-heading" role="tab" id="heading_principiocs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('Principio básico', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="principiocs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_principiocs">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Funciona descomponiendo la sal, de forma que generamos cloro de manera natural', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Gracias a iedes electrolisis salina conseguimos una desinfección', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#validapiscinascs" aria-expanded="false" aria-controls="control_validapiscinascs">
                    <div class="panel-heading" role="tab" id="heading_validapiscinascs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es válida la electrólisis iedes para cualquier tipo de piscinas?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="validapiscinascs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_validapiscinascs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Sí. Y no únicamente para piscinas sino también para spas', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#costeelectrolisiscs" aria-expanded="false" aria-controls="control_costeelectrolisiscs">
                    <div class="panel-heading" role="tab" id="heading_costeelectrolisiscs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuál es el coste de implantar este sistema de electrólisis iedes?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="costeelectrolisiscs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_costeelectrolisiscs">
                  <div class="panel-body">
                  <p><?php echo $view['translator']->trans('En primer lugar hay que determinar ciertos parámetros como el tamaño la piscina', array(), "faq")?></p>  
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#facilelecrolisiscs" aria-expanded="false" aria-controls="control_facilelecrolisiscs">
                    <div class="panel-heading" role="tab" id="heading_facilelecrolisiscs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es fácil instalar este sistema de electrólisis iedes? ¿Implica mucha obra?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="facilelecrolisiscs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_facilelecrolisiscs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('No. La electrólisis salina es un sistema fácil de instalar y que no implica obra', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#unavezinstaladocs" aria-expanded="false" aria-controls="control_unavezinstaladocs">
                    <div class="panel-heading" role="tab" id="heading_unavezinstaladocs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('Una vez instalado, ¿Qué tengo que hacer?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="unavezinstaladocs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_unavezinstaladocs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La tecnología de este sistema de electrólisis iedes está adaptada para que por sí sola', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#aguasalinasanacs" aria-expanded="false" aria-controls="control_aguasalinasanacs">
                    <div class="panel-heading" role="tab" id="heading_aguasalinasanacs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Por qué el agua salina es más sana?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                  </a>
                <div id="aguasalinasanacs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_aguasalinasanacs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('El agua salina es un suave antiséptico natural', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#muysaladacs" aria-expanded="false" aria-controls="control_muysaladacs">
                    <div class="panel-heading" role="tab" id="heading_muysaladacs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Queda el agua muy salada?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="muysaladacs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_muysaladacs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('No, la sal que se añade al agua es en baja concentración', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#elevadoconsumocs" aria-expanded="false" aria-controls="control_elevadoconsumocs">
                    <div class="panel-heading" role="tab" id="heading_elevadoconsumocs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es muy elevado el consumo de la sal?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="elevadoconsumocs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_elevadoconsumocs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Prácticamente no hay consumo', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#salcorrosivacs" aria-expanded="false" aria-controls="control_salcorrosivacs">
                    <div class="panel-heading" role="tab" id="heading_salcorrosivacs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es la sal corrosiva?', array(), "faq")?>
                          </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="salcorrosivacs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_salcorrosivacs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('El agua con una concentración de sal tan baja no es corrosiva', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#mantenimientocs" aria-expanded="false" aria-controls="control_mantenimientocs">
                    <div class="panel-heading" role="tab" id="heading_mantenimientocs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Requiere algún tipo de mantenimiento?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="mantenimientocs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_mantenimientocs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Muy pequeño, y es que una de las ventajas de este sistema es su automatismo', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#momentosdesequiacs" aria-expanded="false" aria-controls="control_momentosdesequiacs">
                    <div class="panel-heading" role="tab" id="heading_momentosdesequiacs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('En momentos de sequía, ¿Aporta algo este sistema de electrólisis salina?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="momentosdesequiacs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_momentosdesequiacs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Sí. Y ésta es una de sus principales ventajas', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bronceadocs" aria-expanded="false" aria-controls="control_bronceadocs">
                    <div class="panel-heading" role="tab" id="heading_bronceadocs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué pasa con el bronceado?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="bronceadocs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_bronceadocs">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Gracias al clorador aqulider vamos a poder disfrutar de un bronceado', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#insectoscs" aria-expanded="false" aria-controls="control_insectoscs">
                    <div class="panel-heading" role="tab" id="heading_insectoscs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Afecta el clorador iedes a los insectos?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="insectoscs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_insectoscs">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('¿Ha visto usted alguna vez avispas en la playa?', array(), "faq")?></p>
                  </div>
                </div>
              </div>
            </div>
            <!-- FIN TAB CLORADOR SALINO -->
        </div>
        <div class="tab-pane fade" id="descalcificador">
            <!-- INICIO TAB DE DESCALCIFICADORES -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#comofuncionad" aria-expanded="false" aria-controls="control_comofuncionad">
                    <div class="panel-heading" role="tab" id="heading_comofuncionad">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cómo funciona un descalcificador?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="comofuncionad" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_comofuncionad">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Un descalcificador está compuesto por', array(), "faq")?></p> 
                      <p><?php echo $view['translator']->trans('El agua pasa por la resina y por un intercambio iónico', array(), "faq")?></p> 
                      <p><?php echo $view['translator']->trans('Una vez finalizada la regeneración', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#valvulad" aria-expanded="false" aria-controls="control_valvulad">
                    <div class="panel-heading" role="tab" id="heading_valvulad">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué válvula debe tener un descalcificador?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="valvulad" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_valvulad">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Aquí la parte más fundamental del descalcificador', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('El descalcificador iedes es volumétrico', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#beneficiosd" aria-expanded="false" aria-controls="control_beneficiosd">
                    <div class="panel-heading" role="tab" id="heading_beneficiosd">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuáles son los beneficios de al instalar un descalcificador iedes?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="beneficiosd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_beneficiosd">
                  <div class="panel-body">
                      <ol>
                          <li><?php echo $view['translator']->trans('Protección en todas las tuberías de nuestro hogar', array(), "faq")?></li> 
                          <li><?php echo $view['translator']->trans('Protección de calderas, termos, acumuladores', array(), "faq")?></li> 
                          <li><?php echo $view['translator']->trans('Protección en los principales electrodomésticos que utilizan agua', array(), "faq")?></li>
                      </ol>
                  </div>
                </div>
              </div>
                
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ahorrod" aria-expanded="false" aria-controls="control_ahorrod">
                    <div class="panel-heading" role="tab" id="heading_ahorrod">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿En que puedo ahorrar si instalo un descalcificador iedes?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="ahorrod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_ahorrod">
                  <div class="panel-body">
                      <ol>
                          <li><?php echo $view['translator']->trans('Detergente para la lavadora', array(), "faq")?></li> 
                          <li><?php echo $view['translator']->trans('Suavizantes para la ropa', array(), "faq")?></li> 
                          <li><?php echo $view['translator']->trans('Pastillas de Anti-Cal para lavadoras', array(), "faq")?></li>
                          <li><?php echo $view['translator']->trans('Ahorro en productos de limpieza', array(), "faq")?></li>
                      </ol>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#afectasaludd" aria-expanded="false" aria-controls="control_afectasaludd">
                    <div class="panel-heading" role="tab" id="heading_afectasaludd">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cómo afecta en la salud instalar un descalcificador iedes?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="afectasaludd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_afectasaludd">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Disfrutara de una ducha o baño relajante', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#aguasaladad" aria-expanded="false" aria-controls="control_aguasaladad">
                    <div class="panel-heading" role="tab" id="heading_aguasaladad">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿El agua que sale por el descalcificador iedes es agua salada?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="aguasaladad" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_aguasaladad">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('No. El agua que sale del descalcificador iedes no es salada', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#puedebeberd" aria-expanded="false" aria-controls="control_puedebeberd">
                    <div class="panel-heading" role="tab" id="heading_puedebeberd">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Se puede beber el agua que sale del descalcificador iedes?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                  </a>
                <div id="puedebeberd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_puedebeberd">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Sí, en nuestro caso. Ya que todos los equipos que vendemos', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#recomendabled" aria-expanded="false" aria-controls="control_recomendabled">
                    <div class="panel-heading" role="tab" id="heading_recomendabled">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es recomendable poner una osmosis después del descalcificador aqulider?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="recomendabled" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_recomendabled">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Si queréis un valor añadido es una buena opción', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#losotrosd" aria-expanded="false" aria-controls="control_losotrosd">
                    <div class="panel-heading" role="tab" id="heading_losotrosd">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Y los descalcificadores magnéticos o electrónicos que son?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="losotrosd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_losotrosd">
                  <div class="panel-body">
                     <p><?php echo $view['translator']->trans('Hace unos años en la época que se veían los vendedores', array(), "faq")?></p>
                     <p><?php echo $view['translator']->trans('Lamentablemente no funcionan y no tienen bases científicas que los respalden', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#preciod" aria-expanded="false" aria-controls="control_preciod">
                    <div class="panel-heading" role="tab" id="heading_preciod">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué precio tiene un descalcificador iedes?', array(), "faq")?>
                          </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="preciod" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_preciod">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Llegado a este punto, la pregunta sería', array(), "faq")?></p> 
                    <p><?php echo $view['translator']->trans('¿Entonces qué precio debe tener un descalcificador de calidad', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('En definitiva, un descalificador nos aporta ahorro, confort y salud', array(), "faq")?></p>
                  </div>
                </div>
              </div>

            <!-- FIN TAB DESCALCIFICADORES -->
        </div>
    </div>
        <div class="tab-pane fade" id="aerotermia">
            <!-- INICIO TAB DE AEROTERMIAS -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#queesaero" aria-expanded="false" aria-controls="control_queesaero">
                    <div class="panel-heading" role="tab" id="heading_queesaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué es el sistema iedes AIRSISTEM?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="queesaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_queesaero">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Consiste en extraer la energía térmica existente en el aire mediante bombas de calor', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Con esta tecnología alcanzaremos grandes ahorros energéticos en las facturas del hogar', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#evolucionaero" aria-expanded="false" aria-controls="control_evolucionaero">
                    <div class="panel-heading" role="tab" id="heading_evolucionaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuál es la evolución del sistema iedes airsistem?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="evolucionaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_evolucionaero">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('El sistema airsistem está presente desde hace mucho tiempo en el mercado', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ventajasaero" aria-expanded="false" aria-controls="control_ventajasaero">
                    <div class="panel-heading" role="tab" id="heading_ventajasaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué ventajas aporta frente a otros sistemas tradicionales', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="ventajasaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_ventajasaero">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('La principal ventaja, es el ahorro energético', array(), "faq")?></p>
                  </div>
                </div>
              </div>
                
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#codigotecnicoaero" aria-expanded="false" aria-controls="control_codigotecnicoaero">
                    <div class="panel-heading" role="tab" id="heading_codigotecnicoaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué especifica el Código Técnico con respecto a la aportación de energías renovables', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="codigotecnicoaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_codigotecnicoaero">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('El CTE se refiere al calentamiento del agua (ACS) en el apartado HE4', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Las únicas condiciones son que el sistema alternativo al solar propuesto consuma', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ahorrosaero" aria-expanded="false" aria-controls="control_ahorrosaero">
                    <div class="panel-heading" role="tab" id="heading_ahorrosaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuáles son los ahorros energéticos en ACS que se logran?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="ahorrosaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_ahorrosaero">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Los ahorros energéticos pueden rondar el 75', array(), "faq")?>%</p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#facilinstalacionaero" aria-expanded="false" aria-controls="control_facilinstalacionaero">
                    <div class="panel-heading" role="tab" id="heading_facilinstalacionaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es fácil la instalación de un sistema iedes airsistem?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="facilinstalacionaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_facilinstalacionaero">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Solamente hace falta conectar la entrada de agua fría', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#exitoaero" aria-expanded="false" aria-controls="control_exitoaero">
                    <div class="panel-heading" role="tab" id="heading_exitoaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('Casos de éxito de instalaciones', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                  </a>
                <div id="exitoaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_exitoaero">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('A nivel residencial cada vez son más las personas que utilizan energías alternativas', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('A nivel nacional podemos decir que ya son miles de personas', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#precioaero" aria-expanded="false" aria-controls="control_precioaero">
                    <div class="panel-heading" role="tab" id="heading_precioaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuánto puede costar o cual es el precio de un sistema con tecnología airsistem', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="precioaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_precioaero">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Existen en el mercado diferentes gamas, calidades, rendimientos, garantías y volúmenes', array(), "faq")?></p>
                  </div>
                </div>
              </div>
 
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#consisteaero" aria-expanded="false" aria-controls="control_consisteaero">
                    <div class="panel-heading" role="tab" id="heading_consisteaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿En qué consiste exactamente la tecnología?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="consisteaero" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_consisteaero">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Disponemos de tres circuitos', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Primero el aire entra en contacto con el evaporador de la bomba de calor', array(), "faq")?></p>
                  </div>
                </div>
              </div>

            <!-- FIN TAB AEROTERMIAS -->
        </div>
    </div>
        <div class="tab-pane fade" id="osmosis">
            <!-- INICIO TAB DE OSMOSIS -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#queeso" aria-expanded="false" aria-controls="control_queeso">
                    <div class="panel-heading" role="tab" id="heading_queeso">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué es la ósmosis inversa aqualider?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="queeso" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_queeso">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Es el proceso mecánico por el que se hace atravesar agua', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('La ósmosis inversa produce agua de altísima calidad idónea para sustituir al agua de botella', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usoso" aria-expanded="false" aria-controls="control_usoso">
                    <div class="panel-heading" role="tab" id="heading_usoso">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué usos tiene el agua tratada mediante ósmosis inversa aqualider?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="usoso" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_usoso">
                  <div class="panel-body">
                      <ul>
                        <li><?php echo $view['translator']->trans('Mejora su salud y la de los suyos', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('Es un agua ideal para beber y cocinar', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('Mejor sabor en infusiones y cafés', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('Es ideal para plantas delicadas y acuarios', array(), "faq")?></ul>
                        <li><?php echo $view['translator']->trans('Mejora el afeitado, enjuague del cabello, suavidad de la piel y tratamientos estéticos', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('Muy apropiada para planchas y limpiadoras de vapor', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('Usted ya no tendrá que cargar con botellas de agua nunca más', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('Y muchos usos alternativos que usted descubrirá', array(), "faq")?></li>
                      </ul>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ventaso" aria-expanded="false" aria-controls="control_ventaso">
                    <div class="panel-heading" role="tab" id="heading_ventaso">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué ventajas aporta frente a otros sistemas tradicionales', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="ventaso" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_ventaso">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('La principal ventaja, es el ahorro energético', array(), "faq")?></p>
                  </div>
                </div>
              </div>
                
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#contrao" aria-expanded="false" aria-controls="control_contrao">
                    <div class="panel-heading" role="tab" id="heading_contrao">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿El agua osmotizada aqualider tiene contraindicaciones?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="contrao" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_contrao">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('No Se trata de agua natural a la que se le ha eliminado los contaminantes', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Los equipos de ósmosis inversa aqualider están fabricados', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dondeo" aria-expanded="false" aria-controls="control_dondeo">
                    <div class="panel-heading" role="tab" id="heading_dondeo">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Dónde puedo instalar la osmosis aqualider?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="dondeo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_dondeo">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Normalmente se ubica debajo del fregadero', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('Su instalación es fácil y rápida, no requiere ningún tipo de obra', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('El Kit de instalación de aqualider es posiblemente el más completo', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#mantenimientoo" aria-expanded="false" aria-controls="control_mantenimientoo">
                    <div class="panel-heading" role="tab" id="heading_mantenimientoo">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Los equipos de ósmosis inversa aqualider tienen mantenimiento? ¿Cómo se realiza?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="mantenimientoo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_mantenimientoo">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Si Los filtros tienen una duración aproximada de un año', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Es conveniente reemplazarlos tras este periodo, dependiendo del uso que se haga del equipo', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('La membrana osmótica tiene una duración aproximada de dos o tres años', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#rentableo" aria-expanded="false" aria-controls="control_rentableo">
                    <div class="panel-heading" role="tab" id="heading_rentableo">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es rentable el sistema de ósmosis inversa aqualider? ¿Cuándo amortizo la inversión?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                  </a>
                <div id="rentableo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_rentableo">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Si Además la inversión se va amortizando sin darse cuenta', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#instantiguao" aria-expanded="false" aria-controls="control_instantiguao">
                    <div class="panel-heading" role="tab" id="heading_instantiguao">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('En mi domicilio tengo una instalación de agua muy antigua con muy poca presión', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="instantiguao" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_instantiguao">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('La presión mínima de trabajo del equipo es de 2,0', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#imprescindibleo" aria-expanded="false" aria-controls="control_imprescindibleo">
                    <div class="panel-heading" role="tab" id="heading_imprescindibleo">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es imprescindible taladrar la encimera y añadir junto al fregadero un grifo auxiliar?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="imprescindibleo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_imprescindibleo">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Algunos clientes prefieren no hacerlo o podría no haber espacio suficiente', array(), "faq")?></p>
                  </div>
                </div>
              </div>

            <!-- FIN TAB OSMOSIS -->
        </div>
    </div>
        <div class="tab-pane fade" id="pellets">
            <!-- INICIO TAB DE PELLETS -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#comoep" aria-expanded="false" aria-controls="control_comoep">
                    <div class="panel-heading" role="tab" id="heading_comoep">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cómo funciona exactamente una estufa de pellets?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="comoep" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_comoep">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Las calderas y estufas de pellets tienen un funcionamiento totalmente automático', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#queesep" aria-expanded="false" aria-controls="control_queesep">
                    <div class="panel-heading" role="tab" id="heading_queesep">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué son los pellets?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="queesep" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_queesep">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Los pellets son pequeños cilindros hechos de madera residual', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ventajasep" aria-expanded="false" aria-controls="control_ventajasep">
                    <div class="panel-heading" role="tab" id="heading_ventajasep">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué ventajas tienen los pellets?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="ventajasep" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_ventajasep">
                  <div class="panel-body">
                      <ul>
                        <li><?php echo $view['translator']->trans('Se utilizan residuos de otras actividades y esto favorece la canalización de los excedentes agrícolas.', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('El precio los pellets es estable y mucho más económico que el del combustible fósil', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('No presentan riesgo de explosión.', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('No son volátiles.', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('No producen olores.', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('No presentan tampoco ningún riesgo para la salud en caso de fuga o vertido.', array(), "faq")?></li>
                        <li><?php echo $view['translator']->trans('Para producir el mismo calor, el pellet almacenado ocupa unas tres veces menos en volumen que la leña.', array(), "faq")?></li>
                      </ul>
                  </div>
                </div>
              </div>
                
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ahorroep" aria-expanded="false" aria-controls="control_ahorroep">
                    <div class="panel-heading" role="tab" id="heading_ahorroep">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué ahorro económico tiene la calefacción con pellets?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="ahorroep" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_ahorroep">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Se estima que climatizar una vivienda o estancia mediante una estufa de pellet', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#duranteep" aria-expanded="false" aria-controls="control_duranteep">
                    <div class="panel-heading" role="tab" id="heading_duranteep">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Durante cuánto tiempo se pueden guardar los pellets?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="duranteep" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_duranteep">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Siempre que se guarden en un lugar seco, no tienen límite de tiempo de almacenamiento.', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#instalacionep" aria-expanded="false" aria-controls="control_instalacionep">
                    <div class="panel-heading" role="tab" id="heading_instalacionep">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué instalación requiere una estufa de pellets?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="instalacionep" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_instalacionep">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Una estufa de pellets sirve para calentar la estancia de la casa u oficina', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <!-- FIN TAB PELLETS -->
        </div>
    </div>
        <div class="tab-pane fade" id="aire">
            <!-- INICIO TAB DE A/A -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#frigoriasaa" aria-expanded="false" aria-controls="control_frigoriasaa">
                    <div class="panel-heading" role="tab" id="heading_frigoriasaa">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuántas frigorías se necesitan?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="frigoriasaa" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_frigoriasaa">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('En la práctica utilizaremos unas 100 frigorías por metro cuadrado', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#consomoaa" aria-expanded="false" aria-controls="control_consomoaa">
                    <div class="panel-heading" role="tab" id="heading_consomoaa">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuánto consume un aparato de Aire Acondicionado de electricidad?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="consomoaa" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_consomoaa">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Hay que mirar la potencia que consume el aparato', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Los modelos superinverter, consumen mucha menos energía cuando trabajan en frio', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bombacaloraa" aria-expanded="false" aria-controls="control_bombacaloraa">
                    <div class="panel-heading" role="tab" id="heading_bombacaloraa">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué es una bomba de calor?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="bombacaloraa" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_bombacaloraa">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('Una bomba de calor es un aire acondicionado puesto al revés.', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('Me explico: si te fijas en verano la unidad exterior', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('Pero como en la práctica no es viable el invertir físicamente', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('Una bomba de calor en invierno extrae el poco calor', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('Para ello se hace evaporar a la batería exterior a temperaturas muy bajas', array(), "faq")?></p>
                    <p><?php echo $view['translator']->trans('Es muy recomendable el comprar el climatizador con frío y calor', array(), "faq")?></p>
                  </div>
                </div>
              </div>
                
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#mantenimaa" aria-expanded="false" aria-controls="control_mantenimaa">
                    <div class="panel-heading" role="tab" id="heading_mantenimaa">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué mantenimiento necesita el aparato de aire acondicionado?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="mantenimaa" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_mantenimaa">
                  <div class="panel-body">
                      <p><?php echo $view['translator']->trans('Es muy simple, limpiar los filtros cada 2 meses con agua jabonosa.', array(), "faq")?></p>
                      <p><?php echo $view['translator']->trans('Es recomendable mirar que el desagüe no esté embozado y que desagüe bien la máquina', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <!-- FIN TAB A/A -->
        </div>
    </div>
</div>
