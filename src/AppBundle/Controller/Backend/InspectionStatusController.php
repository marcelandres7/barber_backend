<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\InspectionStatus;
use AppBundle\Form\InspectionStatusType;
use AppBundle\Repository\EbClosion;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Inspection Status controller.
 */
class InspectionStatusController extends Controller {

    private $moduleId = 10;

    /**
     * @Route("/backend/inspection/status", name="backend_inspection_status")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $inspection = new InspectionStatus();
        $form = $this->createForm(new InspectionStatusType(), $inspection);
        $form->handleRequest($request);

// Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                $inspectionExist = $em->getRepository('AppBundle:InspectionStatus')->findOneByName($inspection->getName());

                if (!$inspectionExist) {
                    // save
                    $inspection->setCreatedAt(new \DateTime());
                    $inspection->setCreatedBy($this->getUser()->getId());
                    $inspection->setIsActive('1');
                    $em->persist($inspection);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito'));
                } else {
                    $this->addFlash('error_message', $this->getParameter('error_existente'));
                }

                return $this->redirectToRoute("backend_inspection_status");
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }

        $query = $em->getRepository('AppBundle:InspectionStatus')->findBy(array(),array('weight' => 'ASC'));
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));

        return $this->render('@App/Backend/InspectionStatus/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "permits" => $mp
        ));
    }

    /**
     * @Route("/backend/inspection/status/edit/{id}", name="backend_inspection_status_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $inspectionId = $em->getRepository('AppBundle:InspectionStatus')->findOneByMd5Id($md5Id);
        $inspection = $em->getRepository('AppBundle:InspectionStatus')->findOneBy(array(
            "inspectionStatusId" => $inspectionId
        ));
        $oldIsActive = $inspection->getIsActive();
        if ($inspection) {

            $form = $this->createForm(new InspectionStatusType(), $inspection);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                    $inspection->setCreatedAt(new \DateTime());
                    $inspection->setCreatedBy($this->getUser()->getId());
                    $inspection->setIsActive($oldIsActive);
                    $em->persist($inspection);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_inspection_status");
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/InspectionStatus/edit.html.twig', array(
                        "form" => $form->createView()
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_inspection_status");
    }

    /**
     * @Route("/backend/inspection/status/delete", name="backend_inspection_status_delete")
     */
    public function branchTypeDelete(Request $request) {
        if ($request->get('id')) {
            $inspection = $this->getDoctrine()->getRepository("AppBundle:InspectionStatus")->findOneBy(array("inspectionStatusId" => $request->get('id')));
            if ($inspection) {
                $view = '1';
                if ($inspection->getIsActive() == '1') {
                    $view = '0';
                }

                $inspection->setIsActive($view);

                $em = $this->getDoctrine()->getManager();
                $em->persist($inspection);
                $em->flush();

                //Para responderle a una solicitud de AJAX se utiliza JsonResponse() de la siquiente forma, enviando los parametros que deseas responder
                $response = new JsonResponse();
                $response->setData(array('status' => 'success'));
                return $response;
            }
        }


        $response = new JsonResponse();
        $response->setData(array('status' => 'error'));
        return $response;
    }

}
