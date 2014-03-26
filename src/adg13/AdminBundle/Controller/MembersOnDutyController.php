<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MembersOnDutyController extends Controller {

    public function indexAction() {

        $users = $this->getDoctrine()
                ->getRepository('adg13ProfileBundle:User')
                ->findAll();
        return $this->render('adg13AdminBundle:AdminPanel/MembersOnDuty:index.html.twig', array(
                    "users" => $users,
        ));
    }

    public function pdfAction() {

        $date = new \DateTime('today');

        $users = $this->getDoctrine()
                ->getRepository('adg13ProfileBundle:User')
                ->findAll();

        $this->get('knp_snappy.pdf')->generateFromHtml(
                $this->renderView(
                        'adg13AdminBundle:Pdf/MembersOnDuty:index.html.twig', array(
                    'users' => $users,
                        )
                ), '/Users/homie/Desktop/MembersOnDuty' . $date->format('Y-m-d') . '.pdf'
        );
        return $this->redirect($this->generateUrl('adg13_admin_on_duty'));
    }

}
