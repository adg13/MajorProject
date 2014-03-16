<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowMembersController extends Controller {

    public function indexAction() {

        $users = $this->getDoctrine()
                ->getRepository('adg13ProfileBundle:User')
                ->findAll();
        return $this->render('adg13AdminBundle:AdminPanel:ShowMembers.html.twig', array(
                    "users" => $users,
        ));
    }

}
