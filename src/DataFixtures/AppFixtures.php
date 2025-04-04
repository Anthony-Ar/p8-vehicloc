<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private string $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sed porta orci. Vivamus egestas porta metus id congue. Suspendisse ornare metus sit amet elit lacinia, vel gravida lorem commodo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vivamus hendrerit ac ligula quis auctor. Vestibulum commodo luctus felis a tristique. Aenean bibendum venenatis libero non posuere.";
    // Transmission => 0 = Manuelle / 1 = Automatique
    private array $cars = [
        [
            'name' => 'Renault Twingo',
            'dayPrice' => 39.14,
            'monthPrice' => 900,
            'places' => 4,
            'transmission' => 0,
        ],
        [
            'name' => 'Renault Clio',
            'dayPrice' => 38.64,
            'monthPrice' => 850,
            'places' => 4,
            'transmission' => 0,
        ],
        [
            'name' => 'BMX IX (electric)',
            'dayPrice' => 42.40,
            'monthPrice' => 950,
            'places' => 4,
            'transmission' => 0,
        ],
        [
            'name' => 'Renault Zoé',
            'dayPrice' => 39.14,
            'monthPrice' => 900,
            'places' => 4,
            'transmission' => 0,
        ],
    ];

    public function load(ObjectManager $manager) : void
    {
        foreach ($this->cars as $car) {
            $manager->persist(
                new Car()
                    ->setName($car['name'])
                    ->setDescription($this->description)
                    ->setDayPrice($car['dayPrice'])
                    ->setMonthPrice($car['monthPrice'])
                    ->setPlaces($car['places'])
                    ->setTransmission($car['transmission'])
            );
        }

        $manager->flush();
    }
}
