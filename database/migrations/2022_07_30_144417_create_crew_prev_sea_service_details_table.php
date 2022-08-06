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
        Schema::create('crew_prev_sea_service_details', function (Blueprint $table) {
            $table->id();
            $table->integer('crew_id');
            $table->string('rank');
            $table->text('vessel_id');
            $table->string('grt');
            $table->text('nrt');
            $table->string('period_of_service');
            $table->string('sign_on');
            $table->string('sign_off');
            $table->string('duration');
            $table->string('reason_for_sign');
            $table->integer('create_by');
            $table->integer('update_by');
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
        Schema::dropIfExists('crew_prev_sea_service_details');
    }
};
