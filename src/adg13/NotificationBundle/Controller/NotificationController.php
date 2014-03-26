<?php

namespace adg13\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \DateTime;
use adg13\NotificationBundle\Entity\Notification;

class NotificationController extends Controller {

    public function detailsNotAction() {
        
        $notification = new Notification();
        $notification->setNotDate(new DateTime('today'));
        $notification->setType('different');
        $notification->setUser($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $em->persist($notification);
        $em->flush();
        return $this->redirect($this->generateUrl('adg13_user_homepage'));
    }

    public function claimNotAction() {
        return $this->render('adg13NotificationBundle:Default:index.html.twig');
    }

}
