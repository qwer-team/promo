<?php
namespace Qwer\PromoBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerAware;

use Qwer\PromoBundle\Entity\Promo;
use Qwer\PromoBundle\Event\PromoEvent;

class UpdatePromoListener extends ContainerAware {
    
    public function onPromoEvent(PromoEvent $event)
    {
        $promo = $event->getPromo();
        if(!is_null($promo->getImageObject()))
        {
            $imageObject = $promo->getImageObject();
            $image = $this->container->get("Storage")
                                     ->save($imageObject->getPathname());
            $promo->setImage($image);
        }
        $this->container->get('doctrine.orm.default_entity_manager')
                        ->persist($promo);
        $this->container->get('doctrine.orm.default_entity_manager')
                        ->flush();
    }
}

?>
