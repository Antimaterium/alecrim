<?php

namespace Alecrim;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
    	'product_name', 
    	'product_description', 
    	'product_quantity', 
    	'product_price',
        'product_packing',
        'product_purchase_price',
        'product_acceptable_minimum_quantity',
    	'updated_at', 
    	'created_at'
    ];    

    public function items() {
    	return $this->belongsToMany(Item::class);
    }

    public function provider() {
        return $this->belongsTo(Provider::class);
    }

}
