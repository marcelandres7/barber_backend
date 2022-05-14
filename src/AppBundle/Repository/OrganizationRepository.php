<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class OrganizationRepository extends EntityRepository
{
	
	public function findOneByMd5Id($md5Id) {
		$query = "
			SELECT
		    o.organization_id
		FROM
		    organization o
		WHERE
		    md5(o.organization_id) = :md5Id
		;
		";
		$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->bindValue ( 'md5Id', $md5Id, \PDO::PARAM_STR );
		
		$res->execute ();
		
		return $res->fetch ();
	}

	
}
