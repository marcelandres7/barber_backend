<?php

namespace AppBundle\Controller\Webservice;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type,x-prototype-version,x-requested-with');
header('Content-type: application/json; charset=utf-8');

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Inspection;
use AppBundle\Entity\InspectionStatusLog;
//use AppBundle\Entity\Branch;
//use AppBundle\Entity\Organization;
use AppBundle\Entity\InspectionRequeriment;
//use AppBundle\Repository\EbClosion;
use AppBundle\Helper\MailHelper;
use Doctrine\ORM\EntityRepository;
use AppBundle\Repository\RequirementRepository;
use AppBundle\Entity\InspectionRequirementPicture;
use AppBundle\Entity\Client;
use AppBundle\Entity\Expense;
use AppBundle\Entity\SummaryService;
use AppBundle\Entity\OrderDetail;
use AppBundle\Entity\Menus;
use AppBundle\Entity\User;
use AppBundle\Entity\Product;
use AppBundle\Entity\Payment;
use AppBundle\Entity\TurnProfessional;
use AppBundle\Repository\TurnProfessionalRepository;
use AppBundle\Entity\MenusUser;
use AppBundle\Entity\ProfessionalReservation;
use AppBundle\Entity\ExpenseCategory;
use AppBundle\Entity\TurnWasher;

/**
 * Webservice controller.
 */
class WebserviceController extends Controller{
	

    public function getProjectPaths(){
        $enviroment = $this->container->get('kernel')->getEnvironment();
        $paths = array();
        // if($enviroment == "prod"){
        //     $paths["uploads_path"]= 'http://barberiahernandez.com/barber_backend/web/uploads/';
		// 	// $paths["uploads_path"]= 'http://localhost/barber_backend/web/uploads/';
		// 	//$paths["uploads_path"]= 'http://ixtusltda.cl/barber_backend/web/uploads/';
        // }else{
        //     $paths["uploads_path"]= 'http://barberiahernandez.com/barber_backend/web/uploads/';
		// 	// $paths["uploads_path"]= 'http://localhost/barber_backend/web/uploads/';
		// 	//$paths["uploads_path"]= 'http://ixtusltda.cl/barber_backend/web/uploads/';
        // }
        
        //$paths["uploads_path"]= 'http://barberiahernandez.com/barber_backend/web/uploads/';
		//$paths["uploads_path"]= 'http://barberiahernandez.com/barber_backend_bosque/web/uploads/';
		$paths["uploads_path"]= 'http://barberiahernandez.com/prueba/web/uploads/';
		//$paths["uploads_path"]= 'http://localhost/barber_backend/web/uploads/';
        return $paths;
        
    }

	
	
