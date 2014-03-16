<?php

namespace adg13\AdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrototypeType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('creditcard', new CreditCardFieldType(), array('label' => 'Credit Card',
            'required' => true,
            'expanded' => false,
            'class' => 'Acme\Bundle\Entity\CreditCardCharge',
            'property' => 'object',
            'multiple' => false,
            'query_builder' => function(\Acme\Bundle\Repository\CreditCardChargeRepository $er) {
        return $er->createQueryBuilder('b');
    },
            'mapped' => false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\AdminBundle\Entity\Car',
        ));
    }

    public function getName() {
        return 'Prototype';
    }

}
