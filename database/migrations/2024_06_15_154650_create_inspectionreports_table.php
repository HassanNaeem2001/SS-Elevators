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
        Schema::create('inspectionreports', function (Blueprint $table) {
            $table->id();
            $table->string('supervisorname');
            $table->string('companyname');
            $table->date('errorobserved_date');
            $table->date('reportsent_date');
            $table->integer('no_of_issues');
            $table->string('issues');
            $table->string('subject');
            $table->integer('duration_to_work');
            $table->string('unit');
            $table->string('additionaldetails')->default('No Additional details');
            $table->string('generated_by'); 
            $table->integer('report_no')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspectionreports');
    }
};
