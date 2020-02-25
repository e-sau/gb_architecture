<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;
use Model\Entity\Product;
use Model\Repository\ProductRepository;
use Service\Strategy\SorterInterface;

class ProductService
{
    /**
     * Получаем информацию по конкретному продукту
     * @param int $id
     * @return Product|null
     */
    public function getInfo(int $id): ?Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     * @param SorterInterface $sorter
     * @return Product[]
     */
    public function getAll(SorterInterface $sorter): array
    {
        $productList = $this->getProductRepository()->fetchAll();

        // Применить паттерн Стратегия
        // $sortType === 'price'; // Сортировка по цене
        // $sortType === 'name'; // Сортировка по имени
        usort($productList, [$sorter, "sort"]);

        return $productList;
    }

    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }
}
