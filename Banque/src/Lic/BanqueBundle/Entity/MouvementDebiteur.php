<?php

namespace Lic\BanqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MouvementDebiteur
 *
 * @ORM\Table(name="mouvement_debiteur")
 * @ORM\Entity(repositoryClass="Lic\BanqueBundle\Repository\MouvementDebiteurRepository")
 */
class MouvementDebiteur
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
     * @var $mouvement
     *
     * @ORM\OneToOne(targetEntity="Lic\BanqueBundle\Entity\Mouvement")
     * @ORM\JoinColumn(name="id_mouvement", nullable=false)
     */
    private $mouvement;


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
     * @return Mouvement
     */
    public function getMouvement()
    {
        return $this->mouvement;
    }

    /**
     * @param Mouvement $mouvement
     */
    public function setMouvement($mouvement)
    {
        $this->mouvement = $mouvement;
    }

}

