<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RequirementGroupRepository extends EntityRepository {

    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.requirement_group_id
		FROM
		    requirement_group o
		WHERE
		    md5(o.requirement_group_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
    }

}
