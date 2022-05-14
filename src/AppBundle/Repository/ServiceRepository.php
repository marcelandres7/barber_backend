<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ServiceRepository extends EntityRepository {

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

}
