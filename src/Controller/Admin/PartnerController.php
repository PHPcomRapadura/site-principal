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
     * @Route("/create", name="partner_create", methods="GET|POST")
     * @Template("admin/partner/create.html.twig")
     */
    public function create(Request $request)
    {
        $partner = new Partner();
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $partner->setCreatedBy(new \DateTime("now"));
            $partner->setStatus(1);

            $em = $this->getDoctrine()->getManager();
            $em->persist($partner);
            $em->flush();

            $this->addFlash('success', 'Parceiro foi salvo com sucesso!');
            return $this->redirectToRoute('admin_partner_list');
        }

        return [
            'partner' => $partner,
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/{id}/edit", name="partner_edit", methods="GET|POST")
     * @Template("admin/partner/edit.html.twig")
     */
    public function edit(Request $request, Partner $partner)
    {
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Parceiro foi atualizado com sucesso!');
            return $this->redirectToRoute('admin_partner_list');
        }

        return [
            'partner' => $partner,
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/{id}", name="partner_delete", methods="DELETE")
     */
    public function delete(Request $request, Partner $partner)
    {
        if ($this->isCsrfTokenValid('delete'.$partner->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partner);
            $em->flush();
        }

        $this->addFlash('success', 'Parceiro foi deletado com sucesso!');
        return $this->redirectToRoute('admin_partner_list');
    }
}
