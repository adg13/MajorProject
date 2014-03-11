<?php

namespace adg13\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('email', 'email', array(
            'label' => 'Email',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Email',
            )
        ));
        
        $builder->add('roles', 'collection', array(
            'type' => new RoleType,
            'allow_add'    => false,
            ));
        
        $builder->add('personal', new PersonalType());
        
        $builder->add('address', new AddressType());
        
        $builder->add('bank_details', new BankDetailsType());
        
        $builder->add('cars', 'collection', array(
            'type' => new CarType,
            'allow_add'    => true,
            ));
        
        $builder->add('privilidges', new PrivilidgesType());

        $builder->add('save', 'submit', array(
            'label' => 'Submit',
            'attr' => array('class' => 'btn btn-info'),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\ProfileBundle\Entity\User',
        ));
    }

    public function getName() {
        return 'User';
    }

}
