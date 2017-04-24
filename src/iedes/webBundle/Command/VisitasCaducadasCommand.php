<?php
namespace iedes\webBundle\Command;
 
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use iedes\webBundle\Utils\utils;
 
class VisitasCaducadasCommand extends ContainerAwareCommand{
    
    protected function configure(){
    
        $this->setName('visitas:caducadas')
            ->setDescription('Avisa de las actividades con fecha de cierre de hace 3 dias')
            ->addArgument('my_argument', InputArgument::OPTIONAL);
    }
 
    protected function execute(InputInterface $input, OutputInterface $output){
    
        $contenedor = $this->getContainer();
        $em = $this->getContainer()->get('doctrine')->getManager();
        
        $date = $contenedor->get('utils_service')->changeDate(null, "-72 hours");

        $query = $em->getRepository("iedeswebBundle:Visitas")->createQueryBuilder('v')
              ->where("v.fechaVisita < '" . $date->format('Y-m-d') . "'" .
                      " and v.activo = 1 and v.contacto = 0 and v.rescatar = 0 " .
                      " and v.comercial is not null and v.resultadovisitas is null")
              ->orderBy('v.comercial, v.fechaVisita', 'DESC')
              ->getQuery();
        
        $caducadas = $query->getResult();
        $to[] = "controller@iedes.com";
        
        $msg = "";
        $output->write(count($caducadas) . " --> ");
        foreach ($caducadas as $visita) { //$output->write($visita->getId() . "(" . $visita->getResultadoVisitas() . '). ');
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
                    '. Teléfono: ' . $telef . '</br>Fecha: ' . $visita->getFecha()->format('d/m/Y') . '</br></br>';                       
        }
        
        $output->write($date->format('Y-m-d'));
        $output->write($msg);
        $contenedor->get("email_service")->sendmail( 
              array('correoweb@iedes.com' => 'Intranet iEDES'),
              $to,
              'Visita caducada',
              $msg);
    }
}