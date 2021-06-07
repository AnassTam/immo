<?php

namespace App\Form;

use App\Entity\RealEstate;
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
            ->add('surface',RangeType::class,[
                'attr'=>[
                    'min'=>10,
                    'max'=>400,
                    'class'=>'p-0',
                ]
            ])
            ->add('price')

            ->add('rooms',ChoiceType::class,[
                'choices'=>[
                    'Studio'=>1,
                    'T2'=>2,
                    'T3'=>3,
                    'T4'=>4,
                    'T5'=>5,
                ],
            ])
            ->add('type',null,[
                'choice_label'=>'name',
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
            ->add('standing')
            ->add('etatDuBien')
            ->add('vueDubien')
            ->add('eauChaude')
            ->add('chauffage')
            ->add('styleDubien')
            ->add('niveau')
            ->add('ascenseur')
            ->add('duplex')
            ->add('loft')
            ->add('piscine')
            ->add('balcon',ChoiceType::class, [
                'label' => 'Balcon',
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ],

            ])
            ->add('garage',ChoiceType::class, [
                'label' => 'Garage',
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ],

            ])
            ->add('parking',ChoiceType::class, [
                'label' => 'Parking',
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ],

            ])
            ->add('personneHandicapee',ChoiceType::class, [
                'label' => 'Accés au personne handicapée',
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ],

            ])
            ->add('investissementLocatif',ChoiceType::class, [
                'label' => 'Investissement lacatif',
                'choices' => [
                    'Non' => false,
                    'Oui' => true,
                ],

            ])

            ->add('exposition')
            ->add('anneeConstruction')
            ->add('anneeRenovation')
            ->add('etage')
            ->add('charge')
            ->add('statut')
         ->add('image',FileType::class,[
            'mapped'=>false,
         ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RealEstate::class,
        ]);
    }
}
