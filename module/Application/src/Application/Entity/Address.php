<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity  @ORM\Table(name="addresses") */
class Address
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $name;

    /**
     * Bidirectional - Many Comments are authored by one user (OWNING SIDE)
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="addresses", cascade={"all"})
     */
    protected $user;

    /** @ORM\Column(type="datetime") */
    protected $created;

    /** @ORM\Column(type="datetime") */
    protected $updated;

    public function __construct()
    {
        // default values
        $this->created = new \DateTime("now");
        $this->updated = new \DateTime("now");
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setUser(User $user = null)
    {
        $this->user = $user;
    }  

    public function getUser()
    {
        return $this->user;
    }      

    public function setUpdated()
    {
        // WILL be saved in the database
        $this->updated = new \DateTime("now");
    }  
    
    public function getUpdated()
    {
        return $this->updated;
    }  

    public function getCreated()
    {
        return $this->created;
    }      
}
