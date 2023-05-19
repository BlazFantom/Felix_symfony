<?php

namespace App\Controller\Admin;

use App\Entity\Appointment;
use App\Entity\Servises;
use App\Entity\Team;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {


        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ServisesCrudController::class)->generateUrl();
        $url = $routeBuilder->setController(AppointmentCrudController::class)->generateUrl();
        $url = $routeBuilder->setController(TeamCrudController::class)->generateUrl();
        $url = $routeBuilder->setController(UserCrudController::class)->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Данные');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToCrud('Servises', 'fa fa-home', Servises::class);
        yield MenuItem::linkToCrud('Appointment', 'fa fa-home', Appointment::class);
        yield MenuItem::linkToCrud('Team', 'fa fa-home', Team::class);
        yield MenuItem::linkToCrud('User', 'fa fa-home', User::class);

        yield MenuItem::linkToRoute('На сайт', 'fa ...', 'servises');


    }
}
