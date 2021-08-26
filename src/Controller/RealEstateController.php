<?php

namespace App\Controller;

use App\Entity\DocumentsVendeur;
use App\Entity\ImagesSupp;
use App\Entity\RealEstate;
use App\Form\RealEstateType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Repository\RealEstateRepository;

class RealEstateController extends AbstractController
{


    /**
     * @Route("/tous-les-biens", name="real_estate_list")
     */
    public function index(PaginatorInterface $paginator, Request $request): Response{
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
            $request->get('price',9999999),
            $request->get('size')
        );
        $pagination = $paginator->paginate(
            $properties, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );
        return $this->render('real_estate/index.html.twig',[
            'sizes' =>$sizes,
            'properties'=>$pagination,
        ]);
    }

    /**
     * @Route("/tous-les-biens/{title}", name="tous_les_biens_typeDuBien")
     */

    public function recherchepartype($title, PaginatorInterface $paginator,Request $request): Response{

        $sizes=[
            1=>'Studio',
            2=>'T2',
            3=>'T3',
            4=>'T4',
            5=>'T5',
        ];

        $repository = $this->getDoctrine()->getRepository(RealEstate::class);
        $properties = $repository->findAllWiththeTypeDuBien(
            $request->get('title',$title),
            $request->get('surface',0),
            $request->get('price',9999999),
            $request->get('size')
        );


        $pagination = $paginator->paginate(
            $properties, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            6 /*limit per page*/
        );

        return $this->render('real_estate/index.html.twig',[
            'sizes' =>$sizes,
            'properties'=>$pagination,
        ]);

    }





    /**
     * @Route("/nos-bien/{slug}_{id}", name="real_estate_show")
     */
    // public function show($id, RealEstateRepository $repository)
    public function show($id, RealEstateRepository $repository)
    {
        $realEstate = $repository->find($id);
        return $this->render('real_estate/show.html.twig',[
            'property'=>$realEstate,
            'title'=>$realEstate->getTitle()
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

                    //On récupère les images transmises
                    $images =$form->get('imagesSupp')->getData();

                    // On boucle  sur es imagesSupp
                    foreach ($images as $image){
                        //On génère un nouveau fichier
                        $fichier =md5(uniqid()) .  '.' .$image->guessExtension();
                        //On copie le fichier dans le dossier uploads
                        $image->move(
                    $this->getParameter('upload_img_directory'),
                    $fichier
                );
                // On stocke l 'imageSupp dans la base de données( le nom
                $img = new ImagesSupp();
                $img->setName($fichier);
                $realEstate->addImagesSupp($img);

            }
            //---------------------------------
            //On récupère les documentsVendeurs transmises
            $docs =$form->get('documentsVendeurs')->getData();

            // On boucle  sur es imagesSupp
            foreach ($docs as $doc) {
                //On génère un nouveau fichier
                $nomDoc = md5(uniqid()) . '.' . $doc->guessExtension();
                //On copie le fichier dans le dossier uploads
                $doc->move(
                    $this->getParameter('upload_doc_directory'),
                    $nomDoc
                );
                // On stocke les doduments du vendeurs  dans la base de données( le nom
                $img = new DocumentsVendeur();
                $img->setName($nomDoc);
                $realEstate->addDocumentsVendeur($img);
            }

            //---------------------------------

            $slug = $slugger->slug($realEstate->getTitle());
            $realEstate->setSlug($slug);

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
    public function edit($id,Request $request,RealEstateRepository $repository){

        // Condition de voir si l'utilisateur a bien le droit   de modifier l'annonce$
        $realEstate = $repository->find($id);

        if($this->getUser() !==$realEstate->getOwner()){
            throw $this->createAccessDeniedException(); // affiche erreur

        }


        $form = $this->createForm(RealEstateType::class,$realEstate);
        $form->handLeREquest($request);

            // Modification de l 'image

            if($form->isSubmitted()&& $form->isValid()){
                // Ici   ajout ds la base de donnée  si tt est bon

                //On récupère les images transmises
            $images =$form->get('imagesSupp')->getData();

                    // On boucle  sur es imagesSupp
                    foreach ($images as $image){
                        //On génère un nouveau fichier
                        $fichier =md5(uniqid()) .  '.' .$image->guessExtension();
                        //On copie le fichier dans le dossier uploads
                        $image->move(
                            $this->getParameter('upload_img_directory'),
                            $fichier
                        );
                        // On stocke l 'imageSupp dans la base de données( le nom
                        $img = new ImagesSupp();
                        $img->setName($fichier);
                        $realEstate->addImagesSupp($img);

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
    public function delete($id,RealEstateRepository $repository){
        // Condition de voir si l'utilisateur a bien le droit   de supprimer l'annonce$

        $realEstate = $repository->find($id);
        if($this->getUser() !==$realEstate->getOwner()){
            throw $this->createAccessDeniedException(); // affiche erreur
        }

        $entityManager=$this->getDoctrine()->getManager();
        $entityManager->remove($realEstate);
        $entityManager ->flush();
        $this->addFlash('danger','l\'Annonce a été  supprimé');
        return $this->redirectToRoute("real_estate_list");

    }
}

