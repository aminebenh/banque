<?php

namespace Lic\BanqueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MouvementController extends Controller
{


    public function viewAction($id, Request $request)
    {

        $tag = $request->query->get('tag');

        return $this->render('@LicBanque/Mouvement/view.html.twig', array(
            'id'  => $id,
            'tag' => $tag,
        ));
    }

}