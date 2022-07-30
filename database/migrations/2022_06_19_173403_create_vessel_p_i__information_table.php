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
        Schema::create('vessel_p_i__information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vessel_id')->constrained('vessels');
            $table->string('title');
            $table->string('inception');
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
        Schema::dropIfExists('vessel_p_i__information');
    }
};
