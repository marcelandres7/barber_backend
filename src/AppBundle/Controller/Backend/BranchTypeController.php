<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\BranchType;
use AppBundle\Form\BranchTypeType;
use AppBundle\Repository\EbClosion;

/**
 * Branch type controller.
 */
class BranchTypeController extends Controller {

    private $moduleId = 6;

    /**
     * @Route("/backend/type", name="backend_branch_type")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $branchType = new BranchType();
        $form = $this->createForm(new BranchTypeType(), $branchType);
        $form->handleRequest($request);

        // Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                $branchTypeExist = $em->getRepository('AppBundle:BranchType')->findOneByName($branchType->getName());

                if (!$branchTypeExist) {
                    // save
                    $em->persist($branchType);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito'));
                } else {
                    $this->addFlash('error_message', $this->getParameter('error_existente'));
                }

                return $this->redirectToRoute("backend_branch_type");
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }

        $query = $em->getRepository('AppBundle:BranchType')->findAll();

        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));

        return $this->render('@App/Backend/BranchType/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "permits" => $mp
        ));
    }

    /**
     * @Route("/backend/type/edit/{id}", name="backend_branch_type_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $branchTypeId = $em->getRepository('AppBundle:BranchType')->findOneByMd5Id($md5Id);
        $branchType = $em->getRepository('AppBundle:BranchType')->findOneBy(array(
            "branchTypeId" => $branchTypeId
        ));

        if ($branchType) {

            $form = $this->createForm(new BranchTypeType(), $branchType);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $em->persist($branchType);
                    $em->flush();
                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_branch_type");
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/BranchType/edit.html.twig', array(
                        "form" => $form->createView()
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_branch_type");
    }

    /**
     * @Route("/backend/type/delete/{id}", name="backend_branch_type_delete")
     */
    public function deleteAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $branchTypeId = $em->getRepository('AppBundle:BranchType')->findOneByMd5Id($md5Id);
        $branchType = $em->getRepository('AppBundle:BranchType')->findOneBy(array(
            "branchTypeId" => $branchTypeId
        ));

        if ($branchType) {

            $branch = $this->getDoctrine()->getRepository('AppBundle:Branch')->findOneByBranchType($branchType);
            if (!$branch) {
                $em->remove($branchType);
                $em->flush();

                $this->addFlash('success_message', $this->getParameter('exito_eliminar'));
            } else {
                $this->addFlash('alert_message', 'Este tipo de sucursal actualmente se esta usando en la sucursal <b>'.$branch->getName().'</b>');
            }
        } else {
            $this->addFlash('error_message', $this->getParameter('error_eliminar'));
        }

        return $this->redirectToRoute("backend_branch_type");
    }

}
