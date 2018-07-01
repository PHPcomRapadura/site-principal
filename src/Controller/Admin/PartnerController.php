<?php

namespace App\Controller\Admin;

use App\Entity\Partner;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class PartnerController
 * @package App\Controller\Admin
 * @Route("/admin/partner", name="admin_")
 */
class PartnerController extends Controller
{
    /**
     * @Route("/", name="partner_list")
     * @Template("/admin/partner/index.html.twig")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $partners = $entityManager->getRepository(Partner::class)->findAll();

        return [
            'partners' => $partners
        ];
    }
}
