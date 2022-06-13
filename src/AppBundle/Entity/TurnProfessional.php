<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TurnProfessional
 */
class TurnProfessional
{
    /**
     * @var integer
     */
    private $turnId;

    /**
     * @var integer
     */
    private $profId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $turnDate;


    /**
     * Get turnId
     *
     * @return integer 
     */
    public function getTurnId()
    {
        return $this->turnId;
    }

    /**
     * Set profId
     *
     * @param integer $profId
     * @return TurnProfessional
     */
    public function setProfId($profId)
    {
        $this->profId = $profId;
    
        return $this;
    }

    /**
     * Get profId
     *
     * @return integer 
     */
    public function getProfId()
    {
        return $this->profId;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return TurnProfessional
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
     * Set turnDate
     *
     * @param \DateTime $turnDate
     * @return TurnProfessional
     */
    public function setTurnDate($turnDate)
    {
        $this->turnDate = $turnDate;
    
        return $this;
    }

    /**
     * Get turnDate
     *
     * @return \DateTime 
     */
    public function getTurnDate()
    {
        return $this->turnDate;
    }
    /**
     * @var integer
     */
    private $organizationId;


    /**
     * Set organizationId
     *
     * @param integer $organizationId
     * @return TurnProfessional
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
