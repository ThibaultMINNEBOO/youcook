<?php

namespace App\Form;

use App\Entity\Allergen;
use App\Entity\Ingredient;
use App\Entity\IngredientCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class IngredientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                    'label' => 'Nom de l Ingrédient',
                    'empty_data' => '',
                ])
            ->add('picture', VichImageType::class, [
                    'label' => 'Image',
                    'empty_data' => '',
                    'required' => false,
                ]
            )
            ->add('category', EntityType::class, [
                    'class' => IngredientCategory::class,
                    'empty_data' => '',
                    'choice_label' => 'name',
                    'label' => 'Catégorie de Ingrédient',
                ]
            )
            ->add('allergen', EntityType::class, [
                'class' => Allergen::class,
                'empty_data' => '',
                'choice_label' => 'name',
                'label' => 'Allergène',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}
