<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\inscription;
use App\Entity\Service;
use App\Entity\teacher;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class inscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')

            ->add('user', EntityType::class, [
                // looks for choices from this entity
                'class' => User::class,
                'choice_label' => 'username',])

            ->add('client', EntityType::class, [
                // looks for choices from this entity
                'class' => Client::class,
                'choice_label' => 'customername',])

            ->add('teacher', EntityType::class, [
                // looks for choices from this entity
                'class' => teacher::class,
                'choice_label' => 'teachername',])


            ->add('service', EntityType::class, [
                // looks for choices from this entity
                'class' => Service::class,
                'choice_label' => 'nameservice',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => inscription::class,
        ]);
    }
}
