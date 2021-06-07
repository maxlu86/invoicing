<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('company_name');
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
            $table->foreignId('country_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->foreignId('currency_id')
                ->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->string('web_page')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('user_companies');
    }
}
