<?php
namespace Fablab\FablabBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\FixtureInterface; on a utiliser ca avant avec implement FixtureInterface mais  quand on a ajoute le retunr order on a chang�
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Fablab\FablabBundle\Entity\Media;

class MediaData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $media1 = new Media();
        $media1->setAlt('legumes');
        $media1->setPath('http://lakanal.net/exercices/jeux/memory/legumes/legumes.png');
        $manager->persist($media1);


        $media2 = new Media();
        $media2->setAlt('fruits');
        $media2->setPath('http://img0.mxstatic.com/wallpapers/2fa686aeebfb72826e7e0971b2e747f0_large.jpeg');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setAlt('Poivron rouge');
        $media3->setPath('http://foliesmaraicheres.be/wp-content/uploads/2015/05/surprenante-nature-poivron-rouge-big.jpg');
        $manager->persist($media3);


        $media4 = new Media();
        $media4->setAlt('Piment');
        $media4->setPath('http://www.lakaz-piment.com/piment.jpg');
        $manager->persist($media4);

        $media5 = new Media();
        $media5->setAlt('Tomate');
        $media5->setPath('http://www.saveursparisidf.com/uploads/RTEmagicC_P-Tomate.jpg.jpg');
        $manager->persist($media5);

        $media6 = new Media();
        $media6->setAlt('Poivron vert');
        $media6->setPath('http://croquez-du-frais.fr/66-135-large/poivron.jpg');
        $manager->persist($media6);

        $media7 = new Media();
        $media7->setAlt('Raisin');
        $media7->setPath('http://www.cuisine-de-bebe.com/wp-content/uploads/raisin.jpg');
        $manager->persist($media7);

        $media8 = new Media();
        $media8->setAlt('Orange');
        $media8->setPath('https://d3nevzfk7ii3be.cloudfront.net/igi/KRLMkuaBjm5mKDDP');
        $manager->persist($media8);

        $manager->flush();

        $this->addReference('media1',$media1);
        $this->addReference('media2',$media2);
        $this->addReference('media3',$media3);
        $this->addReference('media4',$media4);
        $this->addReference('media5',$media5);
        $this->addReference('media6',$media6);
        $this->addReference('media7',$media7);
        $this->addReference('media8',$media8);
    }

    public function getOrder()
    {
        return 1;
    }
}