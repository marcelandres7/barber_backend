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

	
}