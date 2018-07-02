<?php

namespace App\Controller\Admin;

use App\Entity\Partner;
use App\Form\PartnerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/create", name="partner_create")
     * @Template("admin/partner/create.html.twig")
     * @param Request $request
     * @return array
     */
    public function create(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $name = $request->get('name');
            $slug = $request->get('slug');
            $type = $request->get('type');

            $partner = new Partner();
            $partner->setName($name);
            $partner->setSlug($slug);
            $partner->setType($type == "1" ? "Patrocinador" : "Apoiador");
            $partner->setCreatedAt(new \DateTime("now"));
            $partner->setCreatedBy(new \DateTime("now"));
            $partner->setStatus(1);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partner);
            $entityManager->flush();

            $this->addFlash('success', 'Parceiro foi salvo com sucesso!');
            return $this->redirectToRoute('admin_partner_list');
        }

        return [];
    }
}
