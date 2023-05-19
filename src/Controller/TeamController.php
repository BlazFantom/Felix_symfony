<?php

namespace App\Controller;

use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    #[Route('/team', name: 'team')]
    public function displayTeam(EntityManagerInterface $entityManager): Response
    {
        $team = $entityManager->getRepository(Team::class)->findAll();
        return $this->render('team/team.html.twig', [
            'team' => $team,
        ]);
    }
}
