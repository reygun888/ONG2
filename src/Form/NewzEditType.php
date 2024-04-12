<?php

namespace App\Form;

use App\Entity\Newz;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class NewzEditType extends AbstractType
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
        $builder
            ->add('type', TextType::class, [
                'label' => 'Type',
                'required' => false,
                ])
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'required' => false,
                ])
            ->add('contenu', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 5,
                    'placeholder' => 'Entrez le contenu de l\'article ici...'
                ]
                ])
            ->add('image', FileType::class, [
                'label' => false,
                'required' => false,
                'data_class' => null,
            ])
            ->add('auteur', TextType::class, [
                'label' => 'Auteur',
                'required' => false,
                ])
            ->add('date', null, [
                'widget' => 'single_text',
            ])
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newz::class,
        ]);
    }
}