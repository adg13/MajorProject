<?php

namespace adg13\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CarType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('make', 'text', array(
            'label' => 'Make',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Make',
            )
        ));
        $builder->add('model', 'text', array(
            'label' => 'Model',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Model',
            )
        ));
        $builder->add('reg_plates', 'text', array(
            'label' => 'Plates',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Plates',
            )
        ));

        $builder->add('engine', 'text', array(
            'label' => 'Engine Size',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Engine  Size',
            )
        ));
        
        $builder->add('fuel', 'choice', array(
            'label' => 'Fuel Type',
            'choices' => array('Gas' => 'Gas', 'Diesel' => 'Diesel', 'Petrol' => 'Petrol'),
            'required' => true,
            'empty_value' => 'Please insert fuel type.',
        ));

        $builder->add('seats', 'integer', array(
            'label' => 'No. seats',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Number of seats',
            )
        ));
        
        $builder->add('addAnotherOne', 'submit', array(
            'label' => 'Add a car',
            'attr' => array('class' => 'btn btn-info'),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\AdminBundle\Entity\Car',
        ));
    }

    public function getName() {
        return 'car';
    }

}
