<?php

namespace App\Tests\Controller;

use App\Repository\HomeAvailabilityRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SearchControllerTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $checkInDate = new DateTime('now');
        $checkOutDate = new DateTime('now');
        $checkOutDate->modify('+3 days');
        $client->request('GET', '/search',
            [
                'checkInDate' => $checkInDate->format('Y-m-d'),
                'checkOutDate' => $checkOutDate->format('Y-m-d')
            ]
        );

        $response = json_decode($client->getResponse()->getContent());
        $this->assertNotEmpty($response->payload->homes);
        $this->assertIsArray($response->payload->homes);
        $this->assertEquals(HomeAvailabilityRepository::MAX_RESULT_SIZE, count($response->payload->homes));
    }
}
