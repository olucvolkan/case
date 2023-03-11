<?php


namespace App\Service;


use App\DTO\Request\SearchRequestSchema;
use App\Repository\HomeAvailabilityRepository;

class SearchService
{
    /**
     * @var HomeAvailabilityRepository
     */
    private HomeAvailabilityRepository $homeAvailabilityRepository;

    public function __construct(HomeAvailabilityRepository $homeAvailabilityRepository)
    {
        $this->homeAvailabilityRepository = $homeAvailabilityRepository;
    }

    public function search(SearchRequestSchema $searchRequestSchema)
    {
        return $this->homeAvailabilityRepository->searchAvailableHome($searchRequestSchema);

    }

}