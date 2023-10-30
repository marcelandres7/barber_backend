<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParameterSystem
 */
class ParameterSystem
{
    /**
     * @var integer
     */
    private $parameterSystemId;

    /**
     * @var string
     */
    private $parameterName;

    /**
     * @var string
     */
    private $value1;

    /**
     * @var string
     */
    private $value2;

    /**
     * @var string
     */
    private $description;


    /**
     * Get parameterSystemId
     *
     * @return integer 
     */
    public function getParameterSystemId()
    {
        return $this->parameterSystemId;
    }

    /**
     * Set parameterName
     *
     * @param string $parameterName
     * @return ParameterSystem
     */
    public function setParameterName($parameterName)
    {
        $this->parameterName = $parameterName;
    
        return $this;
    }

    /**
     * Get parameterName
     *
     * @return string 
     */
    public function getParameterName()
    {
        return $this->parameterName;
    }

    /**
     * Set value1
     *
     * @param string $value1
     * @return ParameterSystem
     */
    public function setValue1($value1)
    {
        $this->value1 = $value1;
    
        return $this;
    }

    /**
     * Get value1
     *
     * @return string 
     */
    public function getValue1()
    {
        return $this->value1;
    }

    /**
     * Set value2
     *
     * @param string $value2
     * @return ParameterSystem
     */
    public function setValue2($value2)
    {
        $this->value2 = $value2;
    
        return $this;
    }

    /**
     * Get value2
     *
     * @return string 
     */
    public function getValue2()
    {
        return $this->value2;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ParameterSystem
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

    public function getDescription22()
    {
        return $this->description;

    }
}
