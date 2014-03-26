<?php

namespace adg13\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClaimFinanceController extends Controller {

    public function indexAction() {
        
        
        return $this->render('adg13UserBundle:ClaimFinance:index.html.twig');
    }

}
