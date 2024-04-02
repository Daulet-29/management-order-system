<?php

namespace App\Domain\Repositories;

class CartRepository implements CartRepositoryInterface
{
    use RepositoryEloquent;

    protected Cart $model;

    public function __construct(Cart $cart)
    {
        $this->model    =   $cart;
    }

    public function getByStatus($status)
    {
        return $this->model::where('status', $status)->get();
    }
}
