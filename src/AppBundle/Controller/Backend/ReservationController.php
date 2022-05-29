<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\SummaryService;
use AppBundle\Form\SummaryServiceType;
use AppBundle\Repository\EbClosion;


/**
 * Reservation controller.
 */
class ReservationController extends Controller {

    private $moduleId = 17;

    /**
     * @Route("/backend/reservation", name="backend_reservation")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $userData = $this->get("session")->get("userData");
        $list = $em->getRepository('AppBundle:Menus')->findBy(["isActive"=>1]);
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));
        return $this->render('@App/Backend/Reservation/index.html.twig', array(
                    "permits" => $mp,
                    "list" => $list,
                    "view" => "services"
        ));
    }


    /**
     * @Route("/backend/get/professional/hours", name="backend_get_profs_hours")
     */
    public function GetProfessionalHoursAction(Request $request) {

        //$sumaryService = new SummaryService();
        //$form = $this->createForm(new SummaryServiceType(), $sumaryService);

        $idMenus = $request->get("id");
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $userData = $this->get("session")->get("userData");
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));
        $idProfMenus = $this->getDoctrine()->getRepository('AppBundle:SummaryService')->getProfMenus( $idMenus );
        if ($idProfMenus[0]['id_profs'] == null) {
            $this->addFlash('error_message', 'No hay Profesionales disponibles para este servicio');
            return $this->redirectToRoute("backend_reservation");
        }
        $serviceData = $em->getRepository('AppBundle:Menus')->findBy(["menuId" => $idMenus]);
        $profMenus = $em->getRepository('AppBundle:User')->findBy(["id" => explode(",",$idProfMenus[0]['id_profs'])]);
        //var_dump($idProfMenus[0]['id_profs']);die;
        $dateTime   = new \DateTime();
        $dateNow    = $dateTime->format('Y-m-d H:i:s');

        //$defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder()
            ->add('firstName', 'text')
            ->add('lastName', 'text')
            ->add('email', 'email')
            ->add('phone', 'text')
            ->add('message', 'textarea')
            ->add('services', 'hidden')
            ->add('professional', 'hidden')
            ->add('scheduleTo', 'hidden')
            ->add('send', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
        }

        return $this->render('@App/Backend/Reservation/index.html.twig', array(
            "form" => $form->createView(),
            "permits" => $mp,
            "service" => $serviceData,
            "prof" => $profMenus,
            "day" => $dateNow,
            "view" => "prof_hours"
        ));
        
    }

    /**
     * @Route("/backend/get/list/hours/available", name="backend_get_list_hours_available")
     */
    public function GetListHoursAvailableAction(Request $request) {

        $pId = $request->get("p_id");
        $sId = $request->get("s_id");
        $dateSearch = $request->get("date");
        $em = $this->getDoctrine()->getManager();
        $serviceData = $em->getRepository('AppBundle:Menus')->findBy(["menuId" => $sId]);
        $listBooking = $this->getDoctrine()->getRepository('AppBundle:SummaryService')->getListBooking( $pId, $sId, $dateSearch );
        $toExclude = [];
        if ($listBooking && $serviceData) {
            foreach ($listBooking as $bookingValue) {
                $dateStart  = new \DateTime($bookingValue["scheduled_to"]);
                $dateEnd    = new \DateTime($bookingValue["scheduled_to"]);
                $duration   = $bookingValue["total_duration"];
                $dateEnd->modify('+'.$duration.' minute');
                $temp = [];
                $temp["start"] = $dateStart;
                $temp["end"] = $dateEnd;
                $temp["duration"] = $duration;
                array_push($toExclude, $temp);
            } 
        }
        $dateTime   = new \DateTime();
        $dateNow    = $dateTime->format('Y-m-d H:i:s');
        $hours = ["00","01","02","03","04","05","06","07","07","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23"];
        $minutes = ["00","15","30","45"];
        $hm = [];
        foreach ($hours as $valH) {
            if (intval($valH)>8 && intval($valH)<12) {
                foreach ($minutes as $valM) {
                    $hourMinutes    = $valH.":".$valM;
                    $timeToVerify   = new \DateTime($hourMinutes);
                    $includeFlag    = true;
                    foreach ($toExclude as $valueExclude) {
                        if ($timeToVerify >= $valueExclude["start"] &&  $timeToVerify <= $valueExclude["end"]) {
                            $includeFlag = false;
                        }
                    }
                    if ($includeFlag) {
                        array_push($hm, $timeToVerify);
                    }
                }
            }
            if (intval($valH)>=14 && intval($valH)<21) {
                foreach ($minutes as $valM) {
                    $hourMinutes    = $valH.":".$valM;
                    $timeToVerify   = new \DateTime($hourMinutes);
                    $includeFlag    = true;
                    foreach ($toExclude as $valueExclude) {
                        if ($timeToVerify >= $valueExclude["start"] &&  $timeToVerify <= $valueExclude["end"]) {
                            $includeFlag = false;
                        }
                    }
                    if ($includeFlag) {
                        array_push($hm, $timeToVerify);
                    }
                }
            }
        }
        
        $listHours  = [];
        $dayMomment = "morning";
        foreach ($hm as $value) {
            $pairHour   = [];
            $endTest    = $value;
            $startTest  = $value->format('H:i');
            for ($j=0; $j < 4; $j++) {
                if ($j == 0) {
                    $pairHour["start"] = $startTest;
                }else if ($j == 1){
                    $k1 = $endTest->modify('+'.$serviceData[0]->getDuration().' minute');
                    $includeFlag = true;
                    foreach ($toExclude as $valueExcl) {
                        if ($k1 >= $valueExcl["start"] &&  $k1 <= $valueExcl["end"]) {
                            $includeFlag = false;
                        }
                    }
                    if ($includeFlag) {
                        $k1 = $k1->format('H:i');
                        $pairHour["end"] = $k1;
                    }else{
                        $pairHour["end"] = 'exclude';
                    }
                }else if ($j == 2){
                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                    $k2 = substr(str_shuffle($permitted_chars), 0, 5);
                    $pairHour["uid"] = $k2;
                }else{
                    if ($startTest >= "12:00") {
                        $dayMomment = "afternoon";
                    }
                    if ($startTest >= "19:00") {
                        $dayMomment = "evening";
                    }
                    $pairHour["momment"] = $dayMomment;
                    if ($pairHour["end"] != "exclude") {
                        array_push($listHours, $pairHour);
                    }
                }
            }
        }
        $response = new JsonResponse();
        $response->setData(
            array(
            'status' => 'success',
            'data' => $listHours
            )
        );
        return $response;
    }

}
