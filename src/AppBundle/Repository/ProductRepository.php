<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository {

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

	public function listProduct($category) {
        $query = "
				SELECT p.product_id,p.product_name,p.product_category as category_product,p.inventory_quantity,p.price,p.description,p.is_active,p.path_imagen
				FROM product p, product_category pc
				WHERE product_category='$category'
				AND is_active in (0,1)
				AND p.product_category=pc.product_category_id;
				";

		$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
    }

}
