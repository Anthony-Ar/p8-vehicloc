<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture',
                'constraints' => [
                    new NotBlank(
                        ['message' => "Veuillez entrer le nom de la voiture"]
                    ),
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description ',
                'constraints' => [
                    new NotBlank(
                        ['message' => "Veuillez entrer une description"]
                    ),
                ]
            ])
            ->add('dayPrice', NumberType::class, [
                'label' => 'Prix journalier',
                'constraints' => [
                    new NotBlank(
                        ['message' => "Veuillez entrer un prix journalier"]
                    ),
                ]
            ])
            ->add('monthPrice', NumberType::class, [
                'label' => 'Prix mensuel',
                'constraints' => [
                    new NotBlank(
                        ['message' => "Veuillez entrer un prix mensuel"]
                    ),
                ]
            ])
            ->add('places', ChoiceType::class, [
                'choices' => [1, 2, 3, 4, 5, 6, 7, 8, 9],
                'label' => 'Nombre de places'
            ])
            ->add('transmission', ChoiceType::class, [
                'choices' => [
                    'Manuelle' => 0,
                    'Automatique' => 1,
                ],
                'label' => 'Boîte de vitesse'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
