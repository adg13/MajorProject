<?php

namespace adg13\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="caller")
 * @ORM\Entity
 */
class Caller implements \JsonSerializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $telephon;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="adg13\TaskBundle\Entity\Organisation", inversedBy="callers", cascade={"persist"})
     */
    private $organisation;
    
        /**
     * @ORM\OneToOne(targetEntity="adg13\TaskBundle\Entity\Task",mappedBy="caller", cascade={"persist"})
     * 
     */
    private $task;

    public function __construct() {
        $this->organisation = new Organisation();
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
     * Set name
     *
     * @param string $name
     * @return Organisation
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Caller
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
     * @return Caller
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
     * Set telephon
     *
     * @param string $telephon
     * @return Caller
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
     * Set organisation
     *
     * @param \adg13\TaskBundle\Entity\organisation $organisation
     * @return Caller
     */
    public function setOrganisation(\adg13\TaskBundle\Entity\organisation $organisation = null) {
        $this->organisation = $organisation;

        return $this;
    }

    /**
     * Get organisation
     *
     * @return \adg13\TaskBundle\Entity\organisation 
     */
    public function getOrganisation() {
        return $this->organisation;
    }


    /**
     * Set task
     *
     * @param \adg13\TaskBundle\Entity\Task $task
     * @return Caller
     */
    public function setTask(\adg13\TaskBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \adg13\TaskBundle\Entity\Task 
     */
    public function getTask()
    {
        return $this->task;
    }
}
