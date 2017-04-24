<?php
 
namespace iedes\webBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
 
/**
 * ResultadoVisitas
 *
 * @ORM\Table(name="resultadovisitas")
 * @ORM\Entity
 */
class ResultadoVisitas 
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    protected $nombre;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    protected $activo = '1';
    
    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer", nullable=true)
     */
    protected $orden;
 
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
     * Set nombre
     *
     * @param string $nombre
     * @return Sedes
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
 
        return $this;
    }
 
    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Usuarios
     */
    public function setActivo($activo = 1)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }
    
    /**
     * Set orden
     *
     * @param integer $orden
     * @return Usuarios
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
 
        return $this;
    }
 
    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }
    
    /*
     * tostring
     */   
    public function __toString() {
        return $this->nombre;
    }
}