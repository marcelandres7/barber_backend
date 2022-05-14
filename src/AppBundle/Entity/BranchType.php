<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BranchType
 */
class BranchType
{
    /**
     * @var integer
     */
    private $branchTypeId;

    /**
     * @var string
     */
    private $name;


    /**
     * Get branchTypeId
     *
     * @return integer 
     */
    public function getBranchTypeId()
    {
        return $this->branchTypeId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BranchType
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
        return $this->name;
    }
    /**
     * @var string
     */
    private $description;


    /**
     * Set description
     *
     * @param string $description
     * @return BranchType
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
     * @return BranchType
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
     * @return BranchType
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
