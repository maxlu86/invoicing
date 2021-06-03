<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('SKU')->unique();
            $table->string('Description')->nullable();
            $table->foreignId('sales_account_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->foreignId('sales_tax_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->decimal('UnitPrice', 10, 4);
            $table->decimal('UnitCost', 10, 4);
            $table->decimal('Total', 10, 4);
            $table->string('Barcode')->nullable();
            $table->string('FactoryCode')->nullable();
            $table->decimal('Weight', 10, 4);
            $table->boolean('StockControl');
            $table->integer('StockCounter')->nullable();
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
        Schema::dropIfExists('services');
    }
}
