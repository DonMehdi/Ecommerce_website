<?php
namespace Fablab\FablabBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class testType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //ici nous allons faire notre formulaire en php
        //le html c est fini
        $builder
            ->add('email','email',array('required'=>true))
            ->add('nom')
            ->add('prenom')
            ->add('sexe','choice',array('choices'=>array('0'=>'home',
                                                         '1'=>'femme',
                                                         '2'=>'autres'),
                                                         'preferred_choices' => array('1','2'),'expanded'=> false))
            ->add('contenu','textarea')
            ->add('date','datetime')
            ->add('utilisateurs' , 'entity',array('class'=>'Utilisateurs\UtilisateursBundle\Entity\Utilisateurs'))
            ->add('pays','country')
            ->add('envoyer','submit');
    }

    public function getName()
    {
        return 'fablab_fablabbundle_test';
    }
}