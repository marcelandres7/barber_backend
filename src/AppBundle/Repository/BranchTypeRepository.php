<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BranchTypeRepository extends EntityRepository {

    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.branch_type_id
		FROM
		    branch_type o
		WHERE
		    md5(o.branch_type_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
    }

}
