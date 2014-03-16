<?php

namespace adg13\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use adg13\TaskBundle\Entity\Task;
use adg13\TaskBundle\Form\Type\TaskType;

class AddTaskController extends Controller {

    public function indexAction(Request $request) {

        $task = new Task();
        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();



            return $this->render('adg13AdminBundle:AdminPanel/AddMember:AddMember_page_3.html.twig', array(
            ));
        }

        return $this->render('adg13TaskBundle:AddTask:index.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
