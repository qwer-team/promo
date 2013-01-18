<?php

namespace Qwer\PromoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use MarketFusion\Bundle\DataBundle\Entity\User;

/**
 * Promo
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Promo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="sp_id", type="integer", nullable=true )
     */
    private $spId;
    /**
     * @ORM\ManyToOne(targetEntity="MarketFusion\Bundle\DataBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(name="sp_id", referencedColumnName="id")
     */
    private $sp;

    /**
     * @var integer
     *
     * @ORM\Column(name="promo_loc_id", type="integer", nullable=true )
     */
    private $locId;
    /*
     * @ORM\ManyToOne(targetEntity="???", inversedBy="id")
     * @ORM\JoinColumn(name="promo_loc_id", referencedColumnName="id")
     */
//    private $promoLocation;

    /**
     * @var string
     *
     * @ORM\Column(name="promo_title", type="string", length=200)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="promo_body", type="string", length=200)
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="promo_disclaimer", type="string", length=500)
     */
    private $disclaimer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="promo_start_date", type="datetime")
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="datetime", type="string", length=255)
     */
    private $datetime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="promo_end_date", type="datetime")
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="promo_amount", type="integer")
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="discount_type", type="smallint")
     */
    private $discountType;

    /**
     * @var integer
     *
     * @ORM\Column(name="promo_qty", type="integer")
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="promo_status", type="smallint")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="promo_image", type="string", length=255)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="promo_service_id", type="integer", nullable=true )
     */
    private $serviceId;
    /**
     * @ORM\ManyToOne(targetEntity="MarketFusion\Bundle\DataBundle\Entity\UserBusinessService", inversedBy="id")
     * @ORM\JoinColumn(name="promo_service_id", referencedColumnName="id")    
     * @var type 
     */
    private $userService;

    /**
     * @var integer
     *
     * @ORM\Column(name="promo_limit_qty", type="integer")
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
