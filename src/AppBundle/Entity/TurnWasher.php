<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TurnWasher
 */
class TurnWasher
{
    /**
     * @var integer
     */
    private $turnWasherId;

    /**
     * @var integer
     */
    private $summaryServiceId;

    /**
     * @var integer
     */
    private $washerId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var integer
     */
    private $organizationId;


    /**
     * Get turnWasherId
     *
     * @return integer 
     */
    public function getTurnWasherId()
    {
        return $this->turnWasherId;
    }

    /**
     * Set summaryServiceId
     *
     * @param integer $summaryServiceId
     * @return TurnWasher
     */
    public function setSummaryServiceId($summaryServiceId)
    {
        $this->summaryServiceId = $summaryServiceId;
    
        return $this;
    }

    /**
     * Get summaryServiceId
     *
     * @return integer 
     */
    public function getSummaryServiceId()
    {
        return $this->summaryServiceId;
    }

    /**
     * Set washerId
     *
     * @param integer $washerId
     * @return TurnWasher
     */
    public function setWasherId($washerId)
    {
        $this->washerId = $washerId;
    
        return $this;
    }

    /**
     * Get washerId
     *
     * @return integer 
     */
    public function getWasherId()
    {
        return $this->washerId;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return TurnWasher
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
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return TurnWasher
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
    
        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set organizationId
     *
     * @param integer $organizationId
     * @return TurnWasher
     */
    public function setOrganizationId($organizationId)
    {
        $this->organizationId = $organizationId;
    
        return $this;
    }

    /**
     * Get organizationId
     *
     * @return integer 
     */
    public function getOrganizationId()
    {
        return $this->organizationId;
    }
}
