<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserEditType extends AbstractType
{
    private $security;
    private $entityManager;
    
    public function __construct(Security $security, EntityManagerInterface $entityManager)
    {
        $this->security = $security;
        $this->entityManager = $entityManager;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $isAdmin = $this->security->isGranted('ROLE_ADMIN');
        $issuperAdmin = $this->security->isGranted('ROLE_S_AD');
        
        $builder
        ->add('type', ChoiceType::class, [
            'choices' => [
                'Adhérent' => 'adherent',
                'Entreprise' => 'entreprise',
            ],
            // 'mapped' => false,
            'disabled' => false,
            'attr' => [
                'class' => 'mdp mx-5'],
        ])
        ->add('nom', TextType::class, [
            'label' => 'Nom ou Raison Sociale * : ',
            'required' => false,
            'attr' => [
                'placeholder' => 'Votre Nom ou Raison Sociale',
                'class' => 'enom mdp mx-3'
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
            'label' => 'Email * : ',
            'required' => false,
            'attr' => [
                'placeholder' => 'Votre email',
                'class' => 'mdp mx-3'
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
            'label' => 'Téléphone : ',
            'required' => false,
            'attr' => [
                'placeholder' => 'Téléphone',
                'class' => 'mdp mx-3'
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
            'label' => 'Adresse * : ',
            'required' => false,
            'attr' => [
                'placeholder' => 'Votre adresse',
                'class' => 'mdp mx-3'
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
            'label' => 'Complément d\'adresse : ',
            'required' => false,
            'attr' => [
                'class' => 'mdp mx-5'
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
            'label' => 'Code Postal * : ',
            'required' => false,
            'attr' => [
                'placeholder' => 'Votre code postal',
                'class' => 'mdp mx-3'
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
            'label' => 'Ville * : ',
            'required' => false,
            'attr' => [
                'placeholder' => 'Votre ville',
                'class' => 'mdp mx-3'
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
            'label' => 'Pays * : ',
            'required' => false,
            'attr' => [
                'placeholder' => 'Votre pays',
                'class' => 'mdp mx-3'
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
            'label' => 'Civilité * : ',
            'choices' => [
                'Mr' => 'Mr',
                'Mme' => 'Mme',
                'Autre' => 'Autre',
            ],
            'required' => false,
            'validation_groups' => ['adherent'],
            'data' => 'Mr', 
            'attr' => [
                'class' => 'mdp mx-3'
            ],
            'expanded' => false,
            'multiple' => false,
        ])
        ->add('prenom', TextType::class, [
            'label' => 'Prénom * : ',
            'required' => false,
            'validation_groups' => ['adherent'],
            'attr' => [
                'placeholder' => 'Votre prénom',
                'class' => 'mdp mx-3'
            ],
        ])

        ->add('siren', TextType::class, [
            'label' => 'SIREN * : ',
            'required' => false,
            'validation_groups' => ['entreprise'],
            'attr' => [
                'placeholder' => 'Votre SIREN',
                'class' => 'mdp mx-3'
            ],
        ])
        ->add('formeJuridique', TextType::class, [
            'label' => 'Forme Juridique * : ',
            'required' => false,
            'validation_groups' => ['entreprise'],
            'attr' => [
                'placeholder' => 'Votre forme juridique',
                'class' => 'mdp mx-3'
            ],
        ]);
        if ($isAdmin || $issuperAdmin){
            $builder    
        ->add('roles', ChoiceType::class, [
            'label' => false,
            'required' => false,
            'choices' => [
                'ROLE_USER' => 'ROLE_USER',
                'ROLE_ADMIN' => 'ROLE_ADMIN',
                'ROLE_S_AD' => 'ROLE_S_AD',

            ],
            'choice_attr' => function($choice, $key, $value) {
                return ['class' => 'ms-3'];
            },
            'attr' => [
                'class' => 'text-center mb-5 mx5',
            ],
            'multiple' => true, // permet de sélectionner plusieurs rôles
            'expanded' => true, // affiche les rôles sous forme de liste déroulante
            'disabled' => !($isAdmin || $issuperAdmin),
        ]);
    }
        
        $builder
            ->add('oldPassword', PasswordType::class, [
                'label' => 'Ancien mot de passe',
                'required' => false,
                'mapped' => false,
            'attr' => [
                'class' => 'form-control mdp mb-3 p-1'
            ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
                    'label' => 'Nouveau mot de passe',
                    'attr' => [
                        'class' => 'form-control mdp mb-3 p-1'
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                    'attr' => [
                        'class' => 'form-control mdp mb-3 p-1'
                    ],
                ],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'validation_groups' => ['Default', 'edit'],
        ]);
    }
}