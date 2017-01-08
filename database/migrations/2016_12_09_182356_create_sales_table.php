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
            $table->double('numberofitems');
            $table->double('quantityofliters');
            $table->double('priceperitem');
            $table->double('total');
            $table->double('amountpaid');
            $table->string('notes');
            $table->integer('warehouseitem_id')->unsigned();
            $table->foreign('warehouseitem_id')
            ->references('id')->on('warehouses')
            ->onDelete('cascade');    
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
