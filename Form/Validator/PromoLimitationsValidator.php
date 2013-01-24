<?php

namespace Qwer\PromoBundle\Form\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PromoLimitationsValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint) {
        
        if($value->getLimitQuantity()=="" && $value->getEndDate()==""){
            
            $this->setMessage($constraint->message);
            
            return false;
        }
        
        return true;
    }
}