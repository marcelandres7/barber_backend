<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProfessionalReservation
 */
class ProfessionalReservation
{
    /**
     * @var integer
     */
    private $professionalReservationId;

    /**
     * @var integer
     */
    private $summaryServiceId;

    /**
     * @var integer
     */
    private $professionalId;

    /**
     * @var \DateTime
     */
    private $scheduledFrom;

    /**
     * @var \DateTime
     */
    private $scheduledTo;

    /**
     * @var integer
     */
    private $hoursQuantity;

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var \DateTime
     */
    private $createdAt;


    /**
     * Get professionalReservationId
     *
     * @return integer 
     */
    public function getProfessionalReservationId()
    {
        return $this->professionalReservationId;
    }

    /**
     * Set summaryServiceId
     *
     * @param integer $summaryServiceId
     * @return ProfessionalReservation
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
     * Set professionalId
     *
     * @param integer $professionalId
     * @return ProfessionalReservation
     */
    public function setProfessionalId($professionalId)
    {
        $this->professionalId = $professionalId;
    
        return $this;
    }

    /**
     * Get professionalId
     *
     * @return integer 
     */
    public function getProfessionalId()
    {
        return $this->professionalId;
    }

    /**
     * Set scheduledFrom
     *
     * @param \DateTime $scheduledFrom
     * @return ProfessionalReservation
     */
    public function setScheduledFrom($scheduledFrom)
    {
        $this->scheduledFrom = $scheduledFrom;
    
        return $this;
    }

    /**
     * Get scheduledFrom
     *
     * @return \DateTime 
     */
    public function getScheduledFrom()
    {
        return $this->scheduledFrom;
    }

    /**
     * Set scheduledTo
     *
     * @param \DateTime $scheduledTo
     * @return ProfessionalReservation
     */
    public function setScheduledTo($scheduledTo)
    {
        $this->scheduledTo = $scheduledTo;
    
        return $this;
    }

    /**
     * Get scheduledTo
     *
     * @return \DateTime 
     */
    public function getScheduledTo()
    {
        return $this->scheduledTo;
    }

    /**
     * Set hoursQuantity
     *
     * @param integer $hoursQuantity
     * @return ProfessionalReservation
     */
    public function setHoursQuantity($hoursQuantity)
    {
        $this->hoursQuantity = $hoursQuantity;
    
        return $this;
    }

    /**
     * Get hoursQuantity
     *
     * @return integer 
     */
    public function getHoursQuantity()
    {
        return $this->hoursQuantity;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return ProfessionalReservation
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    
        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return ProfessionalReservation
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
}
