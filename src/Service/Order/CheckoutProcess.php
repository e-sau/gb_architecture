<?php


namespace Service\Order;

use Service\Billing\Exception\BillingException;
use Service\Communication\Exception\CommunicationException;

class CheckoutProcess
{
    /**
     * @param CheckoutBuilderInterface $builder
     * @throws BillingException
     * @throws CommunicationException
     */
    public function checkoutProcess(CheckoutBuilderInterface $builder)
    {
        $totalPrice = 0;

        $basket = $builder->getBasket();
        foreach ($basket->getProductsInfo() as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $builder->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $builder->getBilling()->pay($totalPrice);

        $user = $builder->getSecurity()->getUser();
        $builder->getCommunication()->process($user, 'checkout_template');
    }
}