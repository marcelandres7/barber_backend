<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\RequirementItem;
use AppBundle\Form\RequirementItemType;
use AppBundle\Repository\EbClosion;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Requirement item controller.
 */
class RequirementItemController extends Controller {

    private $moduleId = 13;

    /**
     * @Route("/backend/requirement/item/{id}", name="backend_requirement_item")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $requirement = new RequirementItem();
        $form = $this->createForm(new RequirementItemType(), $requirement);
        $form->handleRequest($request);


        $md5Id = $request->get("id");
        $reId = $em->getRepository('AppBundle:Requirement')->findOneByMd5Id($md5Id);
        $re = $em->getRepository('AppBundle:Requirement')->findOneBy(array(
            "requirementId" => $reId
        ));
// Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                // save
                $requirement->setCreatedAt(new \DateTime());
                $requirement->setCreatedBy($createdBy);
                $requirement->setIsActive('1');
                $requirement->setRequirement($re);
                $em->persist($requirement);
                $em->flush();

                $this->addFlash('success_message', $this->getParameter('exito'));

                return $this->redirectToRoute("backend_requirement_item", array("id" => $md5Id));
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }

        $query = $em->getRepository('AppBundle:RequirementItem')->findBy(array("requirement" => $re));

        return $this->render('@App/Backend/RequirementItem/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "requirement" => $re
        ));
    }

    /**
     * @Route("/backend/requirement/item/edit/{id}", name="backend_requirement_item_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $requirementId = $em->getRepository('AppBundle:RequirementItem')->findOneByMd5Id($md5Id);
        $requirement = $em->getRepository('AppBundle:RequirementItem')->findOneBy(array(
            "requirementItemId" => $requirementId
        ));
        $oldIsActive = $requirement->getIsActive();
        $oldRequeriment = $requirement->getRequirement();
        if ($requirement) {

            $form = $this->createForm(new RequirementItemType(), $requirement);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                    $requirement->setUpdatedAt(new \DateTime());
                    $requirement->setUpdatedBy($createdBy);
                    $requirement->setIsActive($oldIsActive);
                    $requirement->setRequirement($oldRequeriment);
                    $em->persist($requirement);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_requirement_item", array("id" => md5($oldRequeriment->getRequirementId())));
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/RequirementItem/edit.html.twig', array(
                        "form" => $form->createView(),
                        "requirement" => $oldRequeriment
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_requirement_item", array("id" => md5($oldRequeriment->getRequirementId())));
    }

    /**
     * @Route("/backend/requirement-item/delete", name="backend_requirement_item_delete")
     */
    public function requerimentItemDelete(Request $request) {
        if ($request->get('id')) {
            $requirement = $this->getDoctrine()->getRepository("AppBundle:RequirementItem")->findOneBy(array("requirementItemId" => $request->get('id')));
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
