<?php

namespace adg13\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonalType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('title', 'choice', array(
            'label' => 'Title',
            'choices' => array('Mr' => 'Mr', 'Miss' => 'Miss', 'Ms' => 'Ms', 'Mrs' => 'Mrs'),
            'required' => false,
            'empty_value' => 'Choose a title',
        ));

        $builder->add('first_name', 'text', array(
            'label' => 'First name',
            'required' => true,
            'attr' => array(
                'placeholder' => 'First Name',
            )
        ));
        $builder->add('second_name', 'text', array(
            'label' => 'Second name',
            'required' => false,
            'attr' => array(
                'placeholder' => 'Second Name',
            )
        ));
        $builder->add('lastname', 'text', array(
            'label' => 'Surname',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Surname',
            )
        ));


        $builder->add('gender', 'choice', array(
            'label' => 'Gender',
            'choices' => array('null' =>'','male' => 'Male', 'female' => 'Female'),
            'required' => true,
        ));

        $builder->add('date_of_birth', 'birthday', array(
            'label' => 'Date of Birth',
            'required' => true,
            'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
        ));

        $builder->add('nationality', 'text', array(
            'label' => 'Nationality',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Nationality',
            )
        ));

    }
    
     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\AdminBundle\Entity\Personal',
        ));
    }

    public function getName(){
        return 'Personal';
    }

}
