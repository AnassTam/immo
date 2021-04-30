<?php

namespace App\Controller;

use App\Entity\RealEstate;
use App\Form\RealEstateType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class RealEstateController extends AbstractController
{
    /**
     * @Route("/nos-biens", name="real_estate_list")
     *
     *
     */
    public function index(Request $request): Response
    {
        $sizes=[
            1=>'Studio',
            2=>'T2',
            3=>'T3',
            4=>'T4',
            5=>'T5',

        ];

        $repository = $this->getDoctrine()->getRepository(RealEstate::class);
        $properties = $repository->findAllWiththeFilters(
            $request->get('surface',0),
            $request->get('price',9999999999999),
            $request->get('size')
        );




        return $this->render('real_estate/index.html.twig',[
            'sizes' =>$sizes,
            'properties'=>$properties,
        ]);
    }

    /**
     * @Route("/nos-bien/{slug}_{id}", name="real_estate_show")
     */

    public function show(RealEstate $property)
{
    return $this->render('real_estate/show.html.twig',[
        'property'=>$property,
        'title'=>$property->getTitle(),
    ]);


}


    /**
     * @Route ("/creer-un-bien", name="real_estate_create")
     */
    public function create(Request $request, SluggerInterface $slugger): Response
    {

        $realEstate = new RealEstate();
        $form = $this->createForm(RealEstateType::class, $realEstate);
        $form->handleRequest($request);

        if($form->isSubmitted()&& $form->isValid()){
            // Ici   ajout ds la base de donnée  si tt est bon

            dump($realEstate);
            $slug = $slugger->slug($realEstate->getTitle());
            $realEstate->setSlug($slug);

            //telechargement de  l image

            $image=$form->get('image')->getData();
            $fileName=uniqid().'.'.$image->guessExtension();
            $image->move($this->getParameter('upload_directory'),$fileName);
            $realEstate->setImage($fileName);


            // je relie  l'annonce à l'utilisateur qui est connecté
             $realEstate->setOwner($this->getUser());

            //Je dois ajouter  l'objet dans bdd
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($realEstate);
            $entityManager->flush();

            $this->addFlash('success','votre annonce'.$realEstate->getId().'a bien été ajoutée');

            return $this->redirectToRoute('real_estate_list');
        }

        return  $this ->render('real_estate/create.html.twig',[
            'realEstateForm'=>$form->createView()
    ]);
    }
    /**
     * @route("/nos-biens/modifier/{id}", name="real_estate_edit")
     */
     public function edit(Request $request, RealEstate $realEstate){
         $form = $this->createForm(RealEstateType::class,$realEstate);
         $form->handLeREquest($request);
         if($form->isSubmitted() && $form->isValid()) {
             // Modification de l 'image

             $image=$form->get('image')->getData();
             if ($image) {

             $image = $form->get('image')->getData();
             $fileName = uniqid() . '.' . $image->guessExtension();
             $image->move($this->getParameter('upload_directory'), $fileName);
             $realEstate->setImage($fileName);
         }

             // après la modif
             $this->getDoctrine()->getManager()->flush();
             $this->addFlash('success','l\'annonce a été bien modifié');

             return $this->redirectToRoute('real_estate_list');
         }
         return $this->render('real_estate/edit.html.twig',[
             'realEstateForm'=> $form->createView(),
             'realEstate' => $realEstate,
         ]);

     }
    /**
     * @route("/nos-biens/supprimer/{id}", name="real_estate_delete")
     */
     public function delete(RealEstate $realEstate){
         $entityManager=$this->getDoctrine()->getManager();
         $entityManager->remove($realEstate);
         $entityManager ->flush();
         $this->addFlash('danger','l\'Annonce a été  supprimé');
         return $this->redirectToRoute("real_estate_list");

     }



}
