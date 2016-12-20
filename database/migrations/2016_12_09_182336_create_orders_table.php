<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('issuingofficername');
            $table->string('supplycompanyname');
            $table->string('supplyofficername');
            $table->string('warehouse');
            $table->double('numberofcartons');
            $table->double('quantityliters');
            $table->double('priceperitem');
            $table->double('total');
            $table->string('notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
