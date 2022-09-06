<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class OrderDetailRepository extends EntityRepository
{
	public function getProductCart ($service_id) {
		
		
		$query = "
				SELECT p.product_id, p.product_name, p.price,od.quantity,od.payment_total, od.discount
				  FROM order_detail od,product p
				 WHERE summary_service_id= $service_id
				   AND p.product_id= od.product_id
		;
		";

	    $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

	
	
	
	

}
