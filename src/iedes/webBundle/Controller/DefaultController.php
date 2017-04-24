<?php

namespace iedes\webBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use iedes\webBundle\Entity\CalculoOnline;
use iedes\webBundle\Entity\Direcciones;
use iedes\webBundle\Form\Type\CalculoOnlineCreateType;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use iedes\webBundle\Entity\Promotores;
use iedes\webBundle\Entity\Negocios;
use iedes\webBundle\Entity\Renovaciones;
use iedes\webBundle\Entity\TeLlamamos;
use iedes\webBundle\Entity\Trabaja;
use iedes\webBundle\Entity\Recomendaciones;
use iedes\webBundle\Utils\email;

class DefaultController extends Controller
{
    public function internationalizationAction($locale){
        //$locale = $request->getLocale();
        //$request->setLocale('en');       
        $this->get('session')->set('_locale', $locale);
        
        return $this->redirect($this->generateUrl('index'));
    }
    
    public function indexAction(Request $request){
        
        $request->setLocale($this->get('session')->get('_locale'));
        
        $em = $this->getDoctrine()->getManager();
        $datos = array();
        
        $defaultData = array();
        $form = null;

        $params['errors'] = false;
        
        if($request->getMethod() == 'POST'){ 
            
            //con el if determinamos si el fomulario que llega es uno u otro
            
            if (isset($_POST['formularioNewsletter'])) {
                $email = $request->request->get('newsletterEmail');
                
                 ///////         
                $datos['Email'] = $email;

                $paramsEmail['nombreformulario'] = 'SUSCRIPCIÓN A NEWSLETTER';
                $paramsEmail['subtitulo'] = 'Datos del cliente que ha realizado la suscripción';
                $paramsEmail['datos'] = $datos;

                $this->get("email_service")->sendmail( 
                      array('correoweb@iedes.com' => 'Servicio NEWSLETTER de iEdes'),
                      array("correoweb@iedes.com", "marketing@iedes.com"),
                      'Suscripción al servicio NEWSLETTER de iEdes',
                      $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                 //envio de mail al CLIENTE
                 $paramEmail['nombreformulario'] = 'NEWSLETTER';
                 $paramEmail['texto'] = 'Tu email ha sido incorporado a nuestra base de datos y empezarás a recibir mensajes de correo. <br/>Gracias.';
                 $this->get("email_service")->sendmail( 
                    array('correoweb@iedes.com' => 'Suscripción a Newsletter de iEdes'),
                    array($email),
                    'Respuesta a formulario enviado',
                    $this->renderView('iedeswebBundle:AutoEmails:autoEmail.html.php', $paramEmail));
                 ///////
            }
            
            else if (isset($_POST['formularioLellamamos'])) {
                $userTemp = new TeLlamamos();
                $telefono = $request->request->get('telefono_lellamamos');
                
                if(!$telefono || strlen($telefono) != 9 || intval(!$telefono)){
                    $params['errors'] = 'Introduce un teléfono correcto e inténtalo de nuevo';
                }
                else{
                    $datos['Teléfono'] = $telefono;
                    $userTemp->setTelefono1($telefono);
                    $userTemp->setFechaSolicitud($fechaNow = new \DateTime());

                    try{
                        $em->persist($userTemp);
                        $em->flush();
                        $params['formularioLellamamosEnviado'] = true;

                         ///////
                        //envio de mail a iEDES
                        $paramsEmail['nombreformulario'] = 'TE LLAMAMOS';
                        $paramsEmail['subtitulo'] = 'Datos del cliente que desea que le llamen:';
                        $paramsEmail['datos'] = $datos;
                         $this->get("email_service")->sendmail( 
                              array('correoweb@iedes.com' => 'Servicio TE LLAMAMOS de iEdes'),
                              array("correoweb@iedes.com","marketing@iedes.com", "jmarchena@iedes.com"),
                              'Solicitud de servicio TE LLAMAMOS de iEdes',
                              $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));
                         ///////

                    } catch (Exception $ex) {
                        $em->getConnection()->rollBack();
                        $em->close();
                        throw $ex;
                    }
                } 
            }
            
            else if (isset($_POST['formularioCalculo'])) {
                $userTemp = new CalculoOnline();              
                $tipoCliente = $request->request->get('tipo');
                
                if($tipoCliente === "vivienda"){
                    $cp = $request->request->get('datacp');
                    $tipoConstruccion = $request->request->get('vivienda');                    
                    $miembros = $request->request->get('miembros');
                    if($miembros === 'masigual4miembros'){
                        $miembros = '4 miembros o más';
                    }
                    else{
                        $miembros = 'menos de 4 miembros';
                    }
                    $calentamiento = $request->request->get('calefaccion'); 
                    if($calentamiento !== "electrico"){
                        $gasto_gas = $request->request->get('gas');
                        if($gasto_gas === 'bomb_masigua40'){
                            $gasto_gas = '40 euros o más';
                        }
                        else{
                            $gasto_gas = 'menos de 40 euros';
                        }
                        
                        $gasto_electricidad = $request->request->get('gas_electrico');
                        if($gasto_electricidad === 'elec_masigual40'){
                            $gasto_electricidad = '40 euros o más';
                        }
                        else{
                            $gasto_electricidad = 'menos de 40 euros';
                        }
                    }
                    else{
                        $gasto_electricidad = $request->request->get('electrico');
                        if($gasto_electricidad === 'elec_masigual60'){
                            $gasto_electricidad = '60 euros o más';
                        }
                        else{
                            $gasto_electricidad = 'menos de 60 euros';
                        }
                    }
                }
                else{
                    $cp = $request->request->get('neg_datacp');     
                    $tipoConstruccion = $request->request->get('negocio');         
                    $ubicacion = $request->request->get('neg_ubicacion');
                    $calentamiento = $request->request->get('neg_calefaccion');
                    
                    if($calentamiento !== "electrico"){
                        $gasto_gas = $request->request->get('neg_gas');
                        if($gasto_gas === 'gas_menosigual300'){
                            $gasto_gas = '300 euros o menos';
                        }
                        else if($gasto_gas === 'gas_entre300y700'){
                            $gasto_gas = 'entre 300 y 700 euros';
                        }
                        else{
                            $gasto_gas = '700 euros o más';
                        }
                    }
                    
                    $gasto_electricidad = $request->request->get('neg_elect');
                    if($gasto_electricidad === 'elect_menosigual300'){
                        $gasto_electricidad = '300 euros o menos';
                    }
                    else if($gasto_electricidad === 'elect_entre300y700'){
                        $gasto_electricidad = 'entre 300 y 700 euros';
                    }
                    else{
                        $gasto_electricidad = '700 euros o más';
                    }
                    $datos['Gasto eléctrico'] = $gasto_electricidad;
                }
                
                $nombre = $request->request->get('datanombre');
                $telefono = $request->request->get('datatelef');
                $datos['Teléfono'] = $telefono;
                
                $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$cp.',España'."&sensor=false";
 
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $details_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = json_decode(curl_exec($ch), true);

                // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
                if ($response['status'] !== 'OK') {
                    $params['errors'] = 'Algo ha fallado, inténtelo de nuevo';
                }
                
                $addresses = $response['results'][0]['address_components'];
                $locality = ""; $adminarea3 = ""; $adminarea2 = ""; 
                $adminarea1 = ""; $country = "";
                
                for($i=0; $i<count($addresses); $i++){
                    if($response['results'][0]['address_components'][$i]['types'][0] === "locality"){
                        $locality = $response['results'][0]['address_components'][$i]['long_name'];
                    }    
                    else if($response['results'][0]['address_components'][$i]['types'][0] === "administrative_area_level_2"){
                        $adminarea2 = $response['results'][0]['address_components'][$i]['long_name'];
                    }  
                    else if($response['results'][0]['address_components'][$i]['types'][0] === "administrative_area_level_1"){
                        $adminarea1 = $response['results'][0]['address_components'][$i]['long_name'];
                    }  
                    else if($response['results'][0]['address_components'][$i]['types'][0] === "country"){
                        $country = $response['results'][0]['address_components'][$i]['long_name'];
                    }  
                }
                
                //guardamos los datos
                $userTemp->setNombre($nombre);
                $userTemp->setTelefono1($telefono);
                $userTemp->setTipoCliente($tipoCliente);
                $userTemp->setTipoConstruccion($tipoConstruccion);
                if(isset($miembros)){
                    $userTemp->setMiembros($miembros);
                }
                if($tipoCliente === "negocio" && isset($tipoConstruccion)){
                    $userTemp->setUbicacionNegocio($ubicacion);
                }
                $userTemp->setSistemaCalentamiento($calentamiento);
                $userTemp->setGastoGas($gasto_gas);
                $userTemp->setGastoElectricidad($gasto_electricidad);
                $userTemp->setFechaSolicitud($fechaNow = new \DateTime());
                
                $direccion = new Direcciones();
                $direccion->setPostalCode($cp);
                $direccion->setLocality($locality);
                $direccion->setAdminarea3($adminarea3);
                $direccion->setAdminarea2($adminarea2);
                $direccion->setAdminarea1($adminarea1);
                $direccion->setCountry($country);
                
                $userTemp->setDireccion($direccion);

                try{
                    $em->persist($userTemp);
                    $em->flush();
                    $params['formularioCalculoPrecioEnviado'] = true;
               
                     ///////
                    
                    $paramsEmail['nombreformulario'] = 'CÁLCULO ONLINE'; 
                    $paramsEmail['subtitulo'] = 'Datos del cliente que ha realizado el cálculo:';
                    $datos['Dirección'] = $direccion;
                    if($tipoCliente === "vivienda"){
                        $datos['Tipo de cliente'] = $tipoCliente;
                        $datos['Tipo de vivienda'] = $tipoConstruccion;
                        $datos['Miembros de la unidad familiar'] = $miembros;
                        $datos['Sistema de calentamiento empleado'] = $calentamiento;
                        if($calentamiento !== "electrico"){
                            $datos['Gasto de gas'] = $gasto_gas;
                        }
                        $datos['Gasto eléctrico'] = $gasto_electricidad;
                    }
                    else{
                        $datos['Tipo de negocio'] = $tipoConstruccion;
                        $datos['Ubicación del negocio'] = $ubicacion;
                        $datos['Sistema de calentamiento'] = $calentamiento;
                        if($calentamiento !== "electrico"){
                            $datos['Gasto de gas'] = $gasto_gas;
                        }
                        $datos['Gasto eléctrico'] = $gasto_electricidad;
                    }
                    
                    $paramsEmail['datos'] = $datos;
                    
                    $this->get("email_service")->sendmail( 
                          array("correoweb@iedes.com" => "Servicio CALCULO ONLINE de iEdes"),
                          array("correoweb@iedes.com","marketing@iedes.com", "jmarchena@iedes.com"),
                          "Solicitud de servicio CALCULO ONLINE de iEdes",
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));
                     ///////
                
                } catch (Exception $ex) {
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $ex;
                } 
                                            
            }
            
            else if (isset($_POST['formularioPromotores'])) {
                $nombre = $request->request->get('promotorNombre');
                $apellidos = $request->request->get('promotorApellidos');
                $telefono = $request->request->get('promotorTelefono');
                $email = $request->request->get('promotorEmail');
                $comentarios = $request->request->get('promotorComentarios');
                
                $route = $request->request->get('promotorroute');
                $locality = $request->request->get('promotorlocality');
                $pc = $request->request->get('promotorpostal_code');
                $aa3 = $request->request->get('promotoradministrative_area_level_3');
                $aa2 = $request->request->get('promotoradministrative_area_level_2');
                $aa1 = $request->request->get('promotoradministrative_area_level_1');
                $country = $request->request->get('promotorcountry');
                
                $direccion = new Direcciones();
                $direccion->setAdminarea1($aa1);
                $direccion->setAdminarea2($aa2);
                $direccion->setAdminarea3($aa3);
                $direccion->setCountry($country);
                $direccion->setLocality($locality);
                $direccion->setPostalCode($pc);
                $direccion->setRoute($route);
                
                $user = new Promotores();
                $user->setApellidos($apellidos);
                $user->setComentarios($comentarios);
                $user->setDireccion($direccion);
                $user->setNombre($nombre);
                $user->setTelefono1($telefono);
                $user->setEmail($email);
                
                $user->setFechaSolicitud($fechaNow = new \DateTime());

                try{
                    $em->persist($direccion);
                    $em->persist($user);
                    $em->flush();
                    $params['formularioLellamamosEnviado'] = true;
 
                     ///////
                    
                    $datos['Nombre completo'] = $nombre . " " . $apellidos;
                    $datos['Dirección'] = $direccion;
                    $datos['Teléfono'] = $telefono;
                    $datos['Email'] = $email;
                    $datos['Comentarios'] = $comentarios;
                    
                    $paramsEmail['nombreformulario'] = 'SERVICIO PARA PROMOTORES';
                    $paramsEmail['subtitulo'] = 'Datos del cliente que ha realizado el formulario';
                    $paramsEmail['datos'] = $datos;
                    
                    $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Servicio PROMOTORES de iEdes'),
                          array("correoweb@iedes.com","atroya@iedes.com"),
                          'Solicitud de servicio PROMOTORES de iEdes',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));
                     
                     //envio de mail al CLIENTE
                     $paramEmail['nombreformulario'] = 'PROMOTORES Y CONSTRUCTORES';
                     $paramEmail['texto'] = 'En breve, nos pondremos en contacto contigo para atender tu consulta. <br/>Gracias.';
                     $this->get("email_service")->sendmail( 
                        array('correoweb@iedes.com' => 'Servicio PROMOTORES de iEdes'),
                        array($email),
                        'Respuesta a formulario enviado',
                        $this->renderView('iedeswebBundle:AutoEmails:autoEmail.html.php', $paramEmail));
                     
                     ///////

                } catch (Exception $ex) {
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $ex;
                }
            }
            
            else if (isset($_POST['formularioNegocios'])) {
                $nombre = $request->request->get('negocioNombre');
                $apellidos = $request->request->get('negocioApellidos');   
                $telefono = $request->request->get('negocioTelefono');
                $email = $request->request->get('negocioEmail');
                $comentarios = $request->request->get('negocioComentarios');
                
                $route = $request->request->get('negocioroute');
                $locality = $request->request->get('negociolocality');
                $pc = $request->request->get('negociopostal_code');
                $aa3 = $request->request->get('negocioadministrative_area_level_3');
                $aa2 = $request->request->get('negocioadministrative_area_level_2');
                $aa1 = $request->request->get('negocioadministrative_area_level_1');
                $country = $request->request->get('negociocountry');
                
                $direccion = new Direcciones();
                $direccion->setAdminarea1($aa1);
                $direccion->setAdminarea2($aa2);
                $direccion->setAdminarea3($aa3);
                $direccion->setCountry($country);
                $direccion->setLocality($locality);
                $direccion->setPostalCode($pc);
                $direccion->setRoute($route);
                
                $user = new Negocios();
                $user->setApellidos($apellidos);
                $user->setComentarios($comentarios);
                $user->setDireccion($direccion);
                $user->setNombre($nombre);
                $user->setTelefono1($telefono);
                $user->setEmail($email);
                

                $user->setFechaSolicitud($fechaNow = new \DateTime());

                try{
                    $em->persist($direccion);
                    $em->persist($user);
                    $em->flush();
                    $params['formularioLellamamosEnviado'] = true;

                     ///////
                    $datos['Nombre completo'] = $nombre . " " . $apellidos;
                    $datos['Dirección'] = $direccion;
                    $datos['Teléfono'] = $telefono;
                    $datos['Email'] = $email;
                    $datos['Comentarios'] = $comentarios;
                    
                    $paramsEmail['nombreformulario'] = 'SERVICIO PARA NEGOCIOS';
                    $paramsEmail['subtitulo'] = 'Datos del cliente que ha realizado el formulario';
                    $paramsEmail['datos'] = $datos;
                    
                     $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Servicio NEGOCIOS de iEdes'),
                          array("correoweb@iedes.com","marketing@iedes.com", "jmarchena@iedes.com"),
                          'Solicitud de servicio NEGOCIOS de iEdes',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));
                     
                     //envio de mail al CLIENTE
                     $paramEmail['nombreformulario'] = 'NEGOCIOS';
                     $paramEmail['texto'] = 'En breve, nos pondremos en contacto contigo para atender tu consulta. <br/>Gracias.';
                     $this->get("email_service")->sendmail( 
                        array('correoweb@iedes.com' => 'Servicio NEGOCIOS de iEdes'),
                        array($email),
                        'Respuesta a formulario enviado',
                        $this->renderView('iedeswebBundle:AutoEmails:autoEmail.html.php', $paramEmail));
                     
                     ///////

                } catch (Exception $ex) {
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $ex;
                }     
            }
            
            else if (isset($_POST['formularioRenovaciones'])) {
                $nombre = $request->request->get('renovacionNombre');
                $apellidos = $request->request->get('renovacionApellidos');
                $telefono = $request->request->get('renovacionTelefono');
                $email = $request->request->get('renovacionEmail');
                $anio = $request->request->get('renovacionAnio');
                $equipo = $request->request->get('renovacionEquipo');
                
                $route = $request->request->get('renovacionroute');
                $locality = $request->request->get('renovacionlocality');
                $pc = $request->request->get('renovacionpostal_code');
                $aa3 = $request->request->get('renovacionadministrative_area_level_3');
                $aa2 = $request->request->get('renovacionadministrative_area_level_2');
                $aa1 = $request->request->get('renovacionadministrative_area_level_1');
                $country = $request->request->get('renovacioncountry');
                
                $direccion = new Direcciones();
                $direccion->setAdminarea1($aa1);
                $direccion->setAdminarea2($aa2);
                $direccion->setAdminarea3($aa3);
                $direccion->setCountry($country);
                $direccion->setLocality($locality);
                $direccion->setPostalCode($pc);
                $direccion->setRoute($route);
                
                $user = new Renovaciones();
                $user->setApellidos($apellidos);
                $user->setAnio($anio);
                $user->setEquipo($equipo);
                $user->setDireccion($direccion);
                $user->setNombre($nombre);
                $user->setTelefono1($telefono);
                $user->setEmail($email);
                

                $user->setFechaSolicitud($fechaNow = new \DateTime());

                try{
                    $em->persist($direccion);
                    $em->persist($user);
                    $em->flush();
                    $params['formularioLellamamosEnviado'] = true;

                     ///////
                    $datos['Nombre completo'] = $nombre . " " . $apellidos;
                    $datos['Dirección'] = $direccion;
                    $datos['Teléfono'] = $telefono;
                    $datos['Email'] = $email;
                    $datos['Equipo anterior'] = $equipo;
                    $datos['Año de montaje'] = $anio;
                    
                    $paramsEmail['nombreformulario'] = 'SERVICIO PARA RENOVACIONES';
                    $paramsEmail['subtitulo'] = 'Datos del cliente que ha realizado el formulario';
                    $paramsEmail['datos'] = $datos;
                    
                    $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Servicio RENOVACIONES de iEdes'),
                          array("correoweb@iedes.com","marketing@iedes.com", "jmarchena@iedes.com"),
                          'Solicitud de servicio RENOVACIONES de iEdes',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));
                     
                     //envio de mail al CLIENTE
                     $paramEmail['nombreformulario'] = 'PLAN RENOVE';
                     $paramEmail['texto'] = 'En breve, nos pondremos en contacto contigo para atender tu consulta. <br/>Gracias.';
                     $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Servicio RENOVACIONES de iEdes'),
                          array($email),
                          'Respuesta a formulario enviado',
                          $this->renderView('iedeswebBundle:AutoEmails:autoEmail.html.php', $paramEmail));
                     
                     ///////

                } catch (Exception $ex) {
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $ex;
                }     
            }
            
            else if (isset($_POST['formularioTrabaja'])) {
                $nombre = $request->request->get('trabajaNombre');
                $apellidos = $request->request->get('trabajaApellidos');
                $telefono = $request->request->get('trabajaTelefono');
                $email = $request->request->get('trabajaEmail');
                $comentarios = $request->request->get('trabajaComentarios');
                
                $route = $request->request->get('trabajaroute');
                $locality = $request->request->get('trabajalocality');
                $pc = $request->request->get('trabajapostal_code');
                $aa3 = $request->request->get('trabajaadministrative_area_level_3');
                $aa2 = $request->request->get('trabajaadministrative_area_level_2');
                $aa1 = $request->request->get('trabajaadministrative_area_level_1');
                $country = $request->request->get('trabajacountry');
                
                $cv = $request->files->get('trabajaCV');
               
                $direccion = new Direcciones();
                $direccion->setAdminarea1($aa1);
                $direccion->setAdminarea2($aa2);
                $direccion->setAdminarea3($aa3);
                $direccion->setCountry($country);
                $direccion->setLocality($locality);
                $direccion->setPostalCode($pc);
                $direccion->setRoute($route);
                
                $user = new Trabaja();
                $user->setApellidos($apellidos);
                $user->setComentarios($comentarios);
                $user->setDireccion($direccion);
                $user->setNombre($nombre);
                $user->setTelefono1($telefono);
                $user->setEmail($email);
                if($cv) { 
                    //establecemos el nombre de la nueva foto que guardaremos luego
                    $ext = explode('.', $cv->getClientOriginalName());
                    $ext = $ext[1];
                    $filename = sha1(uniqid(mt_rand(), true));
                    $filename = $filename.'.'.$ext;
                    $user->setCV($filename);
                }
                

                $user->setFechaSolicitud($fechaNow = new \DateTime());

                try{
                    $em->persist($direccion);
                    $em->persist($user);
                    $em->flush();
                    
                    //copiamos el cv del origen al destino
                    if($cv){
                    
                        $params['formularioLellamamosEnviado'] = true;
                        $dir = $this->get('kernel')->getRootDir().'/../web/curriculos';
                        $dir = realpath($dir);
                        $cv->move($dir, $filename); 
                        
                        ///////
                        $datos['Nombre completo'] = $nombre . " " . $apellidos;
                        $datos['Dirección'] = $direccion;
                        $datos['Teléfono'] = $telefono;
                        $datos['Email'] = $email;
                        $datos['Carta de presentación'] = $comentarios;
                        
                        $paramsEmail['nombreformulario'] = 'SERVICIO TRABAJA CON NOSOTROS';
                        $paramsEmail['subtitulo'] = 'Datos del cliente que ha realizado el formulario';
                        $paramsEmail['datos'] = $datos;
                    
                        $this->get("email_service")->sendmail( 
                             array('correoweb@iedes.com' => 'Servicio TRABAJA CON NOSOTROS de iEdes'),
                             array("correoweb@iedes.com","marketing@iedes.com", "curriculums@iedes.com"),
                             'Solicitud de servicio TRABAJA CON NOSTROS de iEdes',
                             $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail),
                             $dir.'/'.$filename);
                        
                        //envio de mail al CLIENTE
                         $paramEmail['nombreformulario'] = 'TRABAJA CON NOSOTROS';
                         $paramEmail['texto'] = 'Estudiaremos convenientemente su perfil profesional. <br/>Gracias por el interés mostrado en nuestra empresa.';
                         $this->get("email_service")->sendmail( 
                            array('correoweb@iedes.com' => 'Servicio TRABAJA CON NOSOTROS de iEdes'),
                            array($email),
                            'Respuesta a formulario enviado', 
                         $this->renderView('iedeswebBundle:AutoEmails:autoEmail.html.php', $paramEmail));
                        ///////
                        
                        
                    }

                } catch (Exception $ex) {
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $ex;
                }     
            }
            
            else if (isset($_POST['formularioRecomendacion'])) {
                $dni = $request->request->get('recomendacionDNI');
                $nombre = $request->request->get('recomendacionNombre');
                $apellidos = $request->request->get('recomendacionApellidos');
                $telefono = $request->request->get('recomendacionTelefono');
                $email = $request->request->get('recomendacionEmail');
                $nombreComercial = $request->request->get('recomendacionNombreComercial');
                
                $user = new Recomendaciones();
                $user->setDniCliente($dni);
                $user->setNombreRecomendado($nombre);
                $user->setApellidosRecomendado($apellidos);
                $user->setTelefonoRecomendado($telefono);
                $user->setEmailRecomendado($email);
                $user->setNombreComercial($nombreComercial);

                $user->setFechaSolicitud($fechaNow = new \DateTime());

                try{
                    $em->persist($user);
                    $em->flush();
                    $params['formularioLellamamosEnviado'] = true;
 
                     ///////
                    $datos['Cliente de iEDES'] = $dni;
                    $datos['Email de cliente iEDES'] = $email;
                    $datos['Nombre de comercial iEDES'] = $nombreComercial;
                    $datos['Nombre del recomendado'] = $nombre . " " . $apellidos;
                    $datos['Teléfono del recomendado'] = $telefono;
                    
                    $paramsEmail['nombreformulario'] = 'RECOMENDACIÓN DE CLIENTE';
                    $paramsEmail['subtitulo'] = 'Datos del cliente que ha realizado el formulario';
                    $paramsEmail['datos'] = $datos;
                    
                     $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Servicio RECOMENDACIÓN DE CLIENTE de iEdes'),
                          array("correoweb@iedes.com","marketing@iedes.com", "jmarchena@iedes.com"),
                         'Solicitud de servicio RECOMENDACIÓN de iEdes',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));
                                         
                     //envio de mail al CLIENTE
                         $paramEmail['nombreformulario'] = 'RECOMIENDA iEDES Y GANA 50 EUROS DE REGALO';
                         $paramEmail['texto'] = 'En breve, nos pondremos en contacto con la persona que ha recomendado. <br/>Una vez que comprobemos que se cumplen las condiciones de la promoción, nos pondremos en contacto contigo para enviarte la Tarjeta Regalo de 50 Euros.<br/>Gracias.';
                         $this->get("email_service")->sendmail( 
                            array('correoweb@iedes.com' => 'Servicio RECOMENDACIÓN DE CLIENTE de iEdes'),
                            array($email),
                            'Respuesta a formulario enviado',
                            $this->renderView('iedeswebBundle:AutoEmails:autoEmail.html.php', $paramEmail));
                     ///////

                } catch (Exception $ex) {
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $ex;
                }     
            }
            
            else{ //formulario no valido
                $params['errors'] = 'Algo ha fallado, inténtelo de nuevo';
            }
        }
        
        return $this->render('iedeswebBundle:Default:index.html.php', $params);
    }
    
    /*public function indexAnclaAction($anchor){
        return $this->redirect($this->generateUrl('index') . '#' . $anchor);
    }*/
    
    public function calculaOnlineAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:calcula_online.html.php');
    }
    
    public function esTermicaAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:es_termica.html.php');
    }
    
    public function esFotovoltaicaAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:es_fotovoltaica.html.php');
    }
    
    public function psTermicaAction()
    {
        return $this->render('iedeswebBundle:Default:producto_solar_termica.html.php');
    }
    
    public function energiaSolarAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:energia_solar.html.php');
    }
    
    public function osmosisAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:osmosis.html.php');
    }
    
    public function descalcificadoresAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:descalcificadores.html.php');
    }
    
    public function cloradorAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:clorador_salino.html.php');
    }
    
    public function aireAcondicionadoAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:aire_acondicionado.html.php');
    }
    
    public function aerotermiaAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:aerotermia.html.php');
    }
    
    public function calderasAction()
    {
        return $this->render('iedeswebBundle:Default:calderas.html.php');
    }
    
    public function estufasAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:estufas.html.php');
    }
    
    public function delegacionesAction(){
        
        $em = $this->getDoctrine()->getManager();
        $param['sedes'] = $em->getRepository('iedeswebBundle:Sedes')->findBy(array(), array('nombre' => 'ASC'));
        
        $param['mapa'] = $this->render('iedeswebBundle:Default:map.html.php', array(
            'sedes' => $param['sedes']
        ));

        return $this->render('iedeswebBundle:Default:delegaciones.html.php', $param);
    }
    
    public function delegacionesXAction($delegacion){
        
        $em = $this->getDoctrine()->getManager();
        $param['sedes'] = $em->getRepository('iedeswebBundle:Sedes')->findBy(array(), array('nombre' => 'ASC'));
        $param['sede'] = $em->getRepository('iedeswebBundle:Sedes')->findByNombre($delegacion);
        
        $param['mapa'] = $this->render('iedeswebBundle:Default:map.html.php', array(
            'sedes' => $param['sede']
        ));
        
        return $this->render('iedeswebBundle:Default:delegaciones.html.php', $param);
    }
    
    public function consejosAction(){
       
        //opcion A -> Carga directa del pdf en el navegador
        //$params['pdf'] = new BinaryFileResponse("pdf/guia_de_uso.pdf");
        //return $params['pdf'];
        
        //opcion B -> Procesado de pdf
        $params['pdf'] = "pdf/guia_de_uso.pdf";
        return $this->render('iedeswebBundle:Default:consejos.html.php', $params);
    } 
    
    public function historiaAction(Request $request){
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:historia.html.php');
    }
    
    public function grupoIedesAction(Request $request){
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:grupo_iedes.html.php');
    }
    
    public function premiosAction(Request $request){

        $request->setLocale($this->get('session')->get('_locale'));

        return $this->render('iedeswebBundle:Default:premios.html.php');
    }
    
    public function sitemapAction() 
    {
        return $this->render('iedeswebBundle:Sitemap:sitemap.xml');
    }
     
    public function faqAction(Request $request){

        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:faq.html.php');
    }
 
    public function lellamamosAction(Request $request){

        $userTemp = new CalculoOnline();
        
        $form = $this->createForm(new CalculoOnlineCreateType(), $userTemp);
        
        $params['formularioLellamamosEnviado'] = false;
        $params['errors'] = false;
        
        if($request->getMethod() == 'POST'){
            $form->handleRequest($request);
            
            if($form->isValid()){
                
                $em = $this->getDoctrine()->getManager();
                
                if(!$form->get('locality')->getData()){
                    ;
                }
                else{
                    $direccion = new Direcciones();

                    $direccion->setRoute($form->get('route')->getData());
                    $direccion->setStreetNumber($form->get('streetNumber')->getData());
                    $direccion->setPostalCode($form->get('postalCode')->getData());
                    $direccion->setLocality($form->get('locality')->getData());
                    $direccion->setAdminarea3($form->get('adminArea3')->getData());
                    $direccion->setAdminarea2($form->get('adminArea2')->getData());
                    $direccion->setAdminarea1($form->get('adminArea1')->getData());
                    $direccion->setCountry($form->get('country')->getData());

                    $userTemp->setDireccion($direccion);

                    $userTemp->setFechaSolicitud($fechaNow = new \DateTime());

                    try{
                        $em->persist($direccion);
                        $em->persist($userTemp);
                        $em->flush();
                        $params['formularioEnviado'] = true;
                        
                         ///////
                         $this->get("email_service")->sendmail( 
                              array('correoweb@iedes.com' => 'Servicio TE LLAMAMOS de iEdes'),
                              array("correoweb@iedes.com","marketing@iedes.com", "jmarchena@iedes.com"),
                              'Solicitud de servicio TE LLAMAMOS de iEdes', 
                              strtoupper($userTemp->getNombre()) . ' de ' . $userTemp->getDireccion()->getLocality() . 
                              ' desea que le llamen al ' . $userTemp->getTelefono1());
                         ///////
                        
                    } catch (Exception $ex) {
                        $em->getConnection()->rollBack();
                        $em->close();
                        throw $e;
                    }
                }
            }
            else{ //formulario no valido
                $params['errors'] = 'Algo ha fallado, inténtelo de nuevo';
            }
        }
        
        $params['form'] = $form->createView();
        $params['userTemp'] = $userTemp;
        
        return $this->render('iedeswebBundle:Default:lellamamos.html.php', $params);
    }
    
    public function error404Action()
    {
        return $this->render('iedeswebBundle:Default:error404.html.php');
    }
    
    public function intranetAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      
        $params['usuarios'] = $em->getRepository('iedeswebBundle:Usuarios')->findAll();
        $params['rol'] = $usuarioLogueado->getRol(); 
        $params['nicklogeado'] = $usuarioLogueado->getNick();
        $params['idlogeado'] = $usuarioLogueado->getId();
        
        $params['vendidas'] =       $em->getRepository("iedeswebBundle:Visitas")->findByResultadovisitas(5);
        $params['presupuestadas'] = $em->getRepository("iedeswebBundle:Visitas")->findByResultadovisitas(4);
        
        $rol = $usuarioLogueado->getRol();
        $params['visitasCalendario'] = null;
        
        if($rol == 1 || $rol == 50 || $rol == 100){
            $queryVisitas = $em->createQuery(
                'SELECT v '
                . 'FROM iedeswebBundle:Visitas v '
                . 'WHERE ' 
                . 'v.contacto = 0 AND v.activo = 1 AND v.fechaVisita is not null '
                . 'order by v.fechaVisita desc');

            $params['visitasCalendario'] = $queryVisitas->getResult();
        }
        else if($rol == 20){
            $queryVisitas = $em->createQuery(
                'SELECT v '
                . 'FROM iedeswebBundle:Visitas v '
                . 'WHERE v.jefeequipo = ' . $usuarioLogueado->getId() . ' AND '
                . 'v.comercial is not null AND '
                . 'v.contacto = 0 AND v.activo = 1 AND v.fechaVisita is not null '
                . 'order by v.comercial, v.fechaVisita desc');

            $params['visitasCalendario'] = $queryVisitas->getResult();
        }
        else{ 
            $queryVisitas = $em->createQuery(
                'SELECT v '
                . 'FROM iedeswebBundle:Visitas v '
                . 'WHERE (v.creador = ' . $usuarioLogueado->getId() . ' OR '
                . 'v.rescatador = ' . $usuarioLogueado->getId() . ' OR '
                . 'v.jefeequipo = ' . $usuarioLogueado->getId() . ' OR ' 
                . 'v.comercial = ' . $usuarioLogueado->getId() . ') AND ' 
                . 'v.contacto = 0 AND v.activo = 1 AND v.fechaVisita is not null '
                . 'order by v.fechaVisita desc');

            $params['visitasCalendario'] = $queryVisitas->getResult();
        }

        return $this->render('iedeswebBundle:Default:intranet.html.php', $params);
    }
    
    public function aqualiderAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:aqualider.html.php');
    }
    
    public function aqualider_nosotrosAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:aqualider_nosotros.html.php');
    }
    
    public function aqualider_porqueAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:aqualider_porque.html.php');
    }
    
    public function aqualider_productosAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:aqualider_productos.html.php');
    }
    
    public function aqualider_contactoAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:aqualider_contacto.html.php');
    }
    
    public function aqualider_faqAction(Request $request)
    {
        $request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Default:aqualider_faq.html.php');
    }
    
    public function aqualider_internationalizationAction($locale){
        //$locale = $request->getLocale();
        //$request->setLocale('en');       
        $this->get('session')->set('_locale', $locale);
        
        return $this->redirect($this->generateUrl('aqualider'));
    }
}


