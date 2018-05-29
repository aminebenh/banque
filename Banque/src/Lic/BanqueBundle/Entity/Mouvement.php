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
     * @ORM\Column(name="description", type="text" , options={"default"=0})
     */
    private $description;



    /**
     * @var $compteCrediteur
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Compte")
     * @ORM\JoinColumn(name="id_compte_crediteur", nullable=false)
     */
    private $compteCrediteur;


    /**
     * @var $compteDebiteur
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Compte")
     * @ORM\JoinColumn(name="id_compte_debiteur", nullable=false)
     */
    private $compteDebiteur;


    /**
     * @var $membre
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Membre")
     * @ORM\JoinColumn(name="id_membre", nullable=false)
     */
    private $membre;

    /**
     * @var $moyenPaiement
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Paiement")
     * @ORM\JoinColumn(name="id_moyen_paiement", nullable=false)
     */
    private $moyenPaiement;

    /**
     * @var $repetitif
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Repetitif")
     * @ORM\JoinColumn(name="id_repetitif", nullable=false)
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
     * @return Compte
     *
     */
    public function getCompteCrediteur()
    {
        return $this->compteCrediteur;
    }

    /**
     * @param Compte $compteCrediteur
     *
     *
     * @return Mouvement
     */
    public function setCompteCrediteur($compteCrediteur)
    {
        $this->compteCrediteur = $compteCrediteur;

        return $this;
    }

    /**
     * @return Compte
     */
    public function getCompteDebiteur()
    {
        return $this->compteDebiteur;
    }

    /**
     * @param Compte $compteDebiteur
     *
     * @return Mouvement
     */
    public function setCompteDebiteur($compteDebiteur)
    {
        $this->compteDebiteur = $compteDebiteur;

        return $this;
    }




    /**
     * Set membre
     *
     * @param Membre $membre
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
     * @return Membre
     */
    public function getmembre()
    {
        return $this->membre;
    }

    /**
     * Set moyenPaiement
     *
     * @param Paiement $moyenPaiement
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
     * @return Paiement
     */
    public function getMoyenPaiement()
    {
        return $this->moyenPaiement;
    }

    /**
     * Set repetitif
     *
     * @param Repetitif $repetitif
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
     * @return Repetitif
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

