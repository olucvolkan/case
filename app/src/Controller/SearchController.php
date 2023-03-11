<?php

namespace App\Controller;

use App\DTO\Request\SearchRequestSchema;
use App\Service\SearchService;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{


    /**
     * @var SearchService
     */
    private SearchService $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }


    #[Route('/search', name: 'app_search')]
    public function __invoke(Request $request)
    {
        $searchRequestSchema = new SearchRequestSchema();
        $searchRequestSchema->setCheckInDate($request->get('checkInDate'));
        $searchRequestSchema->setCheckOutDate($request->get('checkOutDate'));

        $searchResult = $this->searchService->search($searchRequestSchema);
        return $this->json([
            'payload' => [
                'homes' =>  $searchResult
            ]
        ]);
    }
}
