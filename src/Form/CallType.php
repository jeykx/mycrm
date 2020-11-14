<?php

namespace App\Form;

use App\Entity\Call;
use App\Entity\Client;
use App\Entity\User;
use App\Entity\Status;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CallType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date',DateType::class, [
                'label' => 'Date'])

            ->add('hour',TimeType::class, [
                'label' => 'Heure'])

            ->add('comment',TextType::class, [
                'label' => 'Commentaire'])

            ->add('status', EntityType::class, [
                // looks for choices from this entity
                'label' => 'Statut',
                'class' => Status::class,
                'choice_label' => 'detail',])

            ->add('user', EntityType::class, [
                // looks for choices from this entity
                'class' => User::class,
                'choice_label' => 'username',])

            ->add('client', EntityType::class, [
                // looks for choices from this entity
                'class' => Client::class,
                'choice_label' => 'customername',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Call::class,
        ]);
    }
}
