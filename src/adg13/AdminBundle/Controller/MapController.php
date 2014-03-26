<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MapController extends Controller {

    public function indexAction() {

        return $this->render('adg13AdminBundle:AdminPanel/Map:index.html.twig');
    }

}
