<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidayRatesTable extends Migration
{
   
    public function up()
    {
        Schema::create('holiday_rates', function (Blueprint $table) {
            $table->increments('holiday_rates_id');
            $table->string('from_date');
            $table->string('to_time');
            $table->string('rates');
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
        Schema::drop('holiday_rates');
    }
}
