<?php

namespace adg13\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Table(name="bank_details")
 * @ORM\Entity
 */
class BankDetails {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $bank_name;

    /**
      * @ORM\Column(type="string", length=8)
     */
    private $sort_code;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $account_number;
     
    /**
     * @ORM\OneToOne(targetEntity="adg13\ProfileBundle\Entity\User", mappedBy="bank_details")
     */
    private $user;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bank_name
     *
     * @param string $bankName
     * @return BankDetails
     */
    public function setBankName($bankName)
    {
        $this->bank_name = $bankName;

        return $this;
    }

    /**
     * Get bank_name
     *
     * @return string 
     */
    public function getBankName()
    {
        return $this->bank_name;
    }

    /**
     * Set sort_code
     *
     * @param integer $sortCode
     * @return BankDetails
     */
    public function setSortCode($sortCode)
    {
        $this->sort_code = $sortCode;

        return $this;
    }

    /**
     * Get sort_code
     *
     * @return integer 
     */
    public function getSortCode()
    {
        return $this->sort_code;
    }

    /**
     * Set account_number
     *
     * @param integer $accountNumber
     * @return BankDetails
     */
    public function setAccountNumber($accountNumber)
    {
        $this->account_number = $accountNumber;

        return $this;
    }

    /**
     * Get account_number
     *
     * @return integer 
     */
    public function getAccountNumber()
    {
        return $this->account_number;
    }

    /**
     * Set user
     *
     * @param \adg13\ProfileBundle\Entity\User $user
     * @return BankDetails
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
