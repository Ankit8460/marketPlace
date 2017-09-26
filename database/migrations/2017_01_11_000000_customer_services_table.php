<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerServicesTable extends Migration
{
   
    public function up()
    {
        Schema::create('customer_services', function (Blueprint $table) {
            $table->increments('customer_services_id');
            $table->string('customer_services_name');
            $table->string('subject');
            $table->string('message');
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
