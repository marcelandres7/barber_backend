<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\SumaryService;
use AppBundle\Form\OrganizationType;
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
        //$organization = new Organization();
        //$form = $this->createForm(new OrganizationType(), $organization);
        //$form->handleRequest($request);
        $userData = $this->get("session")->get("userData");
        
        // Validar formulario
        /*if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array(
                    "id" => $this->getUser()->getId()
                ));

                $organizationExist = $em->getRepository('AppBundle:Organization')->findOneByName($organization->getName());

                if (!$organizationExist) {
                    // save
                    $organization->setCreatedAt(new \DateTime());
                    $organization->setCreatedBy($createdBy);
                    $em->persist($organization);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito'));
                } else {
                    $this->addFlash('error_message', $this->getParameter('error_existente'));
                }

                return $this->redirectToRoute("backend_organization");
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }*/

        /*if ($userData['role_id'] != '2') {
            $query = $em->getRepository('AppBundle:Organization')->findAll();
        } else {
            $query = $em->getRepository('AppBundle:Organization')->findBy(array("organizationId" => $userData['organization_id']));
        }*/
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
        $profWService = $this->getDoctrine()->getRepository('AppBundle:SummaryService')->getHoursScheduled( $idProfMenus[0]['id_profs'] );
        $serviceData = $em->getRepository('AppBundle:Menus')->findBy(["menuId" => $idMenus]);
        $profMenus = $em->getRepository('AppBundle:User')->findBy(["id" => explode(",",$idProfMenus[0]['id_profs'])]);
        $dateTime   = new \DateTime();
        $dateNow    = $dateTime->format('Y-m-d H:i:s');
        $hours = ["00","01","02","03","04","05","06","07","07","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23"];
        $minutes = ["00","15","30","45"];
        $hm = [];
        foreach ($hours as $valH) {
            if (intval($valH)>8 && intval($valH)<=17) {
                foreach ($minutes as $valM) {
                    $hourMinutes = $valH.":".$valM;
                    array_push($hm, new \DateTime($hourMinutes));
                }
            }
        }
        $listHours = [];
        foreach ($hm as $value) {
            $pairHour = [];
            for ($j=0; $j < 2; $j++) {
                if ($j == 0) {
                    $pairHour["start"] = $value->format('H:i');
                }else{
                    $k1 = $value->modify('+45 minute');
                    $k1 = $k1->format('H:i');
                    $pairHour["end"] = $k1;
                    array_push($listHours, $pairHour);
                }
            }
        }
        return $this->render('@App/Backend/Reservation/index.html.twig', array(
            "permits" => $mp,
            "service" => $serviceData,
            "prof" => $profMenus,
            "day" => $dateNow,
            "listHours" => $listHours,
            "view" => "prof_hours"
        ));
        

    }

}
