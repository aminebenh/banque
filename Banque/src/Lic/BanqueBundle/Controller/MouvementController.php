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
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class MouvementController extends Controller
{


    /**
     * @Security("has_role('ROLE_USER')")
     */

    // -----------------------------------------------------------------------------------------------------------------

    public function indexAction($page)
    {
        $user = $this->getUser();

        $em = $this->getDoctrine()->getEntityManager();

        $compteRepository       = $em->getRepository('LicBanqueBundle:Compte');
        $mouvementRepository    = $em->getRepository('LicBanqueBundle:Mouvement');

        $compte = $compteRepository->find($user);


        $mouvDebiteur   = $mouvementRepository->findBy(array('compteDebiteur' => $compte));
        $mouvCrediteur  = $mouvementRepository->findBy(array('compteCrediteur' => $compte));

        return $this->render('@LicBanque/Mouvement/index.html.twig', array(
            'mouvDebiteur' => $mouvDebiteur,
            'mouvCrediteur' => $mouvCrediteur
        ));
    }


    /**
     * @Security("has_role('ROLE_USER')")
     */
    // -----------------------------------------------------------------------------------------------------------------

    public function viewAction($id)
    {

        $em = $this->getDoctrine()->getEntityManager();


        $user = $this->getUser();

        $compteRepository       = $em->getRepository('LicBanqueBundle:Compte');
        $mouvementRepository    = $em->getRepository('LicBanqueBundle:Mouvement');


        $compte = $compteRepository->find($user);


        $mouv = $mouvementRepository->find($id);

        if ($mouv === null && $mouv->getCompte!=$compte)
            throw new NotFoundHttpException('Le mouvement ' . $id . ' n\'existe pas;');

        $args = array(
            'mouv' => $mouv,

        );

        return $this->render('@LicBanque/Mouvement/view.html.twig', $args);

    }


    // -----------------------------------------------------------------------------------------------------------------



    /**
     * @Security("has_role('ROLE_USER')")
     */

    public function ajouterAction(Request $request)

    {


        $user = $this->getUser();




        $compte = $this->getDoctrine()
            ->getEntityManager()
            ->getRepository('LicBanqueBundle:Compte')
            ->find($user->getId());

        $mouv = new Mouvement();
        $mouv->setmembre($user);
        $mouv->setCompteDebiteur($compte);
        $mouv->setCompteCrediteur(null);
        $mouv->setRepetitif(null);




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



    /**
     * @Security("has_role('ROLE_USER')")
     */


    // -----------------------------------------------------------------------------------------------------------------



    public function modifierAction(Request $request,$id)

    {

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








    /**
     * @Security("has_role('ROLE_USER')")
     */

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