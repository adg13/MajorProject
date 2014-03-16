<?php

namespace adg13\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="orgranisation")
 * @ORM\Entity
 */
class Organisation implements \JsonSerializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    
     /**
     * @ORM\OneToMany(targetEntity="adg13\TaskBundle\Entity\Caller", mappedBy="organisation", cascade={"persist"})
     */
    private $callers;
    
        public function __construct() {
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->callers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add callers
     *
     * @param \adg13\TaskBundle\Entity\Caller $callers
     * @return Organisation
     */
    public function addCaller(\adg13\TaskBundle\Entity\Caller $callers)
    {
        $this->callers[] = $callers;

        return $this;
    }

    /**
     * Remove callers
     *
     * @param \adg13\TaskBundle\Entity\Caller $callers
     */
    public function removeCaller(\adg13\TaskBundle\Entity\Caller $callers)
    {
        $this->callers->removeElement($callers);
    }

    /**
     * Get callers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCallers()
    {
        return $this->callers;
    }

    /**
     * Add tasks
     *
     * @param \adg13\TaskBundle\Entity\Task $tasks
     * @return Organisation
     */
    public function addTask(\adg13\TaskBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \adg13\TaskBundle\Entity\Task $tasks
     */
    public function removeTask(\adg13\TaskBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }
}
