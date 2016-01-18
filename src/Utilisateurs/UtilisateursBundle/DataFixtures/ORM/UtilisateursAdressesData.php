<?php
namespace Utilisateurs\UtilisateursBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\FixtureInterface; on a utiliser ca avant avec implement FixtureInterface mais  quand on a ajoute le retunr order on a chang�
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Fablab\FablabBundle\Entity\UtilisateursAdresses;

class UtilisateursAdressesData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     */
    private  $container;
    public function setContainer(ContainerInterface $container = null)
    {
        // TODO: Implement setContainer() method.
        $this->container= $container;
    }

    public function load(ObjectManager $manager)
    {
        $addresse1 = new UtilisateursAdresses();
        $addresse1->setNom('donmehdi');
        $addresse1->setVille('Casablanca');
        $addresse1->setAdresse('5 allee pont durand');
        $addresse1->setCp('76600');
        $addresse1->setPays("Maroc");
        $addresse1->setComplement("Voisin de youness");
        $addresse1->setTelephone("0646358153");
        $addresse1->setPrenom("mehdi");
        $addresse1->setUtilisateur($this->getReference('utilisateur1'));
        $manager->persist($addresse1);

        $addresse2 = new UtilisateursAdresses();
        $addresse2->setNom('mohammed');
        $addresse2->setVille('yaman');
        $addresse2->setAdresse('152 allee pont durand');
        $addresse2->setCp('76600');
        $addresse2->setPays("Maroc");
        $addresse2->setComplement("Voisin de said");
        $addresse2->setTelephone("06463585487");
        $addresse2->setPrenom("al agel");
        $addresse2->setUtilisateur($this->getReference('utilisateur2'));
        $manager->persist($addresse2);


        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}