<?php

namespace Lic\SandboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Critique
 *
 * @ORM\Table(name="sb_critiques")
 * @ORM\Entity(repositoryClass="Lic\SandboxBundle\Repository\CritiqueRepository")
 */
class Critique
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
     * @var Film
     *
     * @ORM\ManyToOne(targetEntity="Lic\SandboxBundle\Entity\Film")
     * @ORM\JoinColumn(name="id_film", nullable=false)
     */
    private $film;

    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=true , options={"default"=NULL, "comment"="entre 0 et 5"})
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="avis", type="text")
     */
    private $avis;


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
     * Set note
     *
     * @param integer $note
     *
     * @return Critique
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return int
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set avis
     *
     * @param string $avis
     *
     * @return Critique
     */
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get avis
     *
     * @return string
     */
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set film
     *
     * @param \Lic\SandboxBundle\Entity\Film $film
     *
     * @return Critique
     */
    public function setFilm(\Lic\SandboxBundle\Entity\Film $film)
    {
        $this->film = $film;

        return $this;
    }

    /**
     * Get film
     *
     * @return \Lic\SandboxBundle\Entity\Film
     */
    public function getFilm()
    {
        return $this->film;
    }
}
