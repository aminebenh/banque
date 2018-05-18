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
     * @var int
     *
     * @ORM\Column(name="id_membre", type="integer")
     */
    private $idMembre;

    /**
     * @var $idCompte
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Compte")
     * @ORM\JoinColumn(name="id_compte", nullable=false)
     */
    private $idCompte;

    /**
     * @var int
     *
     * @ORM\Column(name="id_niveau_droit", type="integer")
     */
    private $idNiveauDroit;


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
     * Set idMembre
     *
     * @param integer $idMembre
     *
     * @return Droit
     */
    public function setIdMembre($idMembre)
    {
        $this->idMembre = $idMembre;

        return $this;
    }

    /**
     * Get idMembre
     *
     * @return int
     */
    public function getIdMembre()
    {
        return $this->idMembre;
    }

    /**
     * Set idCompte
     *
     * @param integer $idCompte
     *
     * @return Droit
     */
    public function setIdCompte($idCompte)
    {
        $this->idCompte = $idCompte;

        return $this;
    }

    /**
     * Get idCompte
     *
     * @return int
     */
    public function getIdCompte()
    {
        return $this->idCompte;
    }

    /**
     * Set idNiveauDroit
     *
     * @param integer $idNiveauDroit
     *
     * @return Droit
     */
    public function setIdNiveauDroit($idNiveauDroit)
    {
        $this->idNiveauDroit = $idNiveauDroit;

        return $this;
    }

    /**
     * Get idNiveauDroit
     *
     * @return int
     */
    public function getIdNiveauDroit()
    {
        return $this->idNiveauDroit;
    }
}

