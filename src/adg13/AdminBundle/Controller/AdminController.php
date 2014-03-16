<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {

    public function mainAction() {

        return $this->render('adg13AdminBundle:AdminPanel:AdminPanel.html.twig');
    }


    public function quickAddMemberAction() {
        return $this->render('adg13AdminBundle:AdminPanel:quickAddMember.html.twig');
    }


}
