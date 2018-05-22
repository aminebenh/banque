<?php

namespace Lic\BanqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NiveauDroit
 *
 * @ORM\Table(name="niveau_droit")
 * @ORM\Entity(repositoryClass="Lic\BanqueBundle\Repository\NiveauDroitRepository")
 */
class NiveauDroit
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
     * @var bool
     *
     * @ORM\Column(name="virement", type="boolean")
     */
    private $virement;

    /**
     * @var bool
     *
     * @ORM\Column(name="lecture", type="boolean")
     */
    private $lecture;

    /**
     * @var bool
     *
     * @ORM\Column(name="ecriture", type="boolean")
     */
    private $ecriture;


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
     * Set virement
     *
     * @param boolean $virement
     *
     * @return NiveauDroit
     */
    public function setVirement($virement)
    {
        $this->virement = $virement;

        return $this;
    }

    /**
     * Get virement
     *
     * @return bool
     */
    public function getVirement()
    {
        return $this->virement;
    }

    /**
     * Set lecture
     *
     * @param boolean $lecture
     *
     * @return NiveauDroit
     */
    public function setLecture($lecture)
    {
        $this->lecture = $lecture;

        return $this;
    }

    /**
     * Get lecture
     *
     * @return bool
     */
    public function getLecture()
    {
        return $this->lecture;
    }

    /**
     * Set ecriture
     *
     * @param boolean $ecriture
     *
     * @return NiveauDroit
     */
    public function setEcriture($ecriture)
    {
        $this->ecriture = $ecriture;

        return $this;
    }

    /**
     * Get ecriture
     *
     * @return bool
     */
    public function getEcriture()
    {
        return $this->ecriture;
    }
}

