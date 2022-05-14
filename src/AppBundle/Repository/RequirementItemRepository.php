<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RequirementItemRepository extends EntityRepository {

    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.requirement_item_id
		FROM
		    requirement_item o
		WHERE
		    md5(o.requirement_item_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
	}
	
}
