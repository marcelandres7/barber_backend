<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InspectionRepository extends EntityRepository {


    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.inspection_id
		FROM
		    inspection o
		WHERE
		    md5(o.inspection_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
    }


    
    public function getSummaryInspection($inspection) {
      $query = "select i.inspection_result_id as 'result',
                       ir.name as 'result_name',
                       ir.name_eng as 'result_name_eng',
                       count(1) as 'quantity',
                       sum(IF( i.inspection_result_id = 2 ,rp.amount,0)) as 'amount_penalty'
                from inspection_requeriment i, 
                     inspection_result ir,
                     requirement_penalty rp,
                     requirement r
                where  ir.inspection_result_id=i.inspection_result_id
                and r.requirement_penalty_id=rp.requirement_penalty_id
                and r.requirement_id=i.requeriment_id
                and i.inspection_id = $inspection
                group by i.inspection_result_id";
      $res = $this->getEntityManager()->getConnection()->prepare($query);
      $res->execute ();
      
      return $res->fetchAll();
    }
  


    public function getSummaryInspection_old($inspection) {
		$query = "SELECT count(1) cant_req,sum(IF( i.inspection_result_id = 1,1,0)) as 'approved',
                        sum(IF( i.inspection_result_id = 2,1,0)) as 'rejected',
                        sum(IF( i.inspection_result_id = 3,1,0)) as 'other',
                        sum(IF( i.comments != 'null',1,0)) as 'quantity_coments',
                        sum(IF( i.inspection_result_id = 2 ,rp.amount,0)) as 'amount_penalty',
                        sum(IF(IF(i.inspection_result_id = 2 ,r.requirement_penalty_id,0) = 1,1,0))  as 'light',
                        sum(IF(IF(i.inspection_result_id = 2 ,r.requirement_penalty_id,0) = 2,1,0)) as 'severe'
                FROM  inspection_requeriment i, 
                      inspection_result ir,
                      requirement_penalty rp,
                      requirement r
               WHERE  ir.inspection_result_id=i.inspection_result_id
                 AND  r.requirement_penalty_id=rp.requirement_penalty_id
                 AND  r.requirement_id=i.requeriment_id
                 AND  i.inspection_id = :inspection;";
		$res = $this->getEntityManager()->getConnection()->prepare($query);
		$res->bindValue( 'inspection', $inspection, \PDO::PARAM_STR );
		
		$res->execute ();
		
		return $res->fetchAll();
	}

	
    public function getTypesByGroupId($groupId, $inspection) {

		$query = "SELECT r.requirement_type_id as type_id,
                     r.requirement_id,
                     count(rt.requirement_type_id) as total_count, 
                     rt.name as type_name, 
                     rt.name_eng as type_name_eng,
                     rg.name as group_name,
                     rg.name_eng as group_name_eng,
                     rg.color,
                     IFNULL((select count(1) 
                        FROM requirement rr ,inspection_requeriment ir
                       WHERE rr.requirement_id  = ir.requeriment_id
                         AND rr.requirement_group_id=r.requirement_group_id
                         AND rr.requirement_type_id=r.requirement_type_id
                         AND ir.inspection_id = $inspection  
                         AND ir.inspection_result_id is not null
                    GROUP BY r.requirement_type_id ),0) as total_completed
               FROM requirement r, requirement_group rg, requirement_type rt
              WHERE rg.requirement_group_id = r.requirement_group_id
                AND rt.requirement_type_id = r.requirement_type_id
                AND r.requirement_group_id = $groupId
           GROUP BY rt.requirement_type_id ";

		$res = $this->getEntityManager()->getConnection()->prepare($query);		
		
		$res->execute ();
		
		return $res->fetchAll();
	}

  public function getStaticsInspection($groupId, $inspection) {

    $query = " SELECT total_requirements, total_done, total_done*100/total_requirements/100 as percent
               FROM (
                      SELECT 
                            count(r.requirement_id) as total_requirements,
                             (select count(1) 
                                FROM requirement rr ,inspection_requeriment ir
                                where rr.requirement_id  = ir.requeriment_id
                                  and rr.requirement_group_id=r.requirement_group_id
                                  and ir.inspection_id = $inspection
                                  AND ir.inspection_result_id is not null ) as total_done
                       FROM requirement r, requirement_group rg
                       WHERE rg.requirement_group_id = r.requirement_group_id
                       AND r.requirement_group_id = $groupId) as static ";

		$res = $this->getEntityManager()->getConnection()->prepare($query);		
		
		$res->execute ();
		
		return $res->fetchAll();
	}




}