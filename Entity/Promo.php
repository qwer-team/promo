<?php

namespace Qwer\PromoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MarketFusion\Bundle\DataBundle\Entity\User;

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
     * @var string $datetime
     */
    private $datetime;

    /**
     * @var \DateTime $endDate
     */
    private $endDate;

    /**
     * @var integer $amount
     */
    private $amount;

    /**
     * @var integer $discountType
     */
    private $discountType;

    /**
     * @var integer $quantity
     */
    private $quantity;

    /**
     * @var integer $status
     */
    private $status;

    /**
     * @var string $image
     */
    private $image;

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

    public function getDatetime() {
        return $this->datetime;
    }

    public function setDatetime($datetime) {
        $this->datetime = $datetime;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
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

}
