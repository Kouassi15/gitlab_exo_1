<?php

namespace App\Form;

use App\Entity\Personne;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class PersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('date_naissance',DateTyp::class, ['widget' => 'single_text',
            ])
            
            ->add('niveau_scolaire',TextType::class)
            ->add('module',ChoiceType::class,[
                'choices' => [
                    'Module 1' => 'Module 1',
                    'Module 2' => 'Module 2',
                    'Module 3' => 'Module 3',
                    'Module 4' => 'Module 4',
                    // Ajoutez d'autres modules ici
                ],
            ])
            ->add('motif_inscription',TextareaType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Personne::class,
        ]);
    }
}
