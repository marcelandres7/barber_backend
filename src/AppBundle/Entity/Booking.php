<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 */
class Booking
{
    /**
     * @var integer
     */
    private $bookingId;

    /**
     * @var \DateTime
     */
    private $scheduledAt;

    /**
     * @var integer
     */
    private $bookingConsumeMinutes;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;
    
    /**
     * @var \DateTime
     */
    private $checkIn;
    
    /**
     * @var \DateTime
     */
    private $checkOut;

    /**
     * @var \AppBundle\Entity\BookingArea
     */
    private $bookingArea;

    /**
     * @var \AppBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\BookingStatus
     */
    private $bookingStatus;

    /**
     * @var \AppBundle\Entity\User
     */
    private $updatedBy;

    /**
     * @var \AppBundle\Entity\Unit
     */
    private $unit;


    /**
     * Get bookingId
     *
     * @return integer 
     */
    public function getBookingId()
    {
        return $this->bookingId;
    }

    /**
     * Set scheduledAt
     *
     * @param \DateTime $scheduledAt
     * @return Booking
     */
    public function setScheduledAt($scheduledAt)
    {
        $this->scheduledAt = $scheduledAt;

        return $this;
    }

    /**
     * Get scheduledAt
     *
     * @return \DateTime 
     */
    public function getScheduledAt()
    {
        return $this->scheduledAt;
    }

    /**
     * Set bookingConsumeMinutes
     *
     * @param integer $bookingConsumeMinutes
     * @return Booking
     */
    public function setBookingConsumeMinutes($bookingConsumeMinutes)
    {
        $this->bookingConsumeMinutes = $bookingConsumeMinutes;

        return $this;
    }

    /**
     * Get bookingConsumeMinutes
     *
     * @return integer 
     */
    public function getBookingConsumeMinutes()
    {
        return $this->bookingConsumeMinutes;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Booking
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Booking
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set bookingArea
     *
     * @param \AppBundle\Entity\BookingArea $bookingArea
     * @return Booking
     */
    public function setBookingArea(\AppBundle\Entity\BookingArea $bookingArea = null)
    {
        $this->bookingArea = $bookingArea;

        return $this;
    }

    /**
     * Get bookingArea
     *
     * @return \AppBundle\Entity\BookingArea 
     */
    public function getBookingArea()
    {
        return $this->bookingArea;
    }

    /**
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     * @return Booking
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
     * Set bookingStatus
     *
     * @param \AppBundle\Entity\BookingStatus $bookingStatus
     * @return Booking
     */
    public function setBookingStatus(\AppBundle\Entity\BookingStatus $bookingStatus = null)
    {
        $this->bookingStatus = $bookingStatus;

        return $this;
    }

    /**
     * Get bookingStatus
     *
     * @return \AppBundle\Entity\BookingStatus 
     */
    public function getBookingStatus()
    {
        return $this->bookingStatus;
    }

    /**
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     * @return Booking
     */
    public function setUpdatedBy(\AppBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set unit
     *
     * @param \AppBundle\Entity\Unit $unit
     * @return Booking
     */
    public function setUnit(\AppBundle\Entity\Unit $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \AppBundle\Entity\Unit 
     */
    public function getUnit()
    {
        return $this->unit;
    }
    
    /**
     * Set checkIn
     *
     * @param \DateTime $checkIn
     * @return Booking
     */
    public function setCheckIn($checkIn)
    {
        $this->checkIn = $checkIn;
        
        return $this;
    }
    
    /**
     * Get checkIn
     *
     * @return \DateTime
     */
    public function getCheckIn()
    {
        return $this->checkIn;
    }
    
    /**
     * Set checkOut
     *
     * @param \DateTime $checkOut
     * @return Booking
     */
    public function setCheckOut($checkOut)
    {
        $this->checkOut = $checkOut;
        
        return $this;
    }
    
    /**
     * Get checkOut
     *
     * @return \DateTime
     */
    public function getCheckOut()
    {
        return $this->checkOut;
    }
}
