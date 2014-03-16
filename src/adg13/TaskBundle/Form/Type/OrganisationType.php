<?php

namespace adg13\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrganisationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('name', 'text', array(
            'label' => 'Name',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Organisation Name',
            )
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\TaskBundle\Entity\Organisation',
        ));
    }

    public function getName() {
        return 'Organisation';
    }

}
