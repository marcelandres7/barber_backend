<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\RequirementType;
use AppBundle\Form\RequirementTypeType;
use AppBundle\Repository\EbClosion;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Requirement Type controller.
 */
class RequirementTypeController extends Controller {

    private $moduleId = 8;

    /**
     * @Route("/backend/requirement/type", name="backend_requirement_type")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $requirement = new RequirementType();
        $form = $this->createForm(new RequirementTypeType(), $requirement);
        $form->handleRequest($request);

// Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                    // save
                    $requirement->setCreatedAt(new \DateTime());
                    $requirement->setCreatedBy($createdBy);
                    $requirement->setIsActive('1');
                    $em->persist($requirement);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito'));

                return $this->redirectToRoute("backend_requirement_type");
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }

        $query = $em->getRepository('AppBundle:RequirementType')->findBy(array(),array("weight" => "DESC"));
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));


        return $this->render('@App/Backend/RequirementType/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "permits" => $mp
        ));
    }

    /**
     * @Route("/backend/requirement/type/edit/{id}", name="backend_requirement_type_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $requirementId = $em->getRepository('AppBundle:RequirementType')->findOneByMd5Id($md5Id);
        $requirement = $em->getRepository('AppBundle:RequirementType')->findOneBy(array(
            "requirementTypeId" => $requirementId
        ));
        $oldIsActive = $requirement->getIsActive();

        if ($requirement) {

            $form = $this->createForm(new RequirementTypeType(), $requirement);
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
                    return $this->redirectToRoute("backend_requirement_type");
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/RequirementType/edit.html.twig', array(
                        "form" => $form->createView()
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_requirement_type");
    }

    /**
     * @Route("/backend/requirement/type/delete", name="backend_requirement_type_delete")
     */
    public function requerimentTypeDelete(Request $request) {
        if ($request->get('id')) {
            $requirement = $this->getDoctrine()->getRepository("AppBundle:RequirementType")->findOneBy(array("requirementTypeId" => $request->get('id')));
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
