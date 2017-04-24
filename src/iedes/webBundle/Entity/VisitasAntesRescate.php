<?php
 
namespace iedes\webBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
 
/**
 * VisitasAntesRescate
 *
 * @ORM\Table(name="visitasprerescate")
 * @ORM\Entity
 */
class VisitasAntesRescate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @var \Visitas
     *
     * @ORM\ManyToOne(targetEntity="Visitas",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="visita", referencedColumnName="id")
     * })
     */
    protected $visita;

    /**
     * @var \Sedes
     *
     * @ORM\ManyToOne(targetEntity="Sedes",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="delegacion", referencedColumnName="id")
     * })
     */
    protected $delegacion;
    
    /**
     * @var \ResultadoVisitas
     *
     * @ORM\ManyToOne(targetEntity="ResultadoVisitas",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="resultadovisitas", referencedColumnName="id")
     * })
     */
    protected $resultadovisitas;
    
    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comercial", referencedColumnName="id")
     * })
     */
    protected $comercial;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    protected $fecha;

    /**
     * @var \Canales
     *
     * @ORM\ManyToOne(targetEntity="Canales",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="canal", referencedColumnName="id")
     * })
     */
    protected $canal;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_visita", type="datetime", nullable=true)
     */
    protected $fechaVisita;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_cierre", type="datetime", nullable=true)
     */
    protected $fechaCierre;
    
    /**********************************************************************/
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Get rescatador
     *
     * @return \iedes\webBundle\Entity\Usuarios 
     */
    public function getVisita()
    {
        return $this->visita;
    }

    /**
     * Set visita
     *
     * @param \iedes\webBundle\Entity\Visitas $visita
     * @return Visitas
     */
    public function setVisita(\iedes\webBundle\Entity\Visitas $visita = null)
    {
        $this->visita = $visita;

        return $this;
    }
    
    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Visitas
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    /**
     * Get comercial
     *
     * @return \iedes\webBundle\Entity\Usuarios 
     */
    public function getComercial()
    {
        return $this->comercial;
    }

    /**
     * Set comercial
     *
     * @param \iedes\webBundle\Entity\Usuarios $comercial
     * @return Usuarios
     */
    public function setComercial(\iedes\webBundle\Entity\Usuarios $comercial = null)
    {
        $this->comercial = $comercial;

        return $this;
    }
    
    /**
     * Set canal
     *
     * @param \iedes\webBundle\Entity\Canales $canal
     * @return Canales
     */
    public function setCanal(\iedes\webBundle\Entity\Canales $canal = null)
    {
        $this->canal = $canal;
    
        return $this;
    }

    /**
     * Get canal
     *
     * @return \iedes\webBundle\Entity\Canales 
     */
    public function getCanal()
    {
        return $this->canal;
    } 
    
    /**
     * Set fechaVisita
     *
     * @param \DateTime $fechaVisita
     * @return Visitas
     */
    public function setFechaVisita($fechaVisita)
    {
        $this->fechaVisita = $fechaVisita;

        return $this;
    }

    /**
     * Get fechaVisita
     *
     * @return \DateTime 
     */
    public function getFechaVisita()
    {
        return $this->fechaVisita;
    }
    
    /**
     * Set fechaCierre
     *
     * @param \DateTime $fechaCierre
     * @return Cierres
     */
    public function setFechaCierre($fechaCierre)
    {
        $this->fechaCierre = $fechaCierre;

        return $this;
    }

    /**
     * Get fechaCierre
     *
     * @return \DateTime 
     */
    public function getFechaCierre()
    {
        return $this->fechaCierre;
    }

    /**
     * Set delegacion
     *
     * @param \iedes\webBundle\Entity\Sedes $delegacion
     * @return Sedes
     */
    public function setDelegacion(\iedes\webBundle\Entity\Sedes $delegacion = null)
    {
        $this->delegacion = $delegacion;
    
        return $this;
    }

    /**
     * Get delegacion
     *
     * @return \iedes\webBundle\Entity\Sedes 
     */
    public function getDelegacion()
    {
        return $this->delegacion;
    }

    /**
     * Set resultadovisitas
     *
     * @param \iedes\webBundle\Entity\ResultadoVisitas $resultadovisitas
     * @return ResultadoVisitas
     */
    public function setResultadoVisitas(\iedes\webBundle\Entity\ResultadoVisitas $resultadovisitas = null)
    {
        $this->resultadovisitas = $resultadovisitas;
    
        return $this;
    }

    /**
     * Get resultadovisitas
     *
     * @return \iedes\webBundle\Entity\ResultadoVisitas 
     */
    public function getResultadoVisitas()
    {
        return $this->resultadovisitas;
    }
  
}