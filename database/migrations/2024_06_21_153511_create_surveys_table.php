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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('clientname');
            $table->string('projectname');
            $table->string('location');
            $table->string('elevator_no');
            $table->string('elevator_brand');
            $table->integer('elevator_stops');
            $table->string('project_type');
            $table->string('project_usage');
            $table->string('machine_details')->default('Not provided by the inspector');
            $table->string('controlpanel_details')->default('Not provided by the inspector');
            $table->string('steelwire_details')->default('Not provided by the inspector');
            $table->string('sheaves_details')->default('Not provided by the inspector');
            $table->string('mainguide_details')->default('Not provided by the inspector');
            $table->string('cwtguide_details')->default('Not provided by the inspector');
            $table->string('counterweight_details')->default('Not provided by the inspector');
            $table->string('carcabin_details')->default('Not provided by the inspector');
            $table->string('cabincwtshoe_details')->default('Not provided by the inspector');
            $table->string('cardoor_details')->default('Not provided by the inspector');
            $table->string('landingdoor_details')->default('Not provided by the inspector');
            $table->string('doorsafety_details')->default('Not provided by the inspector');
            $table->string('speedgoverner_details')->default('Not provided by the inspector');
            $table->string('limitswitches_details')->default('Not provided by the inspector');
            $table->string('buffers_details')->default('Not provided by the inspector');
            $table->string('intercom_details')->default('Not provided by the inspector');
            $table->string('fans_details')->default('Not provided by the inspector');
            $table->string('cabinlights_details')->default('Not provided by the inspector');
            $table->string('lcs_details')->default('Not provided by the inspector');
            $table->string('caroperating_details')->default('Not provided by the inspector');
            $table->string('oilcan_details')->default('Not provided by the inspector');
            $table->string('additional_notes')->default('Not provided by the inspector');
            $table->integer('survery_report_no')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
