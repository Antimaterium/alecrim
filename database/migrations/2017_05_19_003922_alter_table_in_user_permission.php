<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableInUserPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
    {
       schema::table('users', function(Blueprint $table ){
         $table->smallInteger('permission');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
