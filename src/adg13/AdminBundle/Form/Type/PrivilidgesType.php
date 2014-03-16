<?php

namespace adg13\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrivilidgesType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('status', 'choice', array(
            'label' => 'Status',
            'choices' => array('TRAINEE' => 'Trainee', 'MEMBER' => 'Member'),
            'required' => false,
            'empty_value' => 'Choose a status',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\AdminBundle\Entity\Privilidges',
        ));
    }

    public function getName() {
        return 'privilidges';
    }

}
