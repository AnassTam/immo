<?php

namespace App\Controller;

use App\Entity\RealEstate;
use App\Repository\RealEstateRepository;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/", name="search_home")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
        $type =[
            1=>'maison',
            2=>'Appartement',
            3=>'Villa',
            4=>'Studio',

        ];
        dump($type[0]);

        $repository = $this->getDoctrine()->getRepository(RealEstate::class);
        $properties = $repository->searchPageHome(
            $request->get('city'),
            $request->get('surface',0),
            $request->get('price',9999999)
        );
        $pagination = $paginator->paginate(
            $properties, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        return $this->render('welcome/home.html.twig',[
            'types' =>$type,
            'properties'=>$pagination,
        ]);
    }
}
