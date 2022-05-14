<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Branch;
use AppBundle\Form\BranchType;
use AppBundle\Repository\EbClosion;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Branch controller.
 */
class BranchController extends Controller {

    private $moduleId = 5;

    /**
     * @Route("/backend/branch/{id}", name="backend_branch")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $branch = new Branch();
        $form = $this->createForm(new BranchType(), $branch);
        $form->handleRequest($request);

        $md5Id = $request->get("id");
        $organizationId = $em->getRepository('AppBundle:Organization')->findOneByMd5Id($md5Id);
        $organization = $em->getRepository('AppBundle:Organization')->findOneBy(array(
            "organizationId" => $organizationId
        ));
// Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                $branchExist = $em->getRepository('AppBundle:Branch')->findOneByName($branch->getName());

                if (!$branchExist) {
                    // save
                    $branch->setCreatedAt(new \DateTime());
                    $branch->setCreatedBy($createdBy);
                    $branch->setIsActive('1');
                    $branch->setOrganization($organization);
                    $em->persist($branch);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito'));
                } else {
                    $this->addFlash('error_message', $this->getParameter('error_existente'));
                }

                return $this->redirectToRoute("backend_branch", array("id" => md5($organization->getOrganizationId())));
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }

        $query = $em->getRepository('AppBundle:Branch')->findBy(array("organization" => $organization));


        return $this->render('@App/Backend/Branch/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "organization" => $organization
        ));
    }

    /**
     * @Route("/backend/branch/edit/{id}/{organizationId}", name="backend_branch_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $branchId = $em->getRepository('AppBundle:Branch')->findOneByMd5Id($md5Id);
        $branch = $em->getRepository('AppBundle:Branch')->findOneBy(array(
            "branchId" => $branchId
        ));
        $oldIsActive = $branch->getIsActive();
        $md5Id = $request->get("organizationId");
        $organizationId = $em->getRepository('AppBundle:Organization')->findOneByMd5Id($md5Id);
        $organization = $em->getRepository('AppBundle:Organization')->findOneBy(array(
            "organizationId" => $organizationId
        ));
        if ($branch) {

            $form = $this->createForm(new BranchType(), $branch);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                    $branch->setCreatedAt(new \DateTime());
                    $branch->setCreatedBy($createdBy);
                    $branch->setIsActive($oldIsActive);
                    $branch->setOrganization($organization);
                    $em->persist($branch);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_branch", array("id" => $md5Id));
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/Branch/edit.html.twig', array(
                        "form" => $form->createView(),
                        "organization" => $organization
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_branch", array("id" => $md5Id));
    }

    /**
     * @Route("/backend/branch_delete", name="backend_branch_delete")
     */
    public function branchTypeDelete(Request $request) {
        if ($request->get('id')) {
            $branch = $this->getDoctrine()->getRepository("AppBundle:Branch")->findOneBy(array("branchId" => $request->get('id')));
            if ($branch) {
                $view = '1';
                if ($branch->getIsActive() == '1') {
                    $view = '0';
                }

                $branch->setIsActive($view);

                $em = $this->getDoctrine()->getManager();
                $em->persist($branch);
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
