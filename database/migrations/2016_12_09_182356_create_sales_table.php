<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('issuingofficername');
            $table->string('vendorname');
            $table->string('salesofficername');
            $table->string('recipientname');
            $table->string('warehouse');
            $table->double('numberofcartons');
            $table->double('quantityliters');
            $table->double('priceperitem');
            $table->double('total');
            $table->double('amountpaid');
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
        Schema::dropIfExists('sales');
    }
}
