<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class TurnWasherRepository extends EntityRepository
{
	
	public function getListClientPend() {
		
			$query = "  SELECT tw.turn_washer_id,tw.summary_service_id service_id,c.name client_name, concat(u.first_name,' ',u.last_name) professional, tw.status,created_date,tw.washer_id,(select concat(first_name,' ',last_name) from user where id=washer_id) washer_name
						FROM turn_washer tw,summary_service ss, user u,client c
						WHERE tw.status='Pendiente'
						AND  ss.id_summary_service=tw.summary_service_id
						AND  c.client_id=ss.client_id
						AND u.id=ss.professional_id; ";
					$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
						$res->execute ();
						return $res->fetchAll ();
		}


		public function getListClientDone() {
		
			$query = "  SELECT tw.turn_washer_id,tw.summary_service_id service_id,c.name client_name, concat(u.first_name,' ',u.last_name) professional, tw.status,created_date,tw.washer_id,(select concat(first_name,' ',last_name) from user where id=washer_id) washer_name
						FROM turn_washer tw,summary_service ss, user u,client c
						WHERE tw.status='Finalizado'
						AND  ss.id_summary_service=tw.summary_service_id
						AND  c.client_id=ss.client_id
						AND u.id=ss.professional_id
						AND date_format(tw.created_date,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d'); 
						ORDER BY 1 ASC";

					$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
						$res->execute ();
						return $res->fetchAll ();
		}
	

		
		public function reportWasherToday() {
		
			$query = "  SELECT count(1) cant_washes, concat(u.first_name,' ',u.last_name) washer_name 
						FROM turn_washer tw,user u
						WHERE tw.status='Finalizado'
						AND u.id=tw.washer_id
						AND date_format(tw.created_date,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')
						GROUP BY tw.washer_id; ";

					$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
						$res->execute ();
						return $res->fetchAll ();
		}

		
		public function reportWasherRange($data_start,$data_end) {
		
			$query = "  SELECT count(1) cant_washes, concat(u.first_name,' ',u.last_name) washer_name 
						FROM turn_washer tw,user u
						WHERE tw.status='Finalizado'
						AND u.id=tw.washer_id
						AND date_format(tw.created_date,'%Y-%m-%d') >= date_format('$data_start','%Y-%m-%d')
  						AND date_format(tw.created_date,'%Y-%m-%d') <= date_format('$data_end','%Y-%m-%d')
						GROUP BY tw.washer_id; ";

					$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
						$res->execute ();
						return $res->fetchAll ();
		}

	public function findOneByMd5Id($md5Id) {
		$query = "
			SELECT
		    u.id
		FROM
		    user_role u
		WHERE
		    md5(u.id) = :md5Id
		;
		";
		$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->bindValue ( 'md5Id', $md5Id, \PDO::PARAM_STR );
		
		$res->execute ();
		
		return $res->fetch ();
	}

	
}
