<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Expense
 */
class Expense
{
    /**
     * @var integer
     */
    private $expenseId;

    /**
     * @var string
     */
    private $pay;

    /**
     * @var \DateTime
     */
    private $payDate;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $pathImage;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \AppBundle\Entity\ExpenseCategory
     */
    private $category;


    /**
     * Get expenseId
     *
     * @return integer 
     */
    public function getExpenseId()
    {
        return $this->expenseId;
    }

    /**
     * Set pay
     *
     * @param string $pay
     * @return Expense
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    
        return $this;
    }

    /**
     * Get pay
     *
     * @return string 
     */
    public function getPay()
    {
        return $this->pay;
    }

    /**
     * Set payDate
     *
     * @param \DateTime $payDate
     * @return Expense
     */
    public function setPayDate($payDate)
    {
        $this->payDate = $payDate;
    
        return $this;
    }

    /**
     * Get payDate
     *
     * @return \DateTime 
     */
    public function getPayDate()
    {
        return $this->payDate;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Expense
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set pathImage
     *
     * @param string $pathImage
     * @return Expense
     */
    public function setPathImage($pathImage)
    {
        $this->pathImage = $pathImage;
    
        return $this;
    }

    /**
     * Get pathImage
     *
     * @return string 
     */
    public function getPathImage()
    {
        return $this->pathImage;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Expense
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
     * Set category
     *
     * @param \AppBundle\Entity\ExpenseCategory $category
     * @return Expense
     */
    public function setCategory(\AppBundle\Entity\ExpenseCategory $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\ExpenseCategory 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var string
     */
    private $status;


    /**
     * Set status
     *
     * @param string $status
     * @return Expense
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
