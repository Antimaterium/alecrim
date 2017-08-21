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
}
