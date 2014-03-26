<?php

namespace adg13\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EditType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder->add('personal', new \adg13\AdminBundle\Form\Type\PersonalType());
        
        $builder->add('address', new \adg13\AdminBundle\Form\Type\AddressType());
        
        $builder->add('bank_details', new \adg13\AdminBundle\Form\Type\BankDetailsType);
        
        $builder->add('cars', 'collection', array(
            'type' => new \adg13\AdminBundle\Form\Type\CarType(),
            'allow_add'    => true
            ));

        $builder->add('save', 'submit', array(
            'label' => 'Submit',
            'attr' => array('class' => 'btn btn-info'),
        ));
    }


    public function getName() {
        return 'Edit';
    }

}
