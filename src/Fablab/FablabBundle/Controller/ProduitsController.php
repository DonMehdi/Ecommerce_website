<?php

namespace Fablab\FablabBundle\Controller;

use Fablab\FablabBundle\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping;
use Symfony\Component\Config\Definition\Exception\Exception;

class ProduitsController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('FablabFablabBundle:Produits')->findBy(array('disponible'=>1));

        return $this->render('FablabFablabBundle:Default:materiel/layout/materiel.html.twig', array('produits' => $produits));
    }

    public function categorieAction($id)
    {//on va utilioser une query builder
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('FablabFablabBundle:Produits')->byCategorie($id);
        $categorie = $em->getRepository('FablabFablabBundle:Categories')->find($id);

        if (!$categorie){
            throw $this->createNotFoundException("la page n existe pas");
        }

        return $this->render('FablabFablabBundle:Default:materiel/layout/materiel.html.twig', array('produits' => $produits));
    }

    public function presentationAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('FablabFablabBundle:Produits')->find($id);
        if (!$produit){
            throw $this->createNotFoundException("la page n existe pas");
        }
        return $this->render('FablabFablabBundle:Default:materiel/layout/presentation.html.twig',array('produit'=>$produit));
    }

    public  function rechercheTraitementAction()
{
    $form = $this->createForm(new RechercheType());
    if ($this->get('request')->getMethod() == 'POST') {

        $form->bind($this->get('request'));
    $em = $this->getDoctrine()->getEntityManager();
    $produit = $em->getRepository('FablabFablabBundle:Produits')->recherche($form['recherche']->getData());

    }
    else
        throw $this->createNotFoundException('la page que vous cherchez n existe pas');
   // return $this->render('FablabFablabBundle:Default:materiel/layout/presentation.html.twig',array('produits'=>$produit));


    return $this->render('FablabFablabBundle:Default:materiel/layout/materiel.html.twig', array('produits' => $produit));
}

    public function rechercheAction()
    {
        $form = $this->createForm(new RechercheType());
        return $this->render('FablabFablabBundle:Default:recherche/modulesUsed/recherche.html.twig',array('form'=>$form->createView()));

    }

}
