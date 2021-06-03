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
            $table->foreignId('doc_type_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->foreignId('user_company_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->foreignId('company_id')
            ->nullable()
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('set null');
            $table->string('Email')->nullable();
            $table->string('InvoiceData')->nullable();
            $table->date('IssueDate')->nullable();
            $table->date('ExpiringDate')->nullable();
            $table->string('SerialNumber')->nullable();
            $table->string('PaymentMethod')->nullable();
            $table->boolean('IfPayed')->nullable();
            $table->string('ClientNotes')->nullable();
            $table->string('InternalNotes')->nullable();
            $table->decimal('Subtotal', 10, 4);
            $table->decimal('Grandtotal', 10, 4);
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
