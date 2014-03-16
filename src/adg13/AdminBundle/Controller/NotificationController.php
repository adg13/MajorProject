<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller {

    public function indexAction() {

        return $this->render('adg13AdminBundle:AdminPanel/Notification:index.html.twig'
        );
    }
}
