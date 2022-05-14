<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class PaymentRepository extends EntityRepository
{
	

	
	public function reportPay($prof_id) {
		$query = "
                select p.payment_id,p.amount_pay,p.amount_pending,p.created_at,p.description,p.confirmation_pay
                from  payment p  
                where p.payment_id in(
                                        select max(pp.payment_id) 
                                        from  payment pp  
                                        where pp.professional_id = $prof_id);
                ";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

    public function reportDetailDay($prof_id, $created_date) {
		$query = "
        SELECT c.name as client_name,ss.id_summary_service,ss.professional_id,ss.total_payment,TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end) AS minutes_used, ss.created_at,ss.services,ss.random
         FROM summary_service ss, client c
        WHERE ss.professional_id = $prof_id
          AND ss.client_id = c.client_id
          AND  status_id in (3,5)
          AND   date_format(ss.created_at,'%Y-%m-%d')='$created_date'
		";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

	
}
