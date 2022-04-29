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
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('applicant_id');
            $table->integer('user_id');
            $table->integer('role_id');
            $table->string('user_name');
            $table->string('particular');
            $table->string('remarks');
            $table->timestamps();
            // $table->foreign('applicant_id')
            //       ->references('id')
            //       ->on('applicants')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activities');
    }
};
