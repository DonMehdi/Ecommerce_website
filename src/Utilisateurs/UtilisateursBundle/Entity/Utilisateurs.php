<?php
namespace Utilisateurs\UtilisateursBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\OneToMany(targetEntity="Fablab\FablabBundle\Entity\Commandes",mappedBy="utilisateur",cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commandes ;

    /**
     * @ORM\OneToMany(targetEntity="Fablab\FablabBundle\Entity\UtilisateursAdresses",mappedBy="utilisateur",cascade={"remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $adresses;



    /**
     * Add commande
     *
     * @param \Fablab\FablabBundle\Entity\Commandes $commande
     *
     * @return Utilisateurs
     */
    public function addCommande(\Fablab\FablabBundle\Entity\Commandes $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Fablab\FablabBundle\Entity\Commandes $commande
     */
    public function removeCommande(\Fablab\FablabBundle\Entity\Commandes $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Add adress
     *
     * @param \Fablab\FablabBundle\Entity\UtilisateursAdresses $adress
     *
     * @return Utilisateurs
     */
    public function addAdress(\Fablab\FablabBundle\Entity\UtilisateursAdresses $adress)
    {
        $this->adresses[] = $adress;

        return $this;
    }

    /**
     * Remove adress
     *
     * @param \Fablab\FablabBundle\Entity\UtilisateursAdresses $adress
     */
    public function removeAdress(\Fablab\FablabBundle\Entity\UtilisateursAdresses $adress)
    {
        $this->adresses->removeElement($adress);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
}
