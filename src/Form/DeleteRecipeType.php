<?php

namespace App\Form;

use App\Entity\Recipe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteRecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('difficulty')
            ->add('description')
            ->add('nbPeople')
            ->add('day')
            ->add('hour')
            ->add('minute')
            ->add('pictureName')
            ->add('updatedAt')
            ->add('mark')
            ->add('tools')
            ->add('recipeCategory')
            ->add('constitute')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
