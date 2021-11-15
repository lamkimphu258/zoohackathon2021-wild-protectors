<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Event;
use App\Entity\Job;
use App\Entity\Law;
use App\Entity\Link;
use App\Entity\Post;
use App\Entity\User;
use App\Entity\UserRole;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Management'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class)
                ->setPermission(UserRole::ROLE_ADMIN),
            MenuItem::linkToCrud('Links', 'fa fa-link', Link::class)
                ->setPermission(UserRole::ROLE_ADMIN),
            MenuItem::linkToCrud('Categories', 'fa fa-align-justify', Category::class)
                ->setPermission(UserRole::ROLE_ADMIN),
            MenuItem::linkToCrud('Posts', 'fa fa-file', Post::class),
            MenuItem::linkToCrud('Events', 'fa fa-calendar', Event::class)
                ->setPermission(UserRole::ROLE_ADMIN),
            MenuItem::linkToCrud('Jobs', 'fa fa-suitcase', Job::class)
                ->setPermission(UserRole::ROLE_ADMIN),
            MenuItem::linkToCrud('Laws', 'fa fa-gavel', Law::class)
                ->setPermission(UserRole::ROLE_ADMIN),
        ];
    }
}
