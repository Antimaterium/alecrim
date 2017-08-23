<?php

namespace Alecrim;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
    	'product_name', 
    	'product_description', 
    	'product_quantity', 
    	'product_price', 
    	'updated_at', 
    	'created_at'
    ];

    public function items() {
    	return $this->belongsToMany(Item::class);
    }

}
