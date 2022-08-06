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
        Schema::create('crew_academic_qualificaitions', function (Blueprint $table) {
            $table->id();
            $table->integer('crew_id');
            $table->string('from');
            $table->string('to');
            $table->string('institutions');
            $table->string('qualifications');
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
        Schema::dropIfExists('crew_academic_qualificaitions');
    }
};
