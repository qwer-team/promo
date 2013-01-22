<?php
namespace Qwer\PromoBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerAware;
use Qwer\PromoBundle\Entity\Promo;
use Qwer\PromoBundle\Event\PromoEvent;

class CreatePromoListener extends ContainerAware {
    
    public function onPromoEvent(PromoEvent $event)
    {
        $promo = $event->getPromo();
        if(!is_null($promo->getImageObject())){
            $imageObject = $promo->getImageObject();
            $image = $this->container->get("Storage")
                                     ->save($imageObject->getPathname());
            $promo->setImage($image);
        }
        
        $user = $event->getUser();
        $promo->setSp($user);
        
        $entityManage = $this->container
                          ->get('doctrine.orm.default_entity_manager');
        $entityManage->persist($promo);
        $entityManage->flush();
    }
}