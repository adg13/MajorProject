<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use adg13\AdminBundle\Form\Type\UserType;
use Symfony\Component\HttpFoundation\Request;

class EditMemberController extends Controller {

    public function indexAction(Request $request, $id) {

        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('adg13ProfileBundle:User')->find($id);
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->flush();
            
            return $this->redirect($this->generateUrl('adg13_admin_show_detailed_members', array('id' => $id,)));
        }
        return $this->render('adg13AdminBundle:AdminPanel/EditMember:index.html.twig', array(
                    'id' => $id, 'user' => $user, 'form' => $form->createView()));
    }

}
