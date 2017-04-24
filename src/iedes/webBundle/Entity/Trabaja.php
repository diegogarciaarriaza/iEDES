<?php

namespace iedes\webBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Trabaja
 *
 * @ORM\Table(name="trabaja")
 * @ORM\Entity
 */
class Trabaja {
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
     * @ORM\Column(name="nombre", type="string", length=50, nullable=false)
     */
    protected $nombre;
    
    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=200, nullable=false)
     */
    protected $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono1", type="string", length=20, nullable=true)
     */
    protected $telefono1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_solicitud", type="datetime", nullable=true)
     */
    protected $fechaSolicitud;

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
     * @ORM\Column(name="email", type="string", length=200, nullable=false)
     */
    protected $email;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comentarios", type="string", length=400, nullable=true)
     */
    protected $comentarios;
    
    /**
     * @var string
     *
     * @ORM\Column(name="CV", type="string", length=200, nullable=true)
     */
    protected $CV;
    
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
     * @return Trabaja
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
     * Set apellidos
     *
     * @param string $apellidos
     * @return Trabaja
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    
    public function getApellidos()
    {
        return $this->apellidos;
    }
    
    /**
     * Set telefono1
     *
     * @param string $telefono1
     * @return Trabaja
     */
    public function setTelefono1($telefono1)
    {
        $this->telefono1 = $telefono1;

        return $this;
    }

    /**
     * Get telefono1
     *
     * @return string 
     */
    public function getTelefono1()
    {
        return $this->telefono1;
    }
    
    /**
     * Set email
     *
     * @param string $email
     * @return Trabaja
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
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return Trabaja
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;

        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set direccion
     *
     * @param \iedes\webBundle\Entity\Direcciones $direccion
     * @return Trabaja
     */
    public function setDireccion(\iedes\webBundle\Entity\Direcciones $direccion)
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
     * Set comentarios
     *
     * @param string $comentarios
     * @return Trabaja
     */
    public function setComentarios($comentarios)
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios()
    {
        return $this->comentarios;
    }
    
    /**
     * Set CV
     *
     * @param string CV
     * @return Trabaja
     */
    public function setCV($CV)
    {
        $this->CV = $CV;

        return $this;
    }

    /**
     * Get CV
     *
     * @return string 
     */
    public function getCV()
    {
        return $this->CV;
    }
    
    public function __toString() {
        return $this->nombre . '. ' . $this->apellidos . ". " + $this->telefono1;
    }
}