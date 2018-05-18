<?php

namespace Lic\BanqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mouvement
 *
 * @ORM\Table(name="mouvement")
 * @ORM\Entity(repositoryClass="Lic\BanqueBundle\Repository\MouvementRepository")
 */
class Mouvement
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
     * @var float
     *
     * @ORM\Column(name="montant", type="float")
     */
    private $montant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mouvement",nullable=true , type="datetime")
     */
    private $dateMouvement;

    /**
     * @var bool
     *
     * @ORM\Column(name="valider", type="boolean")
     */
    private $valider;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptif", type="text" , options={"default"=0})
     */
    private $description;



    /**
     * @var Compte
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Compte")
     * @ORM\JoinColumn(name="id_compte", nullable=false)
     */
    private $compte;

    /**
     * @var int
     *
     * @ORM\Column(name="id_membre", nullable=true , type="integer")
     */
    private $membre;

    /**
     * @var int
     *
     * @ORM\Column(name="id_moyen_paiement",nullable=true , type="integer")
     */
    private $moyenPaiement;

    /**
     * @var int
     *
     * @ORM\Column(name="id_repetitif", nullable=true , type="integer")
     */
    private $repetitif;

    /**
     * @var bool
     *
     * @ORM\Column(name="rapprochement", type="boolean" ,options={"default"=0})
     */
    private $rapprochement;


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
     * Set montant
     *
     * @param float $montant
     *
     * @return Mouvement
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return float
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set dateMouvement
     *
     * @param \DateTime $dateMouvement
     *
     * @return Mouvement
     */
    public function setDateMouvement($dateMouvement)
    {
        $this->dateMouvement = $dateMouvement;

        return $this;
    }

    /**
     * Get dateMouvement
     *
     * @return \DateTime
     */
    public function getDateMouvement()
    {
        return $this->dateMouvement;
    }

    /**
     * Set valider
     *
     * @param boolean $valider
     *
     * @return Mouvement
     */
    public function setValider($valider)
    {
        $this->valider = $valider;

        return $this;
    }

    /**
     * Get valider
     *
     * @return bool
     */
    public function getValider()
    {
        return $this->valider;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Mouvement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set compte
     *
     * @param integer $compte
     *
     * @return Mouvement
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get compte
     *
     * @return int
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set membre
     *
     * @param integer $membre
     *
     * @return Mouvement
     */
    public function setmembre($membre)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return int
     */
    public function getmembre()
    {
        return $this->membre;
    }

    /**
     * Set moyenPaiement
     *
     * @param integer $moyenPaiement
     *
     * @return Mouvement
     */
    public function setMoyenPaiement($moyenPaiement)
    {
        $this->moyenPaiement = $moyenPaiement;

        return $this;
    }

    /**
     * Get moyenPaiement
     *
     * @return int
     */
    public function getMoyenPaiement()
    {
        return $this->moyenPaiement;
    }

    /**
     * Set repetitif
     *
     * @param integer $repetitif
     *
     * @return Mouvement
     */
    public function setRepetitif($repetitif)
    {
        $this->repetitif = $repetitif;

        return $this;
    }

    /**
     * Get repetitif
     *
     * @return int
     */
    public function getRepetitif()
    {
        return $this->repetitif;
    }

    /**
     * Set rapprochement
     *
     * @param boolean $rapprochement
     *
     * @return Mouvement
     */
    public function setRapprochement($rapprochement)
    {
        $this->rapprochement = $rapprochement;

        return $this;
    }

    /**
     * Get rapprochement
     *
     * @return bool
     */
    public function getRapprochement()
    {
        return $this->rapprochement;
    }
}

