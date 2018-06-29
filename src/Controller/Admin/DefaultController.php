<?php
namespace App\Controller\Admin;

use App\Entity\Usuario;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class DefaultController
 * @package App\Controller\Admin
 * @Route("/admin", name="admin_")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="default_index")
     * @Template("/admin/default/index.html.twig")
     */
    public function index()
    {
        return [];
    }
    
    /**
     * @Route("/login", name="default_login")
     * @Template("/admin/default/login.html.twig")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return array
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();
        return [
            'error' => $error,
            'last_username' => $lastUsername
        ];
    }
}
