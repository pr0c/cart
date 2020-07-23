<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'products';
    protected $fillable = ['title', 'cost', 'image'];

    public function category() {
        return $this->belongsToMany(ShopCategory::class, 'category_product', 'product_id', 'category_id');
    }
}
