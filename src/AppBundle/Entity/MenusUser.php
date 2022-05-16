<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenusUser
 */
class MenusUser
{
    /**
     * @var integer
     */
    private $menusUserId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\Menus
     */
    private $menus;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;


    /**
     * Get menusUserId
     *
     * @return integer 
     */
    public function getMenusUserId()
    {
        return $this->menusUserId;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return MenusUser
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return MenusUser
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
     * @return MenusUser
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
     * Set menus
     *
     * @param \AppBundle\Entity\Menus $menus
     * @return MenusUser
     */
    public function setMenus(\AppBundle\Entity\Menus $menus = null)
    {
        $this->menus = $menus;

        return $this;
    }

    /**
     * Get menus
     *
     * @return \AppBundle\Entity\Menus 
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return MenusUser
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
