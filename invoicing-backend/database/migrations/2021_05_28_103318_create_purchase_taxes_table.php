<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTaxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_vat_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->foreignId('purchase_deduction_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
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
        Schema::dropIfExists('purchase_taxes');
    }
}
