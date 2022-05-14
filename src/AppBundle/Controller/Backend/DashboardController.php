<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Form\UserLoginType;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Repository\EbClosion;

class DashboardController extends Controller {

    private $moduleId = 14;

    /**
     * @Route("/backend/statistics", name="backend_statistics")
     */
    public function statisticsAction(Request $request) {
	    
        $this->get("session")->set("module_id", $this->moduleId);	    
        $moduleId = $this->get("session")->get("module_id");
        $userModules = $this->get("session")->get("userModules");
		
		$arr = array();
		$arrDone = array();
		$arrCancel = array();		
		
		$em = $this->getDoctrine()->getManager();		
		
		
		if($request->get('cancel'))
		{
		   	$inspectionObjCancel = $em->getRepository('AppBundle:Inspection')->findOneByMd5Id($request->get('cid'));
		   	$inspectionCancel = $em->getRepository('AppBundle:Inspection')->findOneBy(array('inspectionId' => $inspectionObjCancel['inspection_id']));			
		   	if($inspectionCancel)
		   	{
			   if($inspectionCancel->getIsActive() == 1)
			   {
				   $inspectionCancel->setIsActive(0);				   
			   } else {
			   	   $inspectionCancel->setIsActive(1);				   				   
			   }

		   	   $em->persist($inspectionCancel);
		   	   $em->flush();
		   	   
               $this->addFlash('success_message', "Se ha cancelado correctamente este registro");		   	   
		   	}
		}
		
		
		$statusArray = array();
	   	$inspectionStatus = $em->getRepository('AppBundle:InspectionStatus')->findBy(array("isActive" => 1));
	   	foreach($inspectionStatus as $statusRaw)		
	   	{
		   	if($statusRaw->getInspectionStatusId() != 3)
		   	{
		   		$statusArray[] = $statusRaw->getInspectionStatusId();
		   	}
		}
	   
		
		$inspection = $em->getRepository('AppBundle:Inspection')->findBy(array("currentInspectionStatus" => $statusArray, 'isActive' => 1));						
		foreach($inspection as $insp)
		{
			$barprogress = $em->getRepository('AppBundle:Inspection')->getStaticsInspection($insp->getRequerimentGroup()->getRequirementGroupId(), $insp->getInspectionId());
			$arr[] = array('inspection' => $insp, 'progress' => $barprogress[0]);
		}
		
		
		$inspection = $em->getRepository('AppBundle:Inspection')->findBy(array('isActive' => 0));						
		foreach($inspection as $insp)
		{
			$barprogress = $em->getRepository('AppBundle:Inspection')->getStaticsInspection($insp->getRequerimentGroup()->getRequirementGroupId(), $insp->getInspectionId());
			$arrCancel[] = array('inspection' => $insp, 'progress' => $barprogress[0]);
		}		
		
		
		$inspectionDone = $em->getRepository('AppBundle:Inspection')->findBy(array("currentInspectionStatus" => 3, 'isActive' => 1));						
		foreach($inspectionDone as $insp)
		{
			$barprogress = $em->getRepository('AppBundle:Inspection')->getStaticsInspection($insp->getRequerimentGroup()->getRequirementGroupId(), $insp->getInspectionId());
			$arrDone[] = array('inspection' => $insp, 'progress' => $barprogress[0]);
		}

        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));		
		

		
        return $this->render('@App/Backend/Dashboard/statistics.html.twig', array(
            'list' => $arr,
            'listDone' => $arrDone,
            'listCancel'=>$arrCancel,
            'permits' => $mp
        ));
    }



    /**
     * @Route("/backend/statistics_view/{id}", name="backend_statistics_view")
     */
    public function statisticsViewAction(Request $request, $id) {
	    
        $this->get("session")->set("module_id", $this->moduleId);	    
        $moduleId = $this->get("session")->get("module_id");
        $userModules = $this->get("session")->get("userModules");
		
		$arr = array();
		
		$em = $this->getDoctrine()->getManager();		
		$inspectionRaw = $em->getRepository('AppBundle:Inspection')->findOneByMd5Id($id);						
		$inspection    = $em->getRepository('AppBundle:Inspection')->findOneBy(array("inspectionId" => $inspectionRaw['inspection_id']));
		$summary       = $em->getRepository('AppBundle:Inspection')->getSummaryInspection($inspectionRaw['inspection_id']);
		$inspectionStatusLog    = $em->getRepository('AppBundle:InspectionStatusLog')->findBy(array("inspection" => $inspection));
		
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));		
		

        return $this->render('@App/Backend/Dashboard/statistics_view.html.twig', array(
            'summary' => $summary,
            'inspection' => $inspection,
            'statusLog' => $inspectionStatusLog,
            'permits' => $mp
        ));
    }
    
    
	/**
     * @Route("/backend/statistics_detail", name="backend_statistics_detail")
     */
    public function statisticsDetailAction(Request $request) {
	    
        $this->get("session")->set("module_id", $this->moduleId);	    
        $moduleId = $this->get("session")->get("module_id");
        $userModules = $this->get("session")->get("userModules");
		
		$iid = $request->get('iid');
		$rid = $request->get('rid');
		
		$arr = array();
		
		$em = $this->getDoctrine()->getManager();		

		$inspectionRaw = $em->getRepository('AppBundle:Inspection')->findOneByMd5Id($iid);	
		$resultRaw = $em->getRepository('AppBundle:InspectionResult')->findOneByMd5Id($rid);
		$list = $em->getRepository('AppBundle:InspectionResult')->getResultListByInspection($resultRaw['inspection_result_id'], $inspectionRaw['inspection_id']);								
		
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));		
		
        return $this->render('@App/Backend/Dashboard/statistics_list_by_result.html.twig', array(
        //return $this->render('@App/Backend/Dashboard/statistics_detail.html.twig', array(
			'list' => $list, 
			'result'=>$resultRaw['inspection_result_id'], 
			'inspection'=>$inspectionRaw['inspection_id']
        ));
	}    
	
	/**
     * @Route("/backend/statistics_detail_requirement", name="backend_statistics_detail_requirement")
     */

	public function statisticsDetailRequirement(Request $request) {
		$photo=array();
		
        $this->get("session")->set("module_id", $this->moduleId);	    
        $moduleId = $this->get("session")->get("module_id");
        $userModules = $this->get("session")->get("userModules");
		
		$iid = $request->get('iid');
		// $rid = $request->get('rid');
		$req = $request->get('requirement');

		$arr = array();
		
		$em = $this->getDoctrine()->getManager();		

		$photos = $em->getRepository('AppBundle:InspectionRequirementPicture')->findBy(array('inspection'=>$iid, 'requirement'=>$req));								
		$requirement= $em->getRepository('AppBundle:InspectionRequeriment')->findOneBy(array('inspection'=>$iid, 'requeriment'=>$req));

		$mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));	


		if($photos) {
			foreach($photos as $p)
			{   
				$photo[] = array(
					'photo_id' => $p->getInspectionRequirementPictureId(),
					'photo_path' => $p->getPicturePath()	
				);
			}
		}
				
        return $this->render('@App/Backend/Dashboard/statistics_detail_requirement.html.twig', array(
			'photos' => $photo,
			'requirement_id' => $requirement->getRequeriment()->getRequirementId(),
			'requirement_name'=> $requirement->getRequeriment()->getName(),
			'description'=> $requirement->getRequeriment()->getDescription(),
			'law'=> $requirement->getRequeriment()->getLawReference(),
			'requirement_group'=> $requirement->getRequeriment()->getRequirementGroup()->getRequirementGroupId(),
			'requirement_group_name'=> $requirement->getRequeriment()->getRequirementGroup()-> getName(),
			'requiremen_type' => $requirement->getRequeriment()->getRequirementType()->getRequirementTypeId(),
			'requiremen_type_name' => $requirement->getRequeriment()->getRequirementType()->getName(),
			'penalty_id'=>  $requirement->getRequeriment()->getRequirementPenalty()->getRequirementPenaltyId(),
			'penalty_name'=>  $requirement->getRequeriment()->getRequirementPenalty()->getName(),
			'penalty_amount'=>  $requirement->getRequeriment()->getRequirementPenalty()->getAmount(),
			'result_id'=>  $requirement->getInspectionResult()->getInspectionResultId(),
			'result_name' =>  $requirement->getInspectionResult()->getName(),
			'comment'=>  $requirement->getComments()
        ));
    } 

}
