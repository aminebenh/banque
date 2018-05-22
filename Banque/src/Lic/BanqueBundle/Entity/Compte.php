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
     * @var \Date
     *
     * @ORM\Column(name="date_creation_compte", type="date")
     */
    private $dateCreationCompte;

    /**
     * @var $membre
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Membre")
     * @ORM\JoinColumn(name="id_membre", nullable=false)
     */
    private $membre;








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
     * @param \Date $dateCreationCompte
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
     * @return \Date
     */
    public function getDateCreationCompte()
    {
        return $this->dateCreationCompte;
    }

    /**
     * Set membre
     *
     * @param Membre $membre
     *
     * @return compte
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
}

