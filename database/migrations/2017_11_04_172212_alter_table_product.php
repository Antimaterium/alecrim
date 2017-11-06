<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProduct extends Migration
{

    public function up()
    {
        Schema::table('products', function(Blueprint $table ){
            $table->float('product_purchase_unit_price')->default(0);
            $table->integer('product_initial_quantity')->default(0);
        });
    }

    public function down()
    {
         Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_purchase_unit_price');
            $table->dropColumn('product_initial_quantity');
        });
    }
}
