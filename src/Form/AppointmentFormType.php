<?php

namespace App\Form;


use App\Entity\Servises;
use App\Entity\Team;
use App\Repository\AppointmentRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AppointmentFormType extends AbstractType
{
    public function show(AppointmentRepository $appointmentRepository): array
    {
        return $appointmentRepository->findAll();
    }


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
//            ->add('Doctor', CollectionType::class, [
////                'mapped' => false,
//                'entry_type' => DoctorType::class,
//                'entry_options' => ['label' => false],
//            ])
            ->add('doctors', EntityType::class, [
                'class' => Team::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'label' => 'Прием проведет:'
            ])
            ->add('servises', EntityType::class, [
                'choice_label' => 'name',
                'class' => Servises::class,
                'placeholder' => 'Выберите услугу',
            ])
            ->add('date', DateType::class, [
                'label' => 'Выберите дату',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'choices' => [],
        ]);
    }
}
