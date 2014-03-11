<?php

namespace adg13\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="cars")
 * @ORM\Entity
 */
class Car {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $make;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $reg_plates;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $engine;

    /**
     * @ORM\Column(type="integer")
     */
    private $seats;
    // ...
    /**
     * @ORM\ManyToMany(targetEntity="adg13\ProfileBundle\Entity\User", mappedBy="cars")
     * */
    private $users;

    public function __construct() {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set make
     *
     * @param string $make
     * @return Car
     */
    public function setMake($make) {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return string 
     */
    public function getMake() {
        return $this->make;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return Car
     */
    public function setModel($model) {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel() {
        return $this->model;
    }

    /**
     * Set reg_plates
     *
     * @param string $regPlates
     * @return Car
     */
    public function setRegPlates($regPlates) {
        $this->reg_plates = $regPlates;

        return $this;
    }

    /**
     * Get reg_plates
     *
     * @return string 
     */
    public function getRegPlates() {
        return $this->reg_plates;
    }

    /**
     * Set engine
     *
     * @param string $engine
     * @return Car
     */
    public function setEngine($engine) {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return string 
     */
    public function getEngine() {
        return $this->engine;
    }

    /**
     * Set seats
     *
     * @param integer $seats
     * @return Car
     */
    public function setSeats($seats) {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get seats
     *
     * @return integer 
     */
    public function getSeats() {
        return $this->seats;
    }


    /**
     * Add users
     *
     * @param \adg13\AdminBundle\Entity\User $users
     * @return Car
     */
    public function addUser(\adg13\AdminBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \adg13\AdminBundle\Entity\User $users
     */
    public function removeUser(\adg13\AdminBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
