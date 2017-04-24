<?php

namespace iedes\webBundle\Controller;

use iedes\webBundle\Entity\Usuarios;
use iedes\webBundle\Entity\Visitas;
use iedes\webBundle\Entity\Direcciones;
use iedes\webBundle\Entity\ResultadoVisitas;
use iedes\webBundle\Entity\VisitasAntesRescate;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
//use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler;


class UsuarioController extends Controller {
    
   public function directoA($visita){
        
        $creador = $visita->getCreador();
        if($creador->getPasoDirecto()){
            //si el paso directo es un comercial...
            if($creador->getPasoDirecto()->getRol() == 2){
                $visita->setComercial($creador->getPasoDirecto());
                return "comercial";
            }
            //si el paso directo es un jefe de equipo...
            else if($creador->getPasoDirecto()->getRol() == 20){
                $visita->setJefeEquipo($creador->getPasoDirecto());
                return "jefe";
            }
        }
        return false;
   }  
  
   public function toMail($visita, $em, $avisoacreador=true){
       
        $to = null;
       
        //correo a jefe de equipo asignado
        if($visita->getJefeequipo()){
            $to[] = $visita->getJefeequipo()->getEmail();
        }
        //correo a comercial asignado
        if($visita->getComercial()){
            $to[] = $visita->getComercial()->getEmail();
        }

        //si no hay ni jefe ni comercial, se envia al controller
        if(!$visita->getJefeequipo() && !$visita->getComercial() && $visita->getContacto() == 0){
            //envio a controller y administrador
            $query = $em->createQuery(
                'SELECT u.email
                FROM iedeswebBundle:Usuarios u
                WHERE u.rol = 50 or u.rol = 100');

            $emails = $query->getResult();
            $to = null;
            foreach($emails as $e) {
                $to[] = $e['email'];
            } 
        }

        //si el canal es tmk, envio a mail de coordinador de telemarketing
        //if($visita->getCanal()->getId() === '5'){
        //    $ct = $em->getRepository("iedeswebBundle:Usuarios")->findBy(
        //        array('rol' => 21, 'activo' => true));
        //    foreach($ct as $c) {
        //        $to[] = $c->getEmail();
        //    } 
        //}

        //y envio de mail al creador
        if ($avisoacreador){
            $to[] = $visita->getCreador()->getEmail();
        }
        
        return $to;
   }
   
   public function datosEmail($visita){
        $datos['ID'] = $visita->getId();
        if($visita->getFechaVisita()){
            $fecha = $visita->getFechaVisita(); 
            $datos['Datos de la visita'] = $fecha->format('d-m-Y H:i:s');
        }
        else {
            $datos['Datos de la visita'] = "Sin fecha asignada";
        }
        $datos['Cliente'] = $visita->getNombreCompleto();
        $datos['Dirección'] = $visita->getDireccion();
        $datos['Teléfono1'] = $visita->getTelefono1();
        $datos['Teléfono2'] = $visita->getTelefono2();                                      
        $datos['Notas'] = $visita->getNotas();
        $datos['Creador'] = $visita->getCreador()->getNombreCompleto();
        
        return $datos;
    }
   
   public function registrarUsuarioAction(Request $request){
        
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      $params['delegaciones'] = $em->getRepository("iedeswebBundle:Sedes")->findByHaycomerciales(true);
      
      $rol = $usuarioLogueado->getRol(); 
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['idlogeado'] = $usuarioLogueado->getId();
      $params['rol'] = $rol;
      $params['errors'] = null; 
            
      if($rol != 20 && $rol != 50 && $rol != 100){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para acceder a la vista de registro de usuarios";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      $usuario = new Usuarios();
      $params['errors'] = null; 

      if($request->getMethod() == 'POST'){
            
            if (isset($_POST['formRegistro' ])) {

                $em = $this->getDoctrine()->getManager();
                
                $usuario = new Usuarios();
                $mail = $request->request->get('email');
                $usuario->setEmail($mail);
                $nick = substr($mail, 0, strpos($mail, "@"));
                
                $usuario->setNick($nick);
                $password = $this->generatePassword(6);
                $usuario->setPassword($password);
                
                $usuario->setFoto($request->request->get('fileFoto'));
                $usuario->setNombre($request->request->get('nombre'));
                $usuario->setApellido1($request->request->get('apellido1'));  
                $usuario->setApellido2($request->request->get('apellido2')); 
                $usuario->setTelefono1($request->request->get('telefono1'));
                $usuario->setTelefono2($request->request->get('telefono2')); 
                
                $rol = $request->request->get('rol');
                if($rol !== 'def'){
                    $usuario->setRol($rol);
                }
                else{
                    $errors[] = "Introduzca un rol válido";
                    $params['errors'] = $errors;
                    return $this->render('iedeswebBundle:Usuarios:register.html.php', $params);
                }
                
                //validaciones
                $params['errors'] = $this->validationRegister($em, $usuario);
                
                if($params['errors']){
                    return $this->render('iedeswebBundle:Usuarios:register.html.php', $params);
                }
                
                $delegacionid = $request->request->get('delegacion');
                $delegacion = $em->getRepository("iedeswebBundle:Sedes")->findOneById($delegacionid);                
                if($delegacion){
                    $usuario->setDelegacion($delegacion);
                }
                else{
                    $errors[] = "Introduzca una delegación válida";
                    $params['errors'] = $errors;
                    return $this->render('iedeswebBundle:Usuarios:register.html.php', $params);
                }
                
                //persistencia  
                $encoder = $this->get('security.encoder_factory')
                                    ->getEncoder($usuario);
                $passwordCodificado = $encoder->encodePassword(
                    $usuario->getPassword(),
                    $usuario->getSalt()
                );
                    
                $usuario->setPassword($passwordCodificado);
                $usuario->setFechaAlta(new \DateTime());
                $usuario->setUltimaConexion(new \DateTime());

                try{
                    //se almacena la orden en la base de datos
                    $em->persist($usuario);
                    $em->flush();
                    
                    //envio de mail a iEDES
                    $datos['Mensaje'] = "Ha sido dado de alta en la INTRANET de iEDES Solenergy. ".
                                        "Ahora puede acceder a <a href='http://www.iedes.com/intranet'>http://www.iedes.com/intranet</a> ".
                                        "con los datos de acceso siguientes.<br />";
                    $datos['Nick'] = $nick;
                    $datos['Password'] = $password;
                    
                    $paramsEmail['nombreformulario'] = 'INTRANET DE IEDES';
                    $paramsEmail['subtitulo'] = 'Ha sido registrado en la intranet de iEDES Solenergy S.L.';
                    $paramsEmail['datos'] = $datos;
                    $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Intranet de iEDES'),
                          array($request->request->get('email')),
                          'Datos de acceso a Intranet',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Usuario registrado correctamente";
            }
      }

      return $this->render('iedeswebBundle:Usuarios:register.html.php', $params);	
   }

   public function listadoUsuariosAction(Request $request){
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();

      $rol = $usuarioLogueado->getRol(); 
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['idlogeado'] = $usuarioLogueado->getId();
      $params['rol'] = $rol;
      $params['errors'] = null; 

      if($rol != 20 && $rol != 50 && $rol != 100){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para acceder al listado de usuarios";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      if($rol != 20){
        $query = $em->getRepository("iedeswebBundle:Usuarios")->createQueryBuilder('u')
               ->where('u.rol != :rol')
               ->setParameter('rol', '100')
               ->orderBy('u.nombre', 'ASC')
               ->getQuery();
      }
      else{
          if($rol == 50 || $rol == 100){
             $query = $em->getRepository("iedeswebBundle:Usuarios")->createQueryBuilder('u')
                ->where('u.rol != 100 AND (u.rol = 2 or u.rol = 32)')
                ->orderBy('u.nombre', 'ASC')
                ->getQuery();
          }
          else{
             $query = $em->getRepository("iedeswebBundle:Usuarios")->createQueryBuilder('u')
                 ->where('u.rol != 100 AND (u.rol = 2 or u.rol = 32) AND u.activo = 1')
                 ->orderBy('u.nombre', 'ASC')
                 ->getQuery();
          }
      } 

      $params['usuarios'] = $query->getResult();
       
      return $this->render('iedeswebBundle:Usuarios:listado.html.php', $params);
   }
   
   public function editarUsuarioAction(Request $request, $idusuario){
        
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      $params['delegaciones'] = $em->getRepository("iedeswebBundle:Sedes")->findByHaycomerciales(true);
      
      $rol = $usuarioLogueado->getRol();
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['idlogeado'] = $usuarioLogueado->getId();
      $params['rollogueado'] = $rol;
      $params['errors'] = null; 
      
      $params['jefes'] = $em->getRepository("iedeswebBundle:Usuarios")->findBy(
              array('rol' => 20, 'activo' => true));
      $params['comerciales'] = $em->getRepository("iedeswebBundle:Usuarios")->findBy(
              array('rol' => 2, 'activo' => true));
            
      if($rol != 20 && $rol != 50 && $rol != 100){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para editar un usuarios";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      $usuario = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($idusuario);
      if (!$usuario){
          $errors[] = "Lo sentimos, usuario inválido";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);
      }
      
      if ($usuario->getRol() === 100){
          $errors[] = "Lo sentimos, este usuario no puede ser modificado desde aquí";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);
      }

      $emailoriginal = $usuario->getEmail();
      $params['usuario'] = $usuario;
      $params['errors'] = null; 

      if($request->getMethod() == 'POST'){
            
            if (isset($_POST['formEdicion' ])) {
                
                $emailnuevo = $request->request->get('email');
                $password = $request->request->get('password');
                
                if($emailnuevo !== $emailoriginal || $password){
                    $usuario->setEmail($emailnuevo);
                    $nick = substr($emailnuevo, 0, strpos($emailnuevo, "@"));
                
                    $usuario->setNick($nick);
                                       
                    if(!$password){
                        $password = $this->generatePassword(6);
                    }
                    $usuario->setPassword($password);
                    
                    //persistencia  
                    $encoder = $this->get('security.encoder_factory')
                                        ->getEncoder($usuario);
                    $passwordCodificado = $encoder->encodePassword(
                        $usuario->getPassword(),
                        $usuario->getSalt()
                    );

                    $usuario->setPassword($passwordCodificado);
                }
                
                $usuario->setFoto($request->request->get('foto'));
                $usuario->setNombre($request->request->get('nombre'));
                $usuario->setApellido1($request->request->get('apellido1'));  
                $usuario->setApellido2($request->request->get('apellido2')); 
                $usuario->setTelefono1($request->request->get('telefono1'));
                $usuario->setTelefono2($request->request->get('telefono2'));  
                
                $rol = $request->request->get('rol');
                if($rol !== 'def'){
                    $usuario->setRol($rol);
                }
                else{
                    $errors[] = "Introduzca un rol válido";
                    $params['errors'] = $errors;
                    return $this->render('iedeswebBundle:Usuarios:editar.html.php', $params);
                }
                
                $delegacionid = $request->request->get('delegacion');
                $delegacion = $em->getRepository("iedeswebBundle:Sedes")->findOneById($delegacionid);                
                if($delegacion){
                    $usuario->setDelegacion($delegacion);
                }
                else{
                    $errors[] = "Introduzca una delegación válida";
                    $params['errors'] = $errors;
                    return $this->render('iedeswebBundle:Usuarios:editar.html.php', $params);
                }
                
                $pasodirectoid = $request->request->get('pasodirecto');
                $pasodirecto = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($pasodirectoid);                
                if($pasodirecto){
                    $usuario->setPasoDirecto($pasodirecto);
                }
                else{
                    $usuario->setPasoDirecto(null);
                }
                
                if($request->request->get('activo')){
                    $usuario->setActivo(true);
                }
                else{
                    $usuario->setActivo(false);
                }
                
                //validaciones
                $params['errors'] = $this->validationEdicion($em, $usuario);
                
                if ($params['errors']){
                    $errors[] = "Lo sentimos, ha ocurrido un error, inténtelo de nuevo";
                    return $this->render('iedeswebBundle:Usuarios:editar.html.php', $params);
                }

                try{
                    //se almacena la orden en la base de datos
                    $em->persist($usuario);
                    $em->flush();
                    
                    if($emailnuevo !== $emailoriginal){
                        //envio de mail a iEDES
                        $datos['Mensaje'] = "Ha sido dado de alta en la INTRANET de iEDES Solenergy. ".
                                            "Ahora puede acceder a <a href='http://www.iedes.com/intranet'>http://www.iedes.com/intranet</a> ".
                                            "con los datos de acceso siguientes.<br />";
                        $datos['Nick'] = $nick;
                        $datos['Password'] = $password;

                        $paramsEmail['nombreformulario'] = 'INTRANET DE IEDES';
                        $paramsEmail['subtitulo'] = 'Ha sido registrado en la intranet de iEDES Solenergy S.L.';
                        $paramsEmail['datos'] = $datos;
                        $this->get("email_service")->sendmail( 
                              array('correoweb@iedes.com' => 'Intranet de iEDES'),
                              array($request->request->get('email')),
                              'Datos de acceso a Intranet',
                              $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                    }
                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }  
                $params['ok'] = "Usuario editado correctamente";
                
            }
      }

      return $this->render('iedeswebBundle:Usuarios:editar.html.php', $params);	
   }
   
   public function crearvisitaAction(Request $request){
        
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['idlogeado'] = $usuarioLogueado->getId();
      $params['delegaciones'] = $em->getRepository("iedeswebBundle:Sedes")->findByHaycomerciales(true);
      $params['jefes'] = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(20);
      $params['comerciales'] = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(2);
      $params['canales'] = $em->getRepository("iedeswebBundle:Canales")->findAll();
      $errors = null;
      
      $rol = $usuarioLogueado->getRol(); 
      $params['rol'] = $rol; 
      $params['errors'] = null; 
            
      if($rol!= 2 && $rol!= 10 && $rol!= 21 && $rol != 30 && $rol != 31 && $rol != 32 && 
              $rol != 33 && $rol != 50 && $rol != 100){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para acceder a la vista de creación de visitas";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
        if($request->getMethod() == 'POST'){

            if (isset($_POST['formCrearVisita' ])) {

               if($request->request->get('telefono1') !== '000000000'){
                    $telefono1 = $em->getRepository("iedeswebBundle:Visitas")->findOneByTelefono1(
                                 $request->request->get('telefono1'));
                    if($telefono1){
                        $errors[] = "Lo sentimos, ya existe una visita con ese número de teléfono. Puede que haya pulsado el botón de crear 2 veces seguidas. Si lo deseas, llama a algún controller con este ID: " . $telefono1->getId();
                    }
               }
               
               if($errors == null){

                    $visita = new Visitas();

                    $direccion = new Direcciones();
                    $direccion->setRoute($request->request->get('direccion'));
                    $direccion->setStreetNumber('0');
                    $direccion->setPostalCode($request->request->get('formcvpostal_code'));
                    $direccion->setLocality($request->request->get('formcvlocality'));
                    $direccion->setAdminarea3($request->request->get('formcvadministrative_area_level_3'));
                    $direccion->setAdminarea2($request->request->get('formcvadministrative_area_level_2'));
                    $direccion->setAdminarea1($request->request->get('formcvadministrative_area_level_1'));
                    $direccion->setCountry($request->request->get('formcvcountry'));

                    $visita->setDireccion($direccion);  
                    $visita->setCreador($usuarioLogueado);
                    $visita->setNombre($request->request->get('nombre'));
                    $visita->setApellido1($request->request->get('apellido1'));  
                    $visita->setApellido2($request->request->get('apellido2')); 
                    $visita->setTelefono1($request->request->get('telefono1'));
                    $visita->setTelefono2($request->request->get('telefono2')); 
                    $visita->setEmail($request->request->get('email'));
                    $visita->setMiembros($request->request->get('miembros'));
                    $visita->setNotas($request->request->get('notas'));

                    if($termogas = $request->request->get('termogas')){
                        $visita->setTermogas(true);
                    }
                    else{
                        $visita->setTermogas(false);
                    }
                    if($termoelec = $request->request->get('termoelec')){
                        $visita->setTermoelectrico(true);
                    }
                    else{
                        $visita->setTermoelectrico(false);
                    }
                    if($caldera = $request->request->get('caldera')){
                        $visita->setCaldera(true);
                    }
                    else{
                        $visita->setCaldera(false);
                    }
                    if($request->request->get('externo')){
                        $visita->setEquipoexterno(true);
                    }
                    else{
                        $visita->setEquipoexterno(false);
                    }

                    $canalid = $request->request->get('canal');
                    if($canalid !== null){
                        $canalelegido = $em->getRepository("iedeswebBundle:Canales")->findOneById($canalid);                
                        if($canalelegido){
                            $visita->setCanal($canalelegido);
                        }
                        else{
                            $errors[] = "Introduzca un canal válido";
                            $params['errors'] = $errors;
                            return $this->render('iedeswebBundle:Visitas:crearVisita.html.php', $params);
                        }   
                    } 
                    else{
                        if($rol === 10){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(14)); }
                        else if($rol === 31){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(5)); }
                        else if($rol === 21){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(5)); }
                        else if($rol === 32){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(4)); }
                        else if($rol === 33){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(6)); }   
                        else if($rol === 30){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(16)); }   
                    }

                    $delegacionid = $request->request->get('delegacion');
                    if($delegacionid === null){
                        $visita->setDelegacion($usuarioLogueado->getDelegacion());
                    }
                    else{
                        $delegacion = $em->getRepository("iedeswebBundle:Sedes")->findOneById($delegacionid);                
                        if($delegacion){
                            $visita->setDelegacion($delegacion);
                        }
                        else{
                            $errors[] = "Introduzca una delegación válida";
                            $params['errors'] = $errors;
                            return $this->render('iedeswebBundle:Visitas:crearVisita.html.php', $params);
                        }
                    }

                    $date=$request->request->get('fecha');
                    $time=$request->request->get('hora');

                    if($date !== '' && $time !== ''){
                        $fechavisita = $date . ' ' . $time;
                        $fechavisita = new \DateTime($fechavisita);
                        $visita->setFechaVisita($fechavisita);
                    }

                    $visita->setContacto(false);
                    $visita->setActivo(true);
                    $visita->setRescatar(false);

                    //persistencia  

                    $visita->setFecha(new \DateTime());
                    
                    //Se va a intentar asginar directamente a un comercial o
                    //a un jefe de equipo según el campo pasodirecto de la tabla usuarios
                    $this->directoA($visita);
                    
                    //en la creación de visitas, puede que haya que autoasignarla.
                    //o simplemente que elijamos nosotros el comercial o jefe de equipo
                    if($rol === 2){
                        $visita->setComercial($usuarioLogueado);
                    }
                    else{               
                        //discriminamos si se asigna un jefe de equipo o un comercial
                        $usuarioid = $request->request->get('usuario');
                        //si no se elige uno válido
                        if($usuarioid !== 'def'){
                            //vemos si es comercial o jefe
                            $tipo = $em->getRepository("iedeswebBundle:Usuarios")->findOneBy(
                                    array('id' => $usuarioid, 'rol' => array(20,2)));
                            //si es un usuario valido
                            if($tipo){
                                //si es jefe
                                if($tipo->getRol() == 20){
                                    $visita->setJefeequipo($tipo);                    
                                }  
                                //si es comercial
                                else if($tipo->getRol() == 2){
                                        $visita->setComercial($tipo);                    
                                } 
                            }   
                        }
                    }
                    

                    try{
                        //se almacena la orden en la base de datos
                        $em->persist($direccion);
                        $em->persist($visita);
                        $em->flush();

                        //rellenamos el campo to del mail
                        $to = $this->toMail($visita, $em);
                        
                        $paramsEmail['datos'] = $this->datosEmail($visita);                      
                        $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/".$visita->getId()."'>http://www.iedes.com/intranet/visitas/".$visita->getId()."</a>";

                        //si no es una autoasignada
                        if($rol == 2){
                            $paramsEmail['nombreformulario'] = 'VISITA AUTOASIGNADA';
                            $msg = 'Nueva visita autoasignada';
                        }
                        else{
                            $paramsEmail['nombreformulario'] = 'VISITA CREADA';
                            $msg = 'Nueva visita creada';
                        }

                        $this->get("email_service")->sendmail( 
                              array('correoweb@iedes.com' => 'Intranet iEDES'),
                              $to,
                              $msg,
                              $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                    }catch(Exception $e){
                        $em->getConnection()->rollBack();
                        $em->close();
                        throw $e;
                    }

                    $params['ok'] = "Visita creada correctamente";
                }
           }
        }
      
