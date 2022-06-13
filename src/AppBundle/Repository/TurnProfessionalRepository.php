<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TurnProfessionalRepository extends EntityRepository {

    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.service_id
		FROM
		    service o
		WHERE
		    md5(o.service_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
    }

	public function listTurnProfessional($organizacion) {
        $query = "
				SELECT turn_id,p.status,p.prof_id,concat(u.first_name,' ',u.last_name) as prof_name,p.turn_date
				  FROM turn_professional p,user u
				 WHERE u.id=p.prof_id
				   AND p.organization_id=$organizacion
			  ORDER BY p.status, p.turn_date;
				";

		$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
    }

}
