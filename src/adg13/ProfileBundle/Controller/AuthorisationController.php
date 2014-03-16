<?php

namespace adg13\ProfileBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthorisationController extends Controller {

    public function indexAction() {

        $usr = $this->get('security.context')->getToken()->getUser();

        if (strcmp($usr->getRoles()[0]->getRole(), 'ROLE_ADMIN') == 0) {
            if ($usr->getIsActive()) {
                if ($usr->getFirstPass() == true) {
                    return $this->redirect($this->generateUrl('adg13_change_password'));
                } else {
                    return $this->redirect($this->generateUrl('adg13_admin_map'));
                }
            }
        } else {
            if ($usr->getIsActive()) {
                if ($usr->getFirstPass() == true) {
                    return $this->redirect($this->generateUrl('adg13_change_password'));
                } else {
                    return $this->redirect($this->generateUrl('adg13_user_homepage'));
                }
            }
        }
        return new Response('adg13_login');
    }

}
