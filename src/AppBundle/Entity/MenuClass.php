<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuClass
 */
class MenuClass
{
    /**
     * @var integer
     */
    private $menuClassId;

    /**
     * @var string
     */
    private $menuClassName;


    /**
     * Get menuClassId
     *
     * @return integer 
     */
    public function getMenuClassId()
    {
        return $this->menuClassId;
    }

    /**
     * Set menuClassName
     *
     * @param string $menuClassName
     * @return MenuClass
     */
    public function setMenuClassName($menuClassName)
    {
        $this->menuClassName = $menuClassName;
    
        return $this;
    }

    /**
     * Get menuClassName
     *
     * @return string 
     */
    public function getMenuClassName()
    {
        return $this->menuClassName;
    }
}
