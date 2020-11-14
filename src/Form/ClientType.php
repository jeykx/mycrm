<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('customername',TextType::class, [
                'label' => 'Nom/Prénom'])
            ->add('email', EmailType::class)
            ->add('address',TextType::class, [
                'label' => 'Adresse'])
            ->add('city', TextType::class, [
                'label' => 'Ville'])
            ->add('telephone')

            ->add('service', EntityType::class, [
                // looks for choices from this entity
                'class' => Service::class,
                'label' => 'Spécialité',
                'choice_label' => 'nameservice',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
