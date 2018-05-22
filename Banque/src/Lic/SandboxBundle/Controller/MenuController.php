<?php

namespace Lic\SandboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    public function menuAction()
    {
        $args = array(
            'menu' => array('Bonjour', 'Aurevoir', 'Merci'),
        );
        return $this->render('@LicSandbox/Menu/menu.html.twig', $args);
    }
}