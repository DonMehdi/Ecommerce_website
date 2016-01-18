<?php

namespace Fablab\FablabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping;
class CategoriesController extends Controller
{
    public function categoriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('FablabFablabBundle:Categories')->findAll();

        return $this->render('FablabFablabBundle:Default:categories/modulesUsed/menu.html.twig', array('categories'=>$categories));
    }

   

}
