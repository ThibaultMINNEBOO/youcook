<?php

namespace App\Controller\Admin;

use App\Entity\UserAvatar;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserAvatarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserAvatar::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('pictureFile')->setFormType(VichImageType::class)->onlyOnForms(),
            ImageField::new('pictureName', 'Image')->setBasePath('/images/avatars')->onlyOnIndex(),
        ];
    }
}
