<?php

namespace Qwer\PromoBundle\Form\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PromoLimitationValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint) {
        
        if($value->limitQuantity=="" && $value->endDate==""){
             $this->setMessage($constraint->getMessage());
            return false;
        }
        
        return true;
    }
}