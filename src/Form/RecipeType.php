<?php

namespace App\Form;

use App\Entity\Recipe;
use App\Entity\RecipesCategory;
use App\Entity\Tool;
use App\Repository\ToolRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la Recette',
                'empty_data' => '',
            ])
            ->add('picture', VichImageType::class, [
                'label' => 'Image',
                'empty_data' => '',
                'required' => false,
            ])
            ->add('difficulty', ChoiceType::class, [
                'label' => 'Difficulté',
                'empty_data' => '',
                'choices' => [
                    'FACILE' => true,
                    'MOYEN' => true,
                    'DIFFICILE' => true,
                ],
            ])

            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'empty_data' => '',
            ])
            ->add('nbPeople', IntegerType::class, [
                'label' => 'Nombre de Personne',
                'empty_data' => '',
            ])
            ->add('day', IntegerType::class, [
                'label' => 'Jour(s)',
                'empty_data' => '',
            ])
            ->add('hour', IntegerType::class, [
                'label' => 'Heure(s)',
                'empty_data' => '',
            ])
            ->add('minute', IntegerType::class, [
                'label' => 'Minute(s)',
                'empty_data' => '',
            ])

            ->add('tools', EntityType::class, [
                'class' => Tool::class,
                'label' => 'Outils',
                'empty_data' => '',
                'multiple' => true,
                'choice_label' => 'name',
                'expanded' => true,
                'query_builder' => function (ToolRepository $toolRepository) {
                    return $toolRepository->createQueryBuilder('c')
                        ->orderBy('c.name', 'ASC');
                },
            ])

            ->add('constitutes', CollectionType::class, [
                'entry_type' => ConstituteType::class,
                'label' => 'Ingredients',
                'empty_data' => '',
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('steps', CollectionType::class, [
                'entry_type' => StepType::class,
                'label' => 'Étapes',
                'empty_data' => '',
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('valider', SubmitType::class)

            ->add('recipeCategory', EntityType::class, [
                'class' => RecipesCategory::class,
                'empty_data' => '',
                'choice_label' => 'name',
                'label' => 'Catégorie de Recette',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
