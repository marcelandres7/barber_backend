<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 */
class Payment
{
    /**
     * @var integer
     */
    private $paymentId;

    /**
     * @var string
     */
    private $amountPay;

    /**
     * @var string
     */
    private $amountPending;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $confirmationPay;

    /**
     * @var \AppBundle\Entity\User
     */
    private $professional;


    /**
     * Get paymentId
     *
     * @return integer 
     */
    public function getPaymentId()
    {
        return $this->paymentId;
    }

    /**
     * Set amountPay
     *
     * @param string $amountPay
     * @return Payment
     */
    public function setAmountPay($amountPay)
    {
        $this->amountPay = $amountPay;
    
        return $this;
    }

    /**
     * Get amountPay
     *
     * @return string 
     */
    public function getAmountPay()
    {
        return $this->amountPay;
    }

    /**
     * Set amountPending
     *
     * @param string $amountPending
     * @return Payment
     */
    public function setAmountPending($amountPending)
    {
        $this->amountPending = $amountPending;
    
        return $this;
    }

    /**
     * Get amountPending
     *
     * @return string 
     */
    public function getAmountPending()
    {
        return $this->amountPending;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Payment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Payment
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set confirmationPay
     *
     * @param string $confirmationPay
     * @return Payment
     */
    public function setConfirmationPay($confirmationPay)
    {
        $this->confirmationPay = $confirmationPay;
    
        return $this;
    }

    /**
     * Get confirmationPay
     *
     * @return string 
     */
    public function getConfirmationPay()
    {
        return $this->confirmationPay;
    }

    /**
     * Set professional
     *
     * @param \AppBundle\Entity\User $professional
     * @return Payment
     */
    public function setProfessional(\AppBundle\Entity\User $professional = null)
    {
        $this->professional = $professional;
    
        return $this;
    }

    /**
     * Get professional
     *
     * @return \AppBundle\Entity\User 
     */
    public function getProfessional()
    {
        return $this->professional;
    }
}
