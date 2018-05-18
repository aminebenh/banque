<?php

namespace Lic\BanqueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Lic\BanqueBundle\Entity\Compte;
use Lic\BanqueBundle\Entity\Mouvement;
use Lic\BanqueBundle\Entity\Droit;





class CompteController extends Controller
{




    // -----------------------------------------------------------------------------------------------------------------

    public function viewAction()
    {

        $em = $this->getDoctrine()->getEntityManager();

        $CompteRepository = $em->getRepository('LicBanqueBundle:Compte');
        $MouvementRepository = $em->getRepository('LicBanqueBundle:Mouvement');
        $DroitRepository = $em->getRepository('LicBanqueBundle:Droit');

        /** @var Compte $Compte */
        $Compte = $CompteRepository->find(3);

        /** @var Mouvement $Mouvements */
        $Mouvements = $MouvementRepository->findBy(array('compte' => $Compte));

        $Droits = $DroitRepository->findBy(array('idCompte' => $Compte));

        $args = array(
            'compte' => $Compte,
            'mouvements'=>$Mouvements,
            'droits'=>$Droits
        );

        return $this->render('@LicBanque/Compte/view.html.twig', $args);

    }





}