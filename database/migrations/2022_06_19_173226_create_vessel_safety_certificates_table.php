<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vessel_safety_certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vessel_id')->constrained('vessels');
            $table->string('classification_society');
            $table->string('date_survey');
            $table->string('date_change_status');
            $table->string('reason');
            $table->string('top_c_v');
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
        Schema::dropIfExists('vessel_safety_certificates');
    }
};
