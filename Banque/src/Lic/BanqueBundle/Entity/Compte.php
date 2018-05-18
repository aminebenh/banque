<?php

namespace Lic\BanqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * compte
 *
 * @ORM\Table(name="compte_bancaire")
 * @ORM\Entity(repositoryClass="Lic\BanqueBundle\Repository\CompteRepository")
 */
class Compte
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
     * @ORM\Column(name="num_compte", type="integer", unique=true)
     */
    private $numeroCompte;

    /**
     * @var int
     *
     * @ORM\Column(name="solde", type="integer")
     */
    private $solde;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_compte", type="datetime")
     */
    private $dateCreationCompte;

    /**
     * @var int
     *
     * @ORM\Column(name="id_membre", type="integer")
     */
    private $idMembre;


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
     * Set numeroCompte
     *
     * @param integer $numeroCompte
     *
     * @return compte
     */
    public function setNumeroCompte($numeroCompte)
    {
        $this->numeroCompte = $numeroCompte;

        return $this;
    }

    /**
     * Get numeroCompte
     *
     * @return int
     */
    public function getNumeroCompte()
    {
        return $this->numeroCompte;
    }

    /**
     * Set solde
     *
     * @param integer $solde
     *
     * @return compte
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get solde
     *
     * @return int
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * Set dateCreationCompte
     *
     * @param \DateTime $dateCreationCompte
     *
     * @return compte
     */
    public function setDateCreationCompte($dateCreationCompte)
    {
        $this->dateCreationCompte = $dateCreationCompte;

        return $this;
    }

    /**
     * Get dateCreationCompte
     *
     * @return \DateTime
     */
    public function getDateCreationCompte()
    {
        return $this->dateCreationCompte;
    }

    /**
     * Set idMembre
     *
     * @param integer $idMembre
     *
     * @return compte
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
}

