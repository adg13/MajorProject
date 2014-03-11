<?php

namespace adg13\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CalendarController extends Controller {

    public function indexAction() {

        return $this->render('adg13UserBundle:Calendar:index.html.twig');
    }

}
