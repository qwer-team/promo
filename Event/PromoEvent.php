<?php
namespace Qwer\PromoBundle\Event;

use Qwer\PromoBundle\Entity\Promo;
use MarketFusion\Bundle\DataBundle\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class PromoEvent extends Event
{
    /**
     *
     * @var \Qwer\PromoBundle\Entity\Promo 
     */
    protected $promo;
    /**
     *
     * @var \MarketFusion\Bundle\DataBundle\Entity\User 
     */
    protected $user;
    
    function __construct(Promo $promo, User $user = null) 
    {
        $this->promo = $promo;
        $this->user  = $user;
    }
    /**
     * @return \Qwer\PromoBundle\Entity\Promo
     */
    public function getPromo() 
    {
        return $this->promo;
    }

    public function setPromo(Promo $promo) 
    {
        $this->promo = $promo;
    }
    
    /**
     * 
     * @return \MarketFusion\Bundle\DataBundle\Entity\User
     */
    public function getUser() 
    {
        return $this->user;
    }

    public function setUser(User $user) 
    {
        $this->user = $user;
    }
    
}
