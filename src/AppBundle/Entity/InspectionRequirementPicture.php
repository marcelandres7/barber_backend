<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InspectionRequirementPicture
 */
class InspectionRequirementPicture
{
    /**
     * @var integer
     */
    private $inspectionRequirementPictureId;

    /**
     * @var string
     */
    private $picturePath;

    /**
     * @var integer
     */
    private $inspectionId;

    /**
     * @var integer
     */
    private $requirementId;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var integer
     */
    private $createdBy;


    /**
     * Get inspectionRequirementPictureId
     *
     * @return integer 
     */
    public function getInspectionRequirementPictureId()
    {
        return $this->inspectionRequirementPictureId;
    }

    /**
     * Set picturePath
     *
     * @param string $picturePath
     * @return InspectionRequirementPicture
     */
    public function setPicturePath($picturePath)
    {
        $this->picturePath = $picturePath;
    
        return $this;
    }

    /**
     * Get picturePath
     *
     * @return string 
     */
    public function getPicturePath()
    {
        return $this->picturePath;
    }

    /**
     * Set inspectionId
     *
     * @param integer $inspectionId
     * @return InspectionRequirementPicture
     */
    public function setInspectionId($inspectionId)
    {
        $this->inspectionId = $inspectionId;
    
        return $this;
    }

    /**
     * Get inspectionId
     *
     * @return integer 
     */
    public function getInspectionId()
    {
        return $this->inspectionId;
    }

    /**
     * Set requirementId
     *
     * @param integer $requirementId
     * @return InspectionRequirementPicture
     */
    public function setRequirementId($requirementId)
    {
        $this->requirementId = $requirementId;
    
        return $this;
    }

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return InspectionRequirementPicture
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
     * @param integer $createdBy
     * @return InspectionRequirementPicture
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
    /**
     * @var \AppBundle\Entity\Requirement
     */
    private $requirement;

    /**
     * @var \AppBundle\Entity\Inspection
     */
    private $inspection;


    /**
     * Set requirement
     *
     * @param \AppBundle\Entity\Requirement $requirement
     * @return InspectionRequirementPicture
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
     * Set inspection
     *
     * @param \AppBundle\Entity\Inspection $inspection
     * @return InspectionRequirementPicture
     */
    public function setInspection(\AppBundle\Entity\Inspection $inspection = null)
    {
        $this->inspection = $inspection;
    
        return $this;
    }

    /**
     * Get inspection
     *
     * @return \AppBundle\Entity\Inspection 
     */
    public function getInspection()
    {
        return $this->inspection;
    }
}
