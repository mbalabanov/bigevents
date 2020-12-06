<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('datetime')
            ->add('description')
            ->add('image')
            ->add('capacity')
            ->add('email')
            ->add('phone')
            ->add('address')
            ->add('url')
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Sport' => 'Sport',
                    'Music' => 'Music',
                    'Opera' => 'Opera',
                    'Ballet' => 'Ballet',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
        ]);
    }
}
