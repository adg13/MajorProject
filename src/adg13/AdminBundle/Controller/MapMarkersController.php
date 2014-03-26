<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MapMarkersController extends Controller {

    public function indexAction() {
        
        $users = $this->getDoctrine()
                ->getRepository('adg13ProfileBundle:User')
                ->findAll();
        
        return new Response(json_encode($users));
    }


}
