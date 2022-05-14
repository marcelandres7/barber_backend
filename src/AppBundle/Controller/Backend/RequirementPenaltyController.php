<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\RequirementPenalty;
use AppBundle\Form\RequirementPenaltyType;
use AppBundle\Repository\EbClosion;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Requirement Penalty controller.
 */
class RequirementPenaltyController extends Controller {

    private $moduleId = 9;

    /**
     * @Route("/backend/requirement/penalty", name="backend_requirement_penalty")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $requirement = new RequirementPenalty();
        $form = $this->createForm(new RequirementPenaltyType(), $requirement);
        $form->handleRequest($request);

// Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                $requerimentExist = $em->getRepository('AppBundle:RequirementPenalty')->findOneByName($requirement->getName());

                if (!$requerimentExist) {
                    // save
                    $requirement->setCreatedAt(new \DateTime());
                    $requirement->setCreatedBy($createdBy);
                    $requirement->setIsActive('1');
                    $em->persist($requirement);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito'));
                } else {
                    $this->addFlash('error_message', $this->getParameter('error_existente'));
                }

                return $this->redirectToRoute("backend_requirement_penalty");
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }

        $query = $em->getRepository('AppBundle:RequirementPenalty')->findAll();
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));


        return $this->render('@App/Backend/RequirementPenalty/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "permits" => $mp
        ));
    }

    /**
     * @Route("/backend/requirement/penalty/edit/{id}", name="backend_requirement_penalty_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $requirementId = $em->getRepository('AppBundle:RequirementPenalty')->findOneByMd5Id($md5Id);
        $requirement = $em->getRepository('AppBundle:RequirementPenalty')->findOneBy(array(
            "requirementPenaltyId" => $requirementId
        ));
        $oldIsActive = $requirement->getIsActive();

        if ($requirement) {

            $form = $this->createForm(new RequirementPenaltyType(), $requirement);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                    $requirement->setCreatedAt(new \DateTime());
                    $requirement->setCreatedBy($createdBy);
                    $requirement->setIsActive($oldIsActive);
                    $em->persist($requirement);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_requirement_penalty");
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/RequirementPenalty/edit.html.twig', array(
                        "form" => $form->createView()
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_requirement_penalty");
    }

    /**
     * @Route("/backend/requirement/penalty/delete", name="backend_requirement_penalty_delete")
     */
    public function requerimentPenaltyDelete(Request $request) {
        if ($request->get('id')) {
            $requirement = $this->getDoctrine()->getRepository("AppBundle:RequirementPenalty")->findOneBy(array("requirementPenaltyId" => $request->get('id')));
            if ($requirement) {
                $view = '1';
                if ($requirement->getIsActive() == '1') {
                    $view = '0';
                }

                $requirement->setIsActive($view);

                $em = $this->getDoctrine()->getManager();
                $em->persist($requirement);
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
