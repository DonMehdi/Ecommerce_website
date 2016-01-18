<?php

namespace Pages\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping;
class PagesController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('PagesPagesBundle:Pages')->findAll();

        return $this->render('PagesPagesBundle:Default:Pages/modulesUsed/menu.html.twig', array('pages'=>$pages));
    }

    public function pageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $mapage = $em->getRepository('PagesPagesBundle:Pages')->find($id);

        if (!$mapage) {
            throw $this->createNotFoundException("la page n existe pas");
        }
        return $this->render ('PagesPagesBundle:Default:Pages/layout/pages.html.twig', array('mapage'=>$mapage));
    }
}
