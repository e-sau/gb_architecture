<?php


namespace Service\Strategy;


use Model\Entity\Product;

class NameSorter implements SorterInterface
{

    /**
     * @param Product $a
     * @param Product $b
     * @return int
     */
    public function sort($a, $b): int
    {
        return $a->getName() <=> $b->getName();
    }
}