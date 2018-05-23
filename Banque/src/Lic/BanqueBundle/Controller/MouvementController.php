<?php

namespace Lic\BanqueBundle\Controller;


use Lic\BanqueBundle\Form\MouvementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Lic\BanqueBundle\Entity\Film;
use Lic\BanqueBundle\Entity\Mouvement;
use Lic\BanqueBundle\Entity\Critique;
use \Datetime;



class MouvementController extends Controller
{




    // -----------------------------------------------------------------------------------------------------------------

    public function indexAction($page)
    {

        $em = $this->getDoctrine()->getEntityManager();

        $mouvementRepository = $em->getRepository('LicBanqueBundle:Mouvement');

        $listmouv = $mouvementRepository->findAll();

        return $this->render('@LicBanque/Mouvement/index.html.twig', array(
            'listmouv' => $listmouv, 'page'=>$page
        ));
    }


    // -----------------------------------------------------------------------------------------------------------------

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

    // -----------------------------------------------------------------------------------------------------------------

    public function addendurAction()

    {

        $em = $this->getDoctrine()->getEntityManager();

        $Mouv = new Mouvement();

        $Mouv->setDateMouvement(new DateTime('2018-05-15'));

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


    public function modifierAction(Request $request,$id)

    {

        //$mouv = new Mouvement();
        // $Mouv->setRepetitif(1);

        $mouv=$this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('LicBanqueBundle:Mouvement')
                    ->find($id);

        $form=$this->createForm(MouvementType::class, $mouv);



        if ($request->isMethod('POST')) {

            $form->handleRequest($request);


            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                $em->persist($mouv);


                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'mouvement bien enregistré.');


                return $this->redirectToRoute('lic_banque_mouvement', array('id' => $mouv->getId()));
            }
        }



        return $this->render('@LicBanque/Mouvement/modifier.html.twig', array('form'=>$form->createView(),));

    }





    // -----------------------------------------------------------------------------------------------------------------
    public function modifierendurAction()
    {

        $em = $this->getDoctrine()->getEntityManager();
        $MouvementRepository = $em->getRepository('LicBanqueBundle:Mouvement');

        /** @var Mouvement $mouv */
        $Mouv = $MouvementRepository->find(3);

        $Mouv->setDescription ('test modifier');
        $Mouv->setValider(false);
        $Mouv->setMontant(3000);

        $em->persist($Mouv);
        $em->flush();

        return $this->redirectToRoute('lic_banque_mouvement', array('id' => $Mouv->getId() ));
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function effacerendurAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $MouvementRepository = $em->getRepository('LicBanqueBundle:Mouvement');

        $Mouv = $MouvementRepository->find(3);

        $em->remove($Mouv);
        $em->flush();

        return $this->redirectToRoute('lic_banque_home');
    }





}