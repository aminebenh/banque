<?php

namespace Lic\BanqueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class CompteController extends Controller
{


    public function infoCompteAction()
    {

        return $this->render('@LicBanque/Compte/infoCompte.html.twig');
    }

}