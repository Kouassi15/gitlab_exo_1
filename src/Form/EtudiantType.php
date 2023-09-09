<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
// use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class,[
                'label'=>'nom'
            ])
            ->add('prenom',TextType::class,[
                'label'=>'nom'
            ])
            ->add('date_naissance',DateTimeType::class)
            ->add('module_choisir', )
            ->add('niveau_scolaire',TextType::class)
            ->add('motif_inscription',TextareaType::class)
             ->add('date_created',DateTimeType::class, [
                'date_label' => 'date_create',
                // ...
             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
