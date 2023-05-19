<?php

namespace App\Controller;

use App\Entity\Team;
use Doctrine\ORM\EntityManagerInterface;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxGetAppointmentsController extends AbstractController
{
    #[Route('/ajax/get/appointments', name: 'ajax_get_appointments')]
    public function getAppoint(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        if (!$request->isXmlHttpRequest()) {
            return new JsonResponse(array(
                'status' => 'Error',
                'message' => 'Error'),
                400);

        }


        $doctors = $entityManager->getRepository(Team::class)->findAll();
        $appointment[] = $doctors[0]->getAppointments()->toArray();


        if ($doctors === null) {
            // Looks like something went wrong
            return new JsonResponse(array(
                'status' => 'Error',
                'message' => 'Error'),
                400);
        }

        return new JsonResponse(array(
            'status' => 'OK',
            'message' => $this->UpdateData($doctors)),
            200);

//
//        return new JsonResponse(array(
//            'status' => 'Error',
//            'message' => 'Error'),
//            400);
    }

    public function UpdateData($doctors): string
    {
        return $this->renderView('statistics/ajaxGetAppointment.html.twig', [
            'doctors' => $doctors
        ]);

    }
}
