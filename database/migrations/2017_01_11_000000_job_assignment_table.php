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
        Schema::create('job_assignment', function (Blueprint $table) {
            $table->increments('job_assignment_id');
            $table->string('job_assignment_unique_id');
            $table->string('customer_id');
            $table->string('driver_id');
            $table->string('cat_id');
            $table->string('helper_id');
            $table->string('approx_weight');
            $table->string('pickup_address');
            $table->string('dropoff_address');
            $table->string('pickup_time');
            $table->string('dropoff_time');
            $table->string('ride_type');
            $table->string('no_of_driver');
            $table->string('no_of_helper');
            $table->string('accessories_images');
            $table->string('price');
            $table->string('travel_time');
            $table->string('travel_distance');
            $table->string('start_lat');
            $table->string('start_long');
            $table->string('end_lat');
            $table->string('end_long');
            $table->string('channel_name');
            $table->string('status');
            $table->string('cancel_reason');
            $table->string('extra_note');
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
        Schema::drop('truck_type');
    }
}
