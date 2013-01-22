<?php

namespace Qwer\PromoBundle\Form;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PromoType extends AbstractType implements ContainerAwareInterface
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    private $container;
    
    /**
     * @var boolean 
     */
    private $isNew;
    
    function __construct($isNew = true) {
        $this->isNew = $isNew;
    }
    
    public function isNew($isNew) {
        $this->isNew = $isNew;
        return $this;
    }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $amountAttr = array();
        if(!$this->isNew){
            $amountAttr = array( "attr"=> array("readonly" => false));
        }
        $builder        
            ->add('locId', null, array("required" => false))
            ->add('title', null, array('attr'=>array('class'=>'promoText'), "required" => false))
            ->add('body', 'textarea', array('attr'=>array('class'=>'promoText'), "required" => false))
            ->add('disclaimer', null, array("required" => false))
            ->add('startDate', 'DatePicker', array("required" => false))
            ->add('endDate', 'DatePicker')
            ->add('amount', null, $amountAttr)
            ->add('discountType', null, array("required" => false))
            ->add('quantity', null, array("required" => false))
            ->add('imageObject', 'file', array("required" => false))
            ->add('userService')
            ->add('limitQuantity', null, array("required" => false))
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

    public function setContainer(ContainerInterface $container = null) {
        $this->container = $container;
    }
}
