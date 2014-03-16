<?php

namespace adg13\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChangePasswordController extends Controller {

    public function indexAction(Request $request) {

        $form = $this->createFormBuilder()
                ->add('oldPass', 'password', array(
                    'label' => 'Old Password',
                ))
                ->add('newPass', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'The password fields must match.',
                    'label' => 'New Password',
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password'),
                ))
                ->add('save', 'submit')
                ->getForm();
        $form->handleRequest($request);;
        
        if ($form->isValid()) {
            $usr = $this->getUser();
            $plainpassword = $form->get('newPass')->getData();
            $encoder = $this->get('security.encoder_factory')->getEncoder($usr);
            $password = $encoder->encodePassword($plainpassword, $usr->getSalt());
            $usr->setPassword($password);
            $usr->setFirstPass(0);
            $em = $this->getDoctrine()->getManager();
            $em->persist($usr);
            $em->flush();
            
            return $this->redirect($this->generateUrl('adg13_authorisation'));
        }

        return $this->render('adg13ProfileBundle:ChangePassword:index.html.twig', array(
                    'form' => $form->createView(),
        ));
    }

}
