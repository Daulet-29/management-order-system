<?php

namespace App\Domain\Services;

use App\Domain\Repositories\CartRepositoryInterface;

class CartService extends MainService
{
    public CartRepositoryInterface $cartRepository;
    public function __construct(CartRepositoryInterface $cartRepository)
    {
        $this->cartRepository    =   $cartRepository;
    }
}
