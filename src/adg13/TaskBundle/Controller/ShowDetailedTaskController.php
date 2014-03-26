<?php

namespace adg13\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowDetailedTaskController extends Controller {

    public function indexAction($id) {
       
                $task = $this->getDoctrine()
                ->getRepository('adg13TaskBundle:Task')
                ->find($id);
        
        return $this->render('adg13TaskBundle:ShowDetailedTask:index.html.twig', array(
            "task" => $task,
        ));
    }

}
