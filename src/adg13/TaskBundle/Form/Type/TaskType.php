<?php

namespace adg13\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class TaskType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('user', 'entity', array(
            'required' => true,
            'empty_value' => 'Choose a member',
            'class' => 'adg13ProfileBundle:User',
            'query_builder' => function(EntityRepository $er) {
        return $er->createQueryBuilder('u');
    },
        ));

        $builder->add('caller', new CallerType()
        );

        $builder->add('contact', new ContactType()
        );

        $builder->add('description', 'text', array(
            'label' => 'Description',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Description',
            )
        ));

        $builder->add('conditions', 'text', array(
            'label' => 'Conditions',
            'required' => true,
            'attr' => array(
                'placeholder' => 'Conditions',
            )
        ));

        $builder->add('isAccepted', 'choice', array(
            'label' => 'Accepted/Declined',
            'choices' => array('Yes' => 'Yes', 'No' => 'No'),
            'required' => true,
            'empty_value' => 'Do you accept this task.',
        ));

        $builder->add('contactTime', 'datetime', array(
            'label' => 'Expected Contact Time',
            'required' => true,
            'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
        ));

        $builder->add('returnTime', 'datetime', array(
            'label' => 'Expected Return Time',
            'required' => true,
            'empty_value' => array('year' => 'Year', 'month' => 'Month', 'day' => 'Day'),
        ));

        $builder->add('save', 'submit', array(
            'label' => 'Submit',
            'attr' => array('class' => 'btn btn-info'),
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'adg13\TaskBundle\Entity\Task',
        ));
    }

    public function getName() {
        return 'Task';
    }

}
