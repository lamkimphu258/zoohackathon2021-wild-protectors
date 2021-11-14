<?php

namespace App\Controller\Admin;

use App\Entity\Law;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LawCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Law::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('content'),
            TextField::new('source'),
        ];
    }
}
