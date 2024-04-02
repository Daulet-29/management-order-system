<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = [
            [
                'product_id' => 1,
                'quantity' => 2,
                'sum' => 2000,
                'status' => 'В корзине'
            ],
            [
                'product_id' => 2,
                'quantity' => 3,
                'sum' => 3300,
                'status' => 'Выдан'
            ],
            [
                'product_id' => 2,
                'quantity' => 1,
                'sum' => 1100,
                'status' => 'Возврат денег'
            ],
        ];

        foreach ($carts as $cart) {
            $cartModel = new Cart([
                'product_id' => $cart['product_id'],
                'quantity' => $cart['quantity'],
                'sum' => $cart['sum'],
            ]);
            $cartModel->save();
        }
    }
}
