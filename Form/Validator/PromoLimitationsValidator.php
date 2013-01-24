<?php

namespace Qwer\PromoBundle\Form\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PromoLimitationsValidator extends ConstraintValidator
{
    public function isValid($value, Constraint $constraint) {
                
        if($value->getLimitQuantity()=="" && $value->getEndDate()==""){
            
            $this->context
                 ->addViolation($constraint->getMessage(), array(), null);
            
            $path = $this->context->getPropertyPath();
            $property = $path.".endDate";
            $this->context->setPropertyPath($property);
            $this->context
                 ->addViolation($constraint->getDateMessage(), array(), null);
            
            return false;
        }
        
        return true;
    }
}