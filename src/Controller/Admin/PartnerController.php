<?php

namespace App\Controller\Admin;

use App\Entity\Partner;
use App\Form\PartnerType;
use App\Repository\PartnerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class PartnerController
 * @package App\Controller\Admin
 * @Route("/admin/partner", name="admin_")
 */
class PartnerController extends Controller
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="partner_list")
     * @Template("/admin/partner/index.html.twig")
     * @param Request $request
     * @param PartnerRepository $partnerRepository
     * @return array
     */
    public function index(Request $request, PartnerRepository $partnerRepository)
    {
        $partner = new Partner();
        $form = $this->createForm(PartnerType::class);
        $filters = $request->get('partner', []);
        $dataProvider = $partnerRepository->getDataProvider($filters);
        if (!empty($filters)) {
            $partner->setName($filters['name']);
            $partner->setType($filters['type']);
        }
        $form->setData($partner);
        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($dataProvider));
        $pagerfanta->setMaxPerPage($this->getParameter('pagination')['per_page']);
        $pagerfanta->setCurrentPage($request->get('page', 1));
        return [
            'pager' => $pagerfanta,
            'partners' => $pagerfanta->getCurrentPageResults(),
            'form' => $form->createView()
        ];
    }


    /**
     * @Route("/create", name="partner_create", methods="GET|POST")
     * @Template("admin/partner/create.html.twig")
     * @param Request $request
     * @param UserInterface $user
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function create(Request $request, UserInterface $user)
    {
        $partner = new Partner();
        $form = $this->createForm(PartnerType::class, $partner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $partner->getImage();
            if ($image != null) {
                $imageName = md5(time()) . "." . $image->guessExtension();
                $image->move($this->getParameter('path_partner'), $imageName);
                $partner->setImage($imageName);
            }
            $partner->setCreatedBy($user);

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
            $image = $partner->getImage();
            if ($image != null) {
                $imageName = md5(time()) . "." . $image->guessExtension();
                $image->move($this->getParameter('path_partner'), $imageName);
                $partner->setImage($imageName);
            }

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

        if ($this->isCsrfTokenValid('delete' . $partner->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($partner);
            $em->flush();
        }

        $this->addFlash('success', 'Parceiro foi deletado com sucesso!');
        return $this->redirectToRoute('admin_partner_list');
    }
}
