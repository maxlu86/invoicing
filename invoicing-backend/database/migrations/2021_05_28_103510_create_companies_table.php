<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_type_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->string('Name');
            $table->string('IdNumber')->nullable();
            $table->string('DisplayName')->nullable();
            $table->string('VatNumber');
            $table->string('Email')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Street');
            $table->string('ZipCode');
            $table->string('City');
            $table->string('State')->nullable();
            $table->foreignId('country_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('WebPage')->nullable();
            $table->string('InternalNotes')->nullable();
            $table->string('PaymentMethod')->nullable();
            $table->string('Reference')->nullable();
            $table->decimal('Discount', 5, 2)->nullable();
            $table->foreignId('language_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('sales_account_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('purchase_account_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('due_date_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('payment_day_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('sales_tax_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('purchase_tax_id')
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
        Schema::dropIfExists('companies');
    }
}
