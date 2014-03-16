<?php

namespace adg13\UserBundle\Form\Type;

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

    }
    
     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\UserBundle\Entity\Personal',
        ));
    }

    public function getName(){
        return 'ClaimExpenses';
    }

}
