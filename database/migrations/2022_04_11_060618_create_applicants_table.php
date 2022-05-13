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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('sn_number');
            $table->string('photo');
            $table->string('class_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('suffix')->nullable;
            $table->integer('contact_number');
            $table->string('email_address');
            $table->date('birthdate');
            $table->string('home_address');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->integer('zip_code');
            $table->string('status');
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
        Schema::dropIfExists('applicants');
    }
};
