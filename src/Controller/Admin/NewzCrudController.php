<?php

namespace App\Controller\Admin;

use App\Entity\Newz;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\DateTimeFilter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class NewzCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Newz::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type'),
            DateField::new('date', 'Ajouté le'),
            TextField::new('Auteur'),
            TextEditorField::new('contenu'),
            ImageField::new('image', 'Image')
            ->setBasePath('upload/')
            ->setUploadDir('public/upload/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')

            ->setRequired(false),
            
        ];
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(DateTimeFilter::new('date', 'Date'));
            
    }
}