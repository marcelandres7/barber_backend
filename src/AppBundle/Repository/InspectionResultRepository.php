<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InspectionResultRepository extends EntityRepository {

    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.inspection_result_id
		FROM
		    inspection_result o
		WHERE
		    md5(o.inspection_result_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
    }
    
    
    
    public function getResultListByInspection($rid, $iid) {
        $query = "select 

					ir.inspection_requeriment_id,
					r.requirement_id,
					r.name,
					rg.name as group_name,
					r.description,
					r.law_reference,
					rt.name as type_name,
					irr.requirement_penalty_id,
					(select rp.amount from requirement_penalty rp where irr.requirement_penalty_id = rp.requirement_penalty_id) as penalty_amount,
					(select rp.name from requirement_penalty rp where irr.requirement_penalty_id = rp.requirement_penalty_id) as penalty_name
					
					
					from 
					
					inspection_requeriment ir, requirement r, requirement_group rg, requirement_type rt, inspection_result irr
					
					where ir.inspection_result_id = $rid
					and ir.inspection_id = $iid
					and ir.requeriment_id = r.requirement_id
					and r.requirement_group_id = rg.requirement_group_id 
					and rt.requirement_type_id = r.requirement_type_id
					and irr.inspection_result_id = ir.inspection_result_id;";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->execute();

        return $res->fetchAll();
    }

}
