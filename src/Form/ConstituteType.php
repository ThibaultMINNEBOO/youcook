<?php

namespace App\Form;

use App\Entity\Constitute;
use App\Entity\Ingredient;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConstituteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantity')
            ->add('measure')
            ->add('ingredient', EntityType::class, [
            'class' => Ingredient::class,
                'choice_label' => 'name',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Constitute::class,
        ]);
    }
}
