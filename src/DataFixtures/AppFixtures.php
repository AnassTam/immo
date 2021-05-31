<?php

namespace App\DataFixtures;

use App\Entity\Appartement;
use App\Entity\House;
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
        $user->setEmail('anassAdmin@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'testAdmin'));
        $user->setRoles(['ROLE_ADMIN']);
        $this->addReference('user-0', $user);
        $manager->persist($user);



        $city =['Lille','Tourcoing','Roubaix',	'Dunkerque','Villeneuve-d\'Ascq',	'Valenciennes',	'Wattrelos',	'Douai',
            'Marcq-en-Barœul',	'Cambrai',	'Maubeuge',	'Lambersart','Armentières',	'Grande-Synthe',	'Loos',	'Hazebrouck',
            'Coudekerque-Branche',	'La Madeleine',	'Croix',	'Mons-en-Barœul','Halluin',	'Wasquehal',	'Denain',	'Ronchin',
            'Hem',	'Faches-Thumesnil', 'Saint-Amand-les-Eaux',	'Sin-le-Noble','Haubourdin',	'Bailleul',	'Wattignies',	'Caudry',
            'Hautmont',	'Lys-lez-Lannoy',	'Roncq',	'Anzin','Mouvaux', 'Saint-André-lez-Lille',	'Raismes',	'Seclin'];



//--------------------------------------------------------------------
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


        for($i=1 ;$i<= 200; $i++){
        $realEstate = new RealEstate();
        $type =$this->getReference('type-'.rand(0,count($typeNames)-1));
        $title= ucfirst($type->getName()).' ';
        $rooms = $faker->numberBetween(1,5);
        //$title .=RealEstate::sizes[$rooms];

        $realEstate->setTitle($title)
                   ->setReferenceDubien($faker->numberBetween(100000,900000))
                   ->setDescription($faker->text(2000))
                   ->setSurface($faker->numberBetween(10,400))
                   ->setPrice($faker->numberBetween(32554,500000))
                   ->setRooms($rooms)
                   ->setType($type)
                   ->setSold($faker->boolean(30))
            ->setSlug($this->slugger->slug($realEstate->getTitle(),'_',$realEstate->getReferenceDuBien()))
                   //->setSlug($realEstate->getReferenceDuBien())
                    ->setImage($faker->randomElement(['image1.jpg','image2.jpg','image3.jpg']))
                    ->setOwner($this->getReference('user-'.rand(0, 9)))
                    ->setCity($faker->randomElement($city))
                    ->setStatut($faker->randomElement(["Attente de validation", "diponible"]))
                    ->setChambre($faker->numberBetween(1, 10))
                    ->setStanding($faker->randomElement(['Normal', 'luxe', 'moyen']))
                    ->setEtatDuBien($faker->randomElement(['A rafraichir', 'Rien à prevoir', 'très bon etat general', 'l  ectricité à revoir']))
                    ->setVueDubien($faker->randomElement(['Dégagée', 'vu sur la mer', 'vu sur le parc']))
                    ->setEauChaude($faker->randomElement(['Collectif', 'Individuelle']))
                    ->setChauffage($faker->randomElement(['Electrique', 'Radiateur Individuel', 'Chauffage au sol']))
                    ->setStyleDuBien($faker->randomElement(['correct', 'style Ancien ', 'Style Parisien']))
                    ->setNiveau($faker->numberBetween(1, 3))
                    ->setAscenseur($faker->boolean(10))
                    ->setDuplex($faker->boolean(10))
                    ->setLoft($faker->boolean(10))
                    ->setDernierEtage($faker->boolean(1))
                    ->setAvecPiscine($faker->boolean(10))
                    ->setBalcon($faker->boolean(20))
                    ->setGarage($faker->boolean(25))
                    ->setParking($faker->boolean(25))
                    ->setPersonneHandicapee($faker->boolean(30))
                    ->setInvestissementLocatif($faker->boolean(10))
                    ->setVisitevirtuelle($faker->boolean(10))
                    ->setExposition($faker->randomElement(['plein sud ', 'plein nord', 'Est', 'Ouest']) )
                    ->setAnneeConstruction($faker->numberBetween(1940,2002))
                    ->setAnneeRenovation($faker->numberBetween(1990,2020))
                    ->setEtage($faker->numberBetween(0,5))
                    ->setCharge($faker->numberBetween(0,1000));
            $manager->persist($realEstate);
        }

        $manager->flush();
    }
}
