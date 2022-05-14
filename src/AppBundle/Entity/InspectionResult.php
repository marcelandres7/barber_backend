<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InspectionResult
 */
class InspectionResult
{
    /**
     * @var integer
     */
    private $inspectionResultId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \AppBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\RequirementPenalty
     */
    private $requirementPenalty;


    /**
     * Get inspectionResultId
     *
     * @return integer 
     */
    public function getInspectionResultId()
    {
        return $this->inspectionResultId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return InspectionResult
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return InspectionResult
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return InspectionResult
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return InspectionResult
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
     * @return InspectionResult
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
     * Set requirementPenalty
     *
     * @param \AppBundle\Entity\RequirementPenalty $requirementPenalty
     * @return InspectionResult
     */
    public function setRequirementPenalty(\AppBundle\Entity\RequirementPenalty $requirementPenalty = null)
    {
        $this->requirementPenalty = $requirementPenalty;
    
        return $this;
    }

    /**
     * Get requirementPenalty
     *
     * @return \AppBundle\Entity\RequirementPenalty 
     */
    public function getRequirementPenalty()
    {
        return $this->requirementPenalty;
    }
    /**
     * @var integer
     */
    private $requirementPenaltyId;


    /**
     * Set requirementPenaltyId
     *
     * @param integer $requirementPenaltyId
     * @return InspectionResult
     */
    public function setRequirementPenaltyId($requirementPenaltyId)
    {
        $this->requirementPenaltyId = $requirementPenaltyId;
    
        return $this;
    }

    /**
     * Get requirementPenaltyId
     *
     * @return integer 
     */
    public function getRequirementPenaltyId()
    {
        return $this->requirementPenaltyId;
    }
    /**
     * @var string
     */
    private $nameEng;

    /**
     * @var string
     */
    private $descriptionEng;


    /**
     * Set nameEng
     *
     * @param string $nameEng
     * @return InspectionResult
     */
    public function setNameEng($nameEng)
    {
        $this->nameEng = $nameEng;
    
        return $this;
    }

    /**
     * Get nameEng
     *
     * @return string 
     */
    public function getNameEng()
    {
        return $this->nameEng;
    }

    /**
     * Set descriptionEng
     *
     * @param string $descriptionEng
     * @return InspectionResult
     */
    public function setDescriptionEng($descriptionEng)
    {
        $this->descriptionEng = $descriptionEng;
    
        return $this;
    }

    /**
     * Get descriptionEng
     *
     * @return string 
     */
    public function getDescriptionEng()
    {
        return $this->descriptionEng;
    }
}
