<?php

namespace Alecrim;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    	'order_table', 
    	'order_paid', 
    	'order_total',  
    	'created_at',
    	'updated_at' 
    ];

    public function items() {
    	return $this->belongsToMany(Item::class);
    }

}
