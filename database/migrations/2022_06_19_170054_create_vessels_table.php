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
        Schema::create('vessels', function (Blueprint $table) {
            $table->id();
            $table->string('imo_no');
            $table->text('flag_img');
            $table->string('call_sign');
            $table->string('mmsi');
            $table->string('gross_tonnage');
            $table->string('dwt');
            $table->string('type_of_ship');
            $table->string('year_of_build');
            $table->string('international_labour_organization');
            $table->string('lnternational_transport');
            $table->integer('status');
            $table->integer('order');
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
        Schema::dropIfExists('vessels');
    }
};
