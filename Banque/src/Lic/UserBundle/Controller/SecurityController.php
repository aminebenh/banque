<?php


namespace Lic\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Lic\UserBundle\Entity\User;

class SecurityController extends Controller
{
    public function loginAction(Request $request)
    {

        /*
         $em = $this->getDoctrine()->getEntityManager();

        $listNames = array('Alexandre', 'Marine', 'Anna');

        foreach ($listNames as $name) {

            $user = new User;

            $user->setUsername($name);
            $user->setPassword($name);

            $user->setSalt('');
            $user->setRoles(array('ROLE_USER'));

            $em->persist($user);

        $em->persist($user);
        }
        $em->flush();
        */



        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('lic_banque_compte');
        }

        $authenticationUtils = $this->get('security.authentication_utils');


        return $this->render('@LicUser/Security/login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUsername(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));
    }
}
