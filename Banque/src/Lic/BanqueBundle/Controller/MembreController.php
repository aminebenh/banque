<?php

namespace Lic\BanqueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MembreController extends Controller
{


    public function profilAction()
    {

        return $this->render('@LicBanque/Membre/profil.html.twig');
    }

}