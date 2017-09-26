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
        Schema::create('weight_class', function (Blueprint $table) {
            $table->increments('weight_id');
            $table->string('weight_from');
            $table->string('weight_to');
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
        Schema::drop('weight_class');
    }
}
