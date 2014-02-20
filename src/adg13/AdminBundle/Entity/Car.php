<?php

namespace adg13\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Car
 *
 * @ORM\Entity
 * @ORM\Table(name="car")
 */
class Car
{
    /**
      * @ORM\ManyToOne(targetEntity="User", inversedBy="cars")
      * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
      */
     protected $user;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * Set user
     *
     * @param \adg13\LoginBundle\Entity\User $user
     * @return Car
     */
    public function setUser(\adg13\LoginBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \adg13\LoginBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
