<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequirementItem
 */
class RequirementItem
{
    /**
     * @var integer
     */
    private $requirementItemId;

    /**
     * @var string
     */
    private $articleContent;

    /**
     * @var boolean
     */
    private $isActive;

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
     * @var \AppBundle\Entity\Requirement
     */
    private $requirement;

    /**
     * @var \AppBundle\Entity\User
     */
    private $updatedBy;


    /**
     * Get requirementItemId
     *
     * @return integer 
     */
    public function getRequirementItemId()
    {
        return $this->requirementItemId;
    }

    /**
     * Set articleContent
     *
     * @param string $articleContent
     * @return RequirementItem
     */
    public function setArticleContent($articleContent)
    {
        $this->articleContent = $articleContent;
    
        return $this;
    }

    /**
     * Get articleContent
     *
     * @return string 
     */
    public function getArticleContent()
    {
        return $this->articleContent;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return RequirementItem
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
     * @return RequirementItem
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
     * @return RequirementItem
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
     * @return RequirementItem
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
     * Set requirement
     *
     * @param \AppBundle\Entity\Requirement $requirement
     * @return RequirementItem
     */
    public function setRequirement(\AppBundle\Entity\Requirement $requirement = null)
    {
        $this->requirement = $requirement;
    
        return $this;
    }

    /**
     * Get requirement
     *
     * @return \AppBundle\Entity\Requirement 
     */
    public function getRequirement()
    {
        return $this->requirement;
    }

    /**
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     * @return RequirementItem
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
}
