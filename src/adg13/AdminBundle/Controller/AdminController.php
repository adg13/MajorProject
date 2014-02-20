<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use adg13\AdminBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller {

    public function mainAction() {
        return $this->render('adg13AdminBundle:AdminPanel:AdminPanel.html.twig');
    }

    public function addUserAction() {
        $user = new User();
        $user->setEmail("stasiek@wp.pl");
        $user->setPassword("haslo");
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response('Created user id ' . $user->getId());
    }

    public function showUserAction($id) {
        $user = $this->getDoctrine()
                ->getRepository('adg13AdminBundle:User')
                ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                    'No user found for id ' . $id
            );
        } else {

            return new Response('User name ' . var_dump($user));
        }
    }

    public function showAllUsersAction() {
        $user = $this->getDoctrine()
                ->getRepository('adg13AdminBundle:User')
                ->findAll();

        if (!$user) {
            throw $this->createNotFoundException(
                    'No user found for id ' . $id
            );
        } else {
            $string = var_dump($user);
            return new Response('User name ' . $string . '<br />');
        }
    }

    public function removeUserAction($id) {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('adg13AdminBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                    'No user found for id ' . $id
            );
        } else {
            $em->remove($user);
            $em->flush();
        }
        return new Response('User with id: ' . $id . 'removed');
    }

    public function updateUserAction() {
        $id = 22;
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('adg13AdminBundle:User')->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                    'No product found for id ' . $id
            );
        }

        $user->setEmail("agawryszewski@wp.pl");
        $em->flush();
        return new Response('User with id: ' . $id . 'updated');
    }

}
