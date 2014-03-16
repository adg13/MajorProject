<?php

namespace adg13\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="task")
 * @ORM\Entity
 */
class Task implements \JsonSerializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $conditions;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAccepted;

    /**
     * @ORM\Column(type="date")
     */
    private $contactTime;

    /**
     * @ORM\Column(type="date")
     */
    private $returnTime;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="adg13\ProfileBundle\Entity\User", inversedBy="tasks", cascade={"persist"})
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="adg13\TaskBundle\Entity\Contact",inversedBy="task", cascade={"persist"})
     * 
     */
    private $contact;

    /**
     * @ORM\OneToOne(targetEntity="adg13\TaskBundle\Entity\Caller",inversedBy="task", cascade={"persist"})
     * 
     */
    private $caller;

    public function __construct() {
        $this->caller = new Caller();
        $this->contact = new Contact();
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
     * Set description
     *
     * @param string $description
     * @return Task
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set conditions
     *
     * @param string $conditions
     * @return Task
     */
    public function setConditions($conditions) {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * Get conditions
     *
     * @return string 
     */
    public function getConditions() {
        return $this->conditions;
    }

    /**
     * Set isAccepted
     *
     * @param boolean $isAccepted
     * @return Task
     */
    public function setIsAccepted($isAccepted) {
        $this->isAccepted = $isAccepted;

        return $this;
    }

    /**
     * Get isAccepted
     *
     * @return boolean 
     */
    public function getIsAccepted() {
        return $this->isAccepted;
    }

    /**
     * Set contactTime
     *
     * @param \DateTime $contactTime
     * @return Task
     */
    public function setContactTime($contactTime) {
        $this->contactTime = $contactTime;

        return $this;
    }

    /**
     * Get contactTime
     *
     * @return \DateTime 
     */
    public function getContactTime() {
        return $this->contactTime;
    }

    /**
     * Set returnTime
     *
     * @param \DateTime $returnTime
     * @return Task
     */
    public function setReturnTime($returnTime) {
        $this->returnTime = $returnTime;

        return $this;
    }

    /**
     * Get returnTime
     *
     * @return \DateTime 
     */
    public function getReturnTime() {
        return $this->returnTime;
    }

    /**
     * Set user
     *
     * @param \adg13\ProfileBundle\Entity\User $user
     * @return Task
     */
    public function setUser(\adg13\ProfileBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \adg13\ProfileBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set organisation
     *
     * @param \adg13\TaskBundle\Entity\Organisation $organisation
     * @return Task
     */

    /**
     * Set contact
     *
     * @param \adg13\TaskBundle\Entity\Contact $contact
     * @return Task
     */
    public function setContact(\adg13\TaskBundle\Entity\Contact $contact = null) {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \adg13\TaskBundle\Entity\Contact 
     */
    public function getContact() {
        return $this->contact;
    }

    /**
     * Set caller
     *
     * @param \adg13\TaskBundle\Entity\Caller $caller
     * @return Task
     */
    public function setCaller(\adg13\TaskBundle\Entity\Caller $caller = null) {
        $this->caller = $caller;

        return $this;
    }

    /**
     * Get caller
     *
     * @return \adg13\TaskBundle\Entity\Caller 
     */
    public function getCaller() {
        return $this->caller;
    }

}
