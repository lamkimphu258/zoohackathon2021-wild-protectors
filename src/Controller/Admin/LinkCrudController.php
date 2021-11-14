<?php

namespace App\Controller\Admin;

use App\Entity\Link;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class LinkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Link::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            UrlField::new('link'),
        ];
    }
}