      if($usuarioLogueado->getRol() === 100 || $usuarioLogueado->getRol() === 50) {         
           $query = $em->getRepository("iedeswebBundle:Visitas")->createQueryBuilder('v')
              ->where('(v.fechaVisita > :fechacero or v.fechaVisita is null) and ' .
                      'v.jefeequipo is null AND v.comercial is null and v.activo = 1 and v.contacto = 0')
              ->setParameter('fechacero', '1900-01-01 00:00:00')
              ->orderBy('v.id', 'DESC')
              ->getQuery();
           $query->setMaxResults(100);
           $params['visitaspendientes'] = $query->getResult();
      }
      else{
           $params['visitaspendientes'] = $em->getRepository("iedeswebBundle:Visitas")->findBy(
               array('comercial' => null, 'jefeequipo' => null, 
                     'creador' => $usuarioLogueado, 'activo' => 1, 
                     'contacto' => 0),
               array('id' => 'DESC'),
               100);
      }

      $params['errors'] = $errors;

      return $this->render('iedeswebBundle:Visitas:crearVisita.html.php', $params);	
   } 
   
   public function editarVisitaAction(Request $request, $idvisita){
      
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();

      $rol = $usuarioLogueado->getRol();http://iedes.com/intranet/visitas/estado/
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['idlogeado'] = $usuarioLogueado->getId();
      $params['rol'] = $rol;
      $params['errors'] = null; 
      
      $params['delegaciones'] = $em->getRepository("iedeswebBundle:Sedes")->findByHaycomerciales(true);
      $params['jefes'] = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(20);
      $params['canales'] = $em->getRepository("iedeswebBundle:Canales")->findAll();
      $params['comerciales'] = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(2);  
      $params['resultados'] = $em->getRepository("iedeswebBundle:ResultadoVisitas")->findAll();
      $params['tiposequipo'] = $em->getRepository("iedeswebBundle:TipoEquipo")->findAll();
      $params['productosextra1'] = $em->getRepository("iedeswebBundle:ProductoExtra")->findAll();
      $params['productosextra2'] = $em->getRepository("iedeswebBundle:ProductoExtra")->findAll();
      $params['creadores'] = $em->getRepository("iedeswebBundle:Usuarios")->findBy(
               array('activo' => true),
               array('nombre' => 'ASC'));
      $params['rescatadores'] = $params['creadores'];
            
      if($rol != 50 && $rol != 100){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para editar una visita";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      $visita = $em->getRepository("iedeswebBundle:Visitas")->findOneById($idvisita);
      if(!$visita){
          $errors[] = "Lo sentimos, no hay una visita que editar";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Visitas:menu.html.php', $params);	
      }
      $params['visita'] = $visita;
      $visitaoriginal = $visita;    
      
      if($request->getMethod() == 'POST'){
            
            if (isset($_POST['formEditarVisita' ])) {
                
                $direccion = $visita->getDireccion();
                $direccion->setRoute($request->request->get('direccion'));
                $direccion->setStreetNumber('0');
                $direccion->setPostalCode($request->request->get('formcvpostal_code'));
                $direccion->setLocality($request->request->get('formcvlocality'));
                $direccion->setAdminarea3($request->request->get('formcvadministrative_area_level_3'));
                $direccion->setAdminarea2($request->request->get('formcvadministrative_area_level_2'));
                $direccion->setAdminarea1($request->request->get('formcvadministrative_area_level_1'));
                $direccion->setCountry($request->request->get('formcvcountry'));

                $visita->setDireccion($direccion);             
                $visita->setNombre($request->request->get('nombre'));
                $visita->setApellido1($request->request->get('apellido1'));  
                $visita->setApellido2($request->request->get('apellido2')); 
                $visita->setTelefono1($request->request->get('telefono1'));
                $visita->setTelefono2($request->request->get('telefono2')); 
                $visita->setEmail($request->request->get('email'));
                $visita->setMiembros($request->request->get('miembros'));
                $visita->setNotas($request->request->get('notas'));
                
                $creadorid = $request->request->get('creador');
                $creador = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($creadorid);
                if($creador){
                    $visita->setCreador($creador);
                }
                else{
                    $visita->setCreador($usuarioLogueado);
                }
                
                if($request->request->get('contacto')){
                    $visita->setContacto(true);
                }
                else{
                    $visita->setContacto(false);
                }
                
                $visitantes = $request->request->get('visita');
                if($visitantes === 'def'){
                    $visita->setVisitantes(null);
                }
                else{
                    $visita->setVisitantes($visitantes);
                }
                
                $resultado = $request->request->get('resultado');
                if($resultado === 'def'){
                    $visita->setResultadoVisitas(null);
                }
                else{
                    $resultado = $em->getRepository("iedeswebBundle:ResultadoVisitas")->findOneById($resultado);
                    $visita->setResultadoVisitas($resultado);
                }
                
                $visita->setInteres($request->request->get('interes'));
                
                if($termogas = $request->request->get('termogas')){
                    $visita->setTermogas(true);
                }
                else{
                    $visita->setTermogas(false);
                }
                if($termoelec = $request->request->get('termoelec')){
                    $visita->setTermoelectrico(true);
                }
                else{
                    $visita->setTermoelectrico(false);
                }
                if($caldera = $request->request->get('caldera')){
                    $visita->setCaldera(true);
                }
                else{
                    $visita->setCaldera(false);
                }
                if($request->request->get('externo')){
                    $visita->setEquipoexterno(true);
                }
                else{
                    $visita->setEquipoexterno(false);
                }
                
                $canalid = $request->request->get('canal');
                if($canalid !== '0'){
                    $canalelegido = $em->getRepository("iedeswebBundle:Canales")->findOneById($canalid);                
                    if($canalelegido){
                        $visita->setCanal($canalelegido);
                    }
                    else{
                        $errors[] = "Introduzca un canal válido";
                        $params['errors'] = $errors;
                        $params['visita'] = $visitaoriginal;
                        return $this->render('iedeswebBundle:Visitas:editarVisita.html.php', $params);
                    }
                }
                //no hay opción de canal automatico porque solo el 50 y 100 pueden cambiar
                
                $delegacionid = $request->request->get('delegacion');
                $delegacion = $em->getRepository("iedeswebBundle:Sedes")->findOneById($delegacionid);                
                if($delegacion){
                    $visita->setDelegacion($delegacion);
                }
                else{
                    $errors[] = "Introduzca una delegación válida";
                    $params['errors'] = $errors;
                    return $this->render('iedeswebBundle:Visitas:editarVisita.html.php', $params);
                }
                
                $jefeoriginal = $visita->getJefeequipo();
                $comercialoriginal = $visita->getComercial();
                
                $comercialid = $request->request->get('comercial');
                $comercial = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($comercialid);
                if($comercial){
                    $visita->setComercial($comercial);
                } 
                else{
                    $visita->setComercial(null);
                }    
                
                $rescatadorid = $request->request->get('rescatadores');
                $rescatador = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($rescatadorid);
                if($rescatador){
                    $visita->setRescatador($rescatador);
                } 
                else{
                    $visita->setRescatador(null);
                }  
                
                $jefeid = $request->request->get('jefes');
                $jefe = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($jefeid);
                if($jefe){
                    $visita->setJefeequipo($jefe);
                }  
                else{
                    $visita->setJefeequipo(null);
                }
                
                if($jefe !== $jefeoriginal){
                    if($jefeoriginal && $jefeoriginal->getTelefono1() != null){
                        $params['cambiodejefe'] = $jefeoriginal->getTelefono1();
                    }
                    else{
                        $params['cambiodejefe'] = '';
                    }
                }
                if($comercial !== $comercialoriginal){
                    if($comercialoriginal && $comercialoriginal->getTelefono1() != null){
                        $params['cambiodecomercial'] = $comercialoriginal->getTelefono1();
                    }
                    else{
                        $params['cambiodecomercial'] = '';
                    }
                }
                
                $tipoequipo = $request->request->get('tipoequipo');
                if($tipoequipo === 'def'){
                    $visita->setTipoEquipo(null);
                }
                else{
                    $tipoequipo = $em->getRepository("iedeswebBundle:TipoEquipo")->findOneById($tipoequipo);
                    $visita->setTipoEquipo($tipoequipo);
                }
                
                $productoextra1 = $request->request->get('productoextra1');
                if($productoextra1 === 'def'){
                    $visita->setProductoExtra(null);
                }
                else{
                    $productoextra1 = $em->getRepository("iedeswebBundle:ProductoExtra")->findOneById($productoextra1);
                    $visita->setProductoExtra($productoextra1);
                }
                
                $productoextra2 = $request->request->get('productoextra2');
                if($productoextra2 === 'def'){
                    $visita->setProductoExtra2(null);
                }
                else{
                    $productoextra2 = $em->getRepository("iedeswebBundle:ProductoExtra")->findOneById($productoextra2);
                    $visita->setProductoExtra2($productoextra2);
                }
              
                $date=$request->request->get('fecha');
                $time=$request->request->get('hora');
                
                if($date !== '' && $time !== ''){
                    $fechavisita = $date . ' ' . $time;
                    $fechavisita = new \DateTime($fechavisita);
                    $visita->setFechaVisita($fechavisita);
                }
                
                if($date === '' && $time === ''){
                    $visita->setFechaVisita(null);
                }
                
                if($request->request->get('activo')){
                    $visita->setActivo(true);
                }
                else{
                    $visita->setActivo(false);
                }
                
                if($request->request->get('rescatar')){
                    $visita->setRescatar(true);
                }
                else{
                    $visita->setRescatar(false);
                }
                
                $datei = $request->request->get('fecha_instalacion');
                
                if($datei && $datei !== ''){
                    $fechavinstalacion = $datei . ' 00:00:00';
                    $fechavinstalacion = new \DateTime($fechavinstalacion);
                    $visita->setFechaInstalacion($fechavinstalacion);
                }
                
                if($visita->getResultadoVisitas() && $visita->getResultadoVisitas()->getId() == 6 && (!$datei || $datei == '')){
                    $params['warning'] = "Visita Editada Correctamente.<br>Introduzca una fecha de instalación";
                }
                
                //persistencia  
       
                try{
                    //se almacena la orden en la base de datos
                    $em->persist($direccion);
                    $em->persist($visita);
                    $em->flush();
                    
                    //envio de mail a iEDES
                    $to = $this->toMail($visita, $em);

                    $paramsEmail['datos'] = $this->datosEmail($visita);

                    $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/".$visita->getId()."'>http://www.iedes.com/intranet/visitas/".$visita->getId()."</a>";
                    $paramsEmail['nombreformulario'] = 'VISITA EDITADA';

                    $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Intranet iEDES'),
                          $to,
                          'Visita Editada',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Visita editada correctamente";
            }
      }
      
      return $this->render('iedeswebBundle:Visitas:editarVisita.html.php', $params);	
   } 
   
   /*public function asignarvisitaAction(Request $request, $idvisita){
        
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      
      $rol = $usuarioLogueado->getRol(); 
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['errors'] = null; 
      $params['rol'] = $rol;
            
      if($rol != 20 && $rol != 50 && $rol != 100){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para acceder a la vista de asignación de visitas";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      $visita = $em->getRepository("iedeswebBundle:Visitas")->findOneById($idvisita);
      if($idvisita && $visita === null){
          $errors[] = "Lo sentimos, la visita no existe";
          $params['errors'] = $errors;	
      }
      else if($visita && $visita->getComercial() != null){
          $errors[] = "Lo sentimos, la visita ya ha sido asignada a un comercial";
          $params['errors'] = $errors;	
      }

      if($params['errors'] === null){
         if($request->getMethod() == 'POST') {
            
            if (isset($_POST['formAsignarVisita' ])) {
                $aviso = "";
                //discriminamos si se asigna un jefe de equipo o un comercial
                    $usuarioid = $request->request->get('usuario');
                    //si no se elige uno válido
                    if($usuarioid === 'def'){
                        $errors[] = "Introduzca un usuario válido";
                        $params['errors'] = $errors;
                        return $this->render('iedeswebBundle:Visitas:asignarVisita.html.php', $params);
                    }
                    //vemos si es comercial o jefe
                    else{
                        //si es jefe válido
                        $jefe = $em->getRepository("iedeswebBundle:Usuarios")->findOneBy(
                                array('id' => $usuarioid, 'rol' => 20));
                        if($jefe){
                            $visita->setJefeequipo($jefe); 
                            $aviso = "jefe";
                        }  
                        //comprobamos si es comercial válido
                        else{
                            $comercial = $em->getRepository("iedeswebBundle:Usuarios")->findOneBy(
                                array('id' => $usuarioid, 'rol' => 2));
                            if($comercial){
                                $visita->setComercial($comercial); 
                                $aviso = "comercial";
                                //vemos si tiene alguna visita asignada en 1 hora
                                
                                $horaantes = $this->get('utils_service')->changeDate($visita->getFechaVisita(), "-1 hours");
                                $horadespues = $this->get('utils_service')->changeDate($visita->getFechaVisita(), "+1 hours");
                                $query = $em->createQuery(
                                    "SELECT v FROM iedeswebBundle:Visitas v " .
                                    " WHERE v.activo = 1 AND v.comercial = " . $visita->getComercial()->getId() . " AND " .
                                    " v.fechaVisita >= '" . $horaantes->format('Y-m-d H:i:s') . "' and v.fechaVisita <= '" . $horadespues->format('Y-m-d H:i:s') . "'");

                                $visitascercanas = $query->getResult();
                                if ($visitascercanas) {
                                    $params['alert'] = "Visita asignada correctamente. AVISO: Este comercial tiene ahora más de una visita asignadas en un intervalo de 1 hora";                                 
                                }
                                
                            } 
                            else{
                                $errors[] = "Introduzca un usuario válido";
                                $params['errors'] = $errors;
                                return $this->render('iedeswebBundle:Visitas:asignarVisita.html.php', $params);
                            }
                        }   
                    }
                
                try { 
                        
                    //se almacena la orden en la base de datos
                    $em->persist($visita);
                    $em->flush();
                    
                    //envio de mail a iEDES  
                    $to = null;

                    $paramsEmail['datos'] = $this->datosEmail($visita);
                    $paramsEmail['nombreformulario'] = 'VISITA ASIGNADA';
                    $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/finalizar'>http://www.iedes.com/intranet/visitas/finalizar</a>";
                        
                    if($aviso === "jefe"){
                        $to[] = $visita->getJefeEquipo()->getEmail();
                    }
                    else if($aviso === "comercial"){
                        $to[] = $visita->getComercial()->getEmail();
                    }
                                   
                    $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Intranet de iEDES'),
                          $to,
                          'Visita Asignada',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Visita asignada correctamente";
            }
         }
      }    
      if($usuarioLogueado->getRol() === 50 || $usuarioLogueado->getRol() === 100){
                $query = $em->getRepository("iedeswebBundle:Visitas")->createQueryBuilder('v')
                  ->where('v.jefeequipo is null AND v.comercial is null and v.activo = 1 ' .
                          'and v.contacto = 0 and v.resultadovisitas is NULL and v.rescatar = 0')
                  ->orderBy('v.fechaVisita', 'ASC')
                  ->getQuery();
                $query->setMaxResults(100);
                $params['visitaspendientes'] = $query->getResult();
      }
      else{ //suponemos que es 20
        $params['visitaspendientes'] = $em->getRepository("iedeswebBundle:Visitas")->findBy(
                array('jefeequipo' => $usuarioLogueado, 'comercial' => null, 'contacto' => 0, 'activo' => true, 'rescatar' => false));      
      }
      
      $mes = new \DateTime(); $mes = $mes->format('m');
      $anio = new \DateTime(); $anio = $anio->format('Y');
       
       $stmt = $em->getConnection()
                ->prepare("select usuarios.id, concat(usuarios.nombre, ' ', usuarios.apellido1, ' ', " .
                        "usuarios.apellido2) as nombreCompleto, " .
                        "(select count(comercial) from visitas where " .
                        "((fecha_visita >= '" . $anio . "-" . $mes . "-01' or ".
                        "fecha_visita is null) and contacto = 0 and activo = 1) and " .
                        "comercial = usuarios.id) as asig from usuarios where rol = 2 and usuarios.activo = 1");
        
        $stmt->execute();
        $params['comerciales'] = $stmt->fetchAll();  
        $params['jefes'] = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(20);
      
      //return $this->render('iedeswebBundle:Visitas:asignarVisita.html.php', $params);	
        return $this->redirect(
            $this->generateUrl('estado_visitas')
        );
   } 
   
   public function finalizarvisitaAction(Request $request, $idvisita){
        
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      
      $rol = $usuarioLogueado->getRol();
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['errors'] = null; 
      $params['rol'] = $rol;     
      $params['resultados'] = $em->getRepository('iedeswebBundle:ResultadoVisitas')->findBy(
              array('activo' => 1),
              array('orden' => 'ASC'));
      
      if($rol != 2 && $rol != 100){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para acceder a la vista de finalización de visitas";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      $visita = $em->getRepository("iedeswebBundle:Visitas")->findOneById($idvisita);
      
      if($request->getMethod() == 'POST'){
            
            if (isset($_POST['formFinalizarVisita' ])) {
                
                if($visita && $visita->getResultadoVisitas() != null){
                    $errors[] = "Lo sentimos, la visita ya ha sido completada por un comercial";
                    $params['errors'] = $errors;
                    return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
                }

                if($rol != 50 && $rol != 100 && $visita->getComercial() != $usuarioLogueado){
                    $errors[] = "Lo sentimos, no tienes permiso para modificar esta visita";
                    $params['errors'] = $errors;
                    return $this->render('iedeswebBundle:Visitas:finalizarVisita.html.php', $params);
                }
                
                $visita->setVisitantes($request->request->get('visita'));
                $resultado = $request->request->get('resultado');
                $resultado = $em->getRepository("iedeswebBundle:ResultadoVisitas")->findOneById($resultado);
                $visita->setResultadoVisitas($resultado);
                $visita->setInteres($request->request->get('interes'));
                $visita->setNotas($request->request->get('notas') . '. ' . $visita->getNotas());

                $date=$request->request->get('fecha');
                $time=$request->request->get('hora');
                
                if($date && $time && $date !== '' && $time !== ''){
                    $fechavisita = $date . ' ' . $time;
                    $fechavisita = new \DateTime($fechavisita);
                    $visita->setFechaVisita($fechavisita);
                }
                
                $f = new \DateTime();
                $visita->setFechaCierre($f);
                //comprobamos el resultado y si es una entrada en vivienda del cliente, 
                //se almacena la fecha de cierre en fecha_entrada_vivienda
                if($resultado->getId() == 2 || $resultado->getId() == 3 || $resultado->getId() == 4 ||
                   $resultado->getId() == 5 || $resultado->getId() == 6 || $resultado->getId() == 10){
                        $visita->setFechaEntradavivienda($f);
                }
                
                try{
                    //se almacena la orden en la base de datos
                    $em->persist($visita);
                    $em->flush();
                    
                    //envio de mail a iEDES
                    $to = $this->toMail($visita, $em);

                    //y si es de web, se lo mandamos al coordinador del canal
                    if($visita->getCanal()->getId() === '6'){
                        $ct = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(33);
                        foreach($ct as $c) {
                            $to[] = $c->getEmail();
                        } 
                    }
                    
                    //envio de venta "vendida"
                    //if($visita->getResultadoVisitas()->getId() === '5'){
                    //    $to[] = 'oficina@iedes.com';
                    //}
                    
                    $datos = $this->datosEmail($visita);
                    
                    //añadimos más información al correo
                    $datos['Creador'] = $visita->getCreador()->getNombreCompleto();
                    $datos['Comercial'] = $visita->getComercial()->getNombreCompleto();
                    $datos['Visitantes'] = $visita->getVisitantes();
                    $datos['Resultado'] = $visita->getResultadoVisitas()->getNombre();
                    $paramsEmail['datos'] = $datos;
                    
                    $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/asignar'>http://www.iedes.com/intranet/visitas/asignar</a>";
                    $paramsEmail['nombreformulario'] = 'VISITA FINALIZADA';

                    $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Intranet iEDES'),
                          $to,
                          'Visita Finalizada',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));
                }
                catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Visita finalizada correctamente";
            }
      }
      
      if($usuarioLogueado->getRol() === 50 || $usuarioLogueado->getRol() === 100){
          $params['visitaspendientes'] = $em->getRepository("iedeswebBundle:Visitas")->findBy(
              array('visitantes' => null));  
      }
      else{
          $params['visitaspendientes'] = $em->getRepository("iedeswebBundle:Visitas")->findBy(
              array('comercial' => $usuarioLogueado, 'resultadovisitas' => null));
      }

      return $this->render('iedeswebBundle:Visitas:finalizarVisita.html.php', $params);	
   } 
   
   
   public function rescatarVisitaAction(Request $request, $idvisita){
        $em = $this->getDoctrine()->getManager();
        $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();

        $rol = $usuarioLogueado->getRol(); 
        $params['nicklogeado'] = $usuarioLogueado->getNick();
        $params['delegaciones'] = $em->getRepository("iedeswebBundle:Sedes")->findByHaycomerciales(true);
        $params['estados'] = $em->getRepository("iedeswebBundle:EstadoContactos")->findByActivo(true);
        $params['rescatadores'] = $em->getRepository("iedeswebBundle:Usuarios")->findBy(
                 array('activo' => true, 'rol' => array(100, 50, 30)),
                 array('apellido1' => 'ASC'));
        $params['rol'] = $rol;
        $params['errors'] = null; 
        $params['resultados'] = $em->getRepository("iedeswebBundle:ResultadoVisitas")->findAll();

        if($idvisita !== null){
          //contactos
          $visita = $em->getRepository("iedeswebBundle:Visitas")->findOneById($idvisita);
          if($visita === null){
              $errors[] = "Lo sentimos, la visita no existe";
              $params['errors'] = $errors;	
          }
          else if($visita && $visita->getRescatar() === 0){
              $errors[] = "Lo sentimos, la visita ya ha sido rescatada";
              $params['errors'] = $errors;	
          }
      }     
      
      $filtro = null;
      $filtro2= null;
      $filtro3= null;
      
      if($request->getMethod() == 'POST'){
          
            //obtenemos los filtros
            $filtro = $request->request->get('filtro');
            $filtro2 = $request->request->get('filtroestado');
            $filtro3 = $request->request->get('filtroresultado');

            $params['filtro']  = $filtro;
            $params['filtro2'] = $filtro2;
            $params['filtro3'] = $filtro3;

            if($filtro2 !== "def" && $filtro2 !== ""){
                if($filtro2 == 100){
                    $filtro2 = " AND v.estadocontactos is null ";
                }
                else{
                    $filtro2 = " AND v.estadocontactos = " . $filtro2;
                }
            }
            else{
                $filtro2 = null;
            }
          
            if($filtro3 !== "def" && $filtro3 !== null){
                if($filtro3 == 100){
                    $filtro3 = " AND v.resultadovisitas is null ";
                }
                else{
                    $filtro3 = " AND v.resultadovisitas = " . $filtro3;
                }
            }
            else{
                $filtro3 = null;
            }
          
            if (isset($_POST['formRecuperarVisita' ])) {
                
                //antes de nada, hacemos una copia de los datos necesarios
                //en la nueva tabla
                $previsita = new VisitasAntesRescate;
            
                $previsita->setVisita($visita);
                $deleg = $visita->getDelegacion();
                if($deleg){
                    $previsita->setDelegacion($deleg);
                }   
                else{
                    $previsita->setDelegacion(1);
                }
                $resVisita = $visita->getResultadoVisitas();
                $previsita->setResultadoVisitas($resVisita);
                
                $previsita->setComercial($visita->getComercial());                            
                $previsita->setFecha($visita->getFecha());
                $previsita->setCanal($visita->getCanal());
                $previsita->setFechaVisita($visita->getFechaVisita());
                $previsita->setFechaCierre($visita->getFechaCierre());
                
                //ahora empezamos con la recuperacion como tal                
                $recuperadorid = $request->request->get('recuperador');
                $recuperador = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($recuperadorid);
                if($recuperador){
                    $visita->setRescatador($recuperador);
                }
                else{
                    $visita->setRescatador($usuarioLogueado);
                }
                
                $visita->setNotas($request->request->get('notas') . ". " . $visita->getnotas());    
              
                $date=$request->request->get('fecha');
                $time=$request->request->get('hora');
                
                if($date && $time && $date !== '' && $time !== ''){
                    $fechavisita = $date . ' ' . $time;
                    $fechavisita = new \DateTime($fechavisita);
                    $visita->setFechaVisita($fechavisita);
                }
                $visita->setFechaRescate(new \DateTime()); 
                $visita->setFechaCierre(null);
                $visita->setEstadoContactos(null);
                $visita->setRescatar(false);
                
                //vemos qué hacer con el comercial, si es aplazada se deja, si no se elimina
                //if($resVisita->getId() != 9){
                        $visita->setComercial(null);
                //}
                
                $visita->setResultadoVisitas(null);
                $visita->setVisitantes(null);
                
                //persistencia  
                try{
                    //se almacena la orden en la base de datos
                    $em->persist($visita);
                    $em->persist($previsita);
                    $em->flush();

                    $to = $this->toMail($visita, $em);
                        
                    $paramsEmail['datos'] = $this->datosEmail($visita);
                    $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/asignar'>http://www.iedes.com/intranet/visitas/asignar</a>";
                    $paramsEmail['nombreformulario'] = 'VISITA RECUPERADA';
                    
                    $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Intranet iEDES'),
                          $to,
                          'Visita Recuperada',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Visita Recuperada correctamente";
            }
            
            else if (isset($_POST['formActualizarEstado'])) {
                $estadoid = $request->request->get('estado');
                $estado = $em->getRepository("iedeswebBundle:EstadoContactos")->findOneById($estadoid);
                if($estado){
                    $visita->setEstadoContactos($estado);
                    
                    if($estado->getId() == 1){
                        $visita->setContacto(true);
                    }
                }
                else{
                    $visita->setEstadoContactos(null);
                }
                
                if($request->request->get('notas')){
                    $visita->setNotas($request->request->get('notas') . ". " . $visita->getNotas());
                }
                
                $visita->setFechaVisita(new \DateTime());
                
                //persistencia  
                try{
                    //se almacena la orden en la base de datos
                    $em->persist($visita);
                    $em->flush();

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Visita actualizada correctamente";
            }
      }
      
      
      $sqlinicio = "SELECT v
            FROM iedeswebBundle:Visitas v, iedeswebBundle:Direcciones d
            WHERE v.direccion = d.id AND
            (d.locality like '%" . $filtro . "%' OR
            d.postalCode like '%" . $filtro . "%' OR v.id like '%" . $filtro . "%' OR
            v.nombre like '%" . $filtro . "%' OR v.apellido1 like '%" . $filtro . "%' OR
            v.apellido2 like '%" . $filtro . "%' OR v.telefono1 like '%" . $filtro . "%' OR
            v.telefono2 like '%" . $filtro . "%' ) AND ";
      $sqlorder = " order by v.id desc";
      
      
      if($rol === 50 || $rol === 100){
          $queryRescatadas = $em->createQuery($sqlinicio .
                ' v.contacto = 0 AND v.activo = 1 and v.rescatar = 1' .
                $filtro2 .
                $filtro3 .
                $sqlorder);
          
          $limiteResultados = 1500;
      }
      else{
          $queryRescatadas = $em->createQuery($sqlinicio .
                ' v.contacto = 0 AND v.activo = 1 AND v.rescatar = 1 ' .
                $filtro2 .
                $filtro3 .
                $sqlorder);

           $limiteResultados = 500;
      }

         $totalResultados = count($queryRescatadas->getResult());
         
         $queryRescatadas->setMaxResults($limiteResultados);
         $params['visitas'] = $queryRescatadas->getResult();
         
         if($totalResultados > $limiteResultados){
             $params['lblres'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
         }
         else{
             $params['lblres'] = "Resultados mostrados (" . $totalResultados . ")";
         }

      return $this->render('iedeswebBundle:Visitas:rescate.html.php', $params);
   }*/
   
   public function estadoVisitasAction(Request $request, $idvisita){
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();

      $rol = $usuarioLogueado->getRol(); 
      $params['idvisita'] = $idvisita;
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['idlogeado'] = $usuarioLogueado->getId();
      $params['rol'] = $rol;
      $params['errors'] = null;
      $params['resultados'] = $em->getRepository("iedeswebBundle:ResultadoVisitas")->findAll();
      $params['estados'] = $em->getRepository("iedeswebBundle:EstadoContactos")->findByActivo(true);
      $params['rescatadores'] = $em->getRepository("iedeswebBundle:Usuarios")->findBy(
                 array('activo' => true, 'rol' => array(100, 50, 31, 30, 2)),
                 array('apellido1' => 'ASC'));

      if($rol == 1){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para acceder a las visitas";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      $filtro  = null;
      $filtro2 = null;
      $filtro3 = null;
      $fechaini = "0001-01-01";
      $fechafin = "9999-12-31";
      
      if($request->getMethod() == 'POST'){
          
          //obtenemos los filtros
            $filtro = $request->request->get('filtro');
            $filtro2 = $request->request->get('filtroestado');
            $filtro3 = $request->request->get('filtroresultado');
            $fechaini = $request->request->get('filtrofechaini');
            $fechafin = $request->request->get('filtrofechafin');

            $params['filtro'] = $filtro;
            $params['filtro2'] = $filtro2;
            $params['filtro3'] = $filtro3;
            $params['fechaini'] = $fechaini;
            $params['fechafin'] = $fechafin;
            

            //filtro 2 es para ver dónde se encuentra nuestra visita
            //lo usamos más adelante
            
            if($filtro3 && $filtro3 !== "def" && $filtro3 !== ""){
                $filtro3 = " AND v.resultadovisitas = " . $filtro3;
            }
            else{
                $filtro3 = null;
            }
            
            if(!$fechaini && $fechaini == ""){
                $fechaini = "0001-01-01";
            }
            if(!$fechafin && $fechafin == ""){
                $fechafin = "9999-12-31";
            }
             
            //añadimos aqui, a este controller, la gestión de cada una de las vistas anteriores
            //para que todo se simplifique a una sección
            
            $visita = $em->getRepository("iedeswebBundle:Visitas")->findOneById($idvisita);
            if($idvisita && $visita === null){
                $errors[] = "Lo sentimos, la visita no existe";
                $params['errors'] = $errors;	
            }  
            
            if (isset($_POST['formAsignarVisita' ])) {
                
                if($visita && $visita->getComercial() != null){
                    $errors[] = "Lo sentimos, la visita ya ha sido asignada a un comercial";
                    $params['errors'] = $errors;	
                }
                
                if($params['errors'] === null){
                    $aviso = "";
                    //discriminamos si se asigna un jefe de equipo o un comercial
                        $usuarioid = $request->request->get('usuario');
                        //si no se elige uno válido
                        if($usuarioid === 'def'){
                            $errors[] = "Introduzca un usuario válido";
                            $params['errors'] = $errors;
                        }
                        //vemos si es comercial o jefe
                        else{
                            //si es jefe válido
                            $jefe = $em->getRepository("iedeswebBundle:Usuarios")->findOneBy(
                                    array('id' => $usuarioid, 'rol' => 20));
                            if($jefe){
                                //si es jefe de equipo, pero ya hay un jefe de equipo, se pone como comercial
                                if($visita->getJefeEquipo() == $jefe){
                                    $visita->setComercial($jefe); 
                                    $aviso = "comercial";
                                    
                                    //vemos si tiene alguna visita asignada en 1 hora
                                    $horaantes = $this->get('utils_service')->changeDate($visita->getFechaVisita(), "-1 hours");
                                    $horadespues = $this->get('utils_service')->changeDate($visita->getFechaVisita(), "+1 hours");
                                    $query = $em->createQuery(
                                        "SELECT v FROM iedeswebBundle:Visitas v " .
                                        " WHERE v.activo = 1 AND v.comercial = " . $visita->getComercial()->getId() . " AND " .
                                        " v.fechaVisita >= '" . $horaantes->format('Y-m-d H:i:s') . "' and v.fechaVisita <= '" . $horadespues->format('Y-m-d H:i:s') . "'");

                                    $visitascercanas = $query->getResult();
                                    if ($visitascercanas) {
                                        $params['alert'] = "Visita asignada correctamente. AVISO: Este jefe de equipo (comercial) tiene ahora más de una visita asignadas en un intervalo de 1 hora";                                 
                                    }
                                }
                                else{
                                    $visita->setJefeequipo($jefe); 
                                    $aviso = "jefe";
                                }
                            }  
                            //comprobamos si es comercial válido
                            else{
                                $comercial = $em->getRepository("iedeswebBundle:Usuarios")->findOneBy(
                                    array('id' => $usuarioid, 'rol' => 2));
                                if($comercial){
                                    $visita->setComercial($comercial); 
                                    $aviso = "comercial";
                                    
                                    //vemos si tiene alguna visita asignada en 1 hora
                                    $horaantes = $this->get('utils_service')->changeDate($visita->getFechaVisita(), "-1 hours");
                                    $horadespues = $this->get('utils_service')->changeDate($visita->getFechaVisita(), "+1 hours");
                                    $query = $em->createQuery(
                                        "SELECT v FROM iedeswebBundle:Visitas v " .
                                        " WHERE v.activo = 1 AND v.comercial = " . $visita->getComercial()->getId() . " AND " .
                                        " v.fechaVisita >= '" . $horaantes->format('Y-m-d H:i:s') . "' and v.fechaVisita <= '" . $horadespues->format('Y-m-d H:i:s') . "'");

                                    $visitascercanas = $query->getResult();
                                    if ($visitascercanas) {
                                        $params['alert'] = "Visita asignada correctamente. AVISO: Este comercial tiene ahora más de una visita asignadas en un intervalo de 1 hora";                                 
                                    }

                                } 
                                else{
                                    $errors[] = "Introduzca un usuario válido";
                                    $params['errors'] = $errors;
                                }
                            }   
                        }

                    if($params['errors'] === null){
                        try { 

                            //se almacena la orden en la base de datos
                            $em->persist($visita);
                            $em->flush();

                            //envio de mail a iEDES  
                            $to = null;

                            $paramsEmail['datos'] = $this->datosEmail($visita);
                            $paramsEmail['nombreformulario'] = 'VISITA ASIGNADA';
                            $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/".$visita->getId()."'>http://www.iedes.com/intranet/visitas/".$visita->getId()."</a>";

                            if($aviso === "jefe"){
                                $to[] = $visita->getJefeEquipo()->getEmail();
                            }
                            else if($aviso === "comercial"){
                                $to[] = $visita->getComercial()->getEmail();
                            }

                            $this->get("email_service")->sendmail( 
                                  array('correoweb@iedes.com' => 'Intranet de iEDES'),
                                  $to,
                                  'Visita Asignada',
                                  $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                        }catch(Exception $e){
                            $em->getConnection()->rollBack();
                            $em->close();
                            throw $e;
                        }

                        $params['ok'] = "Visita asignada correctamente";
                    }
                }
            }       
            
            if (isset($_POST['formFinalizarVisita' ])) {
                
                if($visita && $visita->getResultadoVisitas() != null){
                    $errors[] = "Lo sentimos, la visita ya ha sido completada por un comercial";
                    $params['errors'] = $errors;	
                }

                if($rol != 50 && $rol != 100 && $visita->getComercial() != $usuarioLogueado){
                    $errors[] = "Lo sentimos, no tienes permiso para modificar esta visita";
                    $params['errors'] = $errors;
                }
                if($params['errors'] === null) {
                    $visita->setVisitantes($request->request->get('visita'));
                    $resultado = $request->request->get('resultado');
                    $resultado = $em->getRepository("iedeswebBundle:ResultadoVisitas")->findOneById($resultado);
                    $visita->setResultadoVisitas($resultado);
                    $visita->setInteres($request->request->get('interes'));
                    $visita->setNotas($request->request->get('notas') . '. ' . $visita->getNotas());

                    $date=$request->request->get('fecha');
                    $time=$request->request->get('hora');

                    if($date && $time && $date !== '' && $time !== ''){
                        $fechavisita = $date . ' ' . $time;
                        $fechavisita = new \DateTime($fechavisita);
                        $visita->setFechaVisita($fechavisita);
                    }

                    $f = new \DateTime();
                    $visita->setFechaCierre($f);
                    //comprobamos el resultado y si es una entrada en vivienda del cliente, 
                    //se almacena la fecha de cierre en fecha_entrada_vivienda
                    if($resultado->getId() == 2 || $resultado->getId() == 3 || $resultado->getId() == 4 ||
                       $resultado->getId() == 5 || $resultado->getId() == 6 || $resultado->getId() == 10){
                            $visita->setFechaEntradavivienda($f);
                    }

                    try{
                        //se almacena la orden en la base de datos
                        $em->persist($visita);
                        $em->flush();

                        //envio de mail a iEDES
                        $to = $this->toMail($visita, $em);

                        //y si es de web, se lo mandamos al coordinador del canal
                        /*if($visita->getCanal()->getId() === '6'){
                            $ct = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(33);
                            foreach($ct as $c) {
                                $to[] = $c->getEmail();
                            } 
                        }*/

                        //envio de venta "vendida"
                        /*if($visita->getResultadoVisitas()->getId() === '5'){
                            $to[] = 'oficina@iedes.com';
                        }*/

                        $datos = $this->datosEmail($visita);

                        //añadimos más información al correo
                        $datos['Creador'] = $visita->getCreador()->getNombreCompleto();
                        $datos['Comercial'] = $visita->getComercial()->getNombreCompleto();
                        $datos['Visitantes'] = $visita->getVisitantes();
                        $datos['Resultado'] = $visita->getResultadoVisitas()->getNombre();
                        $paramsEmail['datos'] = $datos;

                        $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/".$visita->getId()."'>http://www.iedes.com/intranet/visitas/".$visita->getId()."</a>";
                        $paramsEmail['nombreformulario'] = 'VISITA FINALIZADA';

                        $this->get("email_service")->sendmail( 
                              array('correoweb@iedes.com' => 'Intranet iEDES'),
                              $to,
                              'Visita Finalizada',
                              $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));
                    }
                    catch(Exception $e){
                        $em->getConnection()->rollBack();
                        $em->close();
                        throw $e;
                    }

                    $params['ok'] = "Visita finalizada correctamente";
                }
            }
            
            if (isset($_POST['formRecuperarVisita' ])) {
                
                if($visita && $visita->getRescatar() === 0){
                    $errors[] = "Lo sentimos, la visita ya ha sido rescatada";
                    $params['errors'] = $errors;	
                }
          
                if($params['errors'] === null) {
                    //antes de nada, hacemos una copia de los datos necesarios
                    //en la nueva tabla
                    $previsita = new VisitasAntesRescate;

                    $previsita->setVisita($visita);
                    $deleg = $visita->getDelegacion();
                    if($deleg){
                        $previsita->setDelegacion($deleg);
                    }   
                    else{
                        $previsita->setDelegacion(1);
                    }
                    $resVisita = $visita->getResultadoVisitas();
                    $previsita->setResultadoVisitas($resVisita);

                    $previsita->setComercial($visita->getComercial());                            
                    $previsita->setFecha($visita->getFecha());
                    $previsita->setCanal($visita->getCanal());
                    $previsita->setFechaVisita($visita->getFechaVisita());
                    $previsita->setFechaCierre($visita->getFechaCierre());

                    //ahora empezamos con la recuperacion como tal                
                    $recuperadorid = $request->request->get('recuperador');
                    $recuperador = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($recuperadorid);
                    if($recuperador){
                        $visita->setRescatador($recuperador);
                    }
                    else{
                        $visita->setRescatador($usuarioLogueado);
                    }
                    
                    $comercialid = $request->request->get('comercial');
                    $comercial = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($comercialid);
                    if($comercial){
                        $visita->setComercial($comercial);
                    }
                    else{ //si no se elige un comercial, si el rol es comercial se pone a él mismo.ee
                        if($usuarioLogueado->getRol() == 2){
                            $visita->setComercial($usuarioLogueado);
                        }
                        else{
                            $visita->setComercial(null);
                        }
                    }
                
                    $visita->setNotas($request->request->get('notas') . ". " . $visita->getnotas());    

                    $date=$request->request->get('fecha');
                    $time=$request->request->get('hora');

                    if($date && $time && $date !== '' && $time !== ''){
                        $fechavisita = $date . ' ' . $time;
                        $fechavisita = new \DateTime($fechavisita);
                        $visita->setFechaVisita($fechavisita);
                    }
                    $visita->setFechaRescate(new \DateTime()); 
                    $visita->setFechaCierre(null);
                    $visita->setEstadoContactos(null);
                    $visita->setRescatar(false);

                    $visita->setResultadoVisitas(null);
                    $visita->setVisitantes(null);

                    //persistencia  
                    try{
                        //se almacena la orden en la base de datos
                        $em->persist($visita);
                        $em->persist($previsita);
                        $em->flush();

                        $to = $this->toMail($visita, $em, false);

                        $paramsEmail['datos'] = $this->datosEmail($visita);
                        $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas'>http://www.iedes.com/intranet/visitas</a>";
                        $paramsEmail['nombreformulario'] = 'VISITA RECUPERADA';

                        $this->get("email_service")->sendmail( 
                              array('correoweb@iedes.com' => 'Intranet iEDES'),
                              $to,
                              'Visita Recuperada',
                              $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                    }catch(Exception $e){
                        $em->getConnection()->rollBack();
                        $em->close();
                        throw $e;
                    }

                    $params['ok'] = "Visita Recuperada correctamente";
                }
            }
            
            if (isset($_POST['formActualizarEstado'])) {
                $estadoid = $request->request->get('estado');
                $estado = $em->getRepository("iedeswebBundle:EstadoContactos")->findOneById($estadoid);
                if($estado){
                    $visita->setEstadoContactos($estado);
                    
                    if($estado->getId() == 1){
                        $visita->setContacto(true);
                    }
                }
                else{
                    $visita->setEstadoContactos(null);
                }
                
                if($request->request->get('notas')){
                    $visita->setNotas($request->request->get('notas') . ". " . $visita->getNotas());
                }
                
                $visita->setFechaVisita(new \DateTime());
                
                //persistencia  
                try{
                    //se almacena la orden en la base de datos
                    $em->persist($visita);
                    $em->flush();

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Estado actualizado correctamente";
            }
      }
      
      
      
      $sqlfecha = "((v.fechaInstalacion >= '" . $fechaini . "' AND v.fechaInstalacion <= '" . $fechafin . "' AND v.resultadovisitas = 6) OR " .
                  " (v.fechaCierre >= '" . $fechaini . "' AND v.fechaCierre <= '" . $fechafin . "' AND v.resultadovisitas != 6) OR " .
                  " (v.fechaRescate >= '" . $fechaini . "' AND v.fechaRescate <= '" . $fechafin . "') OR " .
                  " (v.fecha >= '" . $fechaini . "' AND v.fecha <= '" . $fechafin . "' AND v.fechaCierre is null)) AND ";
      
      $sqlinicio = "SELECT v
            FROM iedeswebBundle:Visitas v, iedeswebBundle:Direcciones d
            WHERE v.direccion = d.id AND
            (d.locality like '%" . $filtro . "%' OR
            d.postalCode like '%" . $filtro . "%' OR v.id like '%" . $filtro . "%' OR
            v.nombre like '%" . $filtro . "%' OR v.apellido1 like '%" . $filtro . "%' OR
            v.apellido2 like '%" . $filtro . "%' OR v.telefono1 like '%" . $filtro . "%' OR
            v.telefono2 like '%" . $filtro . "%' ) AND " . $sqlfecha;
      
      $sqlorder = " order by v.id desc";
      
      
      if($rol != 50 && $rol != 100){ 
          $limiteResultados = 100;
        //Visitas sin asignar
          if($filtro3 === null && ($filtro2 == null || $filtro2 === 'def' || $filtro2 === '0')){
                $querySinAsignar = $em->createQuery($sqlinicio .
                        ' (v.creador = ' . $usuarioLogueado->getId() . 
                        ' OR v.rescatador = ' . $usuarioLogueado->getId() . ') ' .
                        ' AND v.comercial is null AND v.jefeequipo is null ' . 
                        ' AND v.contacto = 0 AND v.activo = 1 AND v.rescatar = 0 ' .
                        ' AND v.resultadovisitas is null ' .
                        $sqlorder);

                $totalResultados = count($querySinAsignar->getResult());

                $querySinAsignar->setMaxResults($limiteResultados);
                $params['visitasSinAsignar'] = $querySinAsignar->getResult();

                if($totalResultados > $limiteResultados){
                    $params['lblresSinAsignar'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
                }
                else{
                    $params['lblresSinAsignar'] = "Resultados mostrados (" . $totalResultados . ")";
                }
          }
          
          //Visitas en Jefe de Equipo  
          if($filtro3 === null && ($filtro2 == null || $filtro2 === 'def' || $filtro2 === '1')){
                //Visitas en Jefe de Equipo
                $queryJefeEquipo = $em->createQuery($sqlinicio .
                        '((v.creador = ' . $usuarioLogueado->getId() . ' AND v.jefeequipo is not null) OR '
                      . '(v.rescatador = ' . $usuarioLogueado->getId() . ' AND v.jefeequipo is not null) OR '
                      . 'v.jefeequipo = ' . $usuarioLogueado->getId() . ') AND ' 
                      . 'v.comercial is null AND ' 
                      . 'v.contacto = 0 AND v.activo = 1 AND v.rescatar = 0 AND '
                      . 'v.resultadovisitas is null '
                      . $sqlorder);

                $totalResultados = count($queryJefeEquipo->getResult());

                $queryJefeEquipo->setMaxResults($limiteResultados);
                $params['visitasJefeEquipo'] = $queryJefeEquipo->getResult();

                if($totalResultados > $limiteResultados){
                    $params['lblresJefeEquipo'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
                }
                else{
                    $params['lblresJefeEquipo'] = "Resultados mostrados (" . $totalResultados . ")";
                }
          }
      
          //Visitas en Comercial
          if($filtro3 === null && ($filtro2 == null || $filtro2 === 'def' || $filtro2 === '2')){
                $queryComercial = $em->createQuery($sqlinicio . 
                        '(v.creador = ' . $usuarioLogueado->getId() . ' OR '
                      . 'v.rescatador = ' . $usuarioLogueado->getId() . ' OR '
                      . 'v.comercial = ' . $usuarioLogueado->getId() . ' OR '
                      . 'v.jefeequipo = ' . $usuarioLogueado->getId() . ') AND '
                      . 'v.comercial is not null AND '
                      . 'v.contacto = 0 AND v.activo = 1 AND v.rescatar = 0 AND '
                      . 'v.resultadovisitas is null '
                      . $sqlorder);

                $totalResultados = count($queryComercial->getResult());

                $queryComercial->setMaxResults($limiteResultados);
                $params['visitasComercial'] = $queryComercial->getResult();

                if($totalResultados > $limiteResultados){
                    $params['lblresComercial'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
                }
                else{
                    $params['lblresComercial'] = "Resultados mostrados (" . $totalResultados . ")";
                }
          }
      
          //Visitas Finalizadas
          if($filtro2 == null || $filtro2 === 'def' || $filtro2 === '3'){
                $queryFinalizada = $em->createQuery($sqlinicio .
                        '(v.creador = ' . $usuarioLogueado->getId() . ' OR ' .
                        ' v.rescatador = ' . $usuarioLogueado->getId() . ' OR ' .
                        ' v.comercial = ' . $usuarioLogueado->getId() . ' OR ' . 
                        ' v.jefeequipo = ' . $usuarioLogueado->getId() . ') AND ' .
                        ' v.resultadovisitas is not null AND ' .
                        ' v.contacto = 0 AND v.activo = 1 AND v.rescatar = 0 AND ' .
                        'v.resultadovisitas is not null ' .
                        $sqlorder);

                $limiteResultados = 100;

                $totalResultados = count($queryFinalizada->getResult());

                $queryFinalizada->setMaxResults($limiteResultados);
                $params['visitasFinalizadas'] = $queryFinalizada->getResult();

                if($totalResultados > $limiteResultados){
                    $params['lblresFinalizadas'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
                }
                else{
                    $params['lblresFinalizadas'] = "Resultados mostrados (" . $totalResultados . ")";
                }
          }
          
          //Visitas En Rescate
          if($filtro2 == null || $filtro2 === 'def' || $filtro2 === '4'){
              if($rol == 30){
                  $queryRescatadas = $em->createQuery($sqlinicio .
                    ' v.contacto = 0 AND v.activo = 1 AND v.rescatar = 1 ' .
                    $sqlorder);
                  $limiteResultados = 500;
              }else{
                $queryRescatadas = $em->createQuery($sqlinicio .
                        '(v.creador = ' . $usuarioLogueado->getId() . ' OR ' .
                        ' v.rescatador = ' . $usuarioLogueado->getId() . ' OR ' .
                        ' v.comercial = ' . $usuarioLogueado->getId() . ' OR ' . 
                        ' v.jefeequipo = ' . $usuarioLogueado->getId() . ') AND ' .
                        '  v.contacto = 0 AND v.activo = 1 AND v.rescatar = 1 ' .
                        $sqlorder);  
                $limiteResultados = 50;
              }

                

                $totalResultados = count($queryRescatadas->getResult());

                $queryRescatadas->setMaxResults($limiteResultados);
                $params['visitasRescatadas'] = $queryRescatadas->getResult();

                if($totalResultados > $limiteResultados){
                    $params['lblresRescatadas'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
                }
                else{
                    $params['lblresRescatadas'] = "Resultados mostrados (" . $totalResultados . ")";
                }
          }
      }
      else{
        $limiteResultados = 500;
        
        //Visitas sin asignar
        if($filtro3 === null && ($filtro2 === null || $filtro2 === 'def' || $filtro2 === '0')){
            $querySinAsignar = $em->createQuery($sqlinicio .
                    'v.comercial is null AND v.jefeequipo is null AND ' . 
                    'v.contacto = 0 AND v.activo = 1 AND v.rescatar = 0 AND ' .
                    'v.resultadovisitas is null ' .
                    $sqlorder);      

             $totalResultados = count($querySinAsignar->getResult());

             $querySinAsignar->setMaxResults($limiteResultados);
             $params['visitasSinAsignar'] = $querySinAsignar->getResult();

             if($totalResultados > $limiteResultados){
                 $params['lblresSinAsignar'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
             }
             else{
                 $params['lblresSinAsignar'] = "Resultados mostrados (" . $totalResultados . ")";
             }
        }
              
        //Visitas en Jefe de Equipo
        if($filtro3 === null && ($filtro2 == null || $filtro2 === 'def' || $filtro2 === '1')){
            $queryJefeEquipo = $em->createQuery($sqlinicio . 
                 'v.jefeequipo is not null AND ' . 
                 'v.comercial is null AND ' .
                 'v.contacto = 0 AND v.activo = 1 AND v.rescatar = 0 AND ' .
                 'v.resultadovisitas is null ' .
                 $sqlorder);  

            $totalResultados = count($queryJefeEquipo->getResult());

             $queryJefeEquipo->setMaxResults($limiteResultados);
             $params['visitasJefeEquipo'] = $queryJefeEquipo->getResult();

             if($totalResultados > $limiteResultados){
                 $params['lblresJefeEquipo'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
             }
             else{
                 $params['lblresJefeEquipo'] = "Resultados mostrados (" . $totalResultados . ")";
             }
        }
      
        //Visitas en Comercial
        if($filtro3 === null && ($filtro2 == null || $filtro2 === 'def' || $filtro2 === '2')){
            $queryComercial = $em->createQuery($sqlinicio .
                    ' v.comercial is not null AND ' .
                    ' v.contacto = 0 and v.activo = 1 AND v.rescatar = 0 AND ' .
                    'v.resultadovisitas is null ' .
                    $filtro3 .
                    $sqlorder);

            $totalResultados = count($queryComercial->getResult());

             $queryComercial->setMaxResults($limiteResultados);
             $params['visitasComercial'] = $queryComercial->getResult();

             if($totalResultados > $limiteResultados){
                 $params['lblresComercial'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
             }
             else{
                 $params['lblresComercial'] = "Resultados mostrados (" . $totalResultados . ")";
             }
        }

        //Visitas Finalizadas
        if($filtro2 == null || $filtro2 === 'def' || $filtro2 === '3'){ 
            $queryFinalizada = $em->createQuery($sqlinicio .
                    ' v.resultadovisitas is not null and ' .
                    ' v.contacto = 0 and v.activo = 1 AND v.rescatar = 0 AND ' .
                    'v.resultadovisitas is not null ' .
                    $sqlorder);

            $totalResultados = count($queryFinalizada->getResult());

             $queryFinalizada->setMaxResults($limiteResultados);
             $params['visitasFinalizadas'] = $queryFinalizada->getResult();

             if($totalResultados > $limiteResultados){
                 $params['lblresFinalizadas'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
             }
             else{
                 $params['lblresFinalizadas'] = "Resultados mostrados (" . $totalResultados . ")";
             }
        }
        
        //Visitas En Rescate
        if($filtro2 == null || $filtro2 === 'def' || $filtro2 === '4'){ 
            $queryRescatadas = $em->createQuery($sqlinicio .
                    ' v.contacto = 0 AND v.activo = 1 AND v.rescatar = 1 ' .
                    $filtro3 .
                    $sqlorder);

            $totalResultados = count($queryRescatadas->getResult());

             $queryRescatadas->setMaxResults($limiteResultados);
             $params['visitasRescatadas'] = $queryRescatadas->getResult();

             if($totalResultados > $limiteResultados){
                 $params['lblresRescatadas'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
             }
             else{
                 $params['lblresRescatadas'] = "Resultados mostrados (" . $totalResultados . ")";
             }
        }
      }
      /*$querySinAsignar = $em->getRepository("iedeswebBundle:Visitas")->createQueryBuilder('v')
           ->where('v.creador = ' . $usuarioLogueado . ' and v.comercial is null and v.jefeequipo is null')
           ->orderBy('v.id', 'DESC')
           ->getQuery();
      $querySinAsignar->setMaxResults(300);

      $params['visitasSinAsignar'] = $querySinAsignar->getResult();*/
      
      $mes = new \DateTime(); $mes = $mes->format('m');
      $anio = new \DateTime(); $anio = $anio->format('Y');
      $stmt = $em->getConnection()
                ->prepare("select usuarios.id, concat(usuarios.nombre, ' ', usuarios.apellido1, ' ', " .
                        "usuarios.apellido2) as nombreCompleto, " .
                        "(select count(comercial) from visitas where " .
                        "((fecha_visita >= '" . $anio . "-" . $mes . "-01' or ".
                        "fecha_visita is null) and contacto = 0 and activo = 1) and " .
                        "comercial = usuarios.id) as asig from usuarios where rol = 2 and usuarios.activo = 1");
        
        $stmt->execute();
        $params['comerciales'] = $stmt->fetchAll();  
        $stmt = $em->getConnection()
                ->prepare("select usuarios.id, concat(usuarios.nombre, ' ', usuarios.apellido1, ' ', " .
                        "usuarios.apellido2) as nombreCompleto, " .
                        "(select count(comercial) from visitas where " .
                        "((fecha_visita >= '" . $anio . "-" . $mes . "-01' or ".
                        "fecha_visita is null) and contacto = 0 and activo = 1) and " .
                        "comercial = usuarios.id) as asig from usuarios where rol = 20 and usuarios.activo = 1");
        
        $stmt->execute();
        $params['jefescomocomerciales'] = $stmt->fetchAll();
        $params['jefes'] = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(20);
        
      return $this->render('iedeswebBundle:Visitas:index.html.php', $params);
   }
   
   public function crearcontactoAction(Request $request){

      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['idlogeado'] = $usuarioLogueado->getId();
      $params['delegaciones'] = $em->getRepository("iedeswebBundle:Sedes")->findByHaycomerciales(true);
      $params['jefes'] = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(20);
      $params['comerciales'] = $em->getRepository("iedeswebBundle:Usuarios")->findByRol(2);
      $params['canales'] = $em->getRepository("iedeswebBundle:Canales")->findAll();
      
      $rol = $usuarioLogueado->getRol(); 
      $params['rol'] = $rol; 
      $params['errors'] = null; 
      
      if($rol == 1){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para acceder a la vista de creación de visitas";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      if($request->getMethod() == 'POST'){
            
            if (isset($_POST['formCrearContacto' ])) {
                
                if($request->request->get('telefono1') !== '000000000'){
                    $telefono1 = $em->getRepository("iedeswebBundle:Visitas")->findOneByTelefono1(
                                 $request->request->get('telefono1'));
                    if($telefono1){
                        $errors[] = "Lo sentimos, ya existe una visita con ese número de teléfono. Puede que haya pulsado el botón de crear 2 veces seguidas. Si lo deseas, llama a algún controller con este ID: " . $telefono1->getId();
                    }
                }
               
                if($errors == null){
                
                    $visita = new Visitas();

                    $direccion = new Direcciones();
                    $direccion->setRoute($request->request->get('direccion'));
                    $direccion->setStreetNumber('0');
                    $direccion->setPostalCode($request->request->get('formcvpostal_code'));
                    $direccion->setLocality($request->request->get('formcvlocality'));
                    $direccion->setAdminarea3($request->request->get('formcvadministrative_area_level_3'));
                    $direccion->setAdminarea2($request->request->get('formcvadministrative_area_level_2'));
                    $direccion->setAdminarea1($request->request->get('formcvadministrative_area_level_1'));
                    $direccion->setCountry($request->request->get('formcvcountry'));

                    $visita->setDireccion($direccion);  
                    $visita->setCreador($usuarioLogueado);
                    $visita->setNombre($request->request->get('nombre'));
                    $visita->setApellido1($request->request->get('apellido1'));  
                    $visita->setApellido2($request->request->get('apellido2')); 
                    $visita->setTelefono1($request->request->get('telefono1'));
                    $visita->setTelefono2($request->request->get('telefono2')); 
                    $visita->setEmail($request->request->get('email'));
                    $visita->setMiembros($request->request->get('miembros'));
                    $visita->setNotas($request->request->get('notas'));

                    if($termogas = $request->request->get('termogas')){
                        $visita->setTermogas(true);
                    }
                    else{
                        $visita->setTermogas(false);
                    }
                    if($termoelec = $request->request->get('termoelec')){
                        $visita->setTermoelectrico(true);
                    }
                    else{
                        $visita->setTermoelectrico(false);
                    }
                    if($caldera = $request->request->get('caldera')){
                        $visita->setCaldera(true);
                    }
                    else{
                        $visita->setCaldera(false);
                    }
                    if($request->request->get('externo')){
                        $visita->setEquipoexterno(true);
                    }
                    else{
                        $visita->setEquipoexterno(false);
                    }

                    $canalid = $request->request->get('canal');
                    if($canalid !== null){
                        $canalelegido = $em->getRepository("iedeswebBundle:Canales")->findOneById($canalid);                
                        if($canalelegido){
                            $visita->setCanal($canalelegido);
                        }
                        else{
                            $errors[] = "Introduzca un canal válido";
                            $params['errors'] = $errors;
                            return $this->render('iedeswebBundle:Visitas:crearVisita.html.php', $params);
                        }   
                    } 
                    else{
                        if($rol === 2){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(13)); }
                        else if($rol === 10){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(14)); }
                        else if($rol === 31){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(5)); }
                        else if($rol === 21){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(5)); }
                        else if($rol === 32){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(4)); }
                        else if($rol === 33){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(6)); }   
                        else if($rol === 30){ $visita->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(16)); }   
                    }


                    $delegacionid = $request->request->get('delegacion');
                    if($delegacionid === null){
                        $visita->setDelegacion($usuarioLogueado->getDelegacion());
                    }
                    else{
                        $delegacion = $em->getRepository("iedeswebBundle:Sedes")->findOneById($delegacionid);                
                        if($delegacion){
                            $visita->setDelegacion($delegacion);
                        }
                        else{
                            $errors[] = "Introduzca una delegación válida";
                            $params['errors'] = $errors;
                            return $this->render('iedeswebBundle:Contactos:crearContacto.html.php', $params);
                        }
                    }                             

                    $visita->setContacto(true);
                    $visita->setRescatar(false);
                    $visita->setActivo(true);

                    //persistencia  

                    $visita->setFecha(new \DateTime());    

                    try{
                        //se almacena la orden en la base de datos
                        $em->persist($direccion);
                        $em->persist($visita);
                        $em->flush();

                        //rellenamos el campo to del mail
                        $to = $this->toMail($visita, $em);

                        $paramsEmail['datos'] = $this->datosEmail($visita);
                        $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/".$visita->getId()."'>http://www.iedes.com/intranet/visitas/".$visita->getId()."</a>";

                        $paramsEmail['nombreformulario'] = 'CONTACTO CREADO';
                        $this->get("email_service")->sendmail( 
                              array('correoweb@iedes.com' => 'Intranet iEDES'),
                              $to,
                              'Nuevo Contacto Creado',
                              $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                    }catch(Exception $e){
                        $em->getConnection()->rollBack();
                        $em->close();
                        throw $e;
                    }

                    $params['ok'] = "Contacto creado correctamente";
                }
          } 
      }

      return $this->render('iedeswebBundle:Contactos:crearContacto.html.php', $params);	
   } 
   
  public function listadoContactosAction(Request $request, $idcontacto){
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();

      $rol = $usuarioLogueado->getRol(); 
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['idlogeado'] = $usuarioLogueado->getId();
      $params['canales'] = $em->getRepository("iedeswebBundle:Canales")->findAll();
      $params['delegaciones'] = $em->getRepository("iedeswebBundle:Sedes")->findByHaycomerciales(true);
      $params['estados'] = $em->getRepository("iedeswebBundle:EstadoContactos")->findByActivo(true);
      $params['creadores'] = $em->getRepository("iedeswebBundle:Usuarios")->findBy(
               array('activo' => true),
               array('apellido1' => 'ASC'));
      $params['rol'] = $rol;
      $params['errors'] = null; 
      
      if($rol == 1){
          $errors[] = "Lo sentimos, no tiene usted los permisos necesarios para acceder a los contactos";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Default:intranet.html.php', $params);	
      }
      
      if($idcontacto !== null){
        //contactos
        $contacto = $em->getRepository("iedeswebBundle:Visitas")->findOneById($idcontacto);
        if($contacto === null){
            $errors[] = "Lo sentimos, el contacto no existe";
            $params['errors'] = $errors;	
        }
        else if($contacto && $contacto->getContacto() === 0){
            $errors[] = "Lo sentimos, el contacto ya ha sido convertido en visita";
            $params['errors'] = $errors;	
        }

        if($params['errors'] === null){
           if($request->getMethod() == 'POST') {
               //aqui hay que ver si se ha pulsado un botón u otro y pasar de contacto a visita
           }
        }
      }     
      
      $filtro = null;
      $filtro2= null;
      
      if($request->getMethod() == 'POST'){
          
          //obtenemos los filtros
            $filtro =  $request->request->get('filtro');
            $filtro2 = $request->request->get('filtroestado');

            $params['filtro'] = $filtro;
            $params['filtro2'] = $filtro2;

            if($filtro2 !== "def" && $filtro2 !== ""){
                $filtro2 = " AND v.estadocontactos = " . $filtro2;
            }
            else{
                $filtro2 = null;
            }
          
          
            if (isset($_POST['formConvertirContacto' ])) {
                
                $creadorid = $request->request->get('creador');
                $creador = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($creadorid);
                if($creador){
                    $contacto->setCreador($creador);
                }
                else{
                    $contacto->setCreador($usuarioLogueado);
                }
                
                $contacto->setNotas($request->request->get('notas') . '. ' . $contacto->getNotas());
                
                $canalid = $request->request->get('canal');
                if($canalid !== null){
                    $canalelegido = $em->getRepository("iedeswebBundle:Canales")->findOneById($canalid);                
                    if($canalelegido){
                        $contacto->setCanal($canalelegido);
                    }
                    else{
                        $errors[] = "Introduzca un canal válido";
                        $params['errors'] = $errors;
                    }   
                } 
                else{
                    if($rol === 2){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(13)); }
                    else if($rol === 31){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(5)); }
                    else if($rol === 21){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(5)); }
                    else if($rol === 32){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(4)); }
                    else if($rol === 33){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(6)); }   
                    else if($rol === 30){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(16)); }   
                }
                
                if($params['errors'] === null){
                    $contacto->setJefeequipo(null);
                    if($rol === 2){
                        $contacto->setComercial($usuarioLogueado);
                    }
                    else{
                        $contacto->setComercial(null);
                    }
              
                    $date=$request->request->get('fecha');
                    $time=$request->request->get('hora');

                    if($date !== '' && $time !== ''){
                        $fechavisita = $date . ' ' . $time;
                        $fechavisita = new \DateTime($fechavisita);
                        $contacto->setFechaVisita($fechavisita);
                    }
                    $contacto->setFecha(new \DateTime());
                    $contacto->setContacto(false);       
                    $contacto->setEstadoContactos(null);

                    //persistencia  
                    try{
                        //se almacena la orden en la base de datos
                        $em->persist($contacto);
                        $em->flush();

                        //rellenamos el campo to del mail
                        $to = $this->toMail($contacto, $em);

                        $paramsEmail['datos'] = $this->datosEmail($contacto);
                        $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/".$contacto->getId()."'>http://www.iedes.com/intranet/visitas/".$contacto->getId()."</a>";

                        $paramsEmail['nombreformulario'] = 'CONTACTO CONVERTIDO';
                        $this->get("email_service")->sendmail( 
                            array('correoweb@iedes.com' => 'Intranet iEDES'),
                            $to,
                            'Contacto Convertido',
                            $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                    }catch(Exception $e){
                      $em->getConnection()->rollBack();
                      $em->close();
                      throw $e;
                    }
                
                    $params['ok'] = "Contacto convertido correctamente";
                }
            }
            
            else if (isset($_POST['formActualizarEstado' ])) {
                $estadoid = $request->request->get('estado');
                $estado = $em->getRepository("iedeswebBundle:EstadoContactos")->findOneById($estadoid);
                if($estado){
                    $contacto->setEstadoContactos($estado);
                }
                else{
                    $contacto->setEstadoContactos(null);
                }
                
                if($request->request->get('notas')){
                    $contacto->setNotas($request->request->get('notas') . '. ' . $contacto->getNotas());
                }
                
                $contacto->setFechaVisita(new \DateTime());
                $contacto->setCreador($usuarioLogueado);
                
                //persistencia  
                try{
                    //se almacena la orden en la base de datos
                    $em->persist($contacto);
                    $em->flush();

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Contacto actualizado correctamente";
            }
      }
      
      
        $sqlinicio = "SELECT v
                FROM iedeswebBundle:Visitas v, iedeswebBundle:Direcciones d
                WHERE v.direccion = d.id AND";
        $sqlfinal = " (d.locality like '%" . $filtro . "%' OR" .
                    " d.postalCode like '%" . $filtro . "%' OR v.id like '%" . $filtro . "%' OR" .
                    " v.nombre like '%" . $filtro . "%' OR v.apellido1 like '%" . $filtro . "%' OR" .
                    " v.apellido2 like '%" . $filtro . "%' OR v.telefono1 like '%" . $filtro . "%' OR" .
                    " v.telefono2 like '%" . $filtro . "%' ) " . 
                    $filtro2 .
                    " and v.activo = 1 and v.contacto = 1 order by v.id desc";
        
         if($rol === 50 || $rol === 100){
            $query = $em->createQuery($sqlinicio . $sqlfinal);
            $limiteResultados = 500;
         }
         else if($rol === 21 || $rol === 30 || $rol === 31){
            $query = $em->createQuery($sqlinicio . 
                    "(v.creador = " . $usuarioLogueado->getId() . "OR ".
                    " v.rescatador = " .  $usuarioLogueado->getId() . ") AND" .
                    $sqlfinal
                    );
            $limiteResultados = 100;
         }
         else{
            $query = $em->createQuery($sqlinicio . 
                    " v.creador = " . $usuarioLogueado->getId() . " AND" .
                    $sqlfinal);
            $limiteResultados = 100;
         }
      
         
         $totalResultados = count($query->getResult());
         
         $query->setMaxResults($limiteResultados);
         $params['visitas'] = $query->getResult();
         
         if($totalResultados > $limiteResultados){
             $params['lblres'] = "Hay más resultados de los mostrados (" . $limiteResultados . ")";
         }
         else{
             $params['lblres'] = "Resultados mostrados (" . $totalResultados . ")";
         }

      return $this->render('iedeswebBundle:Contactos:index.html.php', $params);
   }
   
  public function convertirContactoAction(Request $request, $idcontacto, $filtro, $filtro2){
      
      $em = $this->getDoctrine()->getManager();
      $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();

      $rol = $usuarioLogueado->getRol(); 
      $params['nicklogeado'] = $usuarioLogueado->getNick();
      $params['canales'] = $em->getRepository("iedeswebBundle:Canales")->findAll();
      $params['delegaciones'] = $em->getRepository("iedeswebBundle:Sedes")->findByHaycomerciales(true);
      $params['estados'] = $em->getRepository("iedeswebBundle:EstadoContactos")->findByActivo(true);
      $params['creadores'] = $em->getRepository("iedeswebBundle:Usuarios")->findBy(
               array('activo' => true),
               array('apellido1' => 'ASC'));
      $params['rol'] = $rol;
      $params['errors'] = null; 
      
      $contacto = $em->getRepository("iedeswebBundle:Visitas")->findOneById($idcontacto);
      if(!$contacto){
          $errors[] = "Lo sentimos, no hay un contacto que convertir";
          $params['errors'] = $errors;
          return $this->render('iedeswebBundle:Contactos:menu.html.php', $params);	
      }
      $params['contacto'] = $contacto;   
      
      if($request->getMethod() == 'POST'){
            if (isset($_POST['formConvertirContacto' ])) {
                
                $creadorid = $request->request->get('creador');
                $creador = $em->getRepository("iedeswebBundle:Usuarios")->findOneById($creadorid);
                if($creador){
                    $contacto->setCreador($creador);
                }
                else{
                    $contacto->setCreador($usuarioLogueado);
                }
                
                $contacto->setNotas($request->request->get('notas') . '. ' . $contacto->getNotas());
                
                $canalid = $request->request->get('canal');
                if($canalid !== null){
                    $canalelegido = $em->getRepository("iedeswebBundle:Canales")->findOneById($canalid);                
                    if($canalelegido){
                        $contacto->setCanal($canalelegido);
                    }
                    else{
                        $errors[] = "Introduzca un canal válido";
                        $params['errors'] = $errors;
                        return $this->render('iedeswebBundle:Contactos:menu.html.php', $params);
                    }   
                } 
                else{
                    if($rol === 2){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(13)); }
                    else if($rol === 31){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(5)); }
                    else if($rol === 21){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(5)); }
                    else if($rol === 32){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(4)); }
                    else if($rol === 33){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(6)); }   
                    else if($rol === 30){ $contacto->setCanal($em->getRepository("iedeswebBundle:Canales")->findOneById(16)); }   
                }
                
                $contacto->setJefeequipo(null);
                if($rol === 2){
                    $contacto->setComercial($usuarioLogueado);
                }
                else{
                    $contacto->setComercial(null);
                }
                
                $directoa = $this->directoA($contacto);
              
                $date=$request->request->get('fecha');
                $time=$request->request->get('hora');
                
                if($date !== '' && $time !== ''){
                    $fechavisita = $date . ' ' . $time;
                    $fechavisita = new \DateTime($fechavisita);
                    $contacto->setFechaVisita($fechavisita);
                }
                $contacto->setFecha(new \DateTime());
                $contacto->setContacto(false);       
                $contacto->setEstadoContactos(null);
                
                //persistencia  
                try{
                    //se almacena la orden en la base de datos
                    $em->persist($contacto);
                    $em->flush();
                    
                    //envio de mail a iEDES
                    $to = $this->toMail($contacto, $em);

                    $datos = $this->datosEmail($contacto);
                    $datos['Creador'] = $contacto->getCreador()->getNombreCompleto();
                    $paramsEmail['datos'] = $datos;
                    
                    $paramsEmail['subtitulo'] = "<a href='http://www.iedes.com/intranet/visitas/".$contacto->getId()."'>http://www.iedes.com/intranet/visitas/".$contacto->getId()."</a>";
                    $paramsEmail['nombreformulario'] = 'CONTACTO CONVERTIDO';

                    $this->get("email_service")->sendmail( 
                          array('correoweb@iedes.com' => 'Intranet iEDES'),
                          $to,
                          'Contacto Convertido',
                          $this->renderView('iedeswebBundle:AutoEmails:formularioInterno.html.php', $paramsEmail));

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Contacto convertido correctamente";
            }
            
            else if (isset($_POST['formActualizarEstado' ])) {
                $estadoid = $request->request->get('estado');
                $estado = $em->getRepository("iedeswebBundle:EstadoContactos")->findOneById($estadoid);
                if($estado){
                    $contacto->setEstadoContactos($estado);
                }
                else{
                    $contacto->setEstadoContactos(null);
                }
                
                if($request->request->get('notas')){
                    $contacto->setNotas($request->request->get('notas') . '. ' . $contacto->getNotas());
                }
                
                $contacto->setFechaVisita(new \DateTime());
                
                //persistencia  
                try{
                    //se almacena la orden en la base de datos
                    $em->persist($contacto);
                    $em->flush();

                }catch(Exception $e){
                    $em->getConnection()->rollBack();
                    $em->close();
                    throw $e;
                }
                
                $params['ok'] = "Contacto convertido correctamente";
            }
      }
      
      if (isset($_POST['formFiltroContactos'])) {
            $filtro = $request->request->get('filtro');
            $filtro2 = $request->request->get('filtroestado');
      }
      if($filtro2 && $filtro2 !== "def"){
          $filtro2 = " AND v.estadocontactos = " . $filtro2;
      }
      else{
          $filtro2 = "";
      }
      
      if($rol === 50 || $rol === 100){
          $query = $em->createQuery(
              "SELECT v
              FROM iedeswebBundle:Visitas v, iedeswebBundle:Direcciones d
              WHERE v.direccion = d.id and (d.locality like '%" . $filtro . "%' OR".
                  " d.postalCode like '%" . $filtro . "%') " . $filtro2 .
                  " and v.activo = 1 and v.contacto = 1 order by v.id desc");
      }
      else if($rol === 21 || $rol === 30 || $rol === 31){
          $query = $em->createQuery(
              "SELECT v
              FROM iedeswebBundle:Visitas v, iedeswebBundle:Direcciones d
              WHERE v.creador is null" .
                  " and v.direccion = d.id and (d.locality like '%" . $filtro . "%' or d.postalCode like '%" . $filtro . "%')" .
                  " and v.activo = 1 and v.contacto = 1 order by v.id desc");
      }
      else{
          $query = $em->createQuery(
              "SELECT v
              FROM iedeswebBundle:Visitas v, iedeswebBundle:Direcciones d
              WHERE v.creador = " . $usuarioLogueado->getId() .
                  " and v.direccion = d.id and (d.locality like '%" . $filtro . "%' or d.postalCode like '%" . $filtro . "%')" .
                  " and v.activo = 1 and v.contacto = 1 order by v.id desc");
      }
      $query->setMaxResults(100);
      
      $params['visitas'] = $query->getResult();
       
      return $this->render('iedeswebBundle:Contactos:listado.html.php', $params);	
   } 
   
   public function casilogedAction(){
       $usuarioLogeado = $this->container->get('security.context')->getToken()->getUser();
       
       return $this->redirect(
            $this->generateUrl('usuario_loged', array(
                'nick' => $usuarioLogeado->getNick()
            ))
        );
   }
   
   public function menuUsuariosAction(){
        $em = $this->getDoctrine()->getManager();
        $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      
        $rol = $usuarioLogueado->getRol();
        $params['nicklogeado'] = $usuarioLogueado->getNick();
        $params['idlogeado'] = $usuarioLogueado->getId();
        $params['rol'] = $rol; 
        
        if($rol != 20 && $rol != 50 && $rol != 100){
                    $errors[] = "Lo sentimos, no tienes permiso para acceder a esta zona";
                    $params['errors'] = $errors;
                    return $this->render('iedeswebBundle:Default:intranet.html.php', $params);
                }

        return $this->render('iedeswebBundle:Usuarios:menu.html.php', $params);
    }
    
   public function menuVisitasAction(){
        $em = $this->getDoctrine()->getManager();
        $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      
        $params['rol'] = $usuarioLogueado->getRol(); 
        
        return $this->render('iedeswebBundle:Visitas:menu.html.php', $params);
    }
    
   public function menuContactosAction(){
        $em = $this->getDoctrine()->getManager();
        $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
      
        $params['rol'] = $usuarioLogueado->getRol(); 
        
        return $this->render('iedeswebBundle:Contactos:menu.html.php', $params);
    }
   
   private function validationRegister($em , $usuarioForm){
   
       $errors = array();
       
       $nick = $em->getRepository('iedeswebBundle:Usuarios')->findOneByNick($usuarioForm->getNick());   
        if($nick){
             $errors[] = "El nick ya está siendo utilizado por otro usuario.";
         }
         
         //email
        $mail = $em->getRepository('iedeswebBundle:Usuarios')->findOneByEmail($usuarioForm->getEmail());   
        if($mail){
             $errors[] = "El email ya está siendo utilizado por otro usuario.";
        }

        return $errors;
   }
   
    private function validationEdicion($em , $usuarioForm){
   
       $errors = array();

        //email
        $mail = $em->getRepository('iedeswebBundle:Usuarios')->findOneByEmail($usuarioForm->getEmail());   
        if($mail && ($mail !== $usuarioForm)){
             $errors[] = "El email ya está siendo utilizado por otro usuario.";
        }

        return $errors;
   }
  
    protected function generatePassword($max){
        $values = "0123456789";
        $randval = "";
        for($i=0; $i<$max; $i++){
            $randval.= $values[mt_rand(0, strlen($values)-1)];
        }

        return $randval;
    }
   
    public function datosDiciembreAction(){
        
        $em = $this->getDoctrine()->getManager();
        $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
        $params["usuariologueado"] = $usuarioLogueado;
        $rol = $usuarioLogueado->getRol();
        $res = array();

        $stmt = $em->getConnection()
                ->prepare("select distinct(visitas.id), creador, date(fecha_instalacion) as diainstalacion, date(fecha_cierre) as diacierre, " .
                        "resultadovisitas.nombre as resultado, resultadovisitas.id as numres, canales.nombre as canal, tipoequipo.nombre as equipo, " .
                        "tipoequipo.id as numequipo, pe1.nombre extra1, pe2.nombre extra2 " .
                        "from visitas " .
                        "left join usuarios on ((visitas.creador = usuarios.id) or (visitas.comercial = usuarios.id) or " .
                        "(visitas.rescatador = usuarios.id)) " .
                        "left join canales on visitas.canal = canales.id " .
                        "left join resultadovisitas on visitas.resultadovisitas = resultadovisitas.id " .
                        "left join tipoequipo on tipoequipo.id = visitas.tipoequipo " .
                        "left join productoextra pe1 on pe1.id = productoextra " .
                        "left join productoextra pe2 on pe2.id = productoextra2 " .
                        "where visitas.activo = 1 " .
                        "AND ((date(fecha_instalacion) >= '2015-12-01' AND date(fecha_instalacion) <= '2015-12-31') OR " .
                        "(date(fecha_cierre) >= '2015-12-01' " .
                        "AND date(fecha_cierre) <= '2015-12-31') OR   (date(fecha_rescate) >= '2015-12-01' AND date(fecha_rescate) <= '2015-12-31') OR " .
                        "(date(fecha) >= '2015-12-01' AND date(fecha) <= '2015-12-31' AND date(fecha_cierre) is NULL))  and usuarios.id = " . $usuarioLogueado->getId() .
                        " order by resultadovisitas, diainstalacion, diacierre");
        
        $stmt->execute();
        $resAux = $stmt->fetchAll();
        $params['datoss'] = $resAux;
        
        if ($resAux){
            foreach ($resAux as $r){
                if ($r["numres"] == 6){
                    $params["instalaciones6"][] = $r;
                    $params["entradas"][] = $r;
                }

                else if($r["numres"] == 0 || $r["numres"] == 1 || $r["numres"] == 7 || $r["numres"] == 8 || 
                        $r["numres"] == 9 || $r["numres"] == 11 || $r["numres"] == 12){
                    $params["otras"][] = $r;
                }

                else if ($r["numres"] == 13){
                    $params["instalaciones13"][] = $r;
                    $params["entradas"][] = $r;
                }
                else if ($r["numres"] == 2 || $r["numres"] == 3 || $r["numres"] == 4 || 
                        $r["numres"] == 5 || $r["numres"] == 10){
                    $params["entradas"][] = $r;
                }
            }
        }
        
        //despues de ver todas las visitas, tenemos que eliminar aquellas que ya han sido abonadas
        $stmt = $em->getConnection()
                ->prepare("(select distinct(visitas.id) from visitas, visitasprerescate where visitas.id = visitasprerescate.visita " .
                        "and (visitas.resultadovisitas = 2 or visitas.resultadovisitas = 3 or visitas.resultadovisitas = 4 or visitas.resultadovisitas = 5 " .
                        "or visitas.resultadovisitas = 6 or visitas.resultadovisitas = 10 or visitas.resultadovisitas = 13) " .
                        "and date(visitas.fecha_cierre) >= '2015-12-01' AND date(visitas.fecha_cierre) <= '2015-12-31' and visitas.creador = " . $usuarioLogueado->getId() . ") " .  
                        "Union " . 
                        "(select distinct(visitasprerescate.visita) from visitasprerescate, visitas where visitas.id = visitasprerescate.visita " . 
                        "and (visitas.resultadovisitas = 2 or visitas.resultadovisitas = 3 or visitas.resultadovisitas = 4 or visitas.resultadovisitas = 5 " .
                        "or visitas.resultadovisitas = 6 or visitas.resultadovisitas = 10 or visitas.resultadovisitas = 13) " .
                        "and date(visitasprerescate.fecha_cierre) >= '2015-12-01' AND date(visitasprerescate.fecha_cierre) <= '2015-12-31' and visitas.creador = " . $usuarioLogueado->getId() . "" . $usuarioLogueado->getId() . ")");
        
        $stmt->execute();
        $elim = $stmt->fetchAll();

        if($elim){
            foreach ($elim as $e){
                $stmt2 = $em->getConnection()
                    ->prepare("SELECT visitas.id FROM visitas, visitasprerescate WHERE visitasprerescate.visita = visitas.id and visitas.id = " . $e["id"] .
                            " and visitasprerescate.fecha_cierre < '2015-12-01' and (visitasprerescate.resultadovisitas = 2 or " .
                            "visitasprerescate.resultadovisitas = 3 or visitasprerescate.resultadovisitas = 4 or visitasprerescate.resultadovisitas = 5 " .
                            "or visitasprerescate.resultadovisitas = 6 or visitasprerescate.resultadovisitas = 10 or " .
                            "visitasprerescate.resultadovisitas = 13)");
                $stmt2->execute();
                $pagadas = $stmt2->fetchAll();

                if($pagadas){
                    foreach ($pagadas as $p){
                        $params["pagadas"][] = $p["id"];
                    }
                }
            }
        }
        
        return $this->render('iedeswebBundle:Usuarios:datosdiciembre.html.php', $params);
    }
    
    public function datosEneroAction(){
        
        $em = $this->getDoctrine()->getManager();
        $usuarioLogueado = $this->container->get('security.context')->getToken()->getUser();
        //$params["usuariologueado"] = $usuarioLogueado;
        $rol = $usuarioLogueado->getRol();
        $superRes = array();
        
        $usuarios = null;
        if ($rol == 50 or $rol == 100){
            $usuarios = $em->getRepository("iedeswebBundle:Usuarios")->findByActivo(1);
        }
        else{
            $usuarios[] = $usuarioLogueado;
        }

        foreach($usuarios as $u) {
            $stmt = $em->getConnection()
                ->prepare("select distinct(visitas.id), creador, date(fecha_instalacion) as diainstalacion, date(fecha_cierre) as diacierre, " .
                        "resultadovisitas.nombre as resultado, resultadovisitas.id as numres, canales.nombre as canal, tipoequipo.nombre as equipo, " .
                        "tipoequipo.id as numequipo, pe1.nombre extra1, pe2.nombre extra2 " .
                        "from visitas " .
                        "left join usuarios on ((visitas.creador = usuarios.id) or (visitas.comercial = usuarios.id) or " .
                        "(visitas.rescatador = usuarios.id)) " .
                        "left join canales on visitas.canal = canales.id " .
                        "left join resultadovisitas on visitas.resultadovisitas = resultadovisitas.id " .
                        "left join tipoequipo on tipoequipo.id = visitas.tipoequipo " .
                        "left join productoextra pe1 on pe1.id = productoextra " .
                        "left join productoextra pe2 on pe2.id = productoextra2 " .
                        "where visitas.activo = 1 " .
                        "AND ((date(fecha_instalacion) >= '2016-01-01' AND date(fecha_instalacion) <= '2016-01-31') OR " .
                        "(date(fecha_cierre) >= '2016-01-01' " .
                        "AND date(fecha_cierre) <= '2016-01-31') OR   (date(fecha_rescate) >= '2016-01-01' AND date(fecha_rescate) <= '2016-01-31') OR " .
                        "(date(fecha) >= '2016-01-01' AND date(fecha) <= '2016-01-31' AND date(fecha_cierre) is NULL))  and usuarios.id = " . $u->getId() .
                        " order by resultadovisitas, diainstalacion, diacierre");
        
            $stmt->execute();
            $resAux = $stmt->fetchAll();
            $params['datoss'] = $resAux;
            $params["instalaciones6"] = null; $params["instalaciones13"] = null;
            $params['entradas'] = null; $params["otras"] = null; $params["pagadas"] = null;
            
            
            if ($resAux){
                foreach ($resAux as $r){
                    if ($r["numres"] == 6){
                        $params["instalaciones6"][] = $r;
                        $params["entradas"][] = $r;
                    }

                    else if ($r["numres"] == 13){
                        $params["instalaciones13"][] = $r;
                        $params["entradas"][] = $r;
                    }
                
                    else if($r["numres"] == 0 || $r["numres"] == 1 || $r["numres"] == 7 || $r["numres"] == 8 || 
                            $r["numres"] == 9 || $r["numres"] == 11 || $r["numres"] == 12){
                        $params["otras"][] = $r;
                    }

                    else if ($r["numres"] == 2 || $r["numres"] == 3 || $r["numres"] == 4 || 
                            $r["numres"] == 5 || $r["numres"] == 10){
                        $params["entradas"][] = $r;
                    }
                }
            }
        
            //despues de ver todas las visitas, tenemos que eliminar aquellas que ya han sido abonadas
            $stmt = $em->getConnection()
                ->prepare("(select distinct(visitas.id) from visitas, visitasprerescate where visitas.id = visitasprerescate.visita " .
                        "and (visitas.resultadovisitas = 2 or visitas.resultadovisitas = 3 or visitas.resultadovisitas = 4 or visitas.resultadovisitas = 5 " .
                        "or visitas.resultadovisitas = 6 or visitas.resultadovisitas = 10 or visitas.resultadovisitas = 13) " .
                        "and date(visitas.fecha_cierre) >= '2015-12-01' AND date(visitas.fecha_cierre) <= '2015-12-31' and visitas.creador = " . $usuarioLogueado->getId() . ") " .  
                        "Union " . 
                        "(select distinct(visitasprerescate.visita) from visitasprerescate, visitas where visitas.id = visitasprerescate.visita " . 
                        "and (visitas.resultadovisitas = 2 or visitas.resultadovisitas = 3 or visitas.resultadovisitas = 4 or visitas.resultadovisitas = 5 " .
                        "or visitas.resultadovisitas = 6 or visitas.resultadovisitas = 10 or visitas.resultadovisitas = 13) " .
                        "and date(visitasprerescate.fecha_cierre) >= '2015-12-01' AND date(visitasprerescate.fecha_cierre) <= '2015-12-31' and visitas.creador = " . $usuarioLogueado->getId() . "" . $usuarioLogueado->getId() . ")");
        
            $stmt->execute();
            $elim = $stmt->fetchAll();

            if($elim){
                foreach ($elim as $e){
                    $stmt2 = $em->getConnection()
                        ->prepare("SELECT visitas.id FROM visitas, visitasprerescate WHERE visitasprerescate.visita = visitas.id and visitas.id = " . $e["id"] .
                                " and visitasprerescate.fecha_cierre < '2015-12-01' and (visitasprerescate.resultadovisitas = 2 or " .
                                "visitasprerescate.resultadovisitas = 3 or visitasprerescate.resultadovisitas = 4 or visitasprerescate.resultadovisitas = 5 " .
                                "or visitasprerescate.resultadovisitas = 6 or visitasprerescate.resultadovisitas = 10 or " .
                                "visitasprerescate.resultadovisitas = 13)");
                    $stmt2->execute();
                    $pagadas = $stmt2->fetchAll();

                    if($pagadas){
                        foreach ($pagadas as $p){
                            $params["pagadas"][] = $p["id"];
                        }
                    }
                }
            }
            $superRes[] = array("usuario" => $u, "datos" => $params);
        }
        
        $params2["superRes"] = $superRes;
        return $this->render('iedeswebBundle:Usuarios:datosenero.html.php', $params2);
    }
    
    
    public function catalogosAction(){
        //$request->setLocale($this->get('session')->get('_locale'));
        return $this->render('iedeswebBundle:Usuarios:catalogos.html.php');
    }

}
