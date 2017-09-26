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
        Schema::create('customer_token', function (Blueprint $table) {
            $table->increments('customer_token_id');
            $table->string('customer_id');
            $table->string('user_type');
            $table->string('deviceToken');
            $table->string('deviceType');
            $table->string('token');
            $table->string('token_exp_time');
            $table->string('X_api_key');
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
        Schema::drop('customer_token');
    }
}
