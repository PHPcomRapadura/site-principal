<?php
namespace App\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}
