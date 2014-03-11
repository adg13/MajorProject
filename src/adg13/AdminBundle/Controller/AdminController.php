<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use adg13\AdminBundle\Entity\User;
use adg13\AdminBundle\Form\Type\UserType;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller {

    public function mainAction() {

        return $this->render('adg13AdminBundle:AdminPanel:AdminPanel.html.twig');
    }

    public function onDutyAction() {
        return $this->render('adg13AdminBundle:AdminPanel:onDuty.html.twig');
    }

    public function quickAddMemberAction() {
        return $this->render('adg13AdminBundle:AdminPanel:quickAddMember.html.twig');
    }


}
