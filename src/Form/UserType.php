<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Valid;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Adhérent' => 'adherent',
                    'Entreprise' => 'entreprise',
                ],
                // 'mapped' => false,
                'attr' => [
                    'class' => 'civiliteSelect'],
            ])
            ->add('nom', TextType::class, [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'Votre Nom ou Raison Sociale *',
                    'class' => 'form-control mb-3'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Veuillez saisir votre nom'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom doit contenir au moins 2 caractères',
                        'max' => 255,
                        'maxMessage' => 'Votre nom doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'Votre email *',
                    'class' => 'form-control mb-3'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Veuillez saisir votre email'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre email doit contenir au moins 2 caractères',
                        'max' => 255,
                        'maxMessage' => 'Votre email doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Téléphone',
                ],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre téléphone doit contenir au moins {{ limit }} numéros',
                        'max' => 255,
                        'maxMessage' => 'Votre téléphone doit contenir au maximum {{ limit }} numéros'
                    ])
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'Votre adresse *',
                    'class' => 'form-control mb-3'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Veuillez saisir votre adresse'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre adresse doit contenir au moins 2 caractères',
                        'max' => 255,
                        'maxMessage' => 'Votre adresse doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('complementAdresse', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'placeholder' => 'Complement d\'adresse',
                    'class' => 'form-control mb-3'
                ],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le champ doit contenir au moins {{ limit }} caractères',
                        'max' => 255,
                        'maxMessage' => 'Le champ doit contenir au maximum {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('codePostal', TextType::class, [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'Votre code postal *',
                    'class' => 'form-control mb-3'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Veuillez saisir votre code postal'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre code postal doit contenir au moins 2 caractères',
                        'max' => 255,
                        'maxMessage' => 'Votre code postal doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('ville', TextType::class, [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'Votre ville *',
                    'class' => 'form-control mb-3'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Veuillez saisir votre ville'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre ville doit contenir au moins 2 caractères',
                        'max' => 255,
                        'maxMessage' => 'Votre ville doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('pays', CountryType::class, [
                'label' => false,
                'required' => true,
                'attr' => [
                    'placeholder' => 'Votre pays *',
                    'class' => 'civiliteSelect'
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Veuillez saisir votre pays'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre pays doit contenir au moins 2 caractères',
                        'max' => 255,
                        'maxMessage' => 'Votre pays doit contenir au maximum 255 caractères'
                    ])
                ]
            ])
            ->add('civilite', ChoiceType::class, [
                'choices' => [
                    'Mr' => 'Mr',
                    'Mme' => 'Mme',
                    'Autre' => 'Autre',
                ],
                'required' => false,
                'validation_groups' => ['adherent'],
                'data' => 'Mr', 
                'attr' => [
                    'class' => 'form-control'
                ],
                'expanded' => false,
                'multiple' => false,
                'label' => false,
                'attr' => [
                    'class' => 'civiliteSelect mb-3'
                ],
            ])
            ->add('prenom', TextType::class, [
                'label' => false,
                'required' => false,
                'validation_groups' => ['adherent'],
                'attr' => [
                    'placeholder' => 'Votre prénom *',
                    'class' => 'form-control mb-3'
                ],
            ])

            ->add('siren', TextType::class, [
                'label' => false,
                'required' => false,
                'validation_groups' => ['entreprise'],
                'attr' => [
                    'placeholder' => 'Votre SIREN *',
                    'class' => 'form-control mb-3'
                ],
            ])
            ->add('formeJuridique', TextType::class, [
                'label' => false,
                'required' => false,
                'validation_groups' => ['entreprise'],
                'attr' => [
                    'placeholder' => 'Votre forme juridique *',
                    'class' => 'form-control mb-3'
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe ne correspondent pas',
                'required' => true,
                'first_options' => [
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Mot de passe *',
                        'class' => 'form-control mb-3'
                    ]
                ],
                'second_options' => [
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Confirmer le mot de passe *',
                        'class' => 'form-control mb-3'
                    ]
                ],
                'constraints' => [
                    new NotNull([
                        'message' => 'Veuillez saisir votre mot de passe'
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        'max' => 255,
                        'maxMessage' => 'Votre mot de passe doit contenir au maximum {{ limit }} caractères'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'type' => 'adherent', // type d'utilisateur par défaut
            'constraints' => new Valid(), // ajoute une contrainte "Valid" au formulaire
        ]);
    }
}