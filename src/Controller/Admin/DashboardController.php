<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Social;
use App\Entity\Roadmap;
use App\Entity\Section;
use App\Entity\Setting;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

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
        return $this->render('admin/dashboard.html.twig', [

        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            //->setTitle('BPGO')
            ->setTitle('<img src="assets/img/logo.png" class="img-fluid d-block mx-auto" style="max-width: 150px; width: 100%;"><h2 class="mt-3 fw-bold text-center text-white border-top border-bottom">Baby Pengolincoin</h2><h5 class="mt-3 fw-bold text-center text-white">$bPGO</h5>')
            ->renderContentMaximized();
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        if (!$user instanceof User) {
            throw new \Exception('Mauvais user');
        }

        $image = 'assets/img/users/' . $user->getImage();

        return parent::configureUserMenu($user)
            ->setAvatarUrl($image);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Website', 'fas fa-eye', 'app_home');
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-cog');

        yield MenuItem::linkToCrud('Sections', 'fa fa-user', Section::class);
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);
        yield MenuItem::linkToCrud('Roadmap', 'fa fa-map', Roadmap::class);
        yield MenuItem::linkToCrud('Social', 'fa fa-share-alt', Social::class);
        yield MenuItem::linkToCrud('Settings', 'fas fa-sliders-h', Setting::class);
    }

    public function configureAssets(): Assets
    {
        return parent::configureAssets()
            ->addWebpackEncoreEntry('admin');
    }
}
