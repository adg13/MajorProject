<?php

namespace adg13\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use adg13\UserBundle\Entity\Event;

class CalendarController extends Controller {

    public function indexAction() {

        return $this->render('adg13UserBundle:Calendar:index.html.twig');
    }

    public function addEventAction(Request $request) {
        $event = new Event();
        $json = $request->getContent();
        if ($json) {
            $obj = json_decode($json);
            $event->setUser($this->getUser());
            $event->setTitle($obj->title);
            $event->setStart($obj->start);
            $event->setEnd($obj->end);
            $event->setAllDay($obj->allDay);
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();
        }
        return $this->render('adg13UserBundle:Calendar:index.html.twig');
    }

    public function displayEventsAction() {
        
           $events = $this->getDoctrine()
                ->getRepository('adg13UserBundle:Event')
                ->findBy(array('user' => $this->getUser()->getId()));
           
           
        
        return new Response(json_encode($events));
    }

}
