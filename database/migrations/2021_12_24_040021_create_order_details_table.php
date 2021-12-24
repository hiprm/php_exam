<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customerId')->references('id')->on('customer')->cascadeOnDelete();
            $table->foreignId('orderId')->references('id')->on('order')->cascadeOnDelete();
            $table->foreignId('productId')->references('id')->on('product')->cascadeOnDelete();
            $table->integer('orderQty');
            $table->double('unitPrice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
