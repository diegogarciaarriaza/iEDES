<?php
namespace iedes\webBundle\Command;
 
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use iedes\webBundle\Utils\utils;
 
class RescatarComercialNoInteresadoCommand extends ContainerAwareCommand{
    
    protected function configure(){
    
        $this->setName('visitas:rescate_comercial_no_interesado')
            ->setDescription('Convierte en rescatable las visitas con comercial no interesado')
            ->addArgument('my_argument', InputArgument::OPTIONAL);
    }
 
    protected function execute(InputInterface $input, OutputInterface $output){
    
        $contenedor = $this->getContainer();
        $em = $this->getContainer()->get('doctrine')->getManager();
        
        $query = $em->getRepository("iedeswebBundle:Visitas")->createQueryBuilder('v')
              ->where("v.activo = 1 and v.contacto = 0 and v.resultadovisitas = 0 and v.rescatar = 0")
              ->orderBy('v.fechaVisita', 'DESC')
              ->getQuery();
        
        $rescatadas = $query->getResult();
        $to[] = "controller@iedes.com";
        
        $msg = "";
        $output->write(count($rescatadas) . " --> ");
        foreach ($rescatadas as $visita) { //$output->write($visita->getId());
            //$output->write($visita->getId() . '. ');
            $datos['ID'] = $visita->getId();
            $datos['Cliente'] = $visita->getNombreCompleto();
            $datos['Dirección'] = $visita->getDireccion();
            $datos['Teléfono1'] = $visita->getTelefono1();
            $datos['Teléfono2'] = $visita->getTelefono2();                                      
            $datos['Notas'] = $visita->getNotas();
            $datos['Creador'] = $visita->getCreador()->getNombreCompleto();

            $comer = "";
            $telef = "";
            if($visita->getComercial()){
                $comer = $visita->getComercial()->getNombreCompleto();
                $telef = $visita->getComercial()->getTelefono1();
            }
            else{
                $comer = "Sin comercial";
            }
            
            $msg = $msg . 'Visita: ' . $visita->getId() .'. Del Cliente: ' . $visita->getNombreCompleto() .
                    '. Con dirección: ' .  $visita->getDireccion() . '. Y teléfono: ' .
                    $visita->getTelefono1() . '.</br>Comercial: ' . $comer .
                    '. Teléfono: ' . $telef . '</br></br>';  

            $visita->setRescatar(true);
            
            try{
                //se almacena la orden en la base de datos
                $em->persist($visita);
                $em->flush();
            }catch(Exception $e){
                $em->getConnection()->rollBack();
                $em->close();
                throw $e;
            }
        }
        
        $output->write($msg);
        $contenedor->get("email_service")->sendmail( 
              array('correoweb@iedes.com' => 'Intranet iEDES'),
              $to,
              'Rescates por Comercial no Interesado',
              $msg);
    }
}