<?php

namespace adg13\ProfileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class SecurityController extends Controller {

    public function homepageAction() {

        return $this->render(
                        'adg13ProfileBundle:Homepage:homepage.html.twig');
    }

    public function loginAction() {
        $request = $this->getRequest();
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                    SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
                        'adg13ProfileBundle:Security:index.html.twig', array('error' => $error,));
    }

}