	/**
     * @Route("/ws/set-finish-wash", name="/ws/set-finish-wash")
     */
    public function getFinishWash(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		

		if($data){
			$user_washer=$data->user;
			$washer_item=$data->washer;

			$washerListPend=array();
			$washerListDone=array();
			$em = $this->getDoctrine()->getManager();
			$total_pending=0;
			$total_done=0;
			

			
				$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $washer_item->service_id));
				$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 13));
				$service->setStatus($status);
				$em->persist($service);
				$em->flush();

				$turn_washer = $em->getRepository('AppBundle:TurnWasher')->findOneBy(array("turnWasherId" => $washer_item->turn_washer_id));

					
				$turn_washer->setStatus("Finalizado");
				$em->persist($turn_washer);
				$em->flush();
						
			

					$washerPend = $em->getRepository('AppBundle:TurnWasher')->getListClientPend();
				
					if($washerPend){
						foreach($washerPend as $pending){

							$total_pending=$total_pending+1;

							$washerListPend[] = array(
								'turn_washer_id' =>$pending['turn_washer_id'],
								'service_id'     =>$pending['service_id'],
								'client_name'    =>$pending['client_name'],
								'professional'   =>$pending['professional'],
								'status'         =>$pending['status'],
								'created_date'   =>$pending['created_date'],
								'washer_id'      =>$pending['washer_id'],
								'washer_name'    =>$pending['washer_name']
								
							);

						}
					}

					$washerDone = $em->getRepository('AppBundle:TurnWasher')->getListClientDone();
					
					if($washerDone){
						foreach($washerDone as $done){
						
							$total_done=$total_done+1;

							$washerListDone[] = array(
								'turn_washer_id' =>$done['turn_washer_id'],
								'service_id'     =>$done['service_id'],
								'client_name'    =>$done['client_name'],
								'professional'   =>$done['professional'],
								'status'         =>$done['status'],
								'created_date'   =>$done['created_date'],
								'washer_id'      =>$done['washer_id'],
								'washer_name'    =>$done['washer_name']
								
							);
						} 
					}

					$list =  array(
						'total_pending'  => $total_pending,
						'washerListPend' => $washerListPend,
						'total_done'     => $total_done,
						'washerListDone' => $washerListDone
					);

				return new JsonResponse(array('status' => 'success','data'=>$list));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	
	/**
     * @Route("/ws/get-take-wash", name="/ws/get-take-wash")
     */
    public function getTakeWash(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		

		if($data){
			$user_washer=$data->user;
			$washer_item=$data->washer;

			$washerListPend=array();
			$washerListDone=array();
			$em = $this->getDoctrine()->getManager();
			$total_pending=0;
			$total_done=0;
			

			
			    $washer = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $user_washer->id));
				$turn_washer = $em->getRepository('AppBundle:TurnWasher')->findOneBy(array("summaryServiceId" => $washer_item->service_id));

					
				$turn_washer->setWasherId($washer->getId());
				$em->persist($turn_washer);
				$em->flush();
						
			

					$washerPend = $em->getRepository('AppBundle:TurnWasher')->getListClientPend();
				
					if($washerPend){
						foreach($washerPend as $pending){

							$total_pending=$total_pending+1;

							$washerListPend[] = array(
								'turn_washer_id' =>$pending['turn_washer_id'],
								'service_id'     =>$pending['service_id'],
								'client_name'    =>$pending['client_name'],
								'professional'   =>$pending['professional'],
								'status'         =>$pending['status'],
								'created_date'   =>$pending['created_date'],
								'washer_id'      =>$pending['washer_id'],
								'washer_name'    =>$pending['washer_name']
								
							);

						}
					}

					$washerDone = $em->getRepository('AppBundle:TurnWasher')->getListClientDone();
					
					if($washerDone){
						foreach($washerDone as $done){
						
							$total_done=$total_done+1;

							$washerListDone[] = array(
								'turn_washer_id' =>$done['turn_washer_id'],
								'service_id'     =>$done['service_id'],
								'client_name'    =>$done['client_name'],
								'professional'   =>$done['professional'],
								'status'         =>$done['status'],
								'created_date'   =>$done['created_date'],
								'washer_id'      =>$done['washer_id'],
								'washer_name'    =>$done['washer_name']
								
							);
						} 
				    }

					$list =  array(
						'total_pending'  => $total_pending,
						'washerListPend' => $washerListPend,
						'total_done'     => $total_done,
						'washerListDone' => $washerListDone
					);

				return new JsonResponse(array('status' => 'success','data'=>$list));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	
	
	/**
     * @Route("/ws/get-client-wash", name="/ws/get-client-wash")
     */
    public function getClientWash(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		

		if($data){
			$washerListPend=array();
			$washerListDone=array();
			$em = $this->getDoctrine()->getManager();
			$total_pending=0;
			$total_done=0;
			

			// if( !$data->date_from ){
			// 	$created_at = new \DateTime();
			// 	$date_end = date_format($created_at,"Y-m-d");
			// 	$date_start = date_format($created_at,"Y-m");
			// 	$date_start = $date_start."-01";
			// }else{
			// 	$date_start = $data->date_from;
			// 	$date_end = $data->date_to;
			// }
        
				// $expenses = $em->getRepository('AppBundle:Expense')->findBy(array("status" => 'activo'));
						
				// 	foreach($expenses as $expense){
					
				// 		$expenseList[] = array(
				// 			'expense_id'   => $expense->getExpenseId(),
				// 			'amount'       => $expense->getPay(),
				// 			'date_pay'     => date_format($expense->getPayDate(),"Y-m-d H:i"),
				// 			'description' => $expense->getComment(),
				// 			'path_imagen'  => "uploads/".$expense->getPathImage(),
				// 			'category_id'  => $expense->getCategory()->getExpenseCategoryId(),
				// 			'category_name'=> $expense->getCategory()->getCategoryName(),
				// 			'status'       => $expense->getStatus()
				// 		);

				// 	} 

					$washerPend = $em->getRepository('AppBundle:TurnWasher')->getListClientPend();
				
				if($washerPend){
					foreach($washerPend as $pending){

						$total_pending=$total_pending+1;

						$washerListPend[] = array(
							'turn_washer_id' =>$pending['turn_washer_id'],
							'service_id'     =>$pending['service_id'],
							'client_name'    =>$pending['client_name'],
							'professional'   =>$pending['professional'],
							'status'         =>$pending['status'],
							'created_date'   =>$pending['created_date'],
							'washer_id'      =>$pending['washer_id'],
							'washer_name'    =>$pending['washer_name']
							
						);

					}
                 }
					$washerDone = $em->getRepository('AppBundle:TurnWasher')->getListClientDone();
				
					if($washerDone){
						foreach($washerDone as $done){
						
							$total_done=$total_done+1;

							$washerListDone[] = array(
								'turn_washer_id' =>$done['turn_washer_id'],
								'service_id'     =>$done['service_id'],
								'client_name'    =>$done['client_name'],
								'professional'   =>$done['professional'],
								'status'         =>$done['status'],
								'created_date'   =>$done['created_date'],
								'washer_id'      =>$done['washer_id'],
								'washer_name'    =>$done['washer_name']
								
							);
						} 
				    }

					$list =  array(
						'total_pending'  => $total_pending,
						'washerListPend' => $washerListPend,
						'total_done'     => $total_done,
						'washerListDone' => $washerListDone
					);

				return new JsonResponse(array('status' => 'success','data'=>$list));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}

	/**
     * @Route("/ws/send-client-washer", name="/ws/send-client-washer")
     */
    public function setSendClientWasher(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 12));
			$service->setStatus($status);
			$em->persist($service);
			$em->flush();
			// if($data->random == "y"){
			// 	$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			// 	$service->setProfessional($professional);
			// }

			$turnWasherNew = new TurnWasher();
			$turnWasherNew->setSummaryServiceId($service->getIdSummaryService());
			$turnWasherNew->setStatus("Pendiente");
			$turnWasherNew->setCreatedDate(new \DateTime());			
			$em->persist($turnWasherNew);
			$em->flush();

			//$service->setServiceStart(new \DateTime());
		
            //ACTUALIZA TABLA DE TURNO
			
			// $turns = $em->getRepository('AppBundle:TurnProfessional')->findBy(array("profId" => $data->prof_id),array('turnDate' => 'desc'));
			// $first=true;

			// if($turns){	
			// 	foreach($turns as $turn){
			// 		if($first){
			// 			$turn->setStatus("Ocupado");
			// 			$turn->setTurnDate(new \DateTime());
			// 			$em->persist($turn);
			// 			$first=false;
			// 		}else{
			// 			$em->remove($turn);
			// 		}
			// 	}
			// $em->flush();

             //}
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }   
	
	/**
     * @Route("/ws/edit-expense", name="/ws/edit-expense")
     */
    public function editExpense(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$active=0;
			$fileName="";
		

			if ($data->hash){
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			}

			$expenseEdit = $em->getRepository('AppBundle:Expense')->findOneBy(array("expenseId" => $data->expense_id));
			$expenseCategory = $em->getRepository('AppBundle:ExpenseCategory')->findOneBy(array("expenseCategoryId" => $data->category));
	
			$expenseEdit->setPay($data->amount);
			$expenseEdit->setPayDate(new \DateTime($data->date_buy));
			$expenseEdit->setPathImage($fileName);
			$expenseEdit->setComment($data->description);
			$expenseEdit->setCategory($expenseCategory);
			$expenseEdit->setStatus("activo");
			$expenseEdit->setCreatedAt(new \DateTime());
			$em->persist($expenseEdit);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  
	
	/**
     * @Route("/ws/delete-expense", name="/ws/delete-expense")
     */
    public function deleteExpense(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{			
			$expenseList=array();

			$expense = $em->getRepository('AppBundle:Expense')->findOneBy(array("expenseId" => $data->expense_id));
			
				if($expense){
					$em->remove($expense);
					$em->flush();
					
				}
			
			$date_start="";
			$date_end="";
			$total_expense=0;

			
				$created_at = new \DateTime();
				$date_end = date_format($created_at,"Y-m-d");
				$date_start = date_format($created_at,"Y-m");
				$date_start = $date_start."-01";
			

				$expenses = $em->getRepository('AppBundle:Expense')->reportExpense($date_start,$date_end);
			
				foreach($expenses as $expense){

					$total_expense=$total_expense+ $expense['pay'];

					$expenseList[] = array(
						'expense_id'   => $expense['expense_id'],
						'category_id'  => $expense['category_id'],
						'category_name'=> $expense['category_name'],
						'amount'       => $expense['pay'],
						// 'date_pay'     => date_format($expense['pay_date'],"Y-m-d H:i"),
						'date_pay'     => $expense['pay_date'],
						'description'  => $expense['comment'],
						'path_imagen'  => "uploads/".$expense['path_image'],
						'status'       => $expense['status'],
						
					);
				}

				$list =  array(
					'list_expense' => $expenseList,
					'total_expense' => $total_expense,
					'date_start'    => $date_start,
					'date_end'      => $date_end,
				);
				
			 return new JsonResponse(array('status' => 'success', 'data' =>$list ));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }

	
	/**
     * @Route("/ws/set-expense-category", name="/ws/set-expense-category")
     */
    public function setExpenseCategory(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			$UPDATE=true;

			if($data->option == "new"){
				$expenseCategory = new ExpenseCategory();
			}else{
				$expenseCategory = $em->getRepository('AppBundle:ExpenseCategory')->findOneBy(array("expenseCategoryId" => $data->category_id));
			
				if($data->option == "delete"){
					$em->remove($expenseCategory);
					$em->flush();
					$UPDATE=false;
				}
				
			}
			
			if($UPDATE){
				$expenseCategory->setCategoryName($data->category_name);
				$expenseCategory->setStatus(1);
				$em->persist($expenseCategory);
				$em->flush();
			}

			

			$categoryList = $em->getRepository('AppBundle:ExpenseCategory')->findBy(array("status" => 1));
						
					foreach($categoryList as $cat){
					
						$catList[] = array(
							'category_id'   => $cat->getExpenseCategoryId(),
							'category_name' => $cat->getCategoryName()
						);

					} 
				
			 return new JsonResponse(array('status' => 'success', 'data' =>$catList ));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }
	
	/**
     * @Route("/ws/get-list-expense", name="/ws/get-list-expense")
     */
    public function getListExpense(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){
			$catList=array();
			$expenseList=array();
			$em = $this->getDoctrine()->getManager();
			$date_start="";
			$date_end="";
			$total_expense=0;
			$paths = $this->getProjectPaths();

			if( !$data->date_from ){
				$created_at = new \DateTime();
				$date_end = date_format($created_at,"Y-m-d");
				$date_start = date_format($created_at,"Y-m");
				$date_start = $date_start."-01";
			}else{
				$date_start = $data->date_from;
				$date_end = $data->date_to;
			}
        
				// $expenses = $em->getRepository('AppBundle:Expense')->findBy(array("status" => 'activo'));
						
				// 	foreach($expenses as $expense){
					
				// 		$expenseList[] = array(
				// 			'expense_id'   => $expense->getExpenseId(),
				// 			'amount'       => $expense->getPay(),
				// 			'date_pay'     => date_format($expense->getPayDate(),"Y-m-d H:i"),
				// 			'description' => $expense->getComment(),
				// 			'path_imagen'  => "uploads/".$expense->getPathImage(),
				// 			'category_id'  => $expense->getCategory()->getExpenseCategoryId(),
				// 			'category_name'=> $expense->getCategory()->getCategoryName(),
				// 			'status'       => $expense->getStatus()
				// 		);

				// 	} 

					$expenses = $em->getRepository('AppBundle:Expense')->reportExpense($date_start,$date_end);
				
					foreach($expenses as $expense){

						$total_expense=$total_expense+ $expense['pay'];

						$expenseList[] = array(
							'expense_id'   => $expense['expense_id'],
							'category_id'  => $expense['category_id'],
							'category_name'=> $expense['category_name'],
							'amount'       => $expense['pay'],
							// 'date_pay'     => date_format($expense['pay_date'],"Y-m-d H:i"),
							'date_pay'     => $expense['pay_date'],
							'description'  => $expense['comment'],
							'path_imagen'  => $paths["uploads_path"].$expense['path_image'],
							'status'       => $expense['status'],
							
						);

					}

					$category = $em->getRepository('AppBundle:ExpenseCategory')->findAll(array("status" => 1));
						
					foreach($category as $cat){
					
						$catList[] = array(
							'category_id'   => $cat->getExpenseCategoryId(),
							'category_name' => $cat->getCategoryName()
						);
					} 

					$list =  array(
						'category' => $catList,
						'list_expense' => $expenseList,
						'total_expense' => $total_expense,
						'date_start'    => $date_start,
						'date_end'      => $date_end,
					);

				return new JsonResponse(array('status' => 'success','data'=>$list));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}

	/**
     * @Route("/ws/create-expense", name="/ws/create-expense")
     */
    public function createExpense(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$active=0;
			$fileName="";
		

			if ($data->hash){
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			}

			$category = $em->getRepository('AppBundle:ExpenseCategory')->findOneBy(array("expenseCategoryId" => $data->category));

			$expenseNew = new Expense();
			$expenseNew->setPay($data->amount);
			$expenseNew->setPayDate(new \DateTime($data->date_buy));
			$expenseNew->setPathImage($fileName);
			$expenseNew->setComment($data->description);
			$expenseNew->setCategory($category);
			$expenseNew->setStatus("activo");
			$expenseNew->setCreatedAt(new \DateTime());
			$em->persist($expenseNew);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  
	
	
	/**
     * @Route("/ws/get-category-expense", name="/ws/get-category-expense")
     */
    public function getCategoryExpense(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$em = $this->getDoctrine()->getManager();
        
				$category = $em->getRepository('AppBundle:ExpenseCategory')->findBy(array("status" => 1));
						
					foreach($category as $cat){
					
						$catList[] = array(
							'category_id'   => $cat->getExpenseCategoryId(),
							'category_name' => $cat->getCategoryName()
						);

					} 

				return new JsonResponse(array('status' => 'success','data'=>$catList));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}

	/**
     * @Route("/ws/get-report-general", name="/ws/get-report-general")
     */
    public function getReportGeneral(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$em = $this->getDoctrine()->getManager();
            $reportList = array();
			$listProductsSale=array();
			$date_start='';
			$date_end='';
			$organization_id=1;
			$ganancia_salon=0;

			if( !$data->date_from ){
				$created_at = new \DateTime();
				$date_end = date_format($created_at,"Y-m-d");
				$date_start = date_format($created_at,"Y-m");
				$date_start = $date_start."-01";
			}else{
				$date_start = $data->date_from;
				$date_end = $data->date_to;
			}
			
				$report = $em->getRepository('AppBundle:SummaryService')->reportGeneral($date_start,$date_end,$organization_id);
				$report2 = $em->getRepository('AppBundle:SummaryService')->reportGeneral2($date_start,$date_end,$organization_id);
				
				$serv_special=0;
				$serv_normal=0;
				$special_total=0;
				$normal_total=0;


				foreach($report2 as $rep2){
					$services=explode(",", $rep2['services']);
	
					foreach($services as $serv){
						$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
						
						if($service->getPercentBarber() > 0){
							$serv_special=$serv_special+1;
							$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
						}else{
							$serv_normal=$serv_normal+1;
							$normal_total=$normal_total+$service->getPrice();
						}	
					}
				}

					// foreach($report as $rep){
						
						$ganancia_salon= $report[0]['ganancias_salon']-$special_total;

						$reportList = array(
							'total'           => $report[0]['total'],
							'ganancias_salon' => $report[0]['ganancias_salon']-$special_total,
							'ganancia_barbero'=> $report[0]['ganancia_barbero']+$special_total,
							'impuesto'        => $report[0]['impuesto'],
							'propina'         => $report[0]['propina'],
							'propina_barberos'=> $report[0]['propina_barberos'],
							'propina_cafe'	  => $report[0]['propina_cafe'],
							'propina_cajera'  => $report[0]['propina_cajera'],
							'serv_normal'     => $serv_normal,
							'normal_total'    => $normal_total,
							'serv_special'    => $serv_special,
							'special_total'   => $special_total
						);

					// }
				
				$reportRangeProduct = $em->getRepository('AppBundle:SummaryService')->reportSaleProductsRange($date_start,$date_end);

				$total_products=0;
				foreach($reportRangeProduct as $saleProductRange)
				{  
					$total_products=$total_products+ $saleProductRange['payment_total'];   				
					$listProductsSale[] = array(
						'product_name' => $saleProductRange['product_name'],
						'quantity'     => $saleProductRange['quantity'],
						'payment_total'=> $saleProductRange['payment_total']
						
					);
				}

				$expenses = $em->getRepository('AppBundle:Expense')->reportExpense($date_start,$date_end);
				$total_expense=0;

				foreach($expenses as $expense){
					$total_expense=$total_expense+ $expense['pay'];
				}

				$list = array(
				  'list_product'  => $listProductsSale,
				  'total_products'=> $total_products,
				  'list_general'  => $reportList,
				  'date_start'    => $date_start,
				  'date_end'      => $date_end,
				  'total_report'  => $ganancia_salon ,
				  'total_expense' => $total_expense,
				  'utilidad'      => $ganancia_salon - $total_expense
				);
		    

				return new JsonResponse(array('status' => 'success','data'=>$list));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}

	/**
     * @Route("/ws/set-update-product-client", name="/ws/set-update-product-client")
     */
    public function setUpdateProductClient(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){
			
			$product=$data->product;
			$em = $this->getDoctrine()->getManager();

			//$summaServices = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("professional" => $data->prof_id,"status" => 8, "createdAt" => $date_created));
			$orderDetail = $em->getRepository('AppBundle:OrderDetail')->findOneBy(array("summaryService" => $data->service_id,"product"=>$product->product_id));
			
			if($orderDetail){
				$em->remove($orderDetail);
				// var_dump($summaServices);
				// die;
				$em->flush();	
		     }

				return new JsonResponse(array('status' => 'success'));
		    }else{
				// echo "Entre en ERROR";
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	
	/**
     * @Route("/ws/get-cart-client", name="/ws/get-cart-client")
     */
    public function getCartClient(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$em = $this->getDoctrine()->getManager();
            $cartList = array();
			

				$productsCart = $em->getRepository('AppBundle:OrderDetail')->getProductCart($data->service_id);
				
				
					foreach($productsCart as $cart){
					
						$cartList[] = array(
							'product_id'   => $cart['product_id'],
							'product_name' => $cart['product_name'],
							'price' 	   => $cart['price'],
							'item_qty'     => $cart['quantity'],
							'discount'     => $cart['discount']*1,
							'total'		   => $cart['payment_total'],
							
						);

					}
		    

				return new JsonResponse(array('status' => 'success','data'=>$cartList));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	
	/**
     * @Route("/ws/get-client-pending", name="/ws/get-client-pending")
     */
    public function getClientPending(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$em = $this->getDoctrine()->getManager();
            $agendaList = array();
			$clientList = array();
			

				$clientPending = $em->getRepository('AppBundle:SummaryService')->clientPending($data->organization_id);
				
				
					foreach($clientPending as $client){
						$cartList=array();
						$listServices=array();

						$productsCart = $em->getRepository('AppBundle:OrderDetail')->getProductCart($client['service_id']);
	
						foreach($productsCart as $cart){
							$cartList[] = array(	
								'product_id'   => $cart['product_id'],
								'product_name' => $cart['product_name'],
								'price' 	   => $cart['price'],
								'item_qty'     => $cart['quantity'],
								'total'        => $cart['payment_total']
							);
						}	


						$services=explode(",", $client['services']);
			
						if( !empty($services[0]) ){
			
							foreach($services as $service){
								$serv = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $service));
			
								$listServices[] = array(
									'service_id'         => $serv->getMenuId(),
									'service_name'       => $serv->getMenuName(),
									'service_price' => $serv->getPrice()
								);
							}
						}	
					
						$clientList[] = array(
							
							'service_id'  		=> $client['service_id'],
							'client_name' 		=> $client['client_name'],
							'client_id' 		=> $client['client_id'],
							'professional_id'   => $client['professional_id'],
							'professional_name' => $client['professional_name'],
							'status_id'         => $client['status_id'],
							'status_name'       => $client['status_name'],
							'total'       		=> $client['total'],
							'created_at'       	=> $client['created_at'],
							'scheduled_to'      => $client['scheduled_to'],
							'cart'              => $cartList,
							'services'          => $listServices
							
						);

					}
		    

				return new JsonResponse(array('status' => 'success','data'=>$clientList));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	

	/**
     * @Route("/ws/set-delete-notavailable", name="/ws/set-delete-notavailable")
     */
    public function setDeleteNotAvailable(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){
			$pos=0;
			$em = $this->getDoctrine()->getManager();
            $agendaList = array();

			$date_created = new \DateTime($data->created_at);
			$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			$summaServices = $em->getRepository('AppBundle:SummaryService')->findBy(array("professional" => $data->prof_id,"status" => 8, "createdAt" => $date_created));
			$profReserve = $em->getRepository('AppBundle:ProfessionalReservation')->findBy(array("professionalId" => $data->prof_id, "createdAt" => $date_created));
			
			// var_dump($summaServices);
			// die;
			foreach($summaServices as $notReserve){
				$em->remove($notReserve);
			}

			foreach($profReserve as $reserve){
				$em->remove($reserve);
			}

			$em->flush();
		
			
			/////////////////////////
			
			if($data->rol_id == 1 || $data->rol_id == 5){
				$professional="";
				$data->prof_id="";
			}
				$reserveNoAvailable = $em->getRepository('AppBundle:SummaryService')->listReserveNotAvailable($data->prof_id);
				
					foreach($reserveNoAvailable as $agenda){
					
			
						$agendaList[] = array(
							'position'         => $pos++,
							'professional_id'  => $agenda['professional_id'],
							'professional_name'=> $agenda['professional_name'],
							'scheduled_from'   => $agenda['scheduled_from'],
							'scheduled_to'     => $agenda['scheduled_to'],
							'duration'         => $agenda['duration'],
							'created_at'       => $agenda['created_at'],
						);

					}
		    
				

				return new JsonResponse(array('status' => 'success','data' => $agendaList, 'professionals' => ""));
		    }else{
				// echo "Entre en ERROR";
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	
	/**
     * @Route("/ws/set-create-notavailable", name="/ws/set-create-notavailable")
     */
    public function setCreateNotAvailable(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$em = $this->getDoctrine()->getManager();
            $agendaList = array();
			$pos=1;
			$duration=0;
			$profId="";

			if($data->prof_id == 1 || $data->prof_id == 3){
				$profId = $data->prof_selected;
			}else{
				$profId = $data->prof_id;
			}

			if($profId == 'all_prof'){
				$professional = $em->getRepository('AppBundle:User')->findBy(array("status" => ["ACTIVO","INACTIVO"],"userRole" => 2));
			}else{
				$professional = $em->getRepository('AppBundle:User')->findBy(array("id" => $profId));
			}
			////// Evaluar horas ////
			$start = new \DateTime($data->date_start);
            $end = new \DateTime($data->date_end);
            $diff = $start->diff($end);
		
			// echo $diff->days ;
			
			$scheduled_from = $data->date_start; 
			$scheduled_to = $data->date_end; 
			
			$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 8));
			$client = $em->getRepository('AppBundle:Client')->findOneBy(array("clientId" => 1));
			$created_at = new \DateTime();

			foreach($professional as $prof){
				if($prof->getId() > 0){
					for ( $i = 0; $i <= $diff->days; $i++ ){

						$scheduled=date("Y-m-d",strtotime($scheduled_from."+ $i days"));
						$scheduled_to =date("Y-m-d",strtotime($scheduled_from."+ $i days"));
						if($data->allTime){
						//	echo "PASE TODO EL DIA $i";
							$scheduled=$scheduled." 10:00:00";
							$scheduled_to=$scheduled_to." 22:00:00";
							$duration=12*60;
						}else{
							$scheduled=$scheduled." ".$data->start_hour.":00:00";
							$scheduled_to=$scheduled_to." ".$data->end_hour.":00:00";

							$duration=($data->end_hour*1 - $data->start_hour*1)*60;
						}

						
							$notAvailableNew = new SummaryService();
							$notAvailableNew->setScheduledTo(new \DateTime($scheduled));
							$notAvailableNew->setProfessional($prof);
							$notAvailableNew->setServices(1);
							$notAvailableNew->setStatus($status);
							$notAvailableNew->setClient($client);
							$notAvailableNew->setOrganization($prof->getOrganization());
							$notAvailableNew->setCreatedAt($created_at);
							$em->persist($notAvailableNew);
							$em->flush();

							$professionalReserseNew = new ProfessionalReservation();
							$professionalReserseNew->setSummaryServiceId($notAvailableNew->getIdSummaryService());
							$professionalReserseNew->setProfessionalId($prof->getId());
							$professionalReserseNew->setScheduledFrom(new \DateTime($scheduled));
							$professionalReserseNew->setScheduledTo(new \DateTime($scheduled_to));
							$professionalReserseNew->setHoursQuantity($duration/60);
							$professionalReserseNew->setDuration($duration);
							$professionalReserseNew->setCreatedAt($created_at);
							$em->persist($professionalReserseNew);
							$em->flush();
					}
				}
			}

			/////////////////////////
			
			if($data->prof_id == 1 || $data->prof_id == 3){
				$professional="";
				$data->prof_id="";
			}
				$reserveNoAvailable = $em->getRepository('AppBundle:SummaryService')->listReserveNotAvailable($data->prof_id);
				
					foreach($reserveNoAvailable as $agenda){
					
			
						$agendaList[] = array(
							'position'         => $pos++,
							'professional_id'  => $agenda['professional_id'],
							'professional_name'=> $agenda['professional_name'],
							'scheduled_from'   => $agenda['scheduled_from'],
							'scheduled_to'     => $agenda['scheduled_to'],
							'duration'         => $agenda['duration'],
							'created_at'       => $agenda['created_at'],
						);

					}
		    
				

				return new JsonResponse(array('status' => 'success','data' => $agendaList, 'professionals' => ""));
		    }else{
				// echo "Entre en ERROR";
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	
	/**
     * @Route("/ws/get-reserve-not-available", name="/ws/get-reserve-not-available")
     */
    public function getReserveNotAvailable(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$em = $this->getDoctrine()->getManager();
            $agendaList = array();
			$agendaDetail = array();
			$total_agenda=0;
			$pos=1;
			$listProfessional=[];

			$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			$prof_id=$professional->getId();

			if($data->prof_id == 1 || $data->prof_id == 3){
				$prof_id="";
				$professional = $em->getRepository('AppBundle:User')->findBy(array("status" => ["ACTIVO","INACTIVO"],"userRole" => 2));
				
				foreach($professional as $prof){
					if($prof->getId() > 0){
						$listProfessional[] = array(
							'professional_id'  => $prof->getId(),
							'professional_name'=> $prof->getFirstName()." ". $prof->getLastName()
						);
			    	}
				}
			}
				$reserveNoAvailable = $em->getRepository('AppBundle:SummaryService')->listReserveNotAvailable($prof_id);
				
				
					foreach($reserveNoAvailable as $agenda){
					
						$agendaList[] = array(
							'position'         => $pos++,
							'professional_id'  => $agenda['professional_id'],
							'professional_name'=> $agenda['professional_name'],
							'scheduled_from'   => $agenda['scheduled_from'],
							'scheduled_to'     => $agenda['scheduled_to'],
							'duration'         => $agenda['duration'],
							'created_at'       => $agenda['created_at']
							
						);

					}
		    
				$confgPage = array(
					'professionals' => $listProfessional,
					'list_hours_start' => [10,11,12,13,14,15,16,17,18,19,20,21],
					'list_hours_end' => [10,11,12,13,14,15,16,17,18,19,20,21,22]
			
				);

				return new JsonResponse(array('status' => 'success','data'=>$agendaList, 'conf_page' => $confgPage));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}


	 /**
     * @Route("/ws/get-agenda-reserve", name="/ws/get-agenda-reserve")
     */
    public function getAgendaReserve(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$em = $this->getDoctrine()->getManager();
            $agendaList = array();
			$agendaDetail = array();
			$total_agenda=0;
			$total_pending=0;
			$pos=1;

			$agendas = $em->getRepository('AppBundle:SummaryService')->getReserveAgenda($data->organization_id,'7',$data->prof_id);
			$agendasPending = $em->getRepository('AppBundle:SummaryService')->getReserveAgenda($data->organization_id,'6',$data->prof_id);

			foreach($agendas as $agenda){
				$agendaDetail = array();
				$listProd= array();
				$total_agenda = $total_agenda + $agenda['quantity'];

				  $agendasDetail = $em->getRepository('AppBundle:SummaryService')->getReserveAgendaDetail($data->organization_id,'7',$data->prof_id,$agenda['scheduled']);

					foreach($agendasDetail as $detail){
						$listProd= [];
						$prods=explode(",", $detail['products']);
						
						foreach($prods as $prod){
							$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
			
							$listProd[] = array(
								'product_id'   => $product->getMenuId(),
								'product_name' => $product->getMenuName(),
								'product_menu_price' => $product->getPrice(),
							);
						}

						$agendaDetail[] = array(
							'service_id'    	=> $detail['service_id'],
							'client_id'     	=> $detail['client_id'],
							'client_name'   	=> $detail['client_name'],
							 'status_id'	    => $detail['status_id'],
							'products'      	=> $listProd,
							'service_date'  	=> $detail['service_date'],
							'professional_id'	=> $detail['professional_id'],
							'professional_name' => $detail['professional_name'],
							'total'  			=> $detail['total'],
							'start'  			=> $detail['service_start'],
							'end'    			=> $detail['service_end'],
							'schedulet'         => $detail['scheduled_to'],
							'phone'				=> $detail['phone'],
							'email'             => $detail['email'],
							'organization_id'   => $detail['organization_id'],
						);
					}

				  $agendaList[] = array(
					'position'     => $pos++,
					'quantity'     => $agenda['quantity'],
					'scheduled'    => $agenda['scheduled'],
					'status_id'    => $agenda['status_id'],
					'detail_agenda'=> $agendaDetail,
					'viewDetail'        => false
				  );

			}


			$pendingList=array();
			foreach($agendasPending as $pending){
				$agendaDetail = array();
				$listProd= array();
				$total_pending = $total_pending + $pending['quantity'];

				  $pendingDetail = $em->getRepository('AppBundle:SummaryService')->getReserveAgendaDetail($data->organization_id,'6',$data->prof_id,$pending['scheduled']);

					foreach($pendingDetail as $detail){
						$listProd=[];
						$prods=explode(",", $detail['products']);
						
						foreach($prods as $prod){
							$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
			
							$listProd[] = array(
								'product_id'   => $product->getMenuId(),
								'product_name' => $product->getMenuName(),
								'product_menu_price' => $product->getPrice(),
							);
						}

						$agendaDetail[] = array(
							'service_id'    	=> $detail['service_id'],
							'client_id'     	=> $detail['client_id'],
							'client_name'   	=> $detail['client_name'],
							'status_id'	        => $detail['status_id'],
							'products'      	=> $listProd,
							'service_date'  	=> $detail['service_date'],
							'professional_id'	=> $detail['professional_id'],
							'professional_name' => $detail['professional_name'],
							'total'  			=> $detail['total'],
							'start'  			=> $detail['service_start'],
							'end'    			=> $detail['service_end'],
							'schedulet'         => $detail['scheduled_to'],
							'phone'				=> $detail['phone'],
							'email'             => $detail['email'],
							'organization_id'   => $detail['organization_id'],
						);
					}

				  $pendingList[] = array(
					'position'     => $pos++,
					'quantity'     => $pending['quantity'],
					'scheduled'    => $pending['scheduled'],
					'status_id'    => $pending['status_id'],
					'detail_agenda'=> $agendaDetail,
					'viewDetail'   => false
				  );

			}
		
				

				return new JsonResponse(array('status' => 'success','data'=>$agendaList,'total'=>$total_agenda, 'data_pending' => $pendingList, 'total_pending'=>$total_pending));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}

	/**
     * @Route("/ws/set-confirmed-arrived", name="/ws/set-confirmed-arrived")
     */
    public function setConfirmedArrived(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		
		if($data){

			$em = $this->getDoctrine()->getManager();
			
            
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
            $status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 1));
			$service->setStatus($status);
			$em->persist($service);
			$em->flush();

				return new JsonResponse(array('status' => 'success'));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	}

	/**
     * @Route("/ws/set-reserve-cancel", name="/ws/set-reserve-cancel")
     */
    public function setReserveCancel(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$em = $this->getDoctrine()->getManager();
            $listBooking= array();

			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->reserve));
            $status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 4));
			$service->setStatus($status);
			$em->persist($service);
			$em->flush();

		// LISTAR RESERVAS 
		$em = $this->getDoctrine()->getManager();
		$agendaList = array();
		$agendaDetail = array();
		$total_agenda=0;
		$total_pending=0;
		$pos=1;
		$prof_id="";

		$agendas = $em->getRepository('AppBundle:SummaryService')->getReserveAgenda($data->organization_id,'7',$prof_id);
		$agendasPending = $em->getRepository('AppBundle:SummaryService')->getReserveAgenda($data->organization_id,'6',$prof_id);

		foreach($agendas as $agenda){
			$agendaDetail = array();
			$listProd= array();
			$total_agenda = $total_agenda + $agenda['quantity'];

			  $agendasDetail = $em->getRepository('AppBundle:SummaryService')->getReserveAgendaDetail($data->organization_id,'7',$prof_id,$agenda['scheduled']);

				foreach($agendasDetail as $detail){

					$prods=explode(",", $detail['products']);
					
					foreach($prods as $prod){
						$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
		
						$listProd[] = array(
							'product_id'   => $product->getMenuId(),
							'product_name' => $product->getMenuName(),
							'product_menu_price' => $product->getPrice(),
						);
					}

					$agendaDetail[] = array(
						'service_id'    	=> $detail['service_id'],
						'client_id'     	=> $detail['client_id'],
						'client_name'   	=> $detail['client_name'],
						 'status_id'	    => $detail['status_id'],
						'products'      	=> $listProd,
						'service_date'  	=> $detail['service_date'],
						'professional_id'	=> $detail['professional_id'],
						'professional_name' => $detail['professional_name'],
						'total'  			=> $detail['total'],
						'start'  			=> $detail['service_start'],
						'end'    			=> $detail['service_end'],
						'schedulet'         => $detail['scheduled_to'],
						'phone'				=> $detail['phone'],
						'email'             => $detail['email'],
						'organization_id'   => $detail['organization_id'],
					);
				}

			  $agendaList[] = array(
				'position'     => $pos++,
				'quantity'     => $agenda['quantity'],
				'scheduled'    => $agenda['scheduled'],
				'status_id'    => $agenda['status_id'],
				'detail_agenda'=> $agendaDetail,
				'viewDetail'        => false
			  );

		}


		$pendingList=array();
		foreach($agendasPending as $pending){
			$agendaDetail = array();
			$listProd= array();
			$total_pending = $total_pending + $pending['quantity'];

			  $pendingDetail = $em->getRepository('AppBundle:SummaryService')->getReserveAgendaDetail($data->organization_id,'6',$prof_id,$pending['scheduled']);

				foreach($pendingDetail as $detail){

					$prods=explode(",", $detail['products']);
					
					foreach($prods as $prod){
						$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
		
						$listProd[] = array(
							'product_id'   => $product->getMenuId(),
							'product_name' => $product->getMenuName(),
							'product_menu_price' => $product->getPrice(),
						);
					}

					$agendaDetail[] = array(
						'service_id'    	=> $detail['service_id'],
						'client_id'     	=> $detail['client_id'],
						'client_name'   	=> $detail['client_name'],
						'status_id'	        => $detail['status_id'],
						'products'      	=> $listProd,
						'service_date'  	=> $detail['service_date'],
						'professional_id'	=> $detail['professional_id'],
						'professional_name' => $detail['professional_name'],
						'total'  			=> $detail['total'],
						'start'  			=> $detail['service_start'],
						'end'    			=> $detail['service_end'],
						'schedulet'         => $detail['scheduled_to'],
						'phone'				=> $detail['phone'],
						'email'             => $detail['email'],
						'organization_id'   => $detail['organization_id'],
					);
				}

			  $pendingList[] = array(
				'position'     => $pos++,
				'quantity'     => $pending['quantity'],
				'scheduled'    => $pending['scheduled'],
				'status_id'    => $pending['status_id'],
				'detail_agenda'=> $agendaDetail,
				'viewDetail'   => false
			  );

		}
	
			

			return new JsonResponse(array('status' => 'success','data'=>$agendaList,'total'=>$total_agenda, 'data_pending' => $pendingList, 'total_pending'=>$total_pending));
		}else{
			return new JsonResponse(array('status' => 'error'));
		}		
		
	}

	
	/**
     * @Route("/ws/set-reserve-confirm", name="/ws/set-reserve-confirm")
     */
    public function setReserveConfirm(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		$listBooking= array();
		
		if($data){

			$em = $this->getDoctrine()->getManager();
			$listBooking= array();
            
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->reserve));
            $status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 7));
			$service->setStatus($status);
			$em->persist($service);
			$em->flush();

			// $clientBooking = $em->getRepository('AppBundle:SummaryService')->getListPaymentServices($data->organization_id,6);
			// foreach($clientBooking as $booking){
			// 	$listProd=array();
	
			// 	$prods=explode(",", $booking['products']);
						
			// 		foreach($prods as $prod){
			// 			$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
		
			// 			$listProd[] = array(
			// 				'product_id'   => $product->getMenuId(),
			// 				'product_name' => $product->getMenuName(),
			// 				'product_menu_price' => $product->getPrice()
			// 			);
			// 		}
				
			// 		$listBooking[] = array(
			// 			'service_id'    	=> $booking['service_id'],
			// 			'client_id'     	=> $booking['client_id'],
			// 			'client_name'   	=> $booking['client_name'],
			// 			'products'      	=> $listProd,
			// 			'service_date'  	=> $booking['service_date'],
			// 			'professional_id'	=> $booking['professional_id'],
			// 			'professional_name' => $booking['professional_name'],
			// 			'total'  			=> $booking['total'],
			// 			'start'  			=> $booking['service_start'],
			// 			'end'    			=> $booking['service_end'],
			// 			'schedulet'         => $booking['scheduled_to'],
			// 			'phone'				=> $booking['phone'],
			// 			'email'             => $booking['email'],
			// 			'organization_id'   => $booking['organization_id']
			// 		);
			// 	}

			// 	return new JsonResponse(array('status' => 'success','data'=>$listBooking));
		    // }else{
			// 	return new JsonResponse(array('status' => 'error'));
			// }	
			
			$em = $this->getDoctrine()->getManager();
		$agendaList = array();
		$agendaDetail = array();
		$total_agenda=0;
		$total_pending=0;
		$pos=1;
		$prof_id="";

		$agendas = $em->getRepository('AppBundle:SummaryService')->getReserveAgenda($data->organization_id,'7',$prof_id);
		$agendasPending = $em->getRepository('AppBundle:SummaryService')->getReserveAgenda($data->organization_id,'6',$prof_id);

		foreach($agendas as $agenda){
			$agendaDetail = array();
			$listProd= array();
			$total_agenda = $total_agenda + $agenda['quantity'];

			  $agendasDetail = $em->getRepository('AppBundle:SummaryService')->getReserveAgendaDetail($data->organization_id,'7',$prof_id,$agenda['scheduled']);

				foreach($agendasDetail as $detail){

					$prods=explode(",", $detail['products']);
					
					foreach($prods as $prod){
						$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
		
						$listProd[] = array(
							'product_id'   => $product->getMenuId(),
							'product_name' => $product->getMenuName(),
							'product_menu_price' => $product->getPrice(),
						);
					}

					$agendaDetail[] = array(
						'service_id'    	=> $detail['service_id'],
						'client_id'     	=> $detail['client_id'],
						'client_name'   	=> $detail['client_name'],
						 'status_id'	    => $detail['status_id'],
						'products'      	=> $listProd,
						'service_date'  	=> $detail['service_date'],
						'professional_id'	=> $detail['professional_id'],
						'professional_name' => $detail['professional_name'],
						'total'  			=> $detail['total'],
						'start'  			=> $detail['service_start'],
						'end'    			=> $detail['service_end'],
						'schedulet'         => $detail['scheduled_to'],
						'phone'				=> $detail['phone'],
						'email'             => $detail['email'],
						'organization_id'   => $detail['organization_id'],
					);
				}

			  $agendaList[] = array(
				'position'     => $pos++,
				'quantity'     => $agenda['quantity'],
				'scheduled'    => $agenda['scheduled'],
				'status_id'    => $agenda['status_id'],
				'detail_agenda'=> $agendaDetail,
				'viewDetail'        => false
			  );

		}


		$pendingList=array();
		foreach($agendasPending as $pending){
			$agendaDetail = array();
			$listProd= array();
			$total_pending = $total_pending + $pending['quantity'];

			  $pendingDetail = $em->getRepository('AppBundle:SummaryService')->getReserveAgendaDetail($data->organization_id,'6',$prof_id,$pending['scheduled']);

				foreach($pendingDetail as $detail){

					$prods=explode(",", $detail['products']);
					
					foreach($prods as $prod){
						$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
		
						$listProd[] = array(
							'product_id'   => $product->getMenuId(),
							'product_name' => $product->getMenuName(),
							'product_menu_price' => $product->getPrice(),
						);
					}

					$agendaDetail[] = array(
						'service_id'    	=> $detail['service_id'],
						'client_id'     	=> $detail['client_id'],
						'client_name'   	=> $detail['client_name'],
						'status_id'	        => $detail['status_id'],
						'products'      	=> $listProd,
						'service_date'  	=> $detail['service_date'],
						'professional_id'	=> $detail['professional_id'],
						'professional_name' => $detail['professional_name'],
						'total'  			=> $detail['total'],
						'start'  			=> $detail['service_start'],
						'end'    			=> $detail['service_end'],
						'schedulet'         => $detail['scheduled_to'],
						'phone'				=> $detail['phone'],
						'email'             => $detail['email'],
						'organization_id'   => $detail['organization_id'],
					);
				}

			  $pendingList[] = array(
				'position'     => $pos++,
				'quantity'     => $pending['quantity'],
				'scheduled'    => $pending['scheduled'],
				'status_id'    => $pending['status_id'],
				'detail_agenda'=> $agendaDetail,
				'viewDetail'   => false
			  );

		}
	
			

			return new JsonResponse(array('status' => 'success','data'=>$agendaList,'total'=>$total_agenda, 'data_pending' => $pendingList, 'total_pending'=>$total_pending));
		}else{
			return new JsonResponse(array('status' => 'error'));
		}		
	}

	
    /**
     * @Route("/ws/get-refresh-turn", name="/ws/get-refresh-turn")
     */
    public function getRefreshTurn(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		$professional=array();

		if($data){

			$em = $this->getDoctrine()->getManager();
            $list = array();

			
			$turns = $em->getRepository('AppBundle:TurnProfessional')->listTurnProfessional($data->organization_id);
            $pos=1;
			foreach($turns as $turn){
				
				$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $turn['prof_id']));
			
				if( $professional->getStatus() == "ACTIVO" ){
					$list[] = array(
						'position'   => $pos++,
						'turn_id'     => $turn['turn_id'],
						'prof_name'     => $turn['prof_name'],
						'status'	   => $turn['status'],
						'turn_date'	  => $turn['turn_date']
					);
				}else{
					$turn = $em->getRepository('AppBundle:TurnProfessional')->findOneBy(array("turnId" => $turn['turn_id']));
					$em->remove($turn);
				}
			}
		
				

				return new JsonResponse(array('status' => 'success','data'=>$list));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	
	/**
     * @Route("/ws/change-status-prof", name="/ws/change-status-prof")
     */
    public function changeStatusProf(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		if($data){
            $status_prof="";

			$em = $this->getDoctrine()->getManager();
            $list = array();

			$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			
			$professional->setStatus($data->status);
			$em->persist($professional);
			$em->flush();

			if($data->status == "ACTIVO"){
				$newTurn = new TurnProfessional();
				$newTurn->setProfId($professional->getId());
				$newTurn->setStatus("Disponible");
				$newTurn->setOrganizationId($professional->getOrganization()->getOrganizationId());
				$newTurn->setTurnDate(new \DateTime());

				$em->persist($newTurn);
				$status_prof="ACTIVO";
			}else{
				$turns = $em->getRepository('AppBundle:TurnProfessional')->findBy(array("profId" => $data->prof_id));
				foreach($turns as $turn){
					$em->remove($turn);
				}
				
				$status_prof="INACTIVO";
			}
		
				$em->flush();

				return new JsonResponse(array('status' => 'success','data' => $status_prof));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}

	
	 /**
     * @Route("/ws/set-products-cart", name="/ws/set-products-cart")
     */
    public function setProductsCart(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		if($data){

			$clientBack=$data->client_back;
			$em = $this->getDoctrine()->getManager();
            $list = array();
			$client_temp='';
			$sumaryService=array();
			$orderDetail=array();

			if( $clientBack->client_id == ""){
				$client = $em->getRepository('AppBundle:Client')->findOneBy(array("phone" => $data->client_phone,"register" => 1));
		    }else{
				$client = $em->getRepository('AppBundle:Client')->findOneBy(array("clientId" => $clientBack->client_id));

				$sumaryService = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $clientBack->service_id));
			}


			if($client){
				$client_temp=$client->getClientId();

			 }else{
				$clientNew = new Client();
				$clientNew->setName($data->client_name);
				$clientNew->setPhone($data->client_phone);
				$clientNew->setEmail($data->client_email);
				$clientNew->setRegister(0);
				$clientNew->setPromotion(0);
				$clientNew->setCreatedAt(new \DateTime());
				$em->persist($clientNew);
				$em->flush();
				$client_temp=$clientNew->getClientId();
			}		


			
			foreach($data->products as $prod){
				$product = $em->getRepository('AppBundle:Product')->findOneBy(array("productId" => $prod->product_id ));

				$product->setInventoryQuantity($product->getInventoryQuantity()-$prod->quantity);
				$em->persist($product);

				

					if($sumaryService){
						$orderDetail = $em->getRepository('AppBundle:OrderDetail')->findOneBy(array("summaryService" => $sumaryService,"product"=>$prod->product_id));
					}

					if($orderDetail){
						$orderDetail->setQuantity($orderDetail->getQuantity()+$prod->quantity);
						$orderDetail->setPaymentTotal($orderDetail->getPaymentTotal()+$prod->total);
						$em->persist($orderDetail);
					}
						else{

						$NewOrder = new OrderDetail();
						$NewOrder->setProduct($product);
						$NewOrder->setQuantity($prod->quantity);
						$NewOrder->setPaymentTotal($prod->total);
						$NewOrder->setCreatedAt(new \DateTime());
						$NewOrder->setClientId($client_temp);
						$NewOrder->setStatus(1);
						$NewOrder->setDiscount(str_replace("%","",$prod->discount)*1);
						if($sumaryService){
							$NewOrder->setSummaryService($sumaryService);
						}
						
						$em->persist($NewOrder);
					}
				
				}
		
				$em->flush();

				return new JsonResponse(array('status' => 'success'));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	}
	
	/**
     * @Route("/ws/get-service-menu", name="/ws/get-service-menu")
     */
    public function getServiceMenu(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		if($data){

			$em = $this->getDoctrine()->getManager();

			// $organization = $em->getRepository('AppBundle:Organization')->findOneBy(array("organizationId" =>$data->organization_id));
			$type = $em->getRepository('AppBundle:MenuType')->findOneBy(array("menuTypeId" => 2 ));
		    $mainMenu = $em->getRepository('AppBundle:Menus')->findBy(array("menuType" => [2,3,4] ,"isActive" => '1'));
			$iva = $em->getRepository('AppBundle:ParameterSystem')->findOneBy(array("parameterSystemId" => 3 ));

			if($mainMenu){
				$list = array();

				foreach($mainMenu as $menu)
				{
					$list[] = array(
						'menu_id'     => $menu->getMenuId(),
						'name'	      => $menu->getMenuName(),
						'class_id'	  => $menu->getMenuClass()->getMenuClassId(),
						'class_name'  => $menu->getMenuClass()->getMenuClassName(),
						'type_id'     => $menu->getMenuType()->getMenuTypeId(),
						'type_name'   => $menu->getMenuType()->getMenuTypeName(),
						'description' => $menu->getDescription(),
						// 'imagen_path' =>  $paths["uploads_path"].$menu->getPicturePath(),
						'price'       => $menu->getPrice()*$iva->getValue2(),
						'order'       => $menu->getMenuOrder(),
						// 'color'       => "dark"
					);
		        }	

		    	return new JsonResponse(array('status' => 'success','data' => $list));
	         }
	    }
		return new JsonResponse(array('data' => "error"));

    }
	
	 /**
     * @Route("/ws/set-update-selfi", name="/ws/set-update-selfi")
     */
    public function setUpdateSelfi(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		if($data){

			$em = $this->getDoctrine()->getManager();
            $list = array();

			$client = $em->getRepository('AppBundle:Client')->findOneBy(array("clientId" => $data->client_id,"register" => 1));
			
			if ($data->hash){
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			}

			
			$client->setAvatar($fileName);
			$em->persist($client);
			$em->flush();

		
				$list = array(
					'avatar' => $paths["uploads_path"].$client->getAvatar()
				);

				return new JsonResponse(array('status' => 'success','data' => $list));
		    }else{
				return new JsonResponse(array('status' => 'error'));
			}		
	
	
	}

	/**
     * @Route("/ws/get-passwd-app", name="/ws/get-passwd-app")
     */
    public function getPasswdApp(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		if($data){

			$em = $this->getDoctrine()->getManager();

			$organization = $em->getRepository('AppBundle:Organization')->findOneBy(array("organizationId" =>1));
			
			if($organization){

				if($organization->getPasswdApp()== $data->passwd){

				   return new JsonResponse(array('status' => 'success'));
		         }else{
				    return new JsonResponse(array('status' => 'invalid'));
			     }	
		    }	
	
	}
	  return new JsonResponse(array('data' => "error"));
	}


	/**
     * @Route("/ws/get-search-client", name="/ws/get-search-client")
     */
    public function getSearchClient(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		if($data){

			$em = $this->getDoctrine()->getManager();
			

			$list  = array();

			$client = $em->getRepository('AppBundle:Client')->findOneBy(array("phone" => $data->phone,"register" => 1));
			
			if($client){
				$list = array(
					'client_id'   => $client->getClientId(),
					'client_name' => $client->getName(),
					'phone' => $client->getPhone(),
					'email' => $client->getEmail(),
					'avatar' => $paths["uploads_path"].$client->getAvatar(),
				);

				return new JsonResponse(array('status' => 'success','data' => $list));
		    }else{
				return new JsonResponse(array('status' => 'No está registrado'));
			}		
	
	    }
	  return new JsonResponse(array('data' => "error"));
	}
	
	 /**
     * @Route("/ws/set-delete-service", name="/ws/set-delete-service")
     */
    public function setDeleteService(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$status =$em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 4));
		
			$service->setStatus($status);
			$service->setCreatedAt(new \DateTime());
			$em->persist($service);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	/**
     * @Route("/ws/set-bonus-special", name="/ws/set-bonus-special")
     */
    public function setBonusSpecial(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$status =$em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => $data->bonus));
		
			$service->setStatus($status);
			$service->setCreatedAt(new \DateTime());
			$em->persist($service);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	/**
     * @Route("/ws/get-professional-payment-list", name="/ws/get-professional-payment-list")
     */
    public function getProfessionalPaymentList(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
      
		if($data){

			$em = $this->getDoctrine()->getManager();
			

			$list  = array();
			$listProd= array();
			$date_pay="";

			$payment = $em->getRepository('AppBundle:Payment')->reportPay( $data->prof_id);
			
			if($payment){
				$date_pay= $payment[0]['created_at'];
		  }		
				$reportList = $em->getRepository('AppBundle:SummaryService')->reportListPaymentService($data->prof_id,$date_pay);
				

				foreach($reportList as $sreportBarberer)
				{  $random='Aleatorio';
					$listProd=array();

					$prods=explode(",", $sreportBarberer["services"]);
							foreach($prods as $prod){
								$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
								
								$listProd[] = array(
									'product_id'   => $product->getMenuId(),
									'product_name' => $product->getMenuName(),
									'price' => $product->getPrice()
								);
							}

							if($sreportBarberer["random"] == "n"){
								$random="Seleccionado";
							}

							$orderDetails = $em->getRepository('AppBundle:OrderDetail')->findBy(array("summaryService" => $sreportBarberer['id_summary_service']));
						
						$listOrder=[];
							foreach($orderDetails as $orderdetail){
								$listOrder[] = array(
									'order_id'   => $orderdetail->getOrderDetailId(),
									'quantity' => $orderdetail->getQuantity(),
									'payment_total' => $orderdetail->getPaymentTotal()
								);
							}

										
					$list[] = array(
						'summary_service_id'=> $sreportBarberer['id_summary_service'],
						'client_name'       => $sreportBarberer['client_name'],
						'professional_name' => $sreportBarberer['professional_name'],
						'total_payment'     => $sreportBarberer['total_payment'],
						'tips'              => $sreportBarberer['tips'],
						'method_pay_name'   => $sreportBarberer['method_pay_name'],
						'gain_real'         => $sreportBarberer['gain_real'],
						'percent_PV'        => $sreportBarberer['percent_PV'],
						'tips'              => $sreportBarberer['tips'],
						'minutes_used'      => $sreportBarberer['minutes_used'],
						'created_at'        => $sreportBarberer['created_at'],
						'services'          => $listProd,
						'random'            => $random,
						'gain_factor'       => $sreportBarberer['gain_factor']*100,
						'amount_point_sale' => $sreportBarberer['amount_point_sale'],
						'order_datail'      => $listOrder,
						'service_end'       => $sreportBarberer['service_end'],
						'service_start'     => $sreportBarberer['service_start'],
						'status_id'         => $sreportBarberer['status_id'],
						'status_name'       => $sreportBarberer['status_name'],
						
					);
				}

				
				return new JsonResponse(array('data' => $list));
		// } else{
		// 	return new JsonResponse(array('data' => $list));
		// }
	}
	  return new JsonResponse(array('data' => "error"));
	}

	/**
     * @Route("/ws/get-general-report-range-detail", name="/ws/get-general-report-range-detail")
     */
    public function getGeneralReportRangeDetail(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
      
		if($data){

			$em = $this->getDoctrine()->getManager();
			
			$user=$data->userInfo;
			$list  = array();
			$listProd= array();
			$profId="";

			if($user->rol_id == 2){
				$profId=$user->id;
			}
				
			$reportRangeDetail = $em->getRepository('AppBundle:SummaryService')->reportSummaryRangeDetail($data->date_start,$data->date_end,$profId);
			

			foreach($reportRangeDetail as $sreportBarberer)
			{  $random='Aleatorio';
				$listProd=array();
				$serv_special=0;
				$serv_normal=0;
				$special_total=0;
				$normal_total=0;

				$prods=explode(",", $sreportBarberer["services"]);
						 foreach($prods as $prod){
							$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));

							if($product->getPercentBarber() > 0){
								$serv_special=$serv_special+1;
								$special_total=$special_total+$product->getPrice()*($product->getPercentBarber()*1/100);
							}else{
								$serv_normal=$serv_normal+1;
								$normal_total=$normal_total+$product->getPrice();
							}	
							$listProd[] = array(
								'product_id'   => $product->getMenuId(),
								'product_name' => $product->getMenuName(),
								'product_menu_price' => $product->getPrice()
							);
						 }

						 if($sreportBarberer["random"] == "n"){
							$random="Seleccionado";
						 }

				       				
				$list[] = array(
					'client_name'       => $sreportBarberer['client_name'],
					'professional_name' => $sreportBarberer['professional_name'],
					'total_payment'     => $sreportBarberer['total_payment'],
					'tips'              => $sreportBarberer['tips'],
					'method_pay_name'   => $sreportBarberer['method_pay_name'],
					'gain_real'         => $sreportBarberer['gain_real'],
					'percent_PV'        => $sreportBarberer['percent_PV'],
					'tips'              => $sreportBarberer['tips'],
					'minutes_used'      => $sreportBarberer['minutes_used'],
					'created_at'        => $sreportBarberer['created_at'],
					'services'          => $listProd,
					'random'            => $random,
					'gain_factor'       => $sreportBarberer['gain_factor']*100,
					'amount_point_sale' => $sreportBarberer['amount_point_sale'],
					'product_sale'      => $sreportBarberer['product_sale'],
					'serv_normal'   	=> $serv_normal,
					'normal_total'    	=> $normal_total,
					'serv_special'    	=> $serv_special,
					'special_total'   	=> $special_total
					
				);
			}

			
			return new JsonResponse(array('data' => $list));
	  }
	  return new JsonResponse(array('data' => "error"));
	}

	/**
     * @Route("/ws/get-general-report-detail", name="/ws/get-general-report-detail")
     */
    public function getGeneralReportDetail(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
      
		if(true){

			$em = $this->getDoctrine()->getManager();
			

			$list  = array();
			$listProd= array();
				
			$reportTodayBarber = $em->getRepository('AppBundle:SummaryService')->reportSummaryBarberDetail();
			

			foreach($reportTodayBarber as $sreportBarberer)
			{  $random='Aleatorio';
				$listProd=array();

				$serv_special=0;
				$serv_normal=0;
				$special_total=0;
				$normal_total=0;
				$prods=explode(",", $sreportBarberer["services"]);
						 foreach($prods as $prod){
							$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
							
							if($product->getPercentBarber() > 0){
								$serv_special=$serv_special+1;
								$special_total=$special_total+$product->getPrice()*($product->getPercentBarber()*1/100);
							}else{
								$serv_normal=$serv_normal+1;
								$normal_total=$normal_total+$product->getPrice();
							}	

							$listProd[] = array(
								'product_id'   => $product->getMenuId(),
								'product_name' => $product->getMenuName(),
								'product_menu_price' => $product->getPrice()
							);
						 }

						 if($sreportBarberer["random"] == "n"){
							$random="Seleccionado";
						 }

				       				
				$list[] = array(
					'client_name'       => $sreportBarberer['client_name'],
					'professional_name' => $sreportBarberer['professional_name'],
					'total_payment'     => $sreportBarberer['total_payment'],
					'tips'              => $sreportBarberer['tips'],
					'amount_tips_percent'=> $sreportBarberer['amount_tips_percent'],
					'method_pay_name'   => $sreportBarberer['method_pay_name'],
					'gain_real'         => $sreportBarberer['gain_real']+$sreportBarberer['amount_tips_percent'],
					'percent_PV'        => $sreportBarberer['percent_PV'],
					'minutes_used'      => $sreportBarberer['minutes_used'],
					'created_at'        => $sreportBarberer['created_at'],
					'services'          => $listProd,
					'random'            => $random,
					'gain_factor'       => $sreportBarberer['gain_factor']*100,
					'amount_point_sale' => $sreportBarberer['amount_point_sale'],
					'serv_normal'   	=> $serv_normal,
					'normal_total'    	=> $normal_total,
					'serv_special'    	=> $serv_special,
					'special_total'   	=> $special_total
					
				);
			}

			
			return new JsonResponse(array('data' => $list));
	  }
	  return new JsonResponse(array('data' => "error"));
	}

	
	/**
     * @Route("/ws/get-summary-general-report-range", name="/ws/get-summary-general-report-range")
     */
    public function getSummaryGeneralReportRange(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
      
		if($data){

			$em = $this->getDoctrine()->getManager();
			

			$list  = array();
			$listReportGeneral = array();
			$listBarber= array();
			$listProductsSale= array();
			$serv_special=0;
			$serv_normal=0;
			$special_total=0;
			$normal_total=0;
			$total_washes=0;
				
			$reportRange = $em->getRepository('AppBundle:SummaryService')->reportSummaryGeneralRange($data->date_start,$data->date_end);
			$reportRangeBarber = $em->getRepository('AppBundle:SummaryService')->reportSummaryBarberrange($data->date_start,$data->date_end);
			$reportRangeBarber2  = $em->getRepository('AppBundle:SummaryService')->reportGeneral2($data->date_start,$data->date_end,1);
			$reportRangeProduct = $em->getRepository('AppBundle:SummaryService')->reportSaleProductsRange($data->date_start,$data->date_end);
			$reportRangeCancel = $em->getRepository('AppBundle:SummaryService')->reportSummaryGeneralRangeCancel($data->date_start,$data->date_end);
			$reportWasher = $em->getRepository('AppBundle:TurnWasher')->reportWasherRange($data->date_start,$data->date_end);
			
			$services=explode(",", $reportRange[0]['service']);

						 foreach($services as $serv){
							$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
							
							if($service->getPercentBarber() > 0){
								$serv_special=$serv_special+1;
								$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
							}else{
								$serv_normal=$serv_normal+1;
								$normal_total=$normal_total+$service->getPrice();
							}	
						 }
				
			
			if($reportWasher){
				foreach($reportWasher as $washerRep){
					$total_washes=$total_washes+$washerRep['cant_washes'];

					$listWasher[] = array(
					'cant_washes'      => $washerRep['cant_washes'],
					'washer_name'      => $washerRep['washer_name']
					);
					
				}
			}
		
			
				$listReportGeneral = array(
					'total_payment'      => $reportRange[0]['total_payment'],
					'qty_client'         => $reportRange[0]['qty_client'],
					'qty_service'        => $reportRange[0]['qty_service'],
					'qty_cash'           => $reportRange[0]['qty_cash'],
					'qty_point'          => $reportRange[0]['qty_point'],
					'qty_barber_selected'=> $reportRange[0]['qty_barber_selected'],
					'qty_barber_random'  => $reportRange[0]['qty_barber_random'],
					'tips'               => $reportRange[0]['tips'],
					'avg_minutes_used'   => $reportRange[0]['avg_minutes_used'],
					'first_client'       => $reportRange[0]['first_client'],
					'last_client'        => $reportRange[0]['last_client'],
					'amount_point_sale'  => $reportRange[0]['amount_point_sale'],
					'amount_cash'        => $reportRange[0]['amount_cash'],
					'amount_point'       => $reportRange[0]['amount_point'],
					'amount_product'     => $reportRange[0]['amount_product'],
					'qty_product'        => $reportRange[0]['qty_product'],
					'gain_barber'        => $reportRange[0]['gain_barber']+$special_total,
					'total_total'		 => $reportRange[0]['total_payment']+$reportRange[0]['amount_product']+$reportRange[0]['tips']+$reportRange[0]['total_products'],
					'total_neto'		 => $reportRange[0]['total_payment']+$reportRange[0]['amount_product']+$reportRange[0]['tips']- $reportRange[0]['amount_point_sale'],
					'canceled'           => $reportRangeCancel[0]['cancelados'],
					'deleted'            => $reportRangeCancel[0]['eliminados'],
					'leave_room'		 => $reportRangeCancel[0]['leave_room'],
					'sub_total'			 => $reportRange[0]['total_payment'],
					'serv_special'       => $serv_special,
					'serv_normal' 		 => $serv_normal,
					'normal_total'       => $normal_total,
					'special_total'      => $special_total,
					'total_washes'       => $total_washes
				);
			

				// foreach($reportRangeBarber2 as $rep2){
					
				// 	$services=explode(",", $rep2['services']);
	
				// 	foreach($services as $serv){
				// 		$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
						
				// 		if($service->getPercentBarber() > 0){
				// 			$serv_special=$serv_special+1;
				// 			$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
				// 		}else{
				// 			$serv_normal=$serv_normal+1;
				// 			$normal_total=$normal_total+$service->getPrice();
				// 		}	
				// 	}
				// }

			foreach($reportRangeBarber as $sreportBarberer)
			{  
				$serv_barber=array();
				$serv_normal=0;
			    $serv_special=0;
				$special_total=0;
				$normal_total=0;

				foreach($reportRangeBarber2 as $rep2){
					$serv=explode(",", $rep2['services']);

					foreach($serv_barber as $serv){
						$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
						
						if($service->getPercentBarber() > 0){
							$serv_special=$serv_special+1;
							$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
						}else{
							$serv_normal=$serv_normal+1;
							$normal_total=$normal_total+$service->getPrice();
						}	
					 }

				}

						
				       				
				$listBarber[] = array(
					'total_payment'      => $sreportBarberer['total_payment'],
					'qty_client'         => $sreportBarberer['qty_client'],
					'qty_service'        => $sreportBarberer['qty_service'],
					'qty_cash'           => $sreportBarberer['qty_cash'],
					'qty_point'          => $sreportBarberer['qty_point'],
					'qty_barber_selected'=> $sreportBarberer['qty_barber_selected'],
					'qty_barber_random'  => $sreportBarberer['qty_barber_random'],
					'tips'               => $sreportBarberer['tips'],
					'amount_tips_percent'=> $sreportBarberer['amount_tips_percent'],
					'avg_hour_used'      => $sreportBarberer['avg_hour_used'],
					'first_client'       => $sreportBarberer['first_client'],
					'last_client'        => $sreportBarberer['last_client'],
					'amount_cash'        => $sreportBarberer['amount_cash'],
					'amount_point'       => $sreportBarberer['amount_point'],
					'amount_point_sale'  => $sreportBarberer['amount_point_sale'],
					'professional_id'    => $sreportBarberer['professional_id'],
					'professional_name'  => $sreportBarberer['professional_name'],
					'amount_product'     => $sreportBarberer['amount_product'],
					'qty_product'        => $sreportBarberer['qty_product'],
					'gain_barber'        => $sreportBarberer['gain_barber'],
					'gain_barber_total'  => $sreportBarberer['gain_barber']+$special_total+$sreportBarberer['amount_tips_percent'],
					'gain_factor'        => $sreportBarberer['gain_factor']*100,
					'serv_normal'        => $serv_normal,
					'normal_total'       => $normal_total,
					'serv_special'       => $serv_special,
					'special_total'      => $special_total,
					
				);
			}

			$total_products=0;
			foreach($reportRangeProduct as $saleProductRange)
			{  
				$total_products=$total_products+ $saleProductRange['payment_total'];   				
				$listProductsSale[] = array(
					'product_name'       => $saleProductRange['product_name'],
					'quantity'         => $saleProductRange['quantity'],
					'payment_total'        => $saleProductRange['payment_total']
					
				);
			}

			$list = array(
				'list_general'  => $listReportGeneral,
				'list_x_barber' => $listBarber,
				'list_products' =>$listProductsSale,
				'total_products'=> $total_products,
				'listWasher'    => $listWasher
			);


			
			return new JsonResponse(array('data' => $list));
	  }
	  return new JsonResponse(array('data' => "error"));
	}


	 /**
     * @Route("/ws/get-summary-general-report", name="/ws/get-summary-general-report")
     */
    public function getSummaryGeneralReport(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
      
		if(true){

			$em = $this->getDoctrine()->getManager();
 			

			$list = array(
				'list_general'  => [],
				'list_x_barber' => [],
				'list_products' => [],
				'total_products' => []
			);
			$listReportGeneral = array();
			$listBarber= array();
			$listProductsSale= array();
			$listWasher= array();
			$serv_special=0;
			$serv_normal=0;
			$special_total=0;
			$normal_total=0;
				
			$reportToday = $em->getRepository('AppBundle:SummaryService')->reportSummaryGeneralToday();
			$reportTodayService = $em->getRepository('AppBundle:SummaryService')->reportSummaryGeneralToday2();
			$reportTodayBarber = $em->getRepository('AppBundle:SummaryService')->reportSummaryBarberToday();
			$reportSaleProductToday = $em->getRepository('AppBundle:SummaryService')->reportSaleProductsToday();
			$portTodayCanceled = $em->getRepository('AppBundle:SummaryService')->reportSummaryBarberTodayCancel();
			$reportWasher = $em->getRepository('AppBundle:TurnWasher')->reportWasherToday();
		
		if($reportToday[0]['total_payment']){
			foreach($reportTodayService as $rep2){
				$services=explode(",", $rep2['services']);

				foreach($services as $serv){
					$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
					
					if($service->getPercentBarber() > 0){
						$serv_special=$serv_special+1;
						$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
					}else{
						$serv_normal=$serv_normal+1;
						$normal_total=$normal_total+$service->getPrice();
					}	
				}
			}

			$total_washes=0;
			if($reportWasher){
				foreach($reportWasher as $washerRep){
					$total_washes=$total_washes+$washerRep['cant_washes'];

					$listWasher[] = array(
					'cant_washes'      => $washerRep['cant_washes'],
					'washer_name'      => $washerRep['washer_name']
					);
					
				}
			}
		// 
		// 	$services=explode(",", $reportToday[0]['service']);

		// 				 foreach($services as $serv){
		// 					$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
							
		// 					if($service && $service->getPercentBarber() > 0){
		// 						$serv_special=$serv_special+1;
		// 						$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
		// 					}else{
		// 						$serv_normal=$serv_normal+1;
		// 						$normal_total=$normal_total+$service->getPrice();
		// 					}	
		// 				 }
			
				$listReportGeneral = array(
					'total_payment'      => $reportToday[0]['total_payment'],
					'qty_client'         => $reportToday[0]['qty_client'],
					'qty_service'        => $reportToday[0]['qty_service'],
					'qty_cash'           => $reportToday[0]['qty_cash'],
					'qty_point'          => $reportToday[0]['qty_point'],
					'qty_barber_selected'=> $reportToday[0]['qty_barber_selected'],
					'qty_barber_random'  => $reportToday[0]['qty_barber_random'],
					'tips'               => $reportToday[0]['tips'],
					'avg_minutes_used'   => $reportToday[0]['avg_minutes_used'],
					'first_client'       => $reportToday[0]['first_client'],
					'last_client'        => $reportToday[0]['last_client'],
					'amount_point_sale'  => $reportToday[0]['amount_point_sale'],
					'amount_cash'        => $reportToday[0]['amount_cash'],
					'amount_point'       => $reportToday[0]['amount_point'],
					'amount_product'     => $reportToday[0]['amount_product'],
					'qty_product'        => $reportToday[0]['qty_product'],
					'gain_barber'        => $reportToday[0]['gain_barber']+$special_total,
					'total_total'		 => $reportToday[0]['total_payment']+$reportToday[0]['amount_product']+$reportToday[0]['tips']+$reportToday[0]['total_products'],
					'total_neto'         => $reportToday[0]['total_payment']+$reportToday[0]['amount_product']+$reportToday[0]['tips']- $reportToday[0]['amount_point_sale'],
					'canceled'           => $portTodayCanceled[0]['cancelados'],
					'deleted'            => $portTodayCanceled[0]['eliminados'],
					'leave_room'		 => $portTodayCanceled[0]['leave_room'],
					'sub_total'			 => $reportToday[0]['total_payment'],
					'serv_special'       => $serv_special,
					'serv_normal' 		 => $serv_normal,
					'normal_total'       => $normal_total,
					'special_total'      => $special_total,
					'total_washes'       => $total_washes

				);
			

			
			
			foreach($reportTodayBarber as $sreportBarberer)
			{  
				$serv_barber=array();
				$serv_normal=0;
			    $serv_special=0;
				$special_total=0;
				$normal_total=0;

				$serv_barber=explode(",", $sreportBarberer['service']);

						 foreach($serv_barber as $serv){
							$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
							
							if($service->getPercentBarber() > 0){
								$serv_special=$serv_special+1;
								$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
							}else{
								$serv_normal=$serv_normal+1;
								$normal_total=$normal_total+$service->getPrice();
							}	
						 }
				       				
				$listBarber[] = array(
					'total_payment'      => $sreportBarberer['total_payment'],
					'qty_client'         => $sreportBarberer['qty_client'],
					'qty_service'        => $sreportBarberer['qty_service'],
					'serv_normal'        => $serv_normal,
					'normal_total'       => $normal_total,
					'serv_special'       => $serv_special,
					'special_total'      => $special_total,
					'qty_cash'           => $sreportBarberer['qty_cash'],
					'qty_point'          => $sreportBarberer['qty_point'],
					'qty_barber_selected'=> $sreportBarberer['qty_barber_selected'],
					'qty_barber_random'  => $sreportBarberer['qty_barber_random'],
					'tips'               => $sreportBarberer['tips'],
					'amount_tips_percent'=> $sreportBarberer['amount_tips_percent'],
					'avg_minutes_used'   => $sreportBarberer['avg_minutes_used'],
					'first_client'       => $sreportBarberer['first_client'],
					'last_client'        => $sreportBarberer['last_client'],
					'amount_cash'        => $sreportBarberer['amount_cash'],
					'amount_point'       => $sreportBarberer['amount_point'],
					'professional_id'    => $sreportBarberer['professional_id'],
					'professional_name'  => $sreportBarberer['professional_name'],
					'amount_product'     => $sreportBarberer['amount_product'],
					'qty_product'        => $sreportBarberer['qty_product'],
					'gain_barber'        => $sreportBarberer['gain_barber'],
					'gain_barber_total'  => $sreportBarberer['gain_barber']+$special_total+$sreportBarberer['amount_tips_percent'],
					'amount_point_sale'  => $sreportBarberer['amount_point_sale'],
					'gain_factor'        => $sreportBarberer['gain_factor']*100,
					
				);
			}

			$total_products=0;
			foreach($reportSaleProductToday as $saleProductToday)
			{  
				$total_products=$total_products+ $saleProductToday['payment_total'];   				
				$listProductsSale[] = array(
					'product_name'       => $saleProductToday['product_name'],
					'quantity'         => $saleProductToday['quantity'],
					'payment_total'        => $saleProductToday['payment_total']
					
				);
			}


			$list = array(
				'list_general'  => $listReportGeneral,
				'list_x_barber' => $listBarber,
				'list_products' => $listProductsSale,
				'total_products'=> $total_products,
				'listWasher'    => $listWasher
			);

     
		}	
			return new JsonResponse(array('data' => $list));
	  }
	  return new JsonResponse(array('data' => "error"));
	}

	/**
     * @Route("/ws/set-change-professional", name="/ws/set-change-professional")
     */
    public function setChangeProfessional(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			
			$sumaryService = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));

			if($data->prof_id == 0){
				$sumaryService->setRandom("y");
			}else{
				$sumaryService->setRandom("n");
			}
			$sumaryService->setProfessional($professional);
			$em->persist($sumaryService);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }   

	/**
     * @Route("/ws/get-prof-payment", name="/ws/get-prof-payment")
     */
    public function getProflPayment(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$listProfessional = array();
			$paths = $this->getProjectPaths();
			
			$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			//$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 5));
			
			
				$service = $em->getRepository('AppBundle:SummaryService')->findBy(array("professional" => $professional));
				$listServicesPending= array();
				$listServicesDone= array();
			
					 foreach($service as $list){

						
							$listProd=array();
							$prods=explode(",", $list->getServices());
							foreach($prods as $prod){
								$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
								
								$listProd[] = array(
									'product_id'   => $product->getMenuId(),
									'product_name' => $product->getMenuName(),
									'product_menu_price' => $product->getPrice()
								);
							}

							if($list->getPayoutBarber() =="no"){

								$listServicesPending[] = array(
									'service_id'   => $list->getIdSummaryService(),
									'total' => $list->getTotalPayment(),
									'start' => $list->getServiceStart(),
									'end'  => $list->getServiceEnd(),
									'created_at' => $list->getCreatedAt(),
									'client' => $list->getClient()->getName(),
									'$prods' =>$listProd
								);

							}else{
							
								$listServicesDone[] = array(
									'service_id'   => $list->getIdSummaryService(),
									'total' => $list->getTotalPayment(),
									'start' => $list->getServiceStart(),
									'end'  => $list->getServiceEnd(),
									'created_at' => $list->getCreatedAt(),
									'client' => $list->getClient()->getName(),
									'$prods' =>$listProd
								);
							}

					 }



				$listProfessional = array(
					'professional_id'   => $professional->getId(),
					'professional_name' => $professional->getFirstName()." ".$professional->getLastName(),
					'gain_percent'		=> $professional->getGainFactor(),
					'avatar'            => $paths["uploads_path"].$professional->getAvatarPath(),
					'services_pending'  => $listServicesPending,
					'services_done'     => $listServicesDone
				);
				
			
			 return new JsonResponse(array('status' => 'success','data' => $listProfessional));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	 /**
     * @Route("/ws/set-pay-balance", name="/ws/set-pay-balance")
     */
    public function setPayBalance(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			
			$v_pay = $data->pay;
			$v_balance=$data->balance - $v_pay;
			
			// if ($data->hash){
			// 	$ext    = $data->ext;
			// 	$base64 = $data->hash;
			// 	$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
			// 	$new = "uploads/".$fileName;
			// 	$paths = $this->getProjectPaths();	        
			// 	$decoded = base64_decode($base64);
			// 	file_put_contents($new, $decoded);
			// }

			$payment_report = $em->getRepository('AppBundle:Payment')->reportPay( $data->prof_id);
			$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));

			if ($data->option == "parcial"){


				if($payment_report){
					$payment = $em->getRepository('AppBundle:Payment')->findOneBy(array("paymentId" => $payment_report[0]['payment_id']));

					if($data->pay >= $payment->getAmountPending()){
						$v_pay = $v_pay - $payment->getAmountPending();
						$payment->setAmountPending(0);

						
						}else{
							//$v_pending = $payment->getAmountPending() - $v_pay;
							$payment->setAmountPending(0);
							//$v_balance=$v_balance+$v_pay;
						}
						$em->persist($payment);	
				}

				$payNew = new Payment();
				$payNew->setAmountPay($data->pay);
				$payNew->setAmountPending($v_balance);
				$payNew->setDescription($data->option);
				$payNew->setProfessional($professional);
				$payNew->setCreatedAt(new \DateTime());
				$em->persist($payNew);
				$em->flush();


			}

			if ($data->option == "pending"){
				
				$payment = $em->getRepository('AppBundle:Payment')->findOneBy(array("paymentId" => $payment_report[0]['payment_id']));

				$payment->setAmountPending(0);
				$em->persist($payment);

				$payNew = new Payment();
				$payNew->setAmountPay($data->pay);
				$payNew->setAmountPending($v_balance);
				$payNew->setDescription("");
				$payNew->setProfessional($professional);
				$payNew->setCreatedAt(new \DateTime());
				$em->persist($payNew);
				$em->flush();
			    
			}

			if ($data->option == "total"){
				
				if($payment_report){
					$payment = $em->getRepository('AppBundle:Payment')->findOneBy(array("paymentId" => $payment_report[0]['payment_id']));

					$payment->setAmountPending(0);
					$em->persist($payment);
					
				}

				$payNew = new Payment();
				$payNew->setAmountPay($data->pay);
				$payNew->setAmountPending(0);
				$payNew->setDescription("");
				$payNew->setProfessional($professional);
				$payNew->setCreatedAt(new \DateTime());
				$em->persist($payNew);
				$em->flush();

			}

				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 } 
	
	/**
     * @Route("/ws/get-balance-professional", name="/ws/get-balance-professional")
     */
    public function getBalanceProfessional(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		
		if($data)
		{	$payment_list=array();
			$pending_balance=0;
			$balance_old=0;
			$total_balance=0;
			$balance_old_date="";
			$gain_balance=0;
			$serv_barber=array();
			$serv_normal=0;
			$serv_special=0;
			$special_total=0;
			$normal_total=0;
			$bonus_list=array();
			$cant_serv_bonus=0;
			$total_pay_bonus=0;
			$total_pay_bonus_tax=0;
			$cant_service=0;
			$amount_tips_percent_pend=0;
			$gain_balance_pend=0;
			$cant_service_pend=0;
			$cant_serv_bonus_pend=0;
			$total_pay_bonus_tax_pend=0;
			$balance_special=0;
			$amount_tips_percent=0;

			$payment = $em->getRepository('AppBundle:Payment')->reportPay( $data->prof_id);
			$paymentAll = $em->getRepository('AppBundle:Payment')->findBy(array("professional" => $data->prof_id),array('paymentId' => 'desc'));
		    

			if($payment){
				foreach($paymentAll as $pay){
					$payment_list[] = array(
						'payment_id'     => $pay->getPaymentId(),
						'amount_pay'     => $pay->getAmountPay(),
						'amount_pending' => $pay->getAmountPending(),
						'pay_date'       => $pay->getCreatedAt(),
						'comment'        => $pay->getDescription(),
						'confirmation'   => $pay->getConfirmationPay(),
						'balance_old'	 => $pay->getAmountPay()+$pay->getAmountPending()
					);

				}
				
				$balance_old_date=$payment_list[0]['pay_date'];
				$balance_old=($payment_list[0]['amount_pay']+$payment_list[0]['amount_pending'])*1;
				$pending_balance=$payment[0]['amount_pending'];
				$date_pay= $payment[0]['created_at'];
				
				
				$balance =  $em->getRepository('AppBundle:SummaryService')->reportBalance($data->prof_id,$date_pay);
				$balance_special =  $em->getRepository('AppBundle:SummaryService')->reportBalanceSpecialBonus($data->prof_id,$date_pay);
				
				
				$amount_tips_percent=$balance[0]['amount_tips_percent'];
				$cant_service=$balance[0]['cant_service'];

				if($pending_balance > 0){
					$pay_date_current= $payment_list[0]['pay_date'];
					$pay_date_current=$pay_date_current->format('Y-m-d H:i:s T');
					$pay_date_before= $payment_list[1]['pay_date'];
					$pay_date_before=$pay_date_before->format('Y-m-d H:i:s T');

				//	 var_dump($pay_date_before);
				//	 var_dump($pay_date_current);
				//	 die;

					$item_pending=$em->getRepository('AppBundle:SummaryService')->reportBalancePending($data->prof_id,$pay_date_current,$pay_date_before);
					$gain_balance_pend=$item_pending[0]['total_payment']*$data->gain_factor;
					$amount_tips_percent_pend=$item_pending[0]['amount_tips_percent'];
					$cant_service_pend=$item_pending[0]['cant_service'];
					$cant_serv_bonus_pend=$item_pending[1]['cant_service'];
					$total_pay_bonus_tax_pend=$item_pending[1]['total_payment_tax'];
				}
				
				if($balance[0]['cant_client'] > 0){

					$serv_barber=explode(",", $balance[0]['service']);

						if($serv_barber){
							foreach($serv_barber as $serv){
								$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
								
								if($service && $service->getPercentBarber() > 0){
									$serv_special=$serv_special+1;
									$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
								}else{
									$serv_normal=$serv_normal+1;
									$normal_total=$normal_total+$service->getPrice();
								}	
							}
						}

			
					$total_balance=$balance[0]['total_payment']*$data->gain_factor+$pending_balance;
					$gain_balance=$balance[0]['total_payment']*$data->gain_factor;
				}else{
					$total_balance=$pending_balance;
				}


			}else{
				$balance =  $em->getRepository('AppBundle:SummaryService')->reportBalance($data->prof_id,"");
				
				if($balance){
					$serv_barber=explode(",", $balance[0]['service']);

							foreach($serv_barber as $serv){
								$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
								
								if($service->getPercentBarber() > 0){
									$serv_special=$serv_special+1;
									$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
								}else{
									$serv_normal=$serv_normal+1;
									$normal_total=$normal_total+$service->getPrice();
								}	
							}
					$total_balance=$balance[0]['total_payment']*$data->gain_factor;
					$gain_balance=$total_balance;
				}	
			}


			

			if($balance_special){
				foreach($balance_special as $special){
					
					$bonus_list[] = array(
						// 'cant_clients'      => $special['cant_clients'],
						'total_payment'     => $special['total_payment'],
						'total_payment_tax' => $special['total_payment_tax'],
						'cant_service'      => $special['cant_service'],
						'service'           => $special['service'],
						'amount_tips'       => $special['amount_tips'],
						'nombre_status'	    => $special['nombre_status'],
						'amount_tips_tax'   => $special['amount_tips_tax'],
						'nombre_status'     => $special['nombre_status'],
						'status_id'         => $special['status_id']
					);
					
					$cant_serv_bonus=$cant_serv_bonus+$special['cant_service'];
					$total_pay_bonus=$total_pay_bonus+$special['total_payment'];
					// $total_pay_bonus_tax=$total_pay_bonus_tax+$special['total_payment_tax'];
					$total_pay_bonus_tax=0;	
				}
			}
			
			// Saldo de Propina mensual

			if( !$data->date_from ){
				$created_at = new \DateTime();
				$date_end = date_format($created_at,"Y-m-d");
				$date_start = date_format($created_at,"Y-m");
				$date_start = $date_start."-01";
			}

			$balance_month=$em->getRepository('AppBundle:SummaryService')->reportBalanceMonthBarber($data->prof_id,$date_start,$date_end);


			$list=array();

				$list = array(
					'profesional_id'     => $data->prof_id,
					'cant_client'        => $balance[0]['cant_client'],
					'total_payment'      => $balance[0]['total_payment'],
					'cant_service'       => $cant_service,
					'amount_tips'        => $balance[0]['amount_tips'],
					'amount_tips_percent'=> $balance[0]['amount_tips_percent'], //$amount_tips_percent,
					'amount_deb_cred'    => $balance[0]['amount_pay_deb_cred'],
					'cant_deb_cred'      => $balance[0]['pay_deb_cred'],
					'pending_balance'    => $pending_balance*1,
					//'total_balance'   => $total_balance*1-$balance[0]['amount_pay_deb_cred']+$balance[0]['amount_tips'], MENOS COMISON PUNTO DE VENTA
					'total_balance'      => $total_balance*1+$balance[0]['amount_tips_percent']+$special_total+$total_pay_bonus_tax,
					'min_date'           => $balance[0]['min_date'],
					'max_date'        	 => $balance[0]['max_date'],
					'balance_old'	  	 => $balance_old,
					'balance_old_date'	 => $balance_old_date,
					'gain_balance'    	 => $gain_balance,
					'payment_list'    	 => $payment_list,
					'serv_special'   	 => $serv_special,
					'special_total'   	 => $special_total,
					'serv_normal'        => $serv_normal,
					'normal_total' 		 => $normal_total,
					'cant_serv_bonus'    => $cant_serv_bonus,
					'total_pay_bonus'    => $total_pay_bonus,
					'total_pay_bonus_tax'=> $total_pay_bonus_tax,
					'detail_bonus'       => $bonus_list,
					'amount_tips_percent_pend' => $amount_tips_percent_pend,
					'gain_balance_pend'  =>$gain_balance_pend,
					'cant_service_pend'  => $cant_service_pend,
					'cant_serv_bonus_pend' => $cant_serv_bonus_pend,
					'total_pay_bonus_tax_pend' => $total_pay_bonus_tax_pend,
					'cant_tips_mon'      => $balance_month[0]['cant_tips_mon'],
					'cant_servicio_mon'  => $balance_month[0]['cant_servicio_mon'],
					'amount_tips_mon'    => $balance_month[0]['amount_tips_mon'],
					'amount_tips_percent_mon' => $balance_month[0]['amount_tips_percent_mon'],
					'total_payment_tax_mon' => $balance_month[0]['total_payment_tax_mon'],
					'date_start_mon' => $date_start,
					'date_end_mon' => $date_end
				);
			

			 return new JsonResponse(array('status' => 'success', "data" => $list));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	/**
     * @Route("/ws/get-order-product", name="/ws/get-order-product")
     */
    public function getOrderProduct(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		
		if($data)
		{	
			$order_product = $em->getRepository('AppBundle:OrderDetail')->findBy(array("summaryService" => $data->service_id));
		
			$list=array();
	
			foreach($order_product as $product)
			{	

				$list[] = array(
					'product_id'    => $product->getOrderDetailId(),
					'product_name'  => $product->getProduct()->getProductName(),
					'quantity'      => $product->getQuantity(),
					'total_payment' => $product->getPaymentTotal()*1,
					'product_price'	=> $product->getProduct()->getPrice()
				);
			}

			 return new JsonResponse(array('status' => 'success', "data" => $list));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	
	/**
     * @Route("/ws/get-list-services-done", name="/ws/get-list-services-done")
     */
    public function getListServiceDone(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		
		if($data)
		{	
			$profesional_service = $em->getRepository('AppBundle:SummaryService')->reportDetailDay($data->prof_id,$data->dateDone );
			$profesional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			$gain_factor=$profesional->getGainFactor();
			$list=array();

			
			foreach($profesional_service as $prof)
			{	$random='Aleatorio';
				$listProd=array();
				$serv_special=0;
				$serv_normal=0;
				$special_total=0;
				$normal_total=0;

				$prods=explode(",", $prof["services"]);
						 foreach($prods as $prod){
							$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));

							if($product->getPercentBarber() > 0){
								$serv_special=$serv_special+1;
								$special_total=$special_total+$product->getPrice()*($product->getPercentBarber()*1/100);
							}else{
								$serv_normal=$serv_normal+1;
								$normal_total=$normal_total+$product->getPrice();
							}	
							
							$listProd[] = array(
								'product_id'   => $product->getMenuId(),
								'product_name' => $product->getMenuName(),
								'product_menu_price' => $product->getPrice()
							);
						 }

						 if($prof["random"] == "n"){
							$random="Seleccionado";
						 }

						

					

				$list[] = array(
					'prof_id'            => $prof["professional_id"],
					'service_summary_id' => $prof["id_summary_service"],
					'client_name'        => $prof["client_name"],
					'total_payment'      => $prof["total_payment"],
					'minutes_used'       => $prof["minutes_used"],
					'created_at'         => $prof["created_at"],
					'random'             => $random,
					'services'           => $listProd,
					'gain'               => $prof["total_payment"]*$gain_factor,
					'serv_normal'     	 => $serv_normal,
					'normal_total'   	 => $normal_total,
					'serv_special'   	 => $serv_special,
					'special_total'  	 => $special_total
					
				);
			}

		
			      
       
			 return new JsonResponse(array('status' => 'success', "data" => $list));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	 /**
     * @Route("/ws/set-edit-product", name="/ws/set-edit-product")
     */
    public function setEditProduct(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$active=0;
			$fileName="";

			if ($data->hash){
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			}

			
			$product = $em->getRepository('AppBundle:Product')->findOneBy(array("productId" => $data->product_id));
			$categoryProduct = $em->getRepository('AppBundle:ProductCategory')->findOneBy(array("productCategoryId" => $data->category_id));

			
			if($data->isActive == true){
				$active=1;
			}

			
			$product->setProductName($data->name);
			if ($data->hash){
				$product->setPathImagen($fileName);
			}

			$product->setPrice($data->price);
			$product->setProductCategory($categoryProduct);
			$product->setDescription($data->description);
			$product->setIsActive($active);
			$product->setCreatedAt(new \DateTime());
			$product->setInventoryQuantity($data->quantity);
			$em->persist($product);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }    

	/**
     * @Route("/ws/set-menu-product-new", name="/ws/set-menu-product-new")
     */
    public function setMenuProductNew(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$active=0;
			$fileName="";
		

			if ($data->hash){
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			}

			$categoryProduct = $em->getRepository('AppBundle:ProductCategory')->findOneBy(array("productCategoryId" => $data->category_id));
			
			if($data->isActive == true){
				$active=1;
			}

			$productNew = new Product();
			$productNew->setProductName($data->name);
			$productNew->setProductCategory($categoryProduct);
			$productNew->setInventoryQuantity($data->quantity);
			$productNew->setPathImagen($fileName);
			$productNew->setPrice($data->price);
			$productNew->setDescription($data->description);
			$productNew->setIsActive($active);
			$productNew->setCreatedAt(new \DateTime());
			$em->persist($productNew);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  
	
	/**
     * @Route("/ws/set-delete-product", name="/ws/set-delete-product")
     */
    public function setDeleteProduct(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	

			$product= $em->getRepository('AppBundle:Product')->findOneBy(array("productId" => $data->product_id));
			 //$em->remove($profesional);
			 $product->setIsActive(3);
			 $em->persist($product);
             $em->flush();
			
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	/**
     * @Route("/ws/set-edit-profesional", name="/ws/set-edit-profesional")
     */
    public function setEditProfesional(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$active="INACTIVO";
			$fileName="";

			if ($data->hash){
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			}

			//$menuType = $em->getRepository('AppBundle:MenuType')->findOneBy(array("menuTypeId" => 2));
			//$menuClass = $em->getRepository('AppBundle:MenuClass')->findOneBy(array("menuClassId" => $data->classMenuSelected));
			$profesional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			$userRole = $em->getRepository('AppBundle:UserRole')->findOneBy(array("id" => $data->rol));

			if($data->isActive == true){
				$active="ACTIVO";
			}

			
			$profesional->setFirstName($data->name);
			$profesional->setLastName($data->lastname);
			if ($data->hash){
				$profesional->setAvatarPath($fileName);
				
			}
			$profesional->setGainFactor($data->gain/100);
			$profesional->setBio($data->bio);
			$profesional->setStatus($active);
			$profesional->setEmail($data->email);
			$profesional->setUserOrder($data->order);
			$profesional->setUserRole($userRole);

			if ($data->pass){
				$profesional->setPassword($this->encodePassword($data->pass));
				
			}
			//$menu->setMenuType($menuType);
			$profesional->setCreatedAt(new \DateTime());
			$em->persist($profesional);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }    

	/**
     * @Route("/ws/set-delete-profesional", name="/ws/set-delete-profesional")
     */
    public function setDeleteProfesional(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	

			$profesional= $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			// $em->remove($profesional);
			$profesional->setStatus('ELIMINADO');
			$profesional->setEmail("DEL_".$profesional->getEmail());
			$em->persist($profesional);
            $em->flush();
			
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  


	/**
     * @Route("/ws/set-delete-menu", name="/ws/set-delete-menu")
     */
    public function setDeleteMenu(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	

			$menu= $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $data->menu_id));
			// $em->remove($menu);
			$menu->setIsActive(3);
			$em->persist($menu);
             $em->flush();
			
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	
	 /**
     * @Route("/ws/set-edit-menu", name="/ws/set-edit-menu")
     */
    public function setEditServiceNew(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$active=0;
			$fileName="";

			if ($data->hash){
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			}

			
			$menuType = $em->getRepository('AppBundle:MenuType')->findOneBy(array("menuTypeId" => $data->type));
			$menuClass = $em->getRepository('AppBundle:MenuClass')->findOneBy(array("menuClassId" => $data->classMenuSelected));
			$menu = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $data->menu_id));

			if($data->isActive == true){
				$active=1;
			}

			foreach($data->service_prof as $servProf)
			{   
				
				$menusUser = $em->getRepository('AppBundle:MenusUser')->findOneBy(array("menus" => $menu,"user"=>$servProf->prof_id));
				

				if(  is_null($menusUser) && $servProf->status_service ){
					$user = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $servProf->prof_id));
				
					$menuUserNew = new MenusUser();
					$menuUserNew->setMenus($menu);
					$menuUserNew->setUser($user);
					$menuUserNew->setStatus(1);
					$menuUserNew->setCreatedAt(new \DateTime());
					$em->persist($menuUserNew);
				}elseif(!$servProf->status_service && $menusUser){
					
					$em->remove($menusUser);
				  }
				  

				  $em->flush();
			}
			

			
			$menu->setMenuName($data->name);
			if ($data->hash){
				$menu->setPicturePath($fileName);
			}
			$menu->setPrice($data->price);
			$menu->setDescription($data->description);
			$menu->setIsActive($active);
			$menu->setMenuClass($menuClass);
			$menu->setDuration($data->duration);
			$menu->setMenuType($menuType);
			$menu->setPercentBarber($data->percent_barber);
			$menu->setCreatedAt(new \DateTime());
			$menu->setMenuOrder($data->position);
			$em->persist($menu);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }    


	 

	/**
     * @Route("/ws/set-menu-profesional-new", name="/ws/set-menu-profesional-new")
     */
    public function setMenuProfesionalNew(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$active="INACTIVO";
			
			if( $data->ext){
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			}else{
				$fileName = 'barberlogo.png';
			}
			

			$userRole = $em->getRepository('AppBundle:UserRole')->findOneBy(array("id" => $data->rol));
			$organization = $em->getRepository('AppBundle:Organization')->findOneBy(array("organizationId" => 1));
			
			if($data->isActive == true){
				$active="ACTIVO";
			}

			$userNew = new User();
			$userNew->setFirstName($data->name);
			$userNew->setLastName($data->lastname);
			$userNew->setAvatarPath($fileName);
			$userNew->setBio($data->bio);
			$userNew->setGainFactor($data->gain*1/100);
			$userNew->setStatus($active);
			$userNew->setEmail($data->email);
			$userNew->setPassword($this->encodePassword($data->pass));
			$userNew->setCreatedAt(new \DateTime());
			$userNew->setUserRole($userRole);
			$userNew->setOrganization($organization);
			$userNew->setUserOrder($data->order);
			$em->persist($userNew);
			$em->flush();
				
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }    

	/**
     * @Route("/ws/get-list-profesional", name="/ws/get-get-list-profesional")
     */
    public function getListProfesional(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		//$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		$organizacion_id=1;
		
		if(true)
		{	$list=array();
			$role=array();

			$profesional_menu = $em->getRepository('AppBundle:User')->findBy(array("userRole" => [2,4,5,6], "organization" => $organizacion_id ),array('userOrder'=>'ASC'));
			$roles = $em->getRepository('AppBundle:UserRole')->findBy(array("id" => [2,6]),array('id'=>'ASC'));
			
			foreach($profesional_menu as $prof)
			{  if($prof->getStatus() != 'ELIMINADO'){
				$list[] = array(
					'prof_id'      => $prof->getId(),
					'prof_name'	   => $prof->getFirstName()." ".$prof->getLastName(),
					'estatus_prof' => $prof->getStatus(),
					'bio_prof'     => $prof->getBio(),
					'picture_path' => $paths["uploads_path"].$prof->getAvatarPath(),
					'email'        => $prof->getEmail(),
					'gain_factor'  => $prof->getGainFactor()*100,
					'rol_id'       => $prof->getUserRole()->getId(),
					'order'		   => $prof->getUserOrder()
				);
			  }
			}


			foreach($roles as $rol)
			{  
				$role[] = array(
					'rol_id'      => $rol->getId(),
					'rol_name'	   => $rol->getName()
				);
			}

		

       
			 return new JsonResponse(array('status' => 'success', "data" => $list, 'roles' => $role));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  



	
	/**
     * @Route("/ws/set-menu-service-new", name="/ws/set-menu-service-new")
     */
    public function setMenuServiceNew(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$active=0;
			$ext    = $data->ext;
	        $base64 = $data->hash;
			$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
	        $new = "uploads/".$fileName;
			$paths = $this->getProjectPaths();	        
	       // $new = $paths["uploads_path"].$fileName;
			$decoded = base64_decode($base64);
			file_put_contents($new, $decoded);

			$menuType = $em->getRepository('AppBundle:MenuType')->findOneBy(array("menuTypeId" => $data->type));
			$menuClass = $em->getRepository('AppBundle:MenuClass')->findOneBy(array("menuClassId" => $data->classMenuSelected));
			
			if($data->isActive == true){
				$active=1;
			}

			$menuNew = new Menus();
			$menuNew->setMenuName($data->name);
			$menuNew->setPicturePath($fileName);
			$menuNew->setPrice($data->price);
			$menuNew->setDescription($data->description);
			$menuNew->setIsActive($active);
			$menuNew->setDuration($data->duration);
			$menuNew->setMenuClass($menuClass);
			$menuNew->setMenuType($menuType);
			$menuNew->setPercentBarber($data->percent_barber);
			$menuNew->setCreatedAt(new \DateTime());
			$menuNew->setMenuOrder($data->position);
			$em->persist($menuNew);
			$em->flush();


			foreach($data->service_prof as $servProf)
			{   
				//$menu = $em->getRepository('AppBundle:MenusUser')->findOneBy(array("menus" => $menuNew,"user"=>));
				$user = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $servProf->prof_id));
				if($servProf->status_service){
					$menuUserNew = new MenusUser();
					$menuUserNew->setMenus($menuNew);
					$menuUserNew->setUser($user);
					$menuUserNew->setStatus(1);
					$menuUserNew->setCreatedAt(new \DateTime());
					$em->persist($menuUserNew);
				}
			}
			$em->flush();

			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }    


	/**
     * @Route("/ws/get-list-services", name="/ws/get-list-services")
     */
    public function getListServices(Request $request) {
		
		$em = $this->getDoctrine()->getManager();		
		//$data = json_decode(file_get_contents("php://input"));
		$paths = $this->getProjectPaths();
		
		if(true)
		{   $status="";	
			$list= array();
			$listProfessional=array();

			$services_menu = $em->getRepository('AppBundle:Menus')->findBy(array("menuType" => [2,3,4],"isActive" => [0,1] ),array('menuOrder'=>'ASC'));
			$professionals = $em->getRepository('AppBundle:User')->findBy(array("userRole" => 2,"status" => ['ACTIVO','INACTIVO'] ));

			foreach($professionals as $prof)
			{ 
				if($prof->getId() > 0){
					$listProfessional[] = array(
					'status_service' =>boolval(false),
					'professional'   =>$prof->getFirstName(),
					'prof_id'        =>$prof->getId()
					);
		    	}
			}
	
			foreach($services_menu as $menu)
			{   $listSer=array();

			  	$listProfServ=$em->getRepository('AppBundle:Menus')->getListProfServi(1,$menu->getMenuId());
				
				 foreach($listProfServ as $profSer)
				 { 
				 	$listSer[] = array(
						'status_service' =>boolval($profSer['status_service']),
						'professional'   =>$profSer['professional'],
						'prof_id'        =>$profSer['prof_id']
				     );
				 }

				if($menu->getIsActive()==1){
					$status="Activo";
				}else{
					$status="Inactivo";
				}

				$list[] = array(
					'menu_id'         => $menu->getMenuId(),
					'menu_name'	      => $menu-> getMenuName(),
					'class_menu_id'   => $menu->getMenuClass()->getMenuClassId(),
					'menu_type'		  => $menu->getMenuType()->getMenuTypeId(),
					'class_menu_name' => $menu->getMenuClass()->getMenuClassName(),
					'picture_path'    => $paths["uploads_path"].$menu->getPicturePath(),
					'price'           => $menu->getPrice(),
					'order_menu'      => $menu->getMenuOrder(),
					'percent_barber'  => $menu->getPercentBarber(),
					'is_active'       => $status,
					'description'     => $menu->getDescription(),
					'duration'        => $menu->getDuration(),
					'service_prof'    =>$listSer
				);
			}

			$menu_class = $em->getRepository('AppBundle:MenuClass')->findAll();
				foreach($menu_class as $class)
				{
					$listClass[] = array(
						'menu_class_id'   => $class->getMenuClassId(),
						'menu_class_name' => $class->getMenuClassName()
					);
					
				}

				// if(!$list){
				// 	$list=0;
				// }

       
			 return new JsonResponse(array('status' => 'success', "data" => $list, "data2" => $listClass, 'professionals' => $listProfessional));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  
   	
  
	/**
     * @Route("/ws/get-list-product", name="/ws/get-list-product")
     */
    public function getListProduct(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		//$data = json_decode(file_get_contents("php://input"));
		
		if(true)
		{	$listP=array();
			$listC=array();
			$listCategory=array();

			$paths = $this->getProjectPaths();
			//$products = $em->getRepository('AppBundle:Product')->findAll();
			//$products = $em->getRepository('AppBundle:Product')->findBy(array("isActive" => [0,1] ));
			$products = $em->getRepository('AppBundle:Product')->listProduct('1');
			$consumibles = $em->getRepository('AppBundle:Product')->listProduct('2');
			$productCategory = $em->getRepository('AppBundle:ProductCategory')->findBy(array("status" => 1 ));

			foreach($products as $prod)
			{
				$listP[] = array(
					'product_id'  => $prod['product_id'],
					'produc_id'   => $prod['product_id'],
					'product_name'=> $prod['product_name'],
					'category'    => $prod['category_product'],
					'price'	      => $prod['price'],
					'description' => $prod['description'],
					'imagen_path' => $paths["uploads_path"].$prod['path_imagen'],
					'item_qty'    => 0,
					'exists_qty'  => $prod['inventory_quantity'],
					'is_active'   => $prod['is_active'],
					'quantity'    => 0,
					'discount'    => 0,
					'list_percent'=> array('10','20','30','40','50'),
					'otherPercent' => ""
				);
			}

			foreach($consumibles as $comsu)
			{
				$listC[] = array(
					'product_id'  => $comsu['product_id'],
					'produc_id'   => $comsu['product_id'],
					'product_name'=> $comsu['product_name'],
					'category'    => $comsu['category_product'],
					'price'	      => $comsu['price'],
					'description' => $comsu['description'],
					'imagen_path' => $paths["uploads_path"].$comsu['path_imagen'],
					'item_qty'    => 0,
					'exists_qty'  => $comsu['inventory_quantity'],
					'is_active'   => $comsu['is_active'],
					'quantity'    => 0,
					'discount'    => 0,
					'list_percent'=> array('10','20','30','40','50'),
					'otherPercent' => ""
				);
			}

			foreach($productCategory as $category)
			{
				$listCategory[] = array(
					'product_category_id'  => $category->getProductCategoryId(),
					'produc_category_name'   => $category->getProductCategoryName(),
					'product_category_status'=> $category->getStatus()
				);
			}

			$list = array(
				'productos'   => $listP,
				'consumibles' => $listC,
				'category' => $listCategory
			);
       
			 return new JsonResponse(array('status' => 'success', "data" => $list));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	 /**
     * @Route("/ws/get-menu-professional", name="/ws/get-menu-professional")
     */
    public function getMenuProfessional(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
		$paths = $this->getProjectPaths();
		$listServ= array();
		$list  = array();
	
		$professional  = $em->getRepository('AppBundle:User')->findBy(array("userRole" => 2 ,"status" => 'ACTIVO'),array('userOrder'=>'ASC'));
		$prof_random = $em->getRepository('AppBundle:User')->findOneBy(array("id" => 0 ));
		
		$service = $em->getRepository('AppBundle:SummaryService')->findBy(array("professional" => $prof_random, 'status' => 1));
			
		foreach($service as $serv)
			{
				$listServ[] = array(
					'service_id' => $serv->getIdSummaryService()
				);
			}

			$listProfRandom = array(
				'prof_id'  => $prof_random->getId(),
				'name'	   => $prof_random->getFirstName().' '.$prof_random->getLastName(),
				'bio'	   => $prof_random->getBio(),
				'avatar'   => $paths["uploads_path"].$prof_random->getAvatarPath(),
				'services' => $listServ
			);
		
		foreach($professional as $prof)
		{    
			$listService = array();
			  $service = $em->getRepository('AppBundle:SummaryService')->findBy(array("professional" => $prof, 'status' => 1));
			  foreach($service as $serv)
			  {
				  $listService[] = array(
					  'service_id' => $serv->getIdSummaryService()
				  );
			  }

			$list[] = array(
				'prof_id'  => $prof->getId(),
				'name'	   => $prof->getFirstName().' '.$prof->getLastName(),
				'bio'	   => $prof->getBio(),
				'avatar'   => $paths["uploads_path"].$prof->getAvatarPath(),
				'services' => $listService
			);
		
		}
		
	//	array_push($list, $listProfRandom);
		return new JsonResponse(array('data' => $list, 'random' => $listProfRandom));
		
	}

    /**
     * @Route("/ws/get-menus", name="/ws/get-menus")
     */
    public function getMenus(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
		$type = $em->getRepository('AppBundle:MenuType')->findOneBy(array("menuTypeId" => 1 ));
		$mainMenu = $em->getRepository('AppBundle:Menus')->findBy(array("menuType" => $type ,"isActive" => '1'),array('menuOrder'=>'ASC'));
		$paths = $this->getProjectPaths();

		$list  = array();
		$list1 = array();
		$list2 = array();
		$profs = array();

		foreach($mainMenu as $menu)
		{
			$list1[] = array(
				'menu_id'     => $menu->getMenuId(),
				'name'	      => $menu->getMenuName(),
				'class_id'	  => $menu->getMenuClass()->getMenuClassId(),
				'class_name'  => $menu->getMenuClass()->getMenuClassName(),
				'imagen_path' => $menu->getPicturePath()
			);
		}

		$type = $em->getRepository('AppBundle:MenuType')->findOneBy(array("menuTypeId" => 2 ));
		// $secondMenu = $em->getRepository('AppBundle:Menus')->findBy(array("menuType" => $type ,"isActive" => '1'),array('menuOrder'=>'ASC'));
		$secondMenu = $em->getRepository('AppBundle:Menus')->findBy(array("menuType" => [2,3] ,"isActive" => '1'),array('menuOrder'=>'ASC'));
		$iva = $em->getRepository('AppBundle:ParameterSystem')->findOneBy(array("parameterSystemId" => 3 ));

		foreach($secondMenu as $menu)
		{
			$list2[] = array(
				'menu_id'     => $menu->getMenuId(),
				'name'	      => $menu->getMenuName(),
				'class_id'	  => $menu->getMenuClass()->getMenuClassId(),
				'class_name'  => $menu->getMenuClass()->getMenuClassName(),
				'type_id'     => $menu->getMenuType()->getMenuTypeId(),
				'type_name'   => $menu->getMenuType()->getMenuTypeName(),
				'description' => $menu->getDescription(),
				//'imagen_path' => $menu->getPicturePath(),
				'imagen_path' =>  $paths["uploads_path"].$menu->getPicturePath(),
				'price'       => $menu->getPrice()*$iva->getValue2(),
				'order'       => $menu->getMenuOrder(),
				'color'       => "dark"
				
			);
		
		}

		$professional  = $em->getRepository('AppBundle:User')->findBy(array("userRole" => 2 ,"status" => 'ACTIVO'),array('userOrder'=>'ASC'));
		// var_dump($professional);
		// die; 
		foreach($professional as $prof)
		{    $listService = array();
			  $service = $em->getRepository('AppBundle:SummaryService')->findBy(array("professional" => $prof, 'status' => 1));
			  foreach($service as $serv)
			  {
				  $listService[] = array(
					  'service_id' => $serv->getIdSummaryService()
				  );
			  
			  }
			$profs[] = array(
				'prof_id'  => $prof->getId(),
				'name'	   => $prof->getFirstName().' '.$prof->getLastName(),
				'bio'	   => $prof->getBio(),
				'avatar'   => $paths["uploads_path"].$prof->getAvatarPath(),
				'services' => $listService,
				'order'    => $prof->getUserOrder()
			);
		
		}

		$list = array(
			'main'         => $list1,
			'second'       => $list2,
			'professional' => $profs
		);
		
		return new JsonResponse(array('menus' => $list));
		
	}


	
	/**
     * @Route("/ws/validate-client", name="/ws/validate-client")
     */
    public function validateClient(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
	
		$client="";
		// var_dump($data);
		// 	 die;	
		
		if(false)
		// if($data)
		{	
			$client = $em->getRepository('AppBundle:Client')->findOneBy(array("phone" => $data->phone,"register" => 1));

			if($client){
				return new JsonResponse(array('status' => 'exists'));		
			}else{
				return new JsonResponse(array('status' => 'success'));
			}
		 }
		 //return new JsonResponse(array('status' => 'error'));
		 return new JsonResponse(array('status' => 'success'));
	}		

	/**
     * @Route("/ws/create-services", name="/ws/create-services")
     */
    public function createServices(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		$client="";
		if($data)
		{	
			$client = $em->getRepository('AppBundle:Client')->findOneBy(array("phone" => $data->phone,"register" => 1));

			if($client && !$data->client_id){
				return new JsonResponse(array('status' => 'exists'));		
			}


			if($data->ext){			
				$ext    = $data->ext;
				$base64 = $data->hash;
				$fileName = md5(date("YmdHis")).rand("1000","9000").".".$ext;
				$new = "uploads/".$fileName;
				$paths = $this->getProjectPaths();	        
			// $new = $paths["uploads_path"].$fileName;
				$decoded = base64_decode($base64);
				file_put_contents($new, $decoded);
			 }else{
				$fileName="icons-user.png";
			 }

		

			 if($data->client_id){
				$client_temp=$data->client_id;

			 }else{
				$clientNew = new Client();
				$clientNew->setName($data->name);
				$clientNew->setPhone($data->phone);
				$clientNew->setEmail($data->email);
				$clientNew->setRegister($data->register);
				$clientNew->setPromotion($data->promotion);
				$clientNew->setCreatedAt(new \DateTime());
				$clientNew->setAvatar($fileName);
				$em->persist($clientNew);
				$em->flush();
				$client_temp=$clientNew->getClientId();
			}		

			$prof = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof));
			$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 1));
			$organization = $em->getRepository('AppBundle:Organization')->findOneBy(array("organizationId" => 1));
			$client = $em->getRepository('AppBundle:Client')->findOneBy(array("clientId" => $client_temp));

			// if($client){
			// 	true;
			// }

			
			$products='';    	
			foreach($data->services as $list){
				
				if($products){
					$products = $products.','.$list->menu_id;
				}else{
					$products = $list->menu_id;
				}
			}
			
			 $service = new SummaryService();
			 $service->setTotalPayment($data->total);
			 $service->setClient($client);			
			 $service-> setOrganization($organization);		
			 $service->setProfessional($prof);	
			 $service->setStatus($status);
			 if($products){
				$service->setServices($products);
			 }else{
				$service->setServices("18");
			 }
			 $service->setCreatedAt(new \DateTime());
			 $service->setPayoutBarber('no');
			 $service->setRandom($data->random);			
			 $em->persist($service);
			 $em->flush();			
			 $data = $service->getIdSummaryService();        
		
			 return new JsonResponse(array('status' => 'success','data' => $data));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }    


	 
	 /**
     * @Route("/ws/get-client", name="/ws/get-client")
     */
    public function getClient(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
      
		if($data){

			$user=$data->user;
			$em = $this->getDoctrine()->getManager();
			$paths = $this->getProjectPaths();

			$clientService = $em->getRepository('AppBundle:SummaryService')->findBy(array("professional" => [$user->id,0] , "status" => [1,2,6,7,12,13]), array('idSummaryService'=>'ASC'));
			$reservePending =$em->getRepository('AppBundle:SummaryService')->reservePending($user->id);
			$iva = $em->getRepository('AppBundle:ParameterSystem')->findOneBy(array("parameterSystemId" => 3 ));
			
			$list  = array();
			$listProd = array();
			$listProdMenu = array();
			$lisForApproveReserveToday= array();
			$lisReserveToday = array();

			$productMenu = $em->getRepository('AppBundle:Menus')->findBy(array("menuType" => [2,3],"isActive"=>1));
			foreach($productMenu as $prodM){
				
				$listProdMenu[] = array(
					'product_menu_id'    => $prodM->getMenuId(),
					'product_menu_name'  => $prodM->getMenuName(),
					'product_menu_price' => $prodM->getPrice()*$iva->getValue2()
				);
			}


			foreach($clientService as $serv)
			{  $listProd = [];
				$client = $em->getRepository('AppBundle:Client')->findOneBy(array("clientId" => $serv->getClient()));
				
				$prods=explode(",", $serv->getServices());
				
				
				$today = new \DateTime("now");	
				foreach($prods as $prod){
					$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
					
					$listProd[] = array(
						'product_id'   => $product->getMenuId(),
						'product_name' => $product->getMenuName(),
						'price'		   => $product->getPrice()*$iva->getValue2()
					);
				}
				

				if( $serv->getStatus()->getStatusId() == 1 ||  $serv->getStatus()->getStatusId() == 2 ||  $serv->getStatus()->getStatusId() == 12 ||  $serv->getStatus()->getStatusId() == 13){
					$list[] = array(
						'service_id'    => $serv->getIdSummaryService(),
						'client_id'     => $client->getClientId(),
						'client_name'   => $client->getName(),
						'avatar'	    => $paths["uploads_path"].$client->getAvatar(),
						'products'      => $listProd,
						'service_date'  => $serv->getCreatedAt(),
						'random'        => $serv->getRandom(),
						'date_start'    => $serv->getServiceStart(),
						'date_end'      => $serv->getServiceEnd(),
						'products_menu' => $listProdMenu,
						'schedulet'     => $serv->getScheduledTo(),
						'status_id'		=> $serv->getStatus()->getStatusId()
					);
				}elseif( $serv->getScheduledTo() && $serv->getStatus()->getStatusId() == 7 && date_format($serv->getScheduledTo(),"Y-m-d") == date_format($today,"Y-m-d")){
					
					$lisReserveToday[] = array(
						'service_id'    => $serv->getIdSummaryService(),
						'client_id'     => $client->getClientId(),
						'client_name'   => $client->getName(),
						'client_phone'  => $client->getPhone(),
						'avatar'	    => $paths["uploads_path"].$client->getAvatar(),
						'products'      => $listProd,
						'service_date'  => $serv->getCreatedAt(),
						'random'        => $serv->getRandom(),
						'date_start'    => $serv->getServiceStart(),
						'date_end'      => $serv->getServiceEnd(),
						'schedulet'     => $serv->getScheduledTo(),
						'status_id'		=> $serv->getStatus()->getStatusId()	
					);
				}elseif( $serv->getScheduledTo() && $serv->getStatus()->getStatusId() == 6 && date_format($serv->getScheduledTo(),"Y-m-d") == date_format($today,"Y-m-d")){
					$lisForApproveReserveToday[] = array(
						'service_id'    => $serv->getIdSummaryService(),
						'client_id'     => $client->getClientId(),
						'client_name'   => $client->getName(),
						'client_phone'  => $client->getPhone(),
						'avatar'	    => $paths["uploads_path"].$client->getAvatar(),
						'products'      => $listProd,
						'service_date'  => $serv->getCreatedAt(),
						'random'        => $serv->getRandom(),
						'date_start'    => $serv->getServiceStart(),
						'date_end'      => $serv->getServiceEnd(),
						'schedulet'     => $serv->getScheduledTo(),
						'status_id'		=> $serv->getStatus()->getStatusId()	
					);
					
				}

			}

			$listReserve = array(
				'reserve_for_approve'=>$lisForApproveReserveToday,
				'reserve_today'=>$lisReserveToday,
				'reserve_pending' =>$reservePending[0]['pending']*1,
				'reserve_confirm' =>$reservePending[0]['confirm']*1
			);
				
			
			return new JsonResponse(array('status'=>"success",'data' => $list, 'reserve'=>$lisForApproveReserveToday,'reserve_today'=>$lisReserveToday, 'reserve_list' => $listReserve));
	  }
	  return new JsonResponse(array('data' => "error"));
	}


	/**
     * @Route("/ws/set-start-service", name="/ws/set-start-service")
     */
    public function setStartService(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 2));
			
			if($data->random == "y"){
				$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
				$service->setProfessional($professional);
			}

			$service->setServiceStart(new \DateTime());
			$service->setStatus($status);
			$em->persist($service);
			$em->flush();
            //ACTUALIZA TABLA DE TURNO
			
			$turns = $em->getRepository('AppBundle:TurnProfessional')->findBy(array("profId" => $data->prof_id),array('turnDate' => 'desc'));
			$first=true;

			if($turns){	
				foreach($turns as $turn){
					if($first){
						$turn->setStatus("Ocupado");
						$turn->setTurnDate(new \DateTime());
						$em->persist($turn);
						$first=false;
					}else{
						$em->remove($turn);
					}
				}
			$em->flush();

             }
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }   

	/**
     * @Route("/ws/set-end-service", name="/ws/set-end-service")
     */
    public function setEndtService(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 3));
			$service->setStatus($status );
			$service->setServiceEnd(new \DateTime());
			//$client->setAvatar($avatar);
			$em->persist($service);
			$em->flush();
			//ACTUALIZA TABLA DE TURNO
			$turns = $em->getRepository('AppBundle:TurnProfessional')->findBy(array("profId" => $data->prof_id),array('turnDate' => 'desc'));
			$first=true;
			if($turns){	
				foreach($turns as $turn){
					if($first){
						$turn->setStatus("Disponible");
						$turn->setTurnDate(new \DateTime());
						$em->persist($turn);
						$first=false;
					}else{
						$em->remove($turn);
					}
				}
				$em->flush();
     		 }
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 } 
	 
	/**
     * @Route("/ws/set-cancel-service", name="/ws/set-cancel-service")
     */
    public function setCanceltService(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 4));
			$service->setStatus($status );
			//$service->setServiceEnd(new \DateTime());
			//$client->setAvatar($avatar);

			if(count($data)>1){
				$turn = $em->getRepository('AppBundle:TurnProfessional')->findOneBy(array("profId" => $data->prof_id));
				if($turn){
					$turn->setStatus("Disponible");
					$turn->setTurnDate(new \DateTime());
					$em->persist($turn);
				}
			 }
			$em->persist($service);
			$em->flush();
       
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  
	 
	/**
     * @Route("/ws/set-leave-service", name="/ws/set-leave-service")
     */
    public function setLeaveService(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 9));
			$service->setStatus($status );
			//$service->setServiceEnd(new \DateTime());
			//$client->setAvatar($avatar);

			if(count($data)>1){
				$turn = $em->getRepository('AppBundle:TurnProfessional')->findOneBy(array("profId" => $data->prof_id));
				if($turn){
					$turn->setStatus("Disponible");
					$turn->setTurnDate(new \DateTime());
					$em->persist($turn);
				}
			 }
			$em->persist($service);
			$em->flush();
       
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 } 

	/**
     * @Route("/ws/update-service", name="/ws/update-service")
     */
    public function setUpdatetService(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
			$iva = $em->getRepository('AppBundle:ParameterSystem')->findOneBy(array("parameterSystemId" => 3 ));
			$products='';    	
			foreach($data->service_list as $list){
				
				if($products){
					$products = $products.','.$list->product_id;
				}else{
					$products = $list->product_id;
				}
			}	
		
			//$service->setServiceEnd(new \DateTime());
			//$client->setAvatar($avatar);
			$service->setServices($products);
			$service->setTotalPayment($data->total_price/$iva->getValue2());
			$em->persist($service);
			$em->flush();
       
			 return new JsonResponse(array('status' => 'success'));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  
	 
	
	/**
     * @Route("/ws/get-random-professional", name="/ws/get-random-professional")
     */
    public function getRandomProfessional(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		$professional= array();
		
		if($data)
		{	
			$profSelected = $em->getRepository('AppBundle:User')->getRandomProf($data->organization);	
			
			if(!$profSelected){
				$profSelected = $em->getRepository('AppBundle:User')->getMinProf($data->organization);
			}
		
			$professional= array(
				'profesional_id'    => $profSelected[0]['professional_id'],
				'professional_name' => $profSelected[0]['professional_name']
			);
       
			 return new JsonResponse(array('status' => 'success', 'data' => $professional));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	/**
     * @Route("/ws/get-report-day-prof", name="/ws/get-report-day-prof")
     */
    public function getReportDayProf(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		$report1= array();
		
		
		if($data)
		{	
			$reportPending = array();
			$reportDone = array();
			$reportDairy = $em->getRepository('AppBundle:SummaryService')->reportDay($data->prof_id);
			$prof =  $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));	
			$gainFactor = $prof->getGainFactor();
					
			
		foreach($reportDairy as $list){
			$dayOfWeek="";
			switch (date("l", strtotime($list['created_date']))) {
				case "Monday":
					 $dayOfWeek= "Lunes";
					break;
				case "Tuesday":
					$dayOfWeek= "Martes";
					break;
				case "Wednesday":
					$dayOfWeek= "Miércoles";
					break;
				case "Thursday":
					$dayOfWeek= "Jueves";
					break;
				case "Friday":
					$dayOfWeek= "Viernes";
					break;
				case "Saturday":
					$dayOfWeek= "Sábado";
					break;
				case "Sunday":
					$dayOfWeek= "Domingo";
					break;
			}


			$serv_special=0;
			$serv_normal=0;
			$special_total=0;
			$normal_total=0;

	           $services=explode(",", $list['service']);

				foreach($services as $serv){
				$service = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $serv));
				
					if($service->getPercentBarber() > 0){
						$serv_special=$serv_special+1;
						$special_total=$special_total+$service->getPrice()*($service->getPercentBarber()*1/100);
					}else{
						$serv_normal=$serv_normal+1;
						$normal_total=$normal_total+$service->getPrice();
					}	
				}

		
			if( true ){	
			//if( $list['payout_barber'] == "no" ){	
				$reportPending[] = array(
					//'week_day_en'        => date("l", strtotime($list['created_date'])), 
					'week_day'     =>$dayOfWeek,
					'created_date'    => $list['created_date'],
					'attended_client' => $list['attended_client'],
					'service_count'   => $list['service_count'],
					'generated_total' => $list['generated_total'],
					'selected_count'  => $list['selected_count'],
					'random_count'    => $list['random_count'],
					'gain_total'	  => $list['generated_total']*$gainFactor+$special_total,
					'serv_normal'     => $serv_normal,
					'normal_total'    => $normal_total,
					'serv_special'    => $serv_special,
					'special_total'   => $special_total
				);
		    }else{
				$reportDone[] = array(
					///'week_day_en'        => date("l", strtotime($list['created_date'])), 
					'week_day'     =>$dayOfWeek,
					'created_date'    => $list['created_date'],
					'attended_client' => $list['attended_client'],
					'service_count'   => $list['service_count'],
					'generated_total' => $list['generated_total'],
					'selected_count'  => $list['selected_count'],
					'random_count'    => $list['random_count'],
					'payout_date'     => $list['payout_date'],
					'gain_total'	  => $list['generated_total']*$gainFactor
				);

			}
		}
		     
		  $report1 = array(
			'report_pending' => $reportPending,
			'report_done'    => $reportDone
		  );
			 return new JsonResponse(array('status' => 'success', 'data' => $report1));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }
	 

	 /**   NUEVO
     * @Route("/ws/get-client-payment", name="/ws/get-client-payment")
     */
    public function getClientPayment(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		$listClient= array();
		$paths = $this->getProjectPaths();
		
		
		if($data)
		{	
			$clientComplete="";
			$clientPending="";
			$clientPayout=array();
			$listMethodPay=array();
			$listProfesionales=array();
            $listPending=array();
            $listComplete=array();
			$listPayout=array();
			$listBooking=array();
			
		$profesionales = $em->getRepository('AppBundle:User')->findBy(array("status" => ['ACTIVO','INACTIVO'],"userRole" => 2));
		foreach($profesionales as $prof){
			
			$listProfesionales[] = array(
				'prof_id'    => $prof->getId(),
				'prof_name'  => $prof->getFirstName().' '.$prof->getLastName()
			);
		}

        $method_payment= $em->getRepository('AppBundle:MethodPayment')->findBy(array("isActive" => 1 ));
		foreach($method_payment as $method){
			
			$listMethodPay[] = array(
				'method_id'      => $method->getMethodPaymentId(),
				'method_name'    => $method->getName(),
				'description'    => $method->getDescription(),
				'method_percent' => $method->getPercent()
			);
		}


        $clientPending = $em->getRepository('AppBundle:SummaryService')->getListPaymentServices($data->organization_id,'1,2,12,13');
        $clientComplete = $em->getRepository('AppBundle:SummaryService')->getListPaymentServices($data->organization_id,3);
        $clientPayout = $em->getRepository('AppBundle:SummaryService')->getListPaymentServices($data->organization_id,5);
		$clientBooking = $em->getRepository('AppBundle:SummaryService')->getListPaymentServices($data->organization_id,6);
		$ReserveAll = $em->getRepository('AppBundle:SummaryService')->getListReserveConfirm($data->organization_id,'1,7',"all");
		$ReserveToday = $em->getRepository('AppBundle:SummaryService')->getListReserveConfirm($data->organization_id,'1,7',"today");
		$iva = $em->getRepository('AppBundle:ParameterSystem')->findOneBy(array("parameterSystemId" => 3 ));
        
        foreach($clientPending as $pending){
            $listProd=array();

            $prods=explode(",", $pending['products']);
			
			//Corregir cuando el campo services viene vacio
			if( !empty($prods[0]) ){
		
				// $prods[0]=18;	
				// $summaServices = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $pending['service_id']));
				// $summaServices->setServices(18);
				// $em->persist($summaServices);
			    // $em->flush();
			

				foreach($prods as $prod){
					$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));

					$listProd[] = array(
						'product_id'         => $product->getMenuId(),
						'product_name'       => $product->getMenuName(),
						'product_menu_price' => $product->getPrice()*$iva->getValue2()
					);
				}
            
            	$listPending[] = array(
                    'service_id'    	=> $pending['service_id'],
                    'client_id'     	=> $pending['client_id'],
                    'client_name'   	=> $pending['client_name'],
                    'avatar'	    	=> $paths["uploads_path"].$pending['avatar'],
                    'products'      	=> $listProd,
                    'service_date'  	=> $pending['service_date'],
                    'professional_id'	=> $pending['professional_id'],
                    'professional_name' => $pending['professional_name'],
                    'total'  			=> $pending['total']*$iva->getValue2(),
                    'start'  			=> $pending['service_start'],
                    'end'    			=> $pending['service_end'],
					'schedulet'         => $pending['scheduled_to'],
					'organization_id'   => $pending['organization_id'],
					'status_id'			=> $pending['status_id']
                );
			
			}

        }

        foreach($clientComplete as $complete){
            $listProd=array();

            $prods=explode(",", $complete['products']);
					
				foreach($prods as $prod){
					$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
	
					$listProd[] = array(
						'product_id'   => $product->getMenuId(),
						'product_name' => $product->getMenuName(),
						'product_menu_price' => $product->getPrice()*$iva->getValue2()
					);
				}
            
            	$listComplete[] = array(
                    'service_id'    	=> $complete['service_id'],
                    'client_id'     	=> $complete['client_id'],
                    'client_name'   	=> $complete['client_name'],
                    'avatar'	    	=> $paths["uploads_path"].$complete['avatar'],
                    'products'      	=> $listProd,
                    'service_date'  	=> $complete['service_date'],
                    'professional_id'	=> $complete['professional_id'],
                    'professional_name' => $complete['professional_name'],
                    'total'  			=> $complete['total']*$iva->getValue2(),
                    'start'  			=> $complete['service_start'],
                    'end'    			=> $complete['service_end'],
					'schedulet'         => $complete['scheduled_to'],
					'organization_id'   => $complete['organization_id'],
					'status_id'			=> $complete['status_id']
                );

        }


		foreach($clientPayout as $payout){
            $listProd=array();

            $prods=explode(",", $payout['products']);
					
				foreach($prods as $prod){
					$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
	
					$listProd[] = array(
						'product_id'   => $product->getMenuId(),
						'product_name' => $product->getMenuName(),
						'product_menu_price' => $product->getPrice()*$iva->getValue2()
					);
				}
            
            	$listPayout[] = array(
                    'service_id'    	=> $payout['service_id'],
                    'client_id'     	=> $payout['client_id'],
                    'client_name'   	=> $payout['client_name'],
                    'avatar'	    	=> $paths["uploads_path"].$payout['avatar'],
                    'products'      	=> $listProd,
                    'service_date'  	=> $payout['service_date'],
                    'professional_id'	=> $payout['professional_id'],
                    'professional_name' => $payout['professional_name'],
                    'total'  			=> $payout['total']*$iva->getValue2(),
                    'start'  			=> $payout['service_start'],
                    'end'    			=> $payout['service_end'],
					'method_pay_id'     => $payout['method_payment'],
					'method_pay_name'   => $payout['method_pay_name'],
					'method_pay_percent'=> $payout['percent'],
					'discount_pointsale'=> $payout['discount_pointsale'],
					'tips'			    => $payout['tips'],
					'schedulet'         => $payout['scheduled_to'],
					'organization_id'   => $payout['organization_id'],
					'status_id'			=> $payout['status_id']
                );

        }

		foreach($clientBooking as $booking){
            $listProd=array();

            $prods=explode(",", $booking['products']);
					
				foreach($prods as $prod){
					$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
	
					$listProd[] = array(
						'product_id'   => $product->getMenuId(),
						'product_name' => $product->getMenuName(),
						'product_menu_price' => $product->getPrice()*$iva->getValue2()
					);
				}
            
            	$listBooking[] = array(
                    'service_id'    	=> $booking['service_id'],
                    'client_id'     	=> $booking['client_id'],
                    'client_name'   	=> $booking['client_name'],
                    'avatar'	    	=> $paths["uploads_path"].$booking['avatar'],
                    'products'      	=> $listProd,
                    'service_date'  	=> $booking['service_date'],
                    'professional_id'	=> $booking['professional_id'],
                    'professional_name' => $booking['professional_name'],
                    'total'  			=> $booking['total']*$iva->getValue2(),
                    'start'  			=> $booking['service_start'],
                    'end'    			=> $booking['service_end'],
					'schedulet'         => $booking['scheduled_to'],
					'phone'				=> $booking['phone'],
					'email'             => $booking['email'],
					'organization_id'   => $booking['organization_id'],
					'status_id'			=> $booking['status_id']
                );
        }

		// $listReservegAll=array();
		// foreach($ReserveAll as $bookingAll){
        //     $listProd=array();

        //     $prods=explode(",", $bookingAll['products']);
					
		// 		foreach($prods as $prod){
		// 			$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
	
		// 			$listProd[] = array(
		// 				'product_id'   => $product->getMenuId(),
		// 				'product_name' => $product->getMenuName(),
		// 				'product_menu_price' => $product->getPrice()
		// 			);
		// 		}
            
        //     	$listReservegAll[] = array(
        //             'service_id'    	=> $bookingAll['service_id'],
        //             'client_id'     	=> $bookingAll['client_id'],
        //             'client_name'   	=> $bookingAll['client_name'],
        //             'avatar'	    	=> $paths["uploads_path"].$bookingAll['avatar'],
        //             'products'      	=> $listProd,
        //             'service_date'  	=> $bookingAll['service_date'],
        //             'professional_id'	=> $bookingAll['professional_id'],
        //             'professional_name' => $bookingAll['professional_name'],
        //             'total'  			=> $bookingAll['total'],
        //             'start'  			=> $bookingAll['service_start'],
        //             'end'    			=> $bookingAll['service_end'],
		// 			'schedulet'         => $bookingAll['scheduled_to'],
		// 			'phone'				=> $bookingAll['phone'],
		// 			'email'             => $bookingAll['email'],
		// 			'organization_id'   => $bookingAll['organization_id'],
		// 			'status_id'			=> $bookingAll['status_id']
        //         );
        // }

		$listReservegToday=array();
		foreach($ReserveToday as $bookingToday){
            $listProd=array();

            $prods=explode(",", $bookingToday['products']);
					
				foreach($prods as $prod){
					$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
	
					$listProd[] = array(
						'product_id'   => $product->getMenuId(),
						'product_name' => $product->getMenuName(),
						'product_menu_price' => $product->getPrice()*$iva->getValue2()
					);
				}
            
            	$listReservegToday[] = array(
                    'service_id'    	=> $bookingToday['service_id'],
                    'client_id'     	=> $bookingToday['client_id'],
                    'client_name'   	=> $bookingToday['client_name'],
                    'avatar'	    	=> $paths["uploads_path"].$bookingToday['avatar'],
                    'products'      	=> $listProd,
                    'service_date'  	=> $bookingToday['service_date'],
                    'professional_id'	=> $bookingToday['professional_id'],
                    'professional_name' => $bookingToday['professional_name'],
                    'total'  			=> $bookingToday['total']*$iva->getValue2(),
                    'start'  			=> $bookingToday['service_start'],
                    'end'    			=> $bookingToday['service_end'],
					'schedulet'         => $bookingToday['scheduled_to'],
					'phone'				=> $bookingToday['phone'],
					'email'             => $bookingToday['email'],
					'organization_id'   => $bookingToday['organization_id'],
					'status_id'			=> $bookingToday['status_id']
                );
        }
	
	
		$listClient = array(
			'pending'       => $listPending,
			'complete'      => $listComplete,
			'payout'        => $listPayout,
			'method_pay'    => $listMethodPay,
			'profesionales' => $listProfesionales,
			'booking'       => $listBooking,
			'reserves_all'  => count($ReserveAll)+count($ReserveToday),//$listReservegAll,
			'reserves_today'=> $listReservegToday
		  );
       
			 return new JsonResponse(array('status' => 'success', 'data' => $listClient));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }
	 
	/**
     * @Route("/ws/get-client-payment_old", name="/ws/get-client-payment_old")
     */
    public function getClientPayment_old(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		$listClient= array();
		$paths = $this->getProjectPaths();
		
		
		if($data)
		{	
			$clientComplete="";
			$clientPending="";
			$clientPayout=array();
			$listMethodPay=array();
			$listProfesionales=array();
			
		$profesionales = $em->getRepository('AppBundle:User')->findBy(array("status" => 'ACTIVO',"userRole" => 2));
		foreach($profesionales as $prof){
			
			$listProfesionales[] = array(
				'prof_id'    => $prof->getId(),
				'prof_name'  => $prof->getFirstName().' '.$prof->getLastName()
			);
		}
		$clientPayment = $em->getRepository('AppBundle:SummaryService')->findBy(array("organization" => $data->organization_id));			
		
		$method_payment= $em->getRepository('AppBundle:MethodPayment')->findBy(array("isActive" => 1 ));
		foreach($method_payment as $method){
			
			$listMethodPay[] = array(
				'method_id'    => $method->getMethodPaymentId(),
				'method_name'  => $method->getName(),
				'description' => $method->getDescription(),
				'method_percent' => $method->getPercent()
			);
		}

		foreach($clientPayment as $list){
			$listProd=array();
			
			$client = $em->getRepository('AppBundle:Client')->findOneBy(array("clientId" => $list->getClient()));
			$prof = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $list->getProfessional()));
				
				$prods=explode(",", $list->getServices());
				
			
				foreach($prods as $prod){
					$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
					
				
	
					$listProd[] = array(
						'product_id'   => $product->getMenuId(),
						'product_name' => $product->getMenuName(),
						'product_menu_price' => $product->getPrice()
					);
				}
		
			

				if($list->getStatus()->getStatusId() == 1){
					
					$clientPending[] = array(
						'service_id'    	=> $list->getIdSummaryService(),
						'client_id'     	=> $client->getClientId(),
						'client_name'   	=> $client->getName(),
						'avatar'	    	=> $paths["uploads_path"].$client->getAvatar(),
						'products'      	=> $listProd,
						'service_date'  	=> $list->getCreatedAt(),
						'professional_id'	=> $prof->getId(),
						'professional_name' => $prof->getFirstName()." ".$prof->getLastName(),
						'total'  			=> $list->getTotalPayment(),
						'start'  			=> $list->getServiceStart(),
						'end'    			=> $list->getServiceEnd()
					);
				}

				if($list->getStatus()->getStatusId() == 3){
					
					$clientComplete[] = array(
						'service_id'    	=> $list->getIdSummaryService(),
						'client_id'     	=> $client->getClientId(),
						'client_name'   	=> $client->getName(),
						'avatar'	    	=> $paths["uploads_path"].$client->getAvatar(),
						'products'      	=> $listProd,
						'service_date'  	=> $list->getCreatedAt(),
						'professional_id'	=> $prof->getId(),
						'professional_name' => $prof->getFirstName()." ".$prof->getLastName(),
						'total'  			=> $list->getTotalPayment(),
						'start'  			=> $list->getServiceStart(),
						'end'    			=> $list->getServiceEnd()
					);
					
				}
				// if($list->getStatus()->getStatusId() == 5){
				// 	$method_pay = $em->getRepository('AppBundle:MethodPayment')->findOneBy(array("methodPaymentId" => $list->getMethodPayment()));
				// 	$clientPayout[] = array(
				// 		'service_id'    	=> $list->getIdSummaryService(),
				// 		'client_id'     	=> $client->getClientId(),
				// 		'client_name'   	=> $client->getName(),
				// 		'avatar'	    	=> $paths["uploads_path"].$client->getAvatar(),
				// 		'products'      	=> $listProd,
				// 		'service_date'  	=> $list->getCreatedAt(),
				// 		'professional_id'	=> $prof->getId(),
				// 		'professional_name' => $prof->getFirstName()." ".$prof->getLastName(),
				// 		'total'  			=> $list->getTotalPayment(),
				// 		'start'  			=> $list->getServiceStart(),
				// 		'end'    			=> $list->getServiceEnd(),
				// 		'method_pay_id'     => $method_pay->getMethodPaymentId(),
				// 		'method_pay_name'   => $method_pay->getName(),
				// 		'method_pay_percent'=> $method_pay->getPercent(),
				// 		'discount_pointsale'=> $list->getTotalPayment()*$method_pay->getPercent(),
				// 		'tips'			    => $list->getTips()
				// 	);
				// }


		}

		$clientPayouts = $em->getRepository('AppBundle:SummaryService')->findBy(array("organization" => $data->organization_id,"status" => 5),array('idSummaryService' => 'desc'));
		$date2="";
       if(false){
		foreach($clientPayouts as $listP){
			$listProdP=array();
			$client = $em->getRepository('AppBundle:Client')->findOneBy(array("clientId" => $listP->getClient()));
			$prof = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $listP->getProfessional()));
			
			$date2=$listP->getCreatedAt();
			$prods=explode(",", $listP->getServices());
				
			
				foreach($prods as $prod){
					$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
					
					$listProdP[] = array(
						'product_id'   => $product->getMenuId(),
						'product_name' => $product->getMenuName(),
						'product_menu_price' => $product->getPrice()
					);
				}
			$method_pay = $em->getRepository('AppBundle:MethodPayment')->findOneBy(array("methodPaymentId" => $listP->getMethodPayment()));
			
			 if($listP->getCreatedAt()->format('Y-m-d') == date('Y-m-d', time())){
			    $clientPayout[] = array(
					'service_id'    	=> $listP->getIdSummaryService(),
					'client_id'     	=> $client->getClientId(),
					'client_name'   	=> $client->getName(),
					'avatar'	    	=> $paths["uploads_path"].$client->getAvatar(),
					'products'      	=> $listProdP,
					'service_date'  	=> $listP->getCreatedAt(),
					'professional_id'	=> $prof->getId(),
					'professional_name' => $prof->getFirstName()." ".$prof->getLastName(),
					'total'  			=> $listP->getTotalPayment(),
					'start'  			=> $listP->getServiceStart(),
					'end'    			=> $listP->getServiceEnd(),
					'method_pay_id'     => $method_pay->getMethodPaymentId(),
					'method_pay_name'   => $method_pay->getName(),
					'method_pay_percent'=> $method_pay->getPercent(),
					'discount_pointsale'=> $listP->getTotalPayment()*$method_pay->getPercent(),
					'tips'			    => $listP->getTips()
				);
			 }	
		}
     }

		// $date = date('Y-m-d', time());
		// $date3 = $date2->format('Y-m-d');
		$listClient = array(
			'pending'    => $clientPending,
			'complete'   => $clientComplete,
			'payout'     => $clientPayout,
			'method_pay' =>$listMethodPay,
			'profesionales' => $listProfesionales
		  );
       
			 return new JsonResponse(array('status' => 'success', 'data' => $listClient));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }


	 /**
     * @Route("/ws/set-complete-pay", name="/ws/set-complete-pay")
     */
    public function setCompletePay(Request $request) {
		
		
		// if ($request->getMethod() == 'POST') 
		// {
			
				$em = $this->getDoctrine()->getManager();		
				$data = json_decode(file_get_contents("php://input"));
		//	var_dump($data);
			

				if($data)
				{	
					$product=$data->prodSelected;
					$service = $em->getRepository('AppBundle:SummaryService')->findOneBy(array("idSummaryService" => $data->service_id));
					$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 5));
					//$method_pay = $em->getRepository('AppBundle:MethodPayment')->findOneBy(array("methodPaymentId" => $data->method_pay));
							
					
					//$service->setServiceEnd(new \DateTime());
					//$client->setAvatar($avatar);
					$service->setStatus($status);
					$service->setMethodPayment($data->method_pay);
					$service->setTips($data->amount_tip);
					$em->persist($service);
					$em->flush();

					if($product){
							
						foreach($product as $prod){
							$OneProduct = $em->getRepository('AppBundle:Product')->findOneBy(array("productId" => $prod->product_id));
							
							$OneProduct->setInventoryQuantity($OneProduct->getInventoryQuantity()-$prod->item_qty);
							
							$orderDetail = $em->getRepository('AppBundle:OrderDetail')->findOneBy(array("summaryService" => $data->service_id,"product"=>$prod->product_id));
							
							if($orderDetail){
								$orderDetail->setQuantity($prod->item_qty);
								$orderDetail->setPaymentTotal($prod->total);
								$em->persist($orderDetail);	
							}
							else{
								$order = new OrderDetail();
								$order->setQuantity($prod->item_qty);
								$order->setPaymentTotal($prod->total);			
								$order->setStatus(1);		
								$order->setCreatedAt(new \DateTime());	
								$order->setProduct($OneProduct);
								$order->setSummaryService($service);
								$order->setClientId($service->getClient()->getClientId());	 			
								$em->persist($order);
						    }
							$em->flush();			
						}
					}

					return new JsonResponse(array('status' => 'success'));									 
				}
				
				return new JsonResponse(array('status' => 'error'));
	//		}	
	 }   


	/**
     * @Route("/ws/get-professional-pay", name="/ws/get-professional-pay")
     */
    public function getProfessionalPay(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	$listProfessional = array();
			$paths = $this->getProjectPaths();
			
			$professional = $em->getRepository('AppBundle:User')->findBy(array("organization" => $data->organization_id,"userRole"=>2 ,"status" => ["ACTIVO","INACTIVO"]));
			//$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 5));
			
			foreach($professional as $listProf){

				//$service = $em->getRepository('AppBundle:SummaryService')->findBy(array("professional" => $listProf,"status" => 5));
				$listServicesPending= array();
				$listServicesDone= array();
			
					//  foreach($service as $list){

						
					// 		$listProd=array();
					// 		$prods=explode(",", $list->getServices());
					// 		foreach($prods as $prod){
					// 			$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
								
					// 			$listProd[] = array(
					// 				'product_id'   => $product->getMenuId(),
					// 				'product_name' => $product->getMenuName(),
					// 				'product_menu_price' => $product->getPrice()
					// 			);
					// 		}

							// if($list->getPayoutBarber() =="no"){

							// 	$listServicesPending[] = array(
							// 		'service_id'   => $list->getIdSummaryService(),
							// 		'total' => $list->getTotalPayment(),
							// 		'start' => $list->getServiceStart(),
							// 		'end'  => $list->getServiceEnd(),
							// 		'created_at' => $list->getCreatedAt(),
							// 		'client' => $list->getClient()->getName(),
							// 		'$prods' =>$listProd
							// 	);

							// }else{
							
							// 	$listServicesDone[] = array(
							// 		'service_id'   => $list->getIdSummaryService(),
							// 		'total' => $list->getTotalPayment(),
							// 		'start' => $list->getServiceStart(),
							// 		'end'  => $list->getServiceEnd(),
							// 		'created_at' => $list->getCreatedAt(),
							// 		'client' => $list->getClient()->getName(),
							// 		'$prods' =>$listProd
							// 	);
							// }

					// }



				$listProfessional[] = array(
					'professional_id'   => $listProf->getId(),
					'professional_name' => $listProf->getFirstName()." ".$listProf->getLastName(),
					'gain_percent'		=> $listProf->getGainFactor(),
					'order'				=> $listProf->getUserOrder(),
					'avatar'            => $paths["uploads_path"].$listProf->getAvatarPath(),
					// 'services_pending'  => $listServicesPending,
					// 'services_done'     => $listServicesDone
				);
				
			}
			$order = array_column($listProfessional, 'order');

             array_multisort($order, SORT_ASC, $listProfessional);

			 return new JsonResponse(array('status' => 'success','data' => $listProfessional));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	
	/**
     * @Route("/ws/get-professional-report", name="/ws/get-professional-report")
     */
    public function getProfessionalReport(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	

			$professional = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $data->prof_id));
			//$status = $em->getRepository('AppBundle:Status')->findOneBy(array("statusId" => 5));
			$gainFactor = $professional->getGainFactor();
			
				$service = $em->getRepository('AppBundle:SummaryService')->findBy(array("professional" => $data->prof_id));
				$reportDay = $em->getRepository('AppBundle:SummaryService')->reportDay($data->prof_id);

				$listServices = array();
				$listReports = array();
				
			
					 foreach($service as $list){
						$listProd=array();
					 	$prods=explode(",", $list->getServices());
						 foreach($prods as $prod){
							$product = $em->getRepository('AppBundle:Menus')->findOneBy(array("menuId" => $prod));
							
							$listProd[] = array(
								'product_id'   => $product->getMenuId(),
								'product_name' => $product->getMenuName(),
								'product_menu_price' => $product->getPrice()
							);
						 }

					 	$listServices[] = array(
					 		'service_id'   => $list->getIdSummaryService(),
					 		'total'        => $list->getTotalPayment(),
					 		'start'        => $list->getServiceStart(),
					 		'end'          => $list->getServiceEnd(),
					 		'created_at'   => $list->getCreatedAt(),
					 		'client'       => $list->getClient()->getName(),
					 		'$prods'       =>$listProd
					 	);
					 }
					 
					
					 $listReportPending = array();
					 $listReportDone = array();
					
					 foreach($reportDay as $report){
						
						
						if( $report['payout_barber'] == 'no' ){

							$listReportPending[] = array(

								'created_date'    => $report['created_date'],
								'attended_client' => $report['attended_client'],
								'service_count'   => $report['service_count'],
								'generated_total' => $report['generated_total'],
								'selected_count'  => $report['selected_count'],
								'random_count'    => $report['random_count'],
								'payout_date'     => $report['payout_date'],
								'gain_total'	  => $report['generated_total']*$gainFactor,
								'services_id'     => $report['services_id']
							);
						}else{

							$listReportDone[] = array(
								'created_date'    => $report['created_date'],
								'attended_client' => $report['attended_client'],
								'service_count'   => $report['service_count'],
								'generated_total' => $report['generated_total'],
								'selected_count'  => $report['selected_count'],
								'random_count'    => $report['random_count'],
								'payout_date'     => $report['payout_date'],
								'gain_total'	  => $report['generated_total']*$gainFactor,
								'services_id'     => $report['services_id']
							);
						}
					}


					$listReports = array(
						'list_services'       => $listServices,
						'list_report_pending' => $listReportPending,
						'list_report_done'    => $listReportDone
					);
				
			
			 return new JsonResponse(array('status' => 'success','data' => $listReports));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }  

	 
	 	 /**
     * @Route("/ws/set-payout-professional", name="/ws/set-payout-professional")
     */
    public function setPayoutProfessional(Request $request) {
		
		
		//  if ($request->getMethod() == 'POST') 
		//  {
			
				$em = $this->getDoctrine()->getManager();		
				$data = json_decode(file_get_contents("php://input"));
			// var_dump($data);
		    // die;		
				if($data)
				{	
					
					$service=explode(",", $data->services_id);
					foreach($service as $serv){
						$sumaryService = $em->getRepository('AppBundle:SummaryService')->findOneBy(array('idSummaryService' => $serv));
						
						$sumaryService->setPayoutBarber("si");
						$sumaryService->setPayoutDate(new \DateTime());
						$em->persist($sumaryService);
					 }
					 $em->flush();

					 return new JsonResponse(array('status' => 'success'));	
									 
				}
				
				return new JsonResponse(array('status' => 'error'));
			// }	
	 }   

	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
   		
    /**
     * @Route("/ws/organizations", name="/ws/organizations")
     */
    public function getOrganizations(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
		$organizations = $em->getRepository('AppBundle:Organization')->findBy(array("status" => 'ACTIVO'));
		
		$list = array();
		foreach($organizations as $org)
		{
			
			$branch = $em->getRepository('AppBundle:Branch')->findBy(array("organization" => $org->getOrganizationId(), "isActive" => 1));
			$branch_list = array();
			foreach($branch as $location)
			{
				$branch_list[] = array(
					'branchId' => $location->getBranchId(),
					'name'	   => $location->getName(),
					'description' => $location->getDescription(),
					'type'     => $location->getBranchType()->getName(),
					'type_eng'     => $location->getBranchType()->getNameEng()
					
				);
			}
			
			$list[] = array(
				'organizationId' => $org->getOrganizationId(),
				'name'           => $org->getName(),
				'branch_list'    =>	$branch_list
			);
		}
		
		return new JsonResponse(array('organizations' => $list));
		
	}
	
	
	/**
     * @Route("/ws/pending", name="/ws/pending")
     */
   public function getPending(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		
		$list = array();

		$em = $this->getDoctrine()->getManager();
		
		if($data)
		{
		   		$user = $data->user;			   
			    $statusArray = array();
			   	$inspectionStatus = $em->getRepository('AppBundle:InspectionStatus')->findBy(array("isActive" => 1));
			   	foreach($inspectionStatus as $statusRaw)		
			   	{
				   	if($statusRaw->getInspectionStatusId() != 3)
				   	{
				   		$statusArray[] = $statusRaw->getInspectionStatusId();
				   	}
 			   	}
			   
				$inspection = $em->getRepository('AppBundle:Inspection')->findBy(array("assignedUser"=>$user->id,"currentInspectionStatus" => $statusArray, "isActive" => 1));		
				//$inspection = $em->getRepository('AppBundle:Inspection')->findBy(array("currentInspectionStatus" => array(1,2)));	
				if ($inspection){
						foreach($inspection as $insp)
						{
							$barprogress = $em->getRepository('AppBundle:Inspection')->getStaticsInspection($insp->getRequerimentGroup()->getRequirementGroupId(), $insp->getInspectionId());
							switch($insp->getCurrentInspectionStatus()->getInspectionStatusId())
							{
								//en proceso
								case 1:
									$class = 'secondary';
								break;
								//pendiente
								case 2:
									$class = 'warning';						
								break;
								//completado
								case 3:
									$class = 'success';						
								break;
								default:
									$class = 'dark';						
								break;																		
							}
						
							$list[] = array(
								'status_class'	    => $class,
								'status'			=> $insp->getCurrentInspectionStatus()->getName(),
								'status_eng'			=> $insp->getCurrentInspectionStatus()->getNameEng(),
								'status_id'			=> $insp->getCurrentInspectionStatus()->getInspectionStatusId(),						
								'inspection'		=> $insp->getInspectionId(),
								'organizationName'  => $insp->getOrganization()->getName(),
								'branchName' 		=> $insp->getBranch()->getName(),
								'organization' 		=> $insp->getOrganization()->getOrganizationId(),
								'branch'			=> $insp->getBranch()->getBranchId(),
								'service'			=> $insp->getService()->getServiceId(),
								'type'				=> $insp->getRequerimentGroup()->getRequirementGroupId(),
								'dateCreated' 		=> $insp->getCreatedAt(),
								'barprogress'		=> $barprogress
								
							);
						}
			    }else{
					return new JsonResponse(array('data' => "error inspection" ));
				}
				
			}

	   return new JsonResponse(array('data' => $list ));
		
	}

	/**
     * @Route("/ws/complete", name="/ws/complete")
     */
	public function getComplete(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		//print_r($data);
		//exit;
		$list = array();
		//$user = $data->user;

		if($data){
			$user = $data->user;
			$em = $this->getDoctrine()->getManager();
			//$user = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $user));
			//$inspection = $em->getRepository('AppBundle:Inspection')->findBy(array("currentInspectionStatus" => 3));
			$inspection = $em->getRepository('AppBundle:Inspection')->findBy(array("assignedUser"=>$user->id, "currentInspectionStatus" => 3, 'isActive' => 1));

			if($inspection) {
				foreach($inspection as $insp)
				{   
					$barprogress = $em->getRepository('AppBundle:Inspection')->getStaticsInspection($insp->getRequerimentGroup()->getRequirementGroupId(), $insp->getInspectionId());					
					$list[] = array(
						'inspection' => $insp->getInspectionId(),
						'name'       => $insp->getOrganization()->getName(),
						'branch' 	 => $insp->getBranch()->getName(),
						'datefinish' => $insp->getUpdatedAt(),
						'barprogress'=> $barprogress
					);
				}
			}
		}
	return new JsonResponse(array('data' => $list));
		
	}


	/**
     * @Route("/ws/changestatusinspection", name="/ws/changestatusinspection")
     */
	public function changeStatusInspection(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		//$obj="";
		
		if($data)
		//if(true)
		{		      
		    $status= $data->status*1;
			$insp = $data->inspection*1;
			$user =  $data->user;
			$location=$data->latLng;
            			
		    /*$status = 2;
			$insp = 172;
			$user = 1;*/
			
				$em = $this->getDoctrine()->getManager();
				$inspection = $em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $insp));
				$status = $em->getRepository('AppBundle:InspectionStatus')->findOneBy(array("inspectionStatusId" => $status));
				$user = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $user));	
				
				$inspectionLog = $em->getRepository('AppBundle:InspectionStatusLog')->findOneBy(array("inspection" => $inspection), array('inspectionStatusLogId' => 'DESC'));
				if($inspectionLog){
				    $inspectionLog->setEndTime(new \DateTime());				    
				    $em->persist($inspectionLog);
				    $em->flush();
				    
				    $insLog = new InspectionStatusLog();
				    $insLog->setInspection($inspection);
				    $insLog->setInspectionStatus($status);
				    $insLog->setStartTime(new \DateTime());
				    $insLog->setCreatedAt(new \DateTime());
					$insLog->setCreatedBy($user);
					$insLog->setGeolocation($location);
				    $em->persist($insLog);
				    $em->flush();
				    				    
				}else{
				    $insLog = new InspectionStatusLog();
				    $insLog->setInspection($inspection);
				    $insLog->setInspectionStatus($status);
				    $insLog->setStartTime(new \DateTime());
				    $insLog->setCreatedAt(new \DateTime());
					$insLog->setCreatedBy($user);
					$insLog->setGeolocation($location);
				    $em->persist($insLog);
				    $em->flush();
				}
				
				
				if($inspection){

					//$obj=$inspection->getInspectionId();

					$inspection->setCurrentInspectionStatus($status);
					$inspection->setUpdatedBy($user);
					$inspection->setUpdatedAt(new \DateTime());
					$em->persist($inspection);
					$em->flush();
					$data="Actualizado";
					$objStatus=$inspection->getCurrentInspectionStatus()->getInspectionStatusId();
					

					return new JsonResponse(array('data' => $objStatus));
				}
			}

		return new JsonResponse(array('data' => "Fallo de Actualizacion de ESTATUS"));

	}
	
	/**
     * @Route("/ws/services", name="/ws/services")
     */
    public function getServicesRequeriments(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		
		$servArray = array();
		$ReqArray = array();
		$list = array();

		if($data)
		   {
				//$branchid  = $data->branchid;
				$em = $this->getDoctrine()->getManager();
				$services = $em->getRepository('AppBundle:Service')->findBy(array("isActive" => 1));
						
				foreach($services as $serv)
				{
					$servArray[] = array(
						'serviceid' => $serv->getServiceId(),
						'name'      => $serv->getName(),
						'name_eng'  => $serv->getNameEng()
					);
				}

				$requirement=$em->getRepository('AppBundle:RequirementGroup')->findAll();
				foreach($requirement as $req)
				{
					$ReqArray[] = array(
						'requirementid' => $req->getRequirementGroupId(),
						'name'      => $req->getName(),
						'name_eng'  => $req->getNameEng(),
						'color'     => $req->getColor()
 					);
				}
			}

			$list = array(
				'services' => $servArray,
				'requirementsgroup' => $ReqArray
			);

	return new JsonResponse(array('data' => $list));
		
	}


	/**
     * @Route("/ws/create-inspection", name="/ws/create-inspection")
     */
    public function createInspection(Request $request) {

		$em = $this->getDoctrine()->getManager();		
		$data = json_decode(file_get_contents("php://input"));
		
		if($data)
		{	
			$branch = $data->branch;
			$service = $data->service;
			$type = $data->type;
			$user = $data->user;
			$gps =$data ->gps;

			$branch = $em->getRepository('AppBundle:Branch')->findOneBy(array("branchId" => $branch));
			$service = $em->getRepository('AppBundle:Service')->findOneBy(array("serviceId" => $service)); 
			$type = $em->getRepository('AppBundle:RequirementGroup')->findOneBy(array("requirementGroupId" => $type));
			$user = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $user));
			$status = $em->getRepository('AppBundle:InspectionStatus')->findOneBy(array("inspectionStatusId" => 2));
		    
			 $annObj = new Inspection();
			 $annObj->setOrganization($branch->getOrganization());
			 $annObj->setBranch($branch);			
			 $annObj->setAssignedUser($user);		
			 $annObj->setService($service);	
			 $annObj->setCurrentInspectionStatus($status);
			 $annObj->setRequerimentGroup($type);
			 $annObj->setGpsLocation($gps);	
			 $annObj->setIsActive(1);				 
			 $annObj->setCreatedAt(new \DateTime());				
			 $annObj->setCreatedBy($user);				
			 $em->persist($annObj);
			 $em->flush();			
			 $data = $annObj->getInspectionId();        
		
			 return new JsonResponse(array('status' => 'success','data' => $data));									 
		 }
		
		 return new JsonResponse(array('status' => 'error'));
	 
	 }    


	/**
     * @Route("/ws/requirement-type", name="/ws/requirement-type")
     */
    public function getRequirementType(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		
		$ReqtypeArray = array();
		$ReqStatusArray = array();
		$list = array();
		$em = $this->getDoctrine()->getManager();
		
		if($data)
		{

		   	$inspection = $em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $data->inspection, 'isActive' => 1));				
			
			if($inspection)
			{	
					$em = $this->getDoctrine()->getManager();
					$typereq = $em->getRepository('AppBundle:Inspection')->getTypesByGroupId($inspection->getRequerimentGroup()->getRequirementGroupId(), $data->inspection);
							
					foreach($typereq as $typerq)
					{
						$ReqtypeArray[] = array(
							'total_count'     => $typerq['total_count'],
							'total_done'      => $typerq['total_completed'],							
							'type_name'       => $typerq['type_name'],
							'type_name_eng'   => $typerq['type_name_eng'],
							'group_name'      => $typerq['group_name'],
							'group_name_eng'  => $typerq['group_name_eng'],
							'group_color'     => $typerq['color'],
							'reqtypeid'       => $typerq['type_id'],
							'progress'        => ($typerq['total_completed'] * 100 / $typerq['total_count'] / 100)
						);
					}
	
					$reqstatus = $em->getRepository('AppBundle:InspectionStatus')->findBy(array("isActive" => 1));
	
					foreach($reqstatus as $est)
					{
						if($inspection->getCurrentInspectionStatus()->getInspectionStatusId() != $est->getInspectionStatusId())
						{
							$ReqStatusArray[] = array(
								'statusid' => $est->getInspectionStatusId(),
								'name'  => $est->getName(),
								'name_eng' => $est->getNameEng()
		
							);
						}
					}

					$barprogress = $em->getRepository('AppBundle:Inspection')->getStaticsInspection($inspection->getRequerimentGroup()->getRequirementGroupId(), $data->inspection);
							
							
				switch($inspection->getCurrentInspectionStatus()->getInspectionStatusId())
				{
					//en proceso
					case 1:
						$class = 'secondary';
					break;
					//pendiente
					case 2:
						$class = 'warning';						
					break;
					//completado
					case 3:
						$class = 'success';						
					break;
					default:
						$class = 'dark';						
					break;																		
				}							
							

				$list = array(
					'status'  		  => $inspection->getCurrentInspectionStatus()->getName(),
					'status_eng'      => $inspection->getCurrentInspectionStatus()->getNameEng(),
					'status_class'    => $class,
					'reqtype' 		  => $ReqtypeArray,
					'reqstatus' 	  => $ReqStatusArray,
					'barprogress'     => $barprogress,
					'statusinpection' => $inspection->getCurrentInspectionStatus()-> getInspectionStatusId()
				);
			}				
		}	


	return new JsonResponse(array('data' => $list));
		
	}

	/**
     * @Route("/ws/requirements", name="/ws/requirements")
     */
    public function getRequirements(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		
		$ReqArray = array();
		$OptsArray = array();  
		$list = array();

		if($data)
		   {
				$reqtype=$data->type;
				$typegroup=$data->typegroup;
				$em = $this->getDoctrine()->getManager();
				$typegroup = $em->getRepository('AppBundle:RequirementGroup')->findBy(array("requirementGroupId" => $typegroup));
				$requeriments = $em->getRepository('AppBundle:Requirement')->findBy(array("isActive" => 1,"requirementType" => $reqtype,"requirementGroup" => $typegroup));
						
				foreach($requeriments as $req)
				{
					$ReqArray[] = array(
						'requirement' => $req->getRequirementId(),
						'name'      => $req->getName(),
						'name_eng'  => $req->getNameEng(),
						'description' => $req->getDescription(),
						'description_eng' => $req-> getDescriptionEng(),
						'law_reference' => $req->getLawReference(),
						'law_reference_eng' => $req->getLawReferenceEng(),
						'penalty' => $req->getRequirementPenalty()->getRequirementPenaltyId()

					);
				}

				$options = $em->getRepository('AppBundle:InspectionResult')->findBy(array("isActive" => 1));

				foreach($options as $opt)
				{
					$OptsArray[] = array(
						'optid' => $opt->getInspectionResultId(),
						'name'  => $opt->getName(),
						'name_eng' => $opt->getNameEng()

					);
				}	
			}

			$list = array(
				'reqs' => $ReqArray,
				'opts' => $OptsArray
			);

	return new JsonResponse(array('data' => $list));
		
	}

     /**
     * @Route("/ws/updaterequirementslist", name="/ws/updaterequirementslist")
     */
    public function updateRequiremtsList(Request $request)
    {
		$data = json_decode(file_get_contents("php://input"));
		$insp="";
		$type="";
		$typegroup="";
		$requirement=array();
		$DoneArray=array();
		$pendingArray=array();		
		$OptsArray = array();  
		
		if($data)
		{
			$insp = $data->inspection;
			$type = $data->type;
			$typegroup=$data->typegroup;
			$em = $this->getDoctrine()->getManager();
		
			$requirement=$em->getRepository('AppBundle:Requirement')->getListByRequirement($type,$typegroup,$insp);
		
			//$ObjInspection=$em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $insp));
			//$ObjType=$em->getRepository('AppBundle:RequirementGroup')->findOneBy(array("requirementGroupId" => $type));
			//$requirementDone=$em->getRepository('AppBundle:InspectionRequeriment')->findBy(array("inspection" => $ObjInspection));
			$requirementDone=$em->getRepository('AppBundle:Requirement')->getListByRequirementDone($type,$typegroup,$insp);
			
			foreach($requirementDone as $done)
			{
				$DoneArray[] = array(			
					'requirement'       => $done['requirement'],
					'name'              => $done['name'],
					'name_eng'          => $done['name_eng'],
					'description'       => $done['description'],
					'description_eng'   => $done['description_eng'],
					'law_reference'     => $done['law_reference'],
					'law_reference_eng' => $done['law_reference_eng'],
					'penalty'           => $done['requirement_penalty_id'],
					'option'            => $done['inspection_result_id'],
					'comment'           => $done['comments'],
					'picture_count'     => $done['picture_count'],
					'isVisible'		    => false
				);
			}	
			
			foreach($requirement as $pending)
			{
				$pendingArray[] = array(
					'requirement'       => $pending['requirement'],
					'name'              => $pending['name'],
					'name_eng'          => $pending['name_eng'],
					'description'       => $pending['description'],
					'description_eng'   => $pending['description_eng'],
					'law_reference'     => $pending['law_reference'],
					'law_reference_eng' => $pending['law_reference_eng'],
					'penalty'           => $pending['requirement_penalty_id'],
					'comment'           => $pending['comments'],
					'picture_count'    => $pending['picture_count'],
					'isVisible'	       => false				
				);
			}				
			

			$options = $em->getRepository('AppBundle:InspectionResult')->findBy(array("isActive" => 1));
			
			foreach($options as $opt)
				{
					$OptsArray[] = array(
						'optid' => $opt->getInspectionResultId(),
						'name'  => $opt->getName(),
						'name_eng'  => $opt->getNameEng()
					);
				}	

		}	

		$list = array(
			'requirement' => $pendingArray,
			'requirementdone' => $DoneArray,
			'opts' => $OptsArray
		);
		return new JsonResponse(array('data' => $list ));
		//return new JsonResponse(array('data' => $type ));
	}


    /**
     * @Route("/ws/setitemrequirement", name="/ws/setitemrequirement")
     */
	
	public function setItemRequirement(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		
		$ReqArray = array();
		$OptsArray = array();  
		$list = array();
        $salida="NO CAMBIO";
		if($data)
		   {
				$req = $data->requirement;
				$insp = $data->inspection;
				$opt = $data->option;
				//$comment = $data->comment;
				$reqinsp = $data->reqinspecid;
				$user = $data->user;

				$em = $this->getDoctrine()->getManager();
				$requirement = $em->getRepository('AppBundle:Requirement')->findOneBy(array("requirementId" => $req));
				$inspection = $em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $insp));
				$option = $em->getRepository('AppBundle:InspectionResult')->findOneBy(array("inspectionResultId" => $opt));
				$inspection_req= $em->getRepository('AppBundle:InspectionRequeriment')->findOneBy(array("inspection" => $inspection,"requeriment" => $requirement)); 
				$user = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $user));		
				
				$data="Actualizando";
				if($inspection_req)
				{  
					//$inspection_req->setComments($comment);	
					$inspection_req->setInspectionResult($option);
					$inspection_req->setUpdatedBy($user);
					$inspection_req->setUpdatedAt(new \DateTime());
					$em->persist($inspection_req);
					$em->flush();
					$data="Actualizado";

				}
				else{ $data="Insertando";
					$annObj = new InspectionRequeriment();
					$annObj->setInspection($inspection);
					$annObj->setInspectionResult($option);			
					$annObj->setRequeriment($requirement);
					//$annObj->setComments($comment);		
					$annObj->setCreatedAt(new \DateTime());				
					$annObj->setCreatedBy($user);				
					$em->persist($annObj);
					$em->flush();			
					//$data = $annObj->getInspectionId();    

				}
			
			}

			// $list = array(
			// 	'reqs' => $ReqArray,
			// 	'opts' => $OptsArray
			// );
			
	return new JsonResponse(array('data' => "success",'salida' => $data));
		
	}


	 /**
     * @Route("/ws/savecommets", name="/ws/savecommets")
     */
	
	public function saveCommets(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		$em = $this->getDoctrine()->getManager();		
		$list = array();
        $salida="NO CAMBIO";
        
		if($data)
		{
			$req = $data->requirement;
			$insp = $data->inspection;
			$comment = $data->comment;
			$user = $data->user;

			
			$requirement    = $em->getRepository('AppBundle:Requirement')->findOneBy(array("requirementId" => $req));
			$inspection     = $em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $insp));
			$inspection_req = $em->getRepository('AppBundle:InspectionRequeriment')->findOneBy(array("inspection" => $inspection,"requeriment" => $requirement)); 
			$user = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $user));		
			
			$data="Actualizando";
			if($inspection_req)
			{  
				$inspection_req->setComments($comment);	
				//$inspection_req->setInspectionResult($option);
				$inspection_req->setUpdatedBy($user);
				$inspection_req->setUpdatedAt(new \DateTime());
				$em->persist($inspection_req);
				$em->flush();
				$data="Actualizado";
			} else {
				
				$inspection_req = new InspectionRequeriment();
				$inspection_req->setComments($comment);	
				$inspection_req->setInspection($inspection);
				$inspection_req->setRequeriment($requirement);				
				$inspection_req->setUpdatedBy($user);
				$inspection_req->setUpdatedAt(new \DateTime());
				$em->persist($inspection_req);
				$em->flush();
								
			}	
		}
			
			return new JsonResponse(array('data' => "success",'salida' => $data));
		
	}

	 /**
     * @Route("/ws/generatesummary", name="/ws/generatesummary")
     */
	
	public function generateSummary(Request $request)
    {	
		$data = json_decode(file_get_contents("php://input"));
		$InspArray=array();
		$list = array();
		$summary = array();

		if($data)
		   {				
				$insp = $data->inspection;
		
				$em         = $this->getDoctrine()->getManager();		
				$summary    = $em->getRepository('AppBundle:Inspection')->getSummaryInspection($insp);
				$inspection = $em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $insp));
				
				$data = "Actualizando";
				if($inspection)
				{  
					$InspArray[] = array(
						'organization' =>$inspection->getOrganization()->getName(),
						'branch'  => $inspection->getBranch()->getName(),
						'service' => $inspection->getService()->getName(),
						'reqgroup'=> $inspection->getRequerimentGroup()->getName(),
						'reqgroup_eng'=> $inspection->getRequerimentGroup()->getNameEng(),
						'creation'  => $inspection->getCreatedAt(),
						'finish'  => $inspection->getUpdatedAt()
					);
				
					$data = "Actualizado";
				}
							}
				
			 $list = array(
			 	'insp'    => $InspArray,
			 	'summary' => $summary
			  );
			
	       return new JsonResponse(array('data' => $list));
	
	}

	
	/**
     * @Route("/ws/getlistreqcomplete", name="/ws/getlistreqcomplete")
     */
    public function getListReqComplete(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		
		$ReqArray = array();
		

		if($data)
		   {
				$inspection=$data->inspection;
				$result=$data->result;

				$em = $this->getDoctrine()->getManager();

				$inspection_req = $em->getRepository('AppBundle:InspectionRequeriment')->findBy(array("inspection" => $inspection,"inspectionResult" => $result)); 
						
				foreach($inspection_req as $insReq)
				{
					
					$ReqArray[] = array(
						'requirement' => $insReq->getRequeriment()->getName(),
						'requirement_eng' => $insReq->getRequeriment()->getNameEng(),
						'requerimentId'=> $insReq->getRequeriment()->getRequirementId(),
						'type'      => $insReq->getRequeriment()->getRequirementType()->getName(),
						'type_eng'      => $insReq->getRequeriment()->getRequirementType()->getNameEng(),
						'law'       => $insReq->getRequeriment()->getLawReference(),
						'law_eng'       => $insReq->getRequeriment()->getLawReferenceEng(),							
						'typeId' => $insReq->getRequeriment()->getRequirementType()->getRequirementTypeId()
					);
				}

				
			}


	return new JsonResponse(array('data' => $ReqArray));
		
	}

	
	/**
     * @Route("/ws/getcompleteitemdetail", name="/ws/getcompleteitemdetail")
     */
    public function getCompleteItemDetail(Request $request)
    {
		
		$data = json_decode(file_get_contents("php://input"));
		
		$ReqArray = array();
		$PictureArray= array();

		if($data)
		   {
				$inspection=$data->inspection;
				$requirement=$data->requirement;

				$em = $this->getDoctrine()->getManager();

				$inspection_req = $em->getRepository('AppBundle:InspectionRequeriment')->findOneBy(array("inspection" => $inspection,"requeriment" => $requirement)); 
			    $inspection_picture=$em->getRepository('AppBundle:InspectionRequirementPicture')->findBy(array("inspection" => $inspection,"requirement" => $requirement)); 
		
				foreach($inspection_picture as $picture)
				{
	
					$PictureArray[] = array(
						'picture' => $picture->getPicturePath()
					);
				}
				
				
				    $ReqArray[] = array(
						'req_name' => $inspection_req->getRequeriment()->getName(),
						'req_name_eng' => $inspection_req->getRequeriment()->getNameEng(),
						'req_law'=> $inspection_req->getRequeriment()->getLawReference(),
						'req_law_eng'=> $inspection_req->getRequeriment()->getLawReferenceEng(),
						'req_description'=> $inspection_req->getRequeriment()->getDescription(),
						'req_description_eng'=> $inspection_req->getRequeriment()->getDescriptionEng(),
						'type'      => $inspection_req->getRequeriment()->getRequirementType()->getName(),
						'type_eng'      => $inspection_req->getRequeriment()->getRequirementType()->getNameEng(),
						'result' => $inspection_req->getInspectionResult()->getName(),
						'result_eng' => $inspection_req->getInspectionResult()->getNameEng(),
						'comments' => $inspection_req->getComments(),
						'pictures'  => $PictureArray,
						'penalty'  => $inspection_req->getRequeriment()->getRequirementPenalty()->getName(),
						'penalty_eng'  => $inspection_req->getRequeriment()->getRequirementPenalty()->getNameEng(),
						'penalty_amount'  => $inspection_req->getRequeriment()->getRequirementPenalty()->getAmount()
					);
			
			}


	      return new JsonResponse(array('data' => $ReqArray));
		
	}


 
	/**
     * @Route("/ws/check_user", name="/ws/check_user")
     */
    public function checkUserAction(Request $request) {

		$data = json_decode(file_get_contents("php://input"));
 
		if($data)
		{
			$user = $data->user;
			$pwd  = $this->encodePassword($data->pwd);
 
			$em = $this->getDoctrine()->getManager();
			$user = $em->getRepository('AppBundle:User')->findOneBy(array(
				"email" => $user,
				"password" => $pwd,
				'status' => ['ACTIVO','INACTIVO']
			));
			
			if($user)
			{
				
			/*	$path = $this->images_path."user_icon.png";
				if(strlen($user->getAvatarPath()) > 0)
				{
					 $path = $this->uploads_path.$user->getAvatarPath();
				}			   
			*/	
				$data = array(
					  'id'             => $user->getId(),
					  'name'           => $user->getFirstName()." ".$user->getLastName(),
					  'first_name'     => $user->getFirstName(),
					  'last_name'  	   => $user->getLastName(),			   	  
					  'email'      	   => $user->getEmail(),
					  'rol_id'     	   => $user->getUserRole()->getId(),
					  'token'          => md5($user->getId()),
					  'status'      	   => $user->getStatus(),			   	  			   	  
					  'security_code'  => $user->getsecurityCode(),
					  'organizationId' => $user->getOrganization()->getOrganizationId()
				);
			
				return new JsonResponse(array('status' => 'success', 'data' => $data ));	       
				
			} else {
				return new JsonResponse(array('status' => 'invalid'));	       
			}
		} else {
			return new JsonResponse(array('status' => 'error'));	       
		}
 
		 
	 }

   
	

	public function addMinutes($date_start, $minutes ){
	    $newDate = date('Y-m-d H:i:s',strtotime("+$minutes minutes",strtotime($date_start)));
	    return $newDate;
	}    
        
    
    
    public function encodePassword($raw)
	{
		
		$iterations = 5000;
		$salted = $raw;
		$digest = hash('md5', $salted, true);
		for ($i = 1; $i < $iterations; ++$i) {
	            $digest = hash('md5', $digest.$salted, true);
	    }
		
		return base64_encode($digest);
		
	}	


    public function time_elapsed_string($datetime)
    {
	    $full = false;
	    $now = new \DateTime;
	    $ago = new \DateTime($datetime);
	    $diff = $now->diff($ago);
	
	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;
	
	    $string = array(
	        'y' => 'aÃ±o',
	        'm' => 'mes',
	        'w' => 'semana',
	        'd' => 'dÃ­a',
	        'h' => 'hora',
	        'i' => 'minuto',
	        's' => 'segundo',
	    );
	    foreach($string as $k => &$v)
	    {
	        if($diff->$k)
	        {
		        
		        if($k == 'm' && $diff->$k > 1)
		        {
			    	$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 'es' : '');    
		        } else {
			        $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');    
		        }
	            
	        } else {
	            unset($string[$k]);
	        }
	    }
	
	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . '' : 'Hace un momento';

    }
  
	public function wrap($text, $quantity = 15)
    {        
    
    	// trim and lowercase
    	$xtext = substr($text, 0, $quantity);

		if(strlen($xtext)==0)
		{
		   return "";
		} else {
		
			if(strlen($text) > $quantity)
			{
				return $xtext."...";
			}
			
			return $xtext;		
		}
		

		
    	return $xtext;
	}
	
	/**
     * @Route("/ws/prueba", name="/ws/prueba")
     */
	public function prueba(Request $request)
    {
		$data = 1;//json_decode(file_get_contents("php://input"));
		$insp=16;
		$type=4;
		$typegroup=1;
		$requirement=array();
		$DoneArray=array();
		$OptsArray = array();  
		
		if($data)
		{
			//$insp = $data->inspection;
			//$type = $data->type;
			//$typegroup=$data->typegroup;
			$em = $this->getDoctrine()->getManager();
		
			$requirement=$em->getRepository('AppBundle:Requirement')->getListByRequirement($type,$typegroup,$insp);
		
			//$ObjInspection=$em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $insp));
			//$ObjType=$em->getRepository('AppBundle:RequirementGroup')->findOneBy(array("requirementGroupId" => $type));
			//$requirementDone=$em->getRepository('AppBundle:InspectionRequeriment')->findBy(array("inspection" => $ObjInspection));
			
			/*foreach($requirementDone as $done)
			{
				$DoneArray[] = array(
					'requeriment' => $done->getRequeriment()->getRequirementId(),
					'name'  => $done->getRequeriment()->getName(),
					'description' => $done->getRequeriment()->getDescription(),
					'law_reference'  => $done->getRequeriment()->getLawReference(),
					'penalty'  => $done->getRequeriment()->getRequirementPenalty()->getRequirementPenaltyId(),
					'option' => $done->getInspectionResult()->getInspectionResultId()
				);
			}	

			$options = $em->getRepository('AppBundle:InspectionResult')->findBy(array("isActive" => 1));
			
			foreach($options as $opt)
				{
					$OptsArray[] = array(
						'optid' => $opt->getInspectionResultId(),
						'name'  => $opt->getName()
					);
				}	
          */
		}	

		
		return new JsonResponse(array('data' => $requirement ));
		//return new JsonResponse(array('data' => $type ));
	}



    /**
     * @Route("/ws/upload-file", name="/ws/upload-file")
     */
    public function uploadAction(Request $request) {


       $em = $this->getDoctrine()->getManager();		
	   
       $uploadfile     = $_FILES['file']['name'];
       $uploadfilename = $_FILES['file']['tmp_name'];
	   $array          = array();
      
	   if($uploadfile)
	   {
		   
	        $ext         = $_POST['ext'];
	        $inspectionNum  = $_POST['inspection'];	        
	        $requirementNum = $_POST['requirement'];	        	        
	        $token       = json_decode($_POST['token']);	        

			$fileName = md5(date("YmdHis")).".".$ext;
	        $new = "uploads/".$fileName;
	       // $newPath = $this->uploads_path.$fileName;
	        $datos = "";
            if(move_uploaded_file($uploadfilename, $new))
            {			   		        		        		        
				$userObj = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $token->id));												
				$inspection = $em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $inspectionNum));
				$requirement = $em->getRepository('AppBundle:Requirement')->findOneBy(array("requirementId" => $requirementNum));
			  
				$dato1  = $inspection->getInspectionId();
				$dato2  = $requirement->getRequirementId();
				
					
				$insReqPict = new InspectionRequirementPicture();
				$insReqPict->setInspection($inspection);	
				$insReqPict->setRequirement($requirement);			
				$insReqPict->setCreatedBy($userObj);
				$insReqPict->setPicturePath($new);
				$insReqPict->setCreatedAt(new \DateTime());
				$em->persist($insReqPict);
				$em->flush();
            
	            
				$path = $this->getProjectPaths();	
	            $pictures = $em->getRepository('AppBundle:InspectionRequirementPicture')->findBy(array("inspection" => $inspection,"requirement" => $requirement));
		        foreach($pictures as $picture)
				{
					$picturePath = $path['uploads_path'].$picture->getPicturePath();					            					
					$array[] = array(
						'picture_id'   => $picture->getInspectionRequirementPictureId(),						
						'picture_path' => $picturePath
					);
				}

				return new JsonResponse(array('status' => 'success','Insp'=>$dato1,'Req'=>$dato2,'pictures' => $array, 'datos'=>$datos));				
			} 
						
		}
		
		return new JsonResponse(array('status' => 'error'));		
    }   
    
    
	/**
     * @Route("/ws/get-files", name="/ws/get-files")
     */
    public function getFilesAction(Request $request) {

		$array = array();		
		$data = json_decode(file_get_contents("php://input"));
		
		$path = $this->getProjectPaths();
		if($data)
		{
			$inspection  = $data->inspection;
			$requirement = $data->requirement;

			$em = $this->getDoctrine()->getManager();
		
			$pictures = $em->getRepository('AppBundle:InspectionRequirementPicture')->findBy(array("inspection" => $inspection, "requirement" => $requirement));
			

			foreach($pictures as $picture)
			{
				$picturePath = $path['uploads_path'].$picture->getPicturePath();
				$array[] = array(
					'picture_id'   => $picture->getInspectionRequirementPictureId(),
					'picture_path' => $picturePath
				);
			}
		}	

		
		return new JsonResponse(array('data' => $array ));

    }        



	/**
     * @Route("/ws/d-file", name="/ws/d-file")
     */
    public function deleteFileAction(Request $request) {

		$array = array();		
		$data = json_decode(file_get_contents("php://input"));	
		if($data)
		{
			$fid         = $data->fid;
			$inspection  = $data->inspection;			
			$requirement = $data->requirement;			

			$em = $this->getDoctrine()->getManager();
		
			$picture = $em->getRepository('AppBundle:InspectionRequirementPicture')->findOneBy(array("inspectionRequirementPictureId" => $fid));			
			@unlink($picture->getPicturePath());
			
			$em->remove($picture);
			$em->flush();
			
			$path = $this->getProjectPaths();				
			$pictures = $em->getRepository('AppBundle:InspectionRequirementPicture')->findBy(array("inspection" => $inspection, "requirement" => $requirement));			
			foreach($pictures as $picture)
			{
				$picturePath = $path['uploads_path'].$picture->getPicturePath();
				$array[] = array(
					'picture_id'   => $picture->getInspectionRequirementPictureId(),
					'picture_path' => $picturePath
				);
			}			
			
			
		}	

		
		return new JsonResponse(array('data' => $array ));

    }        
    


}
