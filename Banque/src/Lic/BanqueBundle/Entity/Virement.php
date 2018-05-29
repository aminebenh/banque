<?php

namespace Lic\BanqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Virement
 *
 * @ORM\Table(name="virement")
 * @ORM\Entity(repositoryClass="Lic\BanqueBundle\Repository\VirementRepository")
 */
class Virement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var $mouvementCrediteur
     *
     * @ORM\OneToOne(targetEntity="Lic\BanqueBundle\Entity\Mouvement")
     * @ORM\JoinColumn(name="id_mouvement_crediteur", nullable=false)
     */
    private $mouvementCrediteur;


    /**
     * @var $mouvementDebiteur
     *
     * @ORM\OneToOne(targetEntity="Lic\BanqueBundle\Entity\Mouvement")
     * @ORM\JoinColumn(name="id_mouvement_debiteur", nullable=false)
     */
    private $mouvementDebiteur;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Mouvement
     */
    public function getMouvementCrediteur()
    {
        return $this->mouvementCrediteur;
    }

    /**
     * @param Mouvement $mouvementCrediteur
     * @return Virement
     */
    public function setMouvementCrediteur($mouvementCrediteur)
    {
        $this->mouvementCrediteur = $mouvementCrediteur;
        return this ;
    }

    /**
     * @return Mouvement
     */
    public function getMouvementDebiteur()
    {
        return $this->mouvementDebiteur;
    }

    /**
     * @param Mouvement $mouvementDebiteur
     * @return Virement
     */
    public function setMouvementDebiteur($mouvementDebiteur)
    {
        $this->mouvementDebiteur = $mouvementDebiteur;
        return this ;
    }



}

