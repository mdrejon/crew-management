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
        Schema::create('crew_qualification_certificates', function (Blueprint $table) {
            $table->id();
            $table->integer('crew_id');
            $table->string('qualification_title');
            $table->text('certificate_type');
            $table->string('cert_no');
            $table->text('issue_date');
            $table->string('expiry_date');
            $table->string('issued_by');
            $table->string('sign_off');
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
        Schema::dropIfExists('crew_qualification_certificates');
    }
};
