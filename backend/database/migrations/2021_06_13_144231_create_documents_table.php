<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->integer('user_company_id');
            $table->integer('client_id');
            $table->string('email')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('expiring_date')->nullable();
            $table->string('serial_number');
            $table->string('payment_method')->nullable();
            $table->string('note')->nullable();
            $table->string('subtotal')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
