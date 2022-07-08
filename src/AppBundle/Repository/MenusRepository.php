<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class MenusRepository extends EntityRepository
{
	
	public function deleteMenu($menu_id) {
		$query = "
        delete from menus where menu_id = $menu_id;
		";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

	public function getListProfServi($organization,$menu) {

  
		$query = "SELECT true as status_service ,u.first_name as professional, u.id as prof_id
					FROM menus_user ms, menus m, user u
					WHERE ms.user_id=u.id 
					AND ms.menus_id=m.menu_id
					AND ms.menus_id=$menu
					UNION
					SELECT false as status_service,u.first_name, u.id as prof_id
					FROM  user u
					WHERE u.id NOT IN (SELECT user_id FROM menus_user ms WHERE  ms.user_id=u.id AND ms.menus_id=$menu)
					AND u.user_role_id=2
					AND organization_id=$organization
					AND u.status <> 'ELIMINADO'
					AND u.gain_factor is not null
	           	";
     

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
	    	$res->execute ();

	    	return $res->fetchAll ();
	}

	
}