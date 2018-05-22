<?php

namespace Lic\BanqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Droit
 *
 * @ORM\Table(name="droit")
 * @ORM\Entity(repositoryClass="Lic\BanqueBundle\Repository\DroitRepository")
 */
class Droit
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
     * @var $membre
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Membre")
     * @ORM\JoinColumn(name="id_membre", nullable=false)
     */
    private $membre;

    /**
     * @var $compte
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Compte")
     * @ORM\JoinColumn(name="id_compte", nullable=false)
     */
    private $compte;

    /**
     * @var $niveauDroit
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\NiveauDroit")
     * @ORM\JoinColumn(name="id_niveau_droit", nullable=false)
     */
    private $niveauDroit;


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
     * Set membre
     *
     * @param Membre $membre
     *
     * @return Droit
     */
    public function setMembre($membre)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return Membre
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * @return Compte
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * @param Compte $compte
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;
    }



    /**
     * Set niveauDroit
     *
     * @param NiveauDroit $niveauDroit
     *
     * @return Droit
     */
    public function setNiveauDroit($niveauDroit)
    {
        $this->niveauDroit = $niveauDroit;

        return $this;
    }

    /**
     * Get niveauDroit
     *
     * @return NiveauDroit
     */
    public function getNiveauDroit()
    {
        return $this->niveauDroit;
    }
}

