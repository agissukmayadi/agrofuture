<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Category::factory()->count(10)->create();

        $categories = [
            ['name' => 'Facewash'],
            ['name' => 'Serum'],
            ['name' => 'Toner'],
            ['name' => 'Toner Bro'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}