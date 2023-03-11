<?php

namespace App\Controller;

use App\Service\HomeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/home', name: 'home')]
class HomeController extends AbstractController
{

    /**
     * @var HomeService
     */
    private HomeService $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;
    }

    #[Route('/{id}', name: 'app_home_detail')]
    public function getHomeDetail(int $id)
    {
        $home = $this->homeService->getHomeDetail($id);

        return $this->json([
            'payload' => [
                'home' => $home
            ]
        ]);
    }
}
