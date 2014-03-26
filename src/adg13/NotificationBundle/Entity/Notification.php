<?php

namespace adg13\NotificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="notification")
 * @ORM\Entity
 */
class Notification {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type;

    /**
     * @ORM\Column(name="notDate", type="date")
     */
    private $notDate;

    /**
     * @ORM\ManyToOne(targetEntity="adg13\ProfileBundle\Entity\User", inversedBy="notifications")
     */
    private $user;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Notification
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set notDate
     *
     * @param \DateTime $notDate
     * @return Notification
     */
    public function setNotDate($notDate) {
        $this->notDate = $notDate;

        return $this;
    }

    /**
     * Get notDate
     *
     * @return \DateTime 
     */
    public function getNotDate() {
        return $this->notDate;
    }

    /**
     * Set user
     *
     * @param \adg13\ProfileBundle\Entity\User $user
     * @return Notification
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
