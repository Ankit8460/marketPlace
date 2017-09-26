<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *2017_01_11_000000_truck_type_table.php
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_fname');
            $table->string('customer_lname');
            $table->string('customer_email');
            $table->string('customer_mobile');
            $table->string('customer_password');
            $table->string('customer_profile_image');
            $table->string('refreshToken');
            $table->string('refreshToken_exp_time');
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
        Schema::drop('customer');
    }
}
