<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController

{
private $properties =[
['title'=> 'Maison avec piscine'],
['title'=> 'Appartement avec piscine'],
['title'=> 'Studio'],
];
    /**
     * @Route("/property/{page}", name="property_list",requirements={"page"="\d+"})
     * avec le requirements , on peut verifier que la page est un nbre
     */
    public function index(Request $request, $page=1): Response
    {

        $properties = $this->properties;
        dump($properties);


        $surface =$request->query->get('surface');// Equivaut à $_GET['surface']
        $budget =$request->query->get('budget');
        $size = $request->query->get('size');


        dump($request);


        $size=[
            1=>'Studio',
            2=>'T2',
            3=>'T3',
            4=>'T4',
            5=>'T5',

        ];



        return $this->render('property/index.html.twig', [
            'properties' => $properties,
            'sizes'=>$size
        ]);
    }

    /**
     * @Route("/property/{slug}", name="property_show")
     *
     * Page qui affiche une annonce
     */

    public  function show($slug): Response
    {

        if(!in_array($slug,array_column($this->properties,'title'))){
           throw $this->createNotFoundException();
        };
        return $this->render('property/show.html.twig',[
            'slug'=>$slug,
        ]);
    }


}
