<?php

namespace Lic\SandboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="sb_films")
 * @ORM\Entity(repositoryClass="Lic\SandboxBundle\Repository\FilmRepository")
 */
class Film
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=200)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="annee", type="integer")
     */
    private $annee;

    /**
     * @var bool
     *
     * @ORM\Column(name="enstock", type="boolean", options={"default"=1})
     */
    private $enstock;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Film
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     *
     * @return Film
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return int
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set enstock
     *
     * @param boolean $enstock
     *
     * @return Film
     */
    public function setEnstock($enstock)
    {
        $this->enstock = $enstock;

        return $this;
    }

    /**
     * Get enstock
     *
     * @return bool
     */
    public function getEnstock()
    {
        return $this->enstock;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Film
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Film
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Get prix médian
     *
     * @return float
     */
    public function getMedianPrice()
    {
        $prixMedian = 0.0;
        // todo
        return $prixMedian;
    }

    /**
     * Get nombre de films en dessus d’un certain prix
     *
     * * @return int
     */
    public function getNbAbovePrice($price)
    {
        $nb = 0;
        // todo
        return $nb;
    }

    /**
     * Film constructor.
     */
    public function __construct()
    {
        $this->enstock = true;
        $this->quantite = null;
    }
}
