<?php
namespace App\Controller\Admin;

use App\Entity\Setting;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package App\Controller\Admin
 * @Route("/admin", name="admin_")
 */
class DefaultController extends Controller
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="default_index")
     * @Template("/admin/default/index.html.twig")
     */
    public function index()
    {
        return [];
    }

    /**
     * @Route("/settings", name="settings")
     * @Template("admin/default/settings.html.twig")
     * @param Request $request
     * @return array
     */
    public function settings(Request $request)
    {
        $rows = $this->getDoctrine()
            ->getRepository(Setting::class)
            ->findAll();

        $settings = [];

        foreach ($rows as $row) {
            $settings[$row->getCode()] = $row;
        }

        if ($request->getMethod() == 'POST') {
            $post = $request->get('Setting');

            foreach ($post as $code => $value) {
                /** @var Setting $setting */
                $setting = $this->getDoctrine()
                    ->getRepository(Setting::class)
                    ->findOneBy(['code' => $code]);

                $setting->setValue($value);

                $this->entityManager->persist($setting);
                $this->entityManager->flush();
            }

            $this->addFlash('success', 'As Configurações do sistema foram salvas com sucesso!');
            return $this->redirectToRoute('admin_settings');
        }

        return [
            'settings' => $settings
        ];
    }
}
