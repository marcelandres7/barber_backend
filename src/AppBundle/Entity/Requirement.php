<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Requirement
 */
class Requirement
{
    /**
     * @var integer
     */
    private $requirementId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $lawReference;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var integer
     */
    private $weight;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \AppBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\RequirementGroup
     */
    private $requirementGroup;

    /**
     * @var \AppBundle\Entity\RequirementPenalty
     */
    private $requirementPenalty;

    /**
     * @var \AppBundle\Entity\RequirementType
     */
    private $requirementType;

    /**
     * @var \AppBundle\Entity\User
     */
    private $updatedBy;


    /**
     * Get requirementId
     *
     * @return integer 
     */
    public function getRequirementId()
    {
        return $this->requirementId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Requirement
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
     * @return Requirement
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
     * Set lawReference
     *
     * @param string $lawReference
     * @return Requirement
     */
    public function setLawReference($lawReference)
    {
        $this->lawReference = $lawReference;
    
        return $this;
    }

    /**
     * Get lawReference
     *
     * @return string 
     */
    public function getLawReference()
    {
        return $this->lawReference;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Requirement
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
     * Set weight
     *
     * @param integer $weight
     * @return Requirement
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Requirement
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
     * @return Requirement
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
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     * @return Requirement
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
     * Set requirementGroup
     *
     * @param \AppBundle\Entity\RequirementGroup $requirementGroup
     * @return Requirement
     */
    public function setRequirementGroup(\AppBundle\Entity\RequirementGroup $requirementGroup = null)
    {
        $this->requirementGroup = $requirementGroup;
    
        return $this;
    }

    /**
     * Get requirementGroup
     *
     * @return \AppBundle\Entity\RequirementGroup 
     */
    public function getRequirementGroup()
    {
        return $this->requirementGroup;
    }

    /**
     * Set requirementPenalty
     *
     * @param \AppBundle\Entity\RequirementPenalty $requirementPenalty
     * @return Requirement
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
     * Set requirementType
     *
     * @param \AppBundle\Entity\RequirementType $requirementType
     * @return Requirement
     */
    public function setRequirementType(\AppBundle\Entity\RequirementType $requirementType = null)
    {
        $this->requirementType = $requirementType;
    
        return $this;
    }

    /**
     * Get requirementType
     *
     * @return \AppBundle\Entity\RequirementType 
     */
    public function getRequirementType()
    {
        return $this->requirementType;
    }

    /**
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     * @return Requirement
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
    
     public function __toString() {
    	return $this->getName();
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
     * @var string
     */
    private $lawReferenceEng;


    /**
     * Set nameEng
     *
     * @param string $nameEng
     * @return Requirement
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
     * @return Requirement
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

    /**
     * Set lawReferenceEng
     *
     * @param string $lawReferenceEng
     * @return Requirement
     */
    public function setLawReferenceEng($lawReferenceEng)
    {
        $this->lawReferenceEng = $lawReferenceEng;
    
        return $this;
    }

    /**
     * Get lawReferenceEng
     *
     * @return string 
     */
    public function getLawReferenceEng()
    {
        return $this->lawReferenceEng;
    }
}
