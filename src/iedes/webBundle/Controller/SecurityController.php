<?php

namespace iedes\webBundle\Controller;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gleezu\WebBundle\Entity\Usuarios;
use Gleezu\WebBundle\Entity\Recuperar;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class SecurityController extends Controller
{

    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        $error = $request->attributes->get(
              SecurityContext::AUTHENTICATION_ERROR,
              $session->get(SecurityContext::AUTHENTICATION_ERROR)
        );
         
        if($error){
            $errors[] = "Lo sentimos usuario o contraseña incorrectos. <br>Si el error persiste, póngase en contacto con algún controller";
            $params['errors'] = $errors;
        }

        $params['last_username'] = $session->get(SecurityContext::LAST_USERNAME); 
        return $this->render('iedeswebBundle:Security:login.html.php', $params); 
    }
    
    public function loginasAction($idusuario, Request $request){
        
        $em = $this->getDoctrine()->getManager();
        //$params = &$this->params;
        
        $current_user = $this->get('security.context')->getToken()->getUser(); 
        $params['nicklogeado'] = $current_user->getNick();
        
        if($current_user->getRol() != 100 && $current_user->getRol() != 50){
            $errors[] = "Usted no tiene permisos para esta acción";
            $params['errors'] = $errors;
            $params['rol'] = $current_user->getRol();
            return $this->render('iedeswebBundle:Default:intranet.html.php', $params);
        }

        $usuario = $em->getRepository('iedeswebBundle:Usuarios')->findOneById($idusuario);
        if($usuario == null){
            $errors[] = "El usuario para login as no existe";
            $params['errors'] = $errors;
            $params['rol'] = $current_user->getRol();
            return $this->render('iedeswebBundle:Default:intranet.html.php', $params);
        }

        if($current_user == "anon." || $idusuario != $current_user->getNick()){
            $this->get('security.context')->getToken()->setUser($usuario);
            //return $this->redirect($this->generateUrl("index", $params));
            return $this->redirect($this->generateUrl("intranet"));
        }
        else {
            $errors[] = "El usuario solicitado es usted!";
            $params['errors'] = $errors;
            $params['rol'] = $current_user->getRol();
            return $this->render('iedeswebBundle:Default:intranet.html.php', $params); 
        }  
    }
}