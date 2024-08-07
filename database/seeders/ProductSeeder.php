<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'category_id' => 1,
                'name' => 'Elvicto Anti Acne Face Wash',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, quod in. Voluptatum voluptates temporibus fuga blanditiis velit quasi quaerat architecto.',
                'weight' => 500,
                'price' => 80000,
                'stock' => 10
            ],
            [
                'category_id' => 1,
                'name' => 'Elvicto Hydrating Face Wash',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, quod in. Voluptatum voluptates temporibus fuga blanditiis velit quasi quaerat architecto.',
                'weight' => 1000,
                'price' => 80,
                'stock' => 5
            ],
            [
                'category_id' => 2,
                'name' => 'Elvicto Brightening Serum',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, quod in. Voluptatum voluptates temporibus fuga blanditiis velit quasi quaerat architecto.',
                'weight' => 1000,
                'price' => 120000,
                'stock' => 5
            ],
            [
                'category_id' => 3,
                'name' => 'Elvicto Acne Toner',
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis, quod in. Voluptatum voluptates temporibus fuga blanditiis velit quasi quaerat architecto.',
                'weight' => 1000,
                'price' => 120000,
                'stock' => 5
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
