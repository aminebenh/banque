<?php

namespace Lic\SandboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('@LicSandbox/Hello/index.html.twig');
        return new Response($content);
    }

    public function index2Action()
    {
        return $this->render('@LicSandbox/Hello/index2.html.twig');
    }

    public function index3Action()
    {
        $args = array(
            'prenom' => 'Gilles',
            'jeux' => array('Everquest', 'Wow', 'Mass Effect', 'Life is strange'),
        );

        return $this->render('@LicSandbox/Hello/index3.html.twig', $args);
    }

    public function index4Action()
    {
        $args = array(
            'prenom' => 'Gilles',
            'jeux' => array('Everquest', 'Wow', 'Mass Effect', 'Life is strange'),
        );

        return $this->render('@LicSandbox/Hello/index4.html.twig', $args);
    }
}