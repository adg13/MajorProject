<?php

namespace adg13\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Table(name="privilidges")
 * @ORM\Entity
 */
class Privilidges implements JsonSerializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * @ORM\Column(type="string", length=20)
     */
    private $status;
    /**
     * @ORM\OneToOne(targetEntity="adg13\ProfileBundle\Entity\User", mappedBy="privilidge")
     */
    private $user;

    public function jsonSerialize() {
        
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
     * Set status
     *
     * @param string $status
     * @return Privilidges
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \adg13\ProfileBundle\Entity\User $user
     * @return Privilidges
     */
    public function setUser(\adg13\ProfileBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \adg13\ProfileBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
