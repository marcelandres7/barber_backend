<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequirementGroup
 */
class RequirementGroup
{
    /**
     * @var integer
     */
    private $requirementGroupId;

    /**
     * @var string
     */
    private $name;


    /**
     * Get requirementGroupId
     *
     * @return integer 
     */
    public function getRequirementGroupId()
    {
        return $this->requirementGroupId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return RequirementGroup
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
    
    public function __toString() {
    	return $this->getName();
    }
    /**
     * @var string
     */
    private $nameEng;


    /**
     * Set nameEng
     *
     * @param string $nameEng
     * @return RequirementGroup
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
     * @var string
     */
    private $color;


    /**
     * Set color
     *
     * @param string $color
     * @return RequirementGroup
     */
    public function setColor($color)
    {
        $this->color = $color;
    
        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }
}
