<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactVendeurController extends AbstractController
{
    /**
     * @Route("/contact", name="contact_vendeur")
     */
    public function contact_vendeur(): Response
    {
        return $this->render('contact_vendeur/index.html.twig', [

        ]);
    }
}
