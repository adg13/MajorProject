<?php

namespace adg13\LoginBundle\Controller;

use adg13\AdminBundle\Entity\User;
use adg13\AdminBundle\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller {

    public function indexAction(Request $request) {

        
        
        if ($request->getMethod() == 'POST') {
            $email = $request->get('email');
            $password = $request->get('password');
            $em = $this->getDoctrine()->getEntityManager();
            $repository = $em->getRepository('adg13AdminBundle:User');
            $user = $repository->findOneBy(array('email' => $email, 'password' => $password));
            if ($user) {
                return $this->redirect($this->generateUrl('adg13_admin_main'));
            } else {
                return $this->render('adg13LoginBundle:Login:failed.html.twig');
            }
        }
        return $this->render('adg13LoginBundle:Login:index.html.twig');
    }

    public function addCarAction() { {
            $user = new User();
            $user->setEmail('dupa@dupa.pl');
            $user->setPassword('haslo');

            $car = new Car();

            $car->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->persist($car);
            $em->flush();

            return new Response(
                    'Created car id: ' . $car->getId() . ' and user id: ' . $user->getId()
            );
        }
    }

}
