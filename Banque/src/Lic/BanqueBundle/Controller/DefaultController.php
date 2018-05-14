<?php

namespace Lic\BanqueBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@LicBanque/Default/index.html.twig');
    }
}
