<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $status;
    
    /**
     * @var string
     */
    private $avatarPath;
    
    /**
     * @var string
     */
    private $bio;        

    /**
     * @var \AppBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\User
     */
    private $updatedBy;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \AppBundle\Entity\UserRole
     */
    private $userRole;
      /**
     * @var string
     */
    private $gainFactor;

    /**
     * @var string
     */
    private $securityCode;

     /**
     * @var float
     */
    private $userOrder;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }




    /**
     * Set avatarPath
     *
     * @param string $avatarPath
     * @return User
     */
    public function setAvatarPath($avatarPath)
    {
        $this->avatarPath = $avatarPath;

        return $this;
    }

    /**
     * Get avatarPath
     *
     * @return string 
     */
    public function getAvatarPath()
    {
        return $this->avatarPath;
    }
    
    
    
    /**
     * Set bio
     *
     * @param string $bio
     * @return User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string 
     */
    public function getBio()
    {
        return $this->bio;
    }







    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return User
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
     * Set createdBy
     *
     * @param \AppBundle\Entity\User $createdBy
     * @return User
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
     * Set updatedBy
     *
     * @param \AppBundle\Entity\User $updatedBy
     * @return User
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

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
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
     * @return User
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
     * Set userRole
     *
     * @param \AppBundle\Entity\UserRole $userRole
     * @return User
     */
    public function setUserRole(\AppBundle\Entity\UserRole $userRole = null)
    {
        $this->userRole = $userRole;

        return $this;
    }

    /**
     * Get userRole
     *
     * @return \AppBundle\Entity\UserRole 
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    public function getRoles(){
        // Replace ' ' with _
        return array('ROLE_ADMINISTRADOR');
        $role = str_replace(' ', '_', $this->userRole->getName());
        
        
        if ($role == 'CEMPRO') {
            
            return array('ROLE_ADMINISTRADOR');
        } else {
            
            return array('ROLE_' . strtoupper($role));
        }
    }

    public function getSalt() {
        return null;
    }

    public function getUsername() {
        return $this->email;
    }

    public function eraseCredentials() {
    }

    /** @see \Serializable::serialize() */
    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized) {
        list (
            $this->id,
            $this->email,
            $this->password
        ) = unserialize($serialized);
    }

    /**
     * toString
     *
     * @return string 
     */
    public function __toString()
    {
        if ($this->email) {
            return $this->email;
        }

        return "";
    }
    /**
     * @var \AppBundle\Entity\Organization
     */
    private $organization;


    /**
     * Set organization
     *
     * @param \AppBundle\Entity\Organization $organization
     * @return User
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
     * Set securityCode
     *
     * @param string $securityCode
     * @return User
     */
    public function setsecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;

        return $this;
    }

    /**
     * Get securityCode
     *
     * @return string 
     */
    public function getsecurityCode()
    {
        return $this->securityCode;
    }

       /**
     * Set gainFactor
     *
     * @param string $gainFactor
     * @return User
     */
    public function setGainFactor($gainFactor)
    {
        $this->gainFactor = $gainFactor;
    
        return $this;
    }

    /**
     * Get gainFactor
     *
     * @return string 
     */
    public function getGainFactor()
    {
        return $this->gainFactor;
    }

    /**
     * Set userOrder
     *
     * @param float $userOrder
     * @return User
     */
    public function setUserOrder($userOrder)
    {
        $this->userOrder = $userOrder;

        return $this;
    }

    /**
     * Get userOrder
     *
     * @return float 
     */
    public function getUserOrder()
    {
        return $this->userOrder;
    }
}
