<?php

namespace Qwer\PromoBundle\Form\Validator;
use Symfony\Component\Validator\Constraint;


class PromoLimitations extends Constraint
{
    public $message = 'promo.limitations.validation'; 
    /**
     * Error message code for translation
     * 
     * @var string 
     */
    public function getMessage ()
    {
        return $this->message;
    }
    /**
     * (non-PHPdoc)
     * @see Symfony\Component\Validator.Constraint::validatedBy()
     */
    public function validatedBy()
    {
        return 'PromoLimitationsValidator';
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