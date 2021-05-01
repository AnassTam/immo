<?php


namespace App\Services;


use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Panier
{
    private $session;

    public function __construct(SessionInterface $session){
        $this->session = $session;
    }
 public function addItem($item){
        $products = $this->session->get('products',[]);
        $products[$item->getId()] = $item;
        $this->session->set('products', $products);

 }

 public function getItems()
 {
     return $this->session->get('products', []);
 }

 public function count(): int
 {
     return count($this->session->get('products', []));
 }

 public function hasItem($id)
 {
     $products = $this->session->get('products', []);

     return array_key_exists($id, $products);
 }

 // calculer le total (prix ) du panier
 function total(){
        $products = $this->session->get('products', []);
        $total =0 ;
        foreach ($products as $product){
            $total += $product->getPrice();

     }
        return $total;
 }

 // supprimeer  une annonce du panier
 public function supprimerAnnonce($id){
        $products = $this->session->get('products',[]);

        if($this->hasItem($id)){
        unset($products[$id]);
        }
     $this->session->set('products', $products);
 }


}