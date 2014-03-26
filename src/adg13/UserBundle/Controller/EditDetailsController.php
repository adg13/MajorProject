<?php

namespace adg13\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use adg13\UserBundle\Form\Type\EditType;

class EditDetailsController extends Controller {

    public function indexAction(Request $request) {

        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('adg13ProfileBundle:User')->find($this->getUser()->getId());
        $form = $this->createForm(new EditType(), $user);
        $form->handleRequest($request);

        if ($form->isValid()) {                       
            
            return $this->redirect($this->generateUrl('adg13_notification_change_details'));
        }
        return $this->render('adg13UserBundle:ChangeDetails:index.html.twig',array(
            'form'=>$form->createView(),
        ));
    }

}
