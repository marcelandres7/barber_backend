<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RequirementPenaltyRepository extends EntityRepository {

    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.requirement_penalty_id
		FROM
		    requirement_penalty o
		WHERE
		    md5(o.requirement_penalty_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
    }

}
