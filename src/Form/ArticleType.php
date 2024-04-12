<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('contenu', CKEditorType::class, [
                'label' => 'Contenu',
                'config' => array(
                    'uiColor' => '#ffffff',
                    // any other CKEditor configuration options
                ),
                'attr' => array(
                    'class' => 'form-control',
                ),
            ])
            ->add('image', FileType::class, [
                'label' => false,
                'required' => false,
                'data_class' => null,
            ])
            ->add('auteur')
            ->add('date', null, [
                'widget' => 'single_text',
            ])
            ->add('description', CKEditorType::class, [
                'label' => 'Description',
                'config' => array(
                    'uiColor' => '#ffffff',
                    // any other CKEditor configuration options
                ),
                'attr' => array(
                    'class' => 'form-control',
                ),
            ])
            ->add('creer', SubmitType::class, [
                'label' => isset($options["label"]) ? $options["label"] : "Ajouter",
                'attr' => ['class' => 'btn btn-outline-success mt-3']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}