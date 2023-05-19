<?php

namespace App\Controller\Admin;

use App\Entity\Appointment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class AppointmentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Appointment::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('new')
            ->setEntityLabelInPlural('Таблица записей')
            ->setSearchFields(['doctors', 'date', 'client'])
            ->setDefaultSort(['date' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('date')
            ->add('doctors')
            ->add('client');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER);
    }


    public function configureFields(string $pageName): iterable
    {
//            yield AssociationField::new('date');
//            yield TextField::new('author');
//            yield EmailField::new('email');
//            yield TextareaField::new('text')
//                ->hideOnIndex();
//            yield TextField::new('photoFilename')
//                ->onlyOnIndex();
//
//            $createdAt = DateTimeField::new('createdAt')->setFormTypeOptions([
//                'years' => range(date('Y'), date('Y') + 5),
//                'widget' => 'single_text',
//            ]);
//            if (Crud::PAGE_EDIT === $pageName) {
//                yield $createdAt->setFormTypeOption('disabled', true);
//            } else {
//                yield $createdAt;
//            }
        return [

//            Field::new('doctors'),
            Field::new('date'),
//            Field::new('client')
        ];
    }

}
