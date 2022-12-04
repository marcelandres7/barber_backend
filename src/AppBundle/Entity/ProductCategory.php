<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductCategory
 */
class ProductCategory
{
    /**
     * @var integer
     */
    private $productCategoryId;

    /**
     * @var string
     */
    private $productCategoryName;

    /**
     * @var string
     */
    private $status;


    /**
     * Get productCategoryId
     *
     * @return integer 
     */
    public function getProductCategoryId()
    {
        return $this->productCategoryId;
    }

    /**
     * Set productCategoryName
     *
     * @param string $productCategoryName
     * @return ProductCategory
     */
    public function setProductCategoryName($productCategoryName)
    {
        $this->productCategoryName = $productCategoryName;
    
        return $this;
    }

    /**
     * Get productCategoryName
     *
     * @return string 
     */
    public function getProductCategoryName()
    {
        return $this->productCategoryName;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return ProductCategory
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
}
