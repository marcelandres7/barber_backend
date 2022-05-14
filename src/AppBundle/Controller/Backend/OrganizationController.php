<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Organization;
use AppBundle\Form\OrganizationType;
use AppBundle\Repository\EbClosion;

/**
 * Organization controller.
 */
class OrganizationController extends Controller {

    private $moduleId = 4;

    /**
     * @Route("/backend/organization", name="backend_organization")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $organization = new Organization();
        $form = $this->createForm(new OrganizationType(), $organization);
        $form->handleRequest($request);
        $userData = $this->get("session")->get("userData");
        
        // Validar formulario
        if ($form->isSubmitted()) {
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
        }

        if ($userData['role_id'] != '2') {
            $query = $em->getRepository('AppBundle:Organization')->findAll();
        } else {
            $query = $em->getRepository('AppBundle:Organization')->findBy(array("organizationId" => $userData['organization_id']));
        }
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));

        return $this->render('@App/Backend/Organization/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "permits" => $mp
        ));
    }

    /**
     * @Route("/backend/organization/edit/{organizationId}", name="backend_organization_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("organizationId");
        $organizationId = $em->getRepository('AppBundle:Organization')->findOneByMd5Id($md5Id);
        $organization = $em->getRepository('AppBundle:Organization')->findOneBy(array(
            "organizationId" => $organizationId
        ));

        if ($organization) {

            $form = $this->createForm(new OrganizationType(), $organization);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $updatedBy = $em->getRepository('AppBundle:User')->findOneBy(array(
                        "id" => $this->getUser()->getId()
                    ));

                    $organization->setUpdatedAt(new \DateTime());
                    $organization->setUpdatedBy($updatedBy);
                    $em->persist($organization);
                    $em->flush();
                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_organization");
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/Organization/edit.html.twig', array(
                        "form" => $form->createView()
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_organization");
    }

    /**
     * @Route("/backend/organization/delete/{organizationId}", name="backend_organization_delete")
     */
    public function deleteAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("organizationId");
        $organizationId = $em->getRepository('AppBundle:Organization')->findOneByMd5Id($md5Id);
        $organization = $em->getRepository('AppBundle:Organization')->findOneBy(array(
            "organizationId" => $organizationId
        ));

        if ($organization) {
            $updatedBy = $em->getRepository('AppBundle:User')->findOneBy(array(
                "id" => $this->getUser()->getId()
            ));

            // Softdelete
            $organization->setUpdatedAt(new \DateTime());
            $organization->setUpdatedBy($updatedBy);
            $organization->setStatus('INACTIVO');
            $em->persist($organization);
            $em->flush();

            $this->addFlash('success_message', $this->getParameter('exito_eliminar'));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_eliminar'));
        }

        return $this->redirectToRoute("backend_organization");
    }

}
