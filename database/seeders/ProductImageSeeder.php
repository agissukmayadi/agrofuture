<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_images = [
            [
                'product_id' => 1,
                'name' => '1.jpeg',
                'is_thumbnail' => true
            ],
            [
                'product_id' => 1,
                'name' => '2.jpeg',
                'is_thumbnail' => false
            ],
            [
                'product_id' => 1,
                'name' => '3.jpeg',
                'is_thumbnail' => false
            ],
            [
                'product_id' => 1,
                'name' => '4.jpeg',
                'is_thumbnail' => false
            ],
            [
                'product_id' => 2,
                'name' => '5.jpeg',
                'is_thumbnail' => true
            ],
            [
                'product_id' => 2,
                'name' => '6.jpeg',
                'is_thumbnail' => false
            ],
            [
                'product_id' => 2,
                'name' => '7.jpeg',
                'is_thumbnail' => false
            ],
            [
                'product_id' => 3,
                'name' => '8.jpeg',
                'is_thumbnail' => true
            ],
            [
                'product_id' => 3,
                'name' => '9.jpeg',
                'is_thumbnail' => false
            ],
            [
                'product_id' => 3,
                'name' => '10.jpeg',
                'is_thumbnail' => false
            ],
            [
                'product_id' => 4,
                'name' => '11.jpeg',
                'is_thumbnail' => true
            ],
            [
                'product_id' => 4,
                'name' => '12.jpeg',
                'is_thumbnail' => false
            ],
            [
                'product_id' => 4,
                'name' => '13.jpeg',
                'is_thumbnail' => false
            ]
        ];

        foreach ($product_images as $product_image) {
            ProductImage::create($product_image);
        }
    }
}