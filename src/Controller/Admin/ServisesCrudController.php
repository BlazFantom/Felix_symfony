<?php

namespace App\Controller\Admin;

use App\Entity\Servises;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class ServisesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Servises::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Add servise')
            ->setEntityLabelInPlural('Servise table')
            ->setSearchFields(['name', 'price'])
            ->setDefaultSort(['name' => 'DESC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters->add('name')
            ->add('price');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER);
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            Field::new('name'),
            Field::new('price'),
        ];
    }
}
