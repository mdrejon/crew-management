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
        Schema::create('vessel_management_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vessel_id')->constrained('vessels');
            $table->string('name_of_company');
            $table->string('imo_number');
            $table->string('role');
            $table->string('address');
            $table->string('date_of_effect');
            $table->string('status');
            $table->integer('order');
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
        Schema::dropIfExists('vessel_management_details');
    }
};
