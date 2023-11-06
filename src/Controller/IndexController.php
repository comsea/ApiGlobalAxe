<?php

namespace App\Controller;

use App\Repository\ActualiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private ActualiteRepository $actualiterepository;

    public function __construct(ActualiteRepository $actualiteRepository)
    {
        $this->actualiterepository = $actualiteRepository;
    }

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        $actus = $this->actualiterepository->findAll();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'actus' => $actus
        ]);
    }
}
