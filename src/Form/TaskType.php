<?php

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('starting_date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'input' => 'datetime_immutable',
                'attr' => ['class' => 'datepicker'],
                'html5' => false,
            ])
            ->add('due_date', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'input' => 'datetime_immutable',
                'attr' => ['class' => 'datepicker'],
                'html5' => false,
            ])
            // ->add('isCompleted', CheckboxType::class, [
            //     'label'    => 'Completed',
            //     'required' => false,
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
