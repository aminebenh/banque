<?php

namespace Lic\SandboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TwigController extends Controller
{
    public function vue1Action()
    {

        return $this->render('@LicSandbox/Twig/vue1.html.twig');
    }

    public function vue2Action()
    {

        return $this->render('@LicSandbox/Twig/vue2.html.twig');
    }

    public function vue3Action()
    {

        return $this->render('@LicSandbox/Twig/vue3.html.twig');
    }

    public function vue4Action()
    {

        return $this->render('@LicSandbox/Twig/vue4.html.twig');
    }

    public function vue5Action()
    {

        return $this->render('@LicSandbox/Twig/vue5.html.twig');
    }

    public function vue6Action()
    {
        $prenom = 'Fanan';
        $mail = 'fanan@felim.ra';
        $tab = array (
            'mentions' => array(
                'Info' => array(
                    'nom' => 'Informatique',
                    'parcours' => array(
                        'Informatique',
                        'Image',
                    ),
                    'responsable' => 'SJ',
                ),
                'PC' => array(
                    'nom' => 'Physique-Chimie',
                    'parcours' => array(
                        'Physique',
                        'Chimie minérale',
                    ),
                    'responsable' => 'GA',
                ),
                'Bio' => array(
                    'nom' => 'Biologie',
                    'parcours' => array(
                        'Géologie',
                        'Biologie végétale',
                        'Biologie animale',
                    ),
                    'responsable' => 'MN',
                ),
            ),
            'ues' => array(
                array(
                    'nom' => 'Algo 1',
                    'volume' => 54,
                ),
                array(
                    'nom' => 'Maths discrètes',
                    'volume' => 40,
                ),
                array(
                    'nom' => 'Anglais S1',
                    'volume' => 20,
                ),
                array(
                    'nom' => 'Anglais S2',
                    'volume' => 20,
                ),
                array(
                    'nom' => 'Projet',
                    'volume' => 70,
                ),
            ),
        );

        $args = array(
                'prenom' => $prenom,
                'mail' => $mail,
                'tab' => $tab
        );

        return $this->render('@LicSandbox/Twig/vue6.html.twig', $args);
    }
}