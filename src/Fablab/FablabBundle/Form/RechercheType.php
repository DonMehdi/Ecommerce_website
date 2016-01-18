<?php
namespace Fablab\FablabBundle\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class RechercheType extends AbstractType
{



    public function buildForm(FormBuilderInterface $builder, array $option)

    {
        $builder->add('recherche', 'text', array('label'=>'false','attr'=> array('class'=>'input-medium search-query')));

    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        // TODO: Implement getName() method.
        return 'fablab_fablabBundle';
    }
}
