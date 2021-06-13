<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('company_type');            
            $table->string('name');
            $table->string('id_number')->nullable();
            $table->string('display_name')->nullable();
            $table->string('vat_number');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('street_1');
            $table->string('street_2')->nullable();
            $table->string('zip_code');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('internal_notes')->nullable();
            $table->string('web_page')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('sales_account')->nullable();
            $table->string('purchase_account')->nullable();
            $table->string('reference')->nullable();
            $table->string('due_date')->nullable();
            $table->string('discount')->nullable();
            $table->string('payment_day')->nullable();
            $table->string('sales_tax')->nullable();
            $table->string('purchase_tax')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
