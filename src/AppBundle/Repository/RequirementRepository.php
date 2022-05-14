<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RequirementRepository extends EntityRepository {

    public function findOneByMd5Id($md5Id) {
        $query = "
			SELECT
		    o.requirement_id
		FROM
		    requirement o
		WHERE
		    md5(o.requirement_id) = :md5Id
		;
		";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);

        $res->execute();

        return $res->fetch();
	}

	public function getListByRequirement($type,$typegroup,$inspection) {
		$query = "
		SELECT r.requirement_id as requirement,
			   r.name,
			   r.name_eng,
			   r.description,
			   r.description_eng,
			   r.law_reference,
			   r.law_reference_eng,
			   r.requirement_penalty_id,
			   (SELECT comments FROM inspection_requeriment WHERE requeriment_id = r.requirement_id AND inspection_id = $inspection) as comments,	   
			   (SELECT count(picture_path) FROM inspection_requirement_picture WHERE requirement_id = r.requirement_id AND inspection_id = $inspection) as picture_count	   			   
		FROM requirement r
		WHERE r.requirement_group_id = $typegroup
	    and r.requirement_type_id = $type
		and r.requirement_id not in (SELECT requeriment_id 
										FROM emda_prlm.inspection_requeriment
										where inspection_id = $inspection AND inspection_result_id is not null);";

	
		$res = $this->getEntityManager()->getConnection()->prepare($query);
		//$res->bindValue( 'type', $type, \PDO::PARAM_STR );
		//$res->bindValue( 'typegroup', $typegroup, \PDO::PARAM_STR );
		//$res->bindValue( 'inspection', $inspection, \PDO::PARAM_STR );
		
		$res->execute ();
		
		return $res->fetchAll();
	}

	public function getListByRequirementDone($type,$typegroup,$inspection) {
		$query = "
		SELECT r.requirement_id as requirement,
			   r.name,
			   r.name_eng,
			   r.description,
			   r.description_eng,
			   r.law_reference,
			   r.law_reference_eng,
			   r.requirement_penalty_id,
			   ir.inspection_result_id,
			   ir.comments,
			   (SELECT count(picture_path) FROM inspection_requirement_picture WHERE requirement_id = r.requirement_id AND inspection_id = $inspection) as picture_count	   			   			   
		  FROM requirement r, inspection_requeriment ir
		 WHERE r.requirement_type_id = $type
		   AND r.requirement_group_id=$typegroup
		   AND r.requirement_id  = ir.requeriment_id
		   AND ir.inspection_id = $inspection
		   AND ir.inspection_result_id is not null";
	
	
		$res = $this->getEntityManager()->getConnection()->prepare($query);
		
		$res->execute ();
		
		return $res->fetchAll();
	}
	

}
