<?php

namespace Qwer\PromoBundle\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;

class PromoType extends AbstractType implements ContainerAwareInterface
{
    protected $container;
    /**
     * Sets the Container.
     *
     * @param ContainerInterface $container A ContainerInterface instance
     *
     * @api
     */
    function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
//            ->add('id')
        
            ->add('locId')
            ->add('title')
            ->add('body')
            ->add('disclaimer')
            ->add('startDate', 'DatePicker')
            ->add('datetime')
            ->add('endDate', 'DatePicker')
            ->add('amount')
            ->add('discountType')
            ->add('qty')
            ->add('status')
            ->add('image')
//            ->add('userService')
            ->add('limitQty')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Qwer\PromoBundle\Entity\Promo'
        ));
    }

    public function getName()
    {
        return 'qwer_bundle_promotype';
    }
}
