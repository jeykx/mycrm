<?php

namespace App\Form;

use App\Entity\Service;
use App\Entity\teacher;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class teacherType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user', EntityType::class, [
                // looks for choices from this entity
                'label' => 'Formateur',
                'class' => User::class,
                'choice_label' => 'username',])
            ->add('telephone')

            ->add('speciality', EntityType::class, [
                // looks for choices from this entity
                'label' => 'Spécialité',
                'class' => Service::class,
                'choice_label' => 'nameservice',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => teacher::class,
        ]);
    }
}
