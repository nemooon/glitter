<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('variant_name');
            $table->string('sku')->nullable();
            $table->decimal('selling_price', 13, 3);
            $table->decimal('reference_price', 13, 3)->nullable();
            $table->integer('stock_quantity')->unsigned()->nullable();
            $table->integer('limited_quantity')->unsigned()->nullable();
            $table->string('status');
            $table->string('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variants');
    }
}
