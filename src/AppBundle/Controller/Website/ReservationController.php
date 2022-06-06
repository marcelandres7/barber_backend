<?php

namespace AppBundle\Controller\Website;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\SummaryService;
use AppBundle\Entity\Client;

/**
 * Reservation controller.
 */
class ReservationController extends Controller {

    private $moduleId = 17;

    /**
     * @Route("/reservation", name="reservation")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('AppBundle:Menus')->findBy(["menuType" => [2,4], "isActive"=>1]);
        return $this->render('@App/Website/Reservation/index.html.twig', array(
                    "list" => $list,
                    "view" => "services"
        ));
    }

    /**
     * @Route("/get/professional/hours", name="get_profs_hours")
     */
    public function GetProfessionalHoursAction(Request $request) {

        $idMenusStr = $request->get("id");
        $idMenus = explode(",",$idMenusStr);
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $idProfMenus = $this->getDoctrine()->getRepository('AppBundle:SummaryService')->getProfMenus( $idMenusStr );
        $idprofString = '';
        foreach ($idProfMenus as $value) {
            if (strlen($idprofString) == 0) {
                $idprofString = $value['id_profs'];
            }else{
                $idprofString = $idprofString.",".$value['id_profs'];
            }
        }
        if ($idprofString == '') {
            $this->addFlash('error_message', 'No hay Profesionales disponibles para este servicio');
            return $this->redirectToRoute("reservation");
        }
        $serviceData = $em->getRepository('AppBundle:Menus')->findBy(["menuId" => $idMenus]);
        $totalPrice = 0;
        $totalDuration = 0;
        $totales = [];
        foreach ($serviceData as $value) {
            $totalPrice = $totalPrice + $value->getPrice();
            $totalDuration = $totalDuration + $value->getDuration();
        }
        $totales["totalPrice"] = $totalPrice;
        $totales["totalDuration"] = $totalDuration;
        $profMenus = $em->getRepository('AppBundle:User')->findBy(["id" => explode(",",$idprofString)]);
        $dateTime   = new \DateTime();
        $dateNow    = $dateTime->format('Y-m-d H:i:s');
        $form = $this->createFormBuilder()
            ->add('firstName', 'text')
            ->add('lastName', 'text')
            ->add('email', 'email')
            ->add('phone', 'text')
            ->add('message', 'textarea')
            ->add('services', 'hidden')
            ->add('professional', 'hidden')
            ->add('scheduledTo', 'hidden')
            ->add('organization', 'hidden')
            ->add('send', 'submit')
            ->getForm();
        $form->handleRequest($request);
        return $this->render('@App/Website/Reservation/index.html.twig', array(
            "form" => $form->createView(),
            "service" => $serviceData,
            "totales" => $totales,
            "prof" => $profMenus,
            "day" => $dateNow,
            "view" => "prof_hours"
        ));
        
    }

    /**
     * @Route("/get/list/hours/available", name="get_list_hours_available")
     */
    public function GetListHoursAvailableAction(Request $request) {

        $pId = $request->get("p_id");
        $sId = $request->get("s_id");
        $sIdArray = explode(",",$sId);
        $dateSearch = $request->get("date");
        $em = $this->getDoctrine()->getManager();
        $serviceData = $em->getRepository('AppBundle:Menus')->findBy(["menuId" => $sIdArray]);
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
        $hours = ["00","01","02","03","04","05","06","07","07","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23"];
        $minutes = ["00","15","30","45"];
        $hm = [];
        foreach ($hours as $valH) {
            if (intval($valH)>8 && intval($valH)<12) {
                foreach ($minutes as $valM) {
                    $hourMinutes    = $dateSearch." ".$valH.":".$valM;
                    $timeToVerify   = new \DateTime($hourMinutes);
                    $includeFlag    = true;
                    foreach ($toExclude as $valueExclude) {
                        if ($timeToVerify >= $valueExclude["start"] &&  $timeToVerify <= $valueExclude["end"]) {
                            $includeFlag = false;
                        }
                    }
                    if ($timeToVerify <= new \DateTime()) {
                        $includeFlag = false;
                    }
                    if ($includeFlag) {
                        array_push($hm, $timeToVerify);
                    }
                }
            }
            if (intval($valH)>=14 && intval($valH)<20) {
                foreach ($minutes as $valM) {
                    $hourMinutes    = $valH.":".$valM;
                    $timeToVerify   = new \DateTime($hourMinutes);
                    $includeFlag    = true;
                    foreach ($toExclude as $valueExclude) {
                        if ($timeToVerify >= $valueExclude["start"] &&  $timeToVerify <= $valueExclude["end"]) {
                            $includeFlag = false;
                        }
                    }
                    if ($timeToVerify <= new \DateTime()) {
                        $includeFlag = false;
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

    /**
     * @Route("/reservation/create", name="reservation_create")
     */
    public function CreateReservationAction(Request $request){
        $data = $request->get('form');
        $em = $this->getDoctrine()->getManager();
        $clientObj = $em->getRepository('AppBundle:Client')->findOneBy(["email" => $data['email']]);
        $userObj = $em->getRepository('AppBundle:User')->findOneBy(["id" => $data['professional']]);
        $orgObj = $em->getRepository('AppBundle:Organization')->findOneBy(["organizationId" => $data['organization']]);
        $arrServices = explode(',',$data['services']);
        $totalPrice = 0;
        if (count($arrServices)>0) {
            foreach ($arrServices as $value) {
                $serviceObj = $em->getRepository('AppBundle:Menus')->findOneBy(["menuId" => $value]);
                $totalPrice = $totalPrice + $serviceObj->getPrice();
            }
        }
        $statusObj = $em->getRepository('AppBundle:Status')->findOneBy(["statusId" => 6]);
        if (!$clientObj) {
            $clientObj = new Client();
            $clientObj->setName($data['firstName'].' '.$data['lastName']);
            $clientObj->setEmail($data['email']);
            $clientObj->setPhone($data['phone']);
            $clientObj->setRegister(0);
            $clientObj->setPromotion(0);
            $clientObj->setCreatedAt(new \DateTime());
            $em->persist($clientObj);
        }
        $sumaryServiceObj = new SummaryService();
        $sumaryServiceObj->setClient($clientObj);
        $sumaryServiceObj->setProfessional($userObj);
        $sumaryServiceObj->setOrganization($orgObj);
        $sumaryServiceObj->setScheduledTo(new \DateTime($data['scheduledTo']));
        $sumaryServiceObj->setTotalPayment($totalPrice);
        $sumaryServiceObj->setServices($data['services']);
        $sumaryServiceObj->setStatus($statusObj);
        $em->persist($sumaryServiceObj);
        $em->flush();
        $this->addFlash('success_message', $this->getParameter('exito'));
        return $this->redirectToRoute('reservation');
    }

}
