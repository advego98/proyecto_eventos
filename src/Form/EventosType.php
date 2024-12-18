<?php

namespace App\Form;

use App\Entity\Eventos;
use App\Entity\Salas;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo')
            ->add('descripcion')
            ->add('fecha', null, [
                'widget' => 'single_text',
            ])
            ->add('hora_inicio', null, [
                'widget' => 'single_text',
            ])
            ->add('hora_fin', null, [
                'widget' => 'single_text',
            ])
            ->add('sala', EntityType::class, [
                'class' => Salas::class,
                'choice_label' => 'nombre',
            ])
            ->add('crear', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eventos::class,
        ]);
    }
}
