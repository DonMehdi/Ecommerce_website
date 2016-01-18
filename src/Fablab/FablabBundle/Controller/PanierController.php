<?php

namespace Fablab\FablabBundle\Controller;

use Fablab\FablabBundle\Entity\Produits;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanierController extends Controller
{
    public function panierAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) {
            $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('FablabFablabBundle:Produits')->findArray(array_keys($session->get('panier')));

        return $this->render('FablabFablabBundle:Default:panier/layout/panier.html.twig',array('produits'=>$produits, 'panier'=>$session->get('panier')));
    }

    public function livraisonAction()
    {
        return $this->render('FablabFablabBundle:Default:panier/layout/livraison.html.twig');
    }
    public function validationAction()
    {
        return $this->render('FablabFablabBundle:Default:panier/layout/validation.html.twig');
    }

    public function ajouterAction($id)
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('panier')) {
            $session->set('panier', array());
//   ENLEVE L ELEMENT DE LA SESSION $session->remove('panier');
    }
        $panier = $session->get('panier');
        if (array_key_exists($id,$panier)) {
            if ($this->getRequest()->query->get('qte') != null) {
                $panier[$id] =  $this->getRequest()->query->get('qte');
            }
        }else
            if ($this->getRequest()->query->get('qte') != null) {
                $panier[$id] = $this->getRequest()->query->get('qte');
            }else
            {
                $panier[$id]=1;
            }
        $session->set('panier', $panier);

                return $this->redirect($this->generateUrl("fablab_fablab_panier"));
}

    public function supprimerAction($id)
    {
        $session = $this->getRequest()->getSession();
        $panier=$session->get('panier');
        if (array_key_exists($id,$panier)) {
            unset($panier[$id]);
            $session->set('panier', $panier);
        }
        return $this->redirect($this->generateUrl("fablab_fablab_panier"));

    }
}
