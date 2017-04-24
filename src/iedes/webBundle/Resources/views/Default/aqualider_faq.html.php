<?php $view->extend('::base_aqualider.html.php');?>
<section class="main-section" id="faq"><!--main-section team-start-->
<div class="container faqs">

    <h2><?php echo $view['translator']->trans('Preguntas frecuentes', array(), "faq")?></h2>
    <h6><?php echo $view['translator']->trans('¿Necesitas información extra?', array(), "faq")?></h6>
    
    <div>
        <ul class="nav nav-tabs">
            <li><a href="#cloradorsalino" data-toggle="tab"><?php echo $view['translator']->trans('Cloradores Salinos', array(), "faq")?></a></li>
            <li><a href="#descalcificador" data-toggle="tab"><?php echo $view['translator']->trans('Descalcificadores', array(), "faq")?></a></li>
            <li class="active"><a href="#aerotermia" data-toggle="tab"><?php echo $view['translator']->trans('Aerotermias', array(), "faq")?></a></li>
            <li><a href="#osmosis" data-toggle="tab"><?php echo $view['translator']->trans('Ósmosis', array(), "faq")?></a></li>
        </ul>
    </div>
    
    <div class="tab-content">
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
                      <p><?php echo $view['translator']->trans('Gracias a aqualider electrolisis salina conseguimos una desinfección', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#validapiscinascs" aria-expanded="false" aria-controls="control_validapiscinascs">
                    <div class="panel-heading" role="tab" id="heading_validapiscinascs">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Es válida la electrólisis aqualider para cualquier tipo de piscinas?', array(), "faq")?>
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
                            <?php echo $view['translator']->trans('¿Cuál es el coste de implantar este sistema de electrólisis aqualider?', array(), "faq")?>
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
                            <?php echo $view['translator']->trans('¿Es fácil instalar este sistema de electrólisis aqualider? ¿Implica mucha obra?', array(), "faq")?>
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
                    <p><?php echo $view['translator']->trans('La tecnología de este sistema de electrólisis aqualider está adaptada para que por sí sola', array(), "faq")?></p>
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
                            <?php echo $view['translator']->trans('¿Afecta el clorador aqualider a los insectos?', array(), "faq")?>
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
                    <p><?php echo $view['translator']->trans('El descalcificador aqualider es volumétrico', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#beneficiosd" aria-expanded="false" aria-controls="control_beneficiosd">
                    <div class="panel-heading" role="tab" id="heading_beneficiosd">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Cuáles son los beneficios de al instalar un descalcificador aqualider?', array(), "faq")?>
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
                            <?php echo $view['translator']->trans('¿En que puedo ahorrar si instalo un descalcificador aqualider?', array(), "faq")?>
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
                            <?php echo $view['translator']->trans('¿Cómo afecta en la salud instalar un descalcificador aqualider?', array(), "faq")?>
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
                            <?php echo $view['translator']->trans('¿El agua que sale por el descalcificador aqualider es agua salada?', array(), "faq")?>
                        </h4>
                        <span class="glyphicon glyphicon-chevron-down hidden-xs"></span>
                    </div>
                </a>
                <div id="aguasaladad" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_aguasaladad">
                  <div class="panel-body">
                    <p><?php echo $view['translator']->trans('No. El agua que sale del descalcificador aqualider no es salada', array(), "faq")?></p>
                  </div>
                </div>
              </div>

              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#puedebeberd" aria-expanded="false" aria-controls="control_puedebeberd">
                    <div class="panel-heading" role="tab" id="heading_puedebeberd">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Se puede beber el agua que sale del descalcificador aqualider?', array(), "faq")?>
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
                            <?php echo $view['translator']->trans('¿Qué precio tiene un descalcificador aqualider?', array(), "faq")?>
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
        <div class="tab-pane fade in active" id="aerotermia">
            <!-- INICIO TAB DE AEROTERMIAS -->
            <div class="panel-group accordion-caret" id="accordion" role="tablist" aria-multiselectable="true">
              
              <div class="panel">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#queesaero" aria-expanded="false" aria-controls="control_queesaero">
                    <div class="panel-heading" role="tab" id="heading_queesaero">
                        <h4 class="panel-title">     
                            <?php echo $view['translator']->trans('¿Qué es el sistema de Aerotermia de Aqualider?', array(), "faq")?>
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
                            <?php echo $view['translator']->trans('¿Cuál es la evolución del sistema aqualider airsistem?', array(), "faq")?>
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
                            <?php echo $view['translator']->trans('¿Es fácil la instalación de un sistema aqualider airsistem?', array(), "faq")?>
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
</div>
</section>
