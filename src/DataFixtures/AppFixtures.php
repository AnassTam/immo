<?php

namespace App\DataFixtures;

use App\Entity\RealEstate;
use App\Entity\Type;
use App\Entity\user;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    private $slugger;
    private $passwordEncoder;

    public function __construct(SluggerInterface $slugger, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->slugger = $slugger;
        $this->passwordEncoder= $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create("fr_FR");

        // fixtures table user
          //creation de Admin
        $user = new User();
        $user->setEmail('anass@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'test'));
        $user->setRoles(['ROLE_ADMIN']);
        $this->addReference('user-0', $user);
        $manager->persist($user);


           //creation des utilisateurs user
        for ($i = 1; $i<= 9; $i++){
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($this->passwordEncoder->encodePassword($user,'test'));
            $this->addReference('user-'.$i, $user);
            $manager->persist($user);
    }




        // fixture table realEstate

        $typeNames=['Maison','Appartement','Villa','Garage','Studio'];
        foreach($typeNames as $key=>$typeName){
            $type =new Type();
            $type->setName($typeName);
            $this->addReference('type-'.$key,$type);
            $manager->persist($type);

        }

        for($i=1 ;$i<= 100; $i++){
        $realEstate = new RealEstate();
        $type =$this->getReference('type-'.rand(0,count($typeNames)-1));
        $title= ucfirst($type->getName()).' ';
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

        $realEstate->setOwner($this->getReference('user-'.rand(0, 9)));
            $manager->persist($realEstate);
        }

        $manager->flush();
    }
}
