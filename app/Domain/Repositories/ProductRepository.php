<?php

namespace App\Domain\Repositories;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    use RepositoryEloquent;
    protected Product $model;

    public function __construct(Product $product)
    {
        $this->model    =   $product;
    }
}
