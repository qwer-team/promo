<?php

namespace Qwer\PromoBundle\Form\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PromoLimitationsValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint) {
                echo $constraint->message;
        if($value->getLimitQuantity()=="" && $value->getEndDate()==""){
            
            $this->setMessage($constraint->message);
            
            return false;
        }
        
        return true;
    }
}