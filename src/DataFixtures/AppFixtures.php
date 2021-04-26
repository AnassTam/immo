<?php

namespace App\DataFixtures;

use App\Entity\RealEstate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");
        for($i=1 ;$i<= 10; $i++){
        $realEstate = new RealEstate();
        $type =$faker->randomElement(['maison','appartement']);
        $title= ucfirst($type).' ';
        $rooms = $faker->numberBetween(1,5);
        $title .=RealEstate::sizes[$rooms];

        $realEstate->setTitle($title);
        $realEstate->setDescription($faker->text(2000));
        $realEstate->setSurface($faker->numberBetween(10,400));
        $realEstate->setPrice($faker->numberBetween(32554,500000));
        $realEstate->setRooms($rooms);
        $realEstate->setType($type);
        $realEstate->setSold($faker->boolean(30));
        $realEstate->setSlug($faker->slug);
        $realEstate->setImage($faker->randomElement(['image1.jpg','image2.jpg','image3.jpg']));

            $manager->persist($realEstate);
        }

        $manager->flush();
    }
}
