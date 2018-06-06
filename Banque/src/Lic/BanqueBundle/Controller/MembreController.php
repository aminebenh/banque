<?php

namespace Lic\BanqueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Lic\BanqueBundle\Entity\Membre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;




class MembreController extends Controller
{



    /**
     * @Security("has_role('ROLE_USER')")
     */

    // -----------------------------------------------------------------------------------------------------------------

    public function viewAction()
    {

        $membre = $this->getUser();


        $args = array(
            'membre' => $membre
        );

        return $this->render('@LicBanque/Membre/view.html.twig', $args);

    }



    public function detailsFamilleAction()
    {

        $membre = $this->getUser();

        $famille =$membre->getFamille();

        $em = $this->getDoctrine()->getEntityManager();

        $CompteRepository = $em->getRepository('LicBanqueBundle:Compte');
        $MembreRepository = $em->getRepository('LicBanqueBundle:Membre');

        $membres = $MembreRepository->findBy(array('famille' => $famille));
        $comptes = $CompteRepository->findBy(array('membre' => $membres));

        $args = array(
            'comptes' => $comptes
        );

        return $this->render('@LicBanque/Membre/famille.html.twig', $args);

    }




}