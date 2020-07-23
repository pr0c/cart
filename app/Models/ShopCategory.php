<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model {
    protected $table = 'shop_categories';

    protected $fillable = ['title'];

    public function parent() {
        return $this->hasOne(ShopCategory::class, 'id', 'parent_id');
    }

    public function child() {
        return $this->hasMany(ShopCategory::class, 'parent_id', 'id');
    }

    public function products() {
        return $this->belongsToMany(Product::class, 'category_product', 'product_id', 'category_id');
    }

    public function isChildren($categoryId) {
        $childs = $this->child;
        if($childs->contains($categoryId)) return true;
        else return false;
    }
}
