<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menus
 */
class Menus
{
    /**
     * @var integer
     */
    private $menuId;

    /**
     * @var string
     */
    private $menuName;

    /**
     * @var string
     */
    private $picturePath;

    /**
     * @var string
     */
    private $price;

    /**
     * @var integer
     */
    private $menuOrder;

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var integer
     */
    private $createdBy;



    /**
     * Get menuId
     *
     * @return integer 
     */
    public function getMenuId()
    {
        return $this->menuId;
    }

    /**
     * Set menuName
     *
     * @param string $menuName
     * @return Menus
     */
    public function setMenuName($menuName)
    {
        $this->menuName = $menuName;
    
        return $this;
    }

    /**
     * Get menuName
     *
     * @return string 
     */
    public function getMenuName()
    {
        return $this->menuName;
    }

    /**
     * Set picturePath
     *
     * @param string $picturePath
     * @return Menus
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
     * Set price
     *
     * @param string $price
     * @return Menus
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     * @return Menus
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    
        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set menuOrder
     *
     * @param integer $menuOrder
     * @return Menus
     */
    public function setMenuOrder($menuOrder)
    {
        $this->menuOrder = $menuOrder;
    
        return $this;
    }

    /**
     * Get menuOrder
     *
     * @return integer 
     */
    public function getMenuOrder()
    {
        return $this->menuOrder;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Menus
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Menus
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
     * @return Menus
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
     * @var integer
     */
    private $isActive;

    /**
     * @var \AppBundle\Entity\MenuClass
     */
    private $menuClass;

    /**
     * @var \AppBundle\Entity\MenuType
     */
    private $menuType;


    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return Menus
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set menuClass
     *
     * @param \AppBundle\Entity\MenuClass $menuClass
     * @return Menus
     */
    public function setMenuClass(\AppBundle\Entity\MenuClass $menuClass = null)
    {
        $this->menuClass = $menuClass;
    
        return $this;
    }

    /**
     * Get menuClass
     *
     * @return \AppBundle\Entity\MenuClass 
     */
    public function getMenuClass()
    {
        return $this->menuClass;
    }

    /**
     * Set menuType
     *
     * @param \AppBundle\Entity\MenuType $menuType
     * @return Menus
     */
    public function setMenuType(\AppBundle\Entity\MenuType $menuType = null)
    {
        $this->menuType = $menuType;
    
        return $this;
    }

    /**
     * Get menuType
     *
     * @return \AppBundle\Entity\MenuType 
     */
    public function getMenuType()
    {
        return $this->menuType;
    }
}
