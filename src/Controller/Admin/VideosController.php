<?php

namespace App\Controller\Admin;

use App\Entity\Video;
use App\Form\VideoType;
use App\Repository\VideoRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/admin/videos", name="admin_videos_")
 */
class VideosController extends Controller
{
    /**
     * @Route("/", name="index", methods="GET")
     * @Template("admin/videos/index.html.twig")
     * @param VideoRepository $videoRepository
     * @return array
     */
    public function index(VideoRepository $videoRepository)
    {
        return ['videos' => $videoRepository->findAll()];
    }

    /**
     * @Route("/new", name="new", methods="GET|POST")
     * @Template("admin/videos/new.html.twig")
     * @param Request $request
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function new(Request $request, UserInterface $user)
    {
        $video = new Video();
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $video->setCreatedBy($user);
            $em->persist($video);
            $em->flush();

            $this->addFlash('success', 'Os dados foram salvos com sucesso.');
            return $this->redirectToRoute('admin_videos_index');
        }

        return [
            'video' => $video,
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/{id}", name="show", methods="GET")
     * @Template("admin/videos/show.html.twig")
     * @param Video $video
     * @return array
     */
    public function show(Video $video)
    {
        return ['video' => $video];
    }

    /**
     * @Route("/edit/{id}", name="edit", methods="GET|POST")
     * @Template("admin/videos/edit.html.twig")
     * @param Request $request
     * @param Video $video
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function edit(Request $request, Video $video)
    {
        $form = $this->createForm(VideoType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'Os dados foram salvos com sucesso.');
            return $this->redirectToRoute('admin_videos_edit', ['id' => $video->getId()]);
        }

        return [
            'video' => $video,
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/{id}", name="delete", methods="DELETE")
     * @param Request $request
     * @param Video $video
     * @return Response
     */
    public function delete(Request $request, Video $video): Response
    {
        if ($this->isCsrfTokenValid('delete'.$video->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($video);
            $em->flush();
        }

        $this->addFlash('success', 'O registro foi removido com sucesso.');
        return $this->redirectToRoute('admin_videos_index');
    }
}
