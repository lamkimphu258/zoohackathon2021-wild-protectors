<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\PostStatus;
use App\Entity\UserRole;
use App\Repository\LinkRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PostCrudController extends AbstractCrudController
{
    public function __construct(
        private LinkRepository $linkRepository
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextField::new('description'),
            TextField::new('content'),
            ChoiceField::new('status')
                ->setChoices([
                    PostStatus::PENDING => PostStatus::PENDING,
                    PostStatus::APPROVED => PostStatus::APPROVED
                ])
                ->setPermission(UserRole::ROLE_ADMIN),
            ArrayField::new('reference'),
            AssociationField::new('user', 'User'),
            AssociationField::new('category', 'Category'),
            AssociationField::new('link', 'Link'),
//                ->setQueryBuilder(function () {
//                    return $this->linkRepository->findLinkHaveNoPostQueryBuilder();
//                }),
            //fail
        ];
    }
}
