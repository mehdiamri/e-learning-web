<?php

namespace App\Form;

use App\Entity\Formation;
use App\Entity\Promotion;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromotionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idFormation',HiddenType::class)
            ->add('Formation',EntityType::class,[
                'class' => Formation::class,
                'choice_label' => 'type',
                'placeholder' => 'choose Formation'
            ])
            ->add('datedebut',DateType::class,[
                'widget' => 'single_text',
                'data' => new \DateTime(),
            ])
            ->add('datefin',DateType::class,[
                'widget' => 'single_text',
                'data' => new \DateTime(),
            ])
            ->add('prix',ChoiceType::class,[
                'choices' => [
                    '10' => '10',
                    '20' => '20',
                    '30' => '30',
                    '40' => '40',
                    '50' => '50',
                    '60' => '60',
                    '70' => '70',
                    '80' => '80',
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Promotion::class,
        ]);
    }
}
