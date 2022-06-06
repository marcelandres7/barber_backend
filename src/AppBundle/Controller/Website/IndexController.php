<?php

namespace AppBundle\Controller\Website;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller {

    
    /**
     * @Route("/", name="homepage_index")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need
         //return $this->redirectToRoute("backend_login");
         return $this->render('@App/index.html.twig');
    }

}
