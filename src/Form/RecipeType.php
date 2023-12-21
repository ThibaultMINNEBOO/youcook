<?php

namespace App\Form;

use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\RecipesCategory;
use App\Entity\Tool;
use App\Repository\ToolRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('difficulty', ChoiceType::class, [
                'choices' => [
                    'EASY' => true,
                    'MEDIUM' => true,
                    'HARD' => true,
                ],
            ])

            ->add('description')
            ->add('nbPeople')
            ->add('time')
            ->add('tools', EntityType::class, [
                'class' => Tool::class,
                'multiple' => true,
                'choice_label' => 'name',
                'expanded' => true,
                'query_builder' => function (ToolRepository $toolRepository) {
                    return $toolRepository->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
            ])
            ->add('ingredients', EntityType::class, [
                'class' => Ingredient::class,
                'multiple' => true,
                'choice_label' => 'name',
                'expanded' => true,
                'attr' => [
                    'class' => 'form-input',
                ],
            ])

            ->add('recipeCategory', EntityType::class, [
                'class' => RecipesCategory::class,
                'choice_label' => 'name',
            ])
            ->add('save', SubmitType::class,
                ['label' => 'Créer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
