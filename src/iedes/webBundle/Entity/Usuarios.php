<?php

namespace iedes\webBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Usuarios
 * @ORM\Entity(repositoryClass="iedes\webBundle\Entity\UsuariosRepository")
 * @ORM\Table(name="usuarios") 
 * @ORM\HasLifecycleCallbacks
 */
class Usuarios implements UserInterface 
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
     * @ORM\Column(name="nombre", type="string", length=40, nullable=true)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=40, nullable=true)
     */
    protected $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=40, nullable=true)
     */
    protected $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono1", type="string", length=20, nullable=true)
     */
    protected $telefono1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telefono2", type="string", length=20, nullable=true)
     */
    protected $telefono2;

    /**
     * @var string
     *
     * @ORM\Column(name="nick", type="string", length=100, nullable=true)
     * @Assert\NotBlank(message="El nick no puede quedar vacío")
     */
    protected $nick;

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
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     * @Assert\NotBlank(message="La dirección de correo no puede quedar vacía")
     * @Assert\Email(
     *      message = "La dirección de correo {{ value }} no es válida.",
     *      checkMX = true
     *      )
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40, nullable=false)
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=200, nullable=true)
     */
    protected $foto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="datetime", nullable=true)
     */
    protected $fechaAlta;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ultima_conexion", type="datetime", nullable=true)
     */
    protected $ultimaConexion;

    /**
     * @var integer
     *
     * @ORM\Column(name="rol", type="integer", nullable=true)
     */
    protected $rol;
    
    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pasodirecto", referencedColumnName="id")
     * })
     */
    protected $pasoDirecto;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=true)
     */
    protected $activo = '1';

    /**
     * Constructor
     */
    public function __construct()
    {

    }

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
     * @return Usuarios
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
     * Get nombrecompleto
     *
     * @return string 
     */
    public function getNombreCompleto()
    {
        return $this->nombre . " " . $this->apellido1 . " " . $this->apellido2;
    }
    
    /**
     * Get nombrecompletocorto
     *
     * @return string 
     */
    public function getNombreCorto()
    {
        $nombre = $this->nombre;
        $res = $nombre[0] . '.';
        $p = strpos($nombre, ' '); 
        if($p && (strlen($nombre) > ($p + 1))){
            $res .= $nombre[$p+1] . '.';
        }
        
        $res .= $this->apellido1;
        return $res;
    }

    /**
     * Set apellido1
     *
     * @param string $apellido1
     * @return Usuarios
     */
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    /**
     * Get apellido1
     *
     * @return string 
     */
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set apellido2
     *
     * @param string $apellido2
     * @return Usuarios
     */
    public function setApellido2($apellido2)
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    /**
     * Get apellido2
     *
     * @return string 
     */
    public function getApellido2()
    {
        return $this->apellido2;
    }

    /**
     * Set telefono1
     *
     * @param string $telefono1
     * @return Usuarios
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
     * Set telefono2
     *
     * @param string $telefono2
     * @return Usuarios
     */
    public function setTelefono2($telefono2)
    {
        $this->telefono2 = $telefono2;

        return $this;
    }

    /**
     * Get telefono2
     *
     * @return string 
     */
    public function getTelefono2()
    {
        return $this->telefono2;
    }

    /**
     * Set nick
     *
     * @param string $nick
     * @return Usuarios
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string 
     */
    public function getNick()
    {
        return $this->nick;
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
     * Set password
     *
     * @param string $password
     * @return Usuarios
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Usuarios
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }
    
    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Usuarios
     */
    public function setActivo($activo)
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
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Usuarios
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }
    
     /**
     * Set ultimaConexion
     *
     * @param \DateTime $ultimaConexion
     * @return Usuarios
     */
    public function setUltimaConexion($ultimaConexion)
    {
        $this->ultimaConexion = $ultimaConexion;

        return $this;
    }

    /**
     * Get ultimaConexion
     *
     * @return \DateTime 
     */
    public function getUltimaConexion()
    {
        return $this->ultimaConexion;
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
     * Set pasoDirecto
     *
     * @param \iedes\webBundle\Entity\Usuarios $pasoDirecto
     * @return Usuarios
     */
    public function setPasoDirecto(\iedes\webBundle\Entity\Usuarios $pasoDirecto = null)
    {
        $this->pasoDirecto = $pasoDirecto;
    
        return $this;
    }

    /**
     * Get pasoDirecto
     *
     * @return \iedes\webBundle\Entity\Usuarios 
     */
    public function getPasoDirecto()
    {
        return $this->pasoDirecto;
    }  
    
    /**
     * Set rol
     *
     * @param integer $rol
     * @return Usuarios
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return integer 
     */
    public function getRol()
    {
        return $this->rol;
    }

    public function getSalt(){
        
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        $rol = $this->getRol();
        if      ($rol ===  1) { return array('ROLE_OFICINA'); } 
        else if ($rol ===  2) { return array('ROLE_COMERCIAL'); } 
        else if ($rol === 10){ return array('ROLE_RECEPCION'); } 
        else if ($rol === 20){ return array('ROLE_JEFE_COMERCIAL'); } 
        else if ($rol === 21){ return array('ROLE_COORDINADOR_TELEMARKETING'); }
        else if ($rol === 30){ return array('ROLE_RESCATE'); }
        else if ($rol === 31){ return array('ROLE_TELEMARKETING'); } 
        else if ($rol === 32){ return array('ROLE_CAPTADOR'); } 
        else if ($rol === 33){ return array('ROLE_WEB'); } 
        else if ($rol === 50){ return array('ROLE_CONTROLLER'); } 
        else if ($rol === 100){return array('ROLE_ADMIN'); }
    }

    public function getUsername() {
        return $this->getEmail();
    }
    
    public function __toString() {
        return $this->nick;
    }
}