<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SummaryService
 */
class SummaryService
{
    /**
     * @var integer
     */
    private $idSummaryService;

    /**
     * @var string
     */
    private $totalPayment;

    /**
     * @var integer
     */
    private $methodPayment;

    /**
     * @var \DateTime
     */
    private $serviceStart;

    /**
     * @var \DateTime
     */
    private $serviceEnd;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \AppBundle\Entity\Client
     */
    private $client;

    /**
     * @var \AppBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\Organization
     */
    private $organization;

    /**
     * @var \AppBundle\Entity\User
     */
    private $professional;

    /**
     * @var \AppBundle\Entity\Status
     */
    private $status;


    /**
     * Get idSummaryService
     *
     * @return integer 
     */
    public function getIdSummaryService()
    {
        return $this->idSummaryService;
    }

    /**
     * Set totalPayment
     *
     * @param string $totalPayment
     * @return SummaryService
     */
    public function setTotalPayment($totalPayment)
    {
        $this->totalPayment = $totalPayment;
    
        return $this;
    }

    /**
     * Get totalPayment
     *
     * @return string 
     */
    public function getTotalPayment()
    {
        return $this->totalPayment;
    }

    /**
     * Set methodPayment
     *
     * @param integer $methodPayment
     * @return SummaryService
     */
    public function setMethodPayment($methodPayment)
    {
        $this->methodPayment = $methodPayment;
    
        return $this;
    }

    /**
     * Get methodPayment
     *
     * @return integer 
     */
    public function getMethodPayment()
    {
        return $this->methodPayment;
    }

    /**
     * Set serviceStart
     *
     * @param \DateTime $serviceStart
     * @return SummaryService
     */
    public function setServiceStart($serviceStart)
    {
        $this->serviceStart = $serviceStart;
    
        return $this;
    }

    /**
     * Get serviceStart
     *
     * @return \DateTime 
     */
    public function getServiceStart()
    {
        return $this->serviceStart;
    }

    /**
     * Set serviceEnd
     *
     * @param \DateTime $serviceEnd
     * @return SummaryService
     */
    public function setServiceEnd($serviceEnd)
    {
        $this->serviceEnd = $serviceEnd;
    
        return $this;
    }

    /**
     * Get serviceEnd
     *
     * @return \DateTime 
     */
    public function getServiceEnd()
    {
        return $this->serviceEnd;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return SummaryService
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
     * Set client
     *
     * @param \AppBundle\Entity\Client $client
     * @return SummaryService
     */
    public function setClient(\AppBundle\Entity\Client $client = null)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     * @return SummaryService
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
     * Set organization
     *
     * @param \AppBundle\Entity\Organization $organization
     * @return SummaryService
     */
    public function setOrganization(\AppBundle\Entity\Organization $organization = null)
    {
        $this->organization = $organization;
    
        return $this;
    }

    /**
     * Get organization
     *
     * @return \AppBundle\Entity\Organization 
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * Set professional
     *
     * @param \AppBundle\Entity\User $professional
     * @return SummaryService
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

    /**
     * Set status
     *
     * @param \AppBundle\Entity\Status $status
     * @return SummaryService
     */
    public function setStatus(\AppBundle\Entity\Status $status = null)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return \AppBundle\Entity\Status 
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @var string
     */
    private $services;


    /**
     * Set services
     *
     * @param string $services
     * @return SummaryService
     */
    public function setServices($services)
    {
        $this->services = $services;
    
        return $this;
    }

    /**
     * Get services
     *
     * @return string 
     */
    public function getServices()
    {
        return $this->services;
    }
    /**
     * @var string
     */
    private $random;

    /**
     * @var string
     */
    private $color;


    /**
     * Set random
     *
     * @param string $random
     * @return SummaryService
     */
    public function setRandom($random)
    {
        $this->random = $random;
    
        return $this;
    }

    /**
     * Get random
     *
     * @return string 
     */
    public function getRandom()
    {
        return $this->random;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return SummaryService
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * @var string
     */
    private $payoutBarber;

    /**
     * @var \DateTime
     */
    private $payoutDate;

    /**
     * @var string
     */
    private $products;


    /**
     * Set payoutBarber
     *
     * @param string $payoutBarber
     * @return SummaryService
     */
    public function setPayoutBarber($payoutBarber)
    {
        $this->payoutBarber = $payoutBarber;
    
        return $this;
    }

    /**
     * Get payoutBarber
     *
     * @return string 
     */
    public function getPayoutBarber()
    {
        return $this->payoutBarber;
    }

    /**
     * Set payoutDate
     *
     * @param \DateTime $payoutDate
     * @return SummaryService
     */
    public function setPayoutDate($payoutDate)
    {
        $this->payoutDate = $payoutDate;
    
        return $this;
    }

    /**
     * Get payoutDate
     *
     * @return \DateTime 
     */
    public function getPayoutDate()
    {
        return $this->payoutDate;
    }

    /**
     * Set products
     *
     * @param string $products
     * @return SummaryService
     */
    public function setProducts($products)
    {
        $this->products = $products;
    
        return $this;
    }

    /**
     * Get products
     *
     * @return string 
     */
    public function getProducts()
    {
        return $this->products;
    }
    /**
     * @var string
     */
    private $tips;


    /**
     * Set tips
     *
     * @param string $tips
     * @return SummaryService
     */
    public function setTips($tips)
    {
        $this->tips = $tips;
    
        return $this;
    }

    /**
     * Get tips
     *
     * @return string 
     */
    public function getTips()
    {
        return $this->tips;
    }
}
