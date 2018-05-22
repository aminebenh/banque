<?php

namespace Lic\SandboxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lic\SandboxBundle\Entity\Film;
use Lic\SandboxBundle\Entity\Critique;

class DoctrineController extends Controller
{
    public function listAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $filmRepository = $em->getRepository('LicSandboxBundle:Film');

        $films = $filmRepository->findAll();

        $args = array(
            'films' => $films
        );

        return $this->render('@LicSandbox/Doctrine/list.html.twig', $args);

        /*
        $nom = array();
        $id = array();

        for ($i = 0; $i < count($film); $i++) {
            array_push($id, $film[$i]->getId());
            array_push($nom, $film[$i]->getNom());
        }

        foreach ($films as $film){
            array_push($id, $film->getId());
            array_push($nom, $film->getNom());
        }

        /*$args = array(
            'ids' => $id,
            'noms' => $nom
        );
        */
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $filmRepository = $em->getRepository('LicSandboxBundle:Film');
        $critiqueRepository = $em->getRepository('LicSandboxBundle:Critique');

        /** @var Film $film */
        $film = $filmRepository->find($id);
        if ($film === null)
            throw new NotFoundHttpException('Le film ' . $id . ' n\'existe pas;');

        $critiques = $critiqueRepository->findBy(array('film' => $film));

        $args = array(
            'film' => $film,
            'critiques' => $critiques,
        );

        return $this->render('@LicSandbox/Doctrine/view.html.twig', $args);
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function addendurAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $film = new Film();
        $film->setNom('Le grand bleu');
        $film->setAnnee(1988);
        $film->setEnstock(true);
        $film->setPrix(9.99);
        $film->setQuantite(88);

        $em->persist($film);
        $em->flush();

        return $this->redirectToRoute('lic_sandbox_doctrine_view', array('id' => $film->getId()));
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function modifieendurAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $filmRepository = $em->getRepository('LicSandboxBundle:Film');

        $film = $filmRepository->find(22);

        $film->setNom('Le grand blanc');
        $film->setEnstock(false);
        $film->setQuantite(0);

        $em->persist($film);
        $em->flush();

        return $this->redirectToRoute('lic_sandbox_doctrine_view', array('id' => $film->getId()));
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function effaceendurAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $filmRepository = $em->getRepository('LicSandboxBundle:Film');

        $film = $filmRepository->find(24);

        $em->remove($film);
        $em->flush();

        return $this->redirectToRoute('lic_sandbox_doctrine_view');
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function infoAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $filmRepository = $em->getRepository('LicSandboxBundle:Film');

        $film = $filmRepository->find($id);

        $args = array(
            'film' => $film
        );

        return $this->render('@LicSandbox/Doctrine/info.html.twig', $args);
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function suppAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $filmRepository = $em->getRepository('LicSandboxBundle:Film');

        $film = $filmRepository->find($id);

        $em->remove($film);
        $em->flush();

        return $this->redirectToRoute('lic_sandbox_doctrine_view');
    }

    // -----------------------------------------------------------------------------------------------------------------
    public function addendurbisAction()
    {
        $film = new Film();
        $film->setNom('Le grand bleu');
        $film->setAnnee(1988);
        $film->setEnstock(true);
        $film->setPrix(9.99);
        $film->setQuantite(88);

        $critique1 = new Critique();
        $critique1->setNote(5);
        $critique1->setAvis("sa a changer tout ma vi");
        $critique1->setFilm($film);

        $critique2 = new Critique();
        $critique2->setNote(0);
        $critique2->setAvis("Le grand vide plutôt !");
        $critique2->setFilm($film);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($film);
        $em->persist($critique1);
        $em->persist($critique2);
        $em->flush();

        return $this->redirectToRoute('lic_sandbox_doctrine_view', array('id' => $film->getId()));
    }
}