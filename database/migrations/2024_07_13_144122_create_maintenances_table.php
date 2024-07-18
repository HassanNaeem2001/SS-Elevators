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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('projectname');
            $table->string('elevatortype');
            $table->integer('unitno');
            $table->string('mainguide');
            $table->string('counterweight');
            $table->string('oilcup');
            $table->string('landingdoor');
            $table->string('landingdoorroller');
            $table->string('landingdoortracks');
            $table->string('landingdoorspring');
            $table->string('landingdoorweight');
            $table->string('landingdoorcontact');
            $table->string('landingdoorcamroller');
            $table->string('cabindoorroller');
            $table->string('cabindoorcatcher');
            $table->string('cabindoorchain');
            $table->string('doorsills');
            $table->string('mainmotorpulley');
            $table->string('mainmotoroil');
            $table->string('mainmotorseal');
            $table->string('shaftlimitswitches');
            $table->string('pitswitchsafety');
            $table->string('pitspring');
            $table->string('emergencylight');
            $table->string('intercom');
            $table->string('callpush');
            $table->string('displaycheck');
            $table->string('mainguideshoes');
            $table->string('counterweightguideshoes');
            $table->string('landingdoorshoes');
            $table->string('cabindoorshoes');
            $table->string('mainsteelwire');
            $table->string('speedgovernorwire');
            $table->string('partsreplaced')->nullable()->default('None');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
