<?php

namespace App\Controller;

use App\Entity\Team;
use App\Repository\AppointmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatisticsController extends AbstractController
{
    #[Route('/statistics', name: 'statistics')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $doctors = $entityManager->getRepository(Team::class)->findAll();
        $appointment[] = $doctors[0]->getAppointments()->toArray();

        return $this->render('statistics/statistics.html.twig', [
            'doctors' => $doctors,
        ]);
    }
}
