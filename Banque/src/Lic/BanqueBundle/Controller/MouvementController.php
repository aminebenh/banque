<?php

namespace Lic\BanqueBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Lic\BanqueBundle\Entity\Film;
use Lic\BanqueBundle\Entity\Mouvement;
use Lic\BanqueBundle\Entity\Critique;

class MouvementController extends Controller
{





    public function indexAction($page)
    {

        $em = $this->getDoctrine()->getEntityManager();

        $mouvementRepository = $em->getRepository('LicBanqueBundle:Mouvement');

        $listmouv = $mouvementRepository->findAll();

        return $this->render('@LicBanque/Mouvement/index.html.twig', array(
            'listmouv' => $listmouv, 'page'=>$page
        ));
    }



    public function viewAction($id)
    {

        $em = $this->getDoctrine()->getEntityManager();
        $MouvementRepository = $em->getRepository('LicBanqueBundle:Mouvement');

        /** @var Mouvement $mouv */
        $Mouv = $MouvementRepository->find($id);
        if ($Mouv === null)
            throw new NotFoundHttpException('Le mouvement ' . $id . ' n\'existe pas;');

        $args = array(
            'mouv' => $Mouv
        );

        return $this->render('@LicBanque/Mouvement/view.html.twig', $args);

    }


    public function addendurAction()

    {

        $em = $this->getDoctrine()->getEntityManager();

        $Mouv = new Mouvement();

        //$Mouv->setDateMouvement(2018-05-15);

        $Mouv->setMontant(5000);

        $Mouv->setCompte(298438);

        $Mouv->setDescription("test");

        $Mouv->setRepetitif(1);

        $Mouv->setmembre(1);

        $Mouv->setValider(true);

        $Mouv->setRapprochement(true);

        $em->persist($Mouv);

        $em->flush();


    return $this->redirectToRoute('lic_banque_mouvement', array('id' => $Mouv->getId() ));

    }




















    public function menuAction($limit)
    {

        $listmouv = array(
            array('id' => 2, 'description' => 'Salaire mai'),
            array('id' => 5, 'description' => 'sfr avril'),
            array('id' => 9, 'description' => 'Salaire')
        );

        return $this->render('@LicBanque/Mouvement/menu.html.twig', array(

            'listmouv' => $listmouv
        ));
    }



}