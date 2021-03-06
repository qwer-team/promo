<?php
namespace Qwer\PromoBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerAware;

use Qwer\PromoBundle\Entity\Promo;
use Qwer\PromoBundle\Event\PromoEvent;

class DeletePromoListener extends ContainerAware {
    
    public function onPromoEvent(PromoEvent $event)
    {
        $entityManage = $this->container
                          ->get('doctrine.orm.default_entity_manager');
        $entityManage->persist($event->getPromo());
        $entityManage->flush();
    }
}