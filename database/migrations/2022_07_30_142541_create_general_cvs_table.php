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
        Schema::create('general_cvs', function (Blueprint $table) {
            $table->id();
            $table->integer('crew_id');
            $table->string('position_applied');
            $table->string('application_date');
            $table->string('for_vessel');
            $table->string('available_date');
            $table->string('manning_agent');
            $table->string('signature_of_applicant');
            $table->string('signature_date');
            $table->string('interview_by');
            $table->string('interview_date');
            $table->string('department');
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
        Schema::dropIfExists('general_cvs');
    }
};
