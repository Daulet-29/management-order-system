<?php

namespace App\Domain\Services;

use App\Domain\Repositories\ProductRepositoryInterface;

class ProductService extends MainService
{
    public ProductRepositoryInterface $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository    =   $productRepository;
    }
}
