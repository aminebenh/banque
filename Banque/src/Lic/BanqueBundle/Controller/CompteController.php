<?php

namespace Lic\BanqueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Lic\BanqueBundle\Entity\Compte;
use Lic\BanqueBundle\Entity\Mouvement;
use Lic\BanqueBundle\Entity\Droit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;




class CompteController extends Controller
{



    /**
     * @Security("has_role('ROLE_USER')")
     */

    // -----------------------------------------------------------------------------------------------------------------

    public function viewAction()
    {


        $userId = $this->getUser()->getid();



        $em = $this->getDoctrine()->getEntityManager();

        $CompteRepository = $em->getRepository('LicBanqueBundle:Compte');
        $MouvementRepository = $em->getRepository('LicBanqueBundle:Mouvement');
        $DroitRepository = $em->getRepository('LicBanqueBundle:Droit');


        $Compte = $CompteRepository->find(3);



        $MouvementsDebiteur = $MouvementRepository->findBy(array('compteDebiteur' => $Compte));
        $MouvementsCrediteur = $MouvementRepository->findBy(array('compteCrediteur' => $Compte));


        $Droits = $DroitRepository->findBy(array('compte' => $Compte));



        $args = array(
            'compte' => $Compte,
           'mouvementsDeb'=>$MouvementsDebiteur,
            'mouvementsCre'=>$MouvementsCrediteur,
            'droits'=>$Droits
        );

        return $this->render('@LicBanque/Compte/view.html.twig', $args);

    }





}