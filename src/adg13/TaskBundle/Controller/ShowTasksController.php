<?php

namespace adg13\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowTasksController extends Controller {

    public function adminAction() {

        $tasks = $this->getDoctrine()
                ->getRepository('adg13TaskBundle:Task')
                ->findAll();
        return $this->render('adg13TaskBundle:ShowTasks:admin.html.twig', array(
                    "tasks" => $tasks,
        ));
    }
    
        public function userAction() {
       
                $tasks = $this->getUser()->getTasks();
        return $this->render('adg13TaskBundle:ShowTasks:user.html.twig', array(
            "tasks" => $tasks,
        ));
    }

}
