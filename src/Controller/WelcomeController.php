<?php

namespace App\Controller;

use App\Entity\RealEstate;
use App\Repository\RealEstateRepository;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */

    public function home(RealEstateRepository $realEstateRepository,TypeRepository $typeRepository):Response
{


    $les3produitsCarossels= $realEstateRepository->findBy([],[],3);
    $les3derinersBiensAjoutee = $realEstateRepository->findBy([],['id'=>'DESC'],3);
    $types= $typeRepository->findAll();

    return $this->render('welcome/home.html.twig',[
        'typess' => $types,
        'products' => $les3derinersBiensAjoutee,
        'les3produitsCarossels'=> $les3produitsCarossels
    ]);


}
}
