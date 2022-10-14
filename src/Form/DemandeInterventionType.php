<?php

namespace App\Form;

use App\Entity\DemandeIntervention;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeInterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('interventionDemandee')
            ->add('dateDebutIntervention',DateTimeType::class, [
                'date_widget' => 'single_text'])
            ->add('dateFinIntervention',DateTimeType::class, [
                'date_widget' => 'single_text'])
            ->add('typeIntervention')
            ->add('serviceDemandeur')
            ->add('degreUrgence')
            ->add('backgroundColor',ColorType::class)
            ->add('borderColor',ColorType::class)
            ->add('textColor',ColorType::class)
            ->add('allDay')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemandeIntervention::class,
        ]);
    }
}
