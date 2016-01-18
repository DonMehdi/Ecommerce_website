<?php

namespace Fablab\FablabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Fablab\FablabBundle\Entity\Produits;
use Fablab\FablabBundle\Form\testType;

class TestController extends Controller
{
    public function testFormulaireAction()
    {
        $form = $this->createForm(new testType());
        if ($this->get('request')->getMethod() == 'POST') {
            $form->bind($this->get('request'));
            //echo $form['email']->getData();   afficher qu un truc qu on veut
            //var_dump($form->getData());
            //die('ici je traite ma form');
        }
        return $this->render('FablabFablabBundle:Default:test.html.twig', array('form' => $form->createView()));
        die("ici ca se passe");
    }
//    public function ajoutAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        /* $produit = new Produits();
//         $produit->setCategorie('Legume');
//         $produit->setDescription('ca se mange');
//         $produit->setDisponible('1');
//         $produit->setPrix("15 ");
//         $produit->setTva("12");
//         $produit->setNom("Tomate");
//         $em->persist($produit);
//         $em->flush();
//         $produit2 = new Produits();
//         $produit2->setCategorie('Legume');
//         $produit2->setDescription('ca se mange');
//         $produit2->setDisponible('15');
//         $produit2->setPrix("15 ");
//         $produit2->setTva("12");
//         $produit2->setNom("LETHUS");
//         $em->persist($produit2);
//         $em->flush();*/
//      //  die('ici ca teste');
//        $produits = $em->getRepository('FablabFablabBundle:Produits')->findAll();
//        return $this->render('FablabFablabBundle:Default:test.html.twig', array('produits'=>$produits));
//    }
}
