<?php

namespace adg13\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use adg13\ProfileBundle\Entity\User;
use adg13\AdminBundle\Form\Type\UserType;
use adg13\AdminBundle\Entity\Personal;
use adg13\AdminBundle\Entity\Address;
use adg13\AdminBundle\Entity\BankDetails;
use adg13\AdminBundle\Entity\Car;
use adg13\AdminBundle\Entity\Role;
use adg13\AdminBundle\Entity\Privilidges;
use Symfony\Component\HttpFoundation\Request;

class CreateUserController extends Controller {

    public function addMemberAction(Request $request) {

        $user = new User();
        $personal = new Personal();
        $user->setPersonal($personal);
        $address = new Address();
        $user->setAddress($address);
        $bank_details = new BankDetails();
        $user->setBankDetails($bank_details);
        $car = new Car();
        $user->addCar($car);
        $role = new Role();
        $user->addRole($role);
        $privilidges = new Privilidges();
        $user->setPrivilidges($privilidges);
        $form = $this->createForm(new UserType(), $user);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $user->setUsername($user->getEmail());
            $plainPassword = md5(uniqid(null, true));
            $encoder = $this->get('security.encoder_factory')->getEncoder($user);
            $password = $encoder->encodePassword($plainPassword, $user->getSalt());
            $user->setPassword($password);
            $name = $user->getPersonal()->getFirstName();
            $email1 = $user->getEmail();
            if($role->getRole()=='ROLE_ADMIN'){
                $role->setName('Admin');
            }else{
                $role->setName('User');
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $message = \Swift_Message::newInstance()
                    ->setContentType('text/html')
                    ->setSubject('Welcome in 4x4 Response Group')
                    ->setFrom('agawryszewski5@gmail.com')
                    ->setTo($user->getEmail())
                    ->setBody(
                    $this->renderView(
                            'adg13AdminBundle:AdminPanel/EmailTemplate:EmailTemplate.html.twig', array(
                                'name' => $user->getPersonal()->getFirstName().' '.$user->getPersonal()->getLastname(),
                                'password' => $plainPassword
                )));
            $this->get('mailer')->send($message);

            return $this->render('adg13AdminBundle:AdminPanel/AddMember:AddMember_page_3.html.twig', array(
                        'email' => $email1,
                        'name' => $name
            ));
        }

        return $this->render('adg13AdminBundle:AdminPanel/AddMember:AddMember_page_1.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
