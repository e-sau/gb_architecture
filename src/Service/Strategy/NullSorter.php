<?php


namespace Service\Strategy;


class NullSorter implements SorterInterface
{
    public function sort($a, $b): int
    {
        return 0;
    }
}