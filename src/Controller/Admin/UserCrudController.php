<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Doctrine\DBAL\Types\ArrayType;
use App\Controller\Admin\UserCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use Symfony\Component\Validator\Constraints\Length;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\NotNull;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\PasswordField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('type');
        yield ArrayField::new('roles');
        yield TextField::new('nom');
        yield TextField::new('email');
        yield TextField::new('adresse');
        yield TextField::new('codePostal');
        yield TextField::new('ville');
        yield TextField::new('pays');
        yield TextField::new('password')
        ->onlyWhenCreating()
        ->setFormTypeOption('attr', ['autocomplete' => 'new-password'])
        ->setFormTypeOption('validation_groups', ['Default', 'Registration'])
        ->setFormTypeOption('required', true)
        ->setHelp('Doit contenir au moins 8 caractères')
        ->setFormType(RepeatedType::class)
        ->setFormTypeOptions([
            'type' => PasswordType::class,
            'invalid_message' => 'Les mots de passe ne correspondent pas',
            'required' => true,
            'first_options' => [
                'label' => 'Mot de passe *',
                'attr' => [
                    'class' => 'w-25'
                ]
            ],
            'second_options' => [
                'label' => 'Confirmer le mot de passe *',
                'attr' => [
                    'class' => 'w-25'
                ]
            ],
            'constraints' => [
                new NotNull([
                    'message' => 'Veuillez saisir votre mot de passe'
                ]),
                new Length([
                    'min' => 4,
                    'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                    'max' => 255,
                    'maxMessage' => 'Votre mot de passe doit contenir au maximum {{ limit }} caractères'
                ])
            ]
        ]);
    }
}