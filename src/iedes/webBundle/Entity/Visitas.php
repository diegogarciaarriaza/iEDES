<?php
 
namespace iedes\webBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
 
/**
 * Visitas
 *
 * @ORM\Table(name="visitas")
 * @ORM\Entity
 */
class Visitas
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
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    protected $email;
    
    /**
     * @var int
     *
     * @ORM\Column(name="miembros", type="integer", length=100, nullable=false)
     */
    protected $miembros;

    /**
     * @var boolean
     *
     * @ORM\Column(name="termoelectrico", type="boolean", nullable=false)
     */
    protected $termoelectrico;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="termogas", type="boolean", nullable=false)
     */
    protected $termogas;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="caldera", type="boolean", nullable=false)
     */
    protected $caldera;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="equipoexterno", type="boolean", nullable=false)
     */
    protected $equipoexterno;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="interes", type="bigint", nullable=true)
     *
     */
    protected $interes;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=false)
     */
    protected $activo;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="contacto", type="boolean", nullable=false)
     */
    protected $contacto;
    
    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="creador", referencedColumnName="id")
     * })
     */
    protected $creador;
    
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
     * @var \TipoEquipo
     *
     * @ORM\ManyToOne(targetEntity="TipoEquipo",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipoequipo", referencedColumnName="id")
     * })
     */
    protected $tipoequipo;
    
    /**
     * @var \ProductoExtra
     *
     * @ORM\ManyToOne(targetEntity="ProductoExtra",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productoextra", referencedColumnName="id")
     * })
     */
    protected $productoextra;
    
    /**
     * @var \ProductoExtra
     *
     * @ORM\ManyToOne(targetEntity="ProductoExtra",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="productoextra2", referencedColumnName="id")
     * })
     */
    protected $productoextra2;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrada_vivienda", type="datetime", nullable=true)
     */
    protected $fechaEntradavivienda;
    
    /**
     * @var \EstadoContactos
     *
     * @ORM\ManyToOne(targetEntity="EstadoContactos",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estadocontactos", referencedColumnName="id")
     * })
     */
    protected $estadocontactos;


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
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comercial", referencedColumnName="id")
     * })
     */
    protected $comercial;
    
    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jefeequipo", referencedColumnName="id")
     * })
     */
    protected $jefeequipo;

	/**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=300, nullable=true)
     */
    protected $notas;

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
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_instalacion", type="datetime", nullable=true)
     */
    protected $fechaInstalacion;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="rescatar", type="boolean", nullable=false)
     */
    protected $rescatar;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_rescate", type="datetime", nullable=true)
     */
    protected $fechaRescate;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->amigo = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="visitantes", type="string", length=40, nullable=true)
     */
    protected $visitantes;
    
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Visitas
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
     * Set apellido1
     *
     * @param string $apellido1
     * @return Visitas
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
     * @return Visitas
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
     * @return Visitas
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
     * @return Visitas
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
     * Set email
     *
     * @param string $email
     * @return Visitas
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
     * Set notas
     *
     * @param string $notas
     * @return Visitas
     */
    public function setNotas($notas)
    {
        $this->notas = $notas;

        return $this;
    }

    /**
     * Get notas
     *
     * @return string 
     */
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Visitas
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
     * Set contacto
     *
     * @param boolean $contacto
     * @return Visitas
     */
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get contacto
     *
     * @return boolean 
     */
    public function getContacto()
    {
        return $this->contacto;
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
     * Set direccion
     *
     * @param \iedes\webBundle\Entity\Direcciones $direccion
     * @return Visitas
     */
    public function setDireccion(\iedes\webBundle\Entity\Direcciones $direccion = null)
    {
        $this->direccion = $direccion;

        return $this;
    }
    
    /**
     * Get creador
     *
     * @return \iedes\webBundle\Entity\Usuarios 
     */
    public function getCreador()
    {
        return $this->creador;
    }

    /**
     * Set creador
     *
     * @param \iedes\webBundle\Entity\Usuarios $creador
     * @return Usuarios
     */
    public function setCreador(\iedes\webBundle\Entity\Usuarios $creador)
    {
        $this->creador = $creador;

        return $this;
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
     * Set fechaInstalacion
     *
     * @param \DateTime $fechaInstalacion
     * @return Instalacions
     */
    public function setFechaInstalacion($fechaInstalacion)
    {
        $this->fechaInstalacion = $fechaInstalacion;

        return $this;
    }

    /**
     * Get fechaInstalacion
     *
     * @return \DateTime 
     */
    public function getFechaInstalacion()
    {
        return $this->fechaInstalacion;
    }
    
    /**
     * Set visitantes
     *
     * @param string $visitantes
     * @return Visitas
     */
    public function setVisitantes($visitantes)
    {
        $this->visitantes = $visitantes;

        return $this;
    }

    /**
     * Get visitantes
     *
     * @return string 
     */
    public function getVisitantes()
    {
        return $this->visitantes;
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
        return $this->nombre . " " . $this->apellido1 . " " . $this->apellido2 . ". " .
            $this->direccion . ". " . $this->fechaVisita->format('Y-m-d H:i:s');
    }
    
    /**
     * Get nombrecompletocorto
     *
     * @return string 
     */
    public function getNombreClienteCorto()
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
     * Set miembros
     *
     * @param integer $miembros
     * @return Visitas
     */
    public function setMiembros($miembros)
    {
        $this->miembros = $miembros;
    
        return $this;
    }

    /**
     * Get miembros
     *
     * @return integer 
     */
    public function getMiembros()
    {
        return $this->miembros;
    }
    
    /**
     * Set termogas
     *
     * @param boolean $termogas
     * @return Visitas
     */
    public function setTermogas($termogas)
    {
        $this->termogas = $termogas;
    
        return $this;
    }

    /**
     * Get termogas
     *
     * @return boolean 
     */
    public function getTermogas()
    {
        return $this->termogas;
    }

    /**
     * Set caldera
     *
     * @param boolean $caldera
     * @return Visitas
     */
    public function setCaldera($caldera)
    {
        $this->caldera = $caldera;
    
        return $this;
    }

    /**
     * Get caldera
     *
     * @return boolean 
     */
    public function getCaldera()
    {
        return $this->caldera;
    }

    /**
     * Set equipoexterno
     *
     * @param boolean $equipoexterno
     * @return Visitas
     */
    public function setEquipoexterno($equipoexterno)
    {
        $this->equipoexterno = $equipoexterno;
    
        return $this;
    }

    /**
     * Get equipoexterno
     *
     * @return boolean 
     */
    public function getEquipoexterno()
    {
        return $this->equipoexterno;
    }

    /**
     * Set interes
     *
     * @param integer $interes
     * @return Visitas
     */
    public function setInteres($interes)
    {
        $this->interes = $interes;
    
        return $this;
    }

    /**
     * Get interes
     *
     * @return integer 
     */
    public function getInteres()
    {
        return $this->interes;
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
    
    /**
     * Set tipoequipo
     *
     * @param \iedes\webBundle\Entity\TipoEquipo $tipoequipo
     * @return TipoEquipo
     */
    public function setTipoEquipo(\iedes\webBundle\Entity\TipoEquipo $tipoequipo = null)
    {
        $this->tipoequipo = $tipoequipo;
    
        return $this;
    }

    /**
     * Get tipoequipo
     *
     * @return \iedes\webBundle\Entity\TipoEquipo 
     */
    public function getTipoEquipo()
    {
        return $this->tipoequipo;
    }
    
    /**
     * Set productoextra
     *
     * @param \iedes\webBundle\Entity\ProductoExtra $productoextra
     * @return ProductoExtra
     */
    public function setProductoExtra(\iedes\webBundle\Entity\ProductoExtra $productoextra = null)
    {
        $this->productoextra = $productoextra;
    
        return $this;
    }

    /**
     * Get productoextra
     *
     * @return \iedes\webBundle\Entity\ProductoExtra 
     */
    public function getProductoExtra()
    {
        return $this->productoextra;
    }
    
    /**
     * Set productoextra2
     *
     * @param \iedes\webBundle\Entity\ProductoExtra $productoextra2
     * @return ProductoExtra
     */
    public function setProductoExtra2(\iedes\webBundle\Entity\ProductoExtra $productoextra2 = null)
    {
        $this->productoextra2 = $productoextra2;
    
        return $this;
    }

    /**
     * Get productoextra2
     *
     * @return \iedes\webBundle\Entity\ProductoExtra 
     */
    public function getProductoExtra2()
    {
        return $this->productoextra2;
    }
    
    /**
     * Set fechaEntradavivienda
     *
     * @param \DateTime $fechaEntradavivienda
     * @return Entradaviviendas
     */
    public function setFechaEntradavivienda($fechaEntradavivienda = NULL)
    {
        $this->fechaEntradavivienda = $fechaEntradavivienda;

        return $this;
    }

    /**
     * Get fechaEntradavivienda
     *
     * @return \DateTime 
     */
    public function getFechaEntradavivienda()
    {
        return $this->fechaEntradavivienda;
    }
    
    /**
     * Set estadocontactos
     *
     * @param \iedes\webBundle\Entity\ResultadoVisitas $estadocontactos
     * @return EstadoContactos
     */
    public function setEstadoContactos(\iedes\webBundle\Entity\EstadoContactos $estadocontactos = null)
    {
        $this->estadocontactos = $estadocontactos;
    
        return $this;
    }

    /**
     * Get estadocontactos
     *
     * @return \iedes\webBundle\Entity\EstadoContactos 
     */
    public function getEstadoContactos()
    {
        return $this->estadocontactos;
    }
    
    /**
     * Set termoelectrico
     *
     * @param boolean $termoelectrico
     * @return Visitas
     */
    public function setTermoelectrico($termoelectrico)
    {
        $this->termoelectrico = $termoelectrico;
    
        return $this;
    }

    /**
     * Get termoelectrico
     *
     * @return boolean 
     */
    public function getTermoelectrico()
    {
        return $this->termoelectrico;
    }
    
    /**
     * Set rescatar
     *
     * @param boolean $rescatar
     * @return Visitas
     */
    public function setRescatar($rescatar = 0)
    {
        $this->rescatar = $rescatar;

        return $this;
    }

    /**
     * Get rescatar
     *
     * @return boolean 
     */
    public function getRescatar()
    {
        return $this->rescatar;
    }

    /**
     * @var \Usuarios
     *
     * @ORM\ManyToOne(targetEntity="Usuarios",cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rescatador", referencedColumnName="id")
     * })
     */
    protected $rescatador;
    
    /**
     * Get rescatador
     *
     * @return \iedes\webBundle\Entity\Usuarios 
     */
    public function getRescatador()
    {
        return $this->rescatador;
    }

    /**
     * Set rescatador
     *
     * @param \iedes\webBundle\Entity\Usuarios $rescatador
     * @return Usuarios
     */
    public function setRescatador(\iedes\webBundle\Entity\Usuarios $rescatador = null)
    {
        $this->rescatador = $rescatador;

        return $this;
    }
    
    /**
     * Set fechaRescate
     *
     * @param \DateTime $fechaRescate
     * @return Rescates
     */
    public function setFechaRescate($fechaRescate)
    {
        $this->fechaRescate = $fechaRescate;

        return $this;
    }

    /**
     * Get fechaRescate
     *
     * @return \DateTime 
     */
    public function getFechaRescate()
    {
        return $this->fechaRescate;
    }
    
    /**
     * Set jefeequipo
     *
     * @param \iedes\webBundle\Entity\Usuarios $jefeequipo
     * @return Usuarios
     */
    public function setJefeequipo(\iedes\webBundle\Entity\Usuarios $jefeequipo = null)
    {
        $this->jefeequipo = $jefeequipo;
    
        return $this;
    }

    /**
     * Get jefeequipo
     *
     * @return \iedes\webBundle\Entity\Usuarios 
     */
    public function getJefeequipo()
    {
        return $this->jefeequipo;
    }    
}