<?php

namespace App\Controller\Admin;

use App\Entity\Difficulty;
use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipe::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextareaField::new('description'),
            NumberField::new('day', 'Jour')->onlyOnForms()->setColumns(1),
            NumberField::new('hour', 'Heure')->onlyOnForms()->setColumns(1),
            NumberField::new('minute', 'Minute')->onlyOnForms()->setColumns(1),
            ChoiceField::new('difficulty')->setChoices([
                'Facile' => 'Facile',
                'Moyen' => 'Moyen',
                'Difficile' => 'Difficile',
            ])->onlyOnForms()->setColumns(10),
            NumberField::new('nbPeople')->onlyOnForms(),
            TextField::new('difficulty')->hideOnForm(),
            TextField::new('picture', 'Image')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('pictureName', 'Image')->setBasePath('/images/recipes')->onlyOnIndex(),
            AssociationField::new('recipeCategory', 'Catégorie')
                ->setFormTypeOptions([
                    'choice_label' => 'name',
                    'query_builder' => function ($recipeCategory) {
                        return $recipeCategory->createQueryBuilder('r')
                            ->orderBy('r.name', 'ASC');
                    },
                ])
                ->formatValue(function ($value, $entity) {
                    return $entity->getRecipeCategory()->getName();
                }),
        ];
    }
}
