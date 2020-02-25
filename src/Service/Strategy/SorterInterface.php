<?php


namespace Service\Strategy;


interface SorterInterface
{
    public function sort($a, $b): int;
}