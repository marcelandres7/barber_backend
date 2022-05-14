<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuType
 */
class MenuType
{
    /**
     * @var integer
     */
    private $menuTypeId;

    /**
     * @var string
     */
    private $menuTypeName;


    /**
     * Get menuTypeId
     *
     * @return integer 
     */
    public function getMenuTypeId()
    {
        return $this->menuTypeId;
    }

    /**
     * Set menuTypeName
     *
     * @param string $menuTypeName
     * @return MenuType
     */
    public function setMenuTypeName($menuTypeName)
    {
        $this->menuTypeName = $menuTypeName;
    
        return $this;
    }

    /**
     * Get menuTypeName
     *
     * @return string 
     */
    public function getMenuTypeName()
    {
        return $this->menuTypeName;
    }
}
