<?php
namespace Qwer\PromoBundle\Event;

use Qwer\PromoBundle\Entity\Promo;

use Symfony\Component\EventDispatcher\Event;

class PromoEvent extends Event
{
    protected $promo;
    
    function __construct($promo) {
        $this->promo = $promo;
    }
    /**
     * @return \Qwer\PromoBundle\Entity\Promo
     */
    public function getPromo() {
        return $this->promo;
    }

    public function setPromo(Promo $promo) {
        $this->promo = $promo;
    }


    
}

?>
