<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $productId;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var integer
     */
    private $inventoryQuantity;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $isActive;

    /**
     * @var string
     */
    private $pathImagen;

    /**
     * @var integer
     */
    private $createdBy;

    /**
     * @var \DateTime
     */
    private $createdAt;


    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set productName
     *
     * @param string $productName
     * @return Product
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    
        return $this;
    }

    /**
     * Get productName
     *
     * @return string 
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set inventoryQuantity
     *
     * @param integer $inventoryQuantity
     * @return Product
     */
    public function setInventoryQuantity($inventoryQuantity)
    {
        $this->inventoryQuantity = $inventoryQuantity;
    
        return $this;
    }

    /**
     * Get inventoryQuantity
     *
     * @return integer 
     */
    public function getInventoryQuantity()
    {
        return $this->inventoryQuantity;
    }

    /**
     * Set price
     *
     * @param string $price
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
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
     * @param boolean $isActive
     * @return Product
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set pathImagen
     *
     * @param string $pathImagen
     * @return Product
     */
    public function setPathImagen($pathImagen)
    {
        $this->pathImagen = $pathImagen;
    
        return $this;
    }

    /**
     * Get pathImagen
     *
     * @return string 
     */
    public function getPathImagen()
    {
        return $this->pathImagen;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Product
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Product
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
     * @var string
     */
    private $categoryProduct;


    /**
     * Set categoryProduct
     *
     * @param string $categoryProduct
     * @return Product
     */
    public function setCategoryProduct($categoryProduct)
    {
        $this->categoryProduct = $categoryProduct;
    
        return $this;
    }

    /**
     * Get categoryProduct
     *
     * @return string 
     */
    public function getCategoryProduct()
    {
        return $this->categoryProduct;
    }
    /**
     * @var integer
     */
    private $productCategory;


    /**
     * Set productCategory
     *
     * @param integer $productCategory
     * @return Product
     */
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;
    
        return $this;
    }

    /**
     * Get productCategory
     *
     * @return integer 
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }
}
