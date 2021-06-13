<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');            
            $table->string('sku')->nullable();
            $table->string('description')->nullable();
            $table->string('sales_account')->nullable();
            $table->string('sales_tax')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('total')->nullable();
            $table->string('barcode')->nullable();
            $table->string('factory_code')->nullable();
            $table->string('weight')->nullable();
            $table->string('product_quantity')->nullable();
            $table->integer('client_id')->nullable();
            $table->string('purchase_tax')->nullable();
            $table->string('unit_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
