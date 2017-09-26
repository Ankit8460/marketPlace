<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *2017_01_11_000000_truck_type_table.php
     * @return void
     */
    public function up()
    {
        Schema::create('helper', function (Blueprint $table) {
            $table->increments('helper_id');
            $table->string('helper_unique_id');
            $table->string('helper_fname');
            $table->string('helper_lname');
            $table->string('email');
            $table->string('password');
            $table->string('mobile');
            $table->string('address');
            $table->string('idproof_image');
            $table->string('helper_insurance_image');
            $table->string('profile_image');
            $table->tinyInteger('status');
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
        Schema::drop('helper');
    }

    /*
    helper_id
    helper_unique_id
    fname
    lname
    email
    password
    mobile
    address
    idproof_image
    helper_insurance_image
    profile_image
    status (tinyint)//0 inactive - 1 active - 2 not verifyed 
    */
}
