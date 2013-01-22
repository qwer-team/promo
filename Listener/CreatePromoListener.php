<?php
namespace Qwer\PromoBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerAware;

use Qwer\PromoBundle\Entity\Promo;
use Qwer\PromoBundle\Event\PromoEvent;

class CreatePromoListener extends ContainerAware {
    
    public function onPromoEvent(PromoEvent $event)
    {
        $user = $this->container->get('security.context')
                                ->getToken()->getUser();
        $promo = $event->getPromo();
        if(!is_null($promo->getImageObject()))
        {
            $imageObject = $promo->getImageObject();
            $image = $this->container->get("Storage")
                                     ->save($imageObject->getPathname());
            $promo->setImage($image);
        }
        $promo->setSp($user);
        
        $this->container->get('doctrine.orm.default_entity_manager')
                        ->persist($promo);
        $this->container->get('doctrine.orm.default_entity_manager')
                        ->flush();
    }
}

?>
