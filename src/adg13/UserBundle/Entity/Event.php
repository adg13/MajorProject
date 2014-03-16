<?php

namespace adg13\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Table(name="event")
 * @ORM\Entity
 */
class Event implements JsonSerializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $start;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $end;

    /**
     * @ORM\Column(name="all_day", type="boolean")
     */
    private $allDay;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="adg13\ProfileBundle\Entity\User", inversedBy="events", cascade={"persist"})
     */
    private $user;

    public function jsonSerialize() {
        return array(
            "title" => $this->title,
            "start" => $this->start,
            "end" => $this->end,
            "allDay" => $this->allDay,
        );
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
     * Set title
     *
     * @param string $title
     * @return Event
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Event
     */
    public function setStart($start) {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Event
     */
    public function setEnd($end) {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd() {
        return $this->end;
    }

    /**
     * Set allDay
     *
     * @param boolean $allDay
     * @return Event
     */
    public function setAllDay($allDay) {
        $this->allDay = $allDay;

        return $this;
    }

    /**
     * Get allDay
     *
     * @return boolean 
     */
    public function getAllDay() {
        return $this->allDay;
    }


    /**
     * Set user
     *
     * @param \adg13\ProfileBundle\Entity\User $user
     * @return Event
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
