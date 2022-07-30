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
        Schema::create('crews', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->text('given_name');
            $table->string('full_name');
            $table->text('img');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('height');
            $table->string('weight');
            $table->string('boiler_suit');
            $table->string('safety_shoes');
            $table->string('marital_status');
            $table->string('mobile_no');
            $table->string('nationality');
            $table->string('hair_color');
            $table->string('eyes_color');
            $table->string('sid_no');
            $table->string('nid_no');
            $table->string('religion');
            $table->string('covid_accination');
            $table->string('address');
            $table->string('email');
            $table->string('next_of_kin');
            $table->string('relationship');
            $table->string('family_phone_no');
            $table->string('address _next_of_kin');
            $table->integer('order');
            $table->integer('status');
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
        Schema::dropIfExists('crews');
    }
};
