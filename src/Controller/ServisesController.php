<?php

namespace App\Controller;

use App\Entity\Servises;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ServisesController extends AbstractController
{


    #[Route('/', name: 'servises')]
    public function displayServises(EntityManagerInterface $entityManager): Response
    {
        $servises = $entityManager->getRepository(Servises::class)->findAll();

        if (!$servises) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }

        return $this->render('servises/servises.html.twig', [
            'servises' => $servises,
        ]);
    }
}
