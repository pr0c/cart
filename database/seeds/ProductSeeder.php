<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $products[] = Product::create([
            'title' => 'Lenin',
            'image' => 'wide_16b67d51a6b36b2e25a4495f12c5e09a.jpg',
            'cost' => 50,
            'description' => 'Oldest hairless men'
        ]);

        $products[] = Product::create([
            'title' => 'Bublik',
            'image' => 'bagel_PNG58.png',
            'cost' => 420,
            'description' => 'The best bublik on the Earth'
        ]);

        $products[] = Product::create([
            'title' => 'Ocheret',
            'image' => 'ocheret.jpg',
            'cost' => 0.1,
            'description' => 'Obviously it\'s not food for peoples'
        ]);

        $products[] = Product::create([
            'title' => 'Paper',
            'image' => '109433_4.jpeg',
            'cost' => 0.3,
            'description' => 'Make your ass happy again'
        ]);

        $products[] = Product::create([
            'title' => 'iPhone',
            'image' => 'c25c94fe96_1000.jpg',
            'cost' => 5000,
            'description' => 'What actually apple do'
        ]);
    }
}
