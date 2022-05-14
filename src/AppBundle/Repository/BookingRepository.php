<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BookingRepository extends EntityRepository {
    
	
    
    
    
    public function findOneByMd5Id($md5Id) {
        $query = "  SELECT u.booking_id
                    FROM booking u
                    WHERE md5(u.booking_id) = :md5Id;
                 ";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);
        
        $res->execute();
        
        return $res->fetch();
    }
    
    public function findOneByBookingGuestMd5Id($md5Id) {
        $query = "  SELECT u.booking_guest_id
                    FROM booking_guest u
                    WHERE md5(u.booking_guest_id) = :md5Id;
                 ";
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        $res->bindValue('md5Id', $md5Id, \PDO::PARAM_STR);
        
        $res->execute();
        
        return $res->fetch();
    }
    
    
    
    public function checkQueueBooking($baid, $uid, $date) {

        $query = "SELECT count(booking_id) as count
						FROM `booking` 
							WHERE booking_area_id = $baid
							AND date(scheduled_at) = date('$date')
							AND created_by = $uid
							AND booking_status_id = 1
								GROUP BY date(scheduled_at) = date('$date') ;";
								
        $res = $this->getEntityManager()->getConnection()->prepare($query);        
        $res->execute();
        
        return $res->fetch();
    } 
    
    
    
    
    
    public function findBookingCalendar($start_at , $end_at, $residential ,$bookingAreaId,$bookingStatusId ) {
        $query = "  select b.booking_id as bookingId,'ba.name' as bookingArea, b.scheduled_at, 'bs.status' as status, 'bs.booking_status_id' as booking_status_id,
                        concat(u.first_name , ' ' , u.last_name ) user,
                        b.booking_consume_minutes,
                        (select group_concat(name) from booking_guest where booking_id = b.booking_id ) guestList
                        from booking b 
                        #inner join booking_area ba on ba.booking_area_id = b.booking_area_id
                        #inner join residential r on r.residential_id = ba.residential_id
                        #inner join booking_status bs on bs.booking_status_id = b.booking_status_id
                        inner join user as u  on u.id = b.created_by
                        where date(scheduled_at) <= '$end_at'  and  date(scheduled_at) >= '$start_at'
                        
                        ";
        
        if( count($residential) > 0 ){
            $query .= " and  r.residential_id = ".$residential['residential_id']." ";
        }
        if($bookingAreaId > 0 ){
            
            $query .= " and  ba.booking_area_id = $bookingAreaId ";
        }
        if($bookingStatusId > 0 ){
            $query .= " and  b.booking_status_id = $bookingStatusId ";
            
        }
        $query .= " order by  b.scheduled_at";
        
        $res = $this->getEntityManager()->getConnection()->prepare($query);
        
        $res->execute();
        
        return $res->fetchAll();
    }
    
    
    public function findOneByQR($guestId, $residentialId, $name) {
       
        $query = "  SELECT u.booking_guest_id, ba.residential_id, b.booking_id, u.checkin_at, u.checkout_at
        	            FROM booking_guest u, booking b, booking_area ba
	        	            WHERE md5(u.booking_guest_id) = '$guestId'
		        	            AND u.booking_id = b.booking_id
		        	            AND ba.booking_area_id = b.booking_area_id
		        	            AND md5(ba.residential_id) = '$residentialId'
		        	            AND md5(u.name) = '$name' 
		        	            LIMIT 1;
                 ";                   
                 
        $res = $this->getEntityManager()->getConnection()->prepare($query);        
        $res->execute();        
        return $res->fetch();
    }    
    
	
    public function scheduleBookingArea($booking_area_id, $date_to_search) {
        $available_hours = array();
	    $weekday = date("N", strtotime($date_to_search));
	    
	    /*$user     = $em->getRepository('AppBundle:User')->findOneBy(array("status" => 'ACTIVO', 'id' => $professional_id));
	     $category = $em->getRepository('AppBundle:Category')->findOneBy(array("isActive" => 1, "categoryId" => $category_id));
	     $user_schedule = $em->getRepository('AppBundle:UserSchedule')->findBy(array("user" => $user, 'weekday' => $weekday),array('startAt' => 'ASC'));
	     */
	    
	    
	    $query = "select booking_area_id, min_time_advance, booking_consume_minutes
                    from booking_area where booking_area_id = :bookingArea limit 1";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
        $res->bindValue ( 'bookingArea', $booking_area_id, \PDO::PARAM_INT );
	    $res->execute ();
	    $booking_area =  $res->fetch ();
        
	    $time = explode(":" ,$booking_area["min_time_advance"]);
	    if(count($time) == 2){
	        $minutes = 0;
	        $minutes = $time[0]*60;
	        $minutes = $minutes + $time[1];
	        

	        
	        $date = new \DateTime(date("Y-m-d H:i:s"));
	        $date->modify('+'.$minutes.' minutes');
	        
	        if($date->format("i") > 0){
	            $diff = 60 - $date->format("i");
	            $date->modify('+'.$diff.' minutes');
	        }
	        
	        $date_to_search_obj = new \DateTime($date_to_search);
	        
	        
	        /*echo "FECHA ACTUAL MAS TIEMPO REQUERIDO " . $date->format("Y-m-d H:i:s");
	        echo "<br>";
	        echo "FECHA RESERVA " . $date_to_search_obj->format("Y-m-d");
	        echo "<br>";*/
	        
	        if(  $date_to_search_obj->format("Y-m-d") >= $date->format("Y-m-d") ){
    	        
        	    $query = "
        			SELECT
        				*
        			FROM
        			    booking_area_schedule
        			WHERE  booking_area_id = :bookingArea
        			AND weekday = :weekday
                    AND is_active = 1 ";
        	    if(  $date_to_search_obj->format("Y-m-d") == $date->format("Y-m-d") ){
        	        $query .= " AND end_at > '".$date->format("H:i:s")."' ";
        	    }
                $query .= " ORDER BY start_at;";
                
        	    $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
        	    $res->bindValue ( 'bookingArea', $booking_area_id, \PDO::PARAM_INT );
        	    $res->bindValue ( 'weekday', $weekday, \PDO::PARAM_INT );
        	    $res->execute ();
        	    $booking_area_schedule =  $res->fetchAll ();
        	            	 	    
        	    $time_matrix = array();
        	    $i = 0;	    
        	    
        	    if(strlen($booking_area["booking_consume_minutes"]) == 0)
        	    {
        	        
        	        //Si esta este error, pues que no haga nada
        	        
        	    } else {
        	        
        	        
        	        
        	        
        	        
        	        foreach($booking_area_schedule as $scheduled)
        		    {
        		        $minutesToAdd = $this->getMinutesFromTimeFormat($booking_area["booking_consume_minutes"]);
        		        
        		        $valid_time = true;
        		        if( $date_to_search_obj->format("Y-m-d") == $date->format("Y-m-d") ){
        		            if(date("H:i:s", strtotime($scheduled["start_at"])) > $date->format("H:i:s")){
        		                $start_time = date("H:i:s", strtotime($scheduled["start_at"]));
        		            }else{
        		                $start_time = $date->format("H:i:s");
        		            }
        		            
        		        }else{
        		            $start_time = date("H:i:s", strtotime($scheduled["start_at"]));
        		        }
        		        $end_time = date("H:i:s", strtotime($scheduled["end_at"]));
        		        
        		        
        		        
        		        /*echo " hora inicio reservas ". $start_time;
        		        echo "<br>";
        		        echo " hora fin reservas ". $end_time;
        		        echo "<br>";*/
        		        
        		        
        		        
        		        
        		        $start_at = $date_to_search." ".$start_time;
        		        $end_at = $date_to_search." ".$end_time;
        		        
        		        $query = "select *  from booking
        			            where booking_area_id = $booking_area_id and date(scheduled_at) = '$date_to_search'
        			            and (scheduled_at BETWEEN '$start_at' AND '$end_at')
        			            and booking_status_id = 1	
                                order by scheduled_at ASC";
              	
        		        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
        		        $res->execute ();
        		        $bookings =  $res->fetchAll ();
        		        
        		        foreach($bookings as $booking)
        		        {
        			        
        		            $minutesBooking = $booking["booking_consume_minutes"];
        		            
        		            if($start_at == $booking["scheduled_at"])
        		            {
        		                $start_at = $this->addMinutes($start_at, $minutesBooking);
        		            } else {
        		                
        		                $compare_start_at = $start_at;
        		                $compare_end_at = $booking["scheduled_at"];
        		                $flag = false;
        		                while($flag == false)
        		                {
        		                    $tmp_start_at = $start_at;
        		                    $tmp_end_at = $this->addMinutes($start_at, $minutesToAdd);
        		                    
        		                    if($booking["scheduled_at"] >= $tmp_end_at)
        		                    {
        		                        $time_matrix[$i]["start_date"] = $tmp_start_at;
        		                        $time_matrix[$i]["end_date"] = $tmp_end_at;
        		                        $start_at = $tmp_end_at;
        		                        $i++;
        		                    } else {
        		                        $flag = true;
        		                    }
        		                }
        		                //Reseteamos la hora de inicio que el usuario esta habilitado.
        		                $start_at = $this->addMinutes($booking["scheduled_at"], $minutesBooking);
        		                
        		            }
        		        }
        		        
        		        $bookingConsumed = (strlen($booking_area["booking_consume_minutes"])>0 ? $booking_area["booking_consume_minutes"] : 0);
        		        
        		        if($end_at > $start_at)
        		        {
        		            $flag = false;
        		            while($flag == false)
        		            {
        		                $tmp_start_at = $start_at;
        		                
        		                $tmp_end_at = $this->addMinutes($start_at, $minutesToAdd);
        		               
        		                if($end_at >= $tmp_end_at)
        		                {
        		                    $time_matrix[$i]["start_date"] = $tmp_start_at;
        		                    $time_matrix[$i]["end_date"] = $tmp_end_at;
        		                    $start_at = $tmp_end_at;
        		                    $i++;
        		                }else{
        		                    $flag = true;
        		                }
        		                
        		            }
        		        }
        		        
        		    }
        		    
        	    }
    	    
        	    $available_hours = array();
        	    foreach($time_matrix as $info)
        	    {
        	        $available_hours[]= array(
        	        	'value' => date("H:i:s", strtotime($info["start_date"])),
        	        	'label' => "De ".date("H:i", strtotime($info["start_date"]))." a ".date("H:i", strtotime($info["end_date"]))
        	        );
        	    }
	        }
	    }
	    return $available_hours;
	}
	
	
	function addMinutes($date_start, $minutes){
	    
	    $newDate = date('Y-m-d H:i:s',strtotime("+$minutes minutes",strtotime($date_start)));
	    return $newDate;
	    
	}
		
	function getMinutesFromTimeFormat($time){
	    $minutes = 0;
	    $time = explode(":" ,$time);
	    if(count($time) == 2){
	        $minutes = $time[0]*60;
	        $minutes = $minutes + $time[1];
	    }
	    return $minutes;
	}

	function getBookingsReservado($date,$status){
		$em = $this->getEntityManager();
        $repo = $em->getRepository('AppBundle:Booking');
		$query = $repo->createQueryBuilder('b');
		$query->where("b.bookingStatus = :status")->setParameter("status", $status);
		$query->andWhere('b.scheduledAt <= :date')->setParameter("date", $date);

		return $query->getQuery()->execute();
	}
	
	function countGuestBooking($bookingId){
		$query = "SELECT COUNT(1) countGuest FROM booking_guest WHERE booking_id = :bookingId";

        $res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
        $res->bindValue ( 'bookingId', $bookingId, \PDO::PARAM_INT );
	    $res->execute();        
        return $res->fetch();
	}

	function validateUserPerUser($area, $user, $date){
		$query = 'SELECT 
		IF (ba.maximum_bookings_per_user is not null,ba.maximum_bookings_per_user,"-1") isSet,
		IF (ba.maximum_bookings_per_user > count(b.booking_id), "valid", "invalid") response
		FROM booking b
		LEFT JOIN booking_area ba ON ba.booking_area_id = b.booking_area_id
		WHERE b.booking_area_id = :area
		AND b.created_by = :user
		AND b.booking_status_id = 1
		-- AND date(b.scheduled_at) = date(:date);
		AND date(b.created_at) = date(now());';

		$res = $this->getEntityManager ()->getConnection ()->prepare ( $query );
		$res->bindValue ( 'area', $area, \PDO::PARAM_INT );
		$res->bindValue ( 'user', $user, \PDO::PARAM_INT );
		//$res->bindValue ( 'date', $date, \PDO::PARAM_STR );
		$res->execute();        
		return $res->fetch();
	}
	
}
