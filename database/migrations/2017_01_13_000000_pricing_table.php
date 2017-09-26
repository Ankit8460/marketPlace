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
        Schema::create('pricing', function (Blueprint $table) {
            $table->increments('pricing_id');
            $table->string('base_fee');
            $table->string('per_mile');
            $table->string('per_minutes');
            $table->string('helper_fee');
            $table->string('extra_manpower');
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
        Schema::drop('pricing');
    }
}
