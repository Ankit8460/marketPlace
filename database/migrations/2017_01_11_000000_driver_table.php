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
        Schema::create('driver', function (Blueprint $table) {
            $table->increments('driver_id');
            $table->string('mzigo_driver_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('mobile');
            $table->string('password');
            $table->string('address');
            $table->string('driver_license_text');
            $table->string('driver_license_image');
            $table->string('vehicle_type_text');
            $table->string('vehicle_registration_image');
            /*$table->string('driver_insurance_text');*/
            $table->string('driver_insurance_image');
            $table->string('vehicle_image');
            $table->string('vehicle_number_text');
            /*$table->string('vehicle_number_image');*/
            $table->string('lift_weight_from');
            $table->string('lift_weight_to');
            $table->string('profile_image');
            $table->datetime('vaction_start_date');
            $table->datetime('vaction_end_date');
            $table->string('earn_money');
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
        Schema::drop('driver');
    }
}
