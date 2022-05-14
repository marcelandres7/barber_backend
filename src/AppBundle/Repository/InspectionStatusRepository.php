<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InspectionStatusRepository extends EntityRepository {

    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.inspection_status_id
		FROM
		    inspection_status o
		WHERE
		    md5(o.inspection_status_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
    }

}
