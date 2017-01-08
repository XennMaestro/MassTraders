<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('warehouse_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('productname');
            $table->string('strength');
            $table->string('packaging');
            $table->double('quantity');
            $table->string('notes');
            $table->integer('warehouse_id')->unsigned();
            $table->foreign('warehouse_id')
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
        Schema::dropIfExists('warehouse_items');
    }
}
