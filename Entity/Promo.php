<?php

namespace Qwer\PromoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MarketFusion\Bundle\DataBundle\Entity\User;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\ExecutionContext;

/**
 * Qwer\PromoBundle\Entity\Promo
 */
class Promo
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $spId
     */
    private $spId;
    /**
     * @var MarketFusion\Bundle\DataBundle\Entity\User
     */
    private $sp;

    /**
     * @var integer $locId
     */
    private $locId;
    /*
     * @var ???
     */
//    private $promoLocation;

    /**
     * @var string $title
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $disclaimer;

    /**
     * @var \DateTime $startDate
     */
    private $startDate;

    /**
     * @var \DateTime $endDate
     */
    private $endDate;

    /**
     * @var integer $amountMoney
     */
    private $amountMoney;
    /**
     * @var integer $amountPercent
     */
    private $amountPercent;

    /**
     * @var smallint $discountType
     */
    private $discountType;

    /**
     * @var integer $quantity
     */
    private $quantity;

    /**
     * @var integer $status
     */
    private $status = 1;

    /**
     * @var string $image
     */
    private $image;
    
    /**
     *
     * @var UploadedFile $imageObject
     */
    private $imageObject = null;

    /**
     * @var integer $serviceId
     */
    private $serviceId;
    /**
     * @var MarketFusion\Bundle\DataBundle\Entity\UserBusinessService
     */
    private $userService;

    /**
     * @var integer $limitQuantity
     */
    private $limitQuantity;
    
    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getSpId() {
        return $this->spId;
    }

    public function setSpId($spId) {
        $this->spId = $spId;
    }

    public function getSp() {
        return $this->sp;
    }

    public function setSp($sp) {
        $this->sp = $sp;
    }

    public function getLocId() {
        return $this->locId;
    }

    public function setLocId($locId) {
        $this->locId = $locId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getBody() {
        return $this->body;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function getDisclaimer() {
        return $this->disclaimer;
    }

    public function setDisclaimer($disclaimer) {
        $this->disclaimer = $disclaimer;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }
    
    public function getAmountMoney() {
        return $this->amountMoney;
    }

    public function setAmountMoney($amountMoney) {
        $this->amountMoney = $amountMoney;
    }

    public function getAmountPercent() {
        return $this->amountPercent;
    }

    public function setAmountPercent($amountPercent) {
        $this->amountPercent = $amountPercent;
    }

    public function getDiscountType() {
        return $this->discountType;
    }

    public function setDiscountType($discountType) {
        $this->discountType = $discountType;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getServiceId() {
        return $this->serviceId;
    }

    public function setServiceId($serviceId) {
        $this->serviceId = $serviceId;
    }

    public function getUserService() {
        return $this->userService;
    }

    public function setUserService($userService) {
        $this->userService = $userService;
    }

    public function getLimitQuantity() {
        return $this->limitQuantity;
    }

    public function setLimitQuantity($limitQuantity) {
        $this->limitQuantity = $limitQuantity;
    }
    /**
     * 
     * @return \Symfony\Component\HttpFoundation\File\UploadedFile
     */
    public function getImageObject() {
        return $this->imageObject;
    }

    public function setImageObject(UploadedFile $imageObject) {
        $this->imageObject = $imageObject;
    }

    public function isValidPromotionLimitation(ExecutionContext $context){        
        
        if($this->limitQuantity=="" && $this->endDate==""){
            
            $propertyPath = $context->getPropertyPath() . '.limitQuantity';

            $context->setPropertyPath($propertyPath);

            $context->addViolation('At list one limitation should be specified', array(), null);
        }
    }
}
