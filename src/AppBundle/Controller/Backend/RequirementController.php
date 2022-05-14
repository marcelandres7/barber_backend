<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Requirement;
use AppBundle\Form\RequirementType;
use AppBundle\Repository\EbClosion;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Requirement  controller.
 */
class RequirementController extends Controller {

    private $moduleId = 13;

    /**
     * @Route("/backend/requirement", name="backend_requirement")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $requirement = new Requirement();
        $form = $this->createForm(new RequirementType(), $requirement);
        $form->handleRequest($request);

// Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                $requerimentExist = $em->getRepository('AppBundle:Requirement')->findOneByName($requirement->getName());

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

                return $this->redirectToRoute("backend_requirement");
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }

        $query = $em->getRepository('AppBundle:Requirement')->findBy(array(),array("weight" => "DESC"));
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));


        return $this->render('@App/Backend/Requirement/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "permits" => $mp
        ));
    }

    /**
     * @Route("/backend/requirement/edit/{id}", name="backend_requirement_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $requirementId = $em->getRepository('AppBundle:Requirement')->findOneByMd5Id($md5Id);
        $requirement = $em->getRepository('AppBundle:Requirement')->findOneBy(array(
            "requirementId" => $requirementId
        ));
        $oldIsActive = $requirement->getIsActive();

        if ($requirement) {

            $form = $this->createForm(new RequirementType(), $requirement);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                    $requirement->setUpdatedAt(new \DateTime());
                    $requirement->setUpdatedBy($createdBy);
                    $requirement->setIsActive($oldIsActive);
                    $em->persist($requirement);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_requirement");
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/Requirement/edit.html.twig', array(
                        "form" => $form->createView()
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_requirement");
    }

    /**
     * @Route("/backend/requirement/delete", name="backend_requirement_delete")
     */
    public function requerimentDelete(Request $request) {
        if ($request->get('id')) {
            $requirement = $this->getDoctrine()->getRepository("AppBundle:Requirement")->findOneBy(array("requirementId" => $request->get('id')));
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

    /**
     * @Route("/backend/requirement/selection", name="backend_selection")
     */
    public function zoneAction(Request $request) {

        $cid = $request->get("cid");
        $list = $this->getDoctrine()->getManager()->getRepository('AppBundle:RequirementType')->findBy(array('requirementGroup' => $cid, "isActive" => '1'));

        return $this->render('@App/Backend/Requirement/select.html.twig', array(
                    "list" => $list
        ));
    }
}
