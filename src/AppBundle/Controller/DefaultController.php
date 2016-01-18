<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
//        return $this->render('default/index.html.twig', array(
//            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
//        ));
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('FablabFablabBundle:Produits')->findBy(array('disponible'=>1));

        return $this->render('FablabFablabBundle:Default:materiel/layout/materiel.html.twig', array('produits' => $produits));

    }
}
