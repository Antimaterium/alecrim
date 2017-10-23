<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableItemProduct extends Migration
{
    public function up()
    {
         Schema::table('item_product', function(Blueprint $table ){
            $table->integer('product_quantity')->default(0);
        });
    }

    public function down()
    {
        Schema::table('item_product', function (Blueprint $table) {
            $table->dropColumn('product_quantity');
        });
    }
}
