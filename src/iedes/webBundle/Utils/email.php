<?php

namespace iedes\webBundle\Utils;

class email{
    
    private $em;
    private $contenedor;
    
    function __construct($em, $contenedor) {
        $this->em = $em;
        $this->contenedor = $contenedor;
    }
    
    /**
     * 
     * @param form $form -> ej: $this
     * @param array $from -> ej: array('mail@mail.com' => 'Mail de información de empresa')
     * @param array $to ->ej: array('diego.garciaarriaza@gmail.com')
     * @param string $subject
     * @param string $body
     * 
     * email::sendmail($this, 
               array('mail@mail.com' => 'Mail de información de empresa'),
               array('diego.garciaarriaza@gmail.com'),
               null,
              'Ejemplo de prueba', 
              'con funcion externa');
     */
    public function sendMail($from, $to, $subject, $body, $attachment = null){
        
        //$file = fopen("fich.txt", "w+"); 
        //fwrite($file, 'hola'); 
        //fclose($file);
        
        /*$message = \Swift_Message::newInstance()
              ->setFrom($from)
              ->setTo($to)
              ->setSubject($subject)
              ->setBody($body);
        
        if(isset($attachment) && $attachment != null){
            $ext = $attachment->guessExtension();
            if($ext === 'pdf'){
                $message->attach(\Swift_Attachment::newInstance($attachment, 'curriculo.pdf', 'application/pdf'));
            }
            else if($ext === 'doc'){
                $message->attach(\Swift_Attachment::newInstance($attachment, 'curriculo.doc', 'application/msword'));
            }
            else if($ext === 'docx'){
                $message->attach(\Swift_Attachment::newInstance($attachment, 'curriculo.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'));
            }
        }
          
         
        $this->contenedor->get('mailer')->send($message);*/
        
        $mailer = new \Swift_Mailer(new \Swift_MailTransport());

        $message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setTo($to) 
                    ->setFrom($from)
                    ->setBody($body)
                    ->setContentType("text/html");
        
        if(isset($attachment) && $attachment != null){
                    $message->attach(\Swift_Attachment::fromPath($attachment));
        }

        $mailer->send($message);
    }
}
