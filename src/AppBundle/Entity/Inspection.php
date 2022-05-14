<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inspection
 */
class Inspection
{
    /**
     * @var integer
     */
    private $inspectionId;

    /**
     * @var integer
     */
    private $organizationId;

    /**
     * @var integer
     */
    private $branchId;

    /**
     * @var integer
     */
    private $assignedUserId;

    /**
     * @var integer
     */
    private $serviceId;

    /**
     * @var integer
     */
    private $currentInspectionStatusId;

    /**
     * @var integer
     */
    private $requerimentGroupId;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $updatedBy;

    /**
     * @var string
     */
    private $gpsLocation;


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
     * Set organizationId
     *
     * @param integer $organizationId
     * @return Inspection
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

    /**
     * Set branchId
     *
     * @param integer $branchId
     * @return Inspection
     */
    public function setBranchId($branchId)
    {
        $this->branchId = $branchId;
    
        return $this;
    }

    /**
     * Get branchId
     *
     * @return integer 
     */
    public function getBranchId()
    {
        return $this->branchId;
    }

    /**
     * Set assignedUserId
     *
     * @param integer $assignedUserId
     * @return Inspection
     */
    public function setAssignedUserId($assignedUserId)
    {
        $this->assignedUserId = $assignedUserId;
    
        return $this;
    }

    /**
     * Get assignedUserId
     *
     * @return integer 
     */
    public function getAssignedUserId()
    {
        return $this->assignedUserId;
    }

    /**
     * Set serviceId
     *
     * @param integer $serviceId
     * @return Inspection
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;
    
        return $this;
    }

    /**
     * Get serviceId
     *
     * @return integer 
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * Set currentInspectionStatusId
     *
     * @param integer $currentInspectionStatusId
     * @return Inspection
     */
    public function setCurrentInspectionStatusId($currentInspectionStatusId)
    {
        $this->currentInspectionStatusId = $currentInspectionStatusId;
    
        return $this;
    }

    /**
     * Get currentInspectionStatusId
     *
     * @return integer 
     */
    public function getCurrentInspectionStatusId()
    {
        return $this->currentInspectionStatusId;
    }

    /**
     * Set requerimentGroupId
     *
     * @param integer $requerimentGroupId
     * @return Inspection
     */
    public function setRequerimentGroupId($requerimentGroupId)
    {
        $this->requerimentGroupId = $requerimentGroupId;
    
        return $this;
    }

    /**
     * Get requerimentGroupId
     *
     * @return integer 
     */
    public function getRequerimentGroupId()
    {
        return $this->requerimentGroupId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Inspection
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
     * @return Inspection
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
     * @param integer $createdBy
     * @return Inspection
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
     * Set updatedBy
     *
     * @param integer $updatedBy
     * @return Inspection
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
    
        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return integer 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set gpsLocation
     *
     * @param string $gpsLocation
     * @return Inspection
     */
    public function setGpsLocation($gpsLocation)
    {
        $this->gpsLocation = $gpsLocation;
    
        return $this;
    }

    /**
     * Get gpsLocation
     *
     * @return string 
     */
    public function getGpsLocation()
    {
        return $this->gpsLocation;
    }
    /**
     * @var \AppBundle\Entity\Branch
     */
    private $branch;

    /**
     * @var \AppBundle\Entity\Organization
     */
    private $organization;

    /**
     * @var \AppBundle\Entity\RequirementGroup
     */
    private $requerimentGroup;

    /**
     * @var \AppBundle\Entity\Service
     */
    private $service;

    /**
     * @var \AppBundle\Entity\InspectionStatus
     */
    private $currentInspectionStatus;

    /**
     * @var \AppBundle\Entity\User
     */
    private $assignedUser;


    /**
     * Set branch
     *
     * @param \AppBundle\Entity\Branch $branch
     * @return Inspection
     */
    public function setBranch(\AppBundle\Entity\Branch $branch = null)
    {
        $this->branch = $branch;
    
        return $this;
    }

    /**
     * Get branch
     *
     * @return \AppBundle\Entity\Branch 
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * Set organization
     *
     * @param \AppBundle\Entity\Organization $organization
     * @return Inspection
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
     * Set requerimentGroup
     *
     * @param \AppBundle\Entity\RequirementGroup $requerimentGroup
     * @return Inspection
     */
    public function setRequerimentGroup(\AppBundle\Entity\RequirementGroup $requerimentGroup = null)
    {
        $this->requerimentGroup = $requerimentGroup;
    
        return $this;
    }

    /**
     * Get requerimentGroup
     *
     * @return \AppBundle\Entity\RequirementGroup 
     */
    public function getRequerimentGroup()
    {
        return $this->requerimentGroup;
    }

    /**
     * Set service
     *
     * @param \AppBundle\Entity\Service $service
     * @return Inspection
     */
    public function setService(\AppBundle\Entity\Service $service = null)
    {
        $this->service = $service;
    
        return $this;
    }

    /**
     * Get service
     *
     * @return \AppBundle\Entity\Service 
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set currentInspectionStatus
     *
     * @param \AppBundle\Entity\InspectionStatus $currentInspectionStatus
     * @return Inspection
     */
    public function setCurrentInspectionStatus(\AppBundle\Entity\InspectionStatus $currentInspectionStatus = null)
    {
        $this->currentInspectionStatus = $currentInspectionStatus;
    
        return $this;
    }

    /**
     * Get currentInspectionStatus
     *
     * @return \AppBundle\Entity\InspectionStatus 
     */
    public function getCurrentInspectionStatus()
    {
        return $this->currentInspectionStatus;
    }

    /**
     * Set assignedUser
     *
     * @param \AppBundle\Entity\User $assignedUser
     * @return Inspection
     */
    public function setAssignedUser(\AppBundle\Entity\User $assignedUser = null)
    {
        $this->assignedUser = $assignedUser;
    
        return $this;
    }

    /**
     * Get assignedUser
     *
     * @return \AppBundle\Entity\User 
     */
    public function getAssignedUser()
    {
        return $this->assignedUser;
    }
    /**
     * @var boolean
     */
    private $isActive;


    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Inspection
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
}
