<?php
 
namespace iedes\webBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
 
/**
 * Sedes
 *
 * @ORM\Table(name="sedes")
 * @ORM\Entity
 */
class Sedes 
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
     * @var string
     *
     * @ORM\Column(name="nombreBasico", type="string", length=100, nullable=false)
     */
    protected $nombreBasico;
    
    /**
     * @var \Direcciones
     *
     * @ORM\ManyToOne(targetEntity="Direcciones",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="direccion", referencedColumnName="id")
     * })
     */
    protected $direccion;   

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    protected $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=30, nullable=true)
     */
    protected $telefono;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="sedeFisica", type="integer", length=3, nullable=false)
     */
    protected $sedeFisica;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    protected $activo = '1';
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="haycomerciales", type="boolean", nullable=true)
     */
    protected $haycomerciales = '1';
 
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
     * Set nombreBasico
     *
     * @param string $nombreBasico
     * @return Sedes
     */
    public function setNombreBasico($nombreBasico)
    {
        $this->nombreBasico = $nombreBasico;
 
        return $this;
    }
 
    /**
     * Get nombreBasico
     *
     * @return string 
     */
    public function getNombreBasico()
    {
        return $this->nombreBasico;
    }
     
    /**
     * Set direccion
     *
     * @param \iedes\webBundle\Entity\Direcciones $direccion
     * @return Sedes
     */
    public function setDireccion(\iedes\webBundle\Entity\Direcciones $direccion = null)
    {
        $this->direccion = $direccion;
 
        return $this;
    }
 
    /**
     * Get direccion
     *
     * @return \iedes\webBundle\Entity\Direcciones 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
    
    /**
     * Set email
     *
     * @param string $email
     * @return Usuarios
     */
    public function setEmail($email)
    {
        $this->email = $email;
 
        return $this;
    }
 
    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Set telefono1
     *
     * @param string $telefono1
     * @return Usuarios
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
 
        return $this;
    }
 
    /**
     * Get telefono1
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
    
    /**
     * Set sedeFisica
     *
     * @param integer $sedeFisica
     * @return Sedes
     */
    public function setSedeFisica($sedeFisica)
    {
        $this->sedeFisica = $sedeFisica;
 
        return $this;
    }
 
    /**
     * Get sedeFisica
     *
     * @return integer 
     */
    public function getSedeFisica()
    {
        return $this->sedeFisica;
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
     * Get haycomerciales
     *
     * @return boolean 
     */
    public function getHaycomerciales()
    {
        return $this->haycomerciales;
    }
    
    /**
     * Set haycomerciales
     *
     * @param boolean $haycomerciales
     * @return Usuarios
     */
    public function setHaycomerciales($haycomerciales = 1)
    {
        $this->haycomerciales = $haycomerciales;

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
    
    /*
     * tostring
     */   
    public function __toString() {
        return $this->nombre;
    }
}