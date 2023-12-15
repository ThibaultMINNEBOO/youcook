<?php

namespace App\Form;

use App\Entity\Allergen;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', null, [
                'attr' => [
                    'class' => 'form-input',
                ],
            ])
            ->add('firstname', null, [
                'attr' => [
                    'class' => 'form-input',
                ],
            ])
            ->add('lastname', null, [
                'attr' => [
                    'class' => 'form-input',
                ],
            ])
            ->add('biography', TextareaType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'form-input',
                    'rows' => 10,
                ],
            ])
            ->add('allergens', EntityType::class, [
                'class' => Allergen::class,
                'multiple' => true,
                'choice_label' => 'name',
                'expanded' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
