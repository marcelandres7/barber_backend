<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class ExpenseRepository extends EntityRepository
{
	
    public function reportExpense($start_date, $end_date) {
		$query = "
              SELECT e.expense_id, e.category_id,ec.category_name,e.pay,e.pay_date,e.comment,e.path_image,e.status
                FROM expense e, expense_category ec
               WHERE e.category_id = ec.expense_category_id
                 AND date_format(e.pay_date,'%Y-%m-%d') >= date_format('$start_date','%Y-%m-%d')
                 AND date_format(e.pay_date,'%Y-%m-%d') <= date_format('$end_date','%Y-%m-%d')
            ORDER BY e.pay_date  
		";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

	
}
