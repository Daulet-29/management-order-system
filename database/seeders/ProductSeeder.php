<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'обувь китайский',
                'price' => '1000',
            ],
            [
                'name' => 'обувь турецкий',
                'price' => '1100',
            ],
        ];

        foreach ($products as $product) {
            $productModel = Product::firstWhere('name', $product['name']);

            if (!$productModel) {
                $productModel = new Product([
                    'name' => $product['name'],
                    'price' => $product['price'],
                ]);
                $productModel->save();
            }
        }
    }
}
