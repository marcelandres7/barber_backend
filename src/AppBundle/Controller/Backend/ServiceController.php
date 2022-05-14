<?php

namespace AppBundle\Controller\Backend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Service;
use AppBundle\Form\ServiceType;
use AppBundle\Repository\EbClosion;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Service controller.
 */
class ServiceController extends Controller {

    private $moduleId = 7;

    /**
     * @Route("/backend/service", name="backend_service")
     */
    public function indexAction(Request $request) {
        $this->get("session")->set("module_id", $this->moduleId);
        $em = $this->getDoctrine()->getManager();
        $service = new Service();
        $form = $this->createForm(new ServiceType(), $service);
        $form->handleRequest($request);
        $userData = $this->get("session")->get("userData");

        // Validar formulario
        if ($form->isSubmitted()) {
            if ($form->isValid()) {

                $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                $serviceExist = $em->getRepository('AppBundle:Service')->findOneByName($service->getName());

                if (!$serviceExist) {
                    // save
                    $service->setCreatedAt(new \DateTime());
                    $service->setCreatedBy($createdBy);
                    $service->setIsActive('1');
                    $em->persist($service);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito'));
                } else {
                    $this->addFlash('error_message', $this->getParameter('error_existente'));
                }

                return $this->redirectToRoute("backend_service");
            } else {
                $this->addFlash('error_message', $this->getParameter('error_form'));
            }
        }
        $organization = null;
        if ($userData['role_id'] == '2') {
            $organization = $em->getRepository('AppBundle:Organization')->findOneBy(array("organizationId" => $userData['organization_id']));
        }
        $query = $em->getRepository('AppBundle:Service')->findAll();
        $mp = EbClosion::getModulePermission($this->moduleId, $this->get("session")->get("userModules"));


        return $this->render('@App/Backend/Service/index.html.twig', array(
                    "form" => $form->createView(),
                    "list" => $query,
                    "permits" => $mp,
                    "organization" => $organization
        ));
    }

    /**
     * @Route("/backend/service/edit/{id}", name="backend_service_edit")
     */
    public function editAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $md5Id = $request->get("id");
        $serviceId = $em->getRepository('AppBundle:Service')->findOneByMd5Id($md5Id);
        $service = $em->getRepository('AppBundle:Service')->findOneBy(array(
            "serviceId" => $serviceId
        ));
        $oldIsActive = $service->getIsActive();

        if ($service) {

            $form = $this->createForm(new ServiceType(), $service);
            $form->handleRequest($request);

            if ($form->isSubmitted()) {
                if ($form->isValid()) {

                    $createdBy = $em->getRepository('AppBundle:User')->findOneBy(array("id" => $this->getUser()->getId()));

                    $service->setCreatedAt(new \DateTime());
                    $service->setCreatedBy($createdBy);
                    $service->setIsActive($oldIsActive);
                    $em->persist($service);
                    $em->flush();

                    $this->addFlash('success_message', $this->getParameter('exito_actualizar'));
                    return $this->redirectToRoute("backend_service");
                } else {
                    $this->addFlash('alert_message', $this->getParameter('error_form'));
                }
            }
            return $this->render('@App/Backend/Service/edit.html.twig', array(
                        "form" => $form->createView()
            ));
        } else {
            $this->addFlash('error_message', $this->getParameter('error_editar'));
        }
        return $this->redirectToRoute("backend_service");
    }

    /**
     * @Route("/backend/service/delete", name="backend_service_delete")
     */
    public function serviceDelete(Request $request) {
        if ($request->get('id')) {
            $service = $this->getDoctrine()->getRepository("AppBundle:Service")->findOneBy(array("serviceId" => $request->get('id')));
            if ($service) {
                $view = '1';
                if ($service->getIsActive() == '1') {
                    $view = '0';
                }

                $service->setIsActive($view);

                $em = $this->getDoctrine()->getManager();
                $em->persist($service);
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
