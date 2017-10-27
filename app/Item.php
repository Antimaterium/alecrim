<?php

namespace Alecrim;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
    	'item_name', 
    	'item_description', 
    	'item_categoria', 
    	'item_price', 
    	'updated_at', 
    	'created_at'
    ];

    public function products() {
    	return $this->belongsToMany(Product::class)->withPivot('product_quantity');
    }

     public function orders() {
        return $this->belongsToMany(Order::class)->withPivot('item_quantity');
    }

    /*public function getItemPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }*/
}
