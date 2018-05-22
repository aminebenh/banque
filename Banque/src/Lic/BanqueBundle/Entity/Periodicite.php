<?php

namespace Lic\BanqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Periodicite
 *
 * @ORM\Table(name="periodicite")
 * @ORM\Entity(repositoryClass="Lic\BanqueBundle\Repository\PeriodiciteRepository")
 */
class Periodicite
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
     * @ORM\Column(name="nombre", type="integer")
     */
    private $nombre;

    /**
     * @var $unite
     *
     * @ORM\ManyToOne(targetEntity="Lic\BanqueBundle\Entity\Unite")
     * @ORM\JoinColumn(name="id_unite", nullable=false)
     */
    private $unite;


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
     * Set nombre
     *
     * @param integer $nombre
     *
     * @return Periodicite
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return int
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return Unite
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * @param Unite $unite
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;
    }



}

