<?php

namespace adg13\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CallerType extends AbstractType {

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
        
        $builder->add('telephon', 'text', array(
            'label' => 'Telephon No.',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Telephon No',
            )
        ));
        
        $builder->add('organisation', new OrganisationType()
        );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\TaskBundle\Entity\Caller',
        ));
    }

    public function getName() {
        return 'Caller';
    }

}
