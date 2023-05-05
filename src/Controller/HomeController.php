<?php

namespace App\Controller;

use App\Repository\RoadmapRepository;
use App\Repository\SectionRepository;
use App\Repository\SettingRepository;
use App\Repository\SocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        SettingRepository $settingRepository,
        RoadmapRepository $roadmapRepository,
        SectionRepository $sectionRepository,
        SocialRepository $socialRepository
    ): Response
    {
        return $this->render('home/index.html.twig', [
            'settings' => $settingRepository->findAll(),
            'roadmaps' => $roadmapRepository->findAll(),
            'sections' => $sectionRepository->findAll(),
            'socials' => $socialRepository->findAll(),
        ]);
    }
}
