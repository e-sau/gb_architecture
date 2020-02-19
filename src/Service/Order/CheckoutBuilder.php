<?php

namespace Service\Order;

use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class CheckoutBuilder implements CheckoutBuilderInterface
{
    /**
     * @var Basket
     */
    private $basket;

    /**
     * @var BillingInterface
     */
    private $billing;

    /**
     * @var DiscountInterface
     */
    private $discount;

    /**
     * @var CommunicationInterface
     */
    private $communication;

    /**
     * @var SecurityInterface
     */
    private $security;

    /**
     * @param Basket $basket
     */
    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    /**
     * @return Basket
     */
    public function getBasket(): Basket
    {
        return $this->basket;
    }

    /**
     * @return BillingInterface
     */
    public function getBilling(): BillingInterface
    {
        return $this->billing;
    }

    /**
     * @return DiscountInterface
     */
    public function getDiscount(): DiscountInterface
    {
        return $this->discount;
    }

    /**
     * @return CommunicationInterface
     */
    public function getCommunication(): CommunicationInterface
    {
        return $this->communication;
    }

    /**
     * @return SecurityInterface
     */
    public function getSecurity(): SecurityInterface
    {
        return $this->security;
    }

    /**
     * @param BillingInterface $billing
     * @return CheckoutBuilderInterface
     */
    public function setBilling(BillingInterface $billing): CheckoutBuilderInterface
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @param DiscountInterface $discount
     * @return CheckoutBuilderInterface
     */
    public function setDiscount(DiscountInterface $discount): CheckoutBuilderInterface
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @param CommunicationInterface $communication
     * @return CheckoutBuilderInterface
     */
    public function setCommunication(CommunicationInterface $communication): CheckoutBuilderInterface
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * @param SecurityInterface $security
     * @return CheckoutBuilderInterface
     */
    public function setSecurity(SecurityInterface $security): CheckoutBuilderInterface
    {
        $this->security = $security;
        return $this;
    }
}