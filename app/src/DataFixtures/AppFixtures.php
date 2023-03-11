<?php

namespace App\DataFixtures;

use App\Entity\Home;
use App\Entity\HomeAvailability;
use DateTime;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $home = new Home();
            $home->setName($this->faker->name);
            $home->setAddress($this->faker->address);
            $home->setDescription($this->faker->name);
            $home->setLocation($this->faker->streetAddress);
            $home->setCreatedAt(new DateTimeImmutable('now'));
            $home->setUpdatedAt(new DateTimeImmutable('now'));
            $manager->persist($home);

            $homeAvailability = new HomeAvailability();
            $homeAvailability->setHome($home);
            $fromDate = new DateTime();
            $toDate = new DateTime();
            $toDate->modify('+' . $i . ' days');
            $homeAvailability->setFromDate($fromDate);
            $homeAvailability->setToDate($toDate);
            $homeAvailability->setCreatedAt(new DateTimeImmutable('now'));
            $homeAvailability->setUpdatedAt(new DateTimeImmutable('now'));
            $manager->persist($homeAvailability);

            $manager->flush();
        }
    }
}
