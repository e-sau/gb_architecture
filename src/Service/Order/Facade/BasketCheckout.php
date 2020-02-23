<?php


namespace Service\Order\Facade;


use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\Order\Basket;
use Service\User\SecurityInterface;

class BasketCheckout
{
    private $basket;

    private $discount;

    private $billing;

    private $security;

    private $communication;

    /**
     * BasketCheckout constructor.
     * @param Basket $basket
     * @param DiscountInterface $discount
     * @param BillingInterface $billing
     * @param SecurityInterface $security
     * @param CommunicationInterface $communication
     */
    public function __construct(
        Basket $basket,
        DiscountInterface $discount,
        BillingInterface $billing,
        SecurityInterface $security,
        CommunicationInterface $communication
    )
    {
        $this->basket = $basket;
        $this->discount = $discount;
        $this->billing = $billing;
        $this->security = $security;
        $this->communication = $communication;
    }

    /**
     * @throws \Service\Billing\Exception\BillingException
     * @throws \Service\Communication\Exception\CommunicationException
     */
    public function checkoutProcess(): void
    {
        $totalPrice = 0;
        foreach ($this->basket->getProductsInfo() as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}