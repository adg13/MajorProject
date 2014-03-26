<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowDetailedMemberController extends Controller {

    public function indexAction($id) {
       
                $user = $this->getDoctrine()
                ->getRepository('adg13ProfileBundle:User')
                ->find($id);
        
        return $this->render('adg13AdminBundle:AdminPanel/ShowDetailedMember:index.html.twig', array(
            "user" => $user,
        ));
    }

}
