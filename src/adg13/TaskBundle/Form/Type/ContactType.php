<?php

namespace adg13\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('firstName', 'text', array(
            'label' => 'First Name',
            'required' => true,
            'attr' => array(
                'placeholder' => 'First Name',
            )
        ));
        
        $builder->add('lastname', 'text', array(
            'label' => 'Lastname',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Last Name',
            )
        ));       
        
        $builder->add('gridReference', 'text', array(
            'label' => 'Grid Reference',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Grid Reference',
            )
        ));
        
        $builder->add('address', new \adg13\AdminBundle\Form\Type\AddressType()
        );

    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\TaskBundle\Entity\Contact',
        ));
    }

    public function getName() {
        return 'Contact';
    }

}
