<?php

namespace App\Controller;

use App\Entity\RealEstate;

use App\Services\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add(RealEstate $realEstate, Panier $panier): Response
    {
        // vérifier si le bien est vendu ou pas
         if($realEstate->getsold()){
             $this->addFlash('danger','trop trad, le bien est vendu');
         }else if($panier->hasItem($realEstate->getId())){   // le produit est déja ds le panier

             $this->addFlash('danger','Vous déjà choisi ce bien');
         }else{
             $panier->addItem($realEstate);
         }

        //Redigier vers la page de l'annonce
        return $this->redirectToRoute('real_estate_show',[
            'id' => $realEstate->getId(),
            'slug'=> $realEstate->getSlug(),

        ]);
    }
    /**
     * @Route("/cart", name="cart_index")
     */
    public function index(Panier $panier)
    {
        return $this->render('cart/index.html.twig', [
            'items' => $panier->getItems(),


        ]);
    }

    /**
     * @Route("/cart/remove/{id}", name= "cart_remove")
     */
    public function remove(RealEstate $realEstate, Panier $panier){
        $panier->supprimerAnnonce($realEstate->getId());
        return $this->redirectToRoute('cart_index');
    }

}
