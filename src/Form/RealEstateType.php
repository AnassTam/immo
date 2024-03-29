<?php

namespace App\Form;

use App\Entity\RealEstate;
use App\Entity\User;
use Cassandra\Type\UserType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class RealEstateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('surface', RangeType::class, [
                'attr' => [
                    'min' => 10,
                    'max' => 400,
                    'class' => 'p-0',
                ]
            ])
            ->add('price')
            ->add('rooms', ChoiceType::class, [
                'choices' => [
                    'Studio' => 1,
                    'T2' => 2,
                    'T3' => 3,
                    'T4' => 4,
                    'T5' => 5,
                ],
            ])
            ->add('type', null, [
                'choice_label' => 'name',
            ])
            ->add('sold', ChoiceType::class, [
                'label' => 'vendu ?',
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ],

            ])
            ->add('city')
            ->add('chambre')
            ->add('standing', ChoiceType::class, [
                'choices' => [
                    'Normal' => 'Normal',
                    'Moyen' => 'Moyen',
                    'Haut' =>'Haut',

                ],
            ])
            ->add('etatDuBien', ChoiceType::class, [
                'choices' => [
                    'A rafraichir' => 'A rafraichir',
                    'A rénover' => 'A rénover',
                    'Bon état' =>'Bon état',
                    'Excelent état' =>'Excelent état',
                    'Neuf' =>'Neuf',
                ],
            ])
            ->add('vueDubien', ChoiceType::class, [
                'choices' => [
                    'Nord' => 'Nord',
                    'Sud' => 'Sud',
                    'Est' =>'Est',
                    'Ouest' =>'Ouest',

                ],
            ])
            ->add('eauChaude', ChoiceType::class, [
                'choices' => [
                    'Collective' => 'Collective',
                    'Individuelle' => 'Indeviduelle',
                ],
            ])
            ->add('chauffage', ChoiceType::class, [
                'choices' => [
                    'Electrique' => 'Electrique',
                    'Fuel' => 'Fuel',
                    'Gaz' =>'Gaz',
                ],
            ])
            ->add('niveau')
            ->add('ascenseur')
            ->add('piscine')
            ->add('balcon')
            ->add('garage')
            ->add('parking')
            ->add('exposition', ChoiceType::class, [
                'choices' => [
                    'Nord' => 'Nord',
                    'Sud' => 'Sud',
                    'Est' =>'Est',
                    'Ouest' =>'Ouest',

                ],
            ])
            ->add('anneeConstruction')
            ->add('anneeRenovation')
            ->add('etage', ChoiceType::class, [
                'choices' => [
                    'Rez-de-chaussée' => 'Electrique',
                    'Surélevé' => 'Fuel',
                    'Dérnier étage' =>'Gaz',
                    'Plein-pied' =>'Gaz',
                ],
            ])
            ->add('charge')
            ->add('statut')
            ->add('adresseProprietaire')
            ->add('villeAdresseProprietaire')
            ->add('styleDuBien')
            ->add('AdoucisseurEau')
            ->add('cheminee')
            ->add('internet')
            ->add('airConditionne')
            ->add('stores')
            ->add('referenceDuBien')
            ->add('videSanitaire')
            ->add('doubleVitrage')
            ->add('aspirateurCentralisee')
            ->add('voletsRoulantsElectrique')
            ->add('fenetresCoulissante')
            ->add('tripleVitrage')
            ->add('panneauSolaires')
            ->add('borneVoitureElectrique')
            ->add('abriVoiture')
            ->add('arrosage')
            ->add('puits')
            ->add('barbecue')
            ->add('eclairageExterieur')
            ->add('source')
            ->add('fibreOptique')
            ->add('alarmeIncendie')
            ->add('buanderieCommune')
            ->add('concierge')
            ->add('alarme')
            ->add('boolean')
            ->add('porteBlindee')
            ->add('digicode')
            ->add('gardien')
            ->add('videoSurveillance')
            ->add('interphone')
            ->add('videophone')
            ->add('aeroport')
            ->add('aeroportDistance')
            ->add('centreVille')
            ->add('centreVilleDistance')
            ->add('creche')
            ->add('crecheDistance')
            ->add('gare')
            ->add('medecin')
            ->add('piscinePublique')
            ->add('supermarche')
            ->add('metro')
            ->add('autoroute')
            ->add('cinema')
            ->add('ecolePrimaire')
            ->add('gareDistance')
            ->add('medecinDistance')
            ->add('piscinePubliqueDistance')
            ->add('supermarcheDistance')
            ->add('metroDistance')
            ->add('autorouteDistance')
            ->add('cinemaDistance')
            ->add('ecolePrimaireDistance')
            ->add('electricite')
            ->add('cuisine')
            ->add('cuisineSurface')
            ->add('chambre1')
            ->add('chambre1Surface')
            ->add('chambre2')
            ->add('chambre2Surface')
            ->add('chambre3')
            ->add('chambre3Surface')
            ->add('salon')
            ->add('salonSurface')
            ->add('balconSurface')
            ->add('garageSurface')
            ->add('gaz', ChoiceType::class, [
                'choices'  => [
                    'Réalisé' => null,
                    'En cours' => true,
                    'Non réalisé' => false,
                ],
            ])
            ->add('categorieAnnonce')
            ->add('disponibilite')
            ->add('nombrePiece')
            ->add('entree')
            ->add('entreeSurface')
            ->add('elctriciteValeur')
            ->add('gazValeur')
            ->add('taxeFonciere')
            ->add('taxeHabitation')
            ->add('typeTransaction')
            //->add('image', FileType::class, [
            // 'label'=>'Ajouter  d\'autres images',
            //  'multiple'=>true,
            //  'mapped'=>false,
            //  'required'=>false
            // ])
            ->add('documentsVendeurs', FileType::class, [
                'label'=>'Ajouter  vos documents ',
                'multiple'=>true,
                'mapped'=>false,
                'required'=>false
            ])
            ->add('imagesSupp',FileType::class,[
                'label'=>'Ajouter  d\'autres images',
                'multiple'=>true,
                'mapped'=>false,
                'required'=>false,



            ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RealEstate::class,


        ]);
    }
}
