<?php

namespace Alecrim;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
    	'provider_name'
	];

	public function products() {
		return $this->hasMany(Product::class);
	}
}
