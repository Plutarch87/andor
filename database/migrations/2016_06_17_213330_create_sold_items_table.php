<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sold_items', function (Blueprint $table) {
                    $table->increments('id');
                    $table->text('buyer_fullname');
                    $table->text('buyer_info');
                    $table->integer('sumtotal');
                    $table->timestamp('created_at');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sold_items');
    }
}
