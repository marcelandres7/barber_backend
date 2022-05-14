<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderDetail
 */
class OrderDetail
{
    /**
     * @var integer
     */
    private $orderDetailId;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var string
     */
    private $paymentTotal;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \AppBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\Product
     */
    private $product;

    /**
     * @var \AppBundle\Entity\SummaryService
     */
    private $summaryService;


    /**
     * Get orderDetailId
     *
     * @return integer 
     */
    public function getOrderDetailId()
    {
        return $this->orderDetailId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return OrderDetail
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    
        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set paymentTotal
     *
     * @param string $paymentTotal
     * @return OrderDetail
     */
    public function setPaymentTotal($paymentTotal)
    {
        $this->paymentTotal = $paymentTotal;
    
        return $this;
    }

    /**
     * Get paymentTotal
     *
     * @return string 
     */
    public function getPaymentTotal()
    {
        return $this->paymentTotal;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return OrderDetail
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return OrderDetail
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
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     * @return OrderDetail
     */
    public function setCreatedBy(\AppBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;
    
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \AppBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     * @return OrderDetail
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set summaryService
     *
     * @param \AppBundle\Entity\SummaryService $summaryService
     * @return OrderDetail
     */
    public function setSummaryService(\AppBundle\Entity\SummaryService $summaryService = null)
    {
        $this->summaryService = $summaryService;
    
        return $this;
    }

    /**
     * Get summaryService
     *
     * @return \AppBundle\Entity\SummaryService 
     */
    public function getSummaryService()
    {
        return $this->summaryService;
    }
}
