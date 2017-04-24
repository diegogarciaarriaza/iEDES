<?php

namespace iedes\webBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * CalculoOnline
 *
 * @ORM\Table(name="calculoOnline")
 * @ORM\Entity
 */
class CalculoOnline {
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
     * @ORM\Column(name="nombre", type="string", length=40, nullable=true)
     */
    protected $nombre;

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
     * @ORM\Column(name="tipoCliente", type="string", length=20, nullable=true)
     */
    protected $tipoCliente;
    
    /**
     * @var string
     *
     * @ORM\Column(name="tipoConstruccion", type="string", length=20, nullable=true)
     */
    protected $tipoConstruccion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ubicacionNegocio", type="string", length=20, nullable=true)
     */
    protected $ubicacionNegocio;
    
    /**
     * @var string
     *
     * @ORM\Column(name="miembros", type="string", length=20, nullable=true)
     */
    protected $miembros;
    
    /**
     * @var string
     *
     * @ORM\Column(name="sistemaCalentamiento", type="string", length=20, nullable=true)
     */
    protected $sistemaCalentamiento;
    
    /**
     * @var string
     *
     * @ORM\Column(name="gastoGas", type="string", length=20, nullable=true)
     */
    protected $gastoGas;
    
    /**
     * @var string
     *
     * @ORM\Column(name="gastoElectricidad", type="string", length=20, nullable=true)
     */
    protected $gastoElectricidad;
    
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
     * @return CalculoOnline
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
     * Set telefono1
     *
     * @param string $telefono1
     * @return CalculoOnline
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
     * Set tipoCliente
     *
     * @param string $tipoCliente
     * @return CalculoOnline
     */
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;

        return $this;
    }

    /**
     * Get tipoCliente
     *
     * @return string 
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }
    
    /**
     * Set tipoConstruccion
     *
     * @param string $tipoConstruccion
     * @return CalculoOnline
     */
    public function setTipoConstruccion($tipoConstruccion)
    {
        $this->tipoConstruccion = $tipoConstruccion;

        return $this;
    }

    /**
     * Get tipoConstruccion
     *
     * @return string 
     */
    public function getTipoConstruccion()
    {
        return $this->tipoConstruccion;
    }
    
    /**
     * Set ubicacionNegocio
     *
     * @param string $ubicacionNegocio
     * @return CalculoOnline
     */
    public function setUbicacionNegocio($ubicacionNegocio)
    {
        $this->ubicacionNegocio = $ubicacionNegocio;

        return $this;
    }

    /**
     * Get ubicacionNegocio
     *
     * @return string 
     */
    public function getUbicacionNegocio()
    {
        return $this->ubicacionNegocio;
    }
    
    /**
     * Set miembros
     *
     * @param string $miembros
     * @return CalculoOnline
     */
    public function setMiembros($miembros)
    {
        $this->miembros = $miembros;

        return $this;
    }

    /**
     * Get miembros
     *
     * @return string 
     */
    public function getMiembros()
    {
        return $this->miembros;
    }

    /**
     * Set sistemaCalentamiento
     *
     * @param string $sistemaCalentamiento
     * @return CalculoOnline
     */
    public function setSistemaCalentamiento($sistemaCalentamiento)
    {
        $this->sistemaCalentamiento = $sistemaCalentamiento;

        return $this;
    }

    /**
     * Get sistemaCalentamiento
     *
     * @return string 
     */
    public function getSistemaCalentamiento()
    {
        return $this->sistemaCalentamiento;
    }
    
    /**
     * Set gastoGas
     *
     * @param string $gastoGas
     * @return CalculoOnline
     */
    public function setGastoGas($gastoGas)
    {
        $this->gastoGas = $gastoGas;

        return $this;
    }

    /**
     * Get gastoGas
     *
     * @return string 
     */
    public function getGastoGas()
    {
        return $this->gastoGas;
    }
    
    /**
     * Set gastoElectricidad
     *
     * @param string $gastoElectricidad
     * @return CalculoOnline
     */
    public function setGastoElectricidad($gastoElectricidad)
    {
        $this->gastoElectricidad = $gastoElectricidad;

        return $this;
    }

    /**
     * Get gastoElectricidad
     *
     * @return string 
     */
    public function getGastoElectricidad()
    {
        return $this->gastoElectricidad;
    }
    
    /**
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return CalculoOnline
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
     * @return CalculoOnline
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

    public function __toString() {
        return $this->nombre . '. ' . $this->direccion . ". " + $this->telefono1;
    }
}