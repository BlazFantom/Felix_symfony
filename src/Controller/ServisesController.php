<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServisesController extends AbstractController
{
    #[Route('/servises', name: 'app_servises')]
    public function index(): Response
    {
        return $this->render('servises/index.html.twig', [
            'servises' => 'ServisesController',
        ]);
    }
}
