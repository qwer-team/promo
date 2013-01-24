<?php

namespace Qwer\PromoBundle\Form\Validator;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PromoLimitationsValidator extends ConstraintValidator
{
    /**
     * For BC.
     * @param type $value
     * @param \Symfony\Component\Validator\Constraint $constraint
     * @return boolean
     */
    public function valid($value, Constraint $constraint) 
    {
        return $this->isValid($value, $constraint);
    }
    
    public function isValid($value, Constraint $constraint) 
    {
        
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
