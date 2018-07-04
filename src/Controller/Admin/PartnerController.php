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
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
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
     * @Route("/{id}", name="partner_show", methods="GET")
     * @Template("admin/partner/show.html.twig")
     * @param Partner $partner
     * @return array
     */
    public function show(Partner $partner)
    {
        return ['partner' => $partner];
    }

    /**
     * @Route("/{id}/edit", name="partner_edit", methods="GET|POST")
     * @Template("admin/partner/edit.html.twig")
     * @param Request $request
     * @param Partner $partner
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
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
     * @param Request $request
     * @param Partner $partner
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function delete(Request $request, Partner $partner)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $partnerEnt = $entityManager->getRepository(Partner::class)->find($partner->getId());

        if (!$partnerEnt) {
            $this->addFlash('warning', 'Parceiro não encontrado!');
            return $this->redirectToRoute('admin_partner_list');
        }

        if ($this->isCsrfTokenValid('delete'.$partner->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partner);
            $em->flush();
        }

        $this->addFlash('success', 'Parceiro foi deletado com sucesso!');
        return $this->redirectToRoute('admin_partner_list');
    }
}
