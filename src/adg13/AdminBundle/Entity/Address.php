<?php

namespace adg13\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="address")
 * @ORM\Entity
 */
class Address implements \JsonSerializable{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $line1;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $line2;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $region;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tel;

    /**
     * @ORM\OneToOne(targetEntity="adg13\ProfileBundle\Entity\User", mappedBy="address")
     */
    private $user;
    
    /**
     * @ORM\OneToOne(targetEntity="adg13\TaskBundle\Entity\Contact", mappedBy="address", cascade={"persist"})
     */
    private $contact;

    public function toString() {
        return $this->line1 . ', ' . $this->line2 . ', ' . $this->city . ', ' . $this->postcode . ', ' . $this->region;
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
     * Set line1
     *
     * @param string $line1
     * @return Address
     */
    public function setLine1($line1) {
        $this->line1 = $line1;

        return $this;
    }

    /**
     * Get line1
     *
     * @return string 
     */
    public function getLine1() {
        return $this->line1;
    }

    /**
     * Set line2
     *
     * @param string $line2
     * @return Address
     */
    public function setLine2($line2) {
        $this->line2 = $line2;

        return $this;
    }

    /**
     * Get line2
     *
     * @return string 
     */
    public function getLine2() {
        return $this->line2;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return Address
     */
    public function setPostcode($postcode) {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string 
     */
    public function getPostcode() {
        return $this->postcode;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Address
     */
    public function setRegion($region) {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion() {
        return $this->region;
    }


    /**
     * Set user
     *
     * @param \adg13\ProfileBundle\Entity\User $user
     * @return Address
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

    /**
     * Set tel
     *
     * @param string $tel
     * @return Address
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    public function jsonSerialize() {
        return array(
            'address' => $this->toString(),
            'tel' => $this->tel,
        );
    }


    /**
     * Set contact
     *
     * @param \adg13\TaskBundle\Entity\Contact $contact
     * @return Address
     */
    public function setContact(\adg13\TaskBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \adg13\TaskBundle\Entity\Contact 
     */
    public function getContact()
    {
        return $this->contact;
    }
}
