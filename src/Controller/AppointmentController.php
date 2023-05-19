<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Entity\Team;
use App\Entity\User;
use App\Form\AppointmentFormType;

use App\Repository\AppointmentRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Sodium\add;

class AppointmentController extends AbstractController
{
    #[Route('/appointment', name: 'appointment')]
    public function show(Request $request, EntityManagerInterface $entityManager, AppointmentRepository $repository): Response
    {

        $appointment = new Appointment();
//        $team = new Team();
//        $team->setId('1');
//        $team->setName('Doc');
//        $team->setDirection('dir');
//        $team->setImg('qwe');
//        dump($team);
//        $appointment->getDoctors()->add($team);
        $form = $this->createForm(AppointmentFormType::class, $appointment);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $appointment->setClient($user);
            $repository->save($appointment, true);
            //            $entityManager->persist($appointment);
            //            $entityManager->flush();
            return $this->render('appointment/congrats.html.twig', [
                'appointment' => $appointment,
            ]);
        }
//        dump($form);
//        dump($form->);
        return $this->render('appointment/appointment.html.twig', [
            'appointment_form' => $form->createView(),
        ]);
    }
}
