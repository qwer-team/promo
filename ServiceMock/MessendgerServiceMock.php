<?php

namespace Qwer\PromoBundle\ServiceMock;
use Symfony\Component\DependencyInjection\ContainerAware;
/**
 * Description of MessendgerServiceMock
 *
 * @author root
 */
class MessendgerServiceMock extends ContainerAware {
    /**
     *
     * $url = $this->get('Messenger')->message($user, array($contact), $subject, $content);
     *
     * @param MarketFusion\Bundle\DataBundle\Entity\User $user
     * @param array ( MarketFusion\Bundle\DataBundle\Entity\UserContact $contact )
     * @param string $subject
     * @param string $content
     * 
     * @return string Почему строка?
     */
    public function message(User $user, $contacts, $subject, $content){
        return "";
    }
}