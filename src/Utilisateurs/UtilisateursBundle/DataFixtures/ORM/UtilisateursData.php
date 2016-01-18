<?php
namespace Utilisateurs\UtilisateursBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\FixtureInterface; on a utiliser ca avant avec implement FixtureInterface mais  quand on a ajoute le retunr order on a chang�
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;

class UtilisateursData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
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
        $utilisateur1 = new Utilisateurs();
        $utilisateur1->setUsername('donmehdi');
        $utilisateur1->setEmail('pongiste24@hotmail.com');
        $utilisateur1->setEnabled(1);
        $utilisateur1->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilisateur1)->encodePassword('donmehdi', $utilisateur1->getSalt()));
        $manager->persist($utilisateur1);
        $utilisateur2 = new Utilisateurs();
        $utilisateur2->setUsername('mohammed');
        $utilisateur2->setEmail('mohammed@gmail.com');
        $utilisateur2->setEnabled(1);
        $utilisateur2->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilisateur2)->encodePassword('mohammed', $utilisateur2->getSalt()));
        $manager->persist($utilisateur2);

        $utilisateur3 = new Utilisateurs();
        $utilisateur3->setUsername('youness');
        $utilisateur3->setEmail('youness@gmail.com');
        $utilisateur3->setEnabled(1);
        $utilisateur3->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilisateur3)->encodePassword('youness', $utilisateur3->getSalt()));
        $manager->persist($utilisateur3);

        $utilisateur4 = new Utilisateurs();
        $utilisateur4->setUsername('said');
        $utilisateur4->setEmail('said@gmail.com');
        $utilisateur4->setEnabled(1);
        $utilisateur4->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilisateur4)->encodePassword('said', $utilisateur4->getSalt()));
        $manager->persist($utilisateur4);

        $utilisateur5 = new Utilisateurs();
        $utilisateur5->setUsername('dominique');
        $utilisateur5->setEmail('dominique@gmail.com');
        $utilisateur5->setEnabled(1);
        $utilisateur5->setPassword($this->container->get('security.encoder_factory')->getEncoder($utilisateur5)->encodePassword('dominique', $utilisateur5->getSalt()));
        $manager->persist($utilisateur5);

        $manager->flush();

        $this->addReference('utilisateur1', $utilisateur1);
        $this->addReference('utilisateur2', $utilisateur2);
        $this->addReference('utilisateur3', $utilisateur3);
        $this->addReference('utilisateur4', $utilisateur4);
        $this->addReference('utilisateur5', $utilisateur5);

    }

    public function getOrder()
    {
        return 5;
    }
}