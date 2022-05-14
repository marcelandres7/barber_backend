<?php
namespace AppBundle\EventListener;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Router;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthenticationClientEventListener implements 
        AuthenticationSuccessHandlerInterface
{

    protected $router;

    protected $container;

    protected $em;
    
    protected $session;

    public function __construct (Router $router, $container, Session $session)
    {
        $this->router = $router;        
        $this->container = $container;
        $this->em = $this->container->get('doctrine')->getManager();
        $this->session = $session;
    }

    public function onAuthenticationSuccess (Request $request, 
            TokenInterface $token)
    {
        
        // Get data for session info
        $user = $token->getUser();
        $session = $request->getSession();
        // var_dump($user);die;
        if ($user) {
            $userData = $this->em->getRepository ('AppBundle:User')
                ->login($user);

            
            
            if (!$userData) {
                
                //$this->session->clear();
                //$this->session->invalidate(1);
                $this->session->getFlashBag()->add('login_error', 'Error de autenticaci&oacute;n, por favor contacte al administrador del sistema.');
                
                $response = new RedirectResponse($this->router->generate("frontend_login"));
                return $response;
            }
            
            // $modules = $this->em->getRepository('AppBundle:User')->getModuleCatalog(
            //         $userData["user_role_id"]);
            
            // // main module
            // $mm = $this->em->getRepository('AppBundle:UserRoleModulePermission')->findOneBy(
            //         array(
            //                 "userRole" => 3, "mainModule" => 1));
                
            // // Create session variables
            // $session->set("userModules", $modules);
            $session->set("_environtment", "_cli");
// var_dump($user,$userData,$session);die;
           // var_dump($session->get('return'));die;
            if ($session->get('return')){
                $ruta = $session->get('return');
            }else{
                $ruta = 'frontend_menu';
            }
            $response = new RedirectResponse($this->router->generate($ruta));
            return $response;
        }
    }

}

?>