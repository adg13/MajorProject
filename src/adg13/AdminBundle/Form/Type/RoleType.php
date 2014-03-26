<?php

namespace adg13\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RoleType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('role', 'choice', array(
            'label' => 'Role',
            'choices' => array('ROLE_USER' => 'User','ROLE_ADMIN' => 'Admin'),
            'required' => true,
            'empty_value' => 'Choose a role',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\AdminBundle\Entity\Role',
        ));
    }

    public function getName() {
        return 'role';
    }

}
