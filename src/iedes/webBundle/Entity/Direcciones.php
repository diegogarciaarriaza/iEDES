<?php
 
namespace iedes\webBundle\Entity;
 
use Doctrine\ORM\Mapping as ORM;
 
/**
 * Direcciones
 *
 * @ORM\Table(name="direcciones")
 * @ORM\Entity
 */
class Direcciones
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
     * @ORM\Column(name="country", type="string", length=100, nullable=true)
     */
    protected $country;
     
    /**
     * @var string
     *
     * @ORM\Column(name="adminarea1", type="string", length=100, nullable=true)
     */
    protected $adminarea1;
     
    /**
     * @var string
     *
     * @ORM\Column(name="adminarea2", type="string", length=100, nullable=true)
     */
    protected $adminarea2;
 
    /**
     * @var string
     *
     * @ORM\Column(name="adminarea3", type="string", length=100, nullable=true)
     */
    protected $adminarea3;
     
    /**
     * @var string
     *
     * @ORM\Column(name="locality", type="string", length=100, nullable=false)
     */
    protected $locality;
     
    /**
     * @var string
     *
     * @ORM\Column(name="postalCode", type="string", length=10, nullable=true)
     */
    protected $postalCode;
     
    /**
     * @var integer
     *
     * @ORM\Column(name="streetNumber", type="integer", nullable=true)
     */
    protected $streetNumber;
     
    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=100, nullable=true)
     */
    protected $route;
     
    /**
     * @var decimal
     *
     * @ORM\Column(name="latitude", type="decimal", precision=14, scale=8, nullable=true)
     */
    protected $latitude;
     
    /**
     * @var decimal
     *
     * @ORM\Column(name="longitude", type="decimal", precision=14, scale=8, nullable=true)
     */
    protected $longitude;
 
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
     * Set country
     *
     * @param string $country
     * @return Direcciones
     */
    public function setCountry($country)
    {
        $this->country = $country;
 
        return $this;
    }
 
    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }
     
    /**
     * Set adminarea1
     *
     * @param string $adminarea1
     * @return Direcciones
     */
    public function setAdminarea1($adminarea1)
    {
        $this->adminarea1 = $adminarea1;
 
        return $this;
    }
 
    /**
     * Get adminarea1
     *
     * @return string 
     */
    public function getAdminarea1()
    {
        return $this->adminarea1;
    }
     
    /**
     * Set adminarea2
     *
     * @param string $adminarea2
     * @return Direcciones
     */
    public function setAdminarea2($adminarea2)
    {
        $this->adminarea2 = $adminarea2;
 
        return $this;
    }
 
    /**
     * Get adminarea2
     *
     * @return string 
     */
    public function getAdminarea2()
    {
        return $this->adminarea2;
    }
     
    /**
     * Set adminarea3
     *
     * @param string $adminarea3
     * @return Direcciones
     */
    public function setAdminarea3($adminarea3)
    {
        $this->adminarea3 = $adminarea3;
 
        return $this;
    }
 
    /**
     * Get adminarea3
     *
     * @return string 
     */
    public function getAdminarea3()
    {
        return $this->adminarea3;
    }
     
    /**
     * Set locality
     *
     * @param string $locality
     * @return Direcciones
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
 
        return $this;
    }
 
    /**
     * Get locality
     *
     * @return string 
     */
    public function getLocality()
    {
        return $this->locality;
    }
     
    /**
     * Set route
     *
     * @param string $postalCode
     * @return Direcciones
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
 
        return $this;
    }
 
    /**
     * Get postalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }
     
    /**
     * Set streetNumber
     *
     * @param integer $streetNumer
     * @return Direcciones
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
 
        return $this;
    }
 
    /**
     * Get streetNumber
     *
     * @return integer 
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }
     
    /**
     * Set latitude
     *
     * @param integer $latitude
     * @return Actividades
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
 
        return $this;
    }
 
    /**
     * Get latitude
     *
     * @return decimal 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
     
    /**
     * Set longitude
     *
     * @param integer $longitude
     * @return Actividades
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
 
        return $this;
    }
 
    /**
     * Get longitude
     *
     * @return decimal 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
 
    /**
     * Set route
     *
     * @param string $route
     * @return Direcciones
     */
    public function setRoute($route)
    {
        $this->route = $route;
 
        return $this;
    }
 
    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }
     
    public function getDireccionSinCalle(){
         
        $fullAddress = "";

        if($this->streetNumber) {
            $fullAddress = $fullAddress.$this->streetNumber.", ";
        }
        if ($this->locality) {
            $fullAddress = $fullAddress.$this->locality.", ";
        }
        if ($this->adminarea3) {
            $fullAddress = $fullAddress.$this->adminarea3.", ";
        }
        if ($this->adminarea2) {
            $fullAddress = $fullAddress.$this->adminarea2.", ";
        }
        if ($this->adminarea1) {
            $fullAddress = $fullAddress.$this->adminarea1.", ";
        }
        if ($this->country) {
            $fullAddress = $fullAddress.$this->country.", ";
        }
        if ($this->postalCode) {
            $fullAddress = $fullAddress.$this->postalCode;
        }
 
       return $fullAddress;
   }
     
    public function __toString() {
         
        $fullAddress = "";
        if ($this->route) {
            $fullAddress = $this->route.", ";
        }
        if($this->streetNumber) {
            $fullAddress = $fullAddress.$this->streetNumber.", ";
        }
        if ($this->locality) {
            $fullAddress = $fullAddress.$this->locality.", ";
        }
        if ($this->adminarea3) {
            $fullAddress = $fullAddress.$this->adminarea3.", ";
        }
        if ($this->adminarea2) {
            $fullAddress = $fullAddress.$this->adminarea2.", ";
        }
        if ($this->adminarea1) {
            $fullAddress = $fullAddress.$this->adminarea1.", ";
        }
        if ($this->country) {
            $fullAddress = $fullAddress.$this->country.", ";
        }
        if ($this->postalCode) {
            $fullAddress = $fullAddress.$this->postalCode;
        }
 
       return $fullAddress;
   }
}