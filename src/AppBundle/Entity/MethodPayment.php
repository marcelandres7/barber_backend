<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MethodPayment
 */
class MethodPayment
{
    /**
     * @var integer
     */
    private $methodPaymentId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $isActive;

    /**
     * @var string
     */
    private $percent;

    /**
     * @var string
     */
    private $addClient;


    /**
     * Get methodPaymentId
     *
     * @return integer 
     */
    public function getMethodPaymentId()
    {
        return $this->methodPaymentId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return MethodPayment
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

    /**
     * Set description
     *
     * @param string $description
     * @return MethodPayment
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
     * Set isActive
     *
     * @param integer $isActive
     * @return MethodPayment
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
     * Set percent
     *
     * @param string $percent
     * @return MethodPayment
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;
    
        return $this;
    }

    /**
     * Get percent
     *
     * @return string 
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Set addClient
     *
     * @param string $addClient
     * @return MethodPayment
     */
    public function setAddClient($addClient)
    {
        $this->addClient = $addClient;
    
        return $this;
    }

    /**
     * Get addClient
     *
     * @return string 
     */
    public function getAddClient()
    {
        return $this->addClient;
    }
}
