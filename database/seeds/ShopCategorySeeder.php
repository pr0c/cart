<?php

use App\Models\ShopCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop_categories')->truncate();
        DB::table('category_product')->truncate();

        $categories[] = ShopCategory::create([
            'title' => 'Food'
        ]);

        $categories[] = ShopCategory::create([
            'title' => 'Vegan',
            'parent_id' => 1
        ]);

        $categories[] = ShopCategory::create([
            'title' => 'Furniture'
        ]);

        $categories[0]->products()->attach(2);
        $categories[0]->products()->attach(5);
        $categories[1]->products()->attach(3);
        $categories[1]->products()->attach(4);
        $categories[2]->products()->attach(1);
    }
}
