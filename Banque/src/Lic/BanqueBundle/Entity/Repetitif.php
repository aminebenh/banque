<?php

namespace Lic\BanqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Repetitif
 *
 * @ORM\Table(name="repetitif")
 * @ORM\Entity(repositoryClass="Lic\BanqueBundle\Repository\RepetitifRepository")
 */
class Repetitif
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var $periodicite
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Periodicite")
     * @ORM\JoinColumn(name="id_periodicite", nullable=false)
     */
    private $periodicite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_derniere_validation", type="date", nullable=true)
     */
    private $dateDerniereValidation;


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
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Repetitif
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @return Periodicite
     */
    public function getPeriodicite()
    {
        return $this->periodicite;
    }

    /**
     * @param Periodicite $periodicite
     */
    public function setPeriodicite($periodicite)
    {
        $this->periodicite = $periodicite;
    }


    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Repetitif
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set dateDerniereValidation
     *
     * @param \DateTime $dateDerniereValidation
     *
     * @return Repetitif
     */
    public function setDateDerniereValidation($dateDerniereValidation)
    {
        $this->dateDerniereValidation = $dateDerniereValidation;

        return $this;
    }

    /**
     * Get dateDerniereValidation
     *
     * @return \DateTime
     */
    public function getDateDerniereValidation()
    {
        return $this->dateDerniereValidation;
    }
}

