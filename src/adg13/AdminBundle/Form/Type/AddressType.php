<?php

namespace adg13\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder->add('line1', 'text', array(
            'label' => 'Line 1',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Line 1',
            )
        ));
        $builder->add('line2', 'text', array(
            'label' => 'Line 2',
            'required' => false,
            'attr' => array(
                'placeholder' => 'Line 2',
            )
        ));
        $builder->add('city', 'text', array(
            'label' => 'City/Town',
            'required' => true,
            'attr' => array(
                'placeholder' => 'City/Town',
            )
        ));

        $builder->add('postcode', 'text', array(
            'label' => 'Post code',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Post Code',
            )
        ));

        $builder->add('region', 'text', array(
            'label' => 'Region',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Region',
            )
        ));


        $builder->add('tel', 'text', array(
            'label' => 'Tel No',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Telephon number',
            )
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\AdminBundle\Entity\Address',
        ));
    }

    public function getName() {
        return 'Address';
    }

}
