<?php

namespace App\Controller\Admin;

use App\Entity\Ingredient;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IngredientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ingredient::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            ImageField::new('picture')->setBasePath('/icons/ingredients')->onlyOnIndex(),
            AssociationField::new('category', 'Catégorie')
                ->setFormTypeOptions([
                    'choice_label' => 'name',
                    'query_builder' => function ($category) {
                        return $category->createQueryBuilder('c')
                            ->orderBy('c.name', 'ASC');
                    },
                ])
                ->formatValue(function ($value, $entity) {
                    return $entity->getCategory()?->getName();
                }),
            AssociationField::new('allergen', 'Allergène')
                ->setFormTypeOptions([
                    'choice_label' => 'name',
                    'query_builder' => function ($allergen) {
                        return $allergen->createQueryBuilder('a')
                            ->orderBy('a.name', 'ASC');
                    },
                ])
                ->formatValue(function ($value, $entity) {
                    return $entity->getAllergen()?->getName();
                }),
        ];
    }
}
