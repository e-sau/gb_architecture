<?php


namespace Service\Strategy;


use Model\Entity\Product;

class PriceSorter implements SorterInterface
{

    /**
     * @param Product $a
     * @param Product $b
     * @return int
     */
    public function sort($a, $b): int
    {
        return $a->getPrice() <=> $b->getPrice();
    }
}