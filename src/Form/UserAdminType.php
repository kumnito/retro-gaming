<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserAdminType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', EmailType::class)
        ->add('roles',ChoiceType::class,array(
            'multiple'=>true,
           'expanded'=>true,
            'choices' => array( 'ROLE_ADMIN' => 'ROLE_ADMIN', 'ROLE_USER'=>'ROLE_USER')
        ))
            ->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'first_options'  => array('label' => 'Password'),
            'second_options' => array('label' => 'Répéter Password'),
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
