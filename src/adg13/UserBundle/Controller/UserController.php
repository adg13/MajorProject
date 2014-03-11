<?php

namespace adg13\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {

    public function indexAction() {

        $user = $this->getDoctrine()
                ->getRepository('adg13ProfileBundle:User')
                ->find($this->getUser()->getId());
        return $this->render('adg13UserBundle:Details:index.html.twig', array(
            'user' =>$user
        ));
    }

}
