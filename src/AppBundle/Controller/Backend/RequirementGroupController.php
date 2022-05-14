<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\RequirementGroup;
use AppBundle\Form\RequirementGroupType;
use AppBundle\Repository\EbClosion;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Requirement Group controller.
 */
class RequirementGroupController extends Controller {

    private $moduleId = 12;

    /**
     * @Route("/backend/requirement/group", name="backend_requirement_group")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $requirement = new RequirementGroup();
        $form = $this->createForm(new RequirementGroupType(), $requirement);
        $form->handleRequest($request);

// Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                $requerimentExist = $em->getRepository('AppBundle:RequirementGroup')->findOneByName($requirement->getName());

                if (!$requerimentExist) {
                    // save
                    $em->persist($requirement);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito'));
                } else {
                    $this->addFlash('error_message', $this->getParameter('error_existente'));
                }

                return $this->redirectToRoute("backend_requirement_group");
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }

        $query = $em->getRepository('AppBundle:RequirementGroup')->findAll();
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));


        return $this->render('@App/Backend/RequirementGroup/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "permits" => $mp
        ));
    }

    /**
     * @Route("/backend/requirement/group/edit/{id}", name="backend_requirement_group_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $requirementId = $em->getRepository('AppBundle:RequirementGroup')->findOneByMd5Id($md5Id);
        $requirement = $em->getRepository('AppBundle:RequirementGroup')->findOneBy(array(
            "requirementGroupId" => $requirementId
        ));

        if ($requirement) {

            $form = $this->createForm(new RequirementGroupType(), $requirement);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                    $em->persist($requirement);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_requirement_group");
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/RequirementGroup/edit.html.twig', array(
                        "form" => $form->createView()
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_requirement_group");
    }

    /**
     * @Route("/backend/requirement/group/delete/{id}", name="backend_requirement_group_delete")
     */
    public function deleteAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $requirementId = $em->getRepository('AppBundle:RequirementGroup')->findOneByMd5Id($md5Id);
        $requirement = $em->getRepository('AppBundle:RequirementGroup')->findOneBy(array(
            "requirementGroupId" => $requirementId
        ));
        if ($requirement) {

            $requirementAsociate = $this->getDoctrine()->getRepository('AppBundle:RequirementType')->findOneByRequirementGroup($requirement);
            if (!$requirementAsociate) {
                $em->remove($requirement);
                $em->flush();

                $this->addFlash('success_message', $this->getParameter('exito_eliminar'));
            } else {
                $this->addFlash('alert_message', 'Este grupo de requisitos actualmente se esta usando en el tipo de requisito <b>'.$requirementAsociate->getName().'</b>');
            }
        } else {
            $this->addFlash('error_message', $this->getParameter('error_eliminar'));
        }

        return $this->redirectToRoute("backend_requirement_group");
    }

}
