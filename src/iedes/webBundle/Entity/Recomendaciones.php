<?php

namespace iedes\webBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Recomendaciones
 *
 * @ORM\Table(name="recomendaciones")
 * @ORM\Entity
 */
class Recomendaciones {
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
     * @ORM\Column(name="dniCliente", type="string", length=50, nullable=false)
     */
    protected $dniCliente;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nombreRecomendado", type="string", length=50, nullable=false)
     */
    protected $nombreRecomendado;
    
    /**
     * @var string
     *
     * @ORM\Column(name="apellidosRecomendado", type="string", length=200, nullable=false)
     */
    protected $apellidosRecomendado;

    /**
     * @var string
     *
     * @ORM\Column(name="telefonoRecomendado", type="string", length=20, nullable=true)
     */
    protected $telefonoRecomendado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_solicitud", type="datetime", nullable=true)
     */
    protected $fechaSolicitud;
    
    /**
     * @var string
     *
     * @ORM\Column(name="emailRecomendado", type="string", length=200, nullable=false)
     */
    protected $emailRecomendado;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreComercial", type="string", length=50, nullable=false)
     */
    protected $nombreComercial;
    
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
     * Set dniCliente
     *
     * @param string $dniCliente
     * @return Trabaja
     */
    public function setDniCliente($dniCliente)
    {
        $this->dniCliente = $dniCliente;

        return $this;
    }

    /**
     * Get dniCliente
     *
     * @return string 
     */
    public function getDniCliente()
    {
        return $this->dniCliente;
    }
    
    /**
     * Set nombreRecomendado
     *
     * @param string $nombreRecomendado
     * @return Trabaja
     */
    public function setNombreRecomendado($nombreRecomendado)
    {
        $this->nombreRecomendado = $nombreRecomendado;

        return $this;
    }

    /**
     * Get nombreRecomendado
     *
     * @return string 
     */
    public function getNombreRecomendado()
    {
        return $this->nombreRecomendado;
    }
    
    /**
     * Set apellidosRecomendado
     *
     * @param string $apellidosRecomendado
     * @return Trabaja
     */
    public function setApellidosRecomendado($apellidosRecomendado)
    {
        $this->apellidosRecomendado = $apellidosRecomendado;

        return $this;
    }

    /**
     * Get apellidosRecomendado
     *
     * @return string 
     */
    
    public function getApellidosRecomendado()
    {
        return $this->apellidosRecomendado;
    }
    
    /**
     * Set telefonoRecomendado
     *
     * @param string $telefonoRecomendado
     * @return Trabaja
     */
    public function setTelefonoRecomendado($telefonoRecomendado)
    {
        $this->telefonoRecomendado = $telefonoRecomendado;

        return $this;
    }

    /**
     * Get telefonoRecomendado
     *
     * @return string 
     */
    public function getTelefonoRecomendado()
    {
        return $this->telefonoRecomendado;
    }
    
    /**
     * Set emailRecomendado
     *
     * @param string $emailRecomendado
     * @return Trabaja
     */
    public function setEmailRecomendado($emailRecomendado)
    {
        $this->emailRecomendado = $emailRecomendado;

        return $this;
    }

    /**
     * Get emailRecomendado
     *
     * @return string 
     */
    public function getEmailRecomendado()
    {
        return $this->emailRecomendado;
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
     * Set nombreComercial
     *
     * @param string $nombreComercial
     * @return Trabaja
     */
    public function setNombreComercial($nombreComercial)
    {
        $this->nombreComercial = $nombreComercial;

        return $this;
    }

    /**
     * Get nombreComercial
     *
     * @return string 
     */
    public function getNombreComercial()
    {
        return $this->nombreComercial;
    }
    
    public function __toString() {
        return $this->dniCliente . ': ' . $this->nombreRecomendado . '. ' . $this->apellidosRecomendado . ". " + $this->telefonoRecomendado;
    }
}