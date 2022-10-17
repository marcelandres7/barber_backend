<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExpenseCategory
 */
class ExpenseCategory
{
    /**
     * @var integer
     */
    private $expenseCategoryId;

    /**
     * @var string
     */
    private $categoryName;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $comments;


    /**
     * Get expenseCategoryId
     *
     * @return integer 
     */
    public function getExpenseCategoryId()
    {
        return $this->expenseCategoryId;
    }

    /**
     * Set categoryName
     *
     * @param string $categoryName
     * @return ExpenseCategory
     */
    public function setCategoryName($categoryName)
    {
        $this->categoryName = $categoryName;
    
        return $this;
    }

    /**
     * Get categoryName
     *
     * @return string 
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return ExpenseCategory
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
     * Set comments
     *
     * @param string $comments
     * @return ExpenseCategory
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    
        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
