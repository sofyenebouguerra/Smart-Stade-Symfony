<?php

namespace App\Form;

use App\Entity\MatchFoot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatchFootType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ref_match')
            ->add('date_match')
            ->add('nom_stade')
            ->add('nbr_spectateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MatchFoot::class,
        ]);
    }
}
