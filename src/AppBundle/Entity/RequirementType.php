<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequirementType
 */
class RequirementType
{
    /**
     * @var integer
     */
    private $requirementTypeId;

    /**
     * @var string
     */
    private $name;

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
     * Get requirementTypeId
     *
     * @return integer 
     */
    public function getRequirementTypeId()
    {
        return $this->requirementTypeId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return RequirementType
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return RequirementType
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
     * @return RequirementType
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
     * @return RequirementType
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
    
    public function __toString() {
    	return $this->getName();
    }
    /**
     * @var integer
     */
    private $weight;

    /**
     * @var \AppBundle\Entity\RequirementGroup
     */
    private $requirementGroup;


    /**
     * Set weight
     *
     * @param integer $weight
     * @return RequirementType
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
     * Set requirementGroup
     *
     * @param \AppBundle\Entity\RequirementGroup $requirementGroup
     * @return RequirementType
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
     * @var string
     */
    private $nameEng;


    /**
     * Set nameEng
     *
     * @param string $nameEng
     * @return RequirementType
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
}
