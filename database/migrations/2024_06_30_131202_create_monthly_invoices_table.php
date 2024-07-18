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
        Schema::create('monthly_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_address');
            $table->integer('elevator_no');
            $table->integer('elevator_cost_ind');
            $table->string('bill_type');
            $table->integer('bill_tax_percentage')->default(0);
            $table->bigInteger('total');
            $table->integer('report_no')->unique();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_invoices');
    }
};
