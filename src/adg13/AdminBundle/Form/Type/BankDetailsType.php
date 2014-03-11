<?php

namespace adg13\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BankDetailsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder->add('bank_name','text', array(
            'label' => 'Bank Name',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Bank Name',
            )
        ));
        
        $builder->add('sort_code','text', array(
            'label' => 'Sort Code',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Sort Code',
            )
        ));
        
        $builder->add('account_number','number', array(
            'label' => 'Account Number',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Account Number',
            )
        ));
        
    }
    
     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\AdminBundle\Entity\BankDetails',
        ));
    }

    public function getName(){
        return 'bank_details';
    }

}
