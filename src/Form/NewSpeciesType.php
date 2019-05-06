<?php

namespace App\Form;

use App\Entity\Species;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class NewSpeciesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, ['label' => "Nom"])
            ->add('description',TextareaType::class)
            ->add('imageFile', VichImageType::class)
            ->add('workers_size_min', IntegerType::class, ['label' => "Taille minimal des ouvriéres"])
            ->add('workers_size_max', IntegerType::class, ['label' => "Taille maximal des ouvriéres"])
            ->add('queen_size_min', IntegerType::class, ['label' => "Taille minimal de la reine"])
            ->add('queen_size_max', IntegerType::class, ['label' => "Taille maximal de la reine"])
            ->add('swarming', TextType::class ,['label' => "Période de reproduction"])
            ->add('petiolDouble', IntegerType::class, ['label' => "Le pétiole est-il en deux partie ? (0: non / 1: oui / 2: Je ne sais pas)"])
            ->add('cocon', IntegerType::class, ['label' => "Les nymphe sont-elle en cocon ? (0: non / 1: oui / 2: Je ne sais pas)"])
            ->add('InsertionCentrale', IntegerType::class, ['label' => "Le pétiol est-il implenté dans l'axe central par raport au gastre ? (0: non / 1: oui / 2: Je ne sais pas)"])
            ->add('gender')
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Species::class,
        ]);
    }
}
