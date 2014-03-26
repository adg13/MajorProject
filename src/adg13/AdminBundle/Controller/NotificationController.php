<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller {

    public function indexAction() {

                $notifications = $this->getDoctrine()
                ->getRepository('adg13NotificationBundle:Notification')
                ->findAll();
        return $this->render('adg13AdminBundle:AdminPanel/Notification:index.html.twig', array(
                'notifications'=>$notifications,
        )
                
        );
    }
}
