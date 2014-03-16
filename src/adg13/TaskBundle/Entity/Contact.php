<?php

namespace adg13\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="contact")
 * @ORM\Entity
 */
class Contact implements \JsonSerializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gridReference;

    /**
     * @ORM\OneToOne(targetEntity="adg13\AdminBundle\Entity\Address",inversedBy="contact", cascade={"persist"})
     * 
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity="adg13\TaskBundle\Entity\Task", mappedBy="contact", cascade={"persist"})
     * 
     */
    private $task;

    public function __construct() {
        $this->address = new \adg13\AdminBundle\Entity\Address();
    }

    public function jsonSerialize() {
        
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
     * Set firstName
     *
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Contact
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param \adg13\AdminBundle\Entity\Address $address
     * @return Contact
     */
    public function setAddress(\adg13\AdminBundle\Entity\Address $address = null) {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \adg13\AdminBundle\Entity\Address 
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Set gridReference
     *
     * @param string $gridReference
     * @return Contact
     */
    public function setGridReference($gridReference) {
        $this->gridReference = $gridReference;

        return $this;
    }

    /**
     * Get gridReference
     *
     * @return string 
     */
    public function getGridReference() {
        return $this->gridReference;
    }

    /**
     * Set telephon
     *
     * @param string $telephon
     * @return Contact
     */
    public function setTelephon($telephon) {
        $this->telephon = $telephon;

        return $this;
    }

    /**
     * Get telephon
     *
     * @return string 
     */
    public function getTelephon() {
        return $this->telephon;
    }

    /**
     * Set task
     *
     * @param \adg13\TaskBundle\Entity\Task $task
     * @return Contact
     */
    public function setTask(\adg13\TaskBundle\Entity\Task $task = null) {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \adg13\TaskBundle\Entity\Task 
     */
    public function getTask() {
        return $this->task;
    }

}
