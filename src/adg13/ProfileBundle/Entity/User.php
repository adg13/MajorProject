<?php

namespace adg13\ProfileBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use JsonSerializable;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="adg13\ProfileBundle\Entity\UserRepository")
 */
class User implements UserInterface, JsonSerializable, \Serializable {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(name="first_pass", type="boolean")
     */
    private $firstPass;

    /**
     * @ORM\OneToOne(targetEntity="adg13\AdminBundle\Entity\Personal", inversedBy="user", cascade={"persist"})
     * 
     */
    private $personal;

    /**
     * @ORM\OneToOne(targetEntity="adg13\AdminBundle\Entity\Address",inversedBy="user", cascade={"persist"})
     * 
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity="adg13\AdminBundle\Entity\BankDetails",inversedBy="user", cascade={"persist"})
     * 
     */
    private $bank_details;

    /**
      /**
     * @ORM\ManyToMany(targetEntity="adg13\AdminBundle\Entity\Car", inversedBy="users", cascade={"persist"})
     * @ORM\JoinTable(name="users_has_cars")
     * */
    private $cars;

    /**
     * @ORM\OneToOne(targetEntity="adg13\AdminBundle\Entity\Privilidges", inversedBy="user", cascade={"persist"})
     * 
     */
    private $privilidges;

    /**
     * @ORM\ManyToMany(targetEntity="adg13\AdminBundle\Entity\Role", inversedBy="users", cascade={"persist"})
     *
     */
    private $roles;

    /**
     * @ORM\OneToMany(targetEntity="adg13\UserBundle\Entity\Event", mappedBy="user", cascade={"persist"})
     */
    private $events;

    /**
     * @ORM\OneToMany(targetEntity="adg13\TaskBundle\Entity\Task", mappedBy="user", cascade={"persist"})
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity="adg13\NotificationBundle\Entity\Notification", mappedBy="user", cascade={"persist"})
     */
    private $notifications;

    public function __construct() {
        $this->events = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
        $this->firstPass = true;
        $this->cars = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->getPersonal()->getFirstName() . ' ' . $this->getPersonal()->getLastname();
    }

    /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt() {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            $this->username,
            $this->firstPass,
            $this->isActive,
            $this->salt,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list (
                $this->id,
                $this->email,
                $this->password,
                $this->username,
                $this->firstPass,
                $this->isActive,
                $this->salt,
                ) = unserialize($serialized);
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt) {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive() {
        return $this->isActive;
    }

    /**
     * Set firstPass
     *
     * @param boolean $firstPass
     * @return User
     */
    public function setFirstPass($firstPass) {
        $this->firstPass = $firstPass;

        return $this;
    }

    /**
     * Get firstPass
     *
     * @return boolean 
     */
    public function getFirstPass() {
        return $this->firstPass;
    }

    /**
     * Set personal
     *
     * @param \adg13\AdminBundle\Entity\Personal $personal
     * @return User
     */
    public function setPersonal(\adg13\AdminBundle\Entity\Personal $personal = null) {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get personal
     *
     * @return \adg13\AdminBundle\Entity\Personal 
     */
    public function getPersonal() {
        return $this->personal;
    }

    /**
     * Set address
     *
     * @param \adg13\AdminBundle\Entity\Address $address
     * @return User
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
     * Set bank_details
     *
     * @param \adg13\AdminBundle\Entity\BankDetails $bank_details
     * @return User
     */
    public function setBankDetails(\adg13\AdminBundle\Entity\BankDetails $bank_details = null) {
        $this->bank_details = $bank_details;

        return $this;
    }

    /**
     * Get bank_details
     *
     * @return \adg13\AdminBundle\Entity\BankDetails 
     */
    public function getBankDetails() {
        return $this->bank_details;
    }

    /**
     * Add cars
     *
     * @param \adg13\AdminBundle\Entity\Car $cars
     * @return User
     */
    public function addCar(\adg13\AdminBundle\Entity\Car $cars) {
        $this->cars[] = $cars;

        return $this;
    }

    /**
     * Remove cars
     *
     * @param \adg13\AdminBundle\Entity\Car $cars
     */
    public function removeCar(\adg13\AdminBundle\Entity\Car $cars) {
        $this->cars->removeElement($cars);
    }

    /**
     * Get cars
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCars() {
        return $this->cars;
    }

    public function jsonSerialize() {
        return array(
            "address" => $this->address,
            "personal" => $this->personal,
        );
    }

    public function getRoles() {
        return $this->roles->toArray();
    }

    public function isAccountNonExpired() {
        
    }

    public function isAccountNonLocked() {
        
    }

    public function isCredentialsNonExpired() {
        
    }

    public function isEnabled() {
        
    }

    /**
     * Set privilidges
     *
     * @param \adg13\AdminBundle\Entity\Privilidges $privilidges
     * @return User
     */
    public function setPrivilidges(\adg13\AdminBundle\Entity\Privilidges $privilidges = null) {
        $this->privilidges = $privilidges;

        return $this;
    }

    /**
     * Get privilidges
     *
     * @return \adg13\AdminBundle\Entity\Privilidges 
     */
    public function getPrivilidges() {
        return $this->privilidges;
    }

    /**
     * Add roles
     *
     * @param \adg13\ProfileBundle\Entity\Role $roles
     * @return User
     */
    public function addRole(\adg13\AdminBundle\Entity\Role $roles) {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \adg13\ProfileBundle\Entity\Role $roles
     */
    public function removeRole(\adg13\AdminBundle\Entity\Role $roles) {
        $this->roles->removeElement($roles);
    }

    /**
     * Set roles
     *
     * @param \adg13\AdminBundle\Entity\Role $roles
     * @return User
     */
    public function setRoles(\adg13\AdminBundle\Entity\Role $roles = null) {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Add events
     *
     * @param \adg13\UserBundle\Entity\Event $events
     * @return User
     */
    public function addEvent(\adg13\UserBundle\Entity\Event $events) {
        $this->events[] = $events;

        return $this;
    }

    /**
     * Remove events
     *
     * @param \adg13\UserBundle\Entity\Event $events
     */
    public function removeEvent(\adg13\UserBundle\Entity\Event $events) {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents() {
        return $this->events;
    }

    /**
     * Add tasks
     *
     * @param \adg13\TaskBundle\Entity\Task $tasks
     * @return User
     */
    public function addTask(\adg13\TaskBundle\Entity\Task $tasks) {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \adg13\TaskBundle\Entity\Task $tasks
     */
    public function removeTask(\adg13\TaskBundle\Entity\Task $tasks) {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks() {
        return $this->tasks;
    }


    /**
     * Add notifications
     *
     * @param \adg13\NotificationBundle\Entity\Notification $notifications
     * @return User
     */
    public function addNotification(\adg13\NotificationBundle\Entity\Notification $notifications)
    {
        $this->notifications[] = $notifications;

        return $this;
    }

    /**
     * Remove notifications
     *
     * @param \adg13\NotificationBundle\Entity\Notification $notifications
     */
    public function removeNotification(\adg13\NotificationBundle\Entity\Notification $notifications)
    {
        $this->notifications->removeElement($notifications);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}
