<?php

namespace Qwer\PromoBundle\Form\Validator;
use Symfony\Component\Validator\Constraint;


class PromoLimitations extends Constraint
{
    public $message = 'Promo.Limitations.Validation'; 
    public $dateMessage = 'Promo.Limitations.EndDate';
    /**
     * Error message code for translation
     * 
     * @var string 
     */
    public function getMessage ()
    {
        return $this->message;
    }
    
    public function getDateMessage(){
        return $this->dateMessage;
    }

    /**
     * (non-PHPdoc)
     * @see Symfony\Component\Validator.Constraint::getTargets()
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}