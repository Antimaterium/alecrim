<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProductsPurchasePacking extends Migration
{
     public function up()
    {
        Schema::table('products', function(Blueprint $table ){
            $table->string('product_packing', 20);
            $table->float('product_purchase_price');
            $table->integer('product_acceptable_minimum_quantity')->unsigned();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_packing');
            $table->dropColumn('product_purchase_price');
            $table->dropColumn('product_acceptable_minimum_quantity');
        });
    }
}
