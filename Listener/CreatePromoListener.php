<?php
namespace Qwer\PromoBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerAware;

use Qwer\PromoBundle\Entity\Promo;
use Qwer\PromoBundle\Event\PromoEvent;

class CreatePromoListener extends ContainerAware {
    
    public function onPromoEvent(PromoEvent $event)
    {
            $this->container->get('doctrine.orm.default_entity_manager')->persist($event->getPromo());
            $this->container->get('doctrine.orm.default_entity_manager')->flush();
    }
}

?>
