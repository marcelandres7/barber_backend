<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class SummaryServiceRepository extends EntityRepository
{

  public function getListBooking( $pId, $sId, $dateSearch ) {
    $dateStart    = $dateSearch." 00:00:00";
    $dateEnd      = $dateSearch." 23:59:59";
		$query = "  SELECT 	  	ss.id_summary_service , ss.scheduled_to , ss.professional_id, ss.status_id , ss.services,
                (IFNULL((	  SELECT 		SUM(m.duration) 
                    FROM 		  menus m
                    WHERE 		FIND_IN_SET(m.menu_id,ss.services)),0) + IFNULL((select pr.duration from professional_reservation pr where pr.summary_service_id=ss.id_summary_service ),0))  AS total_duration
                FROM 	      summary_service ss 
                WHERE 	  	ss.professional_id = $pId
                AND         ss.status_id not in (4,5)
                AND 	      (scheduled_to BETWEEN '$dateStart' AND '$dateEnd') 
                UNION
	              SELECT 	  	ss.id_summary_service , created_at as 'scheduled_to' , ss.professional_id, ss.status_id , ss.services,
                            (	  SELECT 		SUM(m.duration) 
                                FROM 		  menus m
                                WHERE 		FIND_IN_SET(m.menu_id,ss.services) ) AS total_duration
                 FROM 	      summary_service ss 
                WHERE 	  	 ss.professional_id = $pId
                 AND         ss.status_id not in (4,5)
                 AND         ss.services <> 1
                AND 	      (created_at BETWEEN '$dateStart' AND '$dateEnd') ";
    $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();
		return $res->fetchAll ();
	}

  public function getProfMenus( $idMenus ) {
    $query = "  SELECT 	  mu.user_id as id_profs  
                FROM 	    menus_user mu 
                WHERE  	  FIND_IN_SET(mu.menus_id, '$idMenus')
                GROUP BY  mu.user_id ";
    $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();
		return $res->fetchAll ();
	}

  public function clientPending($organization_id) {
		$query = "
                SELECT ss.id_summary_service as service_id,ss.client_id,c.name as client_name,ss.professional_id,
                       concat(u.first_name,' ',u.last_name) as professional_name,ss.status_id,s.name as status_name,
                       ss.total_payment as total,ss.created_at,ss.scheduled_to,ss.services
                  FROM summary_service ss ,client c, user u,status s
                 WHERE ss.status_id in (1,2,3)
                   AND ss.organization_id=$organization_id
                   AND ss.client_id=c.client_id
                   AND u.id=ss.professional_id
                   AND s.status_id=ss.status_id
              ORDER BY status_name";

    $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}


	public function reportDay($prof_id) {
		$query = "
        SELECT Date_format(service_end,'%Y-%m-%d') created_date, count(1) attended_client,sum(1+(length(services)-length(replace(services,',','')))) as service_count, 
               sum(total_payment) generated_total, sum(IF(random='n',1,0)) selected_count,sum(IF(random='y',1,0)) random_count, 
               payout_barber,payout_date,GROUP_CONCAT(id_summary_service) services_id   
         FROM summary_service
        WHERE professional_id = $prof_id
          AND status_id in (3,5)
       GROUP BY date_format(service_end,'%Y-%m-%d')
       ORDER BY 1 desc limit 31 ;
		";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

    public function reportDetailDay($prof_id, $created_date) {
		$query = "
        SELECT c.name as client_name,ss.id_summary_service,ss.professional_id,ss.total_payment,TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end) AS minutes_used, ss.service_end as created_at,ss.services,ss.random
         FROM summary_service ss, client c
        WHERE ss.professional_id = $prof_id
          AND ss.client_id = c.client_id
          AND  status_id in (3,5)
          AND   date_format(ss.service_end,'%Y-%m-%d')='$created_date'
		";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}


    public function reportBalance($prof_id, $created_date) {
		$query = "
    SELECT count(1) cant_client,
           sum(ss.total_payment) total_payment, 
           sum(1+(length(services)-length(replace(services,',','')))) as cant_service,
           sum(tips) as amount_tips, sum(if(method_payment = 2,(ss.total_payment+ss.tips)*0.03,0)) as amount_pay_deb_cred,
           sum(if(method_payment = 2,1,0)) as pay_deb_cred, 
           min(ss.created_at) min_date,
           max(ss.created_at) max_date
      FROM summary_service ss
     WHERE ss.professional_id = $prof_id
       AND status_id in(3,5)  
		";

        if($created_date) {
			$query .= "AND ss.created_at > '$created_date'";
		}

		$query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

	
  public function reportSummaryGeneralToday( ) {
		$query = "
            SELECT  sum(ss.total_payment ) as total_payment, 
                    (SELECT IFNULL(sum(payment_total) ,0)FROM order_detail 
                      WHERE  date_format(created_at,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')
                        AND summary_service_id is null) as total_products,
                    count(1) as qty_client,
                    sum(1+(length(services)-length(replace(services,',','')))) as qty_service,
                    sum(if(ss.method_payment in (1,3),1,0)) as qty_cash, 
                    sum(if(ss.method_payment = 2,1,0)) as qty_point,
                    #(sum(if(ss.method_payment < 3,ss.total_payment*u.gain_factor+ifnull(ss.tips,0),0))+(sum(if(ss.method_payment > 2,(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))*((SELECT (1-percent) FROM method_payment where method_payment_id=ss.method_payment)*1))) as gain_barber_descuento,
                    sum((ss.total_payment*u.gain_factor)+ifnull(ss.tips,0)) as gain_barber,
                    sum(IF(ss.random='n',1,0)) as qty_barber_selected,
                    sum(IF(ss.random='y',1,0)) as qty_barber_random,
                    sum(ss.tips) as tips,round(sum(TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end))/count(1)) as avg_minutes_used,
                    min(ss.created_at) as first_client,
                    max(ss.created_at) as last_client,
                    (sum(if(ss.method_payment = 2,ss.total_payment+ss.tips,0))+sum(if(ss.method_payment = 2,(IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0)),0)))*max((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1) as amount_point_sale,
                    sum((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)) porcentaje,
                    sum(if(ss.method_payment in (1,3),ss.total_payment+IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0),0)) as amount_cash, 
                    sum(if(ss.method_payment = 2,ss.total_payment+IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0),0)) as amount_point,
                    sum(IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0)) as amount_product,
                    sum((SELECT count(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service )) as qty_product  
    FROM summary_service ss ,user u
             WHERE date_format(ss.service_end,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')
               AND  u.id=ss.professional_id
               AND ss.status_id in (5)

          ";
    //WHERE date_format(service_end,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')



    //     if($created_date) {
		// 	$query .= "AND ss.created_at > '$created_date'";
	  //  	}

		// $query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

  public function reportSummaryBarberToday( ) {
		$query = "
            SELECT  ss.professional_id,concat(u.first_name,' ',u.last_name) as professional_name, sum(ss.total_payment) as total_payment, count(1) as qty_client,sum(1+(length(services)-length(replace(services,',','')))) as qty_service,
                    sum(if(ss.method_payment in (1,3),1,0)) as qty_cash, sum(if(ss.method_payment = 2,1,0)) as qty_point,
                    sum(IF(ss.random='n',1,0)) as qty_barber_selected,sum(IF(ss.random='y',1,0)) as qty_barber_random,
                    sum(ss.tips) as tips,round(sum(TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end))/count(1)) as avg_minutes_used,
                    (sum(if(ss.method_payment in (1,3),ss.total_payment*u.gain_factor+ifnull(ss.tips,0),0))+(sum(if(ss.method_payment = 2,ss.total_payment*u.gain_factor+ifnull(ss.tips,0),0))*((SELECT (1-percent) FROM method_payment where method_payment_id=ss.method_payment)*1))) as gain_barber_descuento,
                    sum((ss.total_payment*u.gain_factor)+ifnull(ss.tips,0)) as gain_barber,
                    min(ss.created_at) as first_client,max(ss.created_at) as last_client,u.gain_factor,
                    (sum(if(ss.method_payment in (1,3),ss.total_payment*u.gain_factor+ifnull(ss.tips,0),0))+sum(if(ss.method_payment = 2, (IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0)),0))) * ((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1)  as amount_point_sale,
                    sum(if(ss.method_payment in (1,3),ss.total_payment+IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0),0)) as amount_cash, 
                    sum(if(ss.method_payment = 2,ss.total_payment+IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0),0)) as amount_point,
                    sum(IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0)) as amount_product,
                    sum((SELECT count(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service )) as qty_product
             FROM   summary_service ss  , user u
            WHERE   date_format(service_end,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')
             AND    u.id=ss.professional_id
             AND    ss.status_id in (5)
        GROUP BY    ss.professional_id
		";

    //     if($created_date) {
		// 	$query .= "AND ss.created_at > '$created_date'";
	  //  	}

		// $query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

  public function reportSummaryGeneralRange($data_start,$data_end ) {

    if( !$data_start )
		{
			$data_start = $data_end;
		}
		if( !$data_end )
		{
			$data_end = $data_start;
		}

    if( !$data_end && !$data_start)
		{
			$data_start = '2000-01-01';
			$data_end = '2121-01-01';
		}

		$query = "
    SELECT      sum(ss.total_payment) as total_payment, 
                (SELECT sum(payment_total) FROM order_detail 
                  WHERE  date_format(created_at,'%Y-%m-%d') >= date_format('$data_start','%Y-%m-%d')
                    AND  date_format(created_at,'%Y-%m-%d') <= date_format('$data_end','%Y-%m-%d')
                    AND summary_service_id is null ) as total_products,
                count(1) as qty_client,
                sum(1+(length(services)-length(replace(services,',','')))) as qty_service,
                sum(if(ss.method_payment in (1,3),1,0)) as qty_cash, 
                sum(if(ss.method_payment = 2,1,0)) as qty_point,
                (sum(if(ss.method_payment in (1,3),ss.total_payment*u.gain_factor+ifnull(ss.tips,0),0))+(sum(if(ss.method_payment = 2,(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))*((SELECT (1-percent) FROM method_payment where method_payment_id=ss.method_payment)*1))) as gain_barber_descuento,
                sum((ss.total_payment*u.gain_factor)+ifnull(ss.tips,0)) as gain_barber,
                sum(IF(ss.random='n',1,0)) as qty_barber_selected,
                sum(IF(ss.random='y',1,0)) as qty_barber_random,
                sum(ss.tips) as tips,round(sum(TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end))/count(1)) as avg_minutes_used,
                min(ss.created_at) as first_client,
                max(ss.created_at) as last_client,
                (sum(if(ss.method_payment = 2,ss.total_payment+ss.tips,0))+sum(if(ss.method_payment = 2,(IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0)),0)))*max((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1) as amount_point_sale,
                sum((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)) porcentaje,
                sum(if(ss.method_payment in (1,3),ss.total_payment+IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0),0)) as amount_cash, 
                sum(if(ss.method_payment = 2,ss.total_payment+IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0),0)) as amount_point,
                sum(IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0)) as amount_product,
                sum((SELECT count(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service )) as qty_product  
          FROM summary_service ss ,user u
            WHERE date_format(ss.service_end,'%Y-%m-%d') >= date_format('$data_start','%Y-%m-%d')
              AND date_format(ss.service_end,'%Y-%m-%d') <= date_format('$data_end','%Y-%m-%d')
              AND  u.id=ss.professional_id
              AND ss.status_id in (5)
		        ";
    //WHERE date_format(service_end,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')



    //     if($created_date) {
		// 	$query .= "AND ss.created_at > '$created_date'";
	  //  	}

		// $query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}
  
  public function reportSummaryBarberRange($data_start,$data_end ) {

    if( !$data_start )
		{
			$data_start = $data_end;
		}
		if( !$data_end )
		{
			$data_end = $data_start;
		}

    if( !$data_end && !$data_start)
		{
			$data_start = '2000-01-01';
			$data_end = '2121-01-01';
		}

		$query = "
    SELECT  ss.professional_id,
            concat(u.first_name,' ',u.last_name) as professional_name,
            sum(ss.total_payment) as total_payment, 
            count(1) as qty_client,
            sum(1+(length(services)-length(replace(services,',','')))) as qty_service,
             u.gain_factor,
            (sum(if(ss.method_payment in (1,3),ss.total_payment*u.gain_factor+ifnull(ss.tips,0),0))+(sum(if(ss.method_payment = 2,(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))*((SELECT (1-percent) FROM method_payment where method_payment_id=ss.method_payment)*1))) as gain_barber_descuento,
            sum((ss.total_payment*u.gain_factor)+ifnull(ss.tips,0)) as gain_barber,
            sum(if(ss.method_payment in (1,3),1,0)) as qty_cash, sum(if(ss.method_payment = 2,1,0)) as qty_point,
            sum(IF(ss.random='n',1,0)) as qty_barber_selected,sum(IF(ss.random='y',1,0)) as qty_barber_random,
            sum(ss.tips) as tips,sum(TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end))/60 aS avg_hour_used,
            min(ss.created_at) as first_client,max(ss.created_at) as last_client,
            (sum(if(ss.method_payment = 2,ss.total_payment*u.gain_factor+ifnull(ss.tips,0),0))) * ((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1) as amount_point_sale,
            sum(if(ss.method_payment in (1,3),ss.total_payment+IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0),0)) as amount_cash, 
            sum(if(ss.method_payment = 2,ss.total_payment+IFNULL((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0),0)) as amount_point,
            sum((SELECT sum(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service )) as amount_product,
            sum((SELECT count(od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service )) as qty_product
      FROM  summary_service ss  ,user u
     WHERE  u.id=ss.professional_id
       AND  date_format(ss.service_end,'%Y-%m-%d') >= date_format('$data_start','%Y-%m-%d')
       AND  date_format(ss.service_end,'%Y-%m-%d') <= date_format('$data_end','%Y-%m-%d')
       AND ss.status_id in (5)
  GROUP BY  ss.professional_id
		";

    //     if($created_date) {
		// 	$query .= "AND ss.created_at > '$created_date'";
	  //  	}

		// $query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}


  public function reportSummaryBarberDetail() {


		$query = "
              SELECT  c.name as client_name,
                      ss.professional_id,
                      concat(u.first_name,' ',u.last_name) as professional_name,
                      ss.id_summary_service,
                      ss.total_payment,
                      ifnull(ss.tips,0)as tips,
                      mp.name method_pay_name,
                      u.gain_factor,
                      (if(ss.method_payment in (1,3),(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))+(if(ss.method_payment = 2,(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0)) as gain_real_descuento,
                      (ss.total_payment*u.gain_factor)+ifnull(ss.tips,0) as gain_real,
                      (if(ss.method_payment = 2,(ss.total_payment)+ifnull(ss.tips,0),0))*(((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1)) as amount_point_sale,
                      ((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1) as percent_PV,
                      TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end) AS minutes_used,
                      ss.created_at,
                      ss.services,
                      ss.random
                FROM summary_service ss, client c, user u, method_payment mp
               WHERE  ss.client_id = c.client_id
                 AND  ss.professional_id=u.id
                 AND  status_id in (3,5)
                 AND  mp.method_payment_id=ss.method_payment
                 AND  date_format(ss.service_end,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')
            ORDER BY ss.service_end;
		";

    //     if($created_date) {
		// 	$query .= "AND ss.created_at > '$created_date'";
	  //  	}

		// $query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}


  public function reportSummaryRangeDetail($data_start,$data_end) {

    if( !$data_start )
		{
			$data_start = $data_end;
		}
		if( !$data_end )
		{
			$data_end = $data_start;
		}

    if( !$data_end && !$data_start)
		{
			$data_start = '2000-01-01';
			$data_end = '2121-01-01';
		}

		$query = "
              SELECT  c.name as client_name,
                      ss.professional_id,
                      concat(u.first_name,' ',u.last_name) as professional_name,
                      ss.id_summary_service,
                      ss.total_payment,
                      ifnull(ss.tips,0)as tips,
                      mp.name method_pay_name,
                      u.gain_factor ,
                      (if(ss.method_payment in (1,3),(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))+(if(ss.method_payment = 2,(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))*(1-((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1)) as gain_real_descuento,
                      ((ss.total_payment*u.gain_factor)+ifnull(ss.tips,0)) as gain_real,
                      ((if(ss.method_payment = 2,ss.total_payment+ss.tips,0))+(if(ss.method_payment = 2,(IFNULL((SELECT (od.payment_total) FROM order_detail od where od.summary_service_id=ss.id_summary_service ),0)),0)))*((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1) as amount_point_sale,
                      ((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1) as percent_PV,
                      TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end) AS minutes_used,
                      ss.created_at,
                      ss.services,
                      ss.random
                FROM summary_service ss, client c, user u, method_payment mp
               WHERE  ss.client_id = c.client_id
                 AND  ss.professional_id=u.id
                 AND  status_id in (3,5)
                 AND  mp.method_payment_id=ss.method_payment
                 AND date_format(ss.service_end,'%Y-%m-%d') >= date_format('$data_start','%Y-%m-%d')
                 AND date_format(ss.service_end,'%Y-%m-%d') <= date_format('$data_end','%Y-%m-%d')
                 AND ss.status_id in (3,5)
            ORDER BY ss.service_end;
		";

    //     if($created_date) {
		// 	$query .= "AND ss.created_at > '$created_date'";
	  //  	}

		// $query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}


  public function reportListPaymentService($prof_id,$data_end) {

  
		$query = "
              SELECT  c.name as client_name,
                      ss.professional_id,
                      concat(u.first_name,' ',u.last_name) as professional_name,
                      ss.id_summary_service,
                      ss.total_payment,
                      ifnull(ss.tips,0)as tips,
                      mp.name method_pay_name,
                      u.gain_factor ,
                      (if(ss.method_payment in (1,3),(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))+(if(ss.method_payment = 2,(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))*(1-((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1)) as gain_real_descuento,
                      ((ss.total_payment*u.gain_factor)+ifnull(ss.tips,0)) as gain_real,
                      (if(ss.method_payment = 2,(ss.total_payment*u.gain_factor)+ifnull(ss.tips,0),0))*(((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1)) as amount_point_sale,
                      ((SELECT percent FROM method_payment where method_payment_id=ss.method_payment)*1) as percent_PV,
                      TIMESTAMPDIFF(MINUTE, ss.service_start, ss.service_end) AS minutes_used,
                      ss.created_at,
                      ss.services,
                      ss.random
                FROM  summary_service ss, client c, user u, method_payment mp
               WHERE  ss.client_id = c.client_id
                 AND  ss.professional_id=u.id
                 AND ss.professional_id = $prof_id
                 AND  status_id in (3,5)
                 AND  mp.method_payment_id=ss.method_payment
                 AND ss.status_id in (3,5)
	           	";

         if($data_end) {
		      	$query .= "AND ss.created_at > '$data_end'";
	    	 }

		     $query .= "ORDER BY ss.service_end DESC;";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
	    	$res->execute ();

	    	return $res->fetchAll ();
	}

  public function getListPaymentServices($organization,$status) {

  
		$query = "SELECT ss.id_summary_service as service_id, ss.status_id, ss.client_id, c.name as client_name , c.avatar, 
                      c.phone, c.email,ss.services as products, ss.created_at as service_date, u.id as professional_id, 
                      concat(u.first_name,' ',u.last_name) as professional_name, ss.total_payment as total,
                      ss.service_start , ss.service_end , ss.tips, ss.method_payment,mp.name as method_pay_name, mp.percent,
                      ss.total_payment*mp.percent as discount_pointsale, ss.tips, ss.scheduled_to, ss.organization_id
                  FROM summary_service ss  
            INNER JOIN user u ON ss.professional_id = u.id
            INNER JOIN client c ON ss.client_id = c.client_id
             LEFT JOIN method_payment mp ON ss.method_payment = mp.method_payment_id
                 WHERE ss.organization_id = $organization
                   AND status_id in ($status)
	           	";
      
      if($status == 6) {
        $query .= " AND scheduled_to is not null
                    AND DATE_FORMAT(scheduled_to, '%Y-%m-%d')>=DATE_FORMAT(now(), '%Y-%m-%d')
                    ORDER BY scheduled_to ASC";
        } // else{
      //   $query .= " AND scheduled_to is null";
      // }

      if($status == 5) {
        $query .= " AND DATE_FORMAT(ss.service_end, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d')
                  ORDER BY 1 desc";
        }

    
         

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
	    	$res->execute ();

	    	return $res->fetchAll ();
	}


  public function getListReserveConfirm($organization,$status,$option) {

  
		$query = "SELECT ss.id_summary_service as service_id, ss.status_id, ss.client_id, c.name as client_name , c.avatar, 
                      c.phone, c.email,ss.services as products, ss.created_at as service_date, u.id as professional_id, 
                      concat(u.first_name,' ',u.last_name) as professional_name, ss.total_payment as total,
                      ss.service_start , ss.service_end , ss.tips, ss.method_payment,mp.name as method_pay_name, mp.percent,
                      ss.total_payment*mp.percent as discount_pointsale, ss.tips, ss.scheduled_to, ss.organization_id
                  FROM summary_service ss  
                  INNER JOIN user u ON ss.professional_id = u.id
                  INNER JOIN client c ON ss.client_id = c.client_id
                  LEFT JOIN method_payment mp ON ss.method_payment = mp.method_payment_id
                  WHERE ss.organization_id = $organization
                  AND status_id in ($status)
                  AND scheduled_to is not null 
	           	";
      if($option == "today") {
       $query .= " AND DATE_FORMAT(scheduled_to, '%Y-%m-%d')=DATE_FORMAT(now(), '%Y-%m-%d')";
       }

       if($option == "all") {
        $query .= "AND DATE_FORMAT(scheduled_to, '%Y-%m-%d') > DATE_FORMAT(now(), '%Y-%m-%d')";
        }

       $query .= " ORDER BY scheduled_to ASC";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
	    	$res->execute ();

	    	return $res->fetchAll ();
	}

  public function getReserveAgenda($organization,$status,$professional) {

  
		$query = "SELECT count(1) as quantity,status_id,DATE_FORMAT(scheduled_to, '%Y-%m-%d') as scheduled 
                FROM summary_service
               WHERE status_id in ($status)
               AND  organization_id = $organization
               AND DATE_FORMAT(scheduled_to, '%Y-%m-%d') >= DATE_FORMAT(now(), '%Y-%m-%d')
	           	";
      if($professional) {
       $query .= " AND professional_id=$professional";
       }

       $query .= " GROUP BY  status_id,DATE_FORMAT(scheduled_to, '%Y-%m-%d') 
                   ORDER BY scheduled_to ASC";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
	    	$res->execute ();

	    	return $res->fetchAll ();
	}

  public function getReserveAgendaDetail($organization,$status,$professional,$schedule_date) {

  
		$query = "SELECT ss.id_summary_service as service_id, ss.status_id, ss.client_id, c.name as client_name , c.avatar, 
                      c.phone, c.email,ss.services as products, ss.created_at as service_date, u.id as professional_id, 
                      concat(u.first_name,' ',u.last_name) as professional_name, ss.total_payment as total,
                      ss.service_start , ss.service_end , ss.tips, ss.method_payment,mp.name as method_pay_name, mp.percent,
                      ss.total_payment*mp.percent as discount_pointsale, ss.tips, ss.scheduled_to, ss.organization_id
                  FROM summary_service ss  
                  INNER JOIN user u ON ss.professional_id = u.id
                  INNER JOIN client c ON ss.client_id = c.client_id
                  LEFT JOIN method_payment mp ON ss.method_payment = mp.method_payment_id
                  WHERE ss.organization_id = $organization
                  AND status_id in ($status)
                  AND scheduled_to is not null 
                  AND DATE_FORMAT(scheduled_to, '%Y-%m-%d')=DATE_FORMAT('$schedule_date', '%Y-%m-%d')
	           	";
      if($professional) {
       $query .= " AND professional_id=$professional";
       }

       $query .= " ORDER BY scheduled_to ASC";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
	    	$res->execute ();

	    	return $res->fetchAll ();
	}



  public function reportSaleProductsToday() {

  
		$query = "SELECT p.product_name, sum(quantity) quantity, sum(payment_total) payment_total
                FROM order_detail ode, product p
               WHERE ode.product_id = p.product_id
                 AND date_format(ode.created_at,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')
                GROUP BY p.product_id
	           	";
    //  if($status == 5) {
    //   $query .= "and DATE_FORMAT(ss.service_end, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d')
    //              ORDER BY 1 desc";
    //   }
         
        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
	    	$res->execute ();

	    	return $res->fetchAll ();
	}

  public function reportSaleProductsRange($data_start,$data_end ) {

    if( !$data_start )
		{
			$data_start = $data_end;
		}
		if( !$data_end )
		{
			$data_end = $data_start;
		}

    if( !$data_end && !$data_start)
		{
			$data_start = '2000-01-01';
			$data_end = '2121-01-01';
		}

		$query = "
            SELECT p.product_name, sum(quantity) quantity, sum(payment_total) payment_total
              FROM order_detail ode, product p
             WHERE ode.product_id = p.product_id
               AND  date_format(ode.created_at,'%Y-%m-%d') >= date_format('$data_start','%Y-%m-%d')
               AND  date_format(ode.created_at,'%Y-%m-%d') <= date_format('$data_end','%Y-%m-%d')
              group by p.product_id
		";

    //     if($created_date) {
		// 	$query .= "AND ss.created_at > '$created_date'";
	  //  	}

		// $query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

  public function reportSummaryBarberTodayCancel() {


		$query = "
            SELECT todos-eliminados as cancelados, eliminados 
             FROM (   SELECT count(1) as 'todos', sum(if(LENGTH(ss.service_start) > 0,if(LENGTH(ss.service_end) > 0,1,0),0)) as 'eliminados'
                        FROM summary_service ss 
                       WHERE ss.status_id in (4)
                         AND date_format(ss.created_at,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')) as result
	          	";

    //     if($created_date) {
		// 	$query .= "AND ss.created_at > '$created_date'";
	  //  	}

		// $query .= ";";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

  public function reportSummaryGeneralRangeCancel($data_start,$data_end ) {

    if( !$data_start )
		{
			$data_start = $data_end;
		}
		if( !$data_end )
		{
			$data_end = $data_start;
		}

    if( !$data_end && !$data_start)
		{
			$data_start = '2000-01-01';
			$data_end = '2121-01-01';
		}

		$query = "
               SELECT todos-eliminados as cancelados, eliminados 
                 FROM (   SELECT count(1) as 'todos', sum(if(LENGTH(ss.service_start) > 0,if(LENGTH(ss.service_end) > 0,1,0),0)) as 'eliminados'
                            FROM summary_service ss 
                           WHERE ss.status_id in (4)
                             AND date_format(ss.service_end,'%Y-%m-%d') >= date_format('$data_start','%Y-%m-%d')
                             AND date_format(ss.service_end,'%Y-%m-%d') <= date_format('$data_end','%Y-%m-%d')) as result
		        ";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}


  public function listReserveNotAvailable($professional) {

		$query = "
              SELECT p.professional_id,concat(u.first_name,' ',u.last_name) as professional_name ,min(p.summary_service_id) as summary_service_id,min(p.scheduled_from)as scheduled_from,max(p.scheduled_to) as scheduled_to,sum(p.hours_quantity) duration,min(p.created_at) as created_at
                FROM professional_reservation p, user u
               WHERE   date_format(p.scheduled_to,'%Y-%m-%d') >= date_format(now(),'%Y-%m-%d')
                 AND p.professional_id=u.id
		        ";
        
          if($professional) {
		      	$query .= "AND p.professional_id ='$professional'";
	        	}

            $query .= "GROUP BY p.professional_id,p.created_at
                       ORDER BY p.professional_reservation_id";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

  public function reservePending($professional) {

		$query = "
            SELECT  sum(IF(status_id=6,1,0)) as pending, sum(IF(status_id=7,1,0)) as confirm
            FROM summary_service
            WHERE status_id in (6,7)
            AND professional_id=$professional
            AND DATE_FORMAT(scheduled_to, '%Y-%m-%d')>=DATE_FORMAT(now(), '%Y-%m-%d')
		        ";
        

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->execute ();

		return $res->fetchAll ();
	}

  public function reportGeneral($date_start, $date_end,$organization) {
		$query = "
          SELECT sum(ss.total_payment) total, 
                sum(ss.total_payment*(IF(u.gain_factor=1,0,(1 - u.gain_factor - 0.1)))) ganancias_salon, 
                 sum(ss.total_payment*(u.gain_factor)) ganancia_barbero, 
                 sum(ss.total_payment*0.1) impuesto,
                 sum(ss.tips) propina,
                 sum(ss.tips*0.8) propina_barberos,
                 sum(ss.tips*0.1) propina_cafe,
                 sum(ss.tips*0.1) propina_cajera
            FROM summary_service ss, user u
           WHERE ss.professional_id = u.id
             AND  ss.status_id = 5
             AND  date_format(ss.created_at,'%Y-%m-%d') >= date_format('$date_start','%Y-%m-%d')
             AND  date_format(ss.created_at,'%Y-%m-%d') <= date_format('$date_end','%Y-%m-%d')
             AND  ss.organization_id=$organization;
		";



        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		    $res->execute ();

		return $res->fetchAll ();
	}


}
