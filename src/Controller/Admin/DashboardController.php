<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Link;
use App\Entity\User;
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

            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),

            MenuItem::section('Links'),
            MenuItem::linkToCrud('Links', 'fa fa-link', Link::class),

            MenuItem::section('Categories'),
            MenuItem::linkToCrud('Categories', 'fa fa-align-justify', Category::class),
        ];
    }
}
