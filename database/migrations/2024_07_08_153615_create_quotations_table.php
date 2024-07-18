<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_address');
            $table->string('elevator_type');
            $table->string('elevator_detail');
            $table->string('elevator_doc_title');
            $table->string('electrical_instruments')->default('Not Provided');
            $table->integer('electrical_quantity')->default(0);
            $table->integer('electrical_price')->default(0);
            $table->bigInteger('electrical_total')->default(0);
            $table->string('mechanical_instruments')->default('Not Provided');
            $table->integer('mechanical_quantity')->default(0);
            $table->integer('mechanical_price')->default(0);
            $table->bigInteger('mechanical_total')->default(0);
            $table->string('no_of_elevator_structure')->default(0);
            $table->string('elevator_s_details')->default('Null');
            $table->string('elevator_s_quantity')->default('0');
            $table->integer('elevator_s_price')->default(0);
            $table->integer('elevator_s_total')->default(0);
            $table->integer('delivery_time');
            $table->string('delivery_unit');
            $table->integer('completion_time');
            $table->string('completion_unit');
            $table->bigInteger('installation_charges');
            $table->bigInteger('total_bill');
            $table->bigInteger('quotation_no')->unique();
            $table->bigInteger('tax_percentage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
