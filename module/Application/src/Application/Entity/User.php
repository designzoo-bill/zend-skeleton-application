<?php
// src/Product.php

namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity  @ORM\Table(name="users") */
class User
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="string") */
    /** @ORM\Column(unique=true) */
    protected $username;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Address", mappedBy="user", cascade={"all"})
     */
    protected $addresses;

    /** @ORM\Column(type="datetime") */
    protected $created;

    /** @ORM\Column(type="datetime") */
    protected $updated;

    public function __construct()
    {
        // default values
        $this->created = new \DateTime("now");
        $this->updated = new \DateTime("now");

        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getAddresses()
    {
        return $this->addresses;
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
}
