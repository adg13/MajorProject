<?php

namespace adg13\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * @ORM\Table(name="personal")
 * @ORM\Entity
 */
class Personal implements JsonSerializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $second_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $gender;

    /**
     * @ORM\Column(name="date_of_birth", type="date")
     */
    private $date_of_birth;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $nationality;

    /**
     * @ORM\OneToOne(targetEntity="adg13\ProfileBundle\Entity\User", mappedBy="personal")
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
     * Set title
     *
     * @param string $title
     * @return Personal
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
     * Set first_name
     *
     * @param string $firstName
     * @return Personal
     */
    public function setFirstName($firstName) {
        $this->first_name = $firstName;

        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName() {
        return $this->first_name;
    }

    /**
     * Set second_name
     *
     * @param string $secondName
     * @return Personal
     */
    public function setSecondName($secondName) {
        $this->second_name = $secondName;

        return $this;
    }

    /**
     * Get second_name
     *
     * @return string 
     */
    public function getSecondName() {
        return $this->second_name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Personal
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
     * Set gender
     *
     * @param string $gender
     * @return Personal
     */
    public function setGender($gender) {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Set date_of_birth
     *
     * @param \DateTime $dateOfBirth
     * @return Personal
     */
    public function setDateOfBirth($dateOfBirth) {
        $this->date_of_birth = $dateOfBirth;

        return $this;
    }

    /**
     * Get date_of_birth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth() {
        return $this->date_of_birth;
    }

    /**
     * Set nationality
     *
     * @param string $nationality
     * @return Personal
     */
    public function setNationality($nationality) {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * Get nationality
     *
     * @return string 
     */
    public function getNationality() {
        return $this->nationality;
    }

    /**
     * Set user
     *
     * @param \adg13\ProfileBundle\Entity\User $user
     * @return Personal
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

    public function jsonSerialize() {
        return array(
            'first_name' => $this->getFirstName(),
            'lastname' => $this->getLastname(),
            
        );
    }

}
